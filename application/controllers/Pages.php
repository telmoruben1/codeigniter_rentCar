<?php
  /**
   *
   */
  class Pages extends CI_Controller
  {
    public function __construct()
    {
      parent::__construct();
      // $this->load->helper('cookie');
  		$this->load->helper(array('url'));
      $this->load->library(array('session'));

      // Load encryption library
      // $this->load->library('encrypt');
    }
    public function view()

    {

      $this->load->helper('url');
      $this->load->helper('cookie');
      if ( isset($_SESSION["username"]) && $_SESSION['logado']) {
          $data['email'] = $_SESSION['username'];
      }else{
          $data['email'] = "";
      }
      $this->load->view('templates/header',$data);
      $this->load->view('templates/carrossel',$data);
      $this->load->view('templates/footer',$data);
    }
    public function view_tabela()

    {
      $this->load->helper('url');
      $this->load->helper('cookie');

      if ( isset($_SESSION["username"]) && $_SESSION['logado']) {
          $data['email'] = $_SESSION['username'];
      }else{
          $data['email'] = "";
      }

      $data['num_pages']="";
      // unset($_COOKIE["logado"]);
      $this->load->view('templates/header',$data);
      $this->load->view('templates/tabela',$data);
      $this->load->view('templates/footer',$data);
    }
    public function view_avaliacao()

    {
      $this->load->helper('url');
      $this->load->helper('cookie');

      if ( isset($_SESSION["username"]) && $_SESSION['logado']) {
          $data['email'] = $_SESSION['username'];
      }else{
          $data['email'] = "";
      }

      $this->load->view('templates/header', $data);
      $this->load->view('templates/avaliacao');
      $this->load->view('templates/footer');
    }
    public function view_sobre()

    {
      $this->load->helper('url');
      $this->load->helper('cookie');

      if ( isset($_SESSION["username"]) && $_SESSION['logado']) {
          $data['email'] = $_SESSION['username'];
      }else{
          $data['email'] = "";
      }
      $this->load->view('templates/header', $data);
      $this->load->view('templates/sobre');
      $this->load->view('templates/footer');
    }

  }

 ?>
