<?php

namespace App\Models;

class ActorsModel extends Model {

    public string $name;

    protected static $table = 'actors';

    function __construct(string $name)
    {
        parent::__construct();
        $this->name = $name;
    }
}