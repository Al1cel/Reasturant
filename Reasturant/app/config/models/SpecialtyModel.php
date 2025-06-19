<?php
namespace App\Models;

use App\Core\Model;

class SpecialtyModel extends Model
{
    public function getAll()
    {
        return $this->db->query("SELECT * FROM specialties")->fetchAll();
    }
}