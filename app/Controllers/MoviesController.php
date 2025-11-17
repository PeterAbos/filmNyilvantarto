<?php

namespace App\Controllers;

use App\Models\Model;
use App\Models\MoviesModel;
use App\Views\Display;

class MoviesController extends Controller {

    public function __construct()
    {
        $movies = new MoviesModel();
        parent::__construct($movies);
    }

    public function index(): void
    {
        $movies = $this->model->all(['order_by' => ['title'], 'direction' => ['DESC']]);
        $this->render('movies/index', ['movies' => $movies]);
    }

    public function create(): void
    {
        $studios = new StudiosController();
        $directors = new DirectorsController();
        $categories = new CategoryController();
        $this->render('movies/create', ['studios' => $studios->model, 'directors' => $directors->model, 'categories' => $categories->model]);
    }
    public function edit(int $id): void
    {
        $movie = $this->model->find($id);
        if (!$movie) {
            // Handle invalid ID gracefully
            $_SESSION['warning_message'] = "A film a megadott azonosítóval: $id nem található.";
            $this->redirect('/movies');
        }

        $studios = new StudiosController();
        $directors = new DirectorsController();
        $categories = new CategoryController();
        $this->render('movies/edit', ['movie' => $movie, 'studios' => $studios->model, 'directors' => $directors->model, 'categories' => $categories->model]);
    }

    public function save(array $data): void
    {
        if (empty($data['title'])) {
            $_SESSION['warning_message'] = "A film neve kötelező mező.";
            $this->redirect('/movies/create'); // Redirect if input is invalid
        }
        // Use the existing model instance
        $this->model->title = $data['title'];
        $this->model->duration = $data['duration'];
        $this->model->studio_id = $data['studio_id'];
        $this->model->director_id = $data['director_id'];
        $this->model->category_id = $data['category_id'];
        $this->model->release_year = $data['release_year'];
        $this->model->rating_avg = 0;
        $this->model->rating_count = 0;
        $this->model->create();
        $this->redirect('/movies');
    }

    public function update(int $id, array $data): void
    {
        $movie = $this->model->find($id);
        if (!$movie || empty($data['title'])) {
            // Handle invalid ID or data
            $this->redirect('/movies');
        }
        $movie->title = $data['title'];
        $movie->duration = $data['duration'];
        $movie->studio_id = $data['studio_id'];
        $movie->director_id = $data['director_id'];
        $movie->category_id = $data['category_id'];
        $movie->release_year = $data['release_year'];
        $movie->rating_avg = $data['rating_avg'];
        $movie->rating_count = $data['rating_count'];
        if ($data['rating_count'] != 0) {
            $movie->rating_avg = round(((($data['rating_count']-1)*$data['rating_avg'])+$data['rate'])/$data['rating_count'], 2);
            $movie->rating_count = $data['rating_count'];
        }
        $movie->update();
        $this->redirect('/movies');
    }

    function show(int $id): void
    {
        $movie = $this->model->find($id);
        if (!$movie) {
            $_SESSION['warning_message'] = "A film a megadott azonosítóval: $id nem található.";
            $this->redirect('/movies'); // Handle invalid ID
        }
        $this->render('movies/show', ['movie' => $movie]);
    }

    function delete(int $id): void
    {
        $movie = $this->model->find($id);
        if ($movie) {
            $result = $movie->delete();
            if ($result) {
                $_SESSION['success_message'] = 'Sikeresen törölve';
            }
        }

        $this->redirect('/movies'); // Redirect regardless of success
    }
}