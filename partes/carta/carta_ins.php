<div id="formulario">
	<form action="principal.php?da=2" method="post" enctype="multipart/form-data">
		
		
		<input type="text" name="plato" required="required" placeholder="Ingresar plato"><br>
		
		
		<input type="number" name="precio"required="required" placeholder="precio"><br>
		
		
		<input type="file" name="imagen" required="required">
		
		
		<textarea name="ingredientes" rows="4" cols="50" required="required" placeholder="Ingredientes"
		class="ckeditor"> </textarea><br>
		
		<input type="submit" name="boton" value="Guardar">
		
		
		</form>
		
		
		
</div>




<?php


// pregunta si el boton se presiono................
 if(isset($_POST ['boton']))   {
	
	//capturar los datos enviados
	$plato = $_POST ['plato'];
	$ingredientes = $_POST ['ingredientes'];
	$precio = $_POST ['precio'];
	$imagen =$_FILES ['imagen'];
	
	//cuando se captura un archivo
	
	$nombre= $imagen['name'] ;
	$destino = 'img/plato';
	list ($nombre_img, $ext_img)= explode('.', $nombre );
	$tamano=$imagen ['size'];
	$nombrefinal= $plato. "_" . $precio . "_".$nombre_img.".".$ext_img;

echo $nombrefinal."<br>";
echo $nombre_img."<br>";
echo $ext_img."<br>";


//grabar dentro de la base de datos

$insertar= "insert into carta ('plato,precio,ingredientes,imagen) values ('$plato',$precio,'$ingredientes','$nombrefinal')";


$ins = new sen ($insertar, $conexion,'carta');
$ins->insedbo();



// muevo el archivo a la carpeta

 if($tamano < 100000000) {                                    

move_uploaded_file($imagen ['tmp name'],$destino. '/'. $nombre_img);





}else {
	 echo "la imagen supera el tamaño permitido" ;


       
}                                                                                                                                   


 header("location: principal.php?da=1");



 

}



?>
















