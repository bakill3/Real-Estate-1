<?php
include('codigo_main.php');
include('verifica_admin.php');
if (isset($_SESSION['login']) && $estatuto == "Administrador" || $estatuto == "Agente") {
include 'header_office.php'; 
?>
<div style="text-align: center;">
<div class="m-portlet m-portlet--creative m-portlet--bordered-semi">
									<div class="m-portlet__head">
										<div class="m-portlet__head-caption">
											<div class="m-portlet__head-title">
												<span class="m-portlet__head-icon m--hide">
													<i class="flaticon-statistics"></i>
												</span>
												<h2 class="m-portlet__head-text">
													<b>Bem-vindo <?= $estatuto; ?> <?php echo $_SESSION['user_info'][0] . " " . $_SESSION['user_info'][1] ?></b>
												</h3>
												<h1 class="m-portlet__head-label m-portlet__head-label--warning">
													<span>
														Painel de Administração
													</span>
												</h1>
											</div>
										</div>
										<?php /*
										<div class="m-portlet__head-tools">
											<ul class="m-portlet__nav">
												<li class="m-portlet__nav-item">
													<a href="" class="m-portlet__nav-link m-portlet__nav-link--icon">
														<i class="la la-cloud-upload"></i>
													</a>
												</li>
												<li class="m-portlet__nav-item">
													<a href="" class="m-portlet__nav-link m-portlet__nav-link--icon">
														<i class="la la-cog"></i>
													</a>
												</li>
												<li class="m-portlet__nav-item">
													<a href="" class="m-portlet__nav-link m-portlet__nav-link--icon">
														<i class="la la-share-alt-square"></i>
													</a>
												</li>
											</ul>
										</div>
										*/ ?>
									</div>
									<div class="m-portlet__body">
										<div align="left">
											
										<a href="adicionar_propriedade.php"><button type="button" class="btn m-btn--pill m-btn--air m-btn m-btn--gradient-from-info m-btn--gradient-to-accent btn-lg">Adicionar Propriedade</button></a>
										<a href="editar_propriedades.php"><button type="button" class="btn m-btn--pill m-btn--air         btn-primary btn-lg">Editar Propriedades</button></a>
										<hr>
										<a href="editar_perfil.php"><button type="button" class="btn m-btn--pill m-btn--air         btn-success m-btn--wide btn-lg">Editar Perfil</button></a>
										<?php if ($estatuto == "Administrador") { ?>
										<a href="editar_utilizadores.php"><button type="button" class="btn m-btn--pill m-btn--air m-btn m-btn--gradient-from-danger m-btn--gradient-to-warning btn-lg">Editar Utilizadores</button></a>
										<?php } ?>
										<br><br><br><br>
										<a href="index.php" class="btn btn-metal"><i class="fas fa-arrow-left"></i> Voltar ao site</a><br>
										</div>
									</div>
								</div>

</div>
<?php 
include 'footer_office.php'; 
}
?>
