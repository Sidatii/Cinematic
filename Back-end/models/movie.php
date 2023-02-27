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
