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
    $array_auxiliar1=explode('?.',$_SERVER['REQUEST_URI']);
    $string_main=$array_auxiliar1[1];
    $array_submit=explode('/',$string_main);
    $string_pretendida=$array_submit[1];

    $executa=$this->tabela_model->set_verifica_tabela($string_pretendida);
    if($executa!=false){
      $data['num_pages']=$executa[1];
      $data['array']=$executa[0];
      if(!empty($array_submit[0])){
        $data['email'] = $array_submit[0];
      }else{
        $data['email']="";
      }
      $this->load->view('templates/header',$data);
      $this->load->view('templates/tabela',$data);
    }else{
      if(!empty($array_submit[0])){
        $data['email'] = $array_submit[0];
      }else{
        $data['email']="";
      }
      $this->load->view('templates/header',$data);
      $this->load->view('templates/tabela',$data);

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
