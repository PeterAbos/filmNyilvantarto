<?php

namespace App\Models;

class CategoryModel extends Model {

    public string $name;

    protected static $table = 'category';

    function __construct(string $name)
    {
        parent::__construct();
        $this->name = $name;
    }
}