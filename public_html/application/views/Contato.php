<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html>
<head>
<title>{titulo}</title>
<!-- for-mobile-apps -->

<link rel="shortcut icon" href="<?php echo base_url()?>images/idicon.ico" />

<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Inspire Designer, Designer, Inspire, Design, Designer de interiores,
		 interiores, Arquitetura, Blog, Blog Designer" />

	<script type="application/x-javascript"> 
		addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } 
	</script>

<!-- //for-mobile-apps -->
<link href="<?= base_url() ?>css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="<?= base_url() ?>css/style_contato.css" rel="stylesheet" type="text/css" media="all" />
<!-- js -->
<script src="<?= base_url() ?>js/jquery-1.11.1.min.js"></script>
<!-- //js -->
<!-- start-smoth-scrolling -->
<script type="text/javascript" src="<?= base_url() ?>js/move-top.js"></script>
<script type="text/javascript" src="<?= base_url() ?>js/easing.js"></script>
<script type="text/javascript">
	jQuery(document).ready(function($) {
		$(".scroll").click(function(event){		
			event.preventDefault();
			$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
		});
	});
</script>
<!-- start-smoth-scrolling -->
</head>
	
<body>
<!-- banner-body -->
	<div class="banner-body cntct">
		<div class="container">
<!-- header -->
			<div class="header">
				<div class="header-nav">
					<nav class="navbar navbar-default">
						<!-- Brand and toggle get grouped for better mobile display -->
						<div class="navbar-header">
						  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						  </button>
						   <a class="navbar-brand" href="<?php base_url() ?>"><span>I</span>nspire Designer</a>
						</div>

						<!-- Collect the nav links, forms, and other content for toggling -->
						<div class="collapse navbar-collapse nav-wil" id="bs-example-navbar-collapse-1">
						 <ul class="nav navbar-nav">
							<li class="hvr-bounce-to-bottom "><?php echo anchor(base_url(), 'Home'); ?></li>
							<li class="hvr-bounce-to-bottom"><?php echo anchor('sobre', 'Sobre'); ?></li>
							<!-- <li class="hvr-bounce-to-bottom"><?php echo anchor('galeria', 'Galeria'); ?></li> -->
							<li class="hvr-bounce-to-bottom active"><?php echo anchor(current_url(), 'Contato'); ?></li>
						  </ul>
						</div><!-- /.navbar-collapse -->
					</nav>
				</div>
	
			<!-- search-scripts -->
			<script src="js/classie.js"></script>
			<script src="js/uisearch.js"></script>
				<script>
					new UISearch( document.getElementById( 'sb-search' ) );
				</script>
			<!-- //search-scripts -->
			</div>
<!-- //header -->
<!-- contact -->
	<div class="contact">
		<!-- <div class="contact-left">
			<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d2620.908687693293!2d2.3574429999999995!3d48.936181!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e66eb34e18b951%3A0xc3c6a4ac9498bfce!2sWorld&#39;s+Business+Import!5e0!3m2!1sen!2sin!4v1429768672602" frameborder="0" style="border:0"></iframe>
		</div>
		<div class="contact-right">
			<p class="phn">+9100 2481 5842</p>
			<p class="phn-bottom">4578 Marmora
					<span>Road, Glasgow D04 89GR</span></p>
			<p class="lom">Nullam ac urna velit. Pellentesque in arcu tortor. 
				Pellentesque nec est et elit varius pulvinar eget vitae sapien. 
				Aenean vehicula accumsan gravida.</p>
		</div> -->
		<div class="clearfix"> </div>
		<div class="contact-left1">
			<h3>Contate-nos <span>D&uacute;vidas e sugest&otilde;es</span></h3>
			<div class="in-left">
				<?php echo form_open('mensagem/cadastrar'); ?>
					<input type="text" name="nome" placeholder="Nome" />
					<input type="text" name="email" placeholder="E-mail" />				
			</div>
			<div class="in-right">
					<textarea name="mensagem" placeholder="Messagem"></textarea>
					<input type="submit" value="Enviar">
				<?php echo form_close(); ?>
			</div>
			<div class="clearfix"> </div>
		</div>
		<div class="contact-right1">
			<h3>Siga-me <span>Redes sociais</span></h3>
			<ul>
				<li><a href="#" class="g1"> </a></li>
				<li><a href="#" class="p1"> </a></li>
				<!--<li><a href="#" class="facebook1"> </a></li>
				<li><a href="#" class="twitter1"> </a></li>-->
			</ul>
		</div>
		<div class="clearfix"> </div>
	</div>
<!-- //contact -->
		</div>
	</div>
<!-- footer -->
	<div class="footer-bottom">
		<div class="container">
			{rodape}
		</div>
	</div>
<!-- //footer -->
<!-- for bootstrap working -->
		<script src="<?php echo base_url() ?>js/bootstrap.js"> </script>
<!-- //for bootstrap working -->
</body>
</html>