<?php 

if (!defined("BASEPATH")) exit("No direct script access allowed");

// CLASSE/CONTROLLER - VISITAS
class Visitas extends CI_Controller {
	
	// Metodo construtor da classe.
	public function __construct(){
		parent::__construct();
		init_painel();
		$this->load->model('Visitas_model', 'Visitas');
	}
	

	// Recebe as informacoes e exibe na tela.
	public function index(){
		$this->gerenciar();
	}
	
	
	// Funcao para carregar as informacoes que serao exibidas na tela.
	public function gerenciar(){
		
		set_tema('footerinc', load_js(array('data-table', 'table')), FALSE);
		set_tema('titulo', 'Registros de coment&aacute;rios');
		set_tema('conteudo', load_modulo('Visitas', 'gerenciar'));
		load_template();
	}

}

?>