<?php
//estos son los datos para conectar a mysql
$servidor = 'localhost';
$usuario = 'bir';
$clave = '123456';
$based = 'administracion_contenido';

//funcion que nos conecta a mysql
$conexion = mysqli_connect($servidor,$usuario,$clave) or die('No se conecto a mysql');

//conectar a la base de datos
mysqli_select_db($conexion, $based) or die('no se conecto a la base de datos pedido_sistema');

//utf8 para todos los simbolos salgan bien
mysqli_set_charset($conexion, 'utf8');

?>