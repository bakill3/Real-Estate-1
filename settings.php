<?php
include ('header.php');
if (isset($sessao)) {
    /*
    $sessao = $_SESSION['login'];
    $sql_user = "SELECT * FROM utilizadores WHERE email='$sessao'";
    $ligar_user = mysqli_query($link, $sql_user);
    $buscar_user = mysqli_fetch_assoc($ligar_user);
    $nome = $buscar_user['nome'];
    $apelido = $buscar_user['sobrenome'];
    $genero = $buscar_user['genero'];
    $telemovel = $buscar_user['telemovel'];
    $email = $buscar_user['email']; // PREFIRO IR BUSCAR O EMAIL NA MESMA (SEI QUE É A SESSÃO)
    $id_perfil = $buscar_user['id_perfil'];
    $select_perf = mysqli_query($link, "SELECT perfil FROM perfil WHERE id_perfil='$id_perfil'");
    $buscar_perfil = mysqli_fetch_assoc($select_perf);
    $estatuto = $buscar_perfil['perfil'];
    */
?>
<br><br><br>
<center>
<h1><?php echo $manage_acc[0]; ?></h1><br>
<div class="container">
<form action="" method="POST" enctype="multipart/form-data">
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
<br><br><hr><br>
<?php 
if ($estatuto == "Administrador" || $estatuto == "Agente") {
?>
<h2><?php echo $add_imoveis[0]; ?></h2>
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
    <label><?php echo $add_imoveis[21]; ?> </label>
    <input type="file" name="files[]" multiple="multiple" required />

    <br><br><input type="submit" name="inserir_imovel" class="btn btn-primary" value="<?php echo $add_imoveis[22]; ?>">
</form>
<br><br>
<h2><?php echo $edit_imoveis[0]; ?></h2>
<center>
<table class="table table-bordered table-dark">
    <thead>
        <tr>
            <td><?php echo $edit_imoveis[1]; ?></td>
            <td><?php echo $edit_imoveis[2]; ?></td>
            <td><?php echo $edit_imoveis[3]; ?></td>
            <td><?php echo $edit_imoveis[4]; ?></td>
            <td><?php echo $edit_imoveis[5]; ?></td>
        </tr>
    </thead>
    <tbody>
        
            <?php
            $buscar_prod_agente = mysqli_query($link, "SELECT * FROM propriedades WHERE id_user='$user_id'");
            $contar_imoveis = mysqli_num_rows($buscar_prod_agente);
            if ($contar_imoveis > 0) {
                while ($agente_imo_info = mysqli_fetch_array($buscar_prod_agente)) {
                    
                    $titulo_ag = htmlspecialchars($agente_imo_info['titulo']);
                    $id_prop = htmlspecialchars($agente_imo_info['id_propriedade']);
                    $tipo_propriedade_ag = htmlspecialchars($agente_imo_info['tipo_propriedade']);
                    $sql_gal = mysqli_query($link, "SELECT * FROM galeria WHERE id_propriedade='$id_prop'");
                    $gal_ass = mysqli_fetch_assoc($sql_gal);
                    $imagem_ag = $gal_ass['foto_url'];
                    

            ?>
            <tr>
            <td><img src="<?php echo $imagem_ag; ?>" width="180"></td>
            <td><?php echo $titulo_ag; ?></td>
            <td><?php echo $tipo_propriedade_ag; ?></td>
            <td><a href="edita_produto.php?id=<?php echo $id_prop; ?>" class="btn btn-info"><?php echo $edit_imoveis[4]; ?></a></td>
            <td><a href="apaga_produto.php?id=<?php echo $id_prop; ?>" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a></td>
            </tr>
            <?php
                }
            }
            ?>
        
    </tbody>
</table>
<?php
} 
if($estatuto == "Administrador") { 
if (isset($_GET['adicionar_agente'])) {
    $agente_add = mysqli_real_escape_string($link, $_GET['adicionar_agente']);
    mysqli_query($link, "UPDATE utilizadores SET id_perfil=(SELECT id_perfil FROM perfil WHERE id_perfil='2') WHERE id_user='$agente_add'");
    echo "<script>window.location.href='settings.php'</script>";
}
if (isset($_GET['adicionar_admin'])) {
    $admin_add = mysqli_real_escape_string($link, $_GET['adicionar_admin']);
    mysqli_query($link, "UPDATE utilizadores SET id_perfil=(SELECT id_perfil FROM perfil WHERE id_perfil='3') WHERE id_user='$admin_add'");
    echo "<script>window.location.href='settings.php'</script>";
}
if (isset($_GET['eliminar_user'])) {
    $user_del = mysqli_real_escape_string($link, $_GET['eliminar_user']);
    mysqli_query($link, "DELETE FROM utilizadores WHERE id_user='$user_del'");
    echo "<script>window.location.href='settings.php'</script>";
}
?>
<br><br><br><br>
<h2><?php echo $users_edit[0]; ?></h2><br>
<table class="table table-bordered table-dark">
<thead>
<tr>
    <td><?php echo $users_edit[1]; ?></td>
    <td><?php echo $users_edit[2]; ?></td>
    <td><?php echo $users_edit[3]; ?></td>
    <td><?php echo $users_edit[4]; ?></td>
    <td><?php echo $users_edit[5]; ?></td>
    <td><?php echo $users_edit[6]; ?></td>
    <td><?php echo $users_edit[7]; ?></td>
    <td><?php echo $users_edit[8]; ?></td>
</tr>
</thead>
<tbody>
<?php
$select_todos_users = mysqli_query($link, "SELECT * FROM utilizadores");
$conta_users = mysqli_num_rows($select_todos_users);
if ($conta_users > 0) {
    while ($loop_users = mysqli_fetch_array($select_todos_users)) {
        $id_busc = htmlspecialchars($loop_users['id_user']);
        $nome_busc = htmlspecialchars($loop_users['nome']);
        $sobrenome_busc = htmlspecialchars($loop_users['sobrenome']);
        $email_busc = htmlspecialchars($loop_users['email']);
        $telemovel_busc = htmlspecialchars($loop_users['telemovel']);
        $estatuto_busc = htmlspecialchars($loop_users['id_perfil']);
        if ($estatuto_busc == 1) {

        }
?>

    <tr>
        <td><?php echo $nome_busc ; ?></td>
        <td><?php echo $sobrenome_busc ; ?></td>
        <td><?php echo $email_busc ; ?></td>
        <td><?php echo $telemovel_busc ; ?></td>
        <td><?php echo $estatuto_busc ; ?></td>
        <td><center><?php if($estatuto_busc == 2) { echo $users_edit[9]; } else { ?><a href="settings.php?adicionar_agente=<?php echo $id_busc; ?>" class="btn btn-primary"><i class="far fa-address-card"></i></button></a><?php } ?></center></td>
        <td><center><?php if($estatuto_busc == 3) { echo $users_edit[9]; } else { ?><a href="settings.php?adicionar_admin=<?php echo $id_busc; ?>" class="btn btn-primary"><i class="fas fa-address-card"></i></button></a><?php } ?></center></td>
        <td><center><?php if($estatuto_busc == 2) { echo $users_edit[9]; } else { ?><a href="settings.php?eliminar_user=<?php echo $id_busc; ?>" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a><?php } ?></center></td>
    </tr>

<?php
    }
}
?>
</tbody>
</table>
<?php
} //SE ELE FOR ADMIN
?>
</center>
<br><br><br>
</center>
<?php
} else {
    echo "<script>window.location.href='index.php';</script>";
}
include ('footer.php');
?>