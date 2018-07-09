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
					$('input').click(function(){
						(this).select();
					});
				});
			</script>
			<div class="twelve columns">
				<?php
				echo breadcrumb();
				get_msg('msgok');
				get_msg('msgerro');			
				?>
				<table class="twelve data-table">
					<thead>
						<tr>
							<th>Email</th>
							<th class="text-center">A&ccedil;&otilde;es</th>
						</tr>
					</thead>
					<tbody>
						<?php
							$query = $this->Newsletter->get_all()->result();
							foreach ($query as $linha):
								echo '<tr>';
								printf('<td><input type="text" value="%s" /></td>', $linha->email);
								printf('<td class="text-center">%s %s</td>', anchor("newsletter/editar/$linha->id", ' ', array('class'=>'table-actions table-answer', 'title'=>'Enviar news')), anchor("newsletter/excluir/$linha->id", ' ', array('class'=>'table-actions table-delete deletareg', 'title'=>'Excluir')));
								echo '</tr>';
							endforeach;
						?>
					</tbody>
				</table>
			</div>
			<?php
			break;
			
	case 'editar':
		$idnews = $this->uri->segment(3);
			if ($idnews==NULL):
				set_msg('msgerro', 'Escolha uma newsletter para enviar email', 'erro');
				redirect('newsletter/gerenciar');
			endif;
			?>
			<!-- <div class='twelve columns'> -->
			<?php 	
			echo breadcrumb();
			if (is_admin() || $idnews == $this->session->userdata('user_id')):
				$query = $this->Newsletter->get_byid($idnews)->row();
				echo form_open(current_url(), array('class'=>'custom'));
				echo form_fieldset('Newsletter');
				echo form_input(array('name'=>'email', 'class'=>'five'), set_value('email', $query->email));
				echo anchor('newsletter/gerenciar', 'Voltar', array('class'=>'button radius alert espaco'));
				echo form_submit(array('name'=>'editar', 'class'=>'button radius'), 'Enviar');
				echo form_hidden('idnews', $query->id);
				echo form_fieldset_close();
				echo form_close();
			else:
				set_msg('msgerro', 'Seu usu&aacute;rio n&atilde;o tem permiss&atilde;o para executar esta opera&ccedil;&atilde;o', 'erro');
				redirect('newsletter/gerenciar');
			endif;
			?>
			</div>
			<?php
			break;
			
			default:
				echo '<div class="alert-box alert"><p>A tela solicitada n&atilde;o existe</p></div>';
			break;
		
endswitch;

?>