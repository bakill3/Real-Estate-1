<?php include 'header.php'; ?>
<?php
if (isset($_GET['id'])) {
	$id = preg_replace('#[^0-9]#i', '', $_GET['id']);
	$query = "SELECT * FROM propriedades WHERE id_propriedade='$id'";
	$ligar_query = mysqli_query($link, $query);
	$buscar_prop = mysqli_num_rows($ligar_query);
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
			$plot_area = htmlspecialchars($dados['plot_area']);
			$plot_area_sqf = htmlspecialchars($dados['plot_area_SQF']);
			$condicao_propriedade = htmlspecialchars($dados['condicao_propriedade']);
			$internal_id = htmlspecialchars($dados["internal_id"]);
			$agente_id = htmlspecialchars($dados['id_user']);
			if ($_SESSION['lang'] == "pt") {
				$titulo = htmlspecialchars($dados['titulo']);
			  	$descricao = htmlspecialchars($dados['descricao']);

		  	} 
		  	elseif ($_SESSION['lang'] == "en") {
		  		$ligar_query_en = mysqli_query($link, "SELECT * FROM culturas WHERE id_propriedade='$id' AND lang='en-GB'");
		  		$buscar_prop_en = mysqli_fetch_assoc($ligar_query_en);
		  		$titulo = $buscar_prop_en['titulo_cult'];
			  	$descricao = htmlspecialchars($buscar_prop_en['description_cult']);
			  	$short_descricao = $buscar_prop_en['shortdescription_cult'];
		  	} elseif ($_SESSION['lang'] == "fr") {
		  		$ligar_query_fr = mysqli_query($link, "SELECT * FROM culturas WHERE id_propriedade='$id' AND lang='fr-FR'");
		  		$buscar_prop_fr = mysqli_fetch_assoc($ligar_query_fr);
		  		$titulo = htmlspecialchars($buscar_prop_fr['titulo_cult']);
			  	$descricao = htmlspecialchars($buscar_prop_fr['description_cult']);
			  	$short_descricao = htmlspecialchars($buscar_prop_fr['shortdescription_cult']);
		  	}

		}
	} else {
		header('location: index.php');
		echo "<script>window.location.href = 'index.php';</script>";
	}

	$query_pais = "SELECT * FROM localizacao WHERE id_propriedade='$id_propriedade'";
	$ligar_query_pais = mysqli_query($link, $query_pais) or die(mysqli_error($link));
	$buscar_pais = mysqli_num_rows($ligar_query_pais);
	if ($buscar_pais > 0) {
		while ($pa = mysqli_fetch_array($ligar_query_pais)) {
			$pais = htmlspecialchars($pa['pais']);
			$distrito = htmlspecialchars($pa['distrito']);
			$cidade = htmlspecialchars($pa['cidade']);
			$zona = htmlspecialchars($pa['zona']);
			$latitude = htmlspecialchars($pa['latitude']);
			$longitude = htmlspecialchars($pa['longitude']);
		}
	}


} else {
	header('location: index.php');
	echo "<script>window.location.href = 'index.php';</script>";
}

if (isset($_POST['add_fav'])) {
	date_default_timezone_set('Europe/Lisbon');
	$data = date('Y-m-d H:i:s');
	//VALIDAÇÃO
	$fav_vali = mysqli_query($link, "SELECT * FROM favoritos WHERE id_propriedade='$id' AND id_user='$user_id'");
	if (mysqli_num_rows($fav_vali) == 0) {
	//--------------------
		mysqli_query($link, "INSERT INTO favoritos(id_propriedade, id_user, data) VALUES ('$id', '$user_id', '$data')");
	} else {
		echo "Não me tentes enganar";
	}
	
	echo "<script>window.location.href='$url';</script>"; //$url ESTÁ NO HEADER QUE DEMONSTRA O CURRENT URL DA PÁGINA
}

?>
	<!-- Listing -->

				
				
	<div class="listing">
		<div class="container">
			<div class="row">
				<div class="col-lg-8">

					<!-- Listing Title -->
					<div class="listing_title_container">
						<div class="listing_title"><?php echo $titulo; ?></div>
						<?php
						if (isset($_SESSION['login'])) {
							$vef_fav = mysqli_query($link, "SELECT * FROM favoritos WHERE id_user='$user_id' AND id_propriedade='$id'");
							if (mysqli_num_rows($vef_fav) == 0) {
						?>
							<form method="POST">
								<button class="btn btn-primary" name="add_fav"><i class="far fa-star"></i></button>
							</form>
						<?php } else { ?>
						<button class="btn btn-primary"><i class="fas fa-star"></i></button>
						<?php } } ?>
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
				<!-- BOOTSTRAP TOOLTIP -->
				
				<!-- ##  -->
				<!-- Listing Price -->
				<div class="col-lg-4 listing_price_col clearfix">
					<div class="featured_card_box d-flex flex-row align-items-center trans_300 float-lg-right">
						<img src="images/tag.svg" alt="https://www.flaticon.com/authors/lucy-g">
						<div class="featured_card_box_content">
							<div class="featured_card_price_title trans_300"><?php echo $descricao_negocio; ?></div>
							<div class="featured_card_price trans_300"><?php echo $preco; ?> € </div>
						</div>	
					</div>
				</div>

			</div>
			<div class="row">
				<div class="col">

					<!-- Listing Image Slider -->

					<div class="listing_slider_container">
						<div class="owl-carousel owl-theme listing_slider">

							<?php
							$query = "SELECT * FROM galeria WHERE id_propriedade='$id'";
							$ligar_query = mysqli_query($link, $query);
							$buscar_prop = mysqli_num_rows($ligar_query);
							if ($buscar_prop > 0) {
								while ($r = mysqli_fetch_array($ligar_query)) {
									$foto_url = $r['foto_url'];
							?>
							<div class="owl-item listing_slider_item" style="max-height: 1000px;">
								<img src="<?php echo $foto_url; ?>" alt="<?php echo $titulo; ?>">
							</div>
							<?php
								}
							}
							?>
						</div>

						<div class="listing_slider_nav listing_slider_prev d-flex flex-row align-items-center justify-content-center trans_200">
							<img src="images/nav_left.png" alt="">
						</div>

						<div class="listing_slider_nav listing_slider_next d-flex flex-row align-items-center justify-content-center trans_200">
							<img src="images/nav_right.png" alt="">
						</div>

					</div>

				</div>
			</div>


			<div class="row listing_content_row">

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
							<form class="search_form" action="#">
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
												<option>Status 1</option>
												<option>Status 2</option>
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
												<option>Type 1</option>
												<option>Type 2</option>
											</select>
										</li>
										<li class="dropdown_item dropdown_item_half">
											<div class="dropdown_item_title">Bedrooms no</div>
											<select name="bedrooms_no" id="bedrooms_no" class="dropdown_item_select">
												<option>Any</option>
												<option>1</option>
												<option>2</option>
											</select>
										</li>
										<li class="dropdown_item dropdown_item_half">
											<div class="dropdown_item_title">Bathrooms no</div>
											<select name="bathrooms_no" id="bathrooms_no" class="dropdown_item_select">
												<option>Any</option>
												<option>1</option>
												<option>2</option>
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
												<option>$1000000</option>
												<option>$2000000</option>
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

					<div class="hello">
						<div class="footer_col_title">say hello</div>
						<div class="footer_contact_form_container">
							<form id="hello_contact_form" class="footer_contact_form" action="post">
								<input id="hello_contact_form_name" class="input_field contact_form_name" type="text" placeholder="Name" required="required" data-error="Name is required.">
								<input id="hello_contact_form_email" class="input_field contact_form_email" type="email" placeholder="E-mail" required="required" data-error="Valid email is required.">
								<textarea id="hello_contact_form_message" class="text_field contact_form_message" name="message" placeholder="Message" required="required" data-error="Please, write us a message."></textarea>
								<button id="hello_contact_send_btn" type="submit" class="contact_send_btn trans_200" value="Submit">send</button>
							</form>
						</div>
					</div>
				</div>

				<!-- Listing -->

				<div class="col-lg-8 listing_col">

					<div class="listing_details">
						<?php if ($_SESSION['lang'] != "pt") { ?>
						<div class="listing_subtitle"><?php echo $propriedade_lang[19]; ?></div>
						<p><?php echo $short_descricao; ?></p><br>
						<?php } ?>
						<div class="listing_subtitle"><?php echo $propriedade_lang[1]; ?></div>
						<p><?php echo $descricao; ?></p>
						<p><b>Referência: <?php echo $referencia; ?></b></p><br>
						<p class="listing_text" style="display: inline-block;"><?php echo $propriedade_lang[0]; ?> <?php echo $tipo_propriedade; ?></p><br>
						<br>
						<div class="listing_subtitle"><?php echo $propriedade_lang[2]; ?></div><br>
						<table class="table table-bordered table-responsive table-lg">
						<thead>
							<tr>
								<td style="color: black; font-weight: bold; font-size: 15px;"><?php echo $propriedade_lang[3]; ?></td>
								<td style="color: black; font-weight: bold; font-size: 15px;"><?php echo $propriedade_lang[4]; ?></td>
								<td style="color: black; font-weight: bold; font-size: 15px;"><?php echo $propriedade_lang[5]; ?></td>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td style="color: black;"><?php echo $pais; ?></td>
								<td style="color: black;"><?php echo $distrito; ?></td>
								<td style="color: black;"><?php echo $cidade; ?></td>
							</tr>
						</tbody>
						</table>

						<div class="rooms">

							<div class="room">
								<span class="room_title"><?php echo $propriedade_lang[6]; ?></span>
								<div class="room_content">
									<div class="room_image"><img src="images/bedroom.png" alt=""></div>
									<span class="room_number"><?php echo $n_quartos; ?></span>
								</div>
							</div>

							<div class="room">
								<span class="room_title"><?php echo $propriedade_lang[7]; ?></span>
								<div class="room_content">
									<div class="room_image"><img src="images/shower.png" alt=""></div>
									<span class="room_number"><?php echo $n_casas_de_banho; ?></span>
								</div>
							</div>
							<!-- FEATURE -->
							

							<div class="room">
								<span class="room_title"><?php echo $propriedade_lang[9]; ?></span>
								<div class="room_content">
									<div class="room_image"><img src="images/area.png" alt=""></div>
									<span class="room_number"><?php echo $area_total; ?>Sq Ft</span>
								</div>
							</div>
							<div class="room">
								<span class="room_title"><?php echo $propriedade_lang[10]; ?></span>
								<div class="room_content">
									<div class="room_image"><img src="images/area.png" alt=""></div>
									<span class="room_number"><?php echo $area_da_casa; ?>Sq Ft</span>
								</div>
							</div>
							<!--
							<?php if ($feature_type == 1) { ?>
							<div class="room">
								<span class="room_title">Patio</span>
								<div class="room_content">
									<div class="room_image"><img src="images/patio.png" alt=""></div>
									<span class="room_number"><?php echo $patio; ?></span>
								</div>
							</div>
							<?php } ?>
							<?php if ($garagem > 0) { ?>
							<div class="room">
								<span class="room_title">Garagem</span>
								<div class="room_content">
									<div class="room_image"><img src="images/garage.png" alt=""></div>
									<span class="room_number"><?php echo $garagem; ?></span>
								</div>
							</div>
							<?php } ?>
						-->

						</div>

					</div>

					<!-- Listing Description -->
					<div class="listing_description">
						<div class="listing_subtitle"><?php echo $propriedade_lang[11]; ?></div>
						<p class="listing_description_text"><?php echo $descricao_negocio; ?></p>
					</div>

					<!-- Listing Additional Details -->
					<div class="listing_additional_details">
						<div class="listing_subtitle"><?php echo $propriedade_lang[12]; ?></div>
						<ul class="additional_details_list">
							<li class="additional_detail"><span><?php echo $propriedade_lang[13]; ?></span> <?php echo $plot_area; ?></li>
							<li class="additional_detail"><span><?php echo $propriedade_lang[14]; ?></span> <?php echo $plot_area_sqf; ?></li>
							<li class="additional_detail"><span><?php echo $propriedade_lang[15]; ?></span> <?php echo $condicao_propriedade; ?></li>
							<li class="additional_detail"><span><?php echo $propriedade_lang[16]; ?></span> <?php echo $ano_contrucao; ?></li>
							<li class="additional_detail"><span><?php echo $propriedade_lang[17]; ?></span> <?php echo $internal_id; ?></li>
						</ul>
					</div>

					<!-- Listing Video -->
					<?php 
					if ($agente_id != 0) { 
					$busca_agente = mysqli_query($link, "SELECT * FROM utilizadores WHERE id_user='$agente_id'");
					$agente_info = mysqli_fetch_assoc($busca_agente);
					$nome_agente = $agente_info['nome'];
					$sobrenome_agente = $agente_info['sobrenome'];
					$descricao_agente = $agente_info['descricao_agente'];
					$foto_agente = $agente_info['imagem'];
					?>

						<div class="listing_video">

							<div class="card" style="width:400px">
								  <div class="card" style="width:400px">
								    <img class="card-img-top" src="<?php echo $foto_agente; ?>" alt="Card image" style="width:100%">
								    <div class="card-body">
								    	<h3 style="color: #0062cc; font-size: 210%;"><?php echo $propriedade_lang[18]; ?></h3>
								      <h4 class="card-title"><?php echo $nome_agente. " " .$sobrenome_agente; ?></h4>
								      <p class="card-text"><?php echo $descricao_agente; ?></p>
								    </div>
								  </div>
							</div>

						</div>
					<?php } ?>

					<!-- Listing Map -->
					<!--
					<div class="listing_map">
						<div class="listing_subtitle">Property on map</div>
						<div id="google_map">
							<div class="map_container">
								<div id="map"></div>
							</div>
						</div>
					-->
					<br><br>
					<?php 
					echo "
						<iframe style='width: 100%; height: 500px;'
						  frameborder='0'
						  scrolling='no' 
						  marginheight='0' 
						  marginwidth='0'
						  src='https://maps.google.com/maps?q={$latitude},{$longitude}&hl=pt&z=14&amp;output=embed'
						 >
						 </iframe>
						 <br />
						 <small>
						   <a 
						    href='https://maps.google.com/maps?q='+data.lat+','+data.lon+'&hl=pt&z=14&amp;output=embed'
						    style='color:#0000FF;text-align:left'
						    target='_blank'
						   >
						     See map bigger
						   </a>
						 </small>
						 "; ?>
					</div>

				</div>

			</div>
		</div>
	</div>

<?php include 'footer.php'; ?>
