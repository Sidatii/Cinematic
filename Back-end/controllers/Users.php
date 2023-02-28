<?php

use Firebase\JWT\JWT;



class Users extends Controller
{

  private $usersModel;

  public function __construct()
  {
    $this->usersModel = $this->model('User');
  }

  public function signup()
  {

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

      $data = json_decode(file_get_contents("php://input"));
      // $token = $this->getToken($data);
      $token = $this->getToken($data);

      $data->token = json_decode($token);

      if ($this->usersModel->signup($data)) {
        $output = [
          'Status' => 'You are signed up successfully',
          'Token' => $data->token
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
      $response = [
        'StatusCode' => '404',
        'Status' => 'Not Found'
      ];
      echo json_encode($response);
    }
  }

  public function signin()
  {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $token = json_decode(file_get_contents("php://input"));
      $row = $this->usersModel->signin($token);
      if ($row) {
        $response = [
          'status' => 1,
          'message' => 'Logged in successfully',
          'ID' => $row->ID,
          'firstName' => $row->firstName,
          'lastName' => $row->lastName,
          'email' => $row->email,
          'Token' => $row->token
        ];
        echo json_encode($response);
        die();
      } else {
        echo json_encode([
          'status' => 0,
          'message' => 'Invalid credentials, please enter the correct token'
        ]);
      }
        die();
    }
  }


  public function getToken($data)
  {
    $key = 'vDoWNVvoLBuil_L6v3v';
    $jwt = JWT::encode(array($data), $key, 'HS256');
    return json_encode($jwt);
  }

  public function getUser(){
    $token = json_decode(file_get_contents("php://input"));
    echo json_encode($this->usersModel->getUser($token));
    die();
  }
}
