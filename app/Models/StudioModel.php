<?php

namespace App\Models;

class StudioModel extends Model {

    public string|null $name = null;

    protected static $table = 'studio';

    function __construct(?string $name = null)
    {
        parent::__construct();
        if ($name) {
            $this->name = $name;
        }
    }
}