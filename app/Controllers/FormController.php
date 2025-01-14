<?php

namespace App\Controllers;

use App\Validation\UserValidation;

class FormController
{
    public function handleRequest()
    {
        $action = $_SERVER['REQUEST_URI'] ?? 'home';
        switch ($action) {
            case '/form':
                $this->showForm();
                break;

            case '/result':
                $this->processForm();
                break;

            default:
                $this->showHome();
                break;
        }
    }

    private function showHome()
    {
        require_once __DIR__ . '/../Views/home/home.php';
    }

    private function showForm()
    {
        require_once __DIR__ . '/../Views/form/form.html';
    }

    private function processForm()
    {
        $formModel = new UserValidation();
        $data = $formModel->validate($_POST);

        require_once __DIR__ . '/../Views/result.php';
    }
}
