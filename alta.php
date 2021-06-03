<?php

/*alta_alumno.php
 * recibe los datos de form_libros.php, los procesa e inserta en la BD
 * author: OscarMau
 * date 02 06 2021
 */
//print_r($_POST);
$nombrel = $_POST['nombrel'];
$edicion = $_POST['edicion'];
$editorial = $_POST['editorial'];
$apaterno = $_POST['apaterno'];
$amaterno = $_POST['amaterno'];
$nombrea = $_POST['nombrea'];

//abrir conexión al manejador
//verificar que exista el registro de acceso para este usuario, desde este equipo, a esta BD en el archivo _hba.conf
$con = pg_connect ("port=5432 dbname=libros user=bibliotecario password=pumaso13") or die (pg_last_error());
//print_r($con);
if($con){
	//echo "se abre la conexion a la BD";
	//genera la consulta
	$query = "insert into libros (nombre_libro,edicion,editorial,apaterno_autor,amaterno_autor,nombre_autor) values('".$nombrel." ',  '".$edicion."','".$editorial."','".$apaterno."','".$amaterno."','".$nombrea."')";
	$query = pg_query($con,$query) or die (pg_last_error());
	if($query){
		echo "<p>Se guardo el registro del libro</p>";
		echo "<a href= 'index.php'>Volver al inicio</a></br>";
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

