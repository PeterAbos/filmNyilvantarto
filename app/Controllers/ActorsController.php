<?php

namespace App\Controllers;

use App\Models\ActorsModel;
use App\Views\Display;

class GuestController extends Controller {

    public function __construct()
    {
        $actors = new ActorsModel();
        parent::__construct($actors);
    }

    public function index(): void
    {
        $actors = $this->model->all(['order_by' => ['name'], 'direction' => ['DESC']]);
        $this->render('actors/index', ['actors' => $actors]);
    }

    public function create(): void
    {
        $this->render('actors/create');
    }
    public function edit(int $id): void
    {
        $actor = $this->model->find($id);
        if (!$actor) {
            // Handle invalid ID gracefully
            $_SESSION['warning_message'] = "A színész a megadott azonosítóval: $id nem található.";
            $this->redirect('/actors');
        }
        $this->render('actors/edit', ['actor' => $actor]);
    }

    public function save(array $data): void
    {
        if (empty($data['name'])) {
            $_SESSION['warning_message'] = "A színész neve kötelező mező.";
            $this->redirect('/actors/create'); // Redirect if input is invalid
        }
        // Use the existing model instance
        $this->model->name = $data['name'];
        $this->model->birth_date = $data['birth_date'];
        $this->model->create();
        $this->redirect('/actors');
    }

    public function update(int $id, array $data): void
    {
        $actor = $this->model->find($id);
        if (!$actor || empty($data['name'])) {
            // Handle invalid ID or data
            $this->redirect('/actors');
        }
        $actor->name = $data['name'];
        $actor->birth_date = $data['birth_date'];
        $actor->update();
        $this->redirect('/actors');
    }

    function show(int $id): void
    {
        $actor = $this->model->find($id);
        if (!$actor) {
            $_SESSION['warning_message'] = "A színész a megadott azonosítóval: $id nem található.";
            $this->redirect('/actors'); // Handle invalid ID
        }
        $this->render('actors/show', ['actor' => $actor]);
    }

    function delete(int $id): void
    {
        $actor = $this->model->find($id);
        if ($actor) {
            $result = $actor->delete();
            if ($result) {
                $_SESSION['success_message'] = 'Sikeresen törölve';
            }
        }

        $this->redirect('/actors'); // Redirect regardless of success
    }
}