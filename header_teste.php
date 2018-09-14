<?php
include('codigo_main.php');
$url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; //O CURRENT URL
$nome_da_pagina = basename($_SERVER['REQUEST_URI']);

?>


<!DOCTYPE html>
<html lang="en">
<head>
<title>The Estate - Listings Single</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="The Estate Teplate">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="styles/bootstrap4/bootstrap.min.css">
<link rel="stylesheet" href="styles/bootstrap4/fontawesome-all.min.css" crossorigin="anonymous">


<link href="plugins/fontawesome-free-5.0.1/css/fontawesome-all.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.carousel.css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/animate.css">
<link href="plugins/magnific-popup/magnific-popup.css" rel="stylesheet" type="text/css">
<?php 
if ($nome_da_pagina != "listagem.php") {
?>
<link rel="stylesheet" type="text/css" href="styles/listings_single_styles.css">
<link rel="stylesheet" type="text/css" href="styles/listings_single_responsive.css"> 
<?php 
}
if ($nome_da_pagina == "listagem.php") {
?>
<link rel="stylesheet" type="text/css" href="styles/listings_styles.css">
<link rel="stylesheet" type="text/css" href="styles/listings_responsive.css">

<?php
}	
?>

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
		echo "<li><b>Email: ".$email."</b></li>";
		echo "<li><b>Username: ".$nome."</b></li>";
		echo "<li><b>Estatuto: $estatuto</b></li>";
		echo "<li><a href='settings.php'><b>Definições</b></a></li>";
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
					<center>
					<?php
					if(isset($erro)) {
					?>
					<h2 style="color:red"><?php echo $erro; ?></h2>
					<?php
					} if (isset($sucesso)) { ?>
					<h2 style="color: green"><?php echo $sucesso; ?></h2>
					<?php } ?>
					<img src="images/logo.png" width="250px" height="70px"><br><br>
					<form action="" method="POST">

					    <div class="form-group">
					      <input type="text" class="form-control" placeholder="Nome" name="nome">
					    </div>
					    <div class="form-group">
					      <input type="text" class="form-control" placeholder="Apelido" name="apelido">
					    </div>
					    <div class="form-group">
					      <select class="form-control" name="genero">
					        <option>Masculino</option>
					        <option>Feminino</option>
					      </select>
					    </div>
					    <div class="form-group">
					      <input type="number" class="form-control" placeholder="Número de Telefone" name="movel">
					    </div>
					    <div class="form-group">
					      <input type="email" class="form-control" placeholder="Email" name="email">
					    </div>
					    <div class="form-group">
					      <input type="password" class="form-control" placeholder="Password" name="pass1">
					    </div>
					    <div class="form-group">
					      <input type="password" class="form-control" placeholder="Repetir Password" name="pass2">
					    </div>
					    <div class="form-group">
					        <input type="submit" name="registo_btn" class="btn btn-success btn-lg">
					    </div>

					</form>
					</center>





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


					<center>
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
					<img src="images/logo.png" width="250px" height="70px"><br><br><br>
					<form action="" method="POST">
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
					</center>





        </div>

        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
        </div>

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
      <h4 class="modal-title">Login</h4>
      <button type="button" class="close" data-dismiss="modal">&times;</button>
    </div>

    <!-- Modal body -->
    <div class="modal-body">


				<center>
				<?php
				$busca_fav = mysqli_query($link, "SELECT * FROM favoritos WHERE id_user='$user_id'");
				$conta_fav = mysqli_num_rows($busca_fav);
				if ($conta_fav > 0) {
				?>
				<table class="table table-striped table-bordered">
					<thead>
						<tr>
							<td><b>Imóvel</b></td>
							<td><b>Data</b></td>
							<td><b>Remover</b></td>
						</tr>
					</thead>
					<?php
						while($busca_info_fav = mysqli_fetch_array($busca_fav)) {
							$id_favorito = $busca_info_fav['id_favorito'];
							$id_user_fav = $busca_info_fav['id_user']; //PREFIRO CHAMAR OUTRA VEZ
							$id_prop_fav = $busca_info_fav['id_propriedade'];
							$data_fav = $busca_info_fav['data'];

							$sel_prod_fav = mysqli_query($link, "SELECT * FROM propriedades WHERE id_propriedade='$id_prop_fav'");
							$busca_prod_fav = mysqli_fetch_assoc($sel_prod_fav);
							$titulo_prod_fav = $busca_prod_fav['titulo'];
					?>
					<tbody>
						<tr>
							<td><?php echo $titulo_prod_fav; ?></td>
							<td><?php echo $data_fav; ?></td>
							<td><a href="apaga_fav.php?id=<?php echo $id_favorito; ?>"><button class="btn btn-danger"><i class="fas fa-trash"></i></button></a></td>
						</tr>
					</tbody>

					<?php

						}
					} else {
						echo "<h2>Não tem favoritos</h2>";
					}
					?>
				</table>
				</center>





    </div>

    <!-- Modal footer -->
    <div class="modal-footer">
      <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
    </div>

  </div>
</div>
</div>

</div>




<div class="super_container">

	 Home 
	<div class="home">
		<!-- Image by: https://unsplash.com/@jbriscoe -->
		<div class="home_background" style="background-image:url(images/listings_single.jpg)"></div>


	</div>
	-->

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
								<li class="main_nav_item"><a href="index.php">home</a></li>
								<li class="main_nav_item"><a href="about.html">sobre nós</a></li>
								<li class="main_nav_item"><a href="listagem.php">Propriedades</a></li>
								<li class="main_nav_item"><a href="news.html">Notícias</a></li>
								<li class="main_nav_item"><a href="contact.html">contactos</a></li>
							</ul>
						</nav>

						<!-- Phone Home -->

						<?php if (!isset($sessao)) { ?>
							<div class="text-center">
								<button type="button" data-toggle="modal" class="btn btn-success" data-target="#myModal">Login</button>
								<button type="button" data-toggle="modal" class="btn btn-primary" data-target="#myModal2">Registo</button>
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
								<a href="index.php">home</a>
							</div>
						</div>
					</div>
				</li>
				<li class="menu_item">
					<div class="container">
						<div class="row">
							<div class="col">
								<a href="about.html">sobre nós</a>
							</div>
						</div>
					</div>
				</li>
				<li class="menu_item">
					<div class="container">
						<div class="row">
							<div class="col">
								<a href="listagem.php">propriedades</a>
							</div>
						</div>
					</div>
				</li>
				<li class="menu_item">
					<div class="container">
						<div class="row">
							<div class="col">
								<a href="news.html">notícias</a>
							</div>
						</div>
					</div>
				</li>
				<li class="menu_item">
					<div class="container">
						<div class="row">
							<div class="col">
								<a href="contact.html">contactos</a>
							</div>
						</div>
					</div>
				</li>
			</ul>
		</div>

	</header>
