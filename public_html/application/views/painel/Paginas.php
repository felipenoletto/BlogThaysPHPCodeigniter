<?php 

if (!defined("BASEPATH")) exit("No direct script access allowed");

switch ($tela):

	case 'cadastrar':
		echo '<div class="twelve columns">';
		echo breadcrumb();
		erros_validacao();
		get_msg('msgok');
		get_msg('msgerro');
		echo form_open_multipart('paginas/cadastrar', array('class'=>'custom'));
		echo form_fieldset('Cadastrar novo Artigo');
		echo form_label('T&iacute;tulo');
		echo form_input(array('name'=>'titulo', 'class'=>'six'), set_value('titulo'), 'autofocus');
		echo form_label('Arquivo (Resolu&ccedil;&atilde;o recomendada: 668x281)');
		echo form_upload(array('name'=>'arquivo', 'class'=>'twelve'), set_value('arquivo'));
		echo form_label('Slug');
		echo form_input(array('name'=>'slug', 'class'=>'six' , 'disabled' => 'disabled'), set_value('slug'));
		echo '<p>'.anchor('#', 'Inserir imagens', 'class="addimg button tiny radius"');
		echo anchor('midia/cadastrar', 'Upload de imagens', 'target="_blank" class="button tiny secondary radius"').'</p>';
		echo form_label('Conte&uacute;do');
		echo form_textarea(array('name'=>'conteudo', 'class'=>'twelve htmleditor', 'rows'=>20), set_value('conteudo'));
		echo form_label('Status');
		$opcoes = array('' => 'Selecione', 'ativo'  => 'ATIVO', 'inativo'    => 'INATIVO', 'publicar'   => 'PUBLICAR');
		echo form_dropdown('status', $opcoes, '');
		echo form_hidden('data', date('Y-m-d'));
		echo "<br><br>";
		echo anchor('paginas/gerenciar', 'Cancelar', array('class'=>'button radius alert espaco'));
		echo form_submit(array('name'=>'cadastrar', 'class'=>'button radius'), 'Salvar Artigo');
		echo form_fieldset_close();
		echo form_close();
		echo '</div>';
		incluir_arquivo('insertimg');
		break;
		
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
			?>
			<table class="twelve data-table">
				<thead>
					<tr>
						<th>#</th>
						<th>T&iacute;tulo</th>
						<th>Slug</th>
						<th>Resumo</th>
						<th class="text-center">A&ccedil;&otilde;es</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$query = $this->Paginas->get_all()->result();
					foreach ($query as $linha):
						echo '<tr>';
						printf('<td>%s</td>', $linha->id);
						printf('<td>%s</td>', $linha->titulo);
						printf('<td>%s</td>', $linha->slug);
						printf('<td>%s</td>', resumo_post($linha->conteudo, 8));
						printf('<td class="text-center">%s %s</td>', anchor("paginas/editar/$linha->id", ' ', array('class'=>'table-actions table-edit', 'title'=>'Editar')), anchor("paginas/excluir/$linha->id", ' ', array('class'=>'table-actions table-delete deletareg', 'title'=>'Excluir')));
						echo '</tr>';
					endforeach;
					?>
				</tbody>
			</table>
		</div>
		<?php
		break;
		
	case 'editar':
		$idpagina = $this->uri->segment(3);
		if ($idpagina==NULL):
			set_msg('msgerro', 'Escolha uma p&aacute;gina para alterar', 'erro');
			redirect('paginas/gerenciar');
		endif; ?>
		<div class="twelve columns">
			<?php
			$query = $this->Paginas->get_byid($idpagina)->row();
			echo breadcrumb();
			erros_validacao();
			get_msg('msgok');
			get_msg('msgerro');
			echo form_open(current_url(), array('class'=>'custom'));
			echo form_fieldset('Alterar p&aacute;gina');
			echo form_label('T&iacute;tulo');
			echo form_input(array('name'=>'titulo', 'class'=>'six'), set_value('titulo', $query->titulo), 'autofocus');
			echo form_label('Slug (deixe em branco se n&atilde;o souber do que se trata)');
			echo form_input(array('name'=>'slug', 'class'=>'six'), set_value('slug', $query->slug));
			echo '<p>'.anchor('#', 'Inserir imagens', 'class="addimg button tiny radius"');
			echo anchor('midia/cadastrar', 'Upload de imagens', 'target="_blank" class="button tiny secondary radius"').'</p>';
			echo form_label('Conte&uacute;do');
			echo form_textarea(array('name'=>'conteudo', 'class'=>'twelve htmleditor', 'rows'=>20), set_value('conteudo', to_html($query->conteudo)));
			echo form_label('Status');
			$opcoes = array('' => 'Selecione', 'ativo'  => 'ATIVO', 'inativo'    => 'INATIVO', 'publicar'   => 'PUBLICAR');
			echo form_dropdown('status', $opcoes, $query->status);
			echo anchor('paginas/gerenciar', 'Cancelar', array('class'=>'button radius alert espaco'));
			echo form_submit(array('name'=>'editar', 'class'=>'button radius'), 'Salvar dados');
			echo form_hidden('idpagina', $query->id);
			echo form_fieldset_close();
			echo form_close();
			?>
		</div>		
		<?php
		incluir_arquivo('insertimg');
		break;
		
	default:
		echo '<div class="alert-box alert"><p>A tela solicitada n&atilde;o existe</p></div>';
		break;
endswitch;

?>