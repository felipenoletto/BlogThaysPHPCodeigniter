<?php 

if (!defined("BASEPATH")) exit("No direct script access allowed");

// CLASSE/LIBRARIES - RB_SISTEMA
class RB_Sistema {
	
	protected $CI;
	public $tema = array();
	
	// Metodo construtor da classe.
	public function __construct() {
		$this->CI =& get_instance();
		$this->CI->load->helper('Funcoes');
	}
	
	
	// Funcao que realiza o envio de emails.
	public function enviar_email($para, $assunto, $mensagem, $formato ='html') {
		
		/* POR ENQUANTO A FUNCAO NAO PODE SER USADA PQ O PLANO DE HOSPEDAGEM NAO COBRE SMTP */
		$this->CI->load->library('email');
		$config['mailtype'] = $formato;
		$this->CI->email->initialize($config);
		$this->CI->email->from('adm@site.com', 'Administracao do site');
		$this->CI->email->to($para);
		$this->CI->email->subject($assunto);
		$this->CI->email->message($mensagem);
		
			if ($this->CI->email->send()) :
				return TRUE;
			else:
				return $this->CI->email->print_debugger();
			endif;
	
	}
	
}

?>