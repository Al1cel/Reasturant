<?php
namespace App\Models;

use App\Core\Model;

class AuthModel extends Model
{
    public function getUserByEmail($email)
    {
        return $this->db->query("SELECT * FROM users WHERE email = ?", [$email])->fetch();
    }

    public function emailExists($email)
    {
        $stmt = $this->db->query("SELECT COUNT(*) FROM users WHERE email = ?", [$email]);
        return $stmt->fetchColumn() > 0;
    }

    public function createUser($email, $password)
    {
        return $this->db->query("INSERT INTO users (email, password) VALUES (?, ?)", [$email, $password]);
    }
}