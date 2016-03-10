<?php  

	function conexion($host, $userBD, $passBD, $nameBD){
	    $con = mysql_connect($host,$userBD,$passBD);
	    mysql_select_db($nameBD,$con);
	    return $con;
  	}

  	function existe(){
  		$sql2 = mysql_query("SELECT * FROM login WHERE user = '$user'");
		$fet = mysql_fetch_array($sql2);
		if($pass == $fet['pass']){
			
			$_SESSION["user"] = $fet['user'];
			$_SESSION["pass"] = $fet['pass'];
			$_SESSION["admin"] = $fet['admin'];
			echo "<script> window.location = 'datos.php';</script>";
		}else{
			echo "<script> alert('El usuario o la contraseña son invalidos')</script>";
			echo "<script> window.location = 'index.php'; </script>";
		}

  	}




	/*$conecc = mysql_connect("localhost", "root", "") or die("No se pudo realizar la coneccion");
	if($conecc){
		mysql_select_db("sistema_operativo", $conecc) or die ("No se encsontró la base de datos");
	}*/	
?>