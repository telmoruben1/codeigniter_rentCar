<?php
/**
*
*/
class Login extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('login_model');
    $this->load->helper('url_helper');
    // Load encryption library
    // $this->load->library('encrypt');
  }
  public function index()
  {
    $data['email'] ="";
    // $data['title'] = 'News archive';

    $this->load->view('templates/header', $data);
    $this->load->view('templates/corrossel');
    $this->load->view('templates/footer');
  }

  public function verifica_login()
  {

    $this->load->helper('form');
    $this->load->library('form_validation');

    // $data['title'] = 'Create a news item';
    $array_auxiliar=explode('?.',$_SERVER['REQUEST_URI']);
    if(!empty($array_auxiliar[1])){
      $array_email1=explode('.',$array_auxiliar[1]);
      $email_pronto=$array_email1[0].".".$array_email1[1];
      $executa=$this->login_model->get_verifica_logodo($email_pronto);
      if($executa==true){
        // print_r($_COOKIE["user"]);
        $data['email']=$email_pronto;
        $this->load->view('templates/header',$data);
        $this->load->view('templates/carrossel');
        $this->load->view('templates/footer');
      }else{
        // print_r($_COOKIE["user"]);
        $data['email']="";
        $this->load->view('templates/header',$data);
        $this->load->view('templates/carrossel');
        $this->load->view('templates/footer');

      }
    }else{
      $this->form_validation->set_rules('user', 'USER', 'required');
      $this->form_validation->set_rules('password', 'PASS', 'required');

      if ($this->form_validation->run() === FALSE)
      {
        $this->load->view('templates/header');
        $this->load->view('templates/corrossel');
        $this->load->view('templates/footer');

      }
      else
      {
        $executa=$this->login_model->set_verifica_login();
        if($executa[0]==true){
          // print_r($_COOKIE["user"]);
          $data['email']=$executa[1];
          $this->load->view('templates/header',$data);
          $this->load->view('templates/carrossel');
          $this->load->view('templates/footer');
        }else{
          // print_r($_COOKIE["user"]);
          $data['email']="";
          $this->load->view('templates/header',$data);
          $this->load->view('templates/carrossel');
          $this->load->view('templates/footer');

        }

      }
    }

  }
  public function verifica_user_logado()
  {
    $this->load->helper('form');
      $user_name=$_POST['user'];
      $executa=$this->login_model->get_verifica_logodo($user_name);
      if($executa==true){
        echo true;
      }else{
        echo false;

      }


  }
  
  public function registo()
  {
    $this->load->helper('form');
    $this->load->library('form_validation');

    // $data['title'] = 'Create a news item';

    $this->form_validation->set_rules('name', 'NAME', 'required');
    $this->form_validation->set_rules('password', 'PASS', 'required');

    if ($this->form_validation->run() === FALSE)
    {
      $this->load->view('templates/header');
      $this->load->view('templates/corrossel');
      $this->load->view('templates/footer');

    }
    else
    {
      $pass=$this->input->post('password');
      // Encoding message
      // $passEncrypt= $this->encrypt->encode($pass);
      $executa=$this->login_model->set_registo();
      if($executa[0]==true){
        $data['email']=$executa[1];
        $this->load->view('templates/header',$data);
        $this->load->view('templates/success_user');
        $this->load->view('templates/footer');
      }else if($executa[1]==true){
        //erro ja existe um user com esse nome
        $data['email']="";
        $this->load->view('templates/header',$data);
        $this->load->view('templates/erro_user');
        $this->load->view('templates/footer');

      }else {
        //erro no registo
        $this->load->view('templates/header');
        $this->load->view('templates/carrossel');
        $this->load->view('templates/footer');
      }

    }
  }
  public function logout()
  {
    $array_auxiliar=explode('?.',$_SERVER['REQUEST_URI']);
    if(!empty($array_auxiliar[1])){
      $executa=$this->login_model->set_logout($array_auxiliar[1]);
      if($executa==true){
        // print_r($_COOKIE["user"]);
        $data['email']="";
        $this->load->view('templates/header',$data);
        $this->load->view('templates/carrossel');
        $this->load->view('templates/footer');
      }else{
        // print_r($_COOKIE["user"]);
        print_r("erro");
        $data['email']="erro";
        $this->load->view('templates/header',$data);
        $this->load->view('templates/carrossel');
        $this->load->view('templates/footer');

      }
    }

  }

}

?>
