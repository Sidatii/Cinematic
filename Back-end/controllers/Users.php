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
          http_response_code(200);
        $output = [
          'Message' => 'You are signed up successfully',
          'Token' => $data->token
        ];
        echo json_encode($output);
        die();
      } else {
          http_response_code(422);
        $output = [
          'Message' => 'An error occurred while submitting your form'
        ];
        echo json_encode($output);
        die();
      }
    } else {
        http_response_code(404);
      $response = [
        'Status' => 'Not Found'
      ];
      echo json_encode($response);
      die();
    }
  }

  public function signin()
  {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $token = json_decode(file_get_contents("php://input"));
      if (!empty($token)){
          http_response_code(406);
          $error = [
            'Message' =>  'Please fill out your token'
          ];
          echo json_encode($error);
          die();
      }else {
          $row = $this->usersModel->signin($token);
          if ($row) {
              http_response_code(200);
              $response = [
                  'message' => 'Logged in successfully',
                  'ID' => $row->ID,
                  'firstName' => $row->firstName,
                  'lastName' => $row->lastName,
                  'email' => $row->email,
              ];
              echo json_encode($response);
              die();
          } else {
              http_response_code(401);
              $error = [
                  'error' => 'Invalid input, please enter the correct token'
              ];
              echo json_encode($error);
              die();
          }
      }
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
