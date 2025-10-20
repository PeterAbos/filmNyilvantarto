<?php

namespace App\Models;

class MoviesModel extends Model {

    public string $title;
    public int $duration;
    public int $studio_id;
    public int $director_id;
    public int $category_id;
    public int $release_year;

    protected static $table = 'movies';

    function __construct(string $title, int $duration, int $studio_id, int $director_id, int $category_id, int $release_year)
    {
        parent::__construct();
        $this->title = $title;
        $this->duration = $duration;
        $this->studio_id = $studio_id;
        $this->director_id = $director_id;
        $this->category_id = $category_id;
        $this->release_year = $release_year;
    }
}