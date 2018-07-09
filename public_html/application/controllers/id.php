<?php

if (!defined("BASEPATH")) exit("No direct script access allowed");

// CLASSE/CONTROLLER - INSPIRE_DESIGNER
class Id extends CI_Controller {
	
	// Metodo construtor da classe.
	public function __construct(){
		parent::__construct();
		init_site();
		$this->load->model('Id_model', 'ID');
		$this->load->model('Comentarios_model', 'Comentarios');
		$this->load->model('Visitas_model', 'Visitas');
	}
	
	
	// Recebe as informacoes e exibe na tela.
	public function index(){
		$this->g();
	}
	
	
	// Funcao para carregar as informacoes que serao exibidas na tela.
	public function g(){
		
		// Paginacao
		$config['base_url'] = base_url()."id/g";
		$config['total_rows'] = $this->ID->get_all()->num_rows();
		$config['per_page'] = 2;
		$config['num_links'] = 5;
		$config['display_pages'] = false;
		$config['first_link'] = false;
		$config['last_link'] = false;
		
		$config['full_tag_open'] = "<div>";
		$config['full_tag_close'] = "</div>";
		
			$config['prev_tag_open'] = "<div class='botaoprev'>";
			$config['prev_link'] = "Anterior";
			$config['prev_tag_close'] = "</div>&nbsp;";
		
				$config['num_tag_open'] = "<div class='numpag'>";
				$config['num_tag_close'] = "</div>&nbsp;";
				
				$config['cur_tag_open'] = "<div class='curpag'>";
				$config['cur_tag_close'] = "</div>&nbsp;";
		
			$config['next_tag_open'] = "<div class='botaonext'>";
			$config['next_link'] = "Pr&oacute;ximo";
			$config['next_tag_close'] = "</div>&nbsp;";
		
		$qtd = $config['per_page'];
		
		
		($this->uri->segment(3) != '' ? $inicio = $this->uri->segment(3) : $inicio = 0);
		$var1 = $inicio;
		$var2 = $qtd;
		$this->pagination->initialize($config);
		
		set_tema('conteudo', load_modulo_id('Id', 'g', $var1, $var2));
		load_template();
	}
	
	
	// Funcao para carregar as informacoes que serao exibidas na tela.
	public function v(){
	
		set_tema('titulo', 'Inspire Designer');
		set_tema('conteudo', load_modulo_id('Id', 'v', $var1=0, $var2=0));
		load_template();
	}
	
} 

?>