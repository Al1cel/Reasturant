<?php
namespace App\Controllers;

use App\Core\Controller;
use App\Models\ContactModel;

class ContactController extends Controller
{
    private $model;

    public function __construct()
    {
        $this->model = $this->model('ContactModel');
    }

    public function index()
    {
        
    }

    public function create()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'name' => filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING),
                'email' => filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL),
                'phone' => filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_STRING),
                'message' => filter_input(INPUT_POST, 'message', FILTER_SANITIZE_STRING)
            ];

            if ($this->model->createContact($data)) {
                $this->jsonResponse(['success' => true, 'message' => 'Message sent successfully']);
            } else {
                $this->jsonResponse(['success' => false, 'message' => 'Failed to send message'], 500);
            }
        }
    }
}