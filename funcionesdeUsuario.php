<?php 

include "conexion.php";
 if(isset($_POST['accion'])){
    switch ($_POST['accion']) {
      case 'openUser':
        infoUser();
        break;

      case 'editar':
        editUser();
        break;

      case 'guardaEdicion':
        actualizar();
        break;

      case 'nuevo':
        nuevo();
        break;

      case 'deleteUser':
        deleteUser();
        break;
      
      default:
        break;
    }
  } 


function infoUser(){
	$user = $_POST['usuario'];
	$conexion = conexion('localhost', 'root', '', 'sistema_operativo');
	$comando = "SELECT * FROM login WHERE user = '$user'";
	$resultado = mysqli_query($conexion,$comando);
	$fila = mysqli_fetch_array($resultado);
	if($fila['admin'] == 1) {
		$tipo =  "Administrador";
	}else{
		$tipo =  "Usuario";
	}
	echo " <h4 style='text-align: center'>".$tipo."</h4>
            <p style='position: relative;'>
              <p class='inline-Block' style='position: absolute; left: 10%; top:20%'>Usuario:</p> <p id = 'subParrafo'  style='position: absolute; left:40%; top:20%'>".$fila['user']."</p>
              <p class='inline-Block' style='position: absolute; left: 10%; top:30%'>Nombre:</p> <p style='position: absolute; left:40%; top:30%'>".$fila['nombre']."</p>
              <p class='inline-Block' style='position: absolute; left: 10%; top:40%;'>telefono:</p> <p style='position: absolute; left:40%; top:40%;'> ".$fila['telefono']."</p>
              <p class='inline-Block' style='position: absolute; left: 10%; top:50%;'>correo:</p> <p style='position: absolute; left:40%; top:50%;'> ".$fila['correo']."</p>
              <p class='inline-Block' style='position: absolute; left: 10%; top:60%'>Facebook:</p> <p style='position: absolute; left:40%; top:60%'>  ".$fila['facebook']."</p>
              
            </p>";
}


function editUser(){
	$user = $_POST['usuario'];
	$conexion = conexion('localhost', 'root', '', 'sistema_operativo');
	$comando = "SELECT * FROM login WHERE user = '$user'";
	$resultado = mysqli_query($conexion,$comando);
	$fila = mysqli_fetch_array($resultado);
	if($fila['admin'] == 1) {
		$tipo =  "<option value='1'>Administrador</option>
                <option value='2'>Usurio</option>";
	}else{
		$tipo =  "<option value='2'>Usuario</option>
                <option value='1'>Administrador</option>";
	}
	echo " <form>
			<p style='text-align: center'>
              <select id = 'inputTipo'>".
                $tipo
              ."</select>
              </p>
            <p style='position: relative;'>
              <p class='inline-Block' style='position: absolute; left: 10%; top:20%'>Usuario:</p> <input type='text' id = 'inputUser'  style='position: absolute; left:40%; top:20%' value = '".$fila['user']."' required></input>
              <p class='inline-Block' style='position: absolute; left: 10%; top:30%'>Nombre:</p> <input id = 'inputNombre' type='text' style='position: absolute; left:40%; top:30%' value = '".$fila['nombre']."' required></input>
              <p class='inline-Block' style='position: absolute; left: 10%; top:40%;'>telefono:</p> <input id = 'inputTelefono' type='number' style='position: absolute; left:40%; top:40%;' value = '".$fila['telefono']."' required></p>
              <p class='inline-Block' style='position: absolute; left: 10%; top:50%;'>correo:</p> <input type='email' id = 'inputCorreo' style='position: absolute; left:40%; top:50%;' value = '".$fila['correo']."' required></input>
              <p class='inline-Block' style='position: absolute; left: 10%; top:60%'>Facebook:</p> <input id = 'inputFacebook' style='position: absolute; left:40%; top:60%' value = '".$fila['facebook']."' required></input>
              <p class='inline-Block' style='position: absolute; left: 10%; top:70%'>Contraseña:</p> <input id = 'inputPassword' style='position: absolute; left:40%; top:70%' value = '".$fila['password']."'  required></input>
              
            </p>
            </form>";

}

function actualizar (){
  $usuario = $_POST['usuarioconsulta'];
  $user = $_POST['user'];
  $password = $_POST['password'];
  $nombre = $_POST['nombre'];
  $admin = $_POST['admin'];
  $telefono = $_POST['telefono'];
  $correo = $_POST['correo'];
  $facebook = $_POST['facebook'];
  
  $conexion = conexion('localhost', 'root', '', 'sistema_operativo');
  $comando = "UPDATE login SET user='$user', password='$password', nombre='$nombre', admin='$admin', telefono ='$telefono', correo='$correo', facebook = '$facebook' WHERE user='$usuario'";

  $resultado = mysqli_query($conexion,$comando);
  
  echo "<script>alert(".$resultado.")</script>";
	
}


function nuevo(){
  $user = $_POST['user'];
  $password = $_POST['password'];
  $nombre = $_POST['nombre'];
  $admin = $_POST['admin'];
  $telefono = $_POST['telefono'];
  $correo = $_POST['correo'];
  $facebook = $_POST['facebook'];

  $conexion = conexion('localhost', 'root', '', 'sistema_operativo');
  $comando = "INSERT INTO login (user, password, nombre, admin, telefono, correo, facebook) VALUES ('$user','$password','$nombre','$admin','$telefono','$correo', '$facebook');";

  $resultado = mysqli_query($conexion,$comando);
  if($resultado){
    echo "<script>alert('Añadido correctamente')</script>";
  }else{
    echo "<script>alert('No se pudo añadir')</script>";
  }

}


function deleteUser(){
  $user = $_POST['user'];
  $conexion = conexion('localhost', 'root', '', 'sistema_operativo');
 echo "<script>alert('llega a aqui')</script>";
  $comando = "DELETE FROM login WHERE user='$user';";

  $resultado = mysqli_query($conexion,$comando);
  if($resultado){
    echo "<script>alert('eliminado correctamente')</script>";
  }else{
    echo "<script>alert('No se pudo eliminar')</script>";
  }
  
  

}



 ?>