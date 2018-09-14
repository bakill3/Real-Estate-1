<?php
include('codigo_main.php');
include('verifica_admin.php');
if (isset($_SESSION['login']) && $estatuto == "Administrador" || $estatuto == "Agente") {
include 'header_office.php'; 
?>
<div class="col-xl-12">
<div class="m-portlet m-portlet--bordered-semi m-portlet--full-height ">
	<div class="m-portlet__head">
		<div class="m-portlet__head-caption">
			<div class="m-portlet__head-title">
				<h1 class="m-portlet__head-text">
					<b><?php echo $add_imoveis[0]; ?></b>
				</h1>
			</div>
		</div>
	</div>
<div class="m-portlet__body">
<form action="" method="POST" enctype="multipart/form-data">
    <?php echo $add_imoveis[1]; ?> <input type="text" class="form-control" name="titulo" placeholder="<?php echo $add_imoveis[1]; ?>" required><br>
    <?php echo $add_imoveis[2]; ?> <textarea class="form-control" name="descricao" placeholder="<?php echo $add_imoveis[2]; ?>" required></textarea><br>
    <?php echo $add_imoveis[3]; ?> <input type="number" class="form-control" name="preco" placeholder="<?php echo $add_imoveis[3]; ?>" required><br>
    <?php echo $add_imoveis[4]; ?> <input type="text" class="form-control" name="preco_usd" placeholder="<?php echo $add_imoveis[4]; ?>"><br>
    <?php echo $add_imoveis[5]; ?> <input type="number" max="10" class="form-control" name="n_quartos" placeholder="<?php echo $add_imoveis[5]; ?>" required><br>
    <?php echo $add_imoveis[6]; ?> <input type="number" class="form-control" name="n_casas_de_banho" placeholder="<?php echo $add_imoveis[6]; ?>" required><br>
    <?php echo $add_imoveis[7]; ?> <input type="number" class="form-control" name="area_da_casa" placeholder="<?php echo $add_imoveis[7]; ?>" required><br>
   <?php echo $add_imoveis[8]; ?> <input type="number" class="form-control" name="area_total" placeholder="<?php echo $add_imoveis[8]; ?>" required><br>
    <?php echo $add_imoveis[9]; ?> <input type="number" class="form-control" name="plot_area" placeholder="<?php echo $add_imoveis[9]; ?>" required><br>
    <?php echo $add_imoveis[10]; ?> <input type="number" class="form-control" name="plot_area_sqf" placeholder="<?php echo $add_imoveis[10]; ?>" required><br>
    <?php echo $add_imoveis[11]; ?> <input type="number" class="form-control" name="ano_construcao" placeholder="<?php echo $add_imoveis[11]; ?>" required><br>
    <!-- LOCALIZAÇÃO -->
    <?php echo $add_imoveis[12]; ?> <input type="text" class="form-control" min="1930" max="2018" name="pais" placeholder="<?php echo $add_imoveis[12]; ?>" required><br>
    <?php echo $add_imoveis[13]; ?> <input type="text" class="form-control" name="distrito" placeholder="<?php echo $add_imoveis[13]; ?>" required><br>
    <?php echo $add_imoveis[14]; ?> <input type="text" class="form-control" name="cidade" placeholder="<?php echo $add_imoveis[14]; ?>" required><br>
    <?php echo $add_imoveis[15]; ?> <input type="text" class="form-control" name="zona" placeholder="<?php echo $add_imoveis[15]; ?>" required><br>
    <?php echo $add_imoveis[16]; ?> <input type="number" class="form-control" name="latitude" placeholder="<?php echo $add_imoveis[16]; ?>" required><br>
    <?php echo $add_imoveis[17]; ?> <input type="number" class="form-control" name="longitude" placeholder="<?php echo $add_imoveis[17]; ?>" required><br>
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
    <h4><i><b>Palavra-chaves:</b></i></h4>
    <div style="padding-left: 40px; font-weight: bold;">
    <?php 
    $query = "SELECT * FROM keyword_text";
    $query_liga = mysqli_query($link, $query);
    $query_conta = mysqli_num_rows($query_liga);
    if ($query_conta > 0) {
        while($key_info = mysqli_fetch_array($query_liga)) {
            $id_keyword = $key_info['keyword_id'];
            $keyword = $key_info['keyword'];

    ?>
    - <?php echo $keyword; ?> <input type="checkbox" name="chaves[]" value="<?php echo $keyword_id; ?>"><br>
    <?php
        }
    }
    ?>
    </div>
    <br>
    <label><?php echo $add_imoveis[21]; ?> </label>
    <input type="file" name="files[]" multiple="multiple" required />

    <br><br><input type="submit" name="inserir_imovel" class="btn btn-primary" value="<?php echo $add_imoveis[22]; ?>">
</form>
</div>
</div>
</div>
<?php 
include 'footer_office.php'; 
}
?>
