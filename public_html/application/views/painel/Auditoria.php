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
				echo '<p>Mostrando os &Uacute;ltimos 50 registros, para ver todo hist&oacute;rico '.anchor('auditoria/gerenciar/all', 'clique aqui').'</p>';
			endif;
			
			?>
			<table class="twelve data-table">
				<thead>
					<tr>
						<th>Usu&aacute;rio</th>
						<th>Data e hora</th>
						<th>Opera&ccedil;&atilde;o</th>
						<th>Observa&ccedil;&atilde;o</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$query = $this->Auditoria->get_all($limite)->result();
					foreach ($query as $linha):
						echo '<tr>';
						printf('<td>%s</td>', $linha->usuario);
						printf('<td>%s</td>', date('d/m/Y H:i:s', strtotime($linha->data_hora)));
						printf('<td>%s</td>', '<span class="has-tip tip-top" title="'.$linha->query.'">'.$linha->operacao.'</span>');
						printf('<td>%s</td>', $linha->observacao);
						echo '</tr>';
					endforeach;
					?>
				</tbody>
			</table>
		</div>
		<?php
		break;
	default:
		echo '<div class="alert-box alert"><p>A tela solicitada n&atilde;o existe</p></div>';
		break;
endswitch;

?>