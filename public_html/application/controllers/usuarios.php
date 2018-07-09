<?php 

if (!defined("BASEPATH")) exit("No direct script access allowed");

// CLASSE/CONTROLLER - USUARIOS
class Usuarios extends CI_Controller {
	
	// Metodo construtor da classe.
	public function __construct() {
		parent::__construct();
		init_painel();
		$this->load->library('Sistema');
		$this->load->library('email');
	}

	
	// Recebe as informacoes e exibe na tela.
	public function index() {
		$this->gerenciar();
	}
	
	
	// Funcao para carregar as informacoes que serao exibidas na tela.
	public function gerenciar() {
		esta_logado();
		set_tema('footerinc', load_js(array('data-table', 'table')), FALSE);
		set_tema('titulo', 'Listagem de usu&aacute;rios');
		set_tema('conteudo', load_modulo('Usuarios', 'gerenciar'));
		load_template();
	}
	
	
	// Funcao para recuperar os dados e realizar a verificacao de login.
	public function login() {
		$this->form_validation->set_rules('usuario', 'USU&Aacute;RIO', 'trim|required|min_length[4]|strtolower');
		$this->form_validation->set_rules('senha', 'SENHA', 'trim|required|min_length[4]|strtolower');
		if ($this->form_validation->run()==TRUE):
			$usuario = $this->input->post('usuario', TRUE);
			$senha = md5($this->input->post('senha', TRUE));
			$redirect = $this->input->post('redirect', TRUE);
			if ($this->Usuarios->do_login($usuario, $senha) == TRUE):
				$query = $this->Usuarios->get_bylogin($usuario)->row();
				$dados = array(
					'user_id' => $query->id,
					'user_nome' => $query->nome,
					'user_admin' => $query->adm,
					'user_logado' => TRUE,
				);
				$this->session->set_userdata($dados);
				auditoria('Login no sistema', 'Usu&aacute;rio "'.$usuario.'" fez login no sistema');
				if ($redirect != ''):
					redirect($redirect);
				else:
					redirect('painel');
				endif;
			else:
				$query = $this->Usuarios->get_bylogin($usuario)->row();
				if (empty($query)):
					auditoria('Erro de login', 'Usu&aacute;rio inexistente "'.$usuario.'"');
					set_msg('errologin', 'Usu&aacute;rio inexistente', 'erro');
				elseif ($query->senha != $senha):
					auditoria('Erro de login', 'Senha incorreta para o usu&aacute;rio "'.$usuario.'"');
					set_msg('errologin', 'Senha incorreta', 'erro');
				elseif ($query->ativo == 0):
					auditoria('Erro de login', 'Usu&aacute;rio inativo "'.$usuario.'"');
					set_msg('errologin', 'Este usu&aacute;rio est&aacute; inativo', 'erro');
				else:
					auditoria('Erro de login', 'Erro desconhecido para o usu&aacute;rio "'.$usuario.'"');
					set_msg('errologin', 'Erro desconhecido, contate o desenvolvedor', 'erro');
				endif;
				redirect('usuarios/login');
			endif;
		endif;
		set_tema('titulo', 'Login');
		set_tema('conteudo', load_modulo('Usuarios', 'login'));
		set_tema('rodape', '');
		load_template();
	}

	
	// Funcao para realizar o logoff do sistema.
	public function logoff() {
		auditoria('Logoff no sistema', 'O usu&aacute;rio "'.$this->Usuarios->get_byid($this->session->userdata('user_id'))->row()->login.'" fez logoff do sistema', FALSE);
		$this->session->unset_userdata(array('user_id'=>'', 'user_nome'=>'', 'user_admin'=>'', 'user_logado'=>''));
		$this->session->sess_destroy();
		set_msg('logoffok', 'Logoff efetuado com sucesso', 'sucesso');
		redirect('usuarios/login');
	}
	
	
	// Funcao para recuperar os dados do usuario e recadastrar uma nova senha.
	public function nova_senha() {
		$this->load->library('Sistema');
		$this->form_validation->set_rules('email', 'EMAIL', 'trim|required|valid_email|strtolower');
		if ($this->form_validation->run()==TRUE):
			$email = $this->input->post('email');
			$query = $this->Usuarios->get_byemail($email);
			if ($query->num_rows()==1) {
				$novasenha = substr(str_shuffle('qwertyuiopasdfghjklzxcvbnm0123456789'), 0, 6);
				$mensagem = "<p>Voce solicitou uma nova senha para acesso ao painel de administra&ccedil;&atilde;o do site, a partir de agora use a seguinte senha para acesso: <strong>$novasenha</strong></p><p>Troque esta senha para uma senha segura e de sua preferencia o quanto antes.</p>";
				$formato = "html";
				//if ($this->Sistema->enviar_email($email, 'Nova senha de acesso', $mensagem)):
					
					
					/* POR ENQUANTO A FUNCIONALIDADE NAO PODE FUNCIONAR POR CAUSA DO PLANO DE HOSPEDAGEM QUE NAO COBRE SMTP */

					$config['mailtype'] = $formato;
					$this->load->email->initialize($config);
					$this->load->email->from('adm@site.com', 'Administracao do site');
					$this->load->email->to($para);
					$this->load->email->subject($assunto);
					$this->load->email->message($mensagem);

					$this->CI->email->send();

					$dados['senha'] = md5($novasenha);
					$this->Usuarios->do_update($dados, array('email' => $email), FALSE);
					auditoria('Redefini&ccedil;&atilde;o de senha', 'O usu&aacute;rio solicitou uma nova senha por email');
					set_msg('msgok', 'Uma nova senha foi enviada para seu email', 'sucesso');
					redirect('usuarios/nova_senha');
				/*else:
					set_msg('msgerro', 'Erro ao enviar nova senha, contate o administrador', 'erro');
					redirect('usuarios/nova_senha');
				endif;*/
			}
			
			/*else:
				set_msg('msgerro', 'Este email n&atilde;o possui cadastro no sistema', 'erro');
				redirect('usuarios/nova_senha');
			endif;*/
		endif;		
		set_tema('titulo', 'Recuperar senha');
		set_tema('conteudo', load_modulo('Usuarios', 'nova_senha'));
		set_tema('rodape', '');
		load_template();
	}
	
	
	// Funcao que recupera os dados e prepara eles para cadastrar no sistema.
	public function cadastrar() {
		esta_logado();
		$this->form_validation->set_message('is_unique', 'Este %s j&aacute; est&aacute; cadastrado no sistema');
		$this->form_validation->set_message('matches', 'O campo %s est&aacute; diferente do campo %s');
		$this->form_validation->set_rules('nome', 'NOME', 'trim|required|ucwords');
		$this->form_validation->set_rules('email', 'EMAIL', 'trim|required|valid_email|is_unique[usuarios.email]|strtolower');
		$this->form_validation->set_rules('login', 'LOGIN', 'trim|required|min_length[4]|is_unique[usuarios.login]|strtolower');
		$this->form_validation->set_rules('senha', 'SENHA', 'trim|required|min_length[4]|strtolower');
		$this->form_validation->set_rules('senha2', 'REPITA A SENHA', 'trim|required|min_length[4]|strtolower|matches[senha]');
		if ($this->form_validation->run()==TRUE):
			$dados = elements(array('nome', 'email', 'login'), $this->input->post());
			$dados['senha'] = md5($this->input->post('senha'));
				if (is_admin()) $dados['adm'] = ($this->input->post('adm')==1) ? 1 : 0;
				$this->Usuarios->do_insert($dados);
		endif;
		set_tema('titulo', 'Cadastro de usu&aacute;rios');
		set_tema('conteudo', load_modulo('Usuarios', 'cadastrar'));
		load_template();
	}
	
	
	// Funcao para recuperar os dados e alterar senha de usuario.
	public function alterar_senha() {
		esta_logado();
		$this->form_validation->set_message('matches', 'O campo %s est&aacute; diferente do campo %s');
		$this->form_validation->set_rules('senha', 'SENHA', 'trim|required|min_length[4]|strtolower');
		$this->form_validation->set_rules('senha2', 'REPITA A SENHA', 'trim|required|min_length[4]|strtolower|matches[senha]');
		if ($this->form_validation->run()==TRUE):
			$dados['senha'] = md5($this->input->post('senha'));
			$this->Usuarios->do_update($dados, array('id'=>$this->input->post('idusuario')));
		endif;
		set_tema('titulo', 'Altera&ccedil;&atilde;o de senha');
		set_tema('conteudo', load_modulo('Usuarios', 'alterar_senha'));
		load_template();
	}
	
	
	// Funcao para editar os dados cadastrados de um usuario.
	public function editar() {
		esta_logado();
		$this->form_validation->set_rules('nome', 'NOME', 'trim|required|ucwords');
		if ($this->form_validation->run()==TRUE):
			$dados['nome'] = $this->input->post('nome');
			$dados['ativo'] = ($this->input->post('ativo')==1 ? 1 : 0);
			if (is_admin(FALSE)) $dados['adm'] = ($this->input->post('adm')==1) ? 1 : 0;
			$this->Usuarios->do_update($dados, array('id'=>$this->input->post('idusuario')));
		endif;
		set_tema('titulo', 'Altera&ccedil;&atilde;o de usu&aacute;rios');
		set_tema('conteudo', load_modulo('Usuarios', 'editar'));
		load_template();
	}
	
	
	// Funcao que recupera os ID e prepara eles para exclusao no sistema.
	public function excluir() {
		esta_logado();
		if (is_admin(TRUE)):
			$iduser = $this->uri->segment(3);
			if ($iduser != NULL):
				$query = $this->Usuarios->get_byid($iduser);
				if ($query->num_rows()==1):
					$query = $query->row();
					if ($query->id != 1):
						$this->Usuarios->do_delete(array('id'=>$query->id), FALSE);
					else:
						set_msg('msgerro', 'Este usu&aacute;rio n&atilde;o pode ser exclu&iacute;do', 'erro');
					endif;
				else:
					set_msg('msgerro', 'Usu&aacute;rio n&atilde;o encontrado para exclus&atilde;o', 'erro');
				endif;
			else:
				set_msg('msgerro', 'Escolha um usu&aacute;rio para excluir', 'erro');
			endif;
		endif;
		redirect('usuarios/gerenciar');
	}
	
}

?>
