<?php
//login.php
include 'conexion.php';
//recibir usuario y contraseña
//echo "Recibe la contraseña";
$usuario = $_POST['nombre'];
$pass = $_POST['pass'];
$pass_cifrado = md5($pass);
//echo "El hash: " .$pass_cifrado;
//comparar con los valores existentes
$query = "select username_usuario, pass_usuario from usuarios where username_usuario='".$usuario."'";
$query = pg_query($con,$query);
$resultado = pg_fetch_assoc($query);
//var_dump($resultado);
//comparacion de lo que llega vs BD
//echo "El pass almacenado".$resultado['pass_usuario'];
if ($pass_cifrado == $resultado['pass_usuario']){
	//echo "Sí coinciden";
	session_start();
	$_SESSION['auth']=true;
	//$_SESSION['count']='1';
	header('Location: for_alumno.php');
}
else{
	//echo "Hubo un error o no coinciden";
	header('Location: inicio.php');
}

//tener en la BD una tabla de usuarios validos para la aplicacion<---Ideal
//echo "<td><a href='edita_profesor.php?id=".$row['id_profesor']."'>Editar registro</a></td>";
////tener definidos el usuario y la contraseña <----Did'actico





?>
