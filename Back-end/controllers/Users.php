<?php
class Users extends Controller
{

  private $usersModel;

  public function __construct()
  {
    $this->usersModel = $this->model('User');
  }

  public function signup()
  {
    header('Access-Control-Allow-Origin: *');
    header('Content-type: application/json');
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $data = filter_input_array(INPUT_POST);
      $token = uniqid(rand());
      $data['token'] = $token;
      // $data = extract($data);
      if ($this->usersModel->signup($data)) {
        $output = [
          'Status' => 'You are signed up successfully',
          'Token' => $token
        ];
        echo json_encode($output);
        die();
      } else {
        $output = [
          'Status' => 'Your request has not been processed'
        ];
        echo json_encode($output);
        die();
      }

    } else {
      $respnse = [
        'StatusCode' => '404',
        'Status' => 'Not Found'
      ];
      echo json_encode($respnse);
    }
  }

  public function signin()
  {
    header('Access-Control-Allow-Origin: *');
    header('Content-type: application/json');
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $token = INPUT_POST;
      $row = $this->usersModel->signin($token);
      echo json_encode(INPUT_POST);
      // if ($row) {
      //   echo json_encode($row);
      //   die();
      // }else{
      //   $message = [
      //     'status' => 'User not found, please create an account'
      //   ];
      //   echo json_encode($message);
      //   die();
      // }
    }
  }
}