<?php 

if (!defined("BASEPATH")) exit("No direct script access allowed");

// CLASSE/CONTROLLER - PAGINAS
class Paginas extends CI_Controller {
	
	// Metodo construtor da classe.
	public function __construct(){
		parent::__construct();
		init_painel();
		esta_logado();
		$this->load->model('Paginas_model', 'Paginas');
	}

	
	// Recebe as informacoes e exibe na tela.
	public function index(){
		$this->gerenciar();
	}
	
	
	// Funcao para carregar as informacoes que serao exibidas na tela.
	public function gerenciar(){
		set_tema('footerinc', load_js(array('data-table', 'table')), FALSE);
		set_tema('titulo', 'P&aacute;ginas');
		set_tema('conteudo', load_modulo('Paginas', 'gerenciar'));
		load_template();
	}
	
	
	// Funcao que recupera os dados e prepara eles para cadastrar no sistema.
	public function cadastrar(){
		
		$this->form_validation->set_rules('titulo', 'T&Iacute;TULO', 'trim|required|ucfirst');
		$this->form_validation->set_rules('slug', 'SLUG', 'trim');
		$this->form_validation->set_rules('conteudo', 'CONTE&Uacute;DO', 'trim|required|htmlentities');
		$this->form_validation->set_rules('status', 'STATUS', 'trim');
		if ($this->form_validation->run()==TRUE):
			$upload = $this->Paginas->do_upload('arquivo');
			$dados = elements(array('titulo', 'slug', 'conteudo', 'status', 'data'), $this->input->post());
			($dados['slug'] != '') ? $dados['slug']=slug($dados['slug']) : $dados['slug']=slug($dados['titulo']);
			
			$dados['arquivo'] = $upload['file_name'];
			$this->Paginas->do_insert($dados);			
		endif;
		init_htmleditor();
		set_tema('titulo', 'Cadastrar nova p&aacute;gina');
		set_tema('conteudo', load_modulo('Paginas', 'cadastrar'));
		load_template();
	}

	
	// Funcao que recupera os dados e prepara eles para edicao no sistema.
	public function editar(){
		$this->form_validation->set_rules('titulo', 'T&Iacute;TULO', 'trim|required|ucfirst');
		$this->form_validation->set_rules('slug', 'SLUG', 'trim');
		$this->form_validation->set_rules('conteudo', 'CONTE&Uacute;DO', 'trim|required|htmlentities');
		$this->form_validation->set_rules('status', 'STATUS', 'trim');
		if ($this->form_validation->run()==TRUE):
			$dados = elements(array('titulo', 'slug', 'conteudo', 'status'), $this->input->post());
				($dados['slug'] != '') ? $dados['slug']=slug($dados['slug']) : $dados['slug']=slug($dados['titulo']);
				$this->Paginas->do_update($dados, array('id'=>$this->input->post('idpagina')));	
		endif;
		init_htmleditor();
		set_tema('titulo', 'Alterar p&aacute;gina');
		set_tema('conteudo', load_modulo('Paginas', 'editar'));
		load_template();
	}
	
	
	// Funcao que recupera os ID e prepara eles para exclusao no sistema.
	public function excluir(){
		if (is_admin(TRUE)):
			$idpagina = $this->uri->segment(3);
			if ($idpagina != NULL):
				$query = $this->Paginas->get_byid($idpagina);
				if ($query->num_rows()==1):
					$query = $query->row();
					unlink('./uploads/'.$query->arquivo);
					$this->Paginas->do_delete(array('id'=>$query->id), FALSE);
				endif;
			else:
				set_msg('msgerro', 'Escolha uma p&aacute;gina para excluir', 'erro');
			endif;
		endif;
		redirect('paginas/gerenciar');
	}
	
}

?>