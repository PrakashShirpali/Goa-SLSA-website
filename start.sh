#!/bin/bash

set -u  # fail on undefined vars, but NOT on normal command errors

echo "[entrypoint] Starting container services..."

############################
# PHP-FPM socket directory #
############################

echo "[entrypoint] Preparing php-fpm run directory..."
mkdir -p /run/php-fpm
chown apache:apache /run/php-fpm

#########################
# Laravel app ownership #
#########################

if [ -d /var/www/html/GSLSA_Admin ]; then
  echo "[entrypoint] Fixing permissions for GSLSA_Admin..."
  chown -R apache:apache /var/www/html/GSLSA_Admin
  chmod -R 755 /var/www/html/GSLSA_Admin
  chmod -R 775 /var/www/html/GSLSA_Admin/storage
  chmod -R 775 /var/www/html/GSLSA_Admin/bootstrap/cache
else
  echo "[entrypoint] Skipping GSLSA_Admin perms (directory not found)"
fi

if [ -d /var/www/html/GSLSA_Users ]; then
  echo "[entrypoint] Fixing permissions for GSLSA_Users..."
  chown -R apache:apache /var/www/html/GSLSA_Users
  chmod -R 755 /var/www/html/GSLSA_Users
  chmod -R 775 /var/www/html/GSLSA_Users/storage
  chmod -R 775 /var/www/html/GSLSA_Users/bootstrap/cache
else
  echo "[entrypoint] Skipping GSLSA_Users perms (directory not found)"
fi

##################
# Redis          #
##################

if command -v redis-server >/dev/null 2>&1; then
  echo "[entrypoint] Starting Redis..."
  redis-server --daemonize yes || echo "[entrypoint] WARNING: Redis failed to start."
else
  echo "[entrypoint] Redis is not installed, skipping."
fi

##################
# PHP-FPM        #
##################

echo "[entrypoint] Starting php-fpm..."
php-fpm --daemonize || {
  echo "[entrypoint] ERROR: php-fpm failed to start. Check /var/log/php-fpm/*"
}

##################
# PostgreSQL 16  #
##################

PGDATA="/var/lib/pgsql/16/data/pg_data"

echo "[entrypoint] Using existing PostgreSQL data directory at $PGDATA"
chown -R postgres:postgres /var/lib/pgsql/16
chmod 700 /var/lib/pgsql/16
chmod 700 "$PGDATA" || true

if [ ! -f "$PGDATA/PG_VERSION" ]; then
  echo "[entrypoint] ERROR: PG_VERSION not found in $PGDATA"
  echo "[entrypoint] This directory does not look like a valid PostgreSQL cluster."
  echo "[entrypoint] Refusing to run initdb automatically because your data already exists."
else
  echo "[entrypoint] Existing PostgreSQL cluster detected (PG_VERSION present)."
  echo "[entrypoint] Starting PostgreSQL..."
  su - postgres -c "/usr/pgsql-16/bin/pg_ctl -D '$PGDATA' -l /var/lib/pgsql/16/logfile -w start" || {
    echo "[entrypoint] ERROR: PostgreSQL failed to start. Check /var/lib/pgsql/16/logfile"
  }
fi

##################
# Apache (httpd) #
##################

echo "[entrypoint] Starting Apache (httpd) in foreground..."
exec httpd -D FOREGROUND
