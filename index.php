<!DOCTYPE html>
<?
error_reporting(E_ALL);
ini_set('display_errors', '1');
?>
<html lang="es" class="no-js">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge"> 
		<meta name="viewport" content="width=device-width, initial-scale=1"> 
		<title>Registro</title>
		<meta name="description" content="Registro de participantes para el curso de especializacion en Linux INTEL-BUAP" />
		<meta name="keywords" content="Linux, Registro, Intel-Buap" />
		<link rel="shortcut icon" href="img/aztli.png">
		<link rel="stylesheet" type="text/css" href="css/normalize.css" />
		<link rel="stylesheet" type="text/css" href="css/demo.css" />
		<link rel="stylesheet" type="text/css" href="css/component.css" />
		<link rel="stylesheet" type="text/css" href="css/cs-select.css" />
		<link rel="stylesheet" type="text/css" href="css/cs-skin-boxes.css" />
		<script src="js/modernizr.custom.js"></script>
	</head>

	<body>
	<?php
                require("conexion/conexion2.php"); // CONEXION A LA BD
		include("funciones/archivos.php");
        ?> 

		<div class="container">

			<div class="fs-form-wrap" id="fs-form-wrap">
				<form method="post" id="myform" class="fs-form fs-form-full" autocomplete="off" enctype="multipart/form-data" action="<?php $_SERVER['PHP_SELF']?>">
					<ol class="fs-fields">
						<li>
							<label class="fs-field-label fs-anim-upper" for="q1">¿Cuál es tu nombre?</label>
							<input class="fs-anim-lower" id="q1" name="q1" type="text" placeholder="Adrew Tanembaum" required/>
						</li>
                        <li>
							<label class="fs-field-label fs-anim-upper" for="q2">¿Cuál es tu matricula?</label>
							<input class="fs-anim-lower" id="q2" name="q2" type="number" placeholder="2010333" required/>
						</li>
						<li>
							<label class="fs-field-label fs-anim-upper" for="q3" data-info="Usaremos tu correo en el caso de que quedes seleccionado.">¿Cuál es tu correo?</label>
							<input class="fs-anim-lower" id="q3" name="q3" type="email" placeholder="correo@gmail.com" required/>
						</li>
                        <li>
							<label class="fs-field-label fs-anim-upper" for="q4">¿Cuál es tu teléfono?</label>
							<input class="fs-anim-lower" id="q4" name="q4" type="tel" placeholder="2222222222" required/>
						</li>
				        <li data-input-trigger>
							<label class="fs-field-label fs-anim-upper" for="q5" data-info="This will help us know what kind of service you need">¿De que carrera vienes?</label>
							<div class="fs-radio-group fs-radio-custom clearfix fs-anim-lower">
								<span><input id="q3b" name="q5" type="radio" value="ICC"/><label for="q3b" class="radio-conversion">Ingenieria en Ciencias</label></span>
								<span><input id="q3c" name="q5" type="radio" value="LCC"/><label for="q3c" class="radio-social">Licenciatura en Ciencias</label></span>
								<span><input id="q3a" name="q5" type="radio" value="TI"/><label for="q3a" class="radio-mobile">Tecnologias de la información</label></span>
							</div>
						</li>

						
						<li>
							<label class="fs-field-label fs-anim-upper" for="q6">Cardex simple.</label>
							<input class="fs-anim-lower" id="q6" name="q6[]" type="file" required />
						</li>
                        <li>
							<label class="fs-field-label fs-anim-upper" for="q6">CV.</label>
							<input class="fs-anim-lower" id="q7" name="q6[]" type="file" required/>
						</li>
					</ol><!-- /fs-fields -->
					<button class="fs-submit" name="enviar" type="submit">ENVIAR</button>
				</form><!-- /fs-form -->
			</div><!-- /fs-form-wrap -->

			<!-- Related demos -->
			

		</div><!-- /container -->

		<?php
                    if (isset($_POST['enviar'])){ // CUANDO HAYA PULSADO EL BOTON DE "Registrar" ENVIO ESTE MENSAJE
                        $consulta = "INSERT INTO alumno (nombre_alumno, matricula, email, telefono, carrera) VALUES ('$_POST[q1]','$_POST[q2]','$_POST[q3]','$_POST[q4]','$_POST[q5]')";
                        $resultado = mysqli_query($conexion, $consulta);
                        if(!$resultado){
                            echo "Algo salio mal, no se pudo enviar sus datos";
                        }       
                        else{
                            createFolder($_POST['q1']); //Se crea la carpeta si la inserción es correcta 
                            echo "Usuario (a) <strong>".$_POST['q1'].' '.$_POST['q2']."</strong> tu informacion ha sido capturada con exito";
                        }
                    }
                ?>

		
		<script src="js/classie.js"></script>
		<script src="js/selectFx.js"></script>
		<script src="js/fullscreenForm.js"></script>
		<script>
			(function() {
				var formWrap = document.getElementById( 'fs-form-wrap' );

				[].slice.call( document.querySelectorAll( 'select.cs-select' ) ).forEach( function(el) {	
					new SelectFx( el, {
						stickyPlaceholder: false,
						onChange: function(val){
							document.querySelector('span.cs-placeholder').style.backgroundColor = val;
						}
					});
				} );

				new FForm( formWrap, {
					onReview : function() {
						classie.add( document.body, 'overview' ); // for demo purposes only
					}
				} );
			})();
		</script>
	</body>
</html>
