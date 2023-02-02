<?php
class Movies extends Controller
{

  private $moviesModel;

  public function __construct()
  {
    $this->moviesModel = $this->model('Manager');
  }
}