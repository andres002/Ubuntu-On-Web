<!DOCTYPE html5>
<html lang="es">
<head>
  <meta charset="utf-8"/>
  <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css"/>
  <link rel="stylesheet" type="text/css" href="style.css"/>
  <title>Login</title>
</head>
<body>
  <nav id="navigate">
    <div class="flex-item colorWhite">Toshiba-Satellite</div>
    <div class="text-right"><i class="fa fa-volume-up colorWhite"></i><i class="fa fa-battery-full inlineblock colorWhite"> </i>
      <div id="hora" class="flex-item text-center text-right colorWhite inlineblock"> </div><i style="cursor:pointer;" class="fa fa-power-off colorWhite"></i>
    </div>
  </nav>
  <div class="principal">
    <div class= "logUsers">
      <div class="logAdmin">
      <p class="em1-2 colorWhite"  >Administrador</p><br/>
      <div>
        <form class="" action="index.html" method="post">
          <input type="password" id="pass" placeholder="Contraseña" required name = "pass" class="inputLogs"></input>
          <input type="submit" value=">" name = "entrar" class="btnLogs colorWhite"></input>
        </form>
        </div>
      </div>
       <div class="logUser">
        <form class="" action="index.html" method="post">
          <input style= "position: absolute; top: 10%;"type="text" id="pass" placeholder="Usuario" required name = "pass" class="inputLogs"></input><br/>
          <input   style= "position: absolute; top: 50%;" type="password" id="pass" placeholder="Contraseña" required name = "pass" class="inputLogs"></input>
          <input style= "position: absolute; top: 50%; left:75%;" type="submit" value=">" name = "entrar" class="btnLogs colorWhite"></input>
        </form>
      </div>
      </div>
      <?php
        session_start();
        if(isset($_POST['salir'])){
          session_destroy();
        }
        if(isset($_SESSION['username']) && isset($_SESSION['password']) &&
          isset($_SESSION['id'])){
          header("location:index.php");
        }
    ?>
  </div>
  

</body>
</html>
