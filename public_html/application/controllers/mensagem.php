<?php

if (!defined("BASEPATH")) exit("No direct script access allowed");

// CLASSE/CONTROLLER - MENSAGEM
class Mensagem extends CI_Controller {

	// Metodo construtor da classe.
	public function __construct(){
		parent::__construct();
		init_painel();
		//esta_logado();
		$this->load->model('Mensagem_model', 'Mensagem');
	}

	
	// Recebe as informacoes e exibe na tela.
	public function index(){
		$this->gerenciar();
	}
	
	
	// Funcao para carregar as informacoes que serao exibidas na tela.
	public function gerenciar(){
		set_tema('footerinc', load_js(array('data-table', 'table')), FALSE);
		set_tema('titulo', 'Registros de contatos');
		set_tema('conteudo', load_modulo('Mensagem', 'gerenciar'));
		load_template();
	}
	
	
	// Funcao que recupera os dados e prepara eles para cadastrar no sistema.
	public function cadastrar(){
		
		$dados = elements(array('nome', 'email', 'mensagem'), $this->input->post());
		$this->Mensagem->do_insert($dados);
		
		redirect(base_url()."Contato");
	}
	
	
	// Funcao para carregar as informacoes que serao exibidas na tela.
	public function visualizar(){
	
		set_tema('titulo', 'Visualizar Mensagem');
		set_tema('conteudo', load_modulo('Mensagem', 'visualizar'));
		load_template();
	}
	
	
	// Funcao que recupera os ID e prepara eles para exclusao no sistema.
	public function excluir(){
		
		$idmensagem = $this->uri->segment(3);
		if ($idmensagem != NULL):
		$query = $this->Mensagem->get_byid($idmensagem);
		if ($query->num_rows()==1):
		$query = $query->row();
		$this->Mensagem->do_delete(array('id'=>$query->id), FALSE);
		endif;
		else:
		set_msg('msgerro', 'Escolha uma mensagem para excluir', 'erro');
		endif;
		redirect('mensagem/gerenciar');
	}

}

?>