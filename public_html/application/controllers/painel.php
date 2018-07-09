<?php 

if (!defined("BASEPATH")) exit("No direct script access allowed");

// CLASSE/CONTROLLER - PAINEL
class Painel extends CI_Controller {
	
	// Metodo construtor da classe.
	public function __construct(){
		parent::__construct();
		init_painel();
	}

	
	// Recebe as informacoes e exibe na tela.
	public function index(){
		$this->inicio();
	}
	
	
	// Funcao para carregar as informacoes que serao exibidas na tela.
	public function inicio(){
		if (esta_logado(FALSE)):
			set_tema('titulo', 'Home');
			set_tema('conteudo', '<div class="twelve columns">'.breadcrumb());
			load_template();
		else:
			redirect('usuarios/login');
		endif;
	}
	
}

?>