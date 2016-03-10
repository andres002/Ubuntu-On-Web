<?php  
	
	function conexion($host, $userBD, $passBD, $nameBD){
	    $con = mysqli_connect($host,$userBD,$passBD,$nameBD);
	    //mysqli_connect($nameBD,$con);
	    if (!$con) {
		    echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
		    echo "errno de depuración: " . mysqli_connect_errno() . PHP_EOL;
		    echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
		    exit;
		}
	    return $con;
  	}


  	function existe($user,$pass,$admin, $con){
  		$consulta = "SELECT * FROM login WHERE user = '$user' AND password='$pass' AND admin = $admin" ;
  		$result = mysqli_query($con,$consulta);
		$fet = mysqli_fetch_array($result);
		$filas = mysqli_num_rows($result);
		if ($filas > 0) {

			return true;
		}
		return false;

  	}

?>