<?php
namespace App\Models;

class MenuItem extends \App\Core\Model {
    protected $table = 'menu_items';
    
    public function getMainItems() {
        $stmt = $this->db->query("SELECT * FROM {$this->table} WHERE on_main = 1 LIMIT 21");
        return $stmt->fetchAll();
    }
    
    public function getByCategory($category) {
        $stmt = $this->db->prepare("SELECT * FROM {$this->table} WHERE category = ?");
        $stmt->execute([$category]);
        return $stmt->fetchAll();
    }
}