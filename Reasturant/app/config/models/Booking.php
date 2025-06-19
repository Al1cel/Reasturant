<?php
namespace App\Models;

class Booking extends \App\Core\Model {
    protected $table = 'bookings';
    
    public function createBooking($data) {
        return $this->create([
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'people' => $data['people'],
            'date' => $data['date'],
            'time' => $data['time'],
            'message' => $data['message'] ?? null
        ]);
    }
}