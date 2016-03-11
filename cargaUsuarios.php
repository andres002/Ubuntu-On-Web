<?php  
session_start();
include "conexion.php";
if($_SESSION['admin'] == 1){



	$conexion = conexion('localhost', 'root', '', 'sistema_operativo');

	$comando = "SELECT user FROM login";
	$result = mysqli_query($conexion,$comando);

	$numrows = mysqli_num_rows($result);
	//echo "<script>alert($numrows)</script>";

	for ($i=0; $i < $numrows ; $i++) { 
		$fila = mysqli_fetch_array($result);
		echo "<li id = '".$fila['user']."' type='none' onclick='openUser(this.id)' style = 'cursor:pointer; '>".$fila['user']." </li>";
	}
}


?>