<?php

class Managers extends Controller
{

  private $moviesModel;

  public function __construct()
  {
    $this->moviesModel = $this->model('Movies');
  }

  public function index()
  {
    $data = [
      'title' => 'Admin dashboard'
    ];

  }

  // public function addCruise()
  // {
  //   if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  //     $_POST = filter_input_array(INPUT_POST);
  //     $data = $_POST;
  //   }
  //   $data['img'] = $_FILES["image"]["name"];
    
  //   if($this->managerModel->addCruise($data)){
  //     move_uploaded_file($_FILES["image"]["tmp_name"], "./img/" . $data['img']);
      
  //   }
    
  // }

  // public function userUpdate($id){
  //   if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  //     // here we process the form
  //     // Sanitize POST data

  //     $_POST = filter_input_array(INPUT_POST);
  //     $data = $_POST;
  //     $data['id'] = $id;
  //     $data['img'] = $_FILES["image"]["name"];
  //   }
  //   if($this->managerModel->userUpdate($data)){
  //   }
  // }

  // public function addShipPage()
  // {
  //   $data = [
  //     'title' => 'Add Ship'
  //   ];

  // }

  // public function addShip()
  // {
  // }

  // public function h()
  // {
  //   $data = [
  //     'title' => 'Add cruises'
  //   ];

  // }

  



}