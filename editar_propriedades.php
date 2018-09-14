<?php 
include('codigo_main.php');
include('verifica_admin.php');
include 'header_office.php'; 
ini_set('display_errors', 'On');
error_reporting(E_ALL);
?>
                    <!-- SE RECEBER ID EDITAR X PRODUTO -->
                    <div class="col-xl-12">
                    <div class="m-portlet m-portlet--bordered-semi m-portlet--full-height ">
                        <div class="m-portlet__head">
                            <div class="m-portlet__head-caption">
                                <div class="m-portlet__head-title">
                                    <h1 class="m-portlet__head-text">
                                        <b><?php echo $add_imoveis[23]; ?></b>
                                    </h1>
                                </div>
                            </div>
                        </div>
                    <div class="m-portlet__body">

                    <?php
                    if (isset($_GET['eliminar']) && isset($_GET['id'])) {
                            $id_elim_foto = mysqli_real_escape_string($link, $_GET['eliminar']);
                            $prod_id = mysqli_real_escape_string($link, $_GET['id']);
                            //VALIDAÇÃO ----------------------------------------------------------------------------------
                            $gal_sql = mysqli_query($link, "SELECT * FROM galeria WHERE id_propriedade='$prod_id'");
                            $cont_galeria = mysqli_num_rows($gal_sql);
                            if ($cont_galeria > 0) {
                                while ($get_galeria = mysqli_fetch_array($gal_sql)) {
                                    $foto_url = $get_galeria['foto_url'];
                                    $id_foto = $get_galeria['id_foto'];

                                    if ($id_elim_foto == $id_foto) {
                                        mysqli_query($link, "DELETE FROM galeria WHERE id_foto='$id_elim_foto'");
                                    } 
                                }
                            }
                            //--------------------------------------------------------------------------------------------
                            
                        }
                    if (isset($_POST['atualizar_imovel'])) {
                        //echo '<pre>';
                        //die(var_dump($_POST));
                            //TABELA PROPRIEDADES 
                            $id_pro = mysqli_real_escape_string($link, $_POST['prod_p_id']);
                            $titulo = mysqli_real_escape_string($link, $_POST['titulo']);
                            $descricao = mysqli_real_escape_string($link, $_POST['descricao']);
                            $preco_eur = mysqli_real_escape_string($link, $_POST['preco']);
                            $preco_usd = mysqli_real_escape_string($link, $_POST['preco_usd']);
                            $n_quartos = mysqli_real_escape_string($link, $_POST['n_quartos']);
                            $n_wc = mysqli_real_escape_string($link, $_POST['n_casas_de_banho']);
                            $area_casa = mysqli_real_escape_string($link, $_POST['area_da_casa']);
                            $area_total = mysqli_real_escape_string($link, $_POST['area_total']);
                            $plot_area = mysqli_real_escape_string($link, $_POST['plot_area']);
                            $plot_area_sqf = mysqli_real_escape_string($link, $_POST['plot_area_sqf']);
                            $ano_construcao = mysqli_real_escape_string($link, $_POST['ano_construcao']);
                            $tipo_propriedade = mysqli_real_escape_string($link, $_POST['tipo_propriedade']);
                            $descricao_negocio = mysqli_real_escape_string($link, $_POST['descricao_negocio']);
                            
                            

                            
                            //-----------------------------------------------



                            //TABELA LOCALIZACAO
                            $pais = $_POST['pais'];
                            $distrito = $_POST['distrito'];
                            $cidade = $_POST['cidade'];
                            $zona = $_POST['zona'];
                            $latitude = $_POST['latitude'];
                            $longitude = $_POST['longitude'];

                            //-----------------------------------------------
                            if (!empty($titulo) && !empty($descricao) && !empty($preco_eur) && !empty($preco_usd) && !empty($tipo_propriedade) && !empty($descricao_negocio) && !empty($pais) && !empty($distrito) && !empty($cidade)) {
                                
                                    $query = "UPDATE propriedades SET preco='$preco_eur', preco_usd='$preco_usd', tipo_propriedade='$tipo_propriedade', descricao_negocio='$descricao_negocio', n_quartos='$n_quartos', n_casas_de_banho='$n_wc', area_da_casa='$area_casa', area_total='$area_total', titulo='$titulo', descricao='$descricao', ano_contrucao='$ano_construcao', plot_area='$plot_area', plot_area_SQF='$plot_area_sqf' WHERE id_propriedade='$id_pro'";
                                    mysqli_query($link, $query) or die(mysqli_error($link));

                                    $sql_insert_localizacao = "UPDATE localizacao SET id_propriedade=(SELECT id_propriedade FROM propriedades WHERE id_propriedade='$id_pro' LIMIT 1), pais='$pais', distrito='$distrito', cidade='$cidade', zona='$zona', latitude='latitude', longitude='longitude' WHERE id_propriedade=(SELECT id_propriedade FROM propriedades WHERE id_propriedade='$id_pro' LIMIT 1)";
                                    mysqli_query($link, $sql_insert_localizacao);



                                    		if(isset($_POST['feats'])) {
                                        		$feats = $_POST['feats'];
	                                        	mysqli_query($link, "DELETE FROM feature_con WHERE id_propriedade='$id_pro'");

	                                        	foreach ($feats as $feat) {
	                                        			//mysqli_query($link, "INSERT INTO feature_con (id_feature, id_propriedade) VALUES ('10,'3')");
		                                                mysqli_query($link, "INSERT INTO feature_con(id_feature, id_propriedade) VALUES ('$feat', '$id_pro')") or die(mysqli_error($link));    
		                                                    
		                                        }
		                                    }

                                            if(isset($_POST['feat_check']) && !empty($_POST['feat_text'])) {
                                                    $feat_check = $_POST['feat_check'];
                                                    $feat_text = $_POST['feat_text'];

                                                    foreach ($feat_text as $texto) {
                                                        $verf = mysqli_query($link, "SELECT * FROM feature WHERE BINARY feature_type='$texto'");
                                                        if (mysqli_num_rows($verf) == 0) {
                                                            mysqli_query($link, "INSERT INTO feature(feature_type) values('$texto')");
                                                            mysqli_query($link, "INSERT INTO feature_con(id_feature, id_propriedade) values((SELECT id_feature FROM feature WHERE BINARY feature_type='$texto'), (SELECT id_propriedade FROM propriedades WHERE id_propriedade='$id_pro'))");
                                                        } 
                                                    }
                                                }


                                

                                        	if(isset($_POST['chaves'])) {
                                        		$chaves = $_POST['chaves'];
	                                        	mysqli_query($link, "DELETE FROM keywords WHERE id_propriedade='$id_pro'");

	                                        	foreach ($chaves as $keyword) {
		                                                    mysqli_query($link, "INSERT INTO keywords(keyword_id, id_propriedade) VALUES ('$keyword', (SELECT id_propriedade FROM propriedades WHERE id_propriedade='$id_pro'))");    
		                                                    
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
                                            $sql_galeria = "INSERT INTO galeria (id_propriedade, foto_url) VALUES ((SELECT id_propriedade FROM propriedades WHERE id_propriedade='$id_pro' LIMIT 1), '$link_foto');";
                                            mysqli_query($link, $sql_galeria) or die(mysqli_error($link));
                                    }

                                    
                                    //echo "<script>window.location.href='editar_propriedades.php';</script>";

                            }
                        } //61


                    if(isset($_POST['apagar_imovel_btn'])) {
                        $prod_id = mysqli_real_escape_string($link, $_POST['prod_id']);
                        mysqli_query($link, "DELETE FROM products WHERE id='$id_product' LIMIT 1");
                       mysqli_query($link, "DELETE FROM propriedades WHERE id_propriedade='$prod_id';");
                        mysqli_query($link, "DELETE FROM localizacao WHERE id_propriedade='$prod_id';");
                        echo "<script>window.location.href='editar_propriedades.php';</script>";
                    }
                    if(isset($_POST['editar_imovel_btn'])) {

                        $prod_id = mysqli_real_escape_string($link, $_POST['prod_id']);
                        //VALIDAÇÃO/SEGURANÇA
                        $buscar_info_prod = mysqli_query($link, "SELECT * FROM propriedades WHERE id_propriedade='$prod_id'");
                        $linha = mysqli_fetch_assoc($buscar_info_prod);
                        $usr_id_db = $linha['id_user'];
                        //LOCALIZACAO
                        $buscar_info_loc = mysqli_query($link, "SELECT * FROM localizacao WHERE id_propriedade='$prod_id'");
                        $linha_loc = mysqli_fetch_assoc($buscar_info_loc);
                        //KEYWORDS 
                        $ligar_keywords = mysqli_query($link, "SELECT * FROM keyword_text");


                        //-------------------
                        //$user_id no header representa o id do utilizador
                        if ($estatuto == "Agente") {
                            $user_id = $_SESSION['user_info'][4];
                            if ($user_id != $usr_id_db) {
                                echo "<script>window.location.href='editar_propriedades.php';</script>";
                            } 
                        } elseif($estatuto == "Administrador") {
                            $prod_id = mysqli_real_escape_string($link, $_POST['prod_id']);
                            $buscar_info_loc = mysqli_query($link, "SELECT * FROM localizacao WHERE id_propriedade='$prod_id'");
                            $linha_loc = mysqli_fetch_assoc($buscar_info_loc);
                            $buscar_info_prod = mysqli_query($link, "SELECT * FROM propriedades WHERE id_propriedade='$prod_id'");
                            $linha = mysqli_fetch_assoc($buscar_info_prod);
                        }
                        $titulo = $linha['titulo'];
                        $descricao = $linha['descricao'];
                        $preco_eur = $linha['preco'];
                        $preco_usd = $linha['preco_usd'];
                        $n_quartos = $linha['n_quartos'];
                        $n_wc = $linha['n_casas_de_banho'];
                        $area_casa = $linha['area_da_casa'];
                        $area_total = $linha['area_total'];
                        $plot_area = $linha['plot_area'];
                        $plot_area_sqf = $linha['plot_area_SQF'];
                        $ano_construcao = $linha['ano_contrucao'];
                        $tipo_propriedade = $linha['tipo_propriedade'];
                        $descricao_negocio = $linha['descricao_negocio'];

                        //LOC
                        $pais = $linha_loc['pais'];
                        $distrito = $linha_loc['distrito'];
                        $cidade = $linha_loc['cidade'];
                        $zona = $linha_loc['zona'];
                        $lat = $linha_loc['latitude'];
                        $long = $linha_loc['longitude'];


                        // ATUALIZAR OS DADOS DO IMOVEL

                        




            ?>
            <br>
	            
            <form action="editar_propriedades.php" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="prod_p_id" value="<?php echo $prod_id; ?>">
                <?php echo $add_imoveis[1]; ?> <input type="text" class="form-control" name="titulo" value="<?php echo $titulo; ?>" required><br>
                <?php echo $add_imoveis[2]; ?> <textarea class="form-control" name="descricao" rows="3" required><?php echo $descricao; ?></textarea><br>
                <?php echo $add_imoveis[3]; ?> <input type="number" class="form-control" name="preco" value="<?php echo $preco_eur; ?>" required><br>
                <?php echo $add_imoveis[4]; ?> <input type="text" class="form-control" name="preco_usd" value="<?php echo $preco_usd; ?>"><br>
                <?php echo $add_imoveis[5]; ?> <input type="number" max="10" class="form-control" name="n_quartos" value="<?php echo $n_quartos; ?>" required><br>
                <?php echo $add_imoveis[6]; ?> <input type="number" class="form-control" name="n_casas_de_banho" value="<?php echo $n_wc; ?>" required><br>
                <?php echo $add_imoveis[7]; ?> <input type="number" class="form-control" name="area_da_casa" value="<?php echo $area_casa; ?>" required><br>
                <?php echo $add_imoveis[8]; ?> <input type="number" class="form-control" name="area_total" value="<?php echo $area_total; ?>" required><br>
                <?php echo $add_imoveis[9]; ?> <input type="number" class="form-control" name="plot_area" value="<?php echo $plot_area; ?>" required><br>
                <?php echo $add_imoveis[10]; ?> <input type="number" class="form-control" name="plot_area_sqf" value="<?php echo $plot_area_sqf; ?>" required><br>
                <?php echo $add_imoveis[11]; ?> <input type="number" class="form-control" name="ano_construcao" value="<?php echo $ano_construcao; ?>" required><br>
                <!-- LOCALIZAÇÃO -->
                <?php echo $add_imoveis[12]; ?> <input type="text" class="form-control" min="1930" max="2018" name="pais" value="<?php echo $pais; ?>" required><br>
                <?php echo $add_imoveis[13]; ?> <input type="text" class="form-control" name="distrito" value="<?php echo $distrito; ?>" required><br>
                <?php echo $add_imoveis[14]; ?> <input type="text" class="form-control" name="cidade" value="<?php echo $cidade; ?>" required><br>
                <?php echo $add_imoveis[15]; ?> <input type="text" class="form-control" name="zona" value="<?php echo $zona; ?>" required><br>
                <?php echo $add_imoveis[16]; ?> <input type="number" class="form-control" name="latitude" value="<?php echo $long; ?>" required><br>
                <?php echo $add_imoveis[17]; ?> <input type="number" class="form-control" name="longitude" value="<?php echo $lat; ?>"required><br>
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
                <br><br>
                <!-- CHECKBOCK'S (FEATURES E KEYWORDS) -->
                   <table class="table table-bordered m-table m-table--border-brand m-table--head-bg-brand" style="width: 20%;" id="feat_add">
                	
					                	<thead class="table-primary">
					                		<th>Feature</th>
					                		<th>Selecionar</th>
					                	</thead>
                    <tbody>
					<?php 
					$sql_ft = mysqli_query($link, "SELECT * FROM feature");
					$ft_count = mysqli_num_rows($sql_ft);
					    if ($ft_count > 0) {
					        while ($features = mysqli_fetch_array($sql_ft)) {
					        	$feat_id = $features['id_feature'];
					        	$feature = $features['feature_type'];
					        	$buscar_feat_prop = mysqli_query($link, "SELECT * FROM feature_con WHERE id_propriedade='$prod_id' AND id_feature='$feat_id'");
					        	$info_prop_feat = mysqli_fetch_assoc($buscar_feat_prop);
					        	$id_feat_prop = $info_prop_feat['id_feature'];
						                ?>
						                
						                	<tr>
						                		<td>
						                			<?php echo $feature; ?>
						                		</td>
						                		<td><input type="checkbox" name="feats[]" value="<?php echo $feat_id; ?>" <?php if(isset($id_feat_prop) && $id_feat_prop == $feat_id) { ?> checked <?php } ?> ></td>
						               		</tr>
						                
						                <?php
						            	}
						           } 
						                ?>
                                        </tbody>
						            </table>
                                     <button type="button" id="add">Adicionar Feature</button>

                                            <script>
                                            /* FUNÇÂO ADICIONAR ROW/ ELEMENTOS HTML */
                                            var addNewRow = function(e) {
                                            /* IDENTIFICAR A tabela */
                                                var tableBody = document.getElementById("feat_add").children[1]
                                                /* CRIAR ELEMENTO TR EM VAR */
                                                var tr = document.createElement("tr")
                                                /* CRIAR ELEMENTO TD EM VAR */
                                                var tdChave = document.createElement("td")
                                                /* CRIAR ELEMENTO TD EM VAR */
                                                var tdCheck = document.createElement("td")
                                                /* CRIAR ELEMENTO INPUT EM VAR */
                                                var chaveInput = document.createElement("input")
                                                /* CRIAR ELEMENTO INPUT EM VAR */
                                                var checkInput = document.createElement("input")
                                                /* ATRIBUIR ATRIBUTOS AOS ELEMENTOS CRIADOS */
                                                chaveInput.setAttribute('name', 'feat_text[]')

                                                chaveInput.setAttribute('type', 'text')

                                                checkInput.setAttribute('name', 'feat_check[]')

                                                checkInput.setAttribute('type', 'checkbox')    

                                                /* APPEND/JUNTAR */        

                                                tdChave.appendChild(chaveInput)

                                                tdCheck.appendChild(checkInput)
                                                
                                                tr.appendChild(tdChave)

                                                tr.appendChild(tdCheck)

                                                tableBody.appendChild(tr)
                                            }

                                            document.getElementById("add").addEventListener('click', addNewRow);
                                        </script>
                                            
                <!-- -->
                
                <table class="table table-bordered m-table m-table--border-brand m-table--head-bg-brand"style="width: 20%;">
                	
                	<thead class="table-warning">
                		<th>Palavra-Chave</th>
                		<th>Selecionar</th>
                	</thead>
                <tbody>
                <?php
                // $ligar_keywords = mysqli_query($link, "SELECT * FROM keywords WHERE id_propriedade='$prod_id'");
                if (mysqli_num_rows($ligar_keywords) > 0) {
                    $guarda_keyword = array();
                    while($key_info = mysqli_fetch_array($ligar_keywords)) {
                        $keyword = $key_info['keyword'];
                        $id_keyword = $key_info['keyword_id'];
                        // $guarda_keyword[$x] = $keyword_id;
                        //$selecionar_key = mysqli_query($link, "SELECT keyword FROM keyword_text WHERE keyword_id='$keyword_id'");
                        $selecionar_key = mysqli_query($link, "SELECT * FROM keywords WHERE keyword_id='$id_keyword' AND id_propriedade='$prod_id'");
                            $fetch_key = mysqli_fetch_assoc($selecionar_key);
                            $id_prop_key = $fetch_key['id_propriedade'];
                            //if ($id_prop_key == $prod_id) 
                            //}
                        //$fetch_key = mysqli_fetch_assoc($selecionar_key);
                        //$id_prop_key = $fetch_key['id_propriedade'];
                        
                ?>
                
                	<tr>
                		<td><?php echo $keyword; ?></td>
                		<td><input type="checkbox" name="chaves[]" value="<?php echo $id_keyword; ?>" <?php if(isset($id_prop_key) && $id_prop_key == $prod_id) { ?> checked <?php } ?> ></td>
                	</tr>
                
                
                

                
                <?php
                    }

                }
                ?>
                </tbody>
                </table>
               


                
                <br>
                <table class="table table-bordered table-dark table-responsive" style="width: 50%; display: inline-block;">
                    <thead>
                        <tr>
                            <td colspan="100"><?php echo $add_imoveis[24]; ?></td>
                        </tr>
                    </thead>
                    <tbody>
                    <tr>
                    <?php 
                    $gal_sql = mysqli_query($link, "SELECT * FROM galeria WHERE id_propriedade='$prod_id'");
                    $cont_galeria = mysqli_num_rows($gal_sql);
                    if ($cont_galeria > 0) {
                        while ($get_galeria = mysqli_fetch_array($gal_sql)) {
                            $foto_url = $get_galeria['foto_url'];
                            $id_foto = $get_galeria['id_foto'];
                    ?>
                    
                        <td><img src="<?php echo $foto_url; ?>" width="180"></td>
                        <td><a href="editar_propriedades.php?id=<?php echo $prod_id; ?>&eliminar=<?php echo $id_foto; ?>" class="btn btn-danger"><i class="fas fa-trash-alt"></i></span></a></td>
                    
                    <?php
                        }
                        
                    }
                    ?>

                    </tr>
                </tbody>    
                </table>
                
                <label><?php echo $add_imoveis[21]; ?></label>
                <input type="file" name="files[]" multiple="multiple" />
                <br><a href="editar_propriedades.php" class="btn btn-info">Voltar</a>
                <br><br><input type="submit" name="atualizar_imovel" class="btn btn-primary" value="<?php echo $add_imoveis[25]; ?>">
            </form>
            </center><br><br>
            </div>
                </div>
            </div>
            <?php } else { ?>
                    
                    <h2><?php echo $edit_imoveis[0]; ?></h2>
                    
                    <table class="table table-bordered table-dark">
                        <thead>
                            <tr>
                                <td><?= $edit_imoveis[1]; ?></td>
                                <td><?php echo $edit_imoveis[2]; ?></td>
                                <td><?php echo $edit_imoveis[3]; ?></td>
                                <td><?php echo $edit_imoveis[4]; ?></td>
                                <td><?php echo $edit_imoveis[5]; ?></td>
                            </tr>
                        </thead>
                        <tbody>
                            
                                <?php
                                if ($estatuto == "Administrador") {
                                    $buscar_prod_sql = "SELECT * FROM propriedades";
                                } elseif ($estatuto == "Agente") {
                                    $buscar_prod_sql = "SELECT * FROM propriedades WHERE id_user='$user_id'";
                                }
                                $buscar_prod_agente = mysqli_query($link, $buscar_prod_sql);
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
                                <form action="editar_propriedades.php" method="POST">
                                    <input type="hidden" name="prod_id" value="<?php echo $id_prop; ?>">
                                <td><button type="submit" name="editar_imovel_btn" class="btn btn-info"><?php echo $edit_imoveis[4]; ?></button></td>
                                <td><button type="submit" name="apagar_imovel_btn" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button></td>
                                </form>
                                </tr>
                                <?php
                                    }
                                }
                                ?>
                            
                        </tbody>
                        </center>
                    </table>
                    </div>
                </div>
            </div>


        
            <?php } ?>
<?php
include 'footer_office.php';
?>