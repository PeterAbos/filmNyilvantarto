<?php

namespace App\Models;

class StudioModel extends Model {

    public string $name;

    protected static $table = 'studio';

    function __construct(string $name)
    {
        parent::__construct();
        $this->name = $name;
    }
}