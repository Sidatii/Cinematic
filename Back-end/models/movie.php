<?php

class Movie
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getMovies(){
        $this->db->query('SELECT m.ID, m.name, m.release_date, m.image, m.broadcast_date, m.broadcast_time, m.added_at, r.ID as id_room, r.name as room, t.time FROM movie m INNER JOIN room r ON m.room_id=r.ID INNER JOIN timeline t ON m.broadcast_time=t.ID ORDER BY m.release_date DESC');
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
        $this->db->query('SELECT m.ID, m.name, m.release_date, m.image, m.broadcast_date, m.broadcast_time, m.added_at, r.ID as id_room, r.name as room, t.time FROM movie m INNER JOIN room r ON m.room_id=r.ID INNER JOIN timeline t ON m.broadcast_time=t.ID WHERE m.ID=:id');
        $this->db->bind(':id', $id);
        return $this->db->single();
    }

    public function insert($data){
        $this->db->query('INSERT INTO movie (name, image, release_date, broadcast_date, broadcast_time) VALUES(:name, :image, :release_date, :broadcast_date, :broadcast_time)');
        $this->db->bind(':name', $data->name);
        $this->db->bind(':image', $data->image);
        $this->db->bind(':release_date', $data->release_date);
        $this->db->bind(':broadcast_date', $data->broadcast_date);
        $this->db->bind(':broadcast_time', $data->broadcast_time);        
        return $this->db->execute();
    }

    public function update($data){
        $this->db->query('UPDATE movie SET name = :name, image = :image, broadcast_date = :broadcast_date, release_date = :release_date, broadcast_time = :broadcast_time WHERE ID=:id' );
        $this->db->bind(':id', $data->ID);
        $this->db->bind(':name', $data->name);
        $this->db->bind(':image', $data->image);
        $this->db->bind(':release_date', $data->release_date);
        $this->db->bind(':broadcast_date', $data->broadcast_date);
        $this->db->bind(':broadcast_time', $data->broadcast_time);
        return $this->db->execute();
    }

    public function delete($id){
        $this->db->query('DELETE FROM movie WHERE ID=:id');
        $this->db->bind('id', $id);
        return $this->db->execute();
        
    }

}
