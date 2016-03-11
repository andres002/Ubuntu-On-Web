<?php  
session_start();
include "conexion.php";
if($_SESSION['admin'] == 2){

	$usuario = $_SESSION['user'];
	$conexion = conexion('localhost', 'root', '', 'sistema_operativo');
	$comando = "SELECT nombreNota FROM notas WHERE user = '$usuario';";
	$result = mysqli_query($conexion,$comando);
	
	$numrows = mysqli_num_rows($result);
	echo "<script>alert(".$numrows.")</script>";
	

	for ($i=0; $i < $numrows ; $i++) { 
		$fila = mysqli_fetch_array($result);
		echo "<li id = 'nota".$i."' type='none' onclick='opennote(this.id)' style = 'cursor:pointer; '>".$fila['nombreNota']."</li";
	}
}


?>