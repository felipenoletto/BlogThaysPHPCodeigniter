<?php 

if (!defined("BASEPATH")) exit("No direct script access allowed");

// CLASSE/MODEL - COMENTARIOS_MODEL
class Comentarios_model extends CI_Model {
	
	// Funcao que insere dados no banco de dados.
	public function do_insert($dados=NULL, $redir=FALSE) {
		
		if ($dados != NULL):
			$this->db->insert('comentarios', $dados);
			if ($this->db->affected_rows()>0):
				redirect(base_url()."id/v/".$dados['id_artigo']);
			endif;
		endif;
	}
	
	
	// Funcao que realiza a atualizacao dos dados no banco de dados.
	public function do_update($dados=NULL, $condicao=NULL, $redir=TRUE) {
		
		if ($dados != NULL && is_array($condicao)):
			$comentario = $this->Comentarios->get_byid($condicao['id_comentario'])->row()->login;
			$this->db->update('comentarios', $dados, $condicao);
				if ($this->db->affected_rows()>0):
					auditoria('Altera&ccedil;&atilde;o de coment&aacute;rio', 'Respota inserida no coment&aacute;rio "'.$comentario.'"');
					set_msg('msgok', 'Resposta inserida com sucesso', 'sucesso');
				else:
				set_msg('msgerro', 'Erro ao inserir resposta', 'erro');
		endif;
		if ($redir) redirect('comentarios/gerenciar');
		endif;
	}
	
	
	// Funcao que deleta dados no banco de dados.
	public function do_delete($condicao=NULL, $redir=TRUE) {
	
		if ($condicao != NULL && is_array($condicao)):
			$comentario = $this->Comentarios->get_byid($condicao['id_comentario'])->row()->login;
			$this->db->delete('comentarios', $condicao);
		if ($this->db->affected_rows()>0):
			auditoria('Exclus&atilde;o de Coment&aacute;rios', 'Comentario exclu&iacute;do'.$comentario.'"');
			set_msg('msgok', 'Comentario exclu&iacute;do com sucesso', 'sucesso');
		else:
			
		endif;
		if ($redir) redirect(current_url());
		endif;
	}
	
	
	// Funcao que recupera os dados pelo ID do banco de dados.
	public function get_byid($idcomentario=NULL) {
		
		if ($idcomentario != NULL):
			$this->db->where('id_comentario', $idcomentario);
			$this->db->limit(1);
			return $this->db->get('comentarios');
		else:
			return FALSE;
		endif;
	}
	
	
	// Funcao que recupera os dados do banco de dados.
	public function get_all(){
		
		return $this->db->get('comentarios');
	}
	
	
	// Funcao para retornar todos os comentarios pelo ID.
	public function get_all_comment($id){
		
		$this->db->where('id_artigo', $id);
		return $this->db->get('comentarios');
	}
	
		
}

?>