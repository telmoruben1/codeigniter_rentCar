<?php
/**
*
*/
class Login extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    // $this->load->helper('cookie');
		$this->load->helper(array('url'));
    $this->load->model('login_model');
    $this->load->library(array('session'));

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
  public function login() {

  		// create the data object
  		$data = [];
      $session=[];
  		// load form helper and validation library
  		$this->load->helper('form');
  		$this->load->library('form_validation');

  		// set validation rules
  		$this->form_validation->set_rules('username', 'Username', 'required|alpha_numeric');
  		$this->form_validation->set_rules('password', 'Password', 'required');

  		if ($this->form_validation->run() == false) {

  			// validation not ok, send validation errors to the view
        $this->load->view('templates/header');
        $this->load->view('templates/corrossel');
        $this->load->view('templates/footer');

  		} else {

  			// set variables from the form
  			$username = $this->input->post('username');
  			$password = $this->input->post('password');

  			if ($this->login_model->resolve_user_login($username, $password)) {

  				$user = $this->login_model->get_user($username);
          // $cookie_id= array('name'=> 'user_id','value'  => (string)$user->id,'expire' => '3600');
          // $cookie_username= array('name'=> 'username','value'  => (string)$user->username,'expire' => '3600');
          // $cookie_logado= array('name'=> 'logado','value'  => (bool)true,'expire' => '3600');
          // $this->input->set_cookie($cookie_id);
          // $this->input->set_cookie($cookie_logado);
          // $this->input->set_cookie($cookie_username);

          $_SESSION['user_id']      = (int)$user->id;
          $_SESSION['username']     = (string)$user->username;
          $_SESSION['logado']    = (bool)true;
          // set_cookie('user_id',(string)$user->id,'3600');
          // set_cookie('username',(string)$user->username,'3600');
          // set_cookie('logado',(bool)true,'3600');

          $data['email']=(string)$user->username;
          $this->load->view('templates/header',$data);
          $this->load->view('templates/carrossel');
          $this->load->view('templates/footer');


  			} else {

  				// login failed
  				$data->error = 'Wrong username or password.';

  				// $this->load->view('header');
  				// $this->load->view('user/login/login', $data);
  				// $this->load->view('footer');
          $data['email']="";
          $this->load->view('templates/header',$data);
          $this->load->view('templates/footer');

  			}

  		}

  	}


  public function registo() {

    // create the data object
    $data = [];

    $this->load->library('form_validation');

    $this->form_validation->set_rules('username', 'Username', 'trim|required|alpha_numeric|min_length[4]|is_unique[login.username]', array('is_unique' => 'This username already exists. Please choose another one.'));
    $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[login.email]');
    $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]');
    $this->form_validation->set_rules('password_confirm', 'Confirm Password', 'trim|required|min_length[6]|matches[password]');
    //
    if ($this->form_validation->run() === false) {

      // validation not ok, send validation errors to the view
      $data["email"]="";
      $this->load->view('templates/header',$data);
      $this->load->view('templates/erro_user');
      $this->load->view('templates/footer');

    }
    else {

      // set variables from the form
      $username = $this->input->post('username');
      $email    = $this->input->post('email');
      $password = $this->input->post('password');

        if ($this->login_model->create_user($username, $email, $password)) {

          $user = $this->login_model->get_user($username);
          // $cookie_id= array('name'=> 'user_id','value'  => (string)$user->id,'expire' => '3600');
          // $cookie_username= array('name'=> 'username','value'  => (string)$user->username,'expire' => '3600');
          // $cookie_logado= array('name'=> 'logado','value'  => (bool)true,'expire' => '3600');
          // $this->input->set_cookie($cookie_id);
          // $this->input->set_cookie($cookie_logado);
          // $this->input->set_cookie($cookie_username);
          $_SESSION['user_id']      = (int)$user->id;
          $_SESSION['username']     = (string)$user->username;
          $_SESSION['logado']    = (bool)true;

          $data['email']=(string)$user->username;
          $this->load->view('templates/header',$data);
          $this->load->view('templates/success_user');
          $this->load->view('templates/footer');

        } else {

          // user creation failed, this should never happen
          $data['email']="";
          $this->load->view('templates/header',$data);
          $this->load->view('templates/erro_user');
          $this->load->view('templates/footer');

        }

    }

  }
  public function logout() {

		// create the data object
		$data = [];
    if (isset($_SESSION['logado']) && $_SESSION['logado'] === true) {

			// remove session datas
			foreach ($_SESSION as $key => $value) {
				unset($_SESSION[$key]);
			}

        $data['email']="";
        $this->load->view('templates/header',$data);
        $this->load->view('templates/carrossel');
        $this->load->view('templates/footer');

		} else {

      $data['email']="";
      $this->load->view('templates/header',$data);
      $this->load->view('templates/carrossel');
      $this->load->view('templates/footer');

		}
    // if(isset($_COOKIE['logado'])){
    //   $data['email']="";
    //   delete_cookie('logado');
    //   delete_cookie('username');
    //   delete_cookie('user_id');
    //   $this->load->view('templates/header',$data);
    //   $this->load->view('templates/carrossel');
    //   $this->load->view('templates/footer');
    // }else{
    //   if ($this->input->cookie('logado',true)==true) {
    //     delete_cookie('logado');
    //     delete_cookie('username');
    //     delete_cookie('user_id');
    //
  	// 		// user logout ok
    //     $data['email']=$_COOKIE['username'];
    //     $this->load->view('templates/header',$data);
    //     $this->load->view('templates/carrossel');
    //     $this->load->view('templates/footer');
    //
  	// 	} else {
    //     $data['email']="";
    //     delete_cookie('logado');
    //     delete_cookie('username');
    //     delete_cookie('user_id');
    //     $this->load->view('templates/header',$data);
    //     $this->load->view('templates/carrossel');
    //     $this->load->view('templates/footer');
    //
  	// 	}
    // }



	}
  public function get_verifica_logodo(){
    print_r($_SESSION['logado']);
    if ( isset($_SESSION["username"]) && $_SESSION['logado']) {
      return true;
    }else{
        return false;
    }
  }
  // public function verifica_login()
  // {
  //
  //   $this->load->helper('form');
  //   $this->load->library('form_validation');
  //
  //   // $data['title'] = 'Create a news item';
  //   $array_auxiliar=explode('?.',$_SERVER['REQUEST_URI']);
  //   if(!empty($array_auxiliar[1])){
  //     $array_email1=explode('.',$array_auxiliar[1]);
  //     $email_pronto=$array_email1[0].".".$array_email1[1];
  //     $executa=$this->login_model->get_verifica_logodo($email_pronto);
  //     if($executa==true){
  //       // print_r($_COOKIE["user"]);
  //       $data['email']=$email_pronto;
  //       $this->load->view('templates/header',$data);
  //       $this->load->view('templates/carrossel');
  //       $this->load->view('templates/footer');
  //     }else{
  //       // print_r($_COOKIE["user"]);
  //       $data['email']="";
  //       $this->load->view('templates/header',$data);
  //       $this->load->view('templates/carrossel');
  //       $this->load->view('templates/footer');
  //
  //     }
  //   }else{
  //     $this->form_validation->set_rules('user', 'USER', 'required');
  //     $this->form_validation->set_rules('password', 'PASS', 'required');
  //
  //     if ($this->form_validation->run() === FALSE)
  //     {
  //       $this->load->view('templates/header');
  //       $this->load->view('templates/corrossel');
  //       $this->load->view('templates/footer');
  //
  //     }
  //     else
  //     {
  //       $executa=$this->login_model->set_verifica_login();
  //       if($executa[0]==true){
  //         $data['email']=$executa[1];
  //         $this->load->view('templates/header',$data);
  //         $this->load->view('templates/carrossel');
  //         $this->load->view('templates/footer');
  //       }else{
  //         $data['email']="";
  //         $this->load->view('templates/header',$data);
  //         $this->load->view('templates/carrossel');
  //         $this->load->view('templates/footer');
  //
  //       }
  //
  //     }
  //   }
  //
  // }
  // public function registo()
  // {
  //   $this->load->helper('form');
  //   $this->load->library('form_validation');
  //
  //   // $data['title'] = 'Create a news item';
  //
  //   $this->form_validation->set_rules('name', 'NAME', 'required');
  //   $this->form_validation->set_rules('password', 'PASS', 'required');
  //
  //   if ($this->form_validation->run() === FALSE)
  //   {
  //     $this->load->view('templates/header');
  //     $this->load->view('templates/corrossel');
  //     $this->load->view('templates/footer');
  //
  //   }
  //   else
  //   {
  //     $pass=$this->input->post('password');
  //     // Encoding message
  //     // $passEncrypt= $this->encrypt->encode($pass);
  //     $executa=$this->login_model->set_registo();
  //     if($executa[0]==true){
  //       $data['email']=$executa[1];
  //       $this->load->view('templates/header',$data);
  //       $this->load->view('templates/success_user');
  //       $this->load->view('templates/footer');
  //     }else if($executa[1]==true){
  //       //erro ja existe um user com esse nome
  //       $data['email']="";
  //       $this->load->view('templates/header',$data);
  //       $this->load->view('templates/erro_user');
  //       $this->load->view('templates/footer');
  //
  //     }else {
  //       //erro no registo
  //       $this->load->view('templates/header');
  //       $this->load->view('templates/carrossel');
  //       $this->load->view('templates/footer');
  //     }
  //
  //   }
  // }
  // public function logout()
  // {
  //   $array_auxiliar=explode('?.',$_SERVER['REQUEST_URI']);
  //   if(!empty($array_auxiliar[1])){
  //     $executa=$this->login_model->set_logout($array_auxiliar[1]);
  //     if($executa==true){
  //       // print_r($_COOKIE["user"]);
  //       $data['email']="";
  //       $this->load->view('templates/header',$data);
  //       $this->load->view('templates/carrossel');
  //       $this->load->view('templates/footer');
  //     }else{
  //       // print_r($_COOKIE["user"]);
  //       print_r("erro");
  //       $data['email']="erro";
  //       $this->load->view('templates/header',$data);
  //       $this->load->view('templates/carrossel');
  //       $this->load->view('templates/footer');
  //
  //     }
  //   }
  //
  // }
  // public function verifica_user_logado()
  // {
  //     $this->load->helper('form');
  //     $user_name=$_POST['user'];
  //     $executa=$this->login_model->get_verifica_logodo($user_name);
  //     if($executa){
  //       echo true;
  //     }else{
  //       echo false;
  //
  //     }
  //
  //
  // }

}

?>
