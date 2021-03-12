<script type="text/javascript">

	function submitform()
	{
		url_origem = document.getElementById('url_origem');
		valData = document.getElementById('valData');
		valHora = document.getElementById('valHora');

		if(valData.value.length < 10)
		{
			alert('Preencha uma data valida!');
			document.getElementById('valData').focus();
			return false;
		}
		else if(valHora.value.length < 5)
		{
			alert('Preencha uma hora valida!');
			document.getElementById('valHora').focus();
			return false;
		}
		else{

			event.preventDefault();

			$.ajax({
			      type: 'POST',
			      url: 'EncurtaURL.php',
			      data: $('#formURL').serialize(),
			      success: function (response) {
			      	document.getElementById('UrlResult').innerText = 'https://vmaia.com.br/Wiser-Educacao/'+response;
			      	console.log(response);				      		        
			      }
			  });
		}

		return false;
	}


	//função para máscara de data
 	var input = document.getElementById('valData');
	  
	var dateInputMask = function dateInputMask(elm) {
	  elm.addEventListener('keypress', function(e) {
	    if(e.keyCode < 47 || e.keyCode > 57) {
	      e.preventDefault();
	    }
	    
	    var len = elm.value.length;
	    if(len !== 1 || len !== 3) {
	      if(e.keyCode == 47) {
	        e.preventDefault();
	      }
	    }
	 
	    if(len === 2) {
	      elm.value += '/';
	    }

	    if(len === 5) {
	      elm.value += '/';
	    }
	  });
	};
	  
	dateInputMask(input);



	//função para máscara de hora
 	var input = document.getElementById('valHora');
	  
	var HoraInputMask = function HoraInputMask(elm) {
	  elm.addEventListener('keypress', function(e) {
	    if(e.keyCode < 47 || e.keyCode > 57) {
	      e.preventDefault();
	    }
	    
	    var len = elm.value.length;
	    
	    if(len !== 1 || len !== 3) {
	      if(e.keyCode == 47) {
	        e.preventDefault();
	      }
	    }
	 
	    if(len === 2) {
	      elm.value += ':';
	    }

	  });
	};
	  
	HoraInputMask(input);


</script>