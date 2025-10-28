<?php

namespace App\Models;

class MoviesModel extends Model {

    public string|null $title = null;
    public int|null $duration = null;
    public int|null $studio_id = null;
    public int|null $director_id = null;
    public int|null $category_id = null;
    public int|null $release_year = null;

    protected static $table = 'movies';

    function __construct(?string $title = null, ?int $duration = null, ?int $studio_id = null, ?int $director_id = null, ?int $category_id = null, ?int $release_year = null)
    {
        parent::__construct();
        if ($title) {
            $this->title = $title;
        }
        if ($duration) {
            $this->duration = $duration;
        }
        if ($studio_id) {
            $this->studio_id = $studio_id;
        }
        if ($director_id) {
            $this->director_id = $director_id;
        }
        if ($category_id) {
            $this->category_id = $category_id;
        }
        if ($release_year) {
            $this->release_year = $release_year;
        }
    }
}