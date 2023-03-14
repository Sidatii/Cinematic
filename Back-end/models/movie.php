<?php

class Movie
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getMovies(){
        $this->db->query('SELECT m.ID, m.name, m.release_date, m.image, m.cover, m.broadcast_date, m.broadcast_time, m.added_at, r.ID as id_room, r.name as room FROM movie m INNER JOIN room r ON m.room_id=r.ID ORDER BY m.release_date DESC');
        return $this->db->resultSet();
    }

    public function book($data){
        $this->db->query('INSERT INTO booking (movie_id, user_id) VALUES(:movie_id, :user, :room, :place');
        $this->db->bind(':id', $data->movie_id);
        $this->db->bind(':user', $data->user_id);
        $this->db->bind(':room', $data->id_room);
        $this->db->bind(':place', $data->place);
        return $this->db->single();
    }

    public function bookings($id){
        $this->db->query('SELECT b.ID, b.movie_id, b.user_id, b.room_id, b.place, m.name, m.image, r.name as room, t.time FROM booking b INNER JOIN movie m ON b.movie_id=m.ID INNER JOIN room r ON b.room_id=r.ID INNER JOIN timeline t ON b.time_id=t.ID WHERE b.user_id=:id');
        $this->db->bind(':id', $id);
        return $this->db->resultSet();
    }

    public function getMovie($id){
        $this->db->query('SELECT m.ID, m.name, m.release_date, m.image, m.cover, m.broadcast_date, m.broadcast_time, m.added_at, r.ID as id_room, r.name as room FROM movie m INNER JOIN room r ON m.room_id=r.ID WHERE m.ID=:id');
        $this->db->bind(':id', $id);
        return $this->db->single();
    }


    public function delete($id){
        $this->db->query('DELETE FROM movie WHERE ID=:id');
        $this->db->bind('id', $id);
        return $this->db->execute();
        
    }

    public function filterMovies($date){
        $this->db->query('SELECT m.ID, m.name, m.release_date, m.image, m.cover, m.broadcast_date, m.broadcast_time, m.added_at, r.ID as id_room, r.name as room FROM movie m INNER JOIN room r ON m.room_id=r.ID WHERE m.broadcast_date = DATE (:date)  ORDER BY m.release_date DESC');
        $this->db->bind(':date', $date[0]);
        return $this->db->resultSet();
    }

}
