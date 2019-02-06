<?
$h1         = 'Contato';
$title      = 'Contato';
$desc       = 'Entre em contato e envie sua mensagem pelo formulário e logo entraremos em contato. Qualquer dúvida estamos a disposição pelo email ou telefone';
$key        = 'uuuuuuuuuu, jjjjjjjjjjjj, lllllllllll';
$var        = 'Contato';
include('inc/head.php');
?>
<!--Google ReCaptcha V2 - PRECISA?-->


</head>

<body>
	<?include('inc/header-menu2.php') ?>

	<main>
		<!-- <?=$breadcrumbEstilo?> -->
		<section class="container pt-3 pb-4">
			<?=$breadcrumb?>			
			<h1 class="my-3"><?=$h1?></h1>
			<!-- Map Cleanup -->
			<?php
			$mapa = str_replace("<iframe src=\"", "", $mapa);
			$mapa = str_replace("\" width=\"600\" height=\"450\" frameborder=\"0\" style=\"border:0\" allowfullscreen></iframe>", "", $mapa);
			?>
			<!-- End Map Cleanup -->
			<article>
				<h3 class="my-3 pb-5">Entre em contato conosco</h3>

				<?php
						if ($_POST)
						{
							//Carrega as classes do PHPMailer
							include("phpmailer/class.phpmailer.php");
							include("phpmailer/class.smtp.php");
							
							//envia o e-mail para o visitante do site
							$mailDestino = $_POST['txtEmail'];
								$nome = $_POST['txtNome'];
							$mensagem = "Obrigado pelo seu contato, $nome !";
							$assunto = "Obrigado pelo seu contato!";
							include("./envio.php");
							
							//envia o e-mail para o administrador do site
							$mailDestino = 'xxxxxxxxxx@gmail.com';
								$nome = 'xxxxxxxxxxx';
							$assunto = "Mensagem recebida do site";
							$mensagem = "Recebemos uma mensagem no site <br/>
										<strong>Nome:</strong> $_POST[txtNome]<br/>
										<strong>e-mail:</strong> $_POST[txtEmail]<br/>
										<strong>mensagem:</strong> $_POST[txtMensagem]";
							include("envio.php");
							
							echo "Mensagem enviada!";
							
						}
				?>

				<div class="row">
					
					<div class="col-md-6 px-4">


						<!-- <form action="" class="needs-validation" novalidade>
							<div class="form-row">
								<div class="form-group col-md">
									<label for="name">Nome</label>
									<input type="text" class="form-control" id="name" placeholder="Nome" required>
									<div class="invalid-feedback">Informe seu nome</div>
								</div>
							</div>
							
							<div class="form-row">
								<div class="form-group col-md">
									<label for="email">E-mail</label>
									<input type="email" class="form-control" id="email" placeholder="E-mail" required>
									<div class="invalid-feedback">Informe seu e-mail</div>
								</div>
								<div class="form-group col-md">
									<label for="fone">Telefone</label>
									<input type="number" class="form-control" id="fone" placeholder="Telefone" required>
									<div class="invalid-feedback">Informe seu telefon</div>
								</div>
								<div class="form-group col-md">
									<label for="cel">Celular</label>
									<input type="number" class="form-control" id="cel" placeholder="Celular" required>
									<div class="invalid-feedback">Informe seu celular</div>
								</div>
							</div>
						
							<div class="form-group">
								<label for="Endereço">Endereço</label>
								<input type="text" class="form-control" id="endereco" placeholder="Endereço" required>
								<div class="invalid-feedback">Informe seu endereço</div>
							</div>
						
							<div class="form-row">
								<div class="form-group col-md-6">
									<label for="cidade">Cidade</label>
									<input type="text" class="form-control" id="cidade" required>
									<div class="invalid-feedback">Informe sua cidade</div>
								</div>
								<div class="form-group col-md">
									<label for="estado">Estado</label>
									<input type="text" class="form-control" id="estado" required>
									<div class="invalid-feedback">Escolha o seou estado</div>
								</div>
								<div class="form-group col-md">
									<label for="cep">CEP</label>
									<input type="tnumber" class="form-control" id="cep" required>
									<div class="invalid-feedback">Informe um CEP válido	</div>
								</div>
							</div>
							<div class="form-group">
								<label for="formMensagem">Mensagem</label>
								<textarea name="mensagem" id="formMensagem" rows="6" class="form-control" required></textarea>
							</div>
						
							<button type="submit" class="btn btn-large btn-primary">Enviar</button>
						</form> -->

						<form method="POST" name="formContato">

							<label>Informe seu nome: </label>
							<input type="text" name="txtNome" placeholder="João" class="form-control" required>


							<label>Informe seu e-mail: </label>
							<input type="email" name="txtEmail" placeholder="a@a.com" class="form-control"  required>

							<label>Deixe sua mensagem: </label>
							<textarea rows="6"  class="form-control" name="txtMensagem"></textarea>
							
							<br>

							<div style="text-align:center">
								<button type="submit" class="btn btn-default btn-lg"> Enviar Mensagem </button>
							</div>
							
						</form>


						<p class="my-4">Os campos com * são obrigatórios</p>
					</div>
					
					<div class="col-md-6 px-4">
			            <h5><?= $nomeSite . " <br> " . $slogan ?></h5>
	
			            <strong class="h6"><?= $rua . " - " . $bairro . " - " . $cidade . "-" . $UF . " - " . $cep ?></strong><br><br>
			            <strong class="h6"><?= $ddd . " " . $fone ?></strong>
			            
			            <?php
				            if (isset($fone2) && !empty($fone2)):
				            echo "/ <strong class=/h6/> $ddd $fone2 </strong>";
				            endif;
				            if (isset($fone3) && !empty($fone3)):
				            echo "/ <strong class=/h6/>$ddd $fone3</strong>";
				            endif;
			            ?>
			            <br>
	
			            <strong class="h6">Email: <?= $emailContato ?></strong><br><br>
			            <iframe src="<?=$mapa?>" height="350" style="border:0; width: 100%;"></iframe>
			        </div>

				</div>

			</article>
		</section>	
	</main>

	<?include('inc/footer.php') ?>

</body>