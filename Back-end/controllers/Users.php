<?php
class Users extends Controller
{

  private $usersModel;

  public function __construct()
  {
    $this->usersModel = $this->model('Manager');
  }

  public function signup(){
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
      $data = filter_input_array(INPUT_POST);
      $token = uniqid(rand());
      $data['token'] = $token;
      // $data = extract($data);
      if ($this->usersModel->signup($data)){
        $output= [
          'Status' => 'You are signed up successfully',
          'Token' => $token
        ];
        echo json_encode($data);
      }else{
        $output = [
          'Status' => 'Your request has not been processed'
        ];
        echo json_encode($output);
      }
      
    }else{
      $respnse = [
        'StatusCode' => '404',
        'Status' => 'Not Found'
      ];
      echo json_encode($respnse);
    }
  }
}