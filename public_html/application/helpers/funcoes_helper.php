<?php 

if (!defined("BASEPATH")) exit("No direct script access allowed");

// CLASSE/HELPER - FUNCOES_HELPERS

// Funcao que carrega um modulo do sistema devolvendo a tela solicitada - PAINEL.
function load_modulo($modulo=NULL, $tela=NULL, $diretorio='painel'){
	
	$CI =& get_instance();
	if ($modulo!=NULL):
		return $CI->load->view("$diretorio/$modulo", array('tela'=>$tela), TRUE);
	else:
		return FALSE;
	endif;
}


// Funcao que carrega um modulo do sistema devolvendo a tela solicitada - INSPIRE DESIGNER.
function load_modulo_id($modulo=NULL, $tela=NULL, $var1, $var2){

	$CI =& get_instance();
	if ($modulo!=NULL):
	$CI->load->library('pagination');
	return $CI->load->view("$modulo", array('tela'=>$tela, 'var1' => $var1, 'var2' => $var2), TRUE);
	else:
	return FALSE;
	endif;
}

// Funcao que carrega um modulo do sistema devolvendo a tela solicitada - INSPIRE DESIGNER.
function load_modulo_artigo($modulo=NULL, $tela=NULL){

	$CI =& get_instance();
	if ($modulo!=NULL):
	return $CI->load->view("$modulo", array('tela'=>$tela), TRUE);
	else:
	return FALSE;
	endif;
}

// Funcao que seta valores ao array $tema da classe sistema.
function set_tema($prop, $valor, $replace=TRUE){
	
	$CI =& get_instance();
	$CI->load->library('Sistema');
	if ($replace):
		$CI->Sistema->tema[$prop] = $valor;
	else:
		if (!isset($CI->Sistema->tema[$prop])) $CI->Sistema->tema[$prop] = '';
		$CI->Sistema->tema[$prop] .= $valor;
	endif;
}


// Funcao que retorna os valores do array $tema da classe sistema.
function get_tema(){
	$CI =& get_instance();
	$CI->load->library('Sistema');
	return $CI->Sistema->tema;
}


// Funcao que inicializa o painel adm carregando os recursos necessarios.
function init_painel(){
	
	$CI =& get_instance();
	$CI->load->library(array('parser', 'session', 'form_validation', 'Sistema'));
	$CI->load->helper(array('form', 'url', 'array', 'text'));
	//carregamento dos models
	$CI->load->model('Usuarios_model', 'Usuarios');
	
	set_tema('titulo_padrao', 'Gerenciamento de conte&uacute;do');
	set_tema('rodape', '<p>&copy; 2016 Inspire Designer. Todos os direitos reservados.</p>');
	set_tema('template', 'Painel_view');
	
	set_tema('headerinc', load_css(array('foundation.min', 'app')), FALSE);
	set_tema('headerinc', load_js(array('foundation.min', 'app')), FALSE);
	set_tema('footerinc', '');
}


// Funcao que inicializa o site carregando os recursos necessarios.
function init_site(){
	
	$CI =& get_instance();
	$CI->load->library(array('parser', 'Sistema', 'session', 'form_validation', 'pagination'));
	$CI->load->helper(array('form', 'url', 'array', 'text'));
	//carregamento dos models
	$CI->load->model('Id_model', 'ID');
	$CI->load->model('Comentarios_model', 'Comentarios');
	$CI->load->model('Newsletter_model', 'Newsletter');
	$CI->load->model('Visitas_model', 'Visitas');

	set_tema('titulo', 'Inspire Designer');
	set_tema('tituloblog', 'Inspire Designer');
	set_tema('rodape', '<p>&copy; 2016. Todos os direitos reservados &agrave;  Inspire Designer. Layout desenvolvido por <a href="http://w3layouts.com" target="blanck">w3layouts</a>.</p>');
	set_tema('template', 'Id');

	set_tema('headerinc', load_css(array('bootstrap', 'chocolat', 'style')), FALSE);
	set_tema('headerinc', load_js(array('easing', 'jquery.chocolat', 'jquery.flexisel', 'jquery.hoverdir', 'jquery.min', 'modernizr.custom.97074', 'move-top')), FALSE);
	set_tema('footerinc', '');
}


// Funcao que inicializa o site carregando os recursos necessarios.
function init_artigo(){

	$CI =& get_instance();
	$CI->load->library(array('parser', 'Sistema', 'session', 'form_validation'));
	$CI->load->helper(array('form', 'url', 'array', 'text'));
	//carregamento dos models
	$CI->load->model('Id_model', 'ID');
	$CI->load->model('Comentarios_model', 'Comentarios');
	$CI->load->model('Artigo_model', 'Artigos');

	set_tema('titulo', 'Inspire Designer');
	set_tema('tituloblog', 'Inspire Designer');
	set_tema('rodape', '<p>&copy; 2016. Todos os direitos reservados &agrave;  Inspire Designer. Layout desenvolvido por <a href="http://w3layouts.com" target="blanck">w3layouts</a>.</p>');
	set_tema('template', 'Artigo');

	set_tema('headerinc', load_css(array('bootstrap', 'chocolat', 'style')), FALSE);
	set_tema('headerinc', load_js(array('easing', 'jquery.chocolat', 'jquery.flexisel', 'jquery.hoverdir', 'jquery.min', 'modernizr.custom.97074', 'move-top')), FALSE);
	set_tema('footerinc', '');
}


// Funcao que inicializa a pagina SOBRE carregando os recursos necessarios.
function init_sobre(){
	
	$CI =& get_instance();
	$CI->load->library(array('parser', 'Sistema', 'session', 'form_validation'));
	$CI->load->helper(array('form', 'url', 'array', 'text'));
	
	set_tema('titulo', 'Sobre | Inspire Designer');
	set_tema('rodape', '<p>&copy; 2016. Todos os direitos reservados &agrave;  Inspire Designer. Layout desenvolvido por <a href="http://w3layouts.com" target="blanck">w3layouts</a>.</p>');
	set_tema('template', 'Sobre');
	
	set_tema('headerinc', load_css(array('bootstrap', 'chocolat', 'style')), FALSE);
	set_tema('headerinc', load_js(array('easing', 'jquery.chocolat', 'jquery.flexisel', 'jquery.hoverdir', 'jquery.min', 'modernizr.custom.97074', 'move-top')), FALSE);
	set_tema('footerinc', '');
}


// Funcao que inicializa a pagina GALERIA carregando os recursos necessarios.
function init_galeria(){

	$CI =& get_instance();
	$CI->load->library(array('parser', 'Sistema', 'session', 'form_validation'));
	$CI->load->helper(array('form', 'url', 'array', 'text'));
	
	set_tema('titulo', 'Galeria | Inspire Designer');
	set_tema('rodape', '<p>&copy; 2016. Todos os direitos reservados &agrave;  Inspire Designer. Layout desenvolvido por <a href="http://w3layouts.com" target="blanck">w3layouts</a>.</p>');
	set_tema('template', 'Galeria');

	set_tema('headerinc', load_css(array('bootstrap', 'chocolat', 'style')), FALSE);
	set_tema('headerinc', load_js(array('easing', 'jquery.chocolat', 'jquery.flexisel', 'jquery.hoverdir', 'jquery.min', 'modernizr.custom.97074', 'move-top')), FALSE);
	set_tema('footerinc', '');
}


// Funcao que inicializa a pagina CONTATO carregando os recursos necessarios.
function init_contato(){

	$CI =& get_instance();
	$CI->load->library(array('parser', 'Sistema', 'session', 'form_validation'));
	$CI->load->helper(array('form', 'url', 'array', 'text'));
	
	set_tema('titulo', 'Contato | Inspire Designer');
	set_tema('rodape', '<p>&copy; 2016. Todos os direitos reservados &agrave;  Inspire Designer. Layout desenvolvido por <a href="http://w3layouts.com" target="blanck">w3layouts</a>.</p>');
	set_tema('template', 'Contato');

	set_tema('headerinc', load_css(array('bootstrap', 'chocolat', 'style')), FALSE);
	set_tema('headerinc', load_js(array('easing', 'jquery.chocolat', 'jquery.flexisel', 'jquery.hoverdir', 'jquery.min', 'modernizr.custom.97074', 'move-top')), FALSE);
	set_tema('footerinc', '');
}


// Funcao que inicializa o tinymce para criacao de textarea com editor html.
function init_htmleditor(){
	
	set_tema('headerinc', load_js(base_url('htmleditor/jquery.tinymce.js'), NULL, TRUE), FALSE);
	set_tema('headerinc', incluir_arquivo('htmleditor', 'includes', FALSE), FALSE);
}


// Funcao que retorna ou printa o conteudo de uma view.
function incluir_arquivo($view, $pasta='includes', $echo=TRUE){
	
	$CI =& get_instance();
	if ($echo==TRUE):
		echo $CI->load->view("$pasta/$view", '', TRUE);
		return TRUE;
	endif;
	return $CI->load->view("$pasta/$view", '', TRUE);
}


// Funcao que carrega um template passando o array $tema como parametro.
function load_template(){
	
	$CI =& get_instance();
	$CI->load->library('Sistema');
	$CI->parser->parse($CI->Sistema->tema['template'], get_tema());
}


// Funcao que carrega um ou varios arquivos .css de uma pasta.
function load_css($arquivo=NULL, $pasta='css', $media='all'){
	
	if ($arquivo != NULL):
		$CI =& get_instance();
		$CI->load->helper('url');
		$retorno = '';
		if (is_array($arquivo)):
			foreach ($arquivo as $css):
				$retorno .= '<link rel="stylesheet" type="text/css" href="'.base_url("$pasta/$css.css").'" media="'.$media.'" />';
			endforeach;
		else:
			$retorno .= '<link rel="stylesheet" type="text/css" href="'.base_url("$pasta/$arquivo.css").'" media="'.$media.'" />';
		endif;
	endif;
	return $retorno;
}


// Funcao que carrega um ou varios arquivos .js de uma pasta ou servidor remoto.
function load_js($arquivo=NULL, $pasta='js', $remoto=FALSE){
	
	if ($arquivo != NULL):
		$CI =& get_instance();
		$CI->load->helper('url');
		$retorno = '';
		if (is_array($arquivo)):
			foreach ($arquivo as $js):
				if ($remoto):
					$retorno .= '<script type="text/javascript" src="'.$js.'"></script>';
				else:
					$retorno .= '<script type="text/javascript" src="'.base_url("$pasta/$js.js").'"></script>';
				endif;
			endforeach;
		else:
			if ($remoto):
				$retorno .= '<script type="text/javascript" src="'.$arquivo.'"></script>';
			else:
				$retorno .= '<script type="text/javascript" src="'.base_url("$pasta/$arquivo.js").'"></script>';
			endif;
		endif;
	endif;
	return $retorno;
}


// Funcao que mostra erros de validacao em forms.
function erros_validacao(){
	
	if (validation_errors()) echo '<div class="alert-box alert">'.validation_errors('<p>', '</p>').'</div>';
}


// Funcao que verifica se o usuario esta logado no sistema.
function esta_logado($redir=TRUE){
	
	$CI =& get_instance();
	$CI->load->library('session');
	$user_status = $CI->session->userdata('user_logado');
	if (!isset($user_status) || $user_status != TRUE):
		$CI->session->sess_destroy();
		if ($redir):
			$CI->session->set_userdata(array('redir_para'=>current_url()));
			set_msg('errologin', 'Acesso restrito, fa&ccedil;a login antes de prosseguir', 'erro');
			redirect('usuarios/login');
		else:
			return FALSE;
		endif;
	else:
		return TRUE;
	endif;
}


// Funcao que define uma mensagem para ser exibida na proxima tela carregada.
function set_msg($id='msgerro', $msg=NULL, $tipo='erro'){
	
	$CI =& get_instance();
	switch ($tipo):
		case 'erro':
			$CI->session->set_flashdata($id, '<div class="alert-box alert"><p>'.$msg.'</p></div>');
			break;
		case 'sucesso':
			$CI->session->set_flashdata($id, '<div class="alert-box success"><p>'.$msg.'</p></div>');
			break;
		default:
			$CI->session->set_flashdata($id, '<div class="alert-box"><p>'.$msg.'</p></div>');
			break;
	endswitch;
}


// Funcao que verifica se existe uma mensagem para ser exibida na tela atual.
function get_msg($id, $printar=TRUE){
	
	$CI =& get_instance();
	if ($CI->session->flashdata($id)):
		if ($printar):
			echo $CI->session->flashdata($id);
			return TRUE;
		else:
			return $CI->session->flashdata($id);
		endif;
	endif;
	return FALSE;
}


// Funcao que verifica se o usuario atual eh administrador.
function is_admin($set_msg=FALSE){
	
	$CI =& get_instance();
	$user_admin = $CI->session->userdata('user_admin');
	if (!isset($user_admin) || $user_admin != TRUE):
		if ($set_msg) set_msg('msgerro', 'Seu usu&aacute;rio n&atilde;o tem permiss&atilde;o para executar esta opera&ccedil;&atilde;o', 'erro');
		return FALSE;
	else:
		return TRUE;
	endif;
}


// Funcao que gera um breadcrumb com base no controller atual.
function breadcrumb(){
	
	$CI =& get_instance();
	$CI->load->helper('url');
	$classe = ucfirst($CI->router->class);
	if ($classe == 'painel'):
		$classe = anchor($CI->router->class, 'Home');
	else:
		$classe = anchor($CI->router->class, $classe);
	endif;
	$metodo = ucwords(str_replace('_', ' ', $CI->router->method));
	if ($metodo && $metodo != 'Index'):
		$metodo = " &raquo; ".anchor($CI->router->class."/".$CI->router->method, $metodo);
	else:
		$metodo = '';
	endif;
	return '<p>Sua localiza&ccedil;&atilde;o: '.anchor('painel', 'Painel').' &raquo; '.$classe.$metodo.'</p>';
}


// Funcao que seta um registro na tabela de auditoria.
function auditoria($operacao, $obs='', $query=TRUE){
	
	$CI =& get_instance();
	$CI->load->library('session');
	$CI->load->model('Auditoria_model', 'Auditoria');
	if ($query):
		$last_query = $CI->db->last_query();
	else:
		$last_query = '';
	endif;
	if (esta_logado(FALSE)):
		$user_id = $CI->session->userdata('user_id');
		$user_login = $CI->Usuarios->get_byid($user_id)->row()->login;
	else:
		$user_login = 'Desconhecido';
	endif;
	$dados = array(
		'usuario' => $user_login,
		'operacao' => $operacao,
		'query' => $last_query,
		'observacao' => $obs,
	);
	$CI->Auditoria->do_insert($dados);
}


// Funcao que gera uma miniatura de uma imagem caso ela ainda nao exista.
function thumb($imagem=NULL, $largura=100, $altura=75, $geratag=TRUE){
	
	$CI =& get_instance();
	$CI->load->helper('file');
	$thumb = $largura.'x'.$altura.'_'.$imagem;
	$thumbinfo = get_file_info('./uploads/thumbs/'.$thumb);
	if ($thumbinfo!=FALSE):
		$retorno = base_url('uploads/thumbs/'.$thumb);
	else:
		$CI->load->library('image_lib');
		$config['image_library'] = 'gd2';
		$config['source_image'] = './uploads/'.$imagem;
		$config['new_image'] = './uploads/thumbs/'.$thumb;
		$config['maintain_ratio'] = TRUE;
		$config['width'] = $largura;
		$config['height'] = $altura;
		$CI->image_lib->initialize($config);
		if ($CI->image_lib->resize()):
			$CI->image_lib->clear();
			$retorno = base_url('uploads/thumbs/'.$thumb);
		else:
			$retorno = FALSE;
		endif;
	endif;
	if ($geratag && $retorno != FALSE) $retorno = '<img src="'.$retorno.'" alt="" />';
	return $retorno;
}


// Funcao que gera um slug basedo no titulo.
function slug($string=NULL){
	
	$string = remove_acentos($string);
	return url_title($string, '-', TRUE);
}


// Funcao que remove acentos e caracteres especiais de uma string.
function remove_acentos($string=NULL){
	
	$procurar    = array('À','Á','Ã','Â','É','Ê','Í','Ó','Õ','Ô','Ú','Ü','Ç','à','á','ã','â','é','ê','í','ó','õ','ô','ú','ü','ç');
	$substituir  = array('A','A','A','A','E','E','I','O','O','O','U','U','C','a','a','a','a','e','e','i','o','o','o','u','u','c');
	return str_replace($procurar, $substituir, $string);
}


// Funcao que gera o resumo de uma string.
function resumo_post($string=NULL, $palavras=50, $decodifica_html=TRUE, $remove_tags=TRUE){
	
	if ($string!=NULL):
		if ($decodifica_html) $string = to_html($string);
		if ($remove_tags) $string = strip_tags($string);
		$retorno = word_limiter($string, $palavras);
	else:
		$retorno = FALSE;
	endif;
	return $retorno;
}


// Funcao que converte dados do bd para html valido.
function to_html($string=NULL){
	
	return html_entity_decode($string);
}


// Funcao que salva ou atualiza uma config no bd.
function set_setting($nome, $valor=''){
	
	$CI =& get_instance();
	$CI->load->model('Settings_model', 'Settings');
	if ($CI->Settings->get_bynome($nome)->num_rows() == 1):
		if (trim($valor) == ''):
			$CI->Settings->do_delete(array('nome_config'=>$nome), FALSE);
		else:
			$dados = array(
				'nome_config' => $nome,
				'valor_config' => $valor
			);
			$CI->Settings->do_update($dados, array('nome_config'=>$nome), FALSE);
		endif;
	else:
		$dados = array(
			'nome_config' => $nome,
			'valor_config' => $valor
		);
		$CI->Settings->do_insert($dados, FALSE);
	endif;
}


// Funcao que retorna uma config do bd.
function get_setting($nome){
	
	$CI =& get_instance();
	$CI->load->model('Settings_model', 'Settings');
	$setting = $CI->Settings->get_bynome($nome);
	if ($setting->num_rows()==1):
		$setting = $setting->row();
		return $setting->valor_config;
	else:
		return NULL;
	endif;
}

?>