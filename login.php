<?php
session_start();
include('header.php'); ?>
<?php
if (isset($_POST['login_btn'])) {
  $email = mysqli_real_escape_string($link, $_POST['email']);
  $password = mysqli_real_escape_string($link, $_POST['password']);

  if (empty($email) || empty($password)) {
    $erro = "Preencha todos os dados";
  } else {
    $sql_login = "SELECT * FROM utilizadores WHERE email='$email'";
    $sql_login_ligar = mysqli_query($link, $sql_login);
    $busca_dt = mysqli_fetch_assoc($sql_login_ligar);
    $pass_db = $busca_dt['password'];
    if (mysqli_num_rows($sql_login_ligar) == 1 && password_verify($password, $pass_db)) {
      $_SESSION['login'] = $email;
      // echo $_SESSION['login'];
      echo "<script>window.location.href='index.php'</script>";
    } else {
      $erro = "Email/Password Incorretos";
    }
  }
}
if (isset($_SESSION['login'])) {
  echo $_SESSION['login'];
}
//session_destroy();
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
<h2>Login</h2>
<form action="" method="POST">
    <div class="form-group">
      <div class="col-3">
      <input type="email" class="form-control" placeholder="Email" name="email">
      </div>
    </div>
    <div class="form-group">
      <div class="col-3">
      <input type="password" class="form-control" placeholder="Password" name="password">
      </div>
    </div>
    <div class="form-group">
        <input type="submit" name="login_btn" class="btn btn-success btn-lg">
    </div>

</form>
<br>
<br><br>
</center>
<?php include('footer.php'); ?>
