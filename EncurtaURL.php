<?php

	include('conn_db.php');

	$GLOBALS['origem'] = @$_POST['url_origem'];
	$GLOBALS['valData'] = @$_POST['valData'];
	$GLOBALS['valHora'] = @$_POST['valHora'];

	$QtdChr = @$_POST['QtdChr'];

	//http://wisereducacao.com 

	//FUNÇÃO PARA GERAR A CHAVE
	function GeraURL($length, $conn)
	{
		$base = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	    
	    $baseLength = strlen($base);
	    
	    $chave = '';
	    
	    for ($i = 0; $i < $length; $i++)
	    {
	        $chave .= $base[rand(0, $baseLength - 1)];
	    }
	    
	    verificaChave($chave, $conn);
	   
	    //return $chave;
	}

	//FUNÇÃO PARA VERIFICAR SE JÁ EXISTE ESTA CHAVE
	function verificaChave($chave, $conn)
	{
		$busca_chave = "select * from tb_encurtarurl where destino = '".$chave."' ";
		//print $busca_chave;

	    $result_chave = mysqli_query($conn, $busca_chave) or die ("Erro 0x00130 => tb_encurtarurl => Busca Chave - ".mysqli_error($conn)); 
	    $num_rows = mysqli_num_rows($result_chave);

	    //print $num_rows;
	    if($num_rows == 0)
	    {
	    	save_db($chave, $conn);

	    	print $chave;
	    }
	}

	

	//FUNÇÃOO PARA GRAVAR NA BASE
	function save_db($chave, $conn)
	{
		$QRY = ' INSERT tb_encurtarurl';
		$QRY .= ' SET '; 
		$QRY .= ' origem = "'.$GLOBALS['origem'].'", ';
		$QRY .= ' destino = "'.$chave.'", ';
		$QRY .= ' validadeData = "'.$GLOBALS['valData'].'", ';
		$QRY .= ' validadeHora = "'.$GLOBALS['valHora'].'" ';

		//print $QRY;
		$result = mysqli_query($conn, $QRY) or die ('Erro 0x00130 => tb_encurtarurl => Insert Table - '.mysqli_error($conn)); 
	}


	print GeraURL($QtdChr, $conn);



?>

