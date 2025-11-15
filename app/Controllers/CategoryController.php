<?php

namespace App\Controllers;

use App\Models\CategoryModel;
use App\Views\Display;

class CategoryController extends Controller {

    public function __construct()
    {
        $categories = new CategoryModel();
        parent::__construct($categories);
    }

    public function index(): void
    {
        $categories = $this->model->all(['order_by' => ['name'], 'direction' => ['DESC']]);
        $this->render('categories/index', ['categories' => $categories]);
    }

    public function create(): void
    {
        $this->render('categories/create');
    }
    public function edit(int $id): void
    {
        $category = $this->model->find($id);
        if (!$category) {
            // Handle invalid ID gracefully
            $_SESSION['warning_message'] = "A kategória a megadott azonosítóval: $id nem található.";
            $this->redirect('/categories');
        }
        $this->render('categories/edit', ['category' => $category]);
    }

    public function save(array $data): void
    {
        if (empty($data['name'])) {
            $_SESSION['warning_message'] = "A kategória neve kötelező mező.";
            $this->redirect('/categories/create'); // Redirect if input is invalid
        }
        // Use the existing model instance
        $this->model->name = $data['name'];
        $this->model->create();
        $this->redirect('/categories');
    }

    public function update(int $id, array $data): void
    {
        $category = $this->model->find($id);
        if (!$category || empty($data['name'])) {
            // Handle invalid ID or data
            $this->redirect('/categories');
        }
        $category->name = $data['name'];
        $category->update();
        $this->redirect('/categories');
    }

    function show(int $id): void
    {
        $category = $this->model->find($id);
        if (!$category) {
            $_SESSION['warning_message'] = "A kategória a megadott azonosítóval: $id nem található.";
            $this->redirect('/categories'); // Handle invalid ID
        }
        $this->render('categories/show', ['category' => $category]);
    }

    function delete(int $id): void
    {
        $category = $this->model->find($id);
        if ($category) {
            $result = $category->delete();
            if ($result) {
                $_SESSION['success_message'] = 'Sikeresen törölve';
            }
        }

        $this->redirect('/categories'); // Redirect regardless of success
    }
}