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
							<th>Nome</th>
							<th>Email</th>
							<th>Mensagem</th>
							<th class="text-center">A&ccedil;&otilde;es</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$query = $this->Mensagem->get_all()->result();
						foreach ($query as $linha):
							echo '<tr>';
							printf('<td>%s</td>', $linha->nome);
							printf('<td><input type="text" value="%s" size="45" /></td>', $linha->email);
							printf('<td>%s</td>', resumo_post($linha->mensagem, 43));
							printf('<td class="text-center">%s %s</td>', anchor("mensagem/visualizar/$linha->id", ' ', array('class'=>'table-actions table-view', 'title'=>'Visualizar')), anchor("mensagem/excluir/$linha->id", ' ', array('class'=>'table-actions table-delete deletareg', 'title'=>'Excluir')));
							echo '</tr>';
						endforeach;
						?>
					</tbody>
				</table>
			</div>
			<?php
			break;
			
	case 'visualizar':
		$id = $this->uri->segment(3);
			if ($id==NULL):
				set_msg('msgerro', 'Escolha uma mensagem para alterar', 'erro');
				redirect('mensagem/gerenciar');
			endif;
			?>
			<!-- <div class='twelve columns'> -->
			<?php 	
			echo breadcrumb();
			if (is_admin() || $id == $this->session->userdata('user_id')):
				$query = $this->Mensagem->get_byid($id)->row();
				echo form_open(current_url(), array('class'=>'custom'));
				echo form_fieldset('Mensagem');
				echo form_label('Nome');
				echo form_input(array('name'=>'nome', 'class'=>'five', 'disabled'=>'disabled'), set_value('nome', $query->nome));
				echo form_label('Email');
				echo form_input(array('name'=>'email', 'class'=>'five', 'disabled'=>'disabled'), set_value('email', $query->email));
				echo form_label('Mensagem');
				echo form_textarea(array('name'=>'mensagem', 'class'=>'six', 'row' => 10, 'disabled'=>'disabled'), set_value('mensagem', $query->mensagem));
				echo anchor('mensagem/gerenciar', 'Voltar', array('class'=>'button radius alert espaco'));
				echo form_fieldset_close();
				echo form_close();
			else:
				set_msg('msgerro', 'Seu usu&aacute;rio n&atilde;o tem permiss&atilde;o para executar esta opera&ccedil;&atilde;o', 'erro');
				redirect('mensagem/gerenciar');
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