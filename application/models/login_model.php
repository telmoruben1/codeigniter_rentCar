<?php
/**
*
*/
class Login_model extends CI_Model
{

  public function __construct()
  {
    $this->load->database();

  }



public function resolve_user_login($username, $password) {

		$this->db->select('password');
		$this->db->from('login');
		$this->db->where('username', $username);
		$hash = $this->db->get()->row('password');

		return $this->verify_password_hash($password, $hash);

	}
  
  public function get_user($username) {

		$this->db->select('*');
		$this->db->from('login');
		$this->db->where('username', $username);

		return $this->db->get()->row();

	}

  public function create_user($username, $email, $password) {

		$data = array(
			'username'   => $username,
			'email'      => $email,
			'password'   => $this->hash_password($password),
			'created_at' => date('Y-m-j H:i:s'),
		);

		return $this->db->insert('login',$data);

	}
  public function set_logout($value)
  {
    $data= array('logado' => FALSE );
    $this->db->where('email', $value);
    if($this->db->update('login', $data)==true){
      return true;
    }else{
      return false;
    }
  }
  private function hash_password($password) {

		return password_hash($password, PASSWORD_BCRYPT);

	}
  private function verify_password_hash($password, $hash) {

		return password_verify($password, $hash);

	}
  //   public function set_verifica_login()
  //   {
  //     $this->load->helper('url');
  //     $encrypt=hash('ripemd160', $this->input->post('password'));
  //     $query = $this->db->get_where('login', array('email' => $this->input->post('user'),'password' => $encrypt));
  //     if($query->num_rows()>0){
  //       $data= array('logado' => TRUE );
  //       $this->db->where('email', $this->input->post('user'));
  //       if($this->db->update('login', $data)==true){
  //         $array_login=[true,$this->input->post('user')];
  //         return $array_login;
  //       }else{
  //         return false;
  //       }
  //
  //   }
  // }
  // public function get_verifica_logodo($variavel){
  //     $query = $this->db->get_where('login', array('email' => $variavel,'logado' => TRUE));
  //     if($query->num_rows()>0){
  //       return true;
  //   }else{
  //     return false;
  //   }
  // }
  // public function set_registo()
  // {
  //   $this->load->helper('url');
  //
  //   // $pass=$this->input->post('password');
  //   // // Encoding message
  //   // $passEncrypt= $this->encrypt->encode($pass);
  //   $encrypt=hash('ripemd160', $this->input->post('password'));
  //   $data = array(
  //     'password' => $encrypt,
  //     'email' => $this->input->post('email'),
  //     'phone' => $this->input->post('phone'),
  //     'logado' => true,
  //     'name' => $this->input->post('name')
  //   );
  //   $pesquisa=$this->db->get_where('login', array('email' => $this->input->post('email')));
  //   if($pesquisa->num_rows()>0){
  //     $array_registo=[false, true];
  //     return $array_registo;
  //   }else{
  //     if($this->db->insert('login', $data)==true){
  //
  //       $array_registo=[true, $this->input->post('email')];
  //       return $array_registo;
  //     }else{
  //
  //       return [false,false];
  //     }
  //   }
  //
  // }


}

?>
