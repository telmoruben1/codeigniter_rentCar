<?php
/**
*
*/
class avaliacao_model extends CI_Model
{

  public function __construct()
  {
    $this->load->database();
  }


  public function set_registoAval()
  {
    $data = array(
      'nome' =>$_POST['nome'],
      'email' =>$_POST['email'],
      'mensagem'=>$_POST['mensagem']

    );
    $result=$this->db->insert('contacto', $data);
    return $result;



  }





}

?>
