<?php

namespace App\Controllers;

use App\Models\DirectorsModel;
use App\Views\Display;

class DirectorsController extends Controller {

    public function __construct()
    {
        $directors = new DirectorsModel();
        parent::__construct($directors);
    }

    public function index(): void
    {
        $directors = $this->model->all(['order_by' => ['name'], 'direction' => ['DESC']]);
        $this->render('directors/index', ['directors' => $directors]);
    }

    public function create(): void
    {
        $this->render('directors/create');
    }
    public function edit(int $id): void
    {
        $director = $this->model->find($id);
        if (!$director) {
            // Handle invalid ID gracefully
            $_SESSION['warning_message'] = "A rendező a megadott azonosítóval: $id nem található.";
            $this->redirect('/directors');
        }
        $this->render('directors/edit', ['director' => $director]);
    }

    public function save(array $data): void
    {
        if (empty($data['name'])) {
            $_SESSION['warning_message'] = "A rendező neve kötelező mező.";
            $this->redirect('/directors/create'); // Redirect if input is invalid
        }
        // Use the existing model instance
        $this->model->name = $data['name'];
        $this->model->birth_date = $data['birth_date'];
        $this->model->create();
        $this->redirect('/directors');
    }

    public function update(int $id, array $data): void
    {
        $director = $this->model->find($id);
        if (!$director || empty($data['name'])) {
            // Handle invalid ID or data
            $this->redirect('/directors');
        }
        $director->name = $data['name'];
        $director->birth_date = $data['birth_date'];
        $director->update();
        $this->redirect('/directors');
    }

    function show(int $id): void
    {
        $director = $this->model->find($id);
        if (!$director) {
            $_SESSION['warning_message'] = "A rendező a megadott azonosítóval: $id nem található.";
            $this->redirect('/directors'); // Handle invalid ID
        }
        $this->render('directors/show', ['director' => $director]);
    }

    function delete(int $id): void
    {
        $director = $this->model->find($id);
        if ($director) {
            $result = $director->delete();
            if ($result) {
                $_SESSION['success_message'] = 'Sikeresen törölve';
            }
        }

        $this->redirect('/directors'); // Redirect regardless of success
    }
}