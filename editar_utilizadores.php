<?php 
include('codigo_main.php');
include('verifica_admin.php');
if (isset($_SESSION['login']) && $estatuto == "Administrador") {
include 'header_office.php'; 
if (isset($_GET['adicionar_agente'])) {
    $agente_add = mysqli_real_escape_string($link, $_GET['adicionar_agente']);
    mysqli_query($link, "UPDATE utilizadores SET id_perfil=(SELECT id_perfil FROM perfil WHERE id_perfil='2') WHERE id_user='$agente_add'");
    echo "<script>window.location.href='editar_utilizadores.php'</script>";
}
if (isset($_GET['adicionar_admin'])) {
    $admin_add = mysqli_real_escape_string($link, $_GET['adicionar_admin']);
    mysqli_query($link, "UPDATE utilizadores SET id_perfil=(SELECT id_perfil FROM perfil WHERE id_perfil='3') WHERE id_user='$admin_add'");
    echo "<script>window.location.href='editar_utilizadores.php'</script>";
}
if (isset($_GET['eliminar_user'])) {
    $user_del = mysqli_real_escape_string($link, $_GET['eliminar_user']);
    mysqli_query($link, "DELETE FROM utilizadores WHERE id_user='$user_del'");
    echo "<script>window.location.href='editar_utilizadores.php'</script>";
}
?>
<br><br>
<h2><?php echo $users_edit[0]; ?></h2><br>

<div class="container">
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
        <td><?php if($estatuto_busc == 2) { echo $users_edit[9]; } else { ?><a href="editar_utilizadores.php?adicionar_agente=<?php echo $id_busc; ?>" class="btn btn-primary"><i class="far fa-address-card"></i></button></a><?php } ?></td>
        <td><?php if($estatuto_busc == 3) { echo $users_edit[9]; } else { ?><a href="editar_utilizadores.php?adicionar_admin=<?php echo $id_busc; ?>" class="btn btn-primary"><i class="fas fa-address-card"></i></button></a><?php } ?></td>
        <td><a href="editar_utilizadores.php?eliminar_user=<?php echo $id_busc; ?>" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a></td>

    </tr>

<?php
    }
}
?>
</tbody>
</table>
</div> <!-- CONTAINER -->

<?php
include 'footer_office.php';
}
?>