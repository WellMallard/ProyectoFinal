<!DOCTYPE html>
<html>
<link rel="stylesheet" href="/css/proyecto.css" type="text/css" />
	<head>	
		<meta charset = "UTF-8">
		<title>Formulario de edición de libros</title>
	</head>
	<body>
<?php
//Recibir el valor que viaja en la URL
$id = $_GET['id'];
//echo "el id del alumno es " .$id;
//Consulta los datos del alumno con ese ID, para mostrarlos en el formulario
$con = pg_connect ("port=5432 dbname=biblioteca user=bibliotecario password=pumaso13") or die (pg_last_error());
if($con){
	$query = "select nombre_libro, edicion, editorial, apaterno_autor, amaterno_autor, nombre_autor from libros where id_libro='".$id."'";
	$query =pg_query($con,$query);
	$resultado = pg_fetch_assoc($query);
	//print_r($resultado);
?>
		<h1>Formulario de edición de libros</h1>
		<p>Favor de ingresar los siguientes datos para editar el libro que elegiste:</p>
		<form name ="alta" action ="guarda_edicion.php" method = "post" >
			<label for = "nombrel">Nombre de libro: </label>
			<input type = "text" name = "nombrel" value="<?php echo $resultado['nombre_libro']; ?>"><br/>

			<label for = "edicion">Edición: </label>
			<input type = "text" name = "edicion" value="<?php echo $resultado['edicion']; ?>"><br/>

			<label for = "editorial">Editorial: </label>
			<input type = "text" name = "editorial" value="<?php echo $resultado['editorial']; ?>"><br/>

			<label for = "apaterno">Apellido paterno: </label>
			<input type = "text" name = "apaterno" value="<?php echo $resultado['apaterno_autor']; ?>"><br/>

			<label for = "amaterno">Apellido materno: </label>
			<input type = "text" name = "amaterno" value="<?php echo $resultado['amaterno_autor']; ?>"><br/>

			<label for = "nombrea">Nombre del autor: </label>
			<input type = "telefono" name = "nombrea" value="<?php echo $resultado['nombre_autor']; ?>"><br/>


			<input type = "hidden" name = "id" value="<?php echo $id; ?>"><br/>
			<input type = "submit" value = "Editar">
		</form>

<?php
	echo "<br>";
	echo "<a href= 'index.php'>Ir al inicio</a></br>";
}
?>
	</body>



</html>
