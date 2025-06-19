<?php
namespace App\Models;

class StaticContent extends \App\Core\Model {
    protected $table = 'static_content';
    
    public function getByPageAndSection($page, $section) {
        $stmt = $this->db->prepare("SELECT * FROM {$this->table} WHERE page = ? AND section = ?");
        $stmt->execute([$page, $section]);
        return $stmt->fetch();
    }
}