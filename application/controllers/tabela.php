<?php
/**
*
*/
class Tabela extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('tabela_model');
    $this->load->helper('url_helper');
  }

  public function view()
  {
    $this->load->view('templates/header');
    $this->load->view('templates/tabela');
    // code...
  }
  public function verifica_pesquisa()
  {
    $this->load->helper('form');
    $this->load->library('form_validation');

    // $data['title'] = 'Create a news item';

    $executa=$this->tabela_model->set_verifica_tabela();
    if($executa!=false){
      $data['array']=$executa;
      $array_auxiliar=explode('?.',$_SERVER['REQUEST_URI']);
      if(!empty($array_auxiliar[1])){
        $data['email'] = $array_auxiliar[1];
      }else{
        $data['email']="";
      }
      $this->load->view('templates/header',$data);
      $this->load->view('templates/tabela',$data);
    }else{
      $array_auxiliar=explode('?.',$_SERVER['REQUEST_URI']);
      // print_r($array_auxiliar);
      if(!empty($array_auxiliar[1])){
        $data['email'] = $array_auxiliar[1];
      }else{
        $data['email']="";
      }
      $this->load->view('templates/header',$data);
      $this->load->view('templates/erro_user',$data);

    }


  }
  public function deleterow()
  {
    $this->load->helper('form');
    $this->load->library('form_validation');
    $resposta=$_POST['id_automovel'];

    $executa=$this->tabela_model->delete_row_of_table($resposta);


  }
  public function update_table()
  {
    $this->load->helper('form');
    $this->load->library('form_validation');
    $id= $_POST['id_automovel'];

    $data2 = array();
    if($_POST['modelo_id']!=""){
      $data2['modelo_id']=$_POST['modelo_id'];
    }
    if($_POST['cor_id']!=""){
      $data2['cor_id']=$_POST['cor_id'];
    }
    if($_POST['matricula']!=""){
      $data2['matricula']=$_POST['matricula'];
    }
    if($_POST['disponibilidade']!=""){
      $data2['disponibilidade']=$_POST['disponibilidade'];
    }
    // print_r($data2);
    $executa=$this->tabela_model->update_row_of_table($id,$data2);
    echo "merda";
  }

}
?>
