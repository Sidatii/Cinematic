<?php

class Booking
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getCruises()
    {
        $this->db->query('SELECT * 
                        FROM cruise c
                        INNER JOIN  port p
                        ON c.ID_cruise = p.ID_cruise
                        ORDER BY cruise.departure_date ASC
                        ');

        $results = $this->db->resultSet();

        return $results;
    }

    public function insert($data)
    {
        $this->db->query('INSERT INTO `booking`(`ID_movie`,`token`, `place`) VALUES(:id, :token, :place)');
        $this->db->bind(':id', $data->ID_movie);
        $this->db->bind(':token', $data->token);
        $this->db->bind(':place', $data->place);
        return $this->db->execute();
    }

    public function update($data)
    {
        $this->db->query('UPDATE `booking` SET `ID_movie`= :idm ,`token`= :token,`place`=:place WHERE `ID`=:id');

        $this->db->bind(':id', $data->ID);
        $this->db->bind(':idm', $data->ID_movie);
        $this->db->bind(':token', $data->token);
        $this->db->bind(':place', $data->place);
        return $this->db->execute();
    }

    public function delete($id)
    {
        $this->db->query('DELETE FROM booking WHERE ID=:id');
        $this->db->bind('id', $id);
        return $this->db->execute();
    }

    public function getBooings()
    {
        $this->db->query('SELECT * FROM booking');
        return $this->db->resultSet();
    }

    public function getTicket($id){
        // echo json_encode($id);
        // die();
        $this->db->query('SELECT * FROM booking b INNER JOIN movie m ON b.ID_movie = m.ID INNER JOIN user u ON b.token = u.token INNER JOIN room r ON b.ID_room = r.ID WHERE b.ID = :id');
        $this->db->bind(':id', $id);
        return $this->db->single();
    }

    public function getBooking($data){
        $this->db->query('SELECT * FROM booking ORDER BY ID DESC LIMIT 1');
        return $this->db->single();
    }
}
