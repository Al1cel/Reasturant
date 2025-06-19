<?php
namespace App\Core;

class Controller {
    protected function view($view, $data = []) {
        extract($data);
        $viewPath = __DIR__ . "/../../views/{$view}.php";
        
        if (!file_exists($viewPath)) {
            throw new \Exception("View file {$viewPath} not found");
        }
        
        require $viewPath;
    }
    
    protected function model($model) {
        $modelClass = "App\\Models\\" . ucfirst($model);
        
        if (!class_exists($modelClass)) {
            throw new \Exception("Model {$modelClass} not found");
        }
        
        return new $modelClass();
    }
    
    protected function jsonResponse($data, $statusCode = 200) {
        header('Content-Type: application/json');
        http_response_code($statusCode);
        echo json_encode($data);
        exit;
    }
}