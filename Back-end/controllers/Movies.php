<?php
class Movies extends Controller
{

  private $moviesModel;

  public function __construct()
  {
    $this->moviesModel = $this->model('Movie');
  }



  public function insert()
  {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $data = json_decode(file_get_contents("php://input"));
      if ($this->moviesModel->insert($data)) {
        $output = [
          "status" => 1,
          "message" => 'Your movie has been added'
        ];
        echo json_encode($output);
        die();
      } else {
        $output = [
          "status" => 0,
          "message" => 'An error occured while adding your movie, please try again later'
        ];
        echo json_encode($output);
        die();
      }
    }
  }

  public function update()
  {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $data = json_decode(file_get_contents("php://input"));
      if ($this->moviesModel->update($data)) {
        $output = [
          "status" => 1,
          "message" => 'Your movie has been updated'
        ];
        echo json_encode($output);
        die();
      } else {
        $output = [
          "status" => 0,
          "message" => 'An error occured while updating your movie, please try again later'
        ];
        echo json_encode($output);
        die();
      }
    }
  }



  public function delete($id)
  {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      if ($this->moviesModel->delete($id)) {
        $output = [
          "status" => 1,
          "message" => 'Your movie has been deleted',
          "ID" => $id
        ];
        echo json_encode($output);
        die();
      } else {
        $output = [
          "status" => 0,
          "message" => 'An error occured while deleting your movie, please try again later',
          "ID" => $id
        ];
        echo json_encode($output);
        die();
      }
    } else {
      echo json_encode('404 ERROR');
      die();
    }
  }

  public function getMovies()
  {
    if ($_SERVER['REQUEST_METHOD'] == 'GET') {
      $data = $this->moviesModel->getMovies();

      echo json_encode($data);
      die();
    } else {
      echo json_encode('404 ERROR');
      die();
    }
  }
}
