<?php

namespace App\Models;

class CategoryModel extends Model {

    public string|null $name = null;

    protected static $table = 'category';

    function __construct(?string $name = null)
    {
        parent::__construct();
        if ($name) {
            $this->name = $name;
        }
    }
}