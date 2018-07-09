<?php 

if (!defined("BASEPATH")) exit("No direct script access allowed");

// CLASSE/MODEL - SETTINGS_MODEL
class Settings_model extends CI_Model {
		
	// Funcao que insere dados no banco de dados.
	public function do_insert($dados=NULL, $redir=TRUE) {
		
		if ($dados != NULL):
			$this->db->insert('settings', $dados);
			if ($this->db->affected_rows()>0):
				auditoria('Inclus&atilde;o de configura&ccedil;&atilde;o', 'Nova configura&ccedil;&atilde;o cadastrada no sistema');
				set_msg('msgok', 'Cadastro efetuado com sucesso', 'sucesso');
			else:
				set_msg('msgerro', 'Erro ao inserir dados', 'erro');
			endif;
			if ($redir) redirect(current_url());
		endif;
	}
	
	
	// Funcao que realiza a atualizacao dos dados no banco de dados.
	public function do_update($dados=NULL, $condicao=NULL, $redir=TRUE) {
		
		if ($dados != NULL && is_array($condicao)):
			$this->db->update('settings', $dados, $condicao);
			if ($this->db->affected_rows()>0):
				auditoria('Altera&ccedil;&atilde;o de configura&ccedil;&atilde;o', 'A configura&ccedil;&atilde;o para o campo "'.$condicao['nome_config'].'" foi alterada');
				set_msg('msgok', 'Altera&ccedil;&atilde;o efetuada com sucesso', 'sucesso');
			endif;
			if ($redir) redirect(current_url());
		endif;
	}
	
	
	// Funcao que deleta dados no banco de dados.
	public function do_delete($condicao=NULL, $redir=TRUE) {
		
		if ($condicao != NULL && is_array($condicao)):
			$this->db->delete('settings', $condicao);
			if ($this->db->affected_rows()>0):
				auditoria('Exclus&atilde;o de configura&ccedil;&atilde;o', 'A configura&ccedil;&atilde;o do campo "'.$condicao['nome_config'].'" foi exclu&iacute;da');
				set_msg('msgok', 'Registro exclu&iacute;do com sucesso', 'sucesso');
			else:
				set_msg('msgerro', 'Erro ao excluir registro', 'erro');
			endif;
			if ($redir) redirect(current_url());
		endif;
	}
	
	
	// Funcao que recupera os dados do banco de dados.
	public function get_all() {
		
		return $this->db->get('settings');
	}

	
	// Funcao que recupera os dados pelo NOME do banco de dados.
	public function get_bynome($nome=NULL) {
		
		if ($nome != NULL):
			$this->db->where('nome_config', $nome);
			$this->db->limit(1);
			return $this->db->get('settings');
		else:
			return FALSE;
		endif;
	}
		
}

?>