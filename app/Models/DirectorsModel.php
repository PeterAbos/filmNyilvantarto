<?php

namespace App\Models;

class DirectorsModel extends Model {

    public string $name;
    public string $birth_date;

    protected static $table = 'directors';

    function __construct(string $name, string $birth_date)
    {
        parent::__construct();
        $this->name = $name;
        $this->birth_date = $birth_date;
    }
}