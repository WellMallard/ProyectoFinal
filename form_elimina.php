<?php

/*form_elimina.php
 * recibe los datos de index.php para eliminar el registro
 * author: OscarMau
 * date 02 06 2021
 */
//print_r($_POST);
$id = $_GET['id'];

//verificar que exista el registro de acceso para este usuario, desde este equipo, a esta BD en el archivo _hba.conf
$con = pg_connect ("port=5432 dbname=biblioteca user=bibliotecario password=pumaso13") or die (pg_last_error());
//print_r($con);
if($con){
	//echo "se abre la conexion a la BD";
//genera la consult
	$query = "select nombre_libro, edicion, editorial, apaterno_autor, amaterno_autor, nombre_autor from libros where id_libro=".$id;
	$query = pg_query($con,$query);
	$consulta = pg_fetch_assoc($query);
?>
<link rel="stylesheet" href="/css/proyecto.css" type="text/css" />
<h1>Apartado de borrado de libro</h1>
<h2>¡Importante:! una vez que el registro sea borrado, no se podrá recuperar. Favor de verificar que el registro a eliminar es el correcto.</h2>
<table>
	<tr>
		<th>Nombre del libro</th>
		<th>Edicion</th>
		<th>Editorial</th>
		<th>Apellido paterno del autor</th>
		<th>Apellido materno del autor</th>
		<th>Nombre del autor</th>
	</tr>
	<tr>
		<td><?php echo $consulta['nombre_libro']; ?></td>
		<td><?php echo $consulta['edicion']; ?></td>
		<td><?php echo $consulta['editorial']; ?></td>
		<td><?php echo $consulta['apaterno_autor']; ?></td>
		<td><?php echo $consulta['amaterno_autor']; ?></td>
		<td><?php echo $consulta['nombre_autor']; ?></td>
	</tr>
</table>
<form name="borrar" action="<?php $SERVER['PHP_SELF'];?>" method="post">
<input type="submit" name="borrar" value="¡Elimniar regsitro!">
</form>
<?php
	echo "<br>";
	echo "<a href= 'index.php'>Ir al inicio</a></br>";
	echo "<br>";
?>

<?php

	$borrar = $_POST['borrar'];
	if($borrar){
		$query = "delete from libros where id_libro=".$id;
		$query = pg_query($con,$query) or die (pg_last_error());
		if($query){
			echo "<p>Se eliminó el registro del libro</p>";
			echo "<a href= 'index.php'>Volver al inicio</a></br>";
			echo "<a href= 'form_libros.php'>Volver al formulario de registro</a>";
		}
		else{
		echo"No se pudo ejecutar la secuencia SQL";
		}

	}
	else{
		echo "Todavía no se elimina el registro";
	}	
}
else{
	echo "hubo un error al intentar conectar a la BD";
}

?>

<script src="js/elimina.js"></script>
