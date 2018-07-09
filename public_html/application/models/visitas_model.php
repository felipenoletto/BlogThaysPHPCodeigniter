<?php 

if (!defined("BASEPATH")) exit("No direct script access allowed");

// CLASSE/MODEL - VISITAS_MODEL
class Visitas_model extends CI_Model {
	
	
	// Funcao que insere dados no banco de dados.
	public function do_insert($dados) {
		
		if ($dados != NULL):
			$this->db->insert('visitas', $dados);
		endif;
	}
	
	
	// Funcao que recupera os dados do banco de dados.
	public function get_all(){
		
		return $this->db->get('visitas');
	}
	
		
}

?>