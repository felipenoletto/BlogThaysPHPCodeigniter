<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<?php 

	/*$ip = $_SERVER['REMOTE_ADDR'];
	$data = date('d/m/Y');
	
	if($file = fopen("ips.txt", "a+")) {
		fputs($file, "Dia da visita: ".$data." - IP do usuario: ".$ip."\n");
	}
	
	fclose($file);*/
	
?>

<?php 

	/*$dados['ip'] = $ip;
	$dados['data'] = $data;
		
	$this->Visitas->do_insert($dados);*/
	
?>
<!DOCTYPE html>
<html>
<head>
	<title>{titulo}</title>
	
	<!-- for-mobile-apps -->
	<link rel="shortcut icon" href="<?php echo base_url()?>images/4195icone.ico" />
	
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="Inspire Designer, Designer, Inspire, Design, Designer de interiores,
		 interiores, Arquitetura, Blog, Blog Designer" />
	
	<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
			function hideURLbar(){ window.scrollTo(0,1); } </script>
	<!-- //for-mobile-apps -->
	<link href="<?= base_url() ?>css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
	<link href="<?= base_url() ?>css/style_home.css" rel="stylesheet" type="text/css" media="all" />
	<!-- js -->
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>css/swipebox.css" />
	<script src="<?= base_url() ?>js/jquery-1.11.1.min.js"></script>
	<!-- //js -->
	<!-- start-smoth-scrolling -->
	<script type="text/javascript" src="<?= base_url() ?>js/move-top.js"></script>
	<script type="text/javascript" src="<?= base_url() ?>js/easing.js"></script>
	
	
	<!-- INICIO SCRIPT ROLAR PAGINA PARA O TOPO -->
	<!-- <script type="text/javascript">
		jQuery(document).ready(function($) {
			$(".scroll").click(function(event){		
				event.preventDefault();
				$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
			});
		});
	</script> -->
	<!-- INICIO SCRIPT ROLAR PAGINA PARA O TOPO -->


	<!-- INICIO SCRIPT FACEBOOK -->
	<div id="fb-root"></div>
	<script>(function(d, s, id) {
	  var js, fjs = d.getElementsByTagName(s)[0];
	  if (d.getElementById(id)) return;
	  js = d.createElement(s); js.id = id;
	  js.src = "//connect.facebook.net/pt_BR/sdk.js#xfbml=1&version=v2.6";
	  fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));</script>
	<!-- FIM SCRIPT FACEBOOK -->
	
	
	<!-- INICIO SCRIPT TWITTER -->
	<script>window.twttr = (function(d, s, id) {
	  var js, fjs = d.getElementsByTagName(s)[0],
	    t = window.twttr || {};
	  if (d.getElementById(id)) return t;
	  js = d.createElement(s);
	  js.id = id;
	  js.src = "https://platform.twitter.com/widgets.js";
	  fjs.parentNode.insertBefore(js, fjs);
	 
	  t._e = [];
	  t.ready = function(f) {
	    t._e.push(f);
	  };
	 
	  return t;
	}(document, "script", "twitter-wjs"));</script>

	<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
	<!-- FIM SCRIPT TWITTER -->
	
	
	<!-- INICIO SCRIPT TOPO PAG -->
	<!-- <script type="text/javascript">
	    $(document).ready(function() {
	       $('#subir').click(function(){ 
	          $('html, body').animate({scrollTop:0}, 'slow');
	      return false;
	
	         });
	     });
	
		</script>-->
	<!-- FIM SCRIPT TOPO PAG -->
	
	
	<!-- INICIO SCRIPT TROCA A COR -->
	<!-- <script language="javascript" type="text/javascript">
		function trocar(){
			$('span').click.css({ color: white});
		}
		</script>  -->
	<!-- FIM SCRIPT TROCA A COR -->
	
	
	<!-- INICIO TROCA BANNER -->
	<script type="text/javascript">
		function trocar(){
			window.document.getElementById("xti").src = "http://ides.esy.es/images/ab2.png";
		}
		
		function voltar(){
			window.document.getElementById("xti").src = "http://ides.esy.es/images/ab.png";
		}
		
		function trocar1(){
			window.document.getElementById("xti").src = "http://ides.esy.es/images/ab2.png";
		}
		
		function voltar1(){
			window.document.getElementById("xti").src = "http://ides.esy.es/images/ab.png";
		}
	</script>
	<!-- FIM TROCA BANNER -->


</head>
	
<body>

<!-- INICIO CONTAINER -->
	<div class="banner-body">
	
		<div class="container">
		
			
			<!-- INICIO HEADER -->
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
						   <a class="navbar-brand" href="<?= base_url() ?>">{tituloblog}</a>
						</div>

						<!-- Collect the nav links, forms, and other content for toggling -->
						<div class="collapse navbar-collapse nav-wil" id="bs-example-navbar-collapse-1">
						 <ul class="nav navbar-nav">
							<li class="hvr-bounce-to-bottom active"><?php echo anchor(base_url(), 'Home'); ?></li>
							<li class="hvr-bounce-to-bottom"><?php echo anchor('sobre', 'Sobre'); ?></li>
							<!-- <li class="hvr-bounce-to-bottom"><?php echo anchor('galeria', 'Galeria'); ?></li> -->
							<li class="hvr-bounce-to-bottom"><?php echo anchor('contato', 'Contato'); ?></li>
							<?php 
							
								if($this->uri->segment(3)) {
									echo "<img src='".base_url()."images/ab.png' id='xti' onMouseOver='trocar1();' onMouseOut='voltar1();' height='60' width='50' />";
								} else if(base_url()){
								  	echo "<img src='".base_url()."images/ab.png' id='xti' onMouseOver='trocar();' onMouseOut='voltar();' height='60' width='50' />";
								}
								
							?>
						  </ul>
						</div>
					</nav>
				</div>
			
			</div>
			<!-- FIM HEADER -->
		
	
			<!-- INICIO DIV REDES SOCIAIS -->
			<div class="header-bottom">
			
				<div class="header-bottom-top">
					<ul>
					    <li><a href="#" class="g"> </a></li>
						<li><a href="#" class="p"> </a></li>
					<!--<li><a href="#" class="facebook"> </a></li>
						<li><a href="#" class="twitter"> </a></li>-->
					</ul>
				</div>
			 <div class="clearfix"> </div>
				<!-- FIM DIV REDES SOCIAIS -->
		
		
		<!-- INICIO DIV BANNER -->
		<div class="banner">
		
				<!-- INICIO SCRIPT SLIDER PRINCIPAL -->
				<script src="<?= base_url() ?>js/responsiveslides.min.js"></script>
				 <script>
				    // You can also use "$(window).load(function() {"
				    $(function () {
				      // Slideshow 4
				      $("#slider1").responsiveSlides({
				        auto: true,
				        pager: false,
				        nav: true,
				        speed: 2200,
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
				  <!-- FIM SCRIPT SLIDER PRINCIPAL -->
			
			
				<!-- INICIO DIV PARA O BANNER -->
				<div  id="top" class="callbacks_container wow fadeInUp" data-wow-delay="0.5s">
					<ul class="rslides" id="slider1">
					   <li>
					   	   <img src="<?php echo base_url() ?>/images/banner.png" />
					   </li>
					   <li>
					   	   <img src="<?php echo base_url() ?>/images/banner2.png" />
					   </li>
					   <li>
					   	   <img src="<?php echo base_url() ?>/images/banner3.png" />
					   </li>
					</ul>
				</div>
				<!-- FIM DIV PARA O BANNER -->
	
				
		</div>
		<!-- FIM DIV BANNER -->


		<!-- INICIO DIV BLOG -->
		<div class="blog">
			
			<!-- INICIO DIV ESQUERDA -->
			<div class="blog-left">
			
				<?php 
				
					if ( ! defined("BASEPATH")) exit("No direct script access allowed");
					
					switch ($tela):
					
					case 'g':
							
						$query = $this->ID->get_all_pg($var2,$var1)->result();
				
						foreach ($query as $linha) :
					
						if($linha->status != 'ativo' && $linha->status != 'inativo') {
							
							$sql = $this->Comentarios->get_all_comment($linha->id)->result();
							$i = 0;
							
							foreach ($sql as $l) : 
								$i++;	
							endforeach;
				
				?>
			
			
						<div class="blog-left-grid">
							<div class="blog-left-grid-left">
								<h3><?php echo anchor("id/v/$linha->id", $linha->titulo); ?></h3>
								<p>por <span>Thays Viana |</span>   <?php echo date('d/m/Y', strtotime($linha->data)); ?>
							</div>
							<div class="blog-left-grid-right">
								<a href="#" class="hvr-bounce-to-bottom non"><?php echo $i; ?> Comment&aacute;rio(s)</a> 
							</div>
							<div class="clearfix"> </div>
							<img src="<?php echo base_url() ?>uploads/<?php echo $linha->arquivo; ?>" alt=" " class="img-responsive" />
							<p class="para"><?php echo to_html(resumo_post($linha->conteudo, 40)); ?></p>
							<div class="rd-mre">
								<?php echo anchor("id/v/$linha->id", 'Leia mais...'); ?>
							</div>
							<!-- <hr class="linha"> -->
							<div class="clearfix"> </div>
						</div>
			
			
				<?php
						}
					endforeach;
						echo "<div class='blog-left-pag'>";
							echo "<div class='pag'>";
									echo $this->pagination->create_links();
							echo "</div>";
						echo "</div>";
					break; 
				?>
			
			
				<?php
					case 'v':
						
						if (!defined("BASEPATH")) exit("No direct script access allowed");
						
						$id = $this->uri->segment(3);
						
						$query = $this->ID->get_byid($id)->row();
						
						$sql = $this->Comentarios->get_all_comment($query->id)->result();
						$i = 0;
							
						foreach ($sql as $l) :
							$i++;
						endforeach;
				?>
			
						<div class="blog-left-grid">
							<div class="blog-left-grid-left">
								<h3><?php echo $query->titulo; ?></h3>
								<p>por <span>Thays Viana</span></p>
							</div>
							<div class="clearfix"></div>
								<img src="<?php echo base_url() ?>uploads/<?php echo $query->arquivo; ?>" class="img-responsive" />
								<div class="clearfix"></div>
								<p class="parav"><?php echo to_html($query->conteudo); ?></p>
								<div class="clearfix"></div>
								<div class="artical-links">
									<ul>
										<li><small> </small><span><?php echo date('d/m/Y', strtotime($query->data)); ?></span></li>
										<li><div class="fb-share-button" data-href="http://ides.esy.es/id/v/<?php echo $query->id; ?>" data-layout="button_count" data-mobile-iframe="true"></div></li>
										<li><a class="twitter-share-button" href="https://twitter.com/intent/tweet?text=Digite%20o%20texto%20aqui">Tweet</a></li>
										<li><a href="#"><small class="no"> </small><span><strong><?php echo $i; ?></strong> Coment&aacute;rio(s)</span></a></li>
									</ul>
								</div>
								
								<div class="artical-commentbox">
									<h3>Deixe seu coment&aacute;rio</h3>
										<div class="table-form">
										<?php echo form_open('comentarios/cadastrar'); ?>
												<input type="text" name="nome" class="textbox" placeholder="Nome" />
												<input type="text" name="email" class="textbox" placeholder="Email" />
												<textarea name="comentario" placeholder="Mensagem" /></textarea>	
												<?php echo form_hidden('id_artigo', $id); ?>
											  	<?php echo form_hidden('nome_artigo', $query->titulo); ?>
											  	<?php echo form_hidden('data', date('Y-m-d')); ?>
												<input type="submit" value="Enviar" />
										<?php echo form_close(); ?>
										</div>
								 </div>
								
								
								
								<div class="comment-grid-top">
									<h3>Coment&aacute;rios</h3>
									<?php 
										
										$query = $this->Comentarios->get_all_comment($id)->result();
										foreach ($query as $linha) :
									
									?>
									<div class="comments-top-top">
										<div class="top-comment-right">
											<ul>
												<li><span class="left-at"><a><?php echo $linha->nome; ?></a></span></li>
												<li><span class="right-at"><?php echo date('d/m/Y', strtotime($linha->data)); ?></span></li>
											</ul>
										<p><?php echo to_html($linha->comentario); ?></p>
										</div>
										<div class="clearfix"> </div>
									</div>
									<?php
										if($linha->resposta != '') {
											echo "<div class='comments-top-top-res'>";
												echo "<div class='top-comment'>";
													echo "<ul>";
														echo "<li class='res'><span class='right-at adm'>Thays Viana</li>";
													echo "</ul>";
												echo "<p>".to_html($linha->resposta)."</p>";
												echo "</div>";
												echo "<div class='clearfix'> </div>";
											echo "</div>";
										}
									?>
								 
									<?php 
										endforeach;
									?>
								  </div>
								
						</div>
				
			
				<?php 
					break;
					endswitch;
				?>
			
			</div>
			<!-- FIM BLOG ESQUERDA -->

			<!-- INICIO DIV DIREITA -->
			<div class="blog-right">
			
				<!-- INICIO TABS -->
				<div class="sap_tabs">	
				<div id="horizontalTab" style="display: block; width: 100%; margin: 0px;">
					  <ul class="resp-tabs-list">
						  <li class="resp-tab-item grid1" aria-controls="tab_item-0" role="tab"><span>Os mais populares</span></li>
						  <div class="clear"></div>
					  </ul>				  	 
						<div class="resp-tabs-container">
							<div class="tab-1 resp-tab-content" aria-labelledby="tab_item-0">
								
							<?php 
							if ( ! defined("BASEPATH")) exit("No direct script access allowed");
										
									$query = $this->ID->get_all_limite()->result();
								
									foreach ($query as $linha) :
										
									if($linha->status != 'ativo' && $linha->status != 'inativo') {
								
							?>
								
										<div class="facts">
										  <div class="tab_list">
											<a href="#" class="b-link-stripe b-animate-go swipebox"  title="">
												<img src="<?php echo base_url() ?>uploads/<?php echo $linha->arquivo; ?>" alt=" " class="img-responsive" width="80" height="80" />
											</a>
										  </div>
										  <div class="tab_list1">
											<a><?php echo anchor("id/v/$linha->id", $linha->titulo); ?></a>
											<p><?php echo date('d/m/Y', strtotime($linha->data)); ?></p>
										  </div>
										  <div class="clearfix"> </div>
										</div>
								
								<?php 
									}
									endforeach;
								?>
								
							</div>
						</div>
						<script src="<?php echo base_url() ?>js/easyResponsiveTabs.js" type="text/javascript"></script>
							<script type="text/javascript">
								$(document).ready(function () {
									$('#horizontalTab').easyResponsiveTabs({
										type: 'default', //Types: default, vertical, accordion           
										width: 'auto', //auto or any width like 600px
										fit: true   // 100% fit in a container
									});
								});
							   </script>
						<link rel="stylesheet" href="<?php echo base_url() ?>css/swipebox.css">
						<script src="<?php echo base_url() ?>js/jquery.swipebox.min.js"></script> 
							<script type="text/javascript">
								jQuery(function($) {
									$(".swipebox").swipebox();
								});
							</script>
				</div>
				</div>
				<!-- FIM TABS -->
			
			
				<!-- INICIO NOTICIA -->
				<div class="newsletter">
					<h3>Receba not&iacute;cias sobre o blog</h3>
					<?php echo form_open('newsletter/cadastrar'); ?>
						<input type="text" name="email" placeholder="Email..." />
						<input type="submit" value="Enviar" />
					<?php echo form_close(); ?>
				</div>
				<!-- FIM NOTICIA -->
				
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
				
				<!-- INICIO SLIDER -->
				<div class="pgs">
					<!-- <h3>Pages</h3>  -->
					<ul class="rslides" id="slider2">
						<li>
							<img src="<?php echo base_url() ?>/images/slide1.png" />
						</li>
						<li>
							<img src="<?php echo base_url() ?>/images/slide2.png" />
						</li>
						<li>
							<img src="<?php echo base_url() ?>/images/slide3.png" />
						</li>
						<li>
							<img src="<?php echo base_url() ?>/images/slide4.png" />
						</li>
					</ul>
				</div>
				<!-- FIM SLIDER -->
				
			</div>
			<div class="clearfix"></div>
			
			
			</div>
			<!-- FIM DIV DIREITA -->

		</div>
		<!-- FIM DIV BLOG -->
	
	
	
		</div>
		<!-- FIM DIV REDES SOCIAIS -->
		
		
		
	</div>
	<!-- FIM CONTAINER -->


	<!-- INICIO RODAPE -->
	<div class="footer">
		<div class="container">
			<div class="footer-grids">
				</div> -->
				<nav class="navbar navbar-default">
				<div class="collapse navbar-collapse nav-wil down" id="bs-example-navbar-collapse-1">
						 <ul class="nav navbar-nav">
							<li class="hvr-bounce-to-bottom active"><?php echo anchor(base_url(), 'Home'); ?></li>
							<li class="hvr-bounce-to-bottom"><?php echo anchor('sobre', 'Sobre'); ?></li>
							<!-- <li class="hvr-bounce-to-bottom"><?php echo anchor('galeria', 'Galeria'); ?></li> -->
							<li class="hvr-bounce-to-bottom"><?php echo anchor('contato', 'Contato'); ?></li>
						  </ul>
						</div>
				</nav>
				<div class="header-bottom down">
				<div class="header-bottom-top down">
					<ul>
					    <li><a href="#" class="g"> </a></li>
						<li><a href="#" class="p"> </a></li>
					<!--<li><a href="#" class="facebook"> </a></li>
						<li><a href="#" class="twitter"> </a></li>-->
					</ul>
				</div>
				<div class="clearfix"> </div>
				</div>
				</div>
		</div>
	</div>
	
	<div class="footer-bottom">
		<div class="container">
			{rodape}
		</div>
	</div>
	<!-- FIM RODAPE -->
	
	<!-- INICIO SUBIR PAGINA -->
	<!-- <a href="#" id="subir" title="Subir"></a> -->
	<!-- FIM SUBIR PAGINA -->
	
	
	<!-- INICIO CARREGAMENTO BOOTSTRAP -->
	<script src="<?= base_url() ?>js/bootstrap.js"> </script>
	<!-- FIM CARREGAMENTO BOOTSTRAP -->
		
</body>
</html>