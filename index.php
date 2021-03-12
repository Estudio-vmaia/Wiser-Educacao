<!DOCTYPE HTML>
<html>
	<head>
		<title>Wiser Educação - Encurtador</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<!--[if lte IE 8]><script src="css/ie/html5shiv.js"></script><![endif]-->
		<script src="js/jquery.min.js"></script>
		<script src="js/jquery.scrolly.min.js"></script>
		<script src="js/skel.min.js"></script>
		<script src="js/init.js"></script>
		<noscript>
			<link rel="stylesheet" href="css/skel.css" />
			<link rel="stylesheet" href="css/style.css" />
			<link rel="stylesheet" href="css/style-xlarge.css" />
		</noscript>
		<!--[if lte IE 9]><link rel="stylesheet" href="css/ie/v9.css" /><![endif]-->
		<!--[if lte IE 8]><link rel="stylesheet" href="css/ie/v8.css" /><![endif]-->
	</head>

	<style type="text/css">
		.inputs{
			width: 100%;
			background-color: rgba(255, 255, 255, 0.3);
			color: #fff;
		}
		.fontBranca
		{
			color: #fff !important;
		}
		.intemtable
		{
			text-align: center;
		}
	</style>
	<body>

		<!-- Header -->
			<section id="header">
				<div class="inner">
					<span class="icon major fa-cloud"></span>
					<h1>Olá, bem vindo ao  <strong>encurtador de URL</strong><br />
					Desenvolvido por <a href="http://estudiovmaia.com.br">Renan Maia</a>.</h1>
					<p></p>
					<ul class="actions">
						<li><a href="#one" class="button scrolly">Veja omo funciona</a></li>
					</ul>
				</div>
			</section>

		<!-- One -->
			<section id="one" class="main style1">
				<div class="container">
					<div class="row 150%">
						<div class="6u 12u$(medium)" style="text-align: justify;">
							<header class="major">
								<h2>Processo para encurtar a URL</h2>
							</header>
							
							<b>- index.php</b>
							<p>Ao enviar os conteúdos contido nos <b>INPUTs</b>, o <b>AJAX</b> processa o dado e envia para o <b>PHP</b> ecurtar a URL.	
							</p>

							<b>- EncurtaURL.php</b>			
							<p>O <b>PHP</b> criar uma chave única usando a função <b>GeraURL()</b> verificando antes de este encurtamento gerado não existe na base com o <b>verificaChave()</b>.
							<br>Caso não exista ele faz a gravação na base usando o <b>save_db()</b>.</p>

							<b>- js.php</b>			
							<br>Este <b>JS</b> verifica a chamada do form com a função <b>submitform()</b> e repassando para o AJAX as informações via <b>POST</b>.							
							<br>Este arquivo também faz a validação do preenchimento e máscara dos campos utilizando <b>dateInputMask()</b> e <b>HoraInputMask()</b>.
							</p>	

						</div>
						<div class="6u$ 12u$(medium) important(medium)" style="text-align: justify;">
							<span class="image fit"><img src="images/process.jpg" alt="" /></span>

							<b>- Desencurta.php</b>			
							<br>Ao receber a variável via <b>POST</b> este arquivo consulta no banco a validade da URL e caso esteja vencido retorna com uma mensagem, caso esteja dentro prazo ele redireciona para o URL de ORIGEM.							
							</p>

							<b>- conn_db.php</b>			
							<br>Arquivo de conexão principal utilizando <b>mysqli_connect</b>.
							</p>	


						</div>
					</div>
				</div>
			</section>

		<!-- Two -->
			<section id="two" class="main style2">
				<div class="container">
					<div class="row 150%">						
						<div class="6u 12u$(medium)">
							
							<header class="major">
								<h2>Vamos ver na prática?</h2>
							</header>

							

							<form id="formURL" name="formURL" method="POST" onsubmit="return submitform()"> 
								<div class="row uniform 0%">

									<div class="12u 12u$(xsmall)">
										Inisra a URL a ser encurtada:
										<input type="text" name="url_origem" id="url_origem" value="" placeholder="URL:" required="required" />
										<br>
									</div>


									<div class="4u 4u$(xsmall)">
										Data de validade:
										<input type="text" name="valData" id="valData" placeholder="dd/mm/aaaa" maxlength="10"   required="required" />
										<br>
									</div>

									<div class="4u 4u$(xsmall)">
										Hora Limite:
										<input type="text" name="valHora" id="valHora" placeholder="00:00" maxlength="5"  required="required" />
										<br>
									</div>
								</div>

								<div class="row uniform 0%">
									Escolha a quantidade de caracteres para o encurtamento:
									<br><br>
									<div class="4u 12u$(small)">
										<input type="radio" id="5chr" value="5" name="QtdChr">
										<label for="5chr" class="fontBranca">5 Caracteres</label>
									</div>
									<div class="4u 12u$(small)">
										<input type="radio" id="8chr" value="8" name="QtdChr">
										<label for="8chr" class="fontBranca">8 Caracteres</label>
									</div>
									<div class="4u$ 12u$(small)">
										<input type="radio" id="10chr" value="10" name="QtdChr" checked>
										<label for="10chr" class="fontBranca">10 Caracteres</label>
										<br><br>
									</div>
									
									
									<div class="12u$">
										<ul class="actions" style="text-align: center;">
											<li><input type="submit" value="Encurtar" class="special" /></li>										
										</ul>
									</div>
								</div>
							</form>

							<hr>

							<div class="12u 12u$(medium)">
							
								<header class="major">
									<h2>Esta é sua URL encurtada:</h2>
								</header>

								<h4><div id="UrlResult"></div></h4>

							</div>

							<?php include('js.php'); ?>							

						</div>

						<div class="6u$ 12u$(medium)">
							<ul class="major-icons">
								<li><span class="icon style1 major fa-code"></span></li>
								<li><span class="icon style2 major fa-bolt"></span></li>
								<li><span class="icon style3 major fa-camera-retro"></span></li>
								<li><span class="icon style4 major fa-cog"></span></li>
								<li><span class="icon style5 major fa-desktop"></span></li>
								<li><span class="icon style6 major fa-calendar"></span></li>
							</ul>

						</div>
					</div>
				</div>
			</section>

		<!-- Three -->
			<section id="three" class="main style1 special">
				<div class="container">
					<header class="major">
						<h2>URLs Encurtadas</h2>
					</header>
					<section>
						<div class="table-wrapper">
							<table>
								<thead>
									<tr>
										<th class="intemtable">URL Origem</th>
										<th class="intemtable">URL Encurtada</th>
										<th class="intemtable">Validade</th>
									</tr>
								</thead>
								<tbody>

									<?php
									
									include('conn_db.php');

									$busca_urls = "select * from tb_encurtarurl order by id desc";

								    $result_urls = mysqli_query($conn, $busca_urls) or die ("Erro 0x00130 => tb_encurtarurl => Busca URL -  ".mysqli_error($conn)); 
								    
								    while($row_urls = mysqli_fetch_array($result_urls))
								    {	
								    	$db_origem 			= $row_urls['origem'];
								    	$db_destino 		= $row_urls['destino'];
								    	$db_validadeData 	= $row_urls['validadeData'];
								    	$db_validadeHora 	= $row_urls['validadeHora'];
									
									print ' <tr> ';
									print '	<td><a href="'.$db_origem.'" target="_new">'.$db_origem.'</a></td>';
									print '	<td><a href="https://vmaia.com.br/Wiser-Educacao/'.$db_destino.'" target="_new">https://vmaia.com.br/Wiser-Educacao/'.$db_destino.'</a></td>';
									print '	<td>'.$db_validadeData.' - '.$db_validadeHora.'</td>';
									print ' </tr> ';

									}
									?>
									

								</tbody>								
							</table>
						</div>
					</section>
				</div>
			</section>

		<!-- Four -->
			<section id="four" class="main style2 special">
				<div class="container">
					<header class="major">
						<h2>Esta programação foi desenvolvida no prazo de 3 horas</h2>
					</header>
					<p>Desde a concepção do projeto, a modelagem do banco de dados, o front (Pré-programado) e as chamadas em Ajax com retorno de banco.</p>
					Deixe sua avaliação sobre este projeto!<br><br>
					<ul class="actions uniform">
						<li><a href="#" class="button special">Gostei</a></li>
						<li><a href="#" class="button">Poderia melhorar</a></li>
					</ul>
				</div>
			</section>

		<!-- Five -->
		
		

		<!-- Footer -->
			<section id="footer" style="padding: 10px;">
				<ul class="copyright">
					<li style="font-size: 20px;">Design and programming : <a href="https://vmaia.com.br">Renan Maia</a> - <a href="tel:91025.1657">91025.1657</a></li>					
				</ul>
				<br>
			</section>

	</body>
</html>