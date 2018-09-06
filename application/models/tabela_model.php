<?php
/**
*
*/
class Tabela_model extends CI_Model
{

  public function __construct()
  {
    $this->load->database();
    $this->load->helper('cookie');
  }


  public function set_verifica_tabela()
  {
    $this->load->helper('url');
    $tipo=$this->input->post('tipo');
    $search=$this->input->post('search');
    if($search==""){
        $query = $this->db->query("SELECT DISTINCT modelos.id AS modelo_id, fabricantes.id AS fabricante_id, cores.id AS cor_id, fabricantes.nome AS 'fabricante',  modelos.nome AS 'Modelo', cores.nome AS Cor, matricula ,disponibilidade, automoveis.id AS automoveis_id FROM modelos,automoveis,fabricantes,cores WHERE automoveis.modelo_id=modelos.id AND modelos.fabricante_id=fabricantes.id AND automoveis.cor_id=cores.id GROUP BY automoveis.id");
        //SELECT modelos.nome, fabricantes.nome,cores.nome,matricula ,disponibilidade FROM modelos,automoveis,fabricantes,cores WHERE automoveis.modelo_id=modelos.id AND modelos.fabricante_id=fabricantes.id AND automoveis.cor_id=cores.id GROUP BY automoveis.id
    }else{
      if($tipo=="fabricante"){
        $query = $this->db->query("SELECT DISTINCT modelos.id AS modelo_id, fabricantes.id AS fabricante_id, cores.id AS cor_id, fabricantes.nome AS 'fabricante',  modelos.nome AS 'Modelo', cores.nome AS Cor, matricula ,disponibilidade, automoveis.id AS automoveis_id FROM modelos,automoveis,fabricantes,cores WHERE automoveis.modelo_id=modelos.id AND modelos.fabricante_id=fabricantes.id AND automoveis.cor_id=cores.id AND fabricantes.nome='$search' GROUP BY automoveis.id");
      }else if($tipo=="modelo"){
        $query = $this->db->query("SELECT DISTINCT modelos.id AS modelo_id, fabricantes.id AS fabricante_id, cores.id AS cor_id, fabricantes.nome AS 'fabricante',  modelos.nome AS 'Modelo', cores.nome AS Cor, matricula ,disponibilidade, automoveis.id AS automoveis_id FROM modelos,automoveis,fabricantes,cores WHERE automoveis.modelo_id=modelos.id AND modelos.fabricante_id=fabricantes.id AND automoveis.cor_id=cores.id AND modelos.nome='$search' GROUP BY automoveis.id");

      }else if($tipo=="matricula"){
        $query = $this->db->query("SELECT DISTINCT modelos.id AS modelo_id, fabricantes.id AS fabricante_id, cores.id AS cor_id, fabricantes.nome AS 'fabricante',  modelos.nome AS 'Modelo', cores.nome AS Cor, matricula ,disponibilidade, automoveis.id AS automoveis_id FROM modelos,automoveis,fabricantes,cores WHERE automoveis.modelo_id=modelos.id AND modelos.fabricante_id=fabricantes.id AND automoveis.cor_id=cores.id AND automoveis.matricula='$search' GROUP BY automoveis.id");

      }
    }
    // $query = $this->db->get_where('comentario', array('titulo' => $this->input->post('titulo'),'classificacao' => $this->input->post('classificacao'),'id_bar' => $this->input->post('id_bar')));
    // $query = $this->db->query("SELECT titulo,classificacao,id_bar,id FROM comentarios WHERE id_bar=$bar_id AND classificacao=$class AND titulo='$titulo';");
    $result=$query->result_array();
    // print_r($result);
    if(!empty($result)){

      return $result;
    }else{
      return false;
    }
  }

  public function delete_row_of_table($value)
  {
    $this->load->helper('url');

    $data2 = array(
      'disponibilidade' => 0
    );
    $this->db->where('id', $value);

    if($this->db->update('automoveis', $data2)){
      return true;
    }else{
      return false;
    }
  }

  public function update_row_of_table($id,$data2)
  {

    $this->load->helper('url');
    $this->db->where('id', $id);
    if($this->db->update('automoveis', $data2)){
      return true;
    }else{
      return false;
    }
  }



}

?>
