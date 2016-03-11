<?php  
session_start();
include "conexion.php";
if($_SESSION['admin'] == 2){

	$usuario = $_SESSION['user'];
	$conexion = conexion('localhost', 'root', '', 'sistema_operativo');
	$comando = "SELECT nota,idnota FROM notas WHERE user = '$usuario';";
	$result = mysqli_query($conexion,$comando);
	
	$numrows = mysqli_num_rows($result);

	

	for ($i=0; $i < $numrows ; $i++) { 
		$fila = mysqli_fetch_array($result);
		echo "<li id = '" .$fila['idnota']."' type='none' onclick='opennote(this.id)' style = 'cursor:pointer; '>".$fila['nota']." </li>";
	}
}


?>