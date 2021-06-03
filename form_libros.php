<?php
session_start();
//$_SESSION['count'] += 1;
if($_SESSION['auth'] == true){
?>
<!DOCTYPE html>
<html>
	<head>	
		<meta charset = "UTF-8">
		<title>Formulario de alta libros</title>
		<script src="js/primero.js"></script>
	</head>
	<body>
		<h1>Formulario de alta de libors</h1>
		<p>Favor de ingresar los siguientes datos para registrar los libros:</p>
		<form name ="alta" action ="alta.php" method = "post" >
			<label for = "nombrel">Nombre del libro: </label>
			<input type = "text" name = "nombrel"><br/>
			<label for = "edicion">Edición: </label>
			<input type = "text" name = "edicion"><br/>
			<label for = "editorial">Editorial: </label>
			<input type = "text" name = "editorial"><br/>
			<label for = "apaterno">Apellido paterno del autor: </label>
			<input type = "text" name = "apaterno"><br/>
			<label for = "amaterno">Apellido materno del autor: </label>
			<input type = "text" name = "amaterno"><br/>
			<label for = "nombrea">Nombre del autor: </label>
			<input type = "text" name = "nombrea"><br/>
			<input type = "submit" value = "Enviar">
			</form>

	</body>



</html>
<?php
}
else{
	header ('Location: inicio.php');
}
?>
