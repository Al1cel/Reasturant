<?php
namespace App\Models;

use App\Core\Model;

class MenuModel extends Model
{
    public function getByCategory($category)
    {
        return $this->db->query(
            "SELECT * FROM menu_items WHERE category = ? AND on_main = 1 LIMIT 21",
            [$category]
        )->fetchAll();
    }
}