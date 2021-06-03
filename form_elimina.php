<?php

/*eliminar_libro.php
 * recibe los datos de index.php para eliminar el registro
 * author: OscarMau
 * date 02 06 2021
 */
//print_r($_POST);
$id = $_GET['id'];
//$nombre = $_POST['nombre'];
//$apaterno = $_POST['apaterno'];
//$amaterno = $_POST['amaterno'];
//$telefono = $_POST['telefono'];
//$correoe = $_POST['correoe'];
//abrir conexión al manejador
echo "¡Importante:! una vez que el registro sea borrado, no se podrá recuperar. Favor de verificar que el registro a eliminar es el correcto.";
//verificar que exista el registro de acceso para este usuario, desde este equipo, a esta BD en el archivo _hba.conf
$con = pg_connect ("port=5432 dbname=libros user=bibliotecario password=pumaso13") or die (pg_last_error());
//print_r($con);
if($con){
	//echo "se abre la conexion a la BD";
//genera la consulta
	$query = "select nombre_libro, edicion, editorial, apaterno_autor, amaterno_autor, nombre_autor from libros where id_libro=".$id;
	$query = pg_query($con,$query);
	$consulta = pg_fetch_assoc($query);
?>
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
<input type="submit" name="borrar" value="Elimniar regsitro">
</form>


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
		echo "No se eliminó el registro";
	}	
}
else{
	echo "hubo un error al intentar conectar a la BD";
}

//genera la consulta
//$query = "insert into alumnos (nombre_alumno, apaterno_alumno, amaterno_alumno,tel_alumno, correoe_alumno) values ('".$nombre." ',' ".$apaterno." ','".$amaterno." ',' ".$telefono." ',' ".$correoe."')";
//$query = pg_query($con,$query) or die (pg_last_error());
?>

