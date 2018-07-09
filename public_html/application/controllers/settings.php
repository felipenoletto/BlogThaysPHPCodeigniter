<?php 

if (!defined("BASEPATH")) exit("No direct script access allowed");

// CLASSE/CONTROLLER - SETTINGS
class Settings extends CI_Controller {
	
	// Metodo construtor da classe.
	public function __construct(){
		parent::__construct();
		init_painel();
		esta_logado();
		$this->load->model('Settings_model', 'Settings');
	}

	
	// Recebe as informacoes e exibe na tela.
	public function index(){
		$this->gerenciar();
	}

	
	// Funcao para carregar as informacoes que serao exibidas na tela.
	public function gerenciar(){
		if ($this->input->post('salvardados')):
			if (is_admin(TRUE)):
				$settings = elements(array('nome_site', 'url_logomarca', 'email_adm'), $this->input->post());
				foreach ($settings as $nome_config => $valor_config):
					set_setting($nome_config, $valor_config);
				endforeach;
				set_msg('msgok', 'Configura&ccedil;&otilde;es atualizadas com sucesso', 'sucesso');
				redirect('Settings/gerenciar');
			else:
				redirect('Settings/gerenciar');
			endif;
		endif;
			set_tema('titulo', 'Configura&ccedil;&atilde;o do sistema');
			set_tema('conteudo', load_modulo('Settings', 'gerenciar'));
			load_template();
	}
	
}

?>