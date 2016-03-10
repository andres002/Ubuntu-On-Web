<meta charset="utf-8">
<?php  
	session_start();
?>

<?php 
	require ("coneccion.php");

	if(isset($_POST['entrar'])){
		$user = $_POST['usuario'];
		$pass = $_POST['pass'];


		$sql2 = mysql_query("SELECT * FROM login WHERE user = '$user'");
		$fet = mysql_fetch_array($sql2);
		if($pass == $fet['pass']){
			
			$_SESSION["user"] = $fet['user'];
			$_SESSION["pass"] = $fet['pass'];
			echo "<script> window.location = 'datos.php';</script>";
		}else{
			echo "<script> alert('El usuario o la contraseña son invalidos')</script>";
			echo "<script> window.location = 'index.php'; </script>";
		}

	}
?>