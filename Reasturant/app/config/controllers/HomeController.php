<?php
namespace App\Controllers;

use App\Core\Controller;
use App\Models\StaticModel;
use App\Models\SpecialtyModel;
use App\Models\EventModel;

class HomeController extends Controller
{
    private $staticModel;
    private $specialtyModel;
    private $eventModel;

    public function __construct()
    {
        $this->staticModel = $this->model('StaticModel');
        $this->specialtyModel = $this->model('SpecialtyModel');
        $this->eventModel = $this->model('EventModel');
    }

    public function index()
    {
        $data = [
            'aboutData' => $this->staticModel->getBySection('about'),
            'teamData' => $this->staticModel->getBySection('team'),
            'specialties' => $this->specialtyModel->getAll(),
            'events' => $this->eventModel->getAll()
        ];

        $this->view('home', $data);
    }
}