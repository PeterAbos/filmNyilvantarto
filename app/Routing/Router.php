<?php

namespace App\Routing;

use App\Controllers\HomeController;
use App\Controllers\ActorsController;
use App\Views\Display;

class Router
{
    public function handle(): void
    {
        $method = strtoupper($_SERVER['REQUEST_METHOD']);
        $requestUri = $_SERVER['REQUEST_URI'];

        if ($method === 'POST' && isset($_POST['_method'])) {
            $method = strtoupper($_POST['_method']);
        }

        $this->dispatch($method, $requestUri);
    }

    private function dispatch(string $method, string $requestUri): void
    {
        switch($method) {
            case 'GET':
                $this->handleGetRequests($requestUri);
                break;
            case 'POST':
                $this->handlePostRequests($requestUri);
                break;
            case 'PATCH':
                $this->handlePatchRequests($requestUri);
                break;
            case 'DELETE':
                $this->handleDeleteRequests($requestUri);
                break;
            default:
                $this->methodNotAllowed();
        }
    }

    private function handleGetRequests(mixed $requestUri) {
        switch ($requestUri) {
            case '/':
                HomeController::index();
                return;
            case '/actors':
                $actorsController = new ActorsController();
                $actorsController->index();
                break;
        }
    }

    private function handlePostRequests(mixed $requestUri) {
        $data = $this->filterPostData($_POST);
        $id = $data['id'] ?? null;

        switch ($requestUri) {
            case '/actors/edit':
                $actorsController = new ActorsController();
                $actorsController->edit($id);
                break;
        }
    }

    private function handlePatchRequests(mixed $requestUri) {
        $data = $this->filterPostData($_POST);
        switch($requestUri) {
            case '/actors':
                $id = $data['id'] ?? null;
                $actorsController = new ActorsController();
                $actorsController->update($id, $data);
                break;
        }
    }

    private function handleDeleteRequests(mixed $requestUri) {
        
    }

    private function methodNotAllowed(): void
    {
        header ($_SERVER['SERVER_PROTOCOL'] . ' 405 Method Not Allowed');
        Display::message("405 Method Not Allowed");
    }
    private function filterPostData(array $data): array
    {
        // Remove unnecessary keys in a clean and simple way
        $filterKeys = ['_method', 'submit', 'btn-del', 'btn-save', 'btn-edit', 'btn-plus', 'btn-update'];
        return array_diff_key($data, array_flip($filterKeys));
    }
    private function notFound(): void
    {
        header ($_SERVER['SERVER_PROTOCOL'] . ' 404 Not Found');
        Display::message("404 Not Found");
    }


}