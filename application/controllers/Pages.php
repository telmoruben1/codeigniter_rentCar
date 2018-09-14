<?php
  /**
   *
   */
  class Pages extends CI_Controller
  {
    public function view()

    {

      $this->load->helper('url');
      $this->load->helper('cookie');
      if ( isset($_COOKIE["username"]) && $_COOKIE['logado']) {
          $data['email'] = $_COOKIE['username'];
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

      if ( isset($_COOKIE["username"]) && $_COOKIE['logado']) {
          $data['email'] = $_COOKIE['username'];
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

      if ( isset($_COOKIE["username"]) && $_COOKIE['logado']) {
          $data['email'] = $_COOKIE['username'];
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

      if ( isset($_COOKIE["username"]) && $_COOKIE['logado']) {
          $data['email'] = $_COOKIE['username'];
      }else{
          $data['email'] = "";
      }
      $this->load->view('templates/header', $data);
      $this->load->view('templates/sobre');
      $this->load->view('templates/footer');
    }

  }

 ?>
