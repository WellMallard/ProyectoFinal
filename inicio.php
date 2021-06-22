
<html>
<link rel="stylesheet" href="/css/proyecto.css" type="text/css" />
<head>
<h1>Inicio de sesión</h1>
</head>
<p>Bienvenido a la base de datos de libros de la UNAM, por favor inicie sesión.</p>
<body>
<?php
?>
	<form name="login" action="login.php" method="post">
		<label for="nombre">Nombre:</label>
		<input type="text" name="nombre"></br>
		<label for="pass">Contraseña:</label>
		<input type="password" name="pass"></br>
		<input type="submit" name="Enviar" value="Enviar">
	</form>
<?php

?>
</body>

</html>
