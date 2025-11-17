<?php

namespace App\Controllers;

use App\Models\CastingModel;
use App\Controllers\MoviesController;
use App\Controllers\ActorsController;
use App\Views\Display;

class CastingController extends Controller {

    public function __construct()
    {
        $roles = new CastingModel();
        parent::__construct($roles);
    }

    public function index(): void
    {
        $roles = $this->model->all(['order_by' => ['movie_id'], 'direction' => ['DESC']]);
        $this->render('casting/index', ['roles' => $roles]);
    }

    public function create(): void
    {
        $this->render('casting/create');
    }
    public function edit(int $id): void
    {
        $role = $this->model->find($id);
        if (!$role) {
            // Handle invalid ID gracefully
            $_SESSION['warning_message'] = "A szerep a megadott azonosítóval: $id nem található.";
            $this->redirect('/casting');
        }

        $movies = new MoviesController();
        $actors = new ActorsController();
        $this->render('casting/edit', ['role' => $role, 'movies' => $movies->model, 'actors' => $actors->model]);
    }

    public function save(array $data): void
    {
        if (empty($data['actor_id'])) {
            $_SESSION['warning_message'] = "A szerep neve kötelező mező.";
            $this->redirect('/roles/create'); // Redirect if input is invalid
        }
        if (empty($data['movie_id'])) {
            $_SESSION['warning_message'] = "A film neve kötelező mező.";
            $this->redirect('/roles/create'); // Redirect if input is invalid
        }
        // Use the existing model instance
        $this->model->movie_id = $data['movie_id'];
        $this->model->actor_id = $data['actor_id'];
        $this->model->character_name = $data['character_name'];
        $this->model->create();
        $this->redirect('/casting');
    }

    public function update(int $id, array $data): void
    {
        $role = $this->model->find($id);
        if (!$role || empty($data['actor_id'])) {
            // Handle invalid ID or data
            $this->redirect('/casting');
        }
        if (!$role || empty($data['movie_id'])) {
            // Handle invalid ID or data
            $this->redirect('/casting');
        }
        $role->movie_id = $data['movie_id'];
        $role->actor_id = $data['actor_id'];
        $role->character_name = $data['character_name'];
        $role->update();
        $this->redirect('/casting');
    }

    function show(int $id): void
    {
        $role = $this->model->find($id);
        if (!$role) {
            $_SESSION['warning_message'] = "A szerep a megadott azonosítóval: $id nem található.";
            $this->redirect('/casting'); // Handle invalid ID
        }
        $this->render('casting/show', ['role' => $role]);
    }

    function delete(int $id): void
    {
        $role = $this->model->find($id);
        if ($role) {
            $result = $role->delete();
            if ($result) {
                $_SESSION['success_message'] = 'Sikeresen törölve';
            }
        }

        $this->redirect('/casting'); // Redirect regardless of success
    }
}