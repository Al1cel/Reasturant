<?php
namespace App\Core;

class Controller
{
    public function model($model)
    {
        require_once '../app/models/' . $model . '.php';
        return new $model();
    }

    public function view($view, $data = [])
    {
        require_once '../app/views/partials/header.php';
        require_once '../app/views/' . $view . '.php';
        require_once '../app/views/partials/footer.php';
    }

    public function jsonResponse($data, $status = 200)
    {
        header('Content-Type: application/json');
        http_response_code($status);
        echo json_encode($data);
        exit;
    }
}