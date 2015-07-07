<html>
  <head><meta http-equiv="Content-Type" content="text/html" charset="utf-8">

    <title>Inscripción de alumnos</title>
    <link href="css/bootstrap.css" rel="stylesheet" media="screen">
  </head>

  <?php
	require("conexion/conexion2.php"); // CONEXION A LA BD
  ?>

  <body>
    <div class="navbar">
      <div class="navbar-inner">
	<a class="brand" href="http://aztli.org">Aztli</a>
	<ul class="nav">
	  <li class="active"><a href="#">Inscripción</a></li>
	  <!-- <li><a href="http://aztli.org">Descargas</a></li> -->
	</ul>
      </div>
    </div>
    <h1>Inscripción de alumnos</h1>

    <form method="post" enctype="multipart/form-data" class="form-horizontal" action="<?php $_SERVER['PHP_SELF']?>" >
    <div class="control-group">
		<label class="control-label" for="inputName">Nombre</label>
		<div class="controls">
	 		<input name="Nombre" type="text" id="inputName" placeholder="Ramiro" required>
		</div>
    </div>
      <div class="control-group">
	<label class="control-label" for="inputlastname">Apellido paterno</label>
	<div class="controls">
	  <input name="Apellido" type="text" id="inputlastname" placeholder="Perez" required>
	</div>
      </div>
      <div class="control-group">
	<label class="control-label" for="inputemail">Email</label>
	<div class="controls">
	  <input name="Email" type="email" id="inputemail" placeholder="Ramiro_perez@gmail.com" required>
	</div>
      </div>

      <div class="control-group">
	<label class="control-label" for="inputcarr">Matricula</label>
	<div class="controls">
	  <input name="Mat" type="text" id="inputcarr" placeholder="Opcional">
	</div>
      </div>

      <div class="control-group">
	<label class="control-label" for="inputcourse">Cursos</label>
	<div class="controls">
	  <label class="radio inline">
	    <select name="Cursos[]" multiple id="Cursos" size="8">
	    <option value="0">-- Cursos disponibles --</option>
		  <?php // LISTA DE FORMA DINAMICA LOS CURSOS ALMACENADOS EN LA BD
			$consulta = "SELECT * FROM Cursos ORDER BY Horario DESC";
			$resultado = mysqli_query($conexion,$consulta);
			while($curso = mysqli_fetch_array($resultado))
			 {
			   echo utf8_encode("<option value=\"$curso[ClaveC]\">$curso[Horario] - $curso[Nom_Curso]</option>");
			 }
		  ?>
		</select>
	  </label>
		<p>Manten presionado CTRL para seleccionar más de un curso</p>
		<p>*Solo puedes elegir hasta 3 cursos a la vez</p>
      </div>


      <div class="form-actions">
		<button name="enviar" type="submit"  class="btn btn-primary">Enviar</button>
		<button type="button"  class="btn">Limpiar</button>
      </div>
</div>
</form>
<address>
	<p><a href="mailto:os.aioria@gmail.com">Miguel Angel Gordian</a></p>
	<p><a href="mailto:taniafcc@gmailcom">Tania Lucero Marin Sosa</a></p>
  <?php
    if (isset($_POST['enviar'])) // CUANDO HAYA PULSADO EL BOTON DE "Registrar" ENVIO ESTE MENSAJE
    {
		$consulta = "INSERT INTO Alumnos (Nom_Alumno, Apell_Alumno, Correo, Matricula) VALUES ('$_POST[Nombre]','$_POST[Apellido]','$_POST[Email]','$_POST[Mat]')";
		$resultado = mysqli_query($conexion, $consulta);
		if(!$resultado){
			echo "Algo salio mal, no se pudo enviar sus datos";
		}	else{
				echo "Usuario (a) <strong>".$_POST[Nombre].' '.$_POST[Apellido]."</strong> tu informacion ha sido capturada con exito";
		}
		$idalumno = mysqli_insert_id($conexion);
		echo "$idalumno";
		$c=$_POST["Cursos"];
		for($i=0; $i<count($c);$i++){
			$linkAlumnoCurso = "INSERT INTO Alumnos_has_Cursos (Alumnos_idAlumno, Cursos_ClaveC) VALUES ('$idalumno','$c[$i]')";
			$resultado = mysqli_query($conexion,$linkAlumnoCurso);
		}
    }
  ?>
</address>
</body>
</html>
