<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php 
  echo "<script> alert('entra aqui') </script>";
  include 'conexion.php';
  
  $conexion = conexion('localhost', 'root', '', 'sistema_operativo');
  $user = null; $pass = null; $admin = 0;
 
  if(isset($_POST['entrarAdmin'])){
    $user = 'root';
    $pass = $_POST['pass'];
    $admin = 1;
  }else if(isset($_POST['entrar'])){
    $user = $_POST['user'];
    $pass = $_POST['pass'];
    $admin = 2;

  } 
  if(existe($user,$pass,$admin)){
    $_SESSION['user']= $username;
    $_SESSION['pass']= $password;
    $_SESSION['admin']= $admin;
  }else{
    echo "<script> alert('usuario o contraseña NO Valido(a)') </script>";
     header("location:login.php");
  }
 
 ?>
</body>
</html>