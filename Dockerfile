# Use the latest AlmaLinux image as the base
FROM almalinux/9-minimal

# Install dnf, update packages, and install Apache, PHP, and required extensions
RUN microdnf -y install dnf && \
    dnf -y update && \
    dnf -y install httpd  && \
    dnf -y --allowerasing install curl

RUN dnf install -y https://rpms.remirepo.net/enterprise/remi-release-9.rpm
RUN dnf install -y dnf-utils
RUN dnf module -y enable php:remi-8.3

RUN dnf -y install php php-cli php-fpm php-mbstring php-xml php-bcmath php-json php-pdo php-pgsql php-zip php-opcache

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --version=2.8.4 --install-dir=/usr/local/bin --filename=composer

RUN curl -sL https://rpm.nodesource.com/setup_22.x | bash - && \
    dnf install -y nodejs

# Install PostgreSQL 16
RUN dnf install -y https://download.postgresql.org/pub/repos/yum/reporpms/EL-9-x86_64/pgdg-redhat-repo-latest.noarch.rpm && \
    dnf -qy module disable postgresql && \
    dnf install -y postgresql16 postgresql16-server postgresql16-contrib

# Install Redis and PHP Redis extension
RUN dnf -y install redis && \
    dnf -y install php-pecl-redis

# Install procps for pgrep
RUN dnf -y install procps

# Copy start.sh script and make it executable
COPY start.sh /start.sh
RUN chmod +x /start.sh

# Expose port 80 to allow web traffic
EXPOSE 80 800 5432 5175 5176

# Set the entrypoint to start.sh
ENTRYPOINT ["/start.sh"]
