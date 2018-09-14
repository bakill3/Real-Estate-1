<?php
include 'ligar_db.php';
if (isset($_POST['pesquisar_btn'])) {
	$pesquisar = mysqli_real_escape_string($link, $_POST['pesquisar']);
	$bedrooms_no = mysqli_real_escape_string($link, $_POST['bedrooms_no']);
	$property_status = mysqli_real_escape_string($link, $_POST['property_status']);
	$bathrooms_no = mysqli_real_escape_string($link, $_POST['bathrooms_no']);
	$property_type = mysqli_real_escape_string($link, $_POST['property_type']);
	$min_price = mysqli_real_escape_string($link, $_POST['min_price']);
	$max_price = mysqli_real_escape_string($link, $_POST['max_price']);
	//tipo_propriedade

	if (isset($pesquisar)) {
		$query = "SELECT * FROM propriedades WHERE titulo LIKE '%$pesquisar%'";
	}
	if ($bedrooms_no != "Any") {
		$query .= "AND n_quartos='$bedrooms_no'";
	}
	if ($property_status != "Any") {
		$query .= "AND descricao_negocio='$property_status'";
	}
	if ($bathrooms_no != "Any") {
		$query .=  "AND n_casas_de_banho='$bathrooms_no'";
	}
	if ($property_type != "Any") {
		$query .= "AND tipo_propriedade='$property_type'";
	}
	if ($min_price != "ANY" && $max_price != "Any") {
		$query .= "AND preco BETWEEN $min_price AND $max_price";
	} 
	elseif ($min_price != "Any") {
		$query .= "AND preco BETWEEN $min_price AND 10000000";
	}
	elseif ($min_price != "Any") {
		$query .= "AND preco BETWEEN 0 AND $max_price";
	}
} else {
	$query = "SELECT * FROM propriedades;";
}
$ligar_query = mysqli_query($link, $query);
$buscar_prop = mysqli_num_rows($ligar_query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>The Estate - Listings</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="The Estate Teplate">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="styles/bootstrap4/bootstrap.min.css">
<link href="plugins/fontawesome-free-5.0.1/css/fontawesome-all.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="styles/listings_styles.css">
<link rel="stylesheet" type="text/css" href="styles/listings_responsive.css">
</head>

<body>

<div class="super_container">

	<!-- Home -->
	<div class="home">
		<!-- Image by: https://unsplash.com/@jbriscoe -->
		<div class="home_background" style="background-image:url(images/listings.jpg)"></div>

		<div class="container">
			<div class="row">
				<div class="col">
					<div class="home_content">
						<div class="home_title">
							<h2>listings</h2>
						</div>
						<div class="breadcrumbs">
							<span><a href="index.php">Home</a></span>
							<span><a href="#"> Search</a></span>
							<span><a href="#"> Listings</a></span>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

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
								<li class="main_nav_item"><a href="#">listagem</a></li>
								<li class="main_nav_item"><a href="news.html">notícias</a></li>
								<li class="main_nav_item"><a href="contact.html">contactos</a></li>
							</ul>
						</nav>

						<!-- Phone Home -->

						<div class="phone_home text-center">
							<span>+0080 234 567 84441</span>
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
								<a href="#">listagem</a>
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

	<!-- Listings -->

	<div class="listings">
		<div class="container">
			<div class="row">

				<!-- Search Sidebar -->

				<div class="col-lg-4 sidebar_col">
					<!-- Search Box -->

					<div class="search_box">

						<div class="search_box_content">

							<!-- Search Box Title -->
							<div class="search_box_title text-center">
								<div class="search_box_title_inner">
									<div class="search_box_title_icon d-flex flex-column align-items-center justify-content-center"><img src="images/search.png" alt=""></div>
									<span>search your home</span>
								</div>
							</div>

							<!-- Search Form -->
							<form class="search_form" action="" method="POST" name="pesquisar">
								<div class="search_box_container">
									<ul class="dropdown_row clearfix">
										<li class="dropdown_item">
											<div class="dropdown_item_title">Keywords</div>
											<select name="keywords" id="keywords" class="dropdown_item_select">
												<option>Any</option>
												<option>Keyword 1</option>
												<option>Keyword 2</option>
											</select>
										</li>
										<li class="dropdown_item">
											<div class="dropdown_item_title">Property ID</div>
											<select name="property_ID" id="property_ID" class="dropdown_item_select">
												<option>Any</option>
												<option>ID 1</option>
												<option>ID 2</option>
											</select>
										</li>
										<li class="dropdown_item">
											<div class="dropdown_item_title">Property Status</div>
											<select name="property_status" id="property_status" class="dropdown_item_select">
												<option>Any</option>
												<option value="For Sale">For Sale</option>
												<option value="Longterm rentals">Longterm rentals</option>
											</select>
										</li>
										<li class="dropdown_item">
											<div class="dropdown_item_title">Location</div>
											<select name="property_location" id="property_location" class="dropdown_item_select">
												<option>Any</option>
												<option>Location 1</option>
												<option>Location 2</option>
											</select>
										</li>
										<li class="dropdown_item">
											<div class="dropdown_item_title">Property Type</div>
											<select name="property_type" id="property_type" class="dropdown_item_select">
												<option>Any</option>
												<option value="Villa">Villa</option>
												<option value="Apartement">Apartement</option>
											</select>
										</li>
										<li class="dropdown_item dropdown_item_half">
											<div class="dropdown_item_title">Bedrooms no</div>
											<select name="bedrooms_no" id="bedrooms_no" class="dropdown_item_select">
												<option>Any</option>
												<option value="1">1</option>
												<option value="2">2</option>
												<option value="3">3</option>
												<option value="4">4</option>
											</select>
										</li>
										<li class="dropdown_item dropdown_item_half">
											<div class="dropdown_item_title">Bathrooms no</div>
											<select name="bathrooms_no" id="bathrooms_no" class="dropdown_item_select">
												<option>Any</option>
												<option value="1">1</option>
												<option value="2">2</option>
												<option value="3">3</option>
												<option value="4">4</option>
											</select>
										</li>
										<li class="dropdown_item dropdown_item_half">
											<div class="dropdown_item_title">Min Price</div>
											<select name="min_price" id="min_price" class="dropdown_item_select">
												<option>Any</option>
												<option>$10000</option>
												<option>$20000</option>
											</select>
										</li>
										<li class="dropdown_item dropdown_item_half">
											<div class="dropdown_item_title">Max Price</div>
											<select name="max_price" id="max_price" class="dropdown_item_select">
												<option>Any</option>
												<option>1000000€</option>
												<option>2000000€</option>
											</select>
										</li>
										<li class="dropdown_item dropdown_item_half">
											<div class="dropdown_item_title">Min Sq Ft</div>
											<select name="min_sq_ft" id="min_sq_ft" class="dropdown_item_select">
												<option>Any</option>
												<option>Any</option>
												<option>Any</option>
											</select>
										</li>
										<li class="dropdown_item dropdown_item_half">
											<div class="dropdown_item_title">Max Sq Ft</div>
											<select name="max_sq_ft" id="max_sq_ft" class="dropdown_item_select">
												<option>Any</option>
												<option>Any</option>
												<option>Any</option>
											</select>
										</li>
									</ul>
								</div>

								<div class="search_features_container">
									<div class="search_features_trigger">
										<a href="#">Specific features</a>
									</div>
									<ul class="search_features clearfix">
										<li class="search_features_item">
											<div>
												<input type="checkbox" id="search_features_1" class="search_features_cb">
												<label for="search_features_1">Feature 1</label>
											</div>
										</li>
										<li class="search_features_item">
											<div>
												<input type="checkbox" id="search_features_2" class="search_features_cb">
												<label for="search_features_2">Feature 2</label>
											</div>
										</li>
										<li class="search_features_item">
											<div>
												<input type="checkbox" id="search_features_3" class="search_features_cb">
												<label for="search_features_3">Feature 3</label>
											</div>
										</li>
										<li class="search_features_item">
											<div>
												<input type="checkbox" id="search_features_4" class="search_features_cb">
												<label for="search_features_4">Feature 4</label>
											</div>
										</li>
										<li class="search_features_item">
											<div>
												<input type="checkbox" id="search_features_5" class="search_features_cb">
												<label for="search_features_5">Feature 5</label>
											</div>
										</li>
										<li class="search_features_item">
											<div>
												<input type="checkbox" id="search_features_6" class="search_features_cb">
												<label for="search_features_6">Feature 6</label>
											</div>
										</li>
										<li class="search_features_item">
											<div>
												<input type="checkbox" id="search_features_7" class="search_features_cb">
												<label for="search_features_7">Feature 7</label>
											</div>
										</li>
										<li class="search_features_item">
											<div>
												<input type="checkbox" id="search_features_8" class="search_features_cb">
												<label for="search_features_8">Feature 8</label>
											</div>
										</li>
										<li class="search_features_item">
											<div>
												<input type="checkbox" id="search_features_9" class="search_features_cb">
												<label for="search_features_9">Feature 9</label>
											</div>
										</li>
										<li class="search_features_item">
											<div>
												<input type="checkbox" id="search_features_10" class="search_features_cb">
												<label for="search_features_10">Feature 10</label>
											</div>
										</li>
									</ul>

									<div class="search_button">
										<input value="search" type="submit" class="search_submit_button">
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>

				<!-- Listings -->

				<div class="col-lg-8 listings_col">


					<?php
					if ($buscar_prop > 0) {

						while ($dados = mysqli_fetch_array($ligar_query)) {
							$id_propriedade = $dados['id_propriedade'];
							$referencia = $dados['referencia'];
							$estado = $dados['estado'];
							$preco = $dados['preco'];
							$preco_usd = $dados['preco_usd'];
					  	$moeda = $dados['moeda'];
					  	$tipo_propriedade = $dados['tipo_propriedade'];
					  	$tipo_negocio = $dados['tipo_negocio'];
					  	$descricao_negocio = $dados['descricao_negocio'];
					  	$n_quartos = $dados['n_quartos'];
					  	$n_casas_de_banho = $dados['n_casas_de_banho'];
					  	$area_da_casa = $dados['area_da_casa'];
					  	$area_total = $dados['area_total'];
					  	$titulo = $dados['titulo'];
					  	$descricao = $dados['descricao'];
					  	$destaque = $dados['destaque'];
					  	$views = $dados['views'];
					  	$ano_contrucao = $dados['ano_contrucao'];
					  	$last_update = $dados['last_update'];
					  	$plantas = $dados['plantas'];
					  	$id_feature = $dados['id_feature'];
					  	$keywords = $dados['keywords'];

							$query_ft = "SELECT foto_url FROM galeria WHERE id_propriedade='$id_propriedade' LIMIT 1";
							$ligar_query_ft = mysqli_query($link, $query_ft);
							$buscar_prop_ft = mysqli_fetch_assoc($ligar_query_ft);
							$foto_url = $buscar_prop_ft['foto_url'];
					?>
					<!-- Listings Item -->
					<div class="listing_item">

						<div class="listing_item_inner d-flex flex-md-row flex-column trans_300">
							<div class="listing_image_container">
								<div class="listing_image">
									<!-- Image by: https://unsplash.com/@breather -->
									<a href="propriedade.php?id=<?php echo $id_propriedade; ?>"><div class="listing_background" style="background-image:url('<?php echo $foto_url; ?>')"></div></a>
								</div>
								<div class="featured_card_box d-flex flex-row align-items-center trans_300">
									<img src="images/tag.svg" alt="https://www.flaticon.com/authors/lucy-g">
									<div class="featured_card_box_content">
										<div class="featured_card_price_title trans_300"><?php echo $estado; ?></div>
										<div class="featured_card_price trans_300"><?php echo $preco; ?>€</div>
									</div>
								</div>
							</div>
							<div class="listing_content">
								<div class="listing_title"><a href="propriedade.php?id=<?php echo $id_propriedade; ?>"><?php echo $titulo; ?></a></div>
								<div class="listing_text"><?php echo $descricao; ?></div>
								<div class="rooms">

									<div class="room">
										<span class="room_title">Quartos</span>
										<div class="room_content">
											<div class="room_image"><img src="images/bedroom.png" alt=""></div>
											<span class="room_number"><?php echo $n_quartos; ?></span>
										</div>
									</div>

									<div class="room">
										<span class="room_title">Bathrooms</span>
										<div class="room_content">
											<div class="room_image"><img src="images/shower.png" alt=""></div>
											<span class="room_number"><?php echo $n_casas_de_banho; ?></span>
										</div>
									</div>

									<div class="room">
										<span class="room_title">Area</span>
										<div class="room_content">
											<div class="room_image"><img src="images/area.png" alt=""></div>
											<span class="room_number"><?php echo $area_total; ?> Sq Ft</span>
										</div>
									</div>

								</div>

								<div class="room_tags">
									<span class="room_tag"><a href="#"><?php echo $keywords; ?></a></span>
								</div>
							</div>
						</div>
					</div>


					<?php
						}
					}
					?>

					<!-- Listings Item -->



				</div>

			</div>

			<div class="row">
				<div class="col clearfix">
					<div class="listings_nav">
						<ul>
							<li class="listings_nav_item active"><a href="#">01.</a></li>
							<li class="listings_nav_item"><a href="#">02.</a></li>
							<li class="listings_nav_item"><a href="#">03.</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Newsletter -->

	<div class="newsletter">
		<div class="container">
			<div class="row row-equal-height">

				<div class="col-lg-6">
					<div class="newsletter_title">
						<h3>subscribe to our newsletter</h3>
						<span class="newsletter_subtitle">Get the latest offers</span>
					</div>
					<div class="newsletter_form_container">
						<form action="#">
							<div class="newsletter_form_content d-flex flex-row">
								<input id="newsletter_email" class="newsletter_email" type="email" placeholder="Your email here" required="required" data-error="Valid email is required.">
								<button id="newsletter_submit" type="submit" class="newsletter_submit_btn trans_200" value="Submit">subscribe</button>
							</div>
						</form>
					</div>
				</div>

				<div class="col-lg-6">
					<a href="#">
						<div class="weekly_offer">
							<div class="weekly_offer_content d-flex flex-row">
								<div class="weekly_offer_icon d-flex flex-column align-items-center justify-content-center">
									<img src="images/prize.svg" alt="">
								</div>
								<div class="weekly_offer_text text-center">weekly offer</div>
							</div>
							<div class="weekly_offer_image" style="background-image:url(images/weekly.jpg)"></div>
						</div>
					</a>
				</div>

			</div>
		</div>
	</div>

	<!-- Footer -->

	<footer class="footer">
		<div class="container">
			<div class="row">

				<!-- Footer About -->

				<div class="col-lg-3 footer_col">
					<div class="footer_col_title">
						<div class="logo_container">
							<a href="#">
								<div class="logo">
									<img src="images/logo.png" alt="">
								</div>
							</a>
						</div>
					</div>
					<div class="footer_social">
						<ul class="footer_social_list">
							<li class="footer_social_item"><a href="#"><i class="fab fa-pinterest"></i></a></li>
							<li class="footer_social_item"><a href="#"><i class="fab fa-facebook-f"></i></a></li>
							<li class="footer_social_item"><a href="#"><i class="fab fa-twitter"></i></a></li>
							<li class="footer_social_item"><a href="#"><i class="fab fa-dribbble"></i></a></li>
							<li class="footer_social_item"><a href="#"><i class="fab fa-behance"></i></a></li>
						</ul>
					</div>
					<div class="footer_about">
						<p>Lorem ipsum dolor sit amet, cons ectetur  quis ferme adipiscing elit. Suspen dis se tellus eros, placerat quis ferme ntum et, viverra sit amet lacus. Nam gravida  quis ferme semper augue.</p>
					</div>
				</div>

				<!-- Footer Useful Links -->

				<div class="col-lg-3 footer_col">
					<div class="footer_col_title">useful links</div>
					<ul class="footer_useful_links">
						<li class="useful_links_item"><a href="#">Listings</a></li>
						<li class="useful_links_item"><a href="#">Favorite Cities</a></li>
						<li class="useful_links_item"><a href="#">Clients Testimonials</a></li>
						<li class="useful_links_item"><a href="#">Featured Listings</a></li>
						<li class="useful_links_item"><a href="#">Properties on Offer</a></li>
						<li class="useful_links_item"><a href="#">Services</a></li>
						<li class="useful_links_item"><a href="#">News</a></li>
						<li class="useful_links_item"><a href="#">Our Agents</a></li>
					</ul>
				</div>

				<!-- Footer Contact Form -->
				<div class="col-lg-3 footer_col">
					<div class="footer_col_title">say hello</div>
					<div class="footer_contact_form_container">
						<form id="footer_contact_form" class="footer_contact_form" action="post">
							<input id="contact_form_name" class="input_field contact_form_name" type="text" placeholder="Name" required="required" data-error="Name is required.">
							<input id="contact_form_email" class="input_field contact_form_email" type="email" placeholder="E-mail" required="required" data-error="Valid email is required.">
							<textarea id="contact_form_message" class="text_field contact_form_message" name="message" placeholder="Message" required="required" data-error="Please, write us a message."></textarea>
							<button id="contact_send_btn" type="submit" class="contact_send_btn trans_200" value="Submit">send</button>
						</form>
					</div>
				</div>

				<!-- Footer Contact Info -->

				<div class="col-lg-3 footer_col">
					<div class="footer_col_title">contact info</div>
					<ul class="contact_info_list">
						<li class="contact_info_item d-flex flex-row">
							<div><div class="contact_info_icon"><img src="images/placeholder.svg" alt=""></div></div>
							<div class="contact_info_text">4127 Raoul Wallenber 45b-c Gibraltar</div>
						</li>
						<li class="contact_info_item d-flex flex-row">
							<div><div class="contact_info_icon"><img src="images/phone-call.svg" alt=""></div></div>
							<div class="contact_info_text">2556-808-8613</div>
						</li>
						<li class="contact_info_item d-flex flex-row">
							<div><div class="contact_info_icon"><img src="images/message.svg" alt=""></div></div>
							<div class="contact_info_text"><a href="mailto:contactme@gmail.com?Subject=Hello" target="_top">contactme@gmail.com</a></div>
						</li>
						<li class="contact_info_item d-flex flex-row">
							<div><div class="contact_info_icon"><img src="images/planet-earth.svg" alt=""></div></div>
							<div class="contact_info_text"><a href="https://colorlib.com">www.colorlib.com</a></div>
						</li>
					</ul>
				</div>

			</div>
		</div>
	</footer>

	<!-- Credits -->

	<div class="credits">
		<span><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></span>
	</div>

</div>

<script src="js/jquery-3.2.1.min.js"></script>
<script src="styles/bootstrap4/popper.js"></script>
<script src="styles/bootstrap4/bootstrap.min.js"></script>
<script src="plugins/easing/easing.js"></script>
<script src="js/listings_custom.js"></script>
</body>

</html>