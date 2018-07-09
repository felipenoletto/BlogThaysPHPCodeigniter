<?php 

if ( ! defined("BASEPATH")) exit("No direct script access allowed");

// CLASSE/CONTROLLER - MIDIA
class Midia extends CI_Controller {
	
	// Metodo construtor da classe.
	public function __construct(){
		parent::__construct();
		init_painel();
		esta_logado();
		$this->load->model('Midia_model', 'Midia');
	}

	
	// Recebe as informacoes e exibe na tela.
	public function index(){
		$this->gerenciar();
	}
	
	
	// Funcao para carregar as informacoes que serao exibidas na tela.
	public function gerenciar(){
		set_tema('footerinc', load_js(array('data-table', 'table')), FALSE);
		set_tema('titulo', 'Listagem de m&iacute;dias');
		set_tema('conteudo', load_modulo('Midia', 'gerenciar'));
		load_template();
	}
	
	
	// Funcao que recupera os dados e prepara eles para cadastrar no sistema.
	public function cadastrar(){
		$this->form_validation->set_rules('nome', 'NOME', 'trim|required|ucfirst');
		$this->form_validation->set_rules('descricao', 'DESCRICAO', 'trim');
		if ($this->form_validation->run()==TRUE):
			$upload = $this->Midia->do_upload('arquivo');
			if (is_array($upload) && $upload['file_name'] != ''):
				$dados = elements(array('nome', 'descricao'), $this->input->post());
				$dados['arquivo'] = $upload['file_name'];
				$this->Midia->do_insert($dados);
			else:
				set_msg('msgerro', $upload, 'erro');
				redirect(current_url());
			endif;
			
		endif;
		set_tema('titulo', 'Upload de imagens');
		set_tema('conteudo', load_modulo('Midia', 'cadastrar'));
		load_template();
	}

	
	// Funcao que recupera os dados e prepara eles para edicao no sistema.
	public function editar(){
		$this->form_validation->set_rules('nome', 'NOME', 'trim|required|ucfirst');
		$this->form_validation->set_rules('descricao', 'DESCRICAO', 'trim');
		if ($this->form_validation->run()==TRUE):
			$dados = elements(array('nome', 'descricao'), $this->input->post());
			$this->Midia->do_update($dados, array('id'=>$this->input->post('idmidia')));
		endif;
		set_tema('titulo', 'Altera&ccedil;&atilde;o de m&iacute;dia');
		set_tema('conteudo', load_modulo('Midia', 'editar'));
		load_template();
	}

	
	// Funcao que recupera os ID e prepara eles para exclusao no sistema.
	public function excluir(){
		if (is_admin(TRUE)):
			$idmidia = $this->uri->segment(3);
			if ($idmidia != NULL):
				$query = $this->Midia->get_byid($idmidia);
				if ($query->num_rows()==1):
					$query = $query->row();
					unlink('./uploads/'.$query->arquivo);
					$thumbs = glob('./uploads/thumbs/*_'.$query->arquivo);
					foreach ($thumbs as $arquivo):
						unlink($arquivo);
					endforeach;
					$this->Midia->do_delete(array('id'=>$query->id), FALSE);
				endif;
			else:
				set_msg('msgerro', 'Escolha uma m&iacute;dia para excluir', 'erro');
			endif;
		endif;
		redirect('Midia/gerenciar');
	}
	
	
	// Funcao que recupera as imagens inseridas para seleciona-las nos artigos.
	public function get_imgs(){
		header('Content-Type: application/x-json; charset=utf-8');
		$this->db->like('nome', $this->input->post('pesquisarimg'));
		if ($this->input->post('pesquisarimg')=='') $this->db->limit(10);
		$this->db->order_by('id', 'DESC');
		$query = $this->Midia->get_all();
		$retorno = 'Nenhum resultado econtrado com base em sua pesquisa';
		if ($query->num_rows()>0):
			$retorno = '';
			$query = $query->result();
			foreach ($query as $linha):
				$retorno .= '<a href="javascript:;" onclick="$(\'.htmleditor\').tinymce().execCommand(\'mceInsertContent\',false,\'<img src='.base_url("uploads/$linha->arquivo").' />\');return false;">';
				$retorno .= '<img src="'.thumb($linha->arquivo,300,180,FALSE).'" class="retornoimg" alt="'.$linha->nome.'" title="Clique para inserir" /></a>';
			endforeach;
		endif;
		echo (json_encode($retorno));
	}
	
}

?>