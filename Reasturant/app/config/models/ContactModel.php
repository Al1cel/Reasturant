<?php
namespace App\Models;

use App\Core\Model;

class ContactModel extends Model
{
    public function createContact($data)
    {
        return $this->db->query(
            "INSERT INTO contacts (name, email, phone, message) VALUES (?, ?, ?, ?)",
            [$data['name'], $data['email'], $data['phone'], $data['message']]
        );
    }
}