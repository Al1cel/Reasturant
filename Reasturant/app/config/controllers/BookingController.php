<?php
namespace App\Controllers;

use App\Core\Controller;
use App\Models\BookingModel;

class BookingController extends Controller
{
    private $model;

    public function __construct()
    {
        $this->model = $this->model('BookingModel');
    }

    public function index()
    {
        
    }

    public function create()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'name' => filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING),
                'email' => filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL),
                'phone' => filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_STRING),
                'people' => filter_input(INPUT_POST, 'people', FILTER_SANITIZE_NUMBER_INT),
                'date' => $_POST['date'],
                'time' => $_POST['time']
            ];

            if ($this->model->createBooking($data)) {
               
                $this->sendBookingEmail($data);
                $this->jsonResponse(['success' => true, 'message' => 'Booking successful']);
            } else {
                $this->jsonResponse(['success' => false, 'message' => 'Booking failed'], 500);
            }
        }
    }

    private function sendBookingEmail($data)
    {
        $to = $data['email'];
        $subject = 'Booking Confirmation';
        $message = "Dear {$data['name']},\n\nThank you for your booking at Hunger Restaurant.\n\n";
        $message .= "Booking Details:\n";
        $message .= "Date: {$data['date']}\n";
        $message .= "Time: {$data['time']}\n";
        $message .= "Number of people: {$data['people']}\n\n";
        $message .= "We look forward to serving you!\n\nBest regards,\nHunger Restaurant Team";

        $headers = "From: office@hunger.com\r\n";
        $headers .= "Reply-To: office@hunger.com\r\n";
        $headers .= "X-Mailer: PHP/" . phpversion();

        mail($to, $subject, $message, $headers);
    }
}