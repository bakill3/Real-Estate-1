<?php 
include ('ligar_db.php');
session_start();
include ('lang.php');
//INSERIR IMOVEL
if (isset($_POST['inserir_imovel'])) {
    //TABELA PROPRIEDADES 
    if (isset($_SESSION['login'])) {
      $sessao = $_SESSION['login'];
      $sql_user = "SELECT * FROM utilizadores WHERE email='$sessao'";
      $ligar_user = mysqli_query($link, $sql_user);
      $buscarr_user = mysqli_fetch_assoc($ligar_user);
      $user_id = $buscarr_user['id_user'];
    }

    $titulo = htmlspecialchars(mysqli_real_escape_string($link, $_POST['titulo']));
    $descricao = htmlspecialchars(mysqli_real_escape_string($link, $_POST['descricao']));
    $preco_eur = htmlspecialchars(mysqli_real_escape_string($link, $_POST['preco']));
    $preco_usd = htmlspecialchars(mysqli_real_escape_string($link, $_POST['preco_usd']));
    $n_quartos = htmlspecialchars(mysqli_real_escape_string($link, $_POST['n_quartos']));
    $n_wc = htmlspecialchars(mysqli_real_escape_string($link, $_POST['n_casas_de_banho']));
    $area_casa = htmlspecialchars(mysqli_real_escape_string($link, $_POST['area_da_casa']));
    $area_total = htmlspecialchars(mysqli_real_escape_string($link, $_POST['area_total']));
    $plot_area = htmlspecialchars(mysqli_real_escape_string($link, $_POST['plot_area']));
    $plot_area_sqf = htmlspecialchars(mysqli_real_escape_string($link, $_POST['plot_area_sqf']));
    $ano_construcao = htmlspecialchars(mysqli_real_escape_string($link, $_POST['ano_construcao']));
    $tipo_propriedade = htmlspecialchars(mysqli_real_escape_string($link, $_POST['tipo_propriedade']));
    $descricao_negocio = htmlspecialchars(mysqli_real_escape_string($link, $_POST['descricao_negocio']));

    $digitos = 5;
    $referencia = rand(pow(10, $digitos-1), pow(10, $digitos)-1);
    //-----------------------------------------------

    //TABELA FEATURE
    $feature_type = htmlspecialchars($_POST['feature_type']);
    //-----------------------------------------------

    //TABELA LOCALIZACAO
    $pais = htmlspecialchars($_POST['pais']);
    $distrito = htmlspecialchars($_POST['distrito']);
    $cidade = htmlspecialchars($_POST['cidade']);
    $zona = htmlspecialchars($_POST['zona']);
    $latitude = htmlspecialchars($_POST['latitude']);
    $longitude = htmlspecialchars($_POST['longitude']);

    //-----------------------------------------------
    if (!empty($titulo) && !empty($descricao) && !empty($preco_eur) && !empty($preco_usd) && !empty($tipo_propriedade) && !empty($descricao_negocio) && !empty($feature_type) && !empty($pais) && !empty($distrito) && !empty($cidade)) {
    /* if (!empty($titulo) && !empty($descricao) && !empty($preco_eur) && !empty($preco_usd) && !empty($n_quartos) && !empty($n_wc) && !empty($area_casa) && !empty($area_total) && !empty($plot_area) && !empty($plot_area_sqf) && !empty($ano_construcao) && !empty($tipo_propriedade) && !empty($descricao_negocio) && !empty($feature_type) && !empty($pais) && !empty($distrito) && !empty($cidade) && !empty($zona) && !empty($latitude) && !empty($longitude)) {
      */
        


        $query = "INSERT INTO propriedades (referencia, preco, preco_usd, 
        tipo_propriedade, descricao_negocio, n_quartos, n_casas_de_banho, area_da_casa, 
        area_total, titulo, descricao, ano_contrucao, plot_area, plot_area_SQF,id_feature, id_user) VALUES ('$referencia', '$preco_eur', '$preco_usd', '$tipo_propriedade', '$descricao_negocio', '$n_quartos', '$n_wc', '$area_casa', '$area_total', '$titulo', '$descricao', '$ano_contrucao', '$plot_area', '$plot_area_SQF', (SELECT id_feature FROM feature WHERE feature_type='$feature_type'), '$user_id')";
        mysqli_query($link, $query) or die(mysqli_error($link));

        $sql_insert_localizacao = "INSERT INTO localizacao (id_propriedade, pais, distrito, cidade, zona, latitude, longitude) VALUES ((SELECT id_propriedade FROM propriedades WHERE referencia='$referencia' LIMIT 1), '$pais', '$distrito', '$cidade', '$zona', '$latitude', '$longitude');";
        mysqli_query($link, $sql_insert_localizacao);

        if (!empty($_POST['chaves'])) {
          foreach($_POST['chaves'] as $chaves){
            mysqli_query($link, "INSERT INTO keywords(keyword_id, id_propriedade) VALUES ('$chaves', (SELECT id_propriedade FROM propriedades WHERE referencia='$referencia'))");
          }
        }


         //----------------------
		foreach($_FILES["files"]["tmp_name"] as $key=>$tmp_name) {
			    $temp = $_FILES["files"]["tmp_name"][$key];
			    $name = $_FILES["files"]["name"][$key];
			     
			    if(empty($temp)) {
			        break;
			    }
			     
			    move_uploaded_file($temp,"imoveis/".$name);
			    $link_foto = "imoveis/".$name;
			    $sql_galeria = "INSERT INTO galeria (id_propriedade, foto_url) VALUES ((SELECT id_propriedade FROM propriedades WHERE referencia='$referencia' LIMIT 1), '$link_foto');";
			    mysqli_query($link, $sql_galeria) or die(mysqli_error($link));
		}

        
        header('location: editar_propriedades.php');

    } else {
      echo "BLYAT";
    }
}





// ATUALIZAR INFORMAÇÕES DUTILIZADOR
/*
if (isset($_POST['atualizar_dados'])) {
    $nome_atualizado = htmlspecialchars(mysqli_real_escape_string($link, $_POST['nome_atualizado']));
    $apelido_atualizado = htmlspecialchars(mysqli_real_escape_string($link, $_POST['apelido_atualizado']));
    $genero_atualizado = htmlspecialchars(mysqli_real_escape_string($link, $_POST['genero_atualizado']));
    $movel_atualizado = htmlspecialchars(mysqli_real_escape_string($link, $_POST['movel_atualizado']));
    $email_atualizado = htmlspecialchars(mysqli_real_escape_string($link, $_POST['email_atualizado']));
    // $password_atualizada = mysqli_real_escape_string($link, $_POST['password_atualizada']);

    if (empty($nome_atualizado) || empty($apelido_atualizado) || empty($genero_atualizado) || empty($movel_atualizado) || empty($email_atualizado)) {
        echo "Preencha todos os dados";

    } else {
        if ($movel_atualizado < 9) {
            echo "O telemóvel tem de ter pelo menos 9 dígitos";
        } else {
          if (isset($_POST['descricao_agente_atualizado'])) {
            $sessao = $_SESSION['login'];
            $descricao_agente_atualizado = htmlspecialchars(mysqli_real_escape_string($link, $_POST['descricao_agente_atualizado']));
            $existe = "imoveis/perfil/".$sessao."";
            if (!is_dir($existe)) {
              mkdir($existe);
            }
            $file_name = $_FILES['file']['name'];
            $file_type = $_FILES['file']['type'];
            $file_size = $_FILES['file']['size'];
            $file_tem_loc = $_FILES['file']['tmp_name'];
            $file_store = "imoveis/perfil/".$sessao."/".$file_name;
            if (!empty($file_name)) {
              move_uploaded_file($file_tem_loc, $file_store);
              $sql_insert_update = "UPDATE utilizadores SET nome='$nome_atualizado', sobrenome='$apelido_atualizado', genero='$genero_atualizado', telemovel='$movel_atualizado', email='$email_atualizado', descricao_agente='$descricao_agente_atualizado', imagem='$file_store'";
              mysqli_query($link, $sql_insert_update) or die (mysqli_error($link));  
              header('location: settings.php');
            } else {
              $sql_insert_update = "UPDATE utilizadores SET nome='$nome_atualizado', sobrenome='$apelido_atualizado', genero='$genero_atualizado', telemovel='$movel_atualizado', email='$email_atualizado', descricao_agente='$descricao_agente_atualizado'";
              mysqli_query($link, $sql_insert_update) or die (mysqli_error($link));  
              header('location: settings.php');
            }
          } else {
            $sql_insert_update = "UPDATE utilizadores SET nome='$nome_atualizado', sobrenome='$apelido_atualizado', genero='$genero_atualizado', telemovel='$movel_atualizado', email='$email_atualizado'";
            mysqli_query($link, $sql_insert_update) or die (mysqli_error($link));  
            header('location: settings.php');
            //echo "<script>window.localtion.href='settings.php'</script>";
          }

        }
    }
}
*/



if (isset($_POST['atualizar_dados'])) {
    $nome_atualizado = htmlspecialchars(mysqli_real_escape_string($link, $_POST['nome_atualizado']));
    $apelido_atualizado = htmlspecialchars(mysqli_real_escape_string($link, $_POST['apelido_atualizado']));
    $genero_atualizado = htmlspecialchars(mysqli_real_escape_string($link, $_POST['genero_atualizado']));
    $movel_atualizado = htmlspecialchars(mysqli_real_escape_string($link, $_POST['movel_atualizado']));
    $email_atualizado = htmlspecialchars(mysqli_real_escape_string($link, $_POST['email_atualizado']));
    // $password_atualizada = mysqli_real_escape_string($link, $_POST['password_atualizada']);

    if (empty($nome_atualizado) || empty($apelido_atualizado) || empty($genero_atualizado) || empty($movel_atualizado) || empty($email_atualizado)) {
        echo "Preencha todos os dados";

    } else {
        if ($movel_atualizado < 9) {
            echo "O telemóvel tem de ter pelo menos 9 dígitos";
        } else {
          if (isset($_POST['descricao_agente_atualizado'])) {
            $sessao = $_SESSION['login'];
            $descricao_agente_atualizado = htmlspecialchars(mysqli_real_escape_string($link, $_POST['descricao_agente_atualizado']));
            $existe = "imoveis/perfil/".$sessao."";
            if (!is_dir($existe)) {
              mkdir($existe);
            }
            $file_name = $_FILES['file']['name'];
            $file_type = $_FILES['file']['type'];
            $file_size = $_FILES['file']['size'];
            $file_tem_loc = $_FILES['file']['tmp_name'];
            $file_store = "imoveis/perfil/".$sessao."/".$file_name;
            if (!empty($file_name)) {
              move_uploaded_file($file_tem_loc, $file_store);
              $sql_insert_update = "UPDATE utilizadores SET nome='$nome_atualizado', sobrenome='$apelido_atualizado', genero='$genero_atualizado', telemovel='$movel_atualizado', email='$email_atualizado', descricao_agente='$descricao_agente_atualizado', imagem='$file_store'";
              mysqli_query($link, $sql_insert_update) or die (mysqli_error($link));  
              header('location: editar_perfil.php');
            } else {
              $sql_insert_update = "UPDATE utilizadores SET nome='$nome_atualizado', sobrenome='$apelido_atualizado', genero='$genero_atualizado', telemovel='$movel_atualizado', email='$email_atualizado', descricao_agente='$descricao_agente_atualizado'";
              mysqli_query($link, $sql_insert_update) or die (mysqli_error($link));  
              header('location: editar_perfil.php');
            }
          } else {
            $sql_insert_update = "UPDATE utilizadores SET nome='$nome_atualizado', sobrenome='$apelido_atualizado', genero='$genero_atualizado', telemovel='$movel_atualizado', email='$email_atualizado'";
            mysqli_query($link, $sql_insert_update) or die (mysqli_error($link));  
            header('location: editar_perfil.php');
            //echo "<script>window.localtion.href='settings.php'</script>";
          }

        }
    }
}



//REGISTO
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
      $pass_hash = password_hash($password1, PASSWORD_DEFAULT);
      $sql_registo = "INSERT INTO utilizadores(nome, sobrenome, genero, telemovel, email, password) VALUES ('$nome', '$sobrenome', '$genero', '$telemovel', '$email', '$pass_hash')";
      mysqli_query($link, $sql_registo);
      $sucesso = "Registado com Sucesso!";
    }
  } else {
    $erro = "Preencha todos os dados!";
  }

}
//LOGIN
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
      $nome = $busca_dt['nome'];
      $sobrenome = $busca_dt['sobrenome'];
      $id_perfil = $busca_dt['id_perfil'];
      $id_user = $busca_dt['id_user'];
      $_SESSION['login'] = $email;
      $user_info = array("$nome", "$sobrenome", "$id_perfil", "$email", "$id_user");
      $_SESSION['user_info'] = $user_info;
      // echo $_SESSION['login'];
      echo "<script>window.location.href='index.php'</script>";
    } else {
      $erro = "Email/Password Incorretos";
    }
  }
}
//session_destroy();
?>