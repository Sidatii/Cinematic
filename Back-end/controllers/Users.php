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
      $data->token = $token;
      // echo  json_encode($token);
      // die();
      
      if ($this->usersModel->signup($data)) {
        $output = [
          'Status' => 'You are signed up successfully',
          // 'Token' => $token
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
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $token = json_decode(file_get_contents("php://input"));
      $row = $this->usersModel->signin($token);
      // echo json_encode(INPUT_POST);
      if (isset($row)) {
        // echo json_encode($row);
        // die();
        $firstName = $row->firstName;
        $lastName = $row->lastName;
        $email = $row->email;
        // $token = $row->token;

        echo json_encode([
          'status' => 1,
          // 'jwt' => $jwt,
          'message' => 'Loged in successfully'
        ]);
      }
    } else {
      echo json_encode([
        'status' => 0,
        'message' => 'Invalid credentials, please enter the correct token'
      ]);
      die();
    }
  }


  public function getToken($data)
  {
    $key='vDoWNVvoLBuil_L6v3vWDm4AwQz86v1vdU9wukQanGT8yYudqDPPeKJwFaXL-Nie';
    $jwt = JWT::encode($data,$key,'HS256');
    echo json_encode($jwt) ;
  }
}
