<?php 

if (!defined("BASEPATH")) exit("No direct script access allowed");

// CLASSE/CONTROLLER - COMENTARIOS
class Comentarios extends CI_Controller {
	
	// Metodo construtor da classe.
	public function __construct(){
		parent::__construct();
		init_painel();
		$this->load->model('Comentarios_model', 'Comentarios');
	}
	

	// Recebe as informacoes e exibe na tela.
	public function index(){
		$this->gerenciar();
	}
	
	
	// Funcao para carregar as informacoes que serao exibidas na tela.
	public function gerenciar(){
		
		set_tema('footerinc', load_js(array('data-table', 'table')), FALSE);
		set_tema('titulo', 'Registros de coment&aacute;rios');
		set_tema('conteudo', load_modulo('Comentarios', 'gerenciar'));
		load_template();
	}
	
	
	// Funcao que recupera os dados e prepara eles para cadastrar no sistema.
	public function cadastrar(){
	
		$dados['nome'] = $this->input->post('nome');
		$dados['email'] = $this->input->post('email');
		$dados['id_artigo'] = $this->input->post('id_artigo');
		$dados['nome_artigo'] = $this->input->post('nome_artigo');
		$dados['comentario'] = $this->input->post('comentario');
		$dados['data'] = $this->input->post('data');
		$this->Comentarios->do_insert($dados);
	
		redirect(base_url()."id/v/".$dados['id_artigo'] = $this->input->post('id_artigo'));
	}
	
	
	// Funcao que recupera os dados e prepara eles para edicao no sistema.
	public function editar(){
		
		$this->form_validation->set_rules('resposta', 'RESPOSTA', 'trim');
		if ($this->form_validation->run()==TRUE):
		$dados = elements(array('resposta'), $this->input->post());
		$this->Comentarios->do_update($dados, array('id_comentario'=>$this->input->post('idcomentario')));
		endif;
		set_tema('titulo', 'Resposta de Coment&aacute;rio');
		set_tema('conteudo', load_modulo('Comentarios', 'editar'));
		load_template();
	}
	
	
	// Funcao que recupera os dados e prepara eles para visualizacao no sistema.
	public function visualizar(){
	
		set_tema('titulo', 'Visualizar de Coment&aacute;rio');
		set_tema('conteudo', load_modulo('Comentarios', 'visualizar'));
		load_template();
	}
	
	
	// Funcao que recupera os ID e prepara eles para exclusao no sistema.
	public function excluir(){
	
		$idcomentario = $this->uri->segment(3);
		if ($idcomentario != NULL):
			$query = $this->Comentarios->get_byid($idcomentario);
			if ($query->num_rows()==1):
				$query = $query->row();
				$this->Comentarios->do_delete(array('id_comentario'=>$query->id_comentario), FALSE);
			endif;
		else:
			set_msg('msgerro', 'Escolha um comentario para excluir', 'erro');
		endif;
			redirect('comentarios/gerenciar');
	}
	
}

?>