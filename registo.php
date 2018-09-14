<?php include('header.php'); ?>
<?php
if (isset($_POST['registo_btn'])) {
  $nome = mysqli_real_escape_string($link, $_POST['nome']);
  $sobrenome = mysqli_real_escape_string($link, $_POST['apelido']);
  $genero = mysqli_real_escape_string($link, $_POST['genero']);
  $telemovel = mysqli_real_escape_string($link, $_POST['movel']);
  $email = mysqli_real_escape_string($link, $_POST['email']);
  $password1 = mysqli_real_escape_string($link, $_POST['pass1']);
  $password2 = mysqli_real_escape_string($link, $_POST['pass2']);
  $len_nome = strlen($nome);
  $len_movel = strlen($telemovel);

  if (!empty($nome) && !empty($sobrenome) && !empty($genero) && !empty($telemovel) || !empty($email) || !empty($password1) || !empty($password2)) {
    if ($len_nome < 3) {
      $erro = "O seu nome não pode ter menos de 3 carateres";
    } elseif ($len_movel < 9) {
      $erro = "O seu telemóvel tem de ter pelo menos 9 digítos";
    } elseif ($password1 != $password2) {
      $erro = "As suas passwords não estão iguais";
    } else {
      $password_hash = password_hash($password1, PASSWORD_DEFAULT);
      $sql_registo = "INSERT INTO utilizadores(nome, sobrenome, genero, telemovel, email, password) VALUES ('$nome', '$sobrenome', '$genero', '$telemovel', '$email', '$password_hash')";
      mysqli_query($link, $sql_registo);
      $sucesso = "Registado com Sucesso!";
    }
  } else {
    $erro = "Preencha todos os dados!";
  }

}
?>
<br>
<br>
<center>
<?php
if(isset($erro)) {
?>
<h2 style="color:red"><?php echo $erro; ?></h2>
<?php
} if (isset($sucesso)) { ?>
<h2 style="color: green"><?php echo $sucesso; ?></h2>
<?php } ?>
<br>
<br>
<h2>Registo</h2>
<form action="" method="POST">

    <div class="form-group">
      <div class="col-3">
      <input type="text" class="form-control" placeholder="Nome" name="nome">
      </div>
    </div>
    <div class="form-group">
      <div class="col-3">
      <input type="text" class="form-control" placeholder="Apelido" name="apelido">
      </div>
    </div>
    <div class="form-group">
      <div class="col-3">
      <select class="form-control" name="genero">
        <option>Masculino</option>
        <option>Feminino</option>
      </select>
      </div>
    </div>
    <div class="form-group">
      <div class="col-3">
      <input type="number" class="form-control" placeholder="Número de Telefone" name="movel">
      </div>
    </div>
    <div class="form-group">
      <div class="col-3">
      <input type="email" class="form-control" placeholder="Email" name="email">
      </div>
    </div>
    <div class="form-group">
      <div class="col-3">
      <input type="password" class="form-control" placeholder="Password" name="pass1">
      </div>
    </div>
    <div class="form-group">
      <div class="col-3">
      <input type="password" class="form-control" placeholder="Repetir Password" name="pass2">
      </div>
    </div>
    <div class="form-group">
        <input type="submit" name="registo_btn" class="btn btn-success btn-lg">
    </div>

</form>
<br>
<br><br>
</center>
<?php include('footer.php'); ?>
