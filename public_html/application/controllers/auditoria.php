<?php 

if (!defined("BASEPATH")) exit("No direct script access allowed");

// CLASSE/CONTROLLER - AUDITORIA
class Auditoria extends CI_Controller {
	
	// Metodo construtor da classe.
	public function __construct(){
		parent::__construct();
		init_painel();
		esta_logado();
		$this->load->model('Auditoria_model', 'Auditoria');
	}
	

	// Recebe as informacoes e exibe na tela.
	public function index(){
		$this->gerenciar();
	}
	

	// Funcao para carregar as informacoes que serao exibidas na tela.
	public function gerenciar(){
		
		set_tema('footerinc', load_js(array('data-table', 'table')), FALSE);
		set_tema('titulo', 'Registros de auditoria');
		set_tema('conteudo', load_modulo('Auditoria', 'gerenciar'));
		load_template();
	}
	
}

?>