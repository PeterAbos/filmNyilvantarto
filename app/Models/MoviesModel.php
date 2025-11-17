<?php

namespace App\Models;

use App\Models\StudioModel;
use App\Models\DirectorsModel;
use App\Models\CategoryModel;

class MoviesModel extends Model {

    public string|null $title = null;
    public int|null $duration = null;
    public int|null $studio_id = null;
    public int|null $director_id = null;
    public int|null $category_id = null;
    public int|null $release_year = null;
    public float|null $rating_avg = null;
    public int|null $rating_count = null;

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

    function getStudio() {
        $studioModel = new StudioModel();

        $result = $studioModel->find($this->studio_id);

        return $result;
    }

    function getDirector() {
        $directorModel = new DirectorsModel();

        $result = $directorModel->find($this->director_id);

        return $result;
    }

    function getCategory() {
        $categoryModel = new CategoryModel();

        $result = $categoryModel->find($this->category_id);

        return $result;
    }
}