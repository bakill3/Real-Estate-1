<?php
header('Content-Type: text/html, charset=UTF-8');
$link = mysqli_connect("localhost", "bakill3", "12345", "imobiliaria");
if ($link ==FALSE) {
	die("Nao foi possivel estabelecer uma conexao" . mysqli_error());
	exit;
}
mysqli_set_charset($link, "UTF8");
$escolheBD = mysqli_select_db($link, "imobiliaria");
if ($escolheBD==FALSE) {
	echo ("Não foi possível ligar à base de dados");
	mysqli_error();
	exit;
}
?>
