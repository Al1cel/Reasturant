<?php
namespace App\Controllers;

use App\Core\Controller;
use App\Models\StaticModel;
use App\Models\SpecialtyModel;
use App\Models\EventModel;
use App\Models\MenuModel;

class StaticController extends Controller
{
    private $staticModel;
    private $specialtyModel;
    private $eventModel;
    private $menuModel;

    public function __construct()
    {
        $this->staticModel = $this->model('StaticModel');
        $this->specialtyModel = $this->model('SpecialtyModel');
        $this->eventModel = $this->model('EventModel');
        $this->menuModel = $this->model('MenuModel');
    }

    public function about()
    {
        $data = $this->staticModel->getBySection('about');
        $this->view('home', ['aboutData' => $data]);
    }

    public function team()
    {
        $data = $this->staticModel->getBySection('team');
        $this->view('home', ['teamData' => $data]);
    }

    public function specialties()
    {
        $data = $this->specialtyModel->getAll();
        $this->view('home', ['specialties' => $data]);
    }

    public function menu($category = 'pizza')
    {
        $menuItems = $this->menuModel->getByCategory($category);
        $this->jsonResponse(['items' => $menuItems]);
    }

    public function events()
    {
        $data = $this->eventModel->getAll();
        $this->view('home', ['events' => $data]);
    }
}