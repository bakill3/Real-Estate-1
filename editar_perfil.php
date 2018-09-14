<?php
include('codigo_main.php');
include('verifica_admin.php');
if (isset($_SESSION['login']) && $estatuto == "Administrador" || $estatuto == "Agente") {
include 'header_office.php'; 
?>

<div class="col-xl-12" align="center">
<div class="m-portlet m-portlet--bordered-semi m-portlet--full-height ">
	<div class="m-portlet__head">
		<div class="m-portlet__head-caption">
			<div class="m-portlet__head-title">
				<h1 class="m-portlet__head-text">
					<b><?= $manage_acc[0]; ?></b>
				</h1>
			</div>
		</div>
	</div>
<div class="m-portlet__body">
<form method="POST" enctype="multipart/form-data">
<?php echo $manage_acc[1]; ?> <input type="text" class="form-control" name="nome_atualizado" value="<?php echo $nome; ?>"><br>
<?php echo $manage_acc[2]; ?> <input type="text" class="form-control" name="apelido_atualizado" value="<?php echo $apelido; ?>"><br>
<?php echo $manage_acc[3]; ?>
<select name="genero_atualizado" class="form-control">
    <option <?php if ($genero == "Masculino") { ?> selected <?php } ?> >Masculino</option>
    <option <?php if ($genero == "Feminino") { ?> selected <?php } ?>>Feminino</option>
</select>
<br>
<?php echo $manage_acc[4]; ?> <input type="number" class="form-control" name="movel_atualizado" value="<?php echo $telemovel; ?>"><br>
<?php echo $manage_acc[5]; ?> <input type="text" class="form-control" name="email_atualizado" value="<?php echo $email; ?>"><br>
<?php if ($estatuto == "Administrador" || $estatuto == "Agente") { ?>
<?php echo $manage_acc[6]; ?> <textarea class="form-control"  name="descricao_agente_atualizado"><?php echo $descricao_agente; ?></textarea><br>
<h2><?php echo $manage_acc[7]; ?></h2><img src="<?php echo $foto_perf; ?>" style="width: 20%;"><br><br><input type="file" name="file">
<?php } ?>
<!-- Password: <input type="password" class="form-control" id="myInput" value="<?php echo $password; ?>" name="password_atualizada"><br> 
<input type="checkbox" onclick="myFunction()">Mostrar Password-->

<script>
function myFunction() {
    var x = document.getElementById("myInput");
    if (x.type === "password") {
        x.type = "text";
    } else {
        x.type = "password";
    }
}
</script>
<br><br><input type="submit" name="atualizar_dados" class="btn btn-primary" value="<?php echo $manage_acc[8]; ?>">
</form>
</div>
</div>
</div>
<?php 
include 'footer_office.php'; 
}
?>
