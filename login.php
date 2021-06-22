<?php
//login.php
include 'conexion.php';
//recibir usuario y contraseña
$usuario = $_POST['nombre'];
$pass = $_POST['pass'];
$pass_cifrado = md5($pass);

//comparar con los valores existentes
$query = "select username_usuario, pass_usuario from usuarios where username_usuario='".$usuario."'";
$query = pg_query($con,$query);
$resultado = pg_fetch_assoc($query);

//comparacion de lo que llega vs BD
if ($pass_cifrado == $resultado['pass_usuario']){
	session_start();
	$_SESSION['auth']=true;
	header('Location: form_libros.php');
}
else{
	header('Location: inicio.php');
}




?>
