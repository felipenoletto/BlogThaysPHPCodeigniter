<?php 

if (!defined("BASEPATH")) exit("No direct script access allowed");

// CLASSE/MODEL - MIDIA_MODEL
class Midia_model extends CI_Model {
	
	// Funcao que insere dados no banco de dados.
	public function do_insert($dados=NULL, $redir=TRUE) {
		
		if ($dados != NULL):
			$this->db->insert('midia', $dados);
			if ($this->db->affected_rows()>0):
				auditoria('Inclus&atilde;o de m&iacute;dia', 'Nova m&iacute;dia cadastrada no sistema');
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
			$this->db->update('midia', $dados, $condicao);
			if ($this->db->affected_rows()>0):
				auditoria('Altera&ccedil;&atilde;o de m&iacute;dia', 'A m&iacute;dia com o id "'.$condicao['id'].'" foi alterada');
				set_msg('msgok', 'Altera&ccedil;&atilde;o efetuada com sucesso', 'sucesso');
			else:
				set_msg('msgerro', 'Erro ao atualizar dados', 'erro');
			endif;
			if ($redir) redirect(current_url());
		endif;
	}
	
	
	// Funcao que deleta dados no banco de dados.
	public function do_delete($condicao=NULL, $redir=TRUE) {
		
		if ($condicao != NULL && is_array($condicao)):
			$this->db->delete('midia', $condicao);
			if ($this->db->affected_rows()>0):
				auditoria('Exclus&atilde;o de m&iacute;dia', 'A m&iacute;dia com o id "'.$condicao['id'].'" foi exclu&iacute;da');
				set_msg('msgok', 'Registro exclu&aiacute;do com sucesso', 'sucesso');
			else:
				set_msg('msgerro', 'Erro ao excluir registro', 'erro');
			endif;
			if ($redir) redirect(current_url());
		endif;
	}
	
	
	// Funcao que realiza o upload de imagens para o sistema.
	public function do_upload($campo) {
		
		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		$this->load->library('upload', $config);
		if ($this->upload->do_upload($campo)):
			return $this->upload->data();
		else:
			return $this->upload->display_errors();
		endif;
	}
	
	
	// Funcao que recupera os dados do banco de dados.
	public function get_all() {
		
		return $this->db->get('midia');
	}

	
	// Funcao que recupera os dados pelo ID do banco de dados.
	public function get_byid($id=NULL) {
		
		if ($id != NULL):
			$this->db->where('id', $id);
			$this->db->limit(1);
			return $this->db->get('midia');
		else:
			return FALSE;
		endif;
	}
		
}

?>