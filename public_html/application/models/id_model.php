<?php 

if (!defined("BASEPATH")) exit("No direct script access allowed");

// CLASSE/MODEL - ID_MODEL
class Id_model extends CI_Model {

	// Funcao que recupera os dados pelo ID do banco de dados.
	public function get_byid($id=NULL) {
	
		$this->db->where('id', $id);
		$this->db->limit(1);
		return $this->db->get('paginas');
	}
	
	
	// Funcao que recupera os dados do banco de dados.
	public function get_all() {
	
		return $this->db->get('paginas');
	}
	
	
	// Funcao que recupera os dados do banco de dados para a paginacao.
	public function get_all_pg($qtd, $inicio) {
		
		if($qtd > 0) {
			$this->db->limit($qtd, $inicio);
			$this->db->order_by('id', 'desc');
		}
		return $this->db->get('paginas');
	}
	
	
	// Funcao que recupera os dados do banco de dados.
	public function get_all_limite() {
	
		$this->db->limit(4);
		$this->db->order_by('id', 'asc');
		return $this->db->get('paginas');
	}

}

?>