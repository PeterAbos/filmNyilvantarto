<?php

namespace App\Models;

class ActorsModel extends Model {

    public string $name;
    public string $birth_date;

    protected static $table = 'actors';

    function __construct(string $name, string $birth_date)
    {
        parent::__construct();
        $this->name = $name;
        $this->birth_date = $birth_date;
    }
}