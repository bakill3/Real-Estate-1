<?php //VERIFICAR ADMIN
if (isset($_SESSION['login'])) {
    $sessao = $_SESSION['login'];
    $sql_user = "SELECT * FROM utilizadores WHERE email='$sessao'";
    $ligar_user = mysqli_query($link, $sql_user);
    $buscar_user = mysqli_fetch_assoc($ligar_user);
    $user_id = $buscar_user['id_user'];
    $foto_perf = $buscar_user['imagem'];
    $descricao_agente = $buscar_user['descricao_agente'];
    $nome = $buscar_user['nome'];
    $apelido = $buscar_user['sobrenome'];
    $genero = $buscar_user['genero'];
    $telemovel = $buscar_user['telemovel'];
    $email = $buscar_user['email']; // PREFIRO IR BUSCAR O EMAIL NA MESMA (SEI QUE É A SESSÃO)
    $id_perfil = $buscar_user['id_perfil'];
    $password = $buscar_user['password'];
    $select_perf = mysqli_query($link, "SELECT perfil FROM perfil WHERE id_perfil='$id_perfil'");
    $buscar_perfil = mysqli_fetch_assoc($select_perf);
    $estatuto = $buscar_perfil['perfil'];
}
?>