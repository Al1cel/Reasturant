<?php
namespace App\Models;

use App\Core\Model;

class BookingModel extends Model
{
    public function createBooking($data)
    {
        return $this->db->query(
            "INSERT INTO bookings (name, email, phone, people, date, time) VALUES (?, ?, ?, ?, ?, ?)",
            [$data['name'], $data['email'], $data['phone'], $data['people'], $data['date'], $data['time']]
        );
    }
}