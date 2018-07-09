<?php 

if (!defined("BASEPATH")) exit("No direct script access allowed");

switch ($tela):

	case 'gerenciar':
		?>
		<script type="text/javascript">
			$(function(){
				$('.deletareg').click(function(){
					if (confirm("Deseja realmente excluir este registro?\nEsta operacao nao podera ser desfeita!")) return true; else return false;
				});
			});
		</script>
		<div class="twelve columns">
			<?php
			echo breadcrumb();
			get_msg('msgok');
			get_msg('msgerro');
			$modo = $this->uri->segment(3);
			if ($modo == 'all'):
				$limite = 0;
			else:
				$limite = 50;
				echo '<p>Mostrando os &Uacute;ltimos 50 registros, para ver todo hist&oacute;rico '.anchor('comentarios/gerenciar/all', 'clique aqui').'</p>';
			endif;
			
			?>
			<table class="twelve data-table">
				<thead>
					<tr>
						<th>Artigo</th>
						<th>Nome</th>
						<th>Coment&aacute;rio</th>
						<th>Data</th>
						<th>A&ccedil;&otilde;es</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$query = $this->Comentarios->get_all()->result();
					foreach ($query as $linha):
						echo '<tr>';
						printf('<td>%s</td>', $linha->nome_artigo);
						printf('<td>%s</td>', $linha->nome);
						if($linha->resposta != '') {
							printf('<td style="color:green">%s</td>', $linha->comentario);
						} else {
							printf('<td>%s</td>', $linha->comentario);
						}
						printf('<td>%s</td>', date('d/m/Y', strtotime($linha->data)));
						printf('<td class="text-center">%s%s%s</td>', anchor("comentarios/visualizar/$linha->id_comentario", ' ', array('class'=>'table-actions table-view', 'title'=>'Visualizar')), anchor("comentarios/editar/$linha->id_comentario", ' ', array('class'=>'table-actions table-edit', 'title'=>'Responder')), anchor("comentarios/excluir/$linha->id_comentario", ' ', array('class'=>'table-actions table-delete deletareg', 'title'=>'Excluir')));
						echo '</tr>';
					endforeach;
					?>
				</tbody>
			</table>
		</div>
		<?php
		break;
		
	case 'editar':
		$idcomentario = $this->uri->segment(3);
		if ($idcomentario==NULL):
		set_msg('msgerro', 'Escolha um coment&aacute;rio para responder.', 'erro');
		redirect('comentarios/gerenciar');
		endif;
			
			echo '<div class="twelve columns">';
					echo breadcrumb();
					if (is_admin() || $idcomentario == $this->session->userdata('user_id')):
						$query = $this->Comentarios->get_byid($idcomentario)->row();
						erros_validacao();
						get_msg('msgok');
						echo form_open(current_url(), array('class'=>'custom'));
						echo form_fieldset('Responder coment&aacute;rio');
						echo form_label('Nome');
						echo form_input(array('name'=>'nome', 'class'=>'five', 'disabled' => 'disabled'), set_value('nome', $query->nome));
						echo form_label('Comentario');
						echo form_input(array('name'=>'comentario', 'class'=>'five', 'disabled'=>'disabled'), set_value('comentario', $query->comentario));
						echo form_label('Resposta');
						echo form_textarea(array('name'=>'resposta', 'class'=>'six', 'row' => 10), set_value('resposta', $query->resposta), 'autofocus');
						echo anchor('comentarios/gerenciar', 'Cancelar', array('class'=>'button radius alert espaco'));
						echo form_submit(array('name'=>'editar', 'class'=>'button radius'), 'Salvar resposta');
						echo form_hidden('idcomentario', $idcomentario);
						echo form_fieldset_close();
						echo form_close();
					else:
						set_msg('msgerro', 'Seu usu&aacute;rio n&atilde;o tem permiss&atilde;o para executar esta opera&ccedil;&atilde;o', 'erro');
						redirect('comentarios/gerenciar');
					endif;
			echo '</div>';
		break;
		
	case 'visualizar':
		$idcomentario = $this->uri->segment(3);
		if ($idcomentario==NULL):
		set_msg('msgerro', 'Escolha um coment&aacute;rio para responder.', 'erro');
		redirect('comentarios/gerenciar');
		endif;
			
		echo '<div class="twelve columns">';
		echo breadcrumb();
		if (is_admin() || $idcomentario == $this->session->userdata('user_id')):
				$query = $this->Comentarios->get_byid($idcomentario)->row();
				erros_validacao();
				get_msg('msgok');
				echo form_open(current_url(), array('class'=>'custom'));
				echo form_fieldset('Coment&aacute;rio');
				echo form_label('Artigo do coment&aacute;rio');
				echo form_input(array('name'=>'nome_artigo', 'class'=>'five', 'disabled' => 'disabled'), set_value('nome_artigo', $query->nome_artigo));
				echo form_label('Nome');
				echo form_input(array('name'=>'nome', 'class'=>'five', 'disabled' => 'disabled'), set_value('nome', $query->nome));
				echo form_label('Comentario');
				echo form_input(array('name'=>'comentario', 'class'=>'five', 'disabled'=>'disabled'), set_value('comentario', $query->comentario));
				echo form_label('Resposta');
				echo form_textarea(array('name'=>'resposta', 'class'=>'six', 'row' => 10, 'disabled'=>'disabled'), set_value('resposta', $query->resposta));
				echo anchor('comentarios/gerenciar', 'Voltar', array('class'=>'button radius alert espaco'));
				//echo form_submit(array('name'=>'editar', 'class'=>'button radius'), 'Salvar resposta');
				echo form_hidden('idcomentario', $idcomentario);
				echo form_fieldset_close();
				echo form_close();
			else:
				set_msg('msgerro', 'Seu usu&aacute;rio n&atilde;o tem permiss&atilde;o para executar esta opera&ccedil;&atilde;o', 'erro');
				redirect('comentarios/gerenciar');
			endif;
			echo '</div>';
		break;
		
	default:
		echo '<div class="alert-box alert"><p>A tela solicitada n&atilde;o existe</p></div>';
		break;
endswitch;

?>