<?php
  /**
   *
   */
  class Avaliacao extends CI_Controller
  {
    public function __construct()
    {
      parent::__construct();
      $this->load->model('avaliacao_model');
      $this->load->helper('url_helper');
    }


    public function inser_aval()
    {
        $executa=$this->avaliacao_model->set_registoAval();
        if($executa){
          echo "success";
        }
    }



  }

 ?>
