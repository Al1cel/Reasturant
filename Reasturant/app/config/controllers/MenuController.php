<?php
namespace App\Controllers;

use App\Models\MenuItem;

class MenuController extends \App\Config\Controllers {
    public function index() {
        $menuItem = new MenuItem();
        $menuItems = $menuItem->getMainItems();
        
        $this->views('pages/menu', [
            'menuItems' => $menuItems
        ]);
    }
    
    public function filter($category) {
        $menuItem = new MenuItem();
        $items = $menuItem->getByCategory($category);
        
        $this->jsonResponse($items);
    }
}