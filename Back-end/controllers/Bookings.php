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

  public function update()
  {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $data = json_decode(file_get_contents("php://input"));
      if ($this->bookingModel->update($data)) {
          $output = [
            "status" => 1,
            "message" => 'Your booking has been updated'
          ];
          echo json_encode($output);
          die();
        } else {
          $output = [
            "status" => 0,
            "message" => 'An error occured while updating your booking, please try again later'
          ];
          echo json_encode($output);
          die();
        }
      }
    }





}
