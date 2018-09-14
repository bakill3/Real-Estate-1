<?php
include('codigo_main.php');
$url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; //O CURRENT URL
$nome_da_pagina = basename($_SERVER['PHP_SELF']);
$index=0;
?>


<!DOCTYPE html>
<html lang="pt">
<head>
<title>The Estate - Listings Single</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="The Estate Teplate">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="styles/bootstrap4/bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script>
	$(document).ready(function(){
	    $('[data-toggle="tooltip"]').tooltip();   
	});
</script>
<link rel="stylesheet" href="styles/bootstrap4/fontawesome-all.min.css" crossorigin="anonymous">


<link href="plugins/fontawesome-free-5.0.1/css/fontawesome-all.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.carousel.css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/animate.css">
<link href="plugins/magnific-popup/magnific-popup.css" rel="stylesheet" type="text/css">
<?php 
if ($nome_da_pagina == "propriedade.php") {
?>
<link rel="stylesheet" type="text/css" href="styles/listings_single_styles.css">
<link rel="stylesheet" type="text/css" href="styles/listings_single_responsive.css"> 
<?php 
} 
if ($nome_da_pagina == "about.php" || $nome_da_pagina == "contactos.php") { ?>
<link rel="stylesheet" type="text/css" href="styles/about_styles.css">
<link rel="stylesheet" type="text/css" href="styles/about_responsive.css">

<?php
}
if ($nome_da_pagina != "index.php") {
	if ($nome_da_pagina != "propriedade.php") {
?>
<link rel="stylesheet" type="text/css" href="styles/listings_styles.css">
<link rel="stylesheet" type="text/css" href="styles/listings_responsive.css">
<?php
} }
if ($nome_da_pagina == "index.php") {
	$index = 1;
?>
<link rel="stylesheet" type="text/css" href="styles/main_styles.css">
<link rel="stylesheet" type="text/css" href="styles/responsive.css">
<?php } ?>

<style>
#barra {
	width: 100%;
	height: 3%;
	vertical-align: top;
	background-color: #222833;
	color: white;
	text-align: right;
	padding: 5px;
	padding-right: 10px;
	padding-left: 10px;
	white-space: nowrap;
	position: fixed;
	z-index: 16;

}

#barra > ul > li {
  display: inline-block;
  margin-right: 8px;
  margin-left: 8px;
}
</style>
</head>

<body>
	<?php
	if (isset($_SESSION['login'])) {
		$sessao = $_SESSION['login'];
		$sql_user = "SELECT * FROM utilizadores WHERE email='$sessao'";
		$ligar_user = mysqli_query($link, $sql_user);
		$buscar_user = mysqli_fetch_assoc($ligar_user);
		$user_id = $buscar_user['id_user'];
		$foto_perf = $buscar_user['imagem'];
		$descricao_agente = $buscar_user['descricao_agente'];
		$nome = $buscar_user['nome'];
		$apelido = $buscar_user['sobrenome'];
		$genero = $buscar_user['genero'];
		$telemovel = $buscar_user['telemovel'];
		$email = $buscar_user['email']; // PREFIRO IR BUSCAR O EMAIL NA MESMA (SEI QUE É A SESSÃO)
		$id_perfil = $buscar_user['id_perfil'];
		$password = $buscar_user['password'];
		$select_perf = mysqli_query($link, "SELECT perfil FROM perfil WHERE id_perfil='$id_perfil'");
		$buscar_perfil = mysqli_fetch_assoc($select_perf);
		$estatuto = $buscar_perfil['perfil'];
		

		echo "<div id='barra'>";
		echo "<ul>";
		echo "<li><b>$menu_header[0] ".$email."</b></li>";
		echo "<li><b>$menu_header[1] ".$nome."</b></li>";
		echo "<li><b>$menu_header[2] $estatuto</b></li>";
		if ($estatuto == "Administrador" || $estatuto=="Agente") {
			echo "<li><a href='back_office.php'><b>$menu_header[3]</b></a></li>";
		} else {
			echo "<li><a href='settings.php'><b>$menu_header[3]</b></a></li>";
		}
		echo "</ul>";
		echo "</div>";
	}
	?>


	<!-- REGISTO MODAL -->
	<div class="modal" id="myModal2">
		<div class="modal-dialog">
			<div class="modal-content">

				<!-- Modal Header -->
				<div class="modal-header">
					<h4 class="modal-title">Registo</h4>
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>

				<!-- Modal body -->
				<div class="modal-body">

					
					<br>
					<br>
					<div style="text-align: center;">
					<?php
					if(isset($erro)) {
					?>
					<h2 style="color:red"><?php echo $erro; ?></h2>
					<?php
					} if (isset($sucesso)) { ?>
					<h2 style="color: green"><?php echo $sucesso; ?></h2>
					<?php } ?>
					<img src="images/logo.png" width="250" height="70" alt="WebMax"><br><br>
					<form method="POST">

					    <div class="form-group">
					      <input type="text" class="form-control" placeholder="Nome" name="nome">
					    </div>
					    <div class="form-group">
					      <input type="text" class="form-control" placeholder="<?php echo $register_menu[1]; ?>" name="apelido">
					    </div>
					    <div class="form-group">
					      <select class="form-control" name="genero">
					        <option>Masculino</option>
					        <option>Feminino</option>
					      </select>
					    </div>
					    <div class="form-group">
					      <input type="number" class="form-control" placeholder="<?php echo $register_menu[2]; ?>" name="movel">
					    </div>
					    <div class="form-group">
					      <input type="email" class="form-control" placeholder="Email" name="email">
					    </div>
					    <div class="form-group">
					      <input type="password" class="form-control" placeholder="Password" name="pass1">
					    </div>
					    <div class="form-group">
					      <input type="password" class="form-control" placeholder="<?php echo $register_menu[5]; ?>" name="pass2">
					    </div>
					    <div class="form-group">
					        <input type="submit" name="registo_btn" class="btn btn-success btn-lg">
					    </div>

					</form>
					</div>





				</div>

				<!-- Modal footer -->
				<div class="modal-footer">
					<button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
				</div>

			</div>
		</div>
	</div>

	<!-- LOGIN MODAL -->
	<div class="modal" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Login</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">


					<div style="text-align: center">
					<?php
					if(isset($erro)) {
					?>
					<h2 style="color:red"><?php echo $erro; ?></h2>
					<?php
					} if (isset($sucesso)) { ?>
					<h2 style="color: green"><?php echo $sucesso; ?></h2>
					<?php } ?>
					<br>
					<!-- <h2>Login</h2> -->
					<img src="images/logo.png" width="250" height="70" alt="WebMax"><br><br><br>
					<form method="POST">
					    <div class="form-group">
					      <input type="email" class="form-control" placeholder="Email" name="email">
					    </div>
					    <div class="form-group">
					      <input type="password" class="form-control" placeholder="Password" name="password">
					    </div>
					    <div class="form-group">
					        <input type="submit" name="login_btn" class="btn btn-success btn-lg">
					    </div>

					</form>
					</div>





        </div>

        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
        </div>

      </div>
    </div>
  </div>




<!-- FAVORITOS -->

<!-- Modal -->
<div class="modal" id="favoritos">
<div class="modal-dialog modal-lg">
  <div class="modal-content">

    <!-- Modal Header -->
    <div class="modal-header">
      <h4 class="modal-title">Favoritos</h4>
      <button type="button" class="close" data-dismiss="modal">&times;</button>
    </div>

    <!-- Modal body -->
    <div class="modal-body" style="text-align: center;">



				<?php
				$busca_fav = mysqli_query($link, "SELECT * FROM favoritos WHERE id_user='$user_id'");
				$conta_fav = mysqli_num_rows($busca_fav);
				if ($conta_fav > 0) {
				?>
				<table class="table table-striped table-bordered">
					<thead>
						<tr>
							<th><b>Imagem</b></th>
							<th><b><?php echo $favorites_menu[1]; ?></b></th>
							<th><b><?php echo $favorites_menu[2]; ?></b></th>
							<th><b><?php echo $favorites_menu[3]; ?></b></th>
						</tr>
					</thead>
					<?php
						while($busca_info_fav = mysqli_fetch_array($busca_fav)) {
							$id_favorito = $busca_info_fav['id_favorito'];
							$id_user_fav = $busca_info_fav['id_user']; //PREFIRO CHAMAR OUTRA VEZ
							$id_prop_fav = $busca_info_fav['id_propriedade'];
							$data_fav = $busca_info_fav['data'];
							//BUSCAR FOTO DE X PROPRIEDADE
							$select_foto_prop_fav = mysqli_query($link, "SELECT foto_url FROM galeria WHERE id_propriedade='$id_prop_fav'");
							$busca_foto_fav = mysqli_fetch_assoc($select_foto_prop_fav);
							$foto_fav = $busca_foto_fav['foto_url'];
							//--------------------------------------------------------------------------------------------------------------

							$sel_prod_fav = mysqli_query($link, "SELECT * FROM propriedades WHERE id_propriedade='$id_prop_fav'");
							$busca_prod_fav = mysqli_fetch_assoc($sel_prod_fav);
							$titulo_prod_fav = $busca_prod_fav['titulo'];
					?>
					<tbody>
						<tr>
							<td style="text-align: center; vertical-align: middle;"><img src='<?php echo $foto_fav; ?>' style="width: 50%; height: 15%;"></td>
							<td style="text-align: center; vertical-align: middle;"><?php echo $titulo_prod_fav; ?></td>
							<td style="text-align: center; vertical-align: middle;"><?php echo $data_fav; ?></td>
							<td style="text-align: center; vertical-align: middle;"><a href="apaga_fav.php?id=<?php echo $id_favorito; ?>"><button class="btn btn-danger btn-block" style="width: 100%; height: 100%;"><i class="fas fa-trash"></i></button></a></td>
						</tr>
					</tbody>

					<?php
						}
					?>
					</table>
					<?php
					} else {
						echo "<h2>$favorites_menu[0]</h2>";
					}
					?>






    </div>

    <!-- Modal footer -->
    <div class="modal-footer">
      <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
    </div>

  </div>
</div>
</div>






<div class="super_container">
	<?php if ($index == 1) { ?>
		<div class="home">

		<!-- Home Slider -->
		<div class="home_slider_container">
			<div class="owl-carousel owl-theme home_slider">

				<!-- Home Slider Item -->
				<div class="owl-item home_slider_item">
					<!-- Image by https://unsplash.com/@aahubs -->
					<div class="home_slider_background" style="background-image:url(images/home_slider_bcg.jpg)"></div>
					<div class="home_slider_content_container text-center">
						<div class="home_slider_content">
							<h1 data-animation-in="flipInX" data-animation-out="animate-out fadeOut"><?php echo $slideshow_menu[0]; ?></h1>
						</div>
					</div>
				</div>

				<!-- Home Slider Item -->
				<div class="owl-item home_slider_item">
					<!-- Image by https://unsplash.com/@aahubs -->
					<div class="home_slider_background" style="background-image:url(images/casa2.jpg)"></div>
					<div class="home_slider_content_container text-center">
						<div class="home_slider_content">
							<h1 data-animation-in="flipInX" data-animation-out="animate-out fadeOut">WebMax</h1>
						</div>
					</div>
				</div>

				<!-- Home Slider Item -->
				<div class="owl-item home_slider_item">
					<!-- Image by https://unsplash.com/@aahubs -->
					<div class="home_slider_background" style="background-image:url(images/casa3.jpg)"></div>
					<div class="home_slider_content_container text-center">
						<div class="home_slider_content">
							<h1 data-animation-in="flipInX" data-animation-out="animate-out fadeOut"><?php echo $slideshow_menu[1]; ?></h1>
						</div>
					</div>
				</div>
			</div>

			<!-- Home Slider Nav -->
			<div class="home_slider_nav_left home_slider_nav d-flex flex-row align-items-center justify-content-end">
				<img src="images/nav_left.png" alt="">
			</div>

		</div>

	</div>

	<?php } else { ?>
	 
	<div class="home" style="height: 150px;">
		<!-- Image by: https://unsplash.com/@jbriscoe -->
		<div class="home_background" style="background-image:url(images/listings_single.jpg)"></div>


	</div>
	<?php } ?>
	

	<!-- Header -->

	<header class="header trans_300">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="header_container d-flex flex-row align-items-center trans_300">

						<!-- Logo -->

						<div class="logo_container">
							<a href="#">
								<div class="logo">
									<img src="images/logo.png" alt="">
								</div>
							</a>
						</div>

						<!-- Main Navigation -->

						<nav class="main_nav">
							<ul class="main_nav_list">
								<li class="main_nav_item"><a href="index.php"><?php echo $menu[0]; ?></a></li>
								<li class="main_nav_item"><a href="about.php"><?php echo $menu[1]; ?></a></li>
								<li class="main_nav_item"><a href="listagem.php"><?php echo $menu[2]; ?></a></li>
								<?php /* <li class="main_nav_item"><a href="news.html"><?php echo $menu[3]; ?></a></li> */ ?>
								<li class="main_nav_item"><a href="contactos.php"><?php echo $menu[4]; ?></a></li>
							</ul>
						</nav>

						<!-- Phone Home -->

						<?php if (!isset($sessao)) { ?>
							<div class="text-center">
								<button type="button" data-toggle="modal" class="btn btn-success" data-target="#myModal">Login</button>
								<button type="button" data-toggle="modal" class="btn btn-primary" data-target="#myModal2"><?php echo $menu[5]; ?></button>
							</div>
						<?php } else { ?>
							<a href="logout.php" class="btn btn-danger">Logout</a>
							<?php
								$vef_fav_cont = mysqli_query($link, "SELECT * FROM favoritos WHERE id_user='$user_id'");
								if (mysqli_num_rows($vef_fav_cont) == 0) { //SE NÃO HOUVER FAVORITOS DE ESSE UTILZADOR
							?>
							<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#favoritos">
							  <i class="far fa-star"></i> <!-- ICON DE ESTRELA VAZIA -->
							</button>
							<?php } else { //SE HOUVER FAVORITOS?>
							<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#favoritos">
							  <i class="fas fa-star"></i>  <!-- ICON DE ESTRELA CHEIA -->
							</button>
						<?php } /* ACABA A VERFICAÇÂO DE EXISTÊNCIA DE FAVORITOS */ } /* ACABA A VERFICAÇÂO DA EXISTÊNCIA DE SESSÃO */ ?>
						<!-- 
						<form action="" method="POST">
								<?php if ($lingua == "pt") { ?>
								<button type="submit" name="lingua_eng" class="btn btn-warning">Inglês</button>
								<?php } elseif ($lingua == "en") { ?>
								<button type="submit" name="lingua_pt" class="btn btn-warning">Portuguese</button>
								<?php } ?>
						</form>
						-->
						<div class="btn-group">
						  <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						    <i class="fas fa-globe"></i>
						  </button>
						  <div class="dropdown-menu">
						  	<form method="POST">
						  	<?php if ($_SESSION['lang'] == "pt") { ?>
						    <button type="submit" name="lingua_eng" class="dropdown-item"><?php echo $linguas_btn[0]; ?></button>
						    <?php } elseif ($_SESSION['lang'] == "en") { ?>
						    <button type="submit" name="lingua_pt" class="dropdown-item"><?php echo $linguas_btn[0]; ?></button>
						    <?php } elseif ($_SESSION['lang'] == "fr") { ?>
						    <button type="submit" name="lingua_pt" class="dropdown-item"><?php echo $linguas_btn[0]; ?></button>
						    <button type="submit" name="lingua_eng" class="dropdown-item"><?php echo $linguas_btn[1]; ?></button>
						    <?php } if($_SESSION['lang'] != "fr") { ?>
						    <button type="submit" name="lingua_fr" class="dropdown-item"><?php echo $linguas_btn[1]; ?></button>
						    <?php } ?>
						    </form>
						</div>
						<!-- Hamburger -->

						<div class="hamburger_container menu_mm">
							<div class="hamburger menu_mm">
								<i class="fas fa-bars trans_200 menu_mm"></i>
							</div>
						</div>

					</div>
				</div>
			</div>
		</div>

		<!-- Menu -->

		<div class="menu menu_mm">
			<ul class="menu_list">
				<li class="menu_item">
					<div class="container">
						<div class="row">
							<div class="col">
								<a href="index.php"><?php echo $menu[0]; ?></a>
							</div>
						</div>
					</div>
				</li>


				<li class="menu_item">
					<div class="container">
						<div class="row">
							<div class="col">
								<a href="about.php"><?php echo $menu[1]; ?></a>
							</div>
						</div>
					</div>
				</li>
				<li class="menu_item">
					<div class="container">
						<div class="row">
							<div class="col">
								<a href="listagem.php"><?php echo $menu[2]; ?></a>
							</div>
						</div>
					</div>
				</li>
				<?php /*
				<li class="menu_item">
					<div class="container">
						<div class="row">
							<div class="col">
								<a href="news.html">notícias</a>
							</div>
						</div>
					</div>
				</li>
				*/ ?>
				<li class="menu_item">
					<div class="container">
						<div class="row">
							<div class="col">
								<a href="contactos.php"><?php echo $menu[4]; ?></a>
							</div>
						</div>
					</div>
				</li>
			</ul>
		</div>
	</div>
	</header>
