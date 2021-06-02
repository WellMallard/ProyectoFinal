<?php

/*index.php
 * abre la conexión a la BD, consulta los registros de libros Ordenados por autor de la A-Z y los muestra en una tabla
 * author: OscarMau
 * date 02/06/2021
 */
//abrir conexión al manejador
//verificar que exista el registro de acceso para este usuario, desde este equipo, a esta BD en el archivo _hba.conf

$con = pg_connect ("port=5432 dbname=biblio user=alumno1 password=pumaso13") or die (pg_last_error());
//print_r($con);
if($con){
	//echo "se abre la conexion a la BD";
	//genera la consulta
	//$query = "insert into alumnos (nombre_alumno,apaterno_alumno,amaterno_alumno,tel_alumno,correo_alumno) values('".$nombre." ',' ".$apaterno." ',' ".$amaterno." ',' ".$telefono." ',' ".$correoe."')";
	
	$query = "select nombre_libro,edicion,editorial,apaterno_autor,amaterno_autor,nombre_autor from alumnos";
	$query = pg_query($con,$query) or die (pg_last_error());
	//$arreglo = pg_fetch_all($query);
	echo "<pre>";
		//print_r($arreglo);
	echo "</pre>";
		//print_r($arreglo);
	echo "</pre>";
	if($query){
		echo "<p>Lista de libros</p>";
?>
<table>
	<thead>
		<tr>
			<th>Nombre del libro</th>
			<th>Edicion</th>
			<th>Editorial</th>
			<th>Apellido paterno del autor</th>
			<th>Apellido materno del autor</th>
			<th>Nombre del autor</th>
		</tr>
	</thead>
	<tbody>



<?php
		while($row = pg_fetch_array($query)){
			//echo "el nombre: ".$row['nombre_alumno']. "el paterno: ".$row['apaterno_alumno']."el materno: ".$row['amaterno_alumno'];
			echo "<tr>";
			echo "<td>".$row['nombre_libro']."</td>";
			echo "<td>".$row['edicion']."</td>";
			echo "<td>".$row['editorial']."</td>";
			echo "<td>".$row['apaterno_autor']."</td>";
			echo "<td>".$row['amaterno_autor']."</td>";
			echo "<td>".$row['nombre_autor']."</td>";
			echo "<td><a href='form_edita.php?id=".$row['nombre_libro']."'>Editar registro</a></td>";
			
			echo "<td><a href='form_elimina.php?id=".$row['nombre_libro']."'>Eliminar registro</a></td>";
			echo "</tr>";
		}

?>
	</tbody>
</table>
<?php
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

