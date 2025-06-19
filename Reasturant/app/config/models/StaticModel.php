<?php
namespace App\Models;

use App\Core\Model;

class StaticModel extends Model
{
    public function getBySection($section)
    {
        return $this->db->query("SELECT * FROM static_pages WHERE section = ?", [$section])->fetch();
    }
}