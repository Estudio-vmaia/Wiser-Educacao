<?php

	setlocale(LC_ALL, 'pt_BR');
	date_default_timezone_set('America/Sao_Paulo');
									
	include('conn_db.php');

	$url = @$_GET['url'];

	$msg = '';

	$busca_urls = "select * from tb_encurtarurl where destino= '".$url."'";

	$result_urls = mysqli_query($conn, $busca_urls) or die ("Erro 0x00130 => tb_encurtarurl => Desencurta URL -  ".mysqli_error($conn)); 

	while($row_urls = mysqli_fetch_array($result_urls))
	{	
		$db_origem 			= $row_urls['origem'];
		$db_destino 		= $row_urls['destino'];
		$db_validadeData 	= $row_urls['validadeData'];
		$db_validadeHora 		= $row_urls['validadeHora'];

		$today = date("d/m/Y H:i");
		$date = $db_validadeData.' '.$db_validadeHora;

		//print $today.'<br>';
		//print $date.'<br>';

		if ($today < $date)
		{
			print ' <script type="text/javascript">window.location.href = "'.$db_origem.'";</script> ';		
		}
		else
		{
			$msg = 'Este encurtamento não é mais válido<br>Venceu em: '.$date;
		}

	}
?>



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
					<h1><?php print $msg; ?></h1>
					<p></p>
					<ul class="actions">
						<li><a href="https://vmaia.com.br/Wiser-Educacao" class="button scrolly">conheça o processo</a></li>
					</ul>
				</div>
			</section>

		
	</body>
</html>