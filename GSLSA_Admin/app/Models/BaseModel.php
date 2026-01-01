<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;

class BaseModel extends Model
{
    protected $table;

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->setSchemaFromSession();
    }

    /**
     * Set the schema based on the session language.
     */
    protected function setSchemaFromSession()
    {
        $schema = Session::get('search_path', 'english_schema'); // Default to 'english_schema' if not set
        $this->table = "{$schema}." . $this->getTable(); // Set the table dynamically with the schema
    }

    /**
     * Optional: Allow manual setting of schema if needed.
     */
    public function setSchema($schema)
    {
        $this->table = "{$schema}." . $this->getTable();
    }
}
