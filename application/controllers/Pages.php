<?php
  /**
   *
   */
  class Pages extends CI_Controller
  {
    public function view($page='home')

    {
      $this->load->helper('url');
      $this->load->helper('cookie');
      if (!file_exists(APPPATH.'views/pages/'.$page.'.php')) {
        // whoops, we dont have a page for that!
        show_404();
      }
      $data['title'] = ucfirst($page); //capitaliza the first letter
      $array_auxiliar=explode('?.',$_SERVER['REQUEST_URI']);
      if($array_auxiliar[1]!=""){
        $data['email'] = $array_auxiliar[1];
      }else{
        $data['email'] ="";
      }
      $this->load->view('templates/header',$data);
      $this->load->view('templates/carrossel',$data);
      $this->load->view('templates/footer',$data);
    }
    public function view_tabela()

    {
      $this->load->helper('url');
      $this->load->helper('cookie');
      // if (!file_exists(APPPATH.'views/pages/'.$page.'.php')) {
      //   // whoops, we dont have a page for that!
      //   show_404();
      // }
      $array_auxiliar=explode('?.',$_SERVER['REQUEST_URI']);
      // print_r($array_auxiliar);
      $data['email'] = $array_auxiliar[1];
      // unset($_COOKIE["logado"]);
      $this->load->view('templates/header',$data);
      $this->load->view('templates/tabela',$data);
      $this->load->view('templates/footer',$data);
    }
    public function view_avaliacao()

    {
      $this->load->helper('url');
      $this->load->helper('cookie');
      // if (!file_exists(APPPATH.'views/pages/'.$page.'.php')) {
      //   // whoops, we dont have a page for that!
      //   show_404();
      // }
      $array_auxiliar=explode('?.',$_SERVER['REQUEST_URI']);
      // print_r($array_auxiliar);
      $data['email'] = $array_auxiliar[1];
      // unset($_COOKIE["logado"]);
      $this->load->view('templates/header', $data);
      $this->load->view('templates/avaliacao');
      $this->load->view('templates/footer');
    }
    public function view_sobre()

    {
      $this->load->helper('url');
      // if (!file_exists(APPPATH.'views/pages/'.$page.'.php')) {
      //   // whoops, we dont have a page for that!
      //   show_404();
      // }
      $array_auxiliar=explode('?.',$_SERVER['REQUEST_URI']);
      // print_r($array_auxiliar);
      $data['email'] = $array_auxiliar[1];
      // unset($_COOKIE["logado"]);
      $this->load->view('templates/header', $data);
      $this->load->view('templates/sobre');
      $this->load->view('templates/footer');
    }

  }

 ?>
