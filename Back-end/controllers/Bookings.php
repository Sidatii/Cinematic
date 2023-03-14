<?php

class Bookings extends Controller
{

    private $bookingModel;

    public function __construct()
    {
        $this->bookingModel = $this->model('Booking');
    }

    public function index()
    {
        $data = [
            'title' => 'Admin dashboard'
        ];
    }

    public function bookSeats()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            $data = json_decode(file_get_contents("php://input"));
            try {
                foreach ($data->seats as $seat) {
                    $this->bookingModel->bookSeats($data->id_movie, $data->id_user, $seat);
                }
                $output = [
                    "status" => 1,
                    "message" => 'You have booked your ticket'
                ];
                echo json_encode($output);
                die();
            } catch (Exception $e) {
                $output = [
                    "status" => 0,
                    "message" => $e->getMessage()
                ];
                echo json_encode($output);
                die();
            }

        } else {
            $output = [
                "message" => 'not found'
            ];
            echo json_encode($output, 404);
            die();
        }
    }

public function bookings($id)
{
    if ($_SERVER['REQUEST_METHOD'] == 'GET') {
        $data = $this->bookingModel->bookings($id);
        echo json_encode($data);
        die();
    }
}

public
function booking($id)
{
    if ($_SERVER['REQUEST_METHOD'] == 'GET') {
        $data = $this->bookingModel->booking($id);
        echo json_encode($data);
        die();
    }
}

public
function bookedPlaces($id)
{
    if ($_SERVER['REQUEST_METHOD'] == 'GET') {
        $data = $this->bookingModel->bookedPlaces($id);
        echo json_encode($data);
        die();
    } else {
        return http_response_code(500);
    }
}

public
function ticket($id)
{
    if ($_SERVER['REQUEST_METHOD'] == 'GET') {
        $data = $this->bookingModel->ticket($id);
        echo json_encode($data);
        die();
    }
}

public
function cancel()
{
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $data = json_decode(file_get_contents("php://input"));
        if ($this->bookingModel->cancel($data->id)) {
            $output = [
                "status" => 1,
                "message" => 'Your booking has been cancelled'
            ];
            echo json_encode($output);
            die();
        } else {
            $output = [
                "status" => 0,
                "message" => 'An error occured while cancelling your booking, please try again later'
            ];
            echo json_encode($output);
            die();
        }
    }
}


}
