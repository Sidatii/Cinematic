<?php

class Managers extends Controller
{

  private $managerModel;

  public function __construct()
  {
    $this->managerModel = $this->model('Manager');
  }

  public function index()
  {
    $data = [
      'title' => 'Admin dashboard'
    ];

  }

  public function cruises()
  {
    // Get cruises
    $cruises = $this->managerModel->getCruises();
    $data = [
      'cruises' => $cruises
    ];
  }

  public function ships()
  {
    $data = [
      'title' => 'Edit ships'
    ];
  }

  public function features()
  {
    $data = [
      'title' => 'Edit features'
    ];
  }


  public function addCruisePage()
  {
    $data = [
      'title' => 'Add cruises'
    ];

  }

  public function addCruise()
  {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $_POST = filter_input_array(INPUT_POST);
      $data = $_POST;
    }
    $data['img'] = $_FILES["image"]["name"];
    
    if($this->managerModel->addCruise($data)){
      move_uploaded_file($_FILES["image"]["tmp_name"], "./img/" . $data['img']);
      
    }
    
  }

  public function userUpdate($id){
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      // here we process the form
      // Sanitize POST data

      $_POST = filter_input_array(INPUT_POST);
      $data = $_POST;
      $data['id'] = $id;
      $data['img'] = $_FILES["image"]["name"];
    }
    if($this->managerModel->userUpdate($data)){
    }
  }

  public function addShipPage()
  {
    $data = [
      'title' => 'Add Ship'
    ];

  }

  public function addShip()
  {
  }

  public function h()
  {
    $data = [
      'title' => 'Add cruises'
    ];

  }

  public function movieDelete()
  {
  }
public function delete($id){
    if ($this->managerModel->delete($id)){

    }

}

public function getUsers(){
  header('Access-Control-Allow-Origin: *');
    header('Content-type: application/json');
    if($_SERVER['REQUEST_METHOD'] == 'GET') {
      $data = $this->managerModel->getUsers();   
    
      echo json_encode($data);
    } else {
      echo json_encode('404 ERROR');
      die();
    }
}

}