<?php require_once ('partes/head.php'); ?>
<?php require_once ('partes/menu.php');?>


<section>

 <h3>Platos de la carta</h3>
<section>

<?php
	
		$dato = $_GET['da'];

	switch($dato) {
		case 1:
			require_once('partes/carta/carta.php');
			break;
		case 2:
			require_once('partes/carta/carta_ins.php');
			break;
		case 3:
			require_once('partes/carta/carta_ed.php');
			break;
		case 4:
			require_once('partes/carta/carta_bo.php');
			break;
		case 5:
			require_once('partes/carta/cartabuscar.php');
			break;
	}

?>


 </section>

