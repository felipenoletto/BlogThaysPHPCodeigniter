<?php 

if (!defined("BASEPATH")) exit("No direct script access allowed");

// CLASSE/MODEL - MENSAGEM_MODEL
class Mensagem_model extends CI_Model {
	
	// Funcao que insere dados no banco de dados.
	public function do_insert($dados=NULL, $redir=FALSE) {
		
		if ($dados != NULL):
			$this->db->insert('mensagens', $dados);
			if ($this->db->affected_rows()>0):
				redirect(base_url()."contato");
			endif;
		endif;
	}
	
	
	// Funcao que deleta dados no banco de dados.
	public function do_delete($condicao=NULL, $redir=TRUE) {
		
		if ($condicao != NULL && is_array($condicao)):
		$mensagem = $this->Mensagem->get_byid($condicao['id'])->row()->login;
		$this->db->delete('mensagens', $condicao);
		if ($this->db->affected_rows()>0):
		auditoria('Exclus&atilde;o de Mensagens', 'Mensagem exclu&iacute;da'.$mensagem.'"');
		set_msg('msgok', 'Mensagem exclu&iacute;da com sucesso', 'sucesso');
		else:
		set_msg('msgerro', 'Erro ao excluir mensagem', 'erro');
		endif;
		if ($redir) redirect(current_url());
		endif;
	}
	
	
	// Funcao que recupera os dados pelo ID do banco de dados.
	public function get_byid($id=NULL) {
		
		if ($id != NULL):
			$this->db->where('id', $id);
			$this->db->limit(1);
			return $this->db->get('mensagens');
		else:
			return FALSE;
		endif;
	}
	
	
	// Funcao que recupera os dados do banco de dados.
	public function get_all() {
		
		return $this->db->get('mensagens');
	}
		
}

?>