<?php
include ('header.php');
if ($estatuto == "Administrador" || $estatuto == "Agente") {
	if(isset($_GET['id'])) {
		$prod_id = mysqli_real_escape_string($link, $_GET['id']);
		//VALIDAÇÃO/SEGURANÇA
		$buscar_info_prod = mysqli_query($link, "SELECT * FROM propriedades WHERE id_propriedade='$prod_id'");
		$linha = mysqli_fetch_assoc($buscar_info_prod);
		$usr_id_db = $linha['id_user'];
		//LOCALIZACAO
		$buscar_info_loc = mysqli_query($link, "SELECT * FROM localizacao WHERE id_propriedade='$prod_id'");
		$linha_loc = mysqli_fetch_assoc($buscar_info_loc);
		//$user_id no header representa o id do utilizador
		if ($user_id != $usr_id_db) {
			echo "<script>window.location.href='index.php';</script>";
		} else {
			$titulo = $linha['titulo'];
		    $descricao = $linha['descricao'];
		    $preco_eur = $linha['preco'];
		    $preco_usd = $linha['preco_usd'];
		    $n_quartos = $linha['n_quartos'];
		    $n_wc = $linha['n_casas_de_banho'];
		    $area_casa = $linha['area_da_casa'];
		    $area_total = $linha['area_total'];
		    $plot_area = $linha['plot_area'];
		    $plot_area_sqf = $linha['plot_area_SQF'];
		    $ano_construcao = $linha['ano_contrucao'];
		    $tipo_propriedade = $linha['tipo_propriedade'];
		    $descricao_negocio = $linha['descricao_negocio'];

		    //LOC
		    $pais = $linha_loc['pais'];
		    $distrito = $linha_loc['distrito'];
		    $cidade = $linha_loc['cidade'];
		    $zona = $linha_loc['zona'];
		    $lat = $linha_loc['latitude'];
		    $long = $linha_loc['longitude'];

		    if (isset($_GET['eliminar'])) {
		    	$id_elim_foto = mysqli_real_escape_string($link, $_GET['eliminar']);
		    	//VALIDAÇÃO ----------------------------------------------------------------------------------
		    	$gal_sql = mysqli_query($link, "SELECT * FROM galeria WHERE id_propriedade='$prod_id'");
		    	$cont_galeria = mysqli_num_rows($gal_sql);
		    	if ($cont_galeria > 0) {
		    		while ($get_galeria = mysqli_fetch_array($gal_sql)) {
		    			$foto_url = $get_galeria['foto_url'];
		    			$id_foto = $get_galeria['id_foto'];

		    			if ($id_elim_foto == $id_foto) {
		    				mysqli_query($link, "DELETE FROM galeria WHERE id_foto='$id_elim_foto'");
		    			} 
		    		}
		    	}
		    	//--------------------------------------------------------------------------------------------
		    	
		    }


		    // ATUALIZAR OS DADOS DO IMOVEL

			if (isset($_POST['atualizar_imovel'])) {
			    //TABELA PROPRIEDADES 
			    $id_pro = mysqli_real_escape_string($link, $_POST['prod_p_id']);
			    $titulo = mysqli_real_escape_string($link, $_POST['titulo']);
			    $descricao = mysqli_real_escape_string($link, $_POST['descricao']);
			    $preco_eur = mysqli_real_escape_string($link, $_POST['preco']);
			    $preco_usd = mysqli_real_escape_string($link, $_POST['preco_usd']);
			    $n_quartos = mysqli_real_escape_string($link, $_POST['n_quartos']);
			    $n_wc = mysqli_real_escape_string($link, $_POST['n_casas_de_banho']);
			    $area_casa = mysqli_real_escape_string($link, $_POST['area_da_casa']);
			    $area_total = mysqli_real_escape_string($link, $_POST['area_total']);
			    $plot_area = mysqli_real_escape_string($link, $_POST['plot_area']);
			    $plot_area_sqf = mysqli_real_escape_string($link, $_POST['plot_area_sqf']);
			    $ano_construcao = mysqli_real_escape_string($link, $_POST['ano_construcao']);
			    $tipo_propriedade = mysqli_real_escape_string($link, $_POST['tipo_propriedade']);
			    $descricao_negocio = mysqli_real_escape_string($link, $_POST['descricao_negocio']);
			    //-----------------------------------------------

			    //TABELA FEATURE
			    $feature_type = $_POST['feature_type'];
			    //-----------------------------------------------

			    //TABELA LOCALIZACAO
			    $pais = $_POST['pais'];
			    $distrito = $_POST['distrito'];
			    $cidade = $_POST['cidade'];
			    $zona = $_POST['zona'];
			    $latitude = $_POST['latitude'];
			    $longitude = $_POST['longitude'];

			    //-----------------------------------------------
			    if (!empty($titulo) && !empty($descricao) && !empty($preco_eur) && !empty($preco_usd) && !empty($tipo_propriedade) && !empty($descricao_negocio) && !empty($feature_type) && !empty($pais) && !empty($distrito) && !empty($cidade)) {
			        
			        $query = "UPDATE propriedades SET preco='$preco_eur', preco_usd='$preco_usd', tipo_propriedade='$tipo_propriedade', descricao_negocio='$descricao_negocio', n_quartos='$n_quartos', n_casas_de_banho='$n_wc', area_da_casa='$area_casa', area_total='$area_total', titulo='$titulo', descricao='$descricao', ano_contrucao='$ano_construcao', plot_area='$plot_area', plot_area_SQF='$plot_area_sqf', id_feature=(SELECT id_feature FROM feature WHERE feature_type='$feature_type') WHERE id_propriedade='$id_pro'";
			        mysqli_query($link, $query) or die(mysqli_error($link));
			        echo "<h1 color='red' size='1000px'>BLYAT</h1>";

			        $sql_insert_localizacao = "UPDATE localizacao SET id_propriedade=(SELECT id_propriedade FROM propriedades WHERE id_propriedade='$id_pro' LIMIT 1), pais='$pais', distrito='$distrito', cidade='$cidade', zona='$zona', latitude='latitude', longitude='longitude'";
			        mysqli_query($link, $sql_insert_localizacao);


			         //----------------------
					foreach($_FILES["files"]["tmp_name"] as $key=>$tmp_name) {
						    $temp = $_FILES["files"]["tmp_name"][$key];
						    $name = $_FILES["files"]["name"][$key];
						     
						    if(empty($temp)) {
						        break;
						    }
						     
						    move_uploaded_file($temp,"imoveis/".$name);
						    $link_foto = "imoveis/".$name;
						    $sql_galeria = "INSERT INTO galeria (id_propriedade, foto_url) VALUES ((SELECT id_propriedade FROM propriedades WHERE id_propriedade='$id_pro' LIMIT 1), '$link_foto');";
						    mysqli_query($link, $sql_galeria) or die(mysqli_error($link));
					}

			        
			        echo "<script>window.location.href='settings.php';</script>";

			    }
			} //61

		}
	}


?>
<center><br>
<div class="col col-md-5">
<h2><?php echo $add_imoveis[23]; ?></h2><br>
<form action="" method="POST" enctype="multipart/form-data">
	<input type="hidden" name="prod_p_id" value="<?php echo $prod_id; ?>">
    <?php echo $add_imoveis[1]; ?> <input type="text" class="form-control" name="titulo" value="<?php echo $titulo; ?>" required><br>
    <?php echo $add_imoveis[2]; ?> <textarea class="form-control" name="descricao" rows="3" required><?php echo $descricao; ?></textarea><br>
    <?php echo $add_imoveis[3]; ?> <input type="number" class="form-control" name="preco" value="<?php echo $preco_eur; ?>" required><br>
    <?php echo $add_imoveis[4]; ?> <input type="text" class="form-control" name="preco_usd" value="<?php echo $preco_usd; ?>"><br>
    <?php echo $add_imoveis[5]; ?> <input type="number" max="10" class="form-control" name="n_quartos" value="<?php echo $n_quartos; ?>" required><br>
    <?php echo $add_imoveis[6]; ?> <input type="number" class="form-control" name="n_casas_de_banho" value="<?php echo $n_wc; ?>" required><br>
    <?php echo $add_imoveis[7]; ?> <input type="number" class="form-control" name="area_da_casa" value="<?php echo $area_casa; ?>" required><br>
    <?php echo $add_imoveis[8]; ?> <input type="number" class="form-control" name="area_total" value="<?php echo $area_total; ?>" required><br>
    <?php echo $add_imoveis[9]; ?> <input type="number" class="form-control" name="plot_area" value="<?php echo $plot_area; ?>" required><br>
    <?php echo $add_imoveis[10]; ?> <input type="number" class="form-control" name="plot_area_sqf" value="<?php echo $plot_area_sqf; ?>" required><br>
    <?php echo $add_imoveis[11]; ?> <input type="number" class="form-control" name="ano_construcao" value="<?php echo $ano_construcao; ?>" required><br>
    <!-- LOCALIZAÇÃO -->
    <?php echo $add_imoveis[12]; ?> <input type="text" class="form-control" min="1930" max="2018" name="pais" value="<?php echo $pais; ?>" required><br>
    <?php echo $add_imoveis[13]; ?> <input type="text" class="form-control" name="distrito" value="<?php echo $distrito; ?>" required><br>
    <?php echo $add_imoveis[14]; ?> <input type="text" class="form-control" name="cidade" value="<?php echo $cidade; ?>" required><br>
    <?php echo $add_imoveis[15]; ?> <input type="text" class="form-control" name="zona" value="<?php echo $zona; ?>" required><br>
    <?php echo $add_imoveis[16]; ?> <input type="number" class="form-control" name="latitude" value="<?php echo $long; ?>" required><br>
    <?php echo $add_imoveis[17]; ?> <input type="number" class="form-control" name="longitude" value="<?php echo $lat; ?>"required><br>
    <!-- -->
    <?php echo $add_imoveis[18]; ?> 
    <select name="tipo_propriedade" class="form-control" required>
        <option>Villa</option>
        <option>Apartment</option>
    </select>
    <?php echo $add_imoveis[19]; ?>
    <select name="descricao_negocio" class="form-control" required>
        <option>For sale</option>
        <option>Longterm rentals</option>
    </select>
    <!-- FEATURE -->
        <?php echo $add_imoveis[20]; ?>
    <select name="feature_type" class="form-control" required>
        <option>Swimming pool</option>
        <option>Furnished</option>
        <option>Balcony</option>
    </select>
    <!-- --><br>
    <table class="table table-bordered table-dark table-responsive">
    	<thead>
    		<tr>
    			<td colspan="100"><center><?php echo $add_imoveis[24]; ?></center></td>
    		</tr>
    	</thead>
    	<tbody>
    	<tr>
    	<?php 
    	$gal_sql = mysqli_query($link, "SELECT * FROM galeria WHERE id_propriedade='$prod_id'");
    	$cont_galeria = mysqli_num_rows($gal_sql);
    	if ($cont_galeria > 0) {
    		while ($get_galeria = mysqli_fetch_array($gal_sql)) {
    			$foto_url = $get_galeria['foto_url'];
    			$id_foto = $get_galeria['id_foto'];
    	?>
    	
    		<td><img src="<?php echo $foto_url; ?>" width="180"></td>
    		<td><a href="edita_produto.php?id=<?php echo $prod_id; ?>&eliminar=<?php echo $id_foto; ?>" class="btn btn-danger"><i class="fas fa-trash-alt"></i></span></a></td>
    	
    	<?php
    		}
    		
    	}
    	?>
    	</tr>
    </tbody>	
    </table>
    <label><?php echo $add_imoveis[21]; ?></label>
    <input type="file" name="files[]" multiple="multiple" />

    <br><br><input type="submit" name="atualizar_imovel" class="btn btn-primary" value="<?php echo $add_imoveis[25]; ?>">
</form>
</center><br><br>
<?php
} else {
	echo "<script>window.location.href='index.php';</script>";
}
include ('footer.php');
?>