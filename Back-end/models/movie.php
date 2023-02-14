<?php

class Movie
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getMovies(){
        $this->db->query('SELECT * FROM movie');
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
