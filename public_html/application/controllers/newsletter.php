<?php 
if ( ! defined("BASEPATH")) exit("No direct script access allowed");

// CLASSE/CONTROLLER - NEWSLETTER
class Newsletter extends CI_Controller {
		
	public function __construct(){
		parent::__construct();
		init_painel();
		esta_logado();
		$this->load->model('Newsletter_model', 'Newsletter');
	}

	public function index(){
		$this->gerenciar();
	}
	
	public function cadastrar(){
	
		$dados['email'] = $this->input->post('email');
		$this->Newsletter->do_insert($dados);
	
		redirect(base_url());
	}

	public function gerenciar(){
		set_tema('footerinc', load_js(array('data-table', 'table')), FALSE);
		set_tema('titulo', 'Registros de not&iacute;cias');
		set_tema('conteudo', load_modulo('Newsletter', 'gerenciar'));
		load_template();
	}
	
	public function editar(){
		
		$this->form_validation->set_rules('email', 'EMAIL', 'trim');
		if ($this->form_validation->run()==TRUE):
		$dados = elements(array('email'), $this->input->post());
		$this->Newsletter->do_update($dados, array('id'=>$this->input->post('idnews')));
		endif;
		set_tema('titulo', 'Newsletter');
		set_tema('conteudo', load_modulo('Newsletter', 'editar'));
		load_template();
	}
	
	public function visualizar(){
	
		set_tema('titulo', 'Visualizar de Not&iacute;cias');
		set_tema('conteudo', load_modulo('Newsletter', 'visualizar'));
		load_template();
	}
	
	public function excluir(){
	
		$idnews = $this->uri->segment(3);
		if ($idnews != NULL):
		$query = $this->Newsletter->get_byid($idnews);
		if ($query->num_rows()==1):
		$query = $query->row();
		$this->Newsletter->do_delete(array('id'=>$query->id), FALSE);
		endif;
		else:
		set_msg('msgerro', 'Escolha uma not&iacute;cia para excluir', 'erro');
		endif;
		redirect('newsletter/gerenciar');
	}
	
	
	// FUCAO PARA ENVIAR EMAIL PARA O NEWSLETTER
	public function enviar_email() {
		$this->load->library('Sistema');
		$this->form_validation->set_rules('email', 'EMAIL', 'trim|required|valid_email|strtolower');
		if ($this->form_validation->run()==TRUE):
		$email = $this->input->post('email');
		$query = $this->Usuarios->get_byemail($email);
		if ($query->num_rows()==1):
		$novasenha = substr(str_shuffle('qwertyuiopasdfghjklzxcvbnm0123456789'), 0, 6);
		$mensagem = "<p>Voce solicitou uma nova senha para acesso ao painel de administra&ccedil;&atilde;o do site, a partir de agora use a seguinte senha para acesso: <strong>$novasenha</strong></p><p>Troque esta senha para uma senha segura e de sua preferencia o quanto antes.</p>";
		if ($this->Sistema->enviar_email($email, 'Nova senha de acesso', $mensagem)):
		/*$dados['senha'] = md5($novasenha);
		 $this->Usuarios->do_update($dados, array('email' => $email), FALSE);
		auditoria('Redefini&ccedil;&atilde;o de senha', 'O usu&aacute;rio solicitou uma nova senha por email');*/
		set_msg('msgok', 'Uma nova senha foi enviada para seu email', 'sucesso');
		redirect('usuarios/nova_senha');
		else:
		set_msg('msgerro', 'Erro ao enviar nova senha, contate o administrador', 'erro');
		redirect('usuarios/nova_senha');
		endif;
		else:
		set_msg('msgerro', 'Este email n&atilde;o possui cadastro no sistema', 'erro');
		redirect('usuarios/nova_senha');
		endif;
		endif;
		set_tema('titulo', 'Recuperar senha');
		set_tema('conteudo', load_modulo('Usuarios', 'nova_senha'));
		set_tema('rodape', '');
		load_template();
	}
	
}

/* End of file newsletter.php */
/* Location: ./application/controllers/newsletter.php */