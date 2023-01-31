<?php
  /*
   * Base Controller
   * Loads the models and views
   */
  class Controller {
    // Load model
    public function model($model){
      // Require model file
      require_once 'models/' . $model . '.php';

      // Instantiate model
      return new $model();
    }
  }