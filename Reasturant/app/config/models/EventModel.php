<?php
namespace App\Models;

use App\Core\Model;

class EventModel extends Model
{
    public function getAll()
    {
        return $this->db->query("SELECT * FROM events")->fetchAll();
    }
}