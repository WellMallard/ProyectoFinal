
<html>
<link rel="stylesheet" href="/css/proyecto.css" type="text/css"/>
<script src="js/edita.js"></script>
<h1>Estado de la edición del libro</h2>
</html>
<?php

/*alta_actualiza.php
 *guarda_edicion.php 
 * recibe los datos de form_libros.php, los procesa e inserta en la BD
 * author: OscarMau
 * date 02 06 2021
 */


//print_r($_POST);
$id = $_POST['id'];
$nombrel = $_POST['nombrel'];
$edicion = $_POST['edicion'];
$editorial = $_POST['editorial'];
$apaterno = $_POST['apaterno'];
$amaterno = $_POST['amaterno'];
$nombrea = $_POST['nombrea'];

//abrir conexión al manejador
//verificar que exista el registro de acceso para este usuario, desde este equipo, a esta BD en el archivo _hba.conf
$con = pg_connect ("port=5432 dbname=biblioteca user=bibliotecario password=pumaso13") or die (pg_last_error());
//print_r($con);
if($con){
	//echo "se abre la conexion a la BD";
	//genera la consulta
	$query = "update libros set nombre_libro ='".$nombrel."' ,edicion='".$edicion."' ,editorial='".$editorial."' ,apaterno_autor='".$apaterno."' ,amaterno_autor='".$amaterno."' ,nombre_autor='".$nombrea."' where id_libro=".$id;
	$query = pg_query($con,$query) or die (pg_last_error());
	if($query){
		echo "<p>Se actualizó la información del libro</p>";
		echo "<br>";
		echo "<a href= 'index.php'>Volver al inicio</a></br>";
		echo "<br>";
		echo "<a href= 'form_libros.php'>Volver al formulario de registro</a>";
	}else{
		echo"No se pudo ejecutar la secuencia SQL";
	}
}
	else{
	echo "hubo un error al intentar conectar a la BD";
	}

//genera la consulta
//$query = "insert into alumnos (nombre_alumno, apaterno_alumno, amaterno_alumno,tel_alumno, correoe_alumno) values ('".$nombre." ',' ".$apaterno." ','".$amaterno." ',' ".$telefono." ',' ".$correoe."')";
//$query = pg_query($con,$query) or die (pg_last_error());
?>

