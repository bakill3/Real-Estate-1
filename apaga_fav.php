<?php include 'header.php';
if(isset($_GET['id'])) {
	$fav_id = mysqli_real_escape_string($link, $_GET['id']);
	//VALIDAÇÃO/SEGURANÇA
	$buscar_info_prod = mysqli_query($link, "SELECT * FROM favoritos WHERE id_favorito='$fav_id'");
	$linha = mysqli_fetch_assoc($buscar_info_prod);
	$usr_id_db = $linha['id_user'];
	$prod_fav_apg = $linha['id_propriedade'];
	
	if ($user_id != $usr_id_db) {
		echo "<script>window.location.href='index.php';</script>";
	} else {
		mysqli_query($link, "DELETE FROM favoritos WHERE id_favorito='$fav_id';");
		echo "<script>window.location.href='propriedade.php?id=".$prod_fav_apg."';</script>";

	}
}
?>
<?php include 'footer.php'; ?>