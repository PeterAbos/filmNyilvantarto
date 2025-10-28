<?php

namespace App\Models;

class ActorsModel extends Model {

    public string|null $name = null;
    public string|null $birth_date = null;

    protected static $table = 'actors';

    function __construct(?string $name = null, ?string $birth_date = null)
    {
        parent::__construct();
        if ($name) {
            $this->name = $name;
        }
        if ($birth_date) {
            $this->birth_date = $birth_date;
        }
    }
}