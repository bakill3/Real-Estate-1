<?php include 'ligar_db.php'; ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="styles/bootstrap4/bootstrap.min.css">
</head>
<body>
<center>
<form action="" method="POST" enctype="multipart/form-data">
<h2>XML</h2><input type="file" name="file">
<button class="btn btn-primary" name="upload">Upload</button>
</form>
</center>
<?php
if (isset($_POST['upload'])) {
	$file_name = $_FILES['file']['name'];
	$file_type = $_FILES['file']['type'];
	$file_size = $_FILES['file']['size'];
	$file_tem_loc = $_FILES['file']['tmp_name'];
	$file_store = "xml/".$file_name;
	if (!empty($file_name)) {
	  move_uploaded_file($file_tem_loc, $file_store);
	}

	$xml = simplexml_load_file("$file_store");
	$y= 0;
	foreach ($xml->Properties->Property as $property) {
		$y++;
	    $internal_id = $property->Internal_ID;
	    $reference = $property ->Reference;
	    foreach ($property->PropertyStatus as $status) {
	  		$OnFocus = $status->OnFocus;
	  		$Featured = $status->Featured;
	  		$Opportunity = $status->Opportunity;
		}
	    $price = $property ->Price;
	    $PropertyBusinessTypeDesc = $property ->PropertyBusinessTypeDesc;
	    $price_usd = $property ->PriceUSD;
	    $Currency = $property ->Currency;
	    $PropertyType = $property ->PropertyType;
	    $PropertyCondition = $property ->PropertyCondition;
	    $PropertyBusinessType = $property ->PropertyBusinessType;
	    $NumberOfRooms = $property ->NumberOfRooms;
	    $NumberOfBathrooms = $property ->NumberOfBathrooms;
	    $HouseArea = $property ->HouseArea;
	    $PlotArea = $property ->PlotArea;
	    $HouseAreaSQF = $property ->HouseAreaSQF;
	    $PlotAreaSQF = $property ->PlotAreaSQF;
	    $Title = $property ->Title;
		$Description = $property ->Description;



	    $Country = $property ->Country;
	    $District = $property ->District;
	    $City = $property ->City;
	    $Zone = $property ->Zone;
	    $GMapLat = $property ->GMapLat;
		$GMapLon = $property ->GMapLon;
		$PropertyURL = $property->PropertyURL;
	   	foreach ($property->Features->children() as $feat) {
	   		$Feature = $feat;
	   	}
	   	$BuildYear = $property->BuildYear;
	   	$Featured_p = $property->Featured;
	   	$FloorPlans = $property->FloorPlans;

	?>
		<div style="border: 1px solid black;">
			<td>Internal ID: <?php echo $internal_id; ?><br></td>
			<td>Referência: <?php echo $reference; ?><br></td>
			<!-- //PROPERTY STATUS START\\ -->
				<td>OnFocus: <?php echo $OnFocus ?><br></td>
				<td>Opurtunidade: <?php echo $Opportunity; ?><br></td>
				<td>Featured: <?php echo $Featured; ?><br></td>
			<!-- //PROPERTY STATUS END\\ -->
			<td>Preço: <?php echo $price; ?><br></td>
			<td>Descrição de Tipo de Negócio: <?php echo $Description; ?><br></td>
			<td>Preço USD: <?php echo $price_usd; ?><br></td>
			<td>Currency: <?php echo $Currency; ?><br></td>
			<td>Tipo de Propriedade: <?php echo $PropertyType; ?><br></td>
			<td>Condição da Propriedade: <?php echo $PropertyCondition; ?><br></td>
			<td>Quartos: <?php echo $NumberOfRooms; ?><br></td>
			<td>Bathrooms: <?php echo $NumberOfBathrooms; ?><br></td>
			<td>HouseArea: <?php echo $HouseArea; ?><br></td>
			<td>PlotArea: <?php echo $PlotArea; ?><br></td>
			<td>HouseAreaSQF: <?php echo $HouseAreaSQF; ?><br></td>
			<td>PlotAreaSQF: <?php echo $PlotAreaSQF; ?><br></td>
			<td>Título: <?php echo $Title; ?><br></td>
			<td>Descrição: <?php echo $Description; ?><br></td>
			<?php
			$Description = str_replace("'", "", $Description);
			
			// '\''
			?>
			<td>País: <?php echo $Country; ?><br></td>
			<td>Distrito: <?php echo $District; ?><br></td>
			<td>Cidade: <?php echo $City; ?><br></td>
			<td>Zona: <?php echo $Zone; ?><br></td>
			<td>GMapLat: <?php echo $GMapLat; ?><br></td>
			<td>GMapLon: <?php echo $GMapLon; ?><br></td>
	    	<!-- <td>Photo <?php echo $x; ?>: <?php echo $Photos; ?><br></td> -->
			<td>Feature: <?php echo $Feature; ?><br></td>
			<td>BuildYear: <?php echo $BuildYear; ?><br></td>
			<td>Featured: <?php echo $Featured_p; ?><br></td>
			<td>FloorPlans: <?php echo $FloorPlans; ?><br></td>
		</div>
		<br><br>
	<?php
	//VERIFICAR SE A PROPRIEDADE EXISTE
	$prop_existe = mysqli_query($link, "SELECT * FROM propriedades WHERE referencia='$reference'");
	if (mysqli_num_rows($prop_existe) == 0) {
	//SE NÃO EXISTIR
		// SELECIONAR AS FEATURES EXISTENTES
		$sql_select_feature = "SELECT feature_type FROM feature WHERE feature_type='$Feature'";
		$sql_sel_query = mysqli_query($link, $sql_select_feature);
		$row_feat = mysqli_fetch_assoc($sql_sel_query);
		$Feature_sel = $row_feat['feature_type'];

		// SE A FEATURE DO XML FOR DIFERENTER DAS FEATURES SELECIONADAS DA TABELA ENTAO INSERT
		if ($Feature != $Feature_sel) {
			$sql_insert_feature = "INSERT INTO feature (feature_type) VALUES ('$Feature');";
			mysqli_query($link, $sql_insert_feature) or die(mysqli_error($link));
		}

			$sql_propriedades = "INSERT INTO propriedades (referencia, preco, preco_usd, moeda, 
			tipo_propriedade, tipo_negocio, descricao_negocio, n_quartos, n_casas_de_banho, area_da_casa, 
			area_total, titulo, descricao, destaque, ano_contrucao, plantas, Internal_id, condicao_propriedade, plot_area, plot_area_SQF,id_feature)
			VALUES ('$reference', '$price', '$price_usd', '$Currency', '$PropertyType', '$PropertyBusinessType', '$PropertyBusinessTypeDesc', '$NumberOfRooms', '$NumberOfBathrooms', '$HouseArea', '$HouseAreaSQF', '$Title', '$Description', '$Featured_p', '$BuildYear', '$FloorPlans', '$internal_id', '$PropertyCondition', '$PlotArea', '$PlotAreaSQF', (SELECT id_feature FROM feature WHERE feature_type='$Feature'));";
			mysqli_query($link, $sql_propriedades) or die(mysqli_error($link));


		foreach ($property->Photos->children() as $imagens) {
			$Photos = $imagens;
			echo $Photos;
			$sql_photos = "INSERT INTO galeria (id_propriedade, foto_url) VALUES ((SELECT id_propriedade FROM propriedades WHERE referencia='$reference' LIMIT 1), '$Photos');";
			mysqli_query($link, $sql_photos) or die(mysqli_error($link));
		}


		$sql_insert_localizacao = "INSERT INTO localizacao (id_propriedade, pais, distrito, cidade, zona, latitude, longitude) VALUES ((SELECT id_propriedade FROM propriedades WHERE referencia='$reference' LIMIT 1), '$Country', '$District', '$City', '$Zone', '$GMapLat', '$GMapLon');";

		mysqli_query($link, $sql_insert_localizacao) or die(mysqli_error($link));


		// CULTURAS vv
		foreach($property->Cultures->Culture as $culturas) {
			$lingua = $culturas["lang"];
			$culturas["lang"];
			$titulo_lang = $culturas->title;
			$shortdescription = str_replace("'", "", $culturas->shortdescription);
			$description = str_replace("'", "", $culturas->description);

			echo "
			<td>TITULO LANG: $titulo_lang<br></td>
			<td>SHORTDESCRIPTION: $shortdescription<br></td>
			<td> DESCRICCAO: $description<br></td>
			<td> DESCRICCAO: $lingua<br></td>";



			$sql_p_cultures = "INSERT INTO culturas(id_propriedade, titulo_cult, shortdescription_cult,
			 description_cult, lang) VALUES ((SELECT id_propriedade FROM propriedades WHERE referencia='$reference' LIMIT 1), 
			 '$titulo_lang', '$shortdescription', '$description', '$lingua') ;";

			mysqli_query($link, $sql_p_cultures) or die(mysqli_error($link));

		}
		//END DAS CULTURAS --

		//PROPERTY STATUS
		$sql_p_status = "INSERT INTO property_status(id_propriedade, onfocus, opurtunidade, featured)
		VALUES ((SELECT id_propriedade FROM propriedades WHERE referencia='$reference' LIMIT 1), '$OnFocus', '$Opportunity', '$Featured')";
		mysqli_query($link, $sql_p_status) or die (mysqli_error($link));


		}
	} //ACABAR A VERIFICAÇÃO A VER SE A PROPRIEDADE EXISTE
} // ACABAR O IF
?>
