<?php

namespace App\Controllers;

use App\Models\StudioModel;
use App\Views\Display;

class StudiosController extends Controller {

    public function __construct()
    {
        $studios = new StudioModel();
        parent::__construct($studios);
    }

    public function index(): void
    {
        $studios = $this->model->all(['order_by' => ['name'], 'direction' => ['DESC']]);
        $this->render('studios/index', ['studios' => $studios]);
    }

    public function create(): void
    {
        $this->render('studios/create');
    }
    public function edit(int $id): void
    {
        $studio = $this->model->find($id);
        if (!$studio) {
            // Handle invalid ID gracefully
            $_SESSION['warning_message'] = "A stúdió a megadott azonosítóval: $id nem található.";
            $this->redirect('/studios');
        }
        $this->render('studios/edit', ['studio' => $studio]);
    }

    public function save(array $data): void
    {
        if (empty($data['name'])) {
            $_SESSION['warning_message'] = "A stúdió neve kötelező mező.";
            $this->redirect('/studios/create'); // Redirect if input is invalid
        }
        // Use the existing model instance
        $this->model->name = $data['name'];
        $this->model->create();
        $this->redirect('/studios');
    }

    public function update(int $id, array $data): void
    {
        $studio = $this->model->find($id);
        if (!$studio || empty($data['name'])) {
            // Handle invalid ID or data
            $this->redirect('/studios');
        }
        $studio->name = $data['name'];
        $studio->update();
        $this->redirect('/studios');
    }

    function show(int $id): void
    {
        $studio = $this->model->find($id);
        if (!$studio) {
            $_SESSION['warning_message'] = "A stúdió a megadott azonosítóval: $id nem található.";
            $this->redirect('/studios'); // Handle invalid ID
        }
        $this->render('studios/show', ['studio' => $studio]);
    }

    function delete(int $id): void
    {
        $studio = $this->model->find($id);
        if ($studio) {
            $result = $studio->delete();
            if ($result) {
                $_SESSION['success_message'] = 'Sikeresen törölve';
            }
        }

        $this->redirect('/studios'); // Redirect regardless of success
    }
}