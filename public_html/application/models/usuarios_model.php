<?php 

if (!defined("BASEPATH")) exit("No direct script access allowed");

// CLASSE/MODEL - USUARIOS_MODEL
class Usuarios_model extends CI_Model {
	
	// Funcao que insere dados no banco de dados.
	public function do_insert($dados=NULL, $redir=TRUE) {
		
		if ($dados != NULL):
			$this->db->insert('usuarios', $dados);
			if ($this->db->affected_rows()>0):
				auditoria('Inclus&atilde;o de usu&aacute;rios', 'Usu&aacute;rio "'.$dados['login'].'" cadastrado no sistema');
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
			//$usuario = $this->Usuarios->get_byid($condicao['id'])->row()->login;
			$this->db->update('usuarios', $dados, $condicao);
			if ($this->db->affected_rows()>0):
				auditoria('Altera&ccedil;&atilde;o de usu&aacute;rios', 'Alterado cadastro do usu&aacute;rio');
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
			$usuario = $this->Usuarios->get_byid($condicao['id'])->row()->login;
			$this->db->delete('usuarios', $condicao);
			if ($this->db->affected_rows()>0):
				auditoria('Exclus&atilde;o de usu&aacute;rios', 'Exclu&iacute;do cadastro do usu&aacute;rio "'.$usuario.'"');
				set_msg('msgok', 'Registro exclu&iacute;do com sucesso', 'sucesso');
			else:
				set_msg('msgerro', 'Erro ao excluir registro', 'erro');
			endif;
			if ($redir) redirect(current_url());
		endif;
	}
	
	
	// Funcao que recupera os dados no banco de dados para realizar o login no sistema.
	public function do_login($usuario=NULL, $senha=NULL) {
		
		if ($usuario && $senha):
			$this->db->where('login', $usuario);
			$this->db->where('senha', $senha);
			$this->db->where('ativo', 1);
			$query = $this->db->get('usuarios');
			if ($query->num_rows == 1):
				return TRUE;
			else:
				return FALSE;
			endif;
		else:
			return FALSE;
		endif;
	}
	
	
	// Funcao que recupera os dados pelo LOGIN do banco de dados.
	public function get_bylogin($login=NULL) {
		if ($login != NULL):
			$this->db->where('login', $login);
			$this->db->limit(1);
			return $this->db->get('usuarios');
		else:
			return FALSE;
		endif;
	}
	
	
	// Funcao que recupera os dados pelo EMAIL do banco de dados.
	public function get_byemail($email=NULL) {
		if ($email != NULL):
			$this->db->where('email', $email);
			$this->db->limit(1);
			return $this->db->get('usuarios');
		else:
			return FALSE;
		endif;
	}
	
	
	// Funcao que recupera os dados pelo ID do banco de dados.
	public function get_byid($id=NULL) {
		if ($id != NULL):
			$this->db->where('id', $id);
			$this->db->limit(1);
			return $this->db->get('usuarios');
		else:
			return FALSE;
		endif;
	}
	
	
	// Funcao que recupera os dados do banco de dados.
	public function get_all() {
		
		return $this->db->get('usuarios');
	}
		
}

?>