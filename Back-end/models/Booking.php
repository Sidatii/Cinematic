<?php

class Booking
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }
    public function book($data)
    {
        $this->db->query('INSERT INTO `booking`(`ID_movie`, `ID_room`,`ID_user`, `place`) VALUES(:id, :ID_room, :ID_user, :place)');
        $this->db->bind(':id', $data->ID_movie);
        $this->db->bind(':ID_room', $data->ID_room);
        $this->db->bind(':ID_user', $data->ID_user);
        $this->db->bind(':place', $data->place);
        return $this->db->execute();
    }

    public function cancel($id)
    {
        $this->db->query('DELETE FROM booking WHERE ID=:id');
        $this->db->bind('id', $id);
        return $this->db->execute();
    }

    public function bookings()
    {
        $this->db->query('SELECT * FROM booking');
        return $this->db->resultSet();
    }

    public function ticket($id){
        $this->db->query('SELECT u.firstName, u.lastName, b.ID, b.booked_at, b.place, m.name, m.broadcast_date, m.broadcast_time, r.name  FROM booking b INNER JOIN movie m ON b.ID_movie = m.ID INNER JOIN user u ON b.ID_user = u.ID INNER JOIN room r ON b.ID_room = r.ID WHERE b.ID = :id');
        $this->db->bind(':id', $id);
        return $this->db->single();
    }

    public function booking($data){
        $this->db->query('SELECT * FROM booking ORDER BY ID DESC LIMIT 1');
        return $this->db->single();
    }
}
