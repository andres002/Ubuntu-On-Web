<?php 

include "conexion.php";
 if(isset($_POST['accion'])){
    switch ($_POST['accion']) {
      case 'openUser':
        infoUser($_POST['usuario']);
        break;
      
      default:
        break;
    }
  } 
function infoUser($user){


	$conexion = conexion('localhost', 'root', '', 'sistema_operativo');
	$comando = "SELECT * FROM login WHERE user = '$user'";
	$resultado = mysqli_query($conexion,$comando);
	$fila = mysqli_fetch_array($resultado);
	if($fila['user'] == 1) {
		$tipo =  "Administrador";
	}else{
		$tipo =  "Usuario";
	}


	echo " <h4 style='text-align: center'>".$tipo."</h4>
            <p style='position: relative;'>
              <p class='inline-Block' style='position: absolute; left: 10%; top:20%'>Usuario:</p> <p style='position: absolute; left:40%; top:20%'>".$fila['user']."</p>
              <p class='inline-Block' style='position: absolute; left: 10%; top:30%'>Nombre:</p> <p style='position: absolute; left:40%; top:30%'>".$fila['nombre']."</p>
              <p class='inline-Block' style='position: absolute; left: 10%; top:40%;'>telefono:</p> <p style='position: absolute; left:40%; top:40%;'> ".$fila['telefono']."</p>
              <p class='inline-Block' style='position: absolute; left: 10%; top:50%;'>correo:</p> <p style='position: absolute; left:40%; top:50%;'> ".$fila['correo']."</p>
              <p class='inline-Block' style='position: absolute; left: 10%; top:60%'>Facebook:</p> <p style='position: absolute; left:40%; top:60%'>  ".$fila['facebook']."</p>
              
            </p>";
}
 ?>