<?php include 'header.php';
if ($estatuto == "Administrador" || $estatuto == "Agente") {
	if(isset($_GET['id'])) {
		$prod_id = mysqli_real_escape_string($link, $_GET['id']);
		//VALIDAÇÃO/SEGURANÇA
		$buscar_info_prod = mysqli_query($link, "SELECT * FROM propriedades WHERE id_propriedade='$prod_id'");
		$linha = mysqli_fetch_assoc($buscar_info_prod);
		$usr_id_db = $linha['id_user'];
		
		if ($user_id != $usr_id_db) {
			echo "<script>window.location.href='index.php';</script>";
		} else {
			mysqli_query($link, "DELETE FROM propriedades WHERE id_propriedade='$prod_id';");
			mysqli_query($link, "DELETE FROM localizacao WHERE id_propriedade='$prod_id';");
			echo "<script>window.location.href='settings.php';</script>";

		}
	}
}
?>
<?php include 'footer.php'; ?>