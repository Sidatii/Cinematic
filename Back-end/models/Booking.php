<?php

class Booking
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }
    public function bookSeats($id_movie,$id_user, $place)
    {
        $this->db->query('INSERT INTO `booking`(`ID_movie`, `ID_user`, `place`) VALUES(:id_movie, :id_user, :place)');
        $this->db->bind(':id_movie', $id_movie);
        $this->db->bind(':id_user', $id_user);
        $this->db->bind(':place', $place);
        return $this->db->execute();
    }

    public function cancel($id)
    {
//        var_dump($id);
//        die();
        $this->db->query('DELETE FROM booking WHERE ID=:id');
        $this->db->bind('id', $id);
        return $this->db->execute();
    }

    public function bookings($id)
    {
        $this->db->query('SELECT b.ID, b.place, b.ID_user, b.booked_at, m.ID as ID_movie, m.name as movie, m.broadcast_date, m.broadcast_time, r.ID as ID_room, r.name as room FROM booking b INNER JOIN movie m ON b.ID_movie = m.ID INNER JOIN room r ON m.room_id=r.ID WHERE b.ID_user = :id');
        $this->db->bind(':id', $id);
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

    public function booked($id){
        $this->db->query('SELECT * FROM booking WHERE ID_user = :id');
        $this->db->bind(':id', $id);
        return $this->db->resultSet();
    }

    public function bookedPlaces($id){
        $this->db->query('SELECT place FROM booking WHERE ID_movie = :ID_movie');
        $this->db->bind(':ID_movie', $id);
        return $this->db->resultSetArray();
    }
}
