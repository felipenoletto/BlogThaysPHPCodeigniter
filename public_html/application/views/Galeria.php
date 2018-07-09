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
<link href="<?= base_url() ?>css/style_galeria.css" rel="stylesheet" type="text/css" media="all" />
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
<!-- for portfolio -->
<link rel="stylesheet" type="text/css" href="<?= base_url() ?>css/style5.css" />
<link rel="stylesheet" type="text/css" href="<?= base_url() ?>css/common.css" />
<!-- //for portfolio -->
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
							<li class="hvr-bounce-to-bottom"><?php echo anchor('sobre', 'Sobre'); ?></li>
							<li class="hvr-bounce-to-bottom active"><?php echo anchor(current_url(), 'Galeria'); ?></li>
							<li class="hvr-bounce-to-bottom"><?php echo anchor('contato', 'Contato'); ?></li>
						  </ul>
						</div><!-- /.navbar-collapse -->
					</nav>
				</div>
	
			<!-- INICIO SCRIPT SLIDER DIREITO -->
				<script src="<?= base_url() ?>js/responsiveslides.min.js"></script>
				 <script>
				    // You can also use "$(window).load(function() {"
				    $(function () {
				      // Slideshow 4
				      $("#slider2").responsiveSlides({
				        auto: true,
				        pager: false,
				        nav: false,
				        speed: 500,
				        namespace: "callbacks",
				        before: function () {
				          $('.events').append("<li>before event fired.</li>");
				        },
				        after: function () {
				          $('.events').append("<li>after event fired.</li>");
				        }
				      });
				
				    });
				  </script>
				  <!-- FIM SCRIPT SLIDER DIREITO -->
				  
			</div>
		<!-- //header -->
		
		<!-- portfolio -->
			<div class="portfolio">
				<h3>Galeria</h3>
			
			
			
			<!-- INICIO SLIDER PRINCIPAL -->	
			<section class="main">
				<ul class="rslides" id="slider2">
					<li>
						<img src="<?php echo base_url() ?>/images/banner.jpg" />
					</li>
					<li>
						<img src="<?php echo base_url() ?>/images/banner2.jpg" />
					</li>
				</ul>
			</section>
			<!-- FIM SLIDER PRINCIPAL -->
			
			
			<!-- INICIO GRUPO A -->
			
				<!-- INICIO SLIDER MENOR 1 -->
				<section class="main2">
					<ul class="rslides" id="slider22">
						<li>
							<img src="<?php echo base_url() ?>/images/banner.jpg" />
						</li>
					</ul>
				</section>
				<!-- FIM SLIDER MENOR 1 -->
				
				
				
				<!-- INICIO SLIDER MENOR 2 -->
				<section class="main2">
					<ul class="rslides" id="slider33">
						<li>
							<img src="<?php echo base_url() ?>/images/banner2.jpg" />
						</li>
					</ul>
				</section>
				<!-- FIM SLIDER MENOR 2 -->
			
			<!-- FIM GRUPO A -->
			
			
			<!-- INICIO GRUPO B -->
			
				<!-- INICIO SLIDER MENOR 1 -->
				<section class="main2">
					<ul class="rslides" id="slider22">
						<li>
							<img src="<?php echo base_url() ?>/images/banner.jpg" />
						</li>
					</ul>
				</section>
				<!-- FIM SLIDER MENOR 1 -->
				
				
				
				<!-- INICIO SLIDER MENOR 2 -->
				<section class="main2">
					<ul class="rslides" id="slider33">
						<li>
							<img src="<?php echo base_url() ?>/images/banner2.jpg" />
						</li>
					</ul>
				</section>
				<!-- FIM SLIDER MENOR 2 -->
			
			<!-- FIM GRUPO B -->
			
			
			<!-- INICIO GRUPO C -->
			
				<!-- INICIO SLIDER MENOR 1 -->
				<section class="main2">
					<ul class="rslides" id="slider22">
						<li>
							<img src="<?php echo base_url() ?>/images/banner.jpg" />
						</li>
					</ul>
				</section>
				<!-- FIM SLIDER MENOR 1 -->
				
				
				
				<!-- INICIO SLIDER MENOR 2 -->
				<section class="main2">
					<ul class="rslides" id="slider33">
						<li>
							<img src="<?php echo base_url() ?>/images/banner2.jpg" />
						</li>
					</ul>
				</section>
				<!-- FIM SLIDER MENOR 2 -->
			
			<!-- FIM GRUPO C -->
			
			
			<!-- INICIO GRUPO D -->
			
				<!-- INICIO SLIDER MENOR 1 -->
				<section class="main2">
					<ul class="rslides" id="slider22">
						<li>
							<img src="<?php echo base_url() ?>/images/banner.jpg" />
						</li>
					</ul>
				</section>
				<!-- FIM SLIDER MENOR 1 -->
				
				
				
				<!-- INICIO SLIDER MENOR 2 -->
				<section class="main2">
					<ul class="rslides" id="slider33">
						<li>
							<img src="<?php echo base_url() ?>/images/banner2.jpg" />
						</li>
					</ul>
				</section>
				<!-- FIM SLIDER MENOR 2 -->
			
			<!-- FIM GRUPO D -->
			
			
			</div>
			<!-- //portfolio -->
			
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