<?php

if (!defined("BASEPATH")) exit("No direct script access allowed");

// CLASSE/MODEL - NEWSLETTER_MODEL
class Newsletter_model extends CI_Model {

	// Funcao que insere dados no banco de dados.
	public function do_insert($dados=NULL, $redir=FALSE) {

		if ($dados != NULL):
		$this->db->insert('newsletter', $dados);
		if ($this->db->affected_rows()>0):
		redirect(base_url());
		endif;
		endif;
	}


	// Funcao que deleta dados no banco de dados.
	public function do_delete($condicao=NULL, $redir=TRUE) {

		if ($condicao != NULL && is_array($condicao)):
		$mensagem = $this->Newsletter->get_byid($condicao['id'])->row()->login;
		$this->db->delete('newsletter', $condicao);
		if ($this->db->affected_rows()>0):
		auditoria('Exclus&atilde;o de Newsletter', 'Newsletter exclu&iacute;da'.$mensagem.'"');
		set_msg('msgok', 'Newsletter exclu&iacute;da com sucesso', 'sucesso');
		else:
		set_msg('msgerro', 'Erro ao excluir newsletter', 'erro');
		endif;
		if ($redir) redirect(current_url());
		endif;
	}


	// Funcao que recupera os dados pelo ID do banco de dados.
	public function get_byid($id=NULL) {

		if ($id != NULL):
		$this->db->where('id', $id);
		$this->db->limit(1);
		return $this->db->get('newsletter');
		else:
		return FALSE;
		endif;
	}


	// Funcao que recupera os dados do banco de dados.
	public function get_all() {

		return $this->db->get('newsletter');
	}

}

?>