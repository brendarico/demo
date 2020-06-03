<?php
    $host='localhost';
    $usuario='root';
    $password='';
    $bd='test';
    $conexion = new mysqli($host,$usuario,$password,$bd) or die('could not connect to database');
?>

<!DOCTYPE HTML>
<html lang="es-MX">
	<head>
		<meta charset="UTF-8" />
        <meta name="viewport" id="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no" />
		<title>Inicio</title>
		<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700%7CPoppins:400,500" rel="stylesheet">
		<link href="common-css/ionicons.css" rel="stylesheet">
		<link rel="stylesheet" href="common-css/jquery.classycountdown.css" />
		<link href="common-css/styles.css" rel="stylesheet">
		<link href="common-css/responsive.css" rel="stylesheet">
	</head>
	<body>
	<div class="main-area">
		<section class="right-section full-height">
			<div class="display-table">
				<div class="display-table-cell">
					<div class="main-content">
						<h1 class="title"><b>HOLA</b></h1>
						<p class="desc">Nos estamos renovando, queremos traerte más y mejor contenido. 
						Esto será temporal y muy pronto estaremos de nuevo contigo. Déjanos tu correo y te 
						mandaremos una sorpresa que te gustará mucho (shh!, no le digas a nadie 🤗)</p>
						<div id="actionForm">
							<div class="email-input-area">
								<input class="email-input" id="mail" type="email" required placeholder="Ingresa tu correo"/>
								<button class="submit-btn" type="submit" id="createrecord"><b>Notificarme</b></button>
							</div>
						</div>
						<br>
						<div id="messageEmp"><p style="color: #ff0000;">Debes rellenar el campo</p></div>
						<div id="messageNot"><p class="post-desc">Te avisaremos cuando todo esté listo!</p></div>
						<div id="responseMessage">
							<strong><p style="color: #ffff00;" id="message"></p></strong>
						</div>
					</div>
				</div>
			</div>
		</section>
	</div>
	
	
	<script src="common-js/jquery-3.5.1.min.js"></script>
	<script src="common-js/jquery.countdown.min.js"></script>
	<script src="common-js/scripts.js"></script>
	<script>
		$(document).ready(function(){
			$('#responseMessage').hide();
			$('#messageEmp').hide();
			$("#createrecord").click(function(){
				$.ajax({
					url: 'managment/process/insert.php',
					type: 'POST',
					data:{
						mail : document.getElementById("mail").value
					},
					success: function(data) {
						console.log(data);
						if(data == 1){
							$('#messageEmp').show();
							$('#messageNot').hide();
						}else if(data != 1 || data != 0){
							$('#messageNot').hide();
							$('#messageEmp').hide();
							$('#actionForm').hide();
							$('#responseMessage').show();
							$("#message").text(
							'Gracias por tu registro, sabemos lo mucho que nos esperas.' +
							'Te obsequiamos un cupón de descuento, úsalo en nuestros ' +
							'siguietes productos😍 Cupón: ' + data);
						}
					}
                });
            });
        });
        </script>
	</body>
</html>