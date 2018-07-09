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
		 interiores, Arquitetura, Blog, Blog Designer"> 
		 
		 <script type="application/x-javascript">
		 	addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
			function hideURLbar(){ window.scrollTo(0,1); } 
		</script>
		
<!-- //for-mobile-apps -->
<link href="<?= base_url() ?>css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="<?= base_url() ?>css/style_sobre.css" rel="stylesheet" type="text/css" media="all" />
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
	<div class="banner-body abt">
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
							<li class="hvr-bounce-to-bottom"><?php echo anchor(base_url(), 'Home'); ?></li>
							<li class="hvr-bounce-to-bottom active"><?php echo anchor(current_url(), 'Sobre'); ?></li>
							<!-- <li class="hvr-bounce-to-bottom"><?php echo anchor('galeria', 'Galeria'); ?></li> -->
							<li class="hvr-bounce-to-bottom"><?php echo anchor('contato', 'Contato'); ?></li>
						  </ul>
						</div><!-- /.navbar-collapse -->
					</nav>
				</div>
	
			<!-- search-scripts -->
			<script src="<?php base_url() ?>js/classie.js"></script>
			<script src="<?php base_url() ?>js/uisearch.js"></script>
				<script>
					new UISearch( document.getElementById( 'sb-search' ) );
				</script>
			<!-- //search-scripts -->
			</div>
<!-- //header -->
<!-- about-page -->
	<div class="about">
			<div class="about-info">
				<div class="col-md-5 about-info-left">
					<img src="images/_photo.png" alt=""/>
				</div>
				<div class="col-md-7 about-info-right">
					<h4>Quem sou eu?</h4>
					<p>The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here'
					There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, <span>by injected humour,  to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, 
					or randomised words which don't look even slightly believable.Lorem Ipsum available, but the majority</span> have suffered alteration in some form, by injected humour.</p>
				</div>
				<div class="clearfix"> </div>
				
			</div>
			</div>
		</div>
<!-- //about-page -->
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
		<script src="<?php base_url() ?>js/bootstrap.js"> </script>
<!-- //for bootstrap working -->
</body>
</html>
