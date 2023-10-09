<button name="botonc"  type="button" onclick="document.location ='principal.php?da=2'">
      Ingresar nuevo  plato

</button>


<br><br>

<table border="1" cellspacing="0" width="100%">
		<tr>
		<th>Platos</th>
		<th>Precio</th>
		<th>Ingredientes</th>
		<th>Imagenes</th>
		<th></th>
		<th></th>
		</tr>
		<tr>
		
<?php

$buscar=$_POST['buscar'];

 if (is_numeric($buscar)) {


 echo $consulta ="select * from carta where  precio= 
      $buscar  order by plato" ;
      
      
}else {
	
  echo $consulta ="select * from carta where  plato LIKE '%buscar%' OR
  precio= $buscar OR
  ingredientes LIKE '%buscar%'
        order by plato" ;
	
	
}	
	
      
$co = new sen ($consulta,$conexion, 'carta');

$co->con();

while($platos=mysqli_fetch_array($co->res)) {


?>


		<td><?php echo $platos ['plato']; ?></td>
		<td>$ <?php echo number_format($platos['precio'],2,',','.') ; ?></td>
		<td><?php echo $platos ['ingredientes']; ?></td>
		<td><img src="img/platos/<?php echo $platos ['imagen']; ?>" width="100"alt=""></td>
		<td><a href="principal.php?da=3&lla =<?php echo $platos ['0']; ?>"></a>Editar</td>
		
	
		<td><a href="#" onclick="pregunta(<?php  echo $platos ['id_carta']; ?>,'<?php echo $platos ['imagen'] ; ?>')">Borrar</a></td>
		</tr>
				
		
<?php }?>
		
		</table>
		
		

<script>

function pregunta (id,imagen){

if (confirm('¿Esta seguro de borrar el plato de la carta?')) {
	
	
document.location = "principal.php?da=4&lla=" + id	+ "&imagen =" + imagen ;
	
}else {
	
	document.location = "principal.php?da=2";
	
	
	
	
}	
	
}






</script>










	