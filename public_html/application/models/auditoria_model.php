<?php 

if (!defined("BASEPATH")) exit("No direct script access allowed");

// CLASSE/MODEL - AUDITORIA_MODEL
class Auditoria_model extends CI_Model {
	
	// Funcao que insere dados no banco de dados.
	public function do_insert($dados=NULL, $redir=FALSE) {
		if ($dados != NULL):
			$this->db->insert('auditoria', $dados);
			if ($this->db->affected_rows()>0):
				set_msg('msgok', 'Cadastro efetuado com sucesso', 'sucesso');
			else:
				set_msg('msgerro', 'Erro ao inserir dados', 'erro');
			endif;
			if ($redir) redirect(current_url());
		endif;
	}
	
	
	// Funcao que recupera os dados pelo ID do banco de dados.
	public function get_byid($id=NULL) {
		if ($id != NULL):
			$this->db->where('id', $id);
			$this->db->limit(1);
			return $this->db->get('auditoria');
		else:
			return FALSE;
		endif;
	}
	
	
	// Funcao que recupera os dados do banco de dados.
	public function get_all($limit=0) {
		if ($limit > 0) $this->db->limit($limit);
		return $this->db->get('auditoria');
	}
		
}

?>