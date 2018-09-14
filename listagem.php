<?php
include 'header.php';
if (isset($_POST['pesquisar_btn'])) {
	$pesquisar = htmlspecialchars(mysqli_real_escape_string($link, $_POST['pesquisar']));
	$bedrooms_no = htmlspecialchars(mysqli_real_escape_string($link, $_POST['bedrooms_no']));
	$property_status = htmlspecialchars(mysqli_real_escape_string($link, $_POST['property_status']));
	$bathrooms_no = htmlspecialchars(mysqli_real_escape_string($link, $_POST['bathrooms_no']));
	$property_type = htmlspecialchars(mysqli_real_escape_string($link, $_POST['property_type']));
	$min_price = htmlspecialchars(mysqli_real_escape_string($link, $_POST['min_price']));
	$max_price = htmlspecialchars(mysqli_real_escape_string($link, $_POST['max_price']));
	$min_sqft = htmlspecialchars(mysqli_real_escape_string($link, $_POST['min_sq_ft']));
	$max_sqft = htmlspecialchars(mysqli_real_escape_string($link, $_POST['max_sq_ft']));
	//tipo_propriedade
 	$query = "SELECT * FROM propriedades WHERE 1 = '1'";
	if (!empty($pesquisar)) {
		$query .= "AND titulo LIKE '%$pesquisar%' OR referencia LIKE '%$pesquisar%'";
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
	if ($min_price != "Any" && $max_price != "Any") {
		$query .= "AND preco BETWEEN $min_price AND $max_price";
	} 
	elseif ($min_price != "Any") {
		$query .= "AND preco >= $min_price";
	}
	elseif ($max_price != "Any") {
		$query .= "AND preco <= $max_price";
	}
	if ($min_sqft != "Any" && $max_sqft != "Any") {
		$query .= "AND plot_area_SQF BETWEEN $min_sqft AND $max_sqft";
	}
	elseif ($min_sqft != "Any") {
		$query .= "AND plot_area_SQF >= $min_sqft";
	}
	elseif ($max_sqft != "Any") {
		$query .= "AND plot_area_SQF <= $max_sqft";
	}

} else {
	$query = "SELECT * FROM propriedades;";
}
$ligar_query = mysqli_query($link, $query) or die(mysqli_error($link));
$buscar_prop = mysqli_num_rows($ligar_query);
?>


	<!-- Listings -->

	<div class="listings">
		<div class="container">
			<div class="row">

				<!-- Search Sidebar -->

				<div class="col-lg-4 sidebar_col">
					<!-- Search Box -->

					<div class="search_box">

						<div class="search_box_content">

							<form class="search_form" action="listagem.php" method="POST">
							<!-- Search Box Title -->
							<div class="search_box_title text-center">
								<div class="search_box_title_inner">
									<div class="search_box_title_icon d-flex flex-column align-items-center justify-content-center"><img src="images/search.png" alt=""></div>
									<input type="text" name="pesquisar" placeholder="Pesquise aqui..." style="padding-left: 15%; width: 100%; height: 100%; background-color: #fd784f; border-color: #fd784f;">
								</div>
							</div>

							<!-- Search Form -->
							<form class="search_form" method="POST" name="pesquisar">
								<div class="search_box_container">
									<ul class="dropdown_row clearfix">
										<li class="dropdown_item dropdown_item_5">
											<div class="dropdown_item_title">Property Status</div>
											<select name="property_status" id="property_status" class="dropdown_item_select">
												<option>Any</option>
												<option>For Sale</option>
												<option>Longterm rentals</option>
											</select>
										</li>
										<!--
										<li class="dropdown_item dropdown_item_5">
											<div class="dropdown_item_title">Location</div>
											<select name="property_location" id="property_location" class="dropdown_item_select">
												<option>Any</option>
												<option>Portimão</option>
												<option>Lagos</option>
												<option>Loulé</option>
											</select>
										</li>
									-->
										<li class="dropdown_item dropdown_item_5">
											<div class="dropdown_item_title">Property Type</div>
											<select name="property_type" id="property_type" class="dropdown_item_select">
												<option>Any</option>
												<option>Villa</option>
												<option>Apartment</option>
											</select>
										</li>
										<li class="dropdown_item dropdown_item_6">
											<div class="dropdown_item_title">Bedrooms no</div>
											<select name="bedrooms_no" id="bedrooms_no" class="dropdown_item_select">
												<option>Any</option>
												<option>1</option>
												<option>2</option>
												<option>3</option>
												<option>4</option>
											</select>
										</li>
										<li class="dropdown_item dropdown_item_6">
											<div class="dropdown_item_title">Bathrooms no</div>
											<select name="bathrooms_no" id="bathrooms_no" class="dropdown_item_select">
												<option>Any</option>
												<option>1</option>
												<option>2</option>
												<option>3</option>
												<option>4</option>
											</select>
										</li>
										<li class="dropdown_item dropdown_item_6">
											<div class="dropdown_item_title">Min Price</div>
											<select name="min_price" id="min_price" class="dropdown_item_select">
												<option>Any</option>
												<option>50000</option>
												<option>75000</option>
												<option>100000</option>
												<option>150000</option>
												<option>300000</option>
											</select>
										</li>
										<li class="dropdown_item dropdown_item_6">
											<div class="dropdown_item_title">Max Price</div>
											<select name="max_price" id="max_price" class="dropdown_item_select">
												<option>Any</option>
												<option>100000</option>
												<option>200000</option>
												<option>400000</option>
												<option>500000</option>
											</select>
										</li>
										<li class="dropdown_item dropdown_item_6">
											<div class="dropdown_item_title">Min Sq Ft</div>
											<select name="min_sq_ft" id="min_sq_ft" class="dropdown_item_select">
												<option>Any</option>
												<option>300</option>
												<option>2000</option>
											</select>
										</li>
										<li class="dropdown_item dropdown_item_6">
											<div class="dropdown_item_title">Max Sq Ft</div>
											<select name="max_sq_ft" id="max_sq_ft" class="dropdown_item_select">
												<option>Any</option>
												<option>5000</option>
												<option>100000</option>
											</select>
										</li>
										<li class="dropdown_item">
											<div class="search_button">
												<input value="search" type="submit" name="pesquisar_btn" class="search_submit_button">
											</div>
										</li>	

									</ul>
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
							$id_propriedade = htmlspecialchars($dados['id_propriedade']);
							$referencia = htmlspecialchars($dados['referencia']);
							$estado = htmlspecialchars($dados['estado']);
							$preco = htmlspecialchars($dados['preco']);
							$preco_usd = htmlspecialchars($dados['preco_usd']);
						  	$moeda = htmlspecialchars($dados['moeda']);
						  	$tipo_propriedade = htmlspecialchars($dados['tipo_propriedade']);
						  	$tipo_negocio = htmlspecialchars($dados['tipo_negocio']);
						  	$descricao_negocio = htmlspecialchars($dados['descricao_negocio']);
						  	$n_quartos = htmlspecialchars($dados['n_quartos']);
						  	$n_casas_de_banho = htmlspecialchars($dados['n_casas_de_banho']);
						  	$area_da_casa = htmlspecialchars($dados['area_da_casa']);
						  	$area_total = htmlspecialchars($dados['area_total']);
						  	$destaque = htmlspecialchars($dados['destaque']);
						  	$views = htmlspecialchars($dados['views']);
						  	$ano_contrucao = htmlspecialchars($dados['ano_contrucao']);
						  	$last_update = htmlspecialchars($dados['last_update']);
						  	$plantas = htmlspecialchars($dados['plantas']);
					  	if ($_SESSION['lang'] == "pt") {
							$titulo = htmlspecialchars($dados['titulo']);
						  	$descricao = htmlspecialchars($dados['descricao']);

					  	} 
					  	elseif ($_SESSION['lang'] == "en") {
					  		$ligar_query_en = mysqli_query($link, "SELECT * FROM culturas WHERE id_propriedade='$id_propriedade' AND lang='en-GB'");
					  		$buscar_prop_en = mysqli_fetch_assoc($ligar_query_en);
					  		$titulo = $buscar_prop_en['titulo_cult'];
						  	$descricao = htmlspecialchars($buscar_prop_en['description_cult']);
						  	$short_descricao = $buscar_prop_en['shortdescription_cult'];
					  	} elseif ($_SESSION['lang'] == "fr") {
					  		$ligar_query_fr = mysqli_query($link, "SELECT * FROM culturas WHERE id_propriedade='$id_propriedade' AND lang='fr-FR'");
					  		$buscar_prop_fr = mysqli_fetch_assoc($ligar_query_fr);
					  		$titulo = htmlspecialchars($buscar_prop_fr['titulo_cult']);
						  	$descricao = htmlspecialchars($buscar_prop_fr['description_cult']);
						  	$short_descricao = htmlspecialchars($buscar_prop_fr['shortdescription_cult']);
					  	}

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
									<?php
									//FEATURES
									$feat_query = mysqli_query($link, "SELECT * FROM feature_con WHERE id_propriedade='$id_propriedade'");
									$conta_feat = mysqli_num_rows($feat_query);
									if($conta_feat > 0) {
										while($busca_feat = mysqli_fetch_array($feat_query)) {
											$id_feature = $busca_feat['id_feature'];
											$busca_feat= mysqli_query($link, "SELECT feature_type FROM feature WHERE id_feature='$id_feature'");
											$info_feat = mysqli_fetch_assoc($busca_feat);
											$feature_id = $info_feat['feature_type'];
									?>
										<span class="room_tag" data-toggle="tooltip" data-placement="top" title="Feature"><a href="#"><?php echo $feature_id; ?></a></span>
									<?php
										}
									}
									
									?>
								</div>

								<div class="room_tags">
									<?php
									//KEYWORDS
									$key_query = mysqli_query($link, "SELECT * FROM keywords WHERE id_propriedade='$id_propriedade'");
									$conta_key = mysqli_num_rows($key_query);
									if($conta_key > 0) {
										while($busca_key = mysqli_fetch_array($key_query)) {
											$keyword_id = $busca_key['keyword_id'];
											$busca_key = mysqli_query($link, "SELECT keyword FROM keyword_text WHERE keyword_id='$keyword_id'");
											$info_key = mysqli_fetch_assoc($busca_key);
											$keyword = $info_key['keyword'];
									?>
										<span class="room_tag" style="background-color: lightblue;" data-toggle="tooltip" data-placement="top" title="Keyword"><a href="#"><?php echo $keyword; ?></a></span>
									<?php
										}
									}
									
									?>
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
						<form>
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
						<form id="footer_contact_form" class="footer_contact_form" method="post">
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
