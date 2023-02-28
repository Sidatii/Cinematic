<?php
class User{
    private $db;

    public function __construct(){
        $this->db = new Database;
    }

    // Sign up user
    public function signup($data){
        // echo json_encode($data);
        // die();
        $this->db->query('INSERT INTO user (token, firstName, lastName, email)VALUES (:token, :firstName, :lastName, :email)');

        // Bind values
        // $data['token'] = password_hash($data['token'], PASSWORD_DEFAULT);
        $this->db->bind(':token', $data->token);
        $this->db->bind(':firstName', $data->firstName);
        $this->db->bind(':lastName', $data->lastName);
        $this->db->bind(':email', $data->email);

        // Execute
        if($this->db->execute()){
            return true;
        } else{
            return false;
        }

    }

    // Login user
    public function signin($token){
        $this->db->query('SELECT * FROM user WHERE token LIKE :token');

        // $hashed_token = password_hash($token, PASSWORD_DEFAULT);
        $this->db->bind(':token', $token->token);
        $row = $this->db->single();
        if($this->db->rowCount() > 0){
                return $row;
            } else{
                return false;
        }
    }

    // Find user by email
    public function findUserByEmail($email){
        $this->db->query('SELECT * FROM users WHERE email = :email');
        $this->db->bind(':email', $email);

        $row = $this->db->single();
        

        //check row
        if($this->db->rowCount() > 0){
            return true;
        } else {
            return false;
        }
    }

    public function getUser($token){
        $this->db->query('SELECT * FROM user WHERE token LIKE :token');

        // $hashed_token = password_hash($token, PASSWORD_DEFAULT);
        $this->db->bind(':token', $token->token);
        $row = $this->db->single();
        if($this->db->rowCount() > 0){
                return $row;
            } else{
                return false;
        }
    }

        
}