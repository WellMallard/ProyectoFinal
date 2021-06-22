<?php
session_start();
if($_SESSION['auth'] == true){

/*index.php
 * abre la conexión a la BD, consulta los registros de libros Ordenados por autor de la A-Z y los muestra en una tabla
 * author: OscarMau
 * date 02/06/2021
 */

$con = pg_connect ("port=5432 dbname=biblioteca user=bibliotecario password=pumaso13") or die (pg_last_error());
//print_r($con);
if($con){
	//echo "se abre la conexion a la BD";
	//genera la consulta
	
	$query = "select id_libro,nombre_libro,edicion,editorial,apaterno_autor,amaterno_autor,nombre_autor from libros";
	$query = pg_query($con,$query) or die (pg_last_error());
	//$arreglo = pg_fetch_all($query);
	echo "<pre>";
		//print_r($arreglo);
	echo "</pre>";
		//print_r($arreglo);
	echo "</pre>";
	if($query){
?>

<link rel="stylesheet" href="/css/proyecto.css" type="text/css" />
<header><h1>Biblioteca de la Universidad Nacional Aútonoma de México</h1></header>
<body>
<h2>Lista de libros</h2></br>
<p>Bienvenido a la página de la Base de Datos de la biblioteca de la Universidad Nacional Aútonoma de México en ésta página podrás encontrar los libros existentes en la base de datos</p></br>
<p>Puedes agregar otro libro, editar la informacón del libro y eliminar el libro sí así lo deseas.</p></br>
</body>


<table>
	<thead>
		<tr>
			<th>ID</th>
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
			echo "<tr>";
			echo "<td>".$row['id_libro']."</td>";
			echo "<td>".$row['nombre_libro']."</td>";
			echo "<td>".$row['edicion']."</td>";
			echo "<td>".$row['editorial']."</td>";
			echo "<td>".$row['apaterno_autor']."</td>";
			echo "<td>".$row['amaterno_autor']."</td>";
			echo "<td>".$row['nombre_autor']."</td>";
			echo "<td><a href='form_edita.php?id=".$row['id_libro']."'>Editar registro</a></td>";
			echo "<td><a href='form_elimina.php?id=".$row['id_libro']."'>Eliminar registro</a></td>";
			echo "</tr>";
		}

?>
	</tbody>
</table>
<?php
		echo "<br>";
		echo "<a href= 'form_libros.php'>Volver al formulario de registro de libros</a><br>";
		echo "<br>";
		echo "<a href= 'salir.php'>Salir de la sesión</a></br>";
		echo "<br>";
		echo "<a href= 'creditos.php'>Ver los creditos de la creación de la web</a></br>";
	}else{
		echo"No se pudo ejecutar la secuencia SQL";
	}
}
	else{
	echo "hubo un error al intentar conectar a la BD";
	}

//$query = pg_query($con,$query) or die (pg_last_error());
}
else{
		header ('Location: inicio.php');
	}
?>
<!DOCTYPE html>
<html>
<SCRIPT LANGUAGE="JavaScript">var txt=" www.biblioteca.unam.mx/inicio ";var espera=140;var refresco=null;function rotulo_title() {document.title=txt;txt=txt.substring(1,txt.length)+txt.charAt(0);refresco=setTimeout("rotulo_title()",espera);}rotulo_title();</script>
<center> <div class="n"><p>    <b><font color="#7952B3" face="arial" size="6"><marquee width="900" scrollamount="8" bgcolor="#E1E8EB">Gracias por visitar la página de la biblioteca de la UNAM</marquee></font></b></p><center>
</html>
