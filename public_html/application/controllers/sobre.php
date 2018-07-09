<?php

if (!defined("BASEPATH")) exit("No direct script access allowed");

// CLASSE/CONTROLLER - SOBRE
class Sobre extends CI_Controller {
	
	// Metodo construtor da classe.
	public function __construct(){
		parent::__construct();
		init_sobre();
	}
	
	
	// Recebe as informacoes e exibe na tela.
	public function index(){
		$this->gerenciar();
	}
	
	
	// Funcao para carregar as informacoes que serao exibidas na tela.
	public function gerenciar(){
	
		load_template();
	}
	
} 

?>