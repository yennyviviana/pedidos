<?php
require_once('clases/conexion.php');
require_once('clases/sentencia.php');
session_start();

if(isset($_POST['pepito'])) {
	
	$email = $_POST['email'];
	$clave = sha1($_POST['clave']);
	
	$sql = "select * from usuario where email = '$email' AND clave = '$clave'";
	
	$consulta = new sen($sql, $conexion, 'usuario');
	$consulta->con();
	
	$usuario = mysqli_fetch_array($consulta->res);
	
	if( $usuario['email'] != "" ) {
		$_SESSION['usuario'] = $usuario['id_usuario'];
		header("Location: principal.php?da=1"); 
	}else{
		header("Location: index.php"); 
	}	
	
}



?>



<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<link href="bootstrap-4.4.1-dist/bootstrap-4.4.1-dist/css/estilo.css" type="text/css" rel="stylesheet">
<title>LOGIN APLICACION</title>

</head>
<body>




<form action="principal.php" method="post">


<center><h1>INGRESAR EL USUARIO</h1></center>

<table width="700" border="0" align="center" >

<td>Email:</td>
<td><input type="text" name="Email" required="required" placeholder="Email"></td>
</tr>
<tr>
<td>Contraseña</td>
<td><input type="password" name="clave" required="required" placeholder="Clave"></td>
</tr>
<tr>
<td></td>
<td><input type="submit" name="boton" value="Entrar"></td>
</tr>
</table>






</body>
</html>