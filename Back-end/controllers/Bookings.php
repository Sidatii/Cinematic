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

  public function book()
  {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $data = json_decode(file_get_contents("php://input"));

      if($this->bookingModel->insert($data)){
        $row = $this->bookingModel->getBooking($data);
        $output = [
          "status" => 1,
          "message" => 'You have booked your ticket',
          "ticket" => $this->bookingModel->getTicket($row->ID)
        ];
        echo json_encode($output);
        die();
      } else {
        $output = [
          "status" => 0,
          "message" => 'An error occured while booking your ticket, please try again later'
        ];
        echo json_encode($output);
        die();
      }  
      }
    }

    public function bookings()
    {
      if ($_SERVER['REQUEST_METHOD'] == 'GET') {
        $data = $this->bookingModel->bookings();
        echo json_encode($data);
        die();
      }
    }

    public function booking($id)
    {
      if ($_SERVER['REQUEST_METHOD'] == 'GET') {
        $data = $this->bookingModel->booking($id);
        echo json_encode($data);
        die();
      }
    }

    public function ticket($id)
    {
      if ($_SERVER['REQUEST_METHOD'] == 'GET') {
        $data = $this->bookingModel->ticket($id);
        echo json_encode($data);
        die();
      }
    }

    public function cancel()
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
