<!DOCTYPE html>
	<!-- paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/ -->
	<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
	<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
	<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
	<!--[if gt IE 8]><!--> <html class="no-js" lang="pt-br"> <!--<![endif]-->
	<head>
		<meta charset="utf-8" />
		<!-- Set the viewport width to device width for mobile -->
		<meta name="viewport" content="width=device-width" />
		<title><?php if(isset($titulo)): ?>{titulo} | <?php endif; ?>{titulo_padrao}</title>
		
		<!-- IE Fix for HTML5 Tags -->
		<!--[if lt IE 9]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
		{headerinc}
	</head>
	<body>
		<?php if(esta_logado(FALSE)): ?>
			<div class="row header">
				<div class="eight columns">
					<a href="<?php echo base_url('painel'); ?>"><h1>Painel Administrativo</h1></a>
				</div>
				<div class="four columns">
					<p class="text-right">Logado como <strong><?php echo $this->session->userdata('user_nome'); ?></strong></p>
					<p class="text-right">
						<?php echo anchor('usuarios/alterar_senha/'.$this->session->userdata('user_id'), 'Alterar senha', 'class="button radius tiny"'); ?>
						<?php echo anchor('usuarios/logoff', 'Sair', 'class="button radius tiny alert"'); ?>
					</p>
				</div>
			</div>
			<div class="row">
				<div class="twelve columns menu-site">
					<ul class="nav-bar">
						<li><?php echo anchor('painel', 'Home'); ?></li>
						<li class="has-flyout">
							<?php echo anchor('paginas/gerenciar', 'Artigos'); ?>
							<ul class="flyout">
								<li><?php echo anchor('paginas/cadastrar', 'Cadastrar'); ?></li>
								<li><?php echo anchor('paginas/gerenciar', 'Gerenciar'); ?></li>
							</ul>
						</li>
						<li class="has-flyout">
							<?php echo anchor('midia/gerenciar', 'M&iacute;dias'); ?>
							<ul class="flyout">
								<li><?php echo anchor('midia/cadastrar', 'Cadastrar'); ?></li>
								<li><?php echo anchor('midia/gerenciar', 'Gerenciar'); ?></li>
							</ul>
						</li>
						<li class="has-flyout">
							<?php echo anchor('comentarios/gerenciar', 'Coment&aacute;rios'); ?>
							<ul class="flyout">
								<li><?php echo anchor('comentarios/gerenciar', 'Coment&aacute;rios por artigos'); ?></li>
							</ul>
						</li>
						<li class="has-flyout">
							<?php echo anchor('mensagem/gerenciar', 'Mensagens'); ?>
							<ul class="flyout">
								<li><?php echo anchor('mensagem/gerenciar', 'Lista de Mensagens'); ?></li>
							</ul>
						</li>
						<li class="has-flyout">
							<?php echo anchor('newsletter/gerenciar', 'Newsletter'); ?>
							<ul class="flyout">
								<li><?php echo anchor('newsletter/gerenciar', 'Lista de Newsletter'); ?></li>
							</ul>
						</li>
						<li class="has-flyout">
							<?php echo anchor('usuarios/gerenciar', 'Usu&aacute;rios'); ?>
							<ul class="flyout">
								<li><?php echo anchor('usuarios/cadastrar', 'Cadastrar'); ?></li>
								<li><?php echo anchor('usuarios/gerenciar', 'Gerenciar'); ?></li>
							</ul>
						</li>
						<li class="has-flyout">
							<a href="">Config.</a>
							<ul class="flyout">
								<!--<li>echo anchor('Newsletter/gerenciar', 'Feed de not&iacute;cias');</li>-->
								<li><?php echo anchor('auditoria/gerenciar', 'Auditoria'); ?></li>
								<li><?php echo anchor('settings/gerenciar', 'Configura&ccedil;&otilde;es'); ?></li>
							</ul>
						</li>
						<li>
							<?php echo anchor(base_url(), 'Blog', array('target' => 'blank')); ?>
						</li>
					</ul>
				</div>
			</div>
		<?php endif; ?>
		<div class="row paineladm">
			{conteudo}
		</div>
		<div class="row rodape">
			<div class="twelve columns text-center">
				{rodape}
			</div>
		</div>
		{footerinc}
	</body>
</html>