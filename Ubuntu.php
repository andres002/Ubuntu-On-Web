
<?php 
  //echo "<script> alert('entra aqui') </script>";
   session_start();
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

  if(existe($user,$pass,$admin,$conexion)){
    $_SESSION['user']= $user;
    $_SESSION['pass']= $pass;
    $_SESSION['admin']= $admin;
  }
  if(isset($_SESSION['user']) && isset($_SESSION['pass']) && isset($_SESSION['admin'])){
 ?> 

<!DOCTYPE html>
<html>
<head>
	<title>Ubuntu</title>
	<meta charset="utf-8">
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
  <script type="text/javascript" src ="funtions.js"></script>
  <script type="text/javascript" src ="jquery-2.2.0.min.js"></script>
</head>
<body onload= "reloj(); leerUsuarios();">
  <div >
   <nav id ="navigate" >
     <div class="flex-item colorWhite">Escritorio de ubuntu</div>
     <div class="text-right">
     <i class="fa fa-volume-up colorWhite"></i>
      <i class="fa fa-battery-full inlineblock colorWhite"></i>
      <div class="flex-item text-center text-right colorWhite inlineblock" id = "hora" > 
      </div>
      <i class="fa fa-power-off colorWhite" style = "cursor:pointer;"onclick="datos1()" id="apagar"></i>
    </div>
  </nav>
   

   <div id= "datos" style="display:none;"> 
     <ul style="padding-top:2%; list-style: none;" class="colorWhite">
      <li class="text-center" style = "cursor:pointer;" onclick="datos2()">Acerca de este equipo</li>
      <li class="text-center" style = "cursor:pointer;" >
       <form method="post"><input type="submit" value="Cerrar Sesión" name="cerrar" style="background-color: transparent; border-style: none; font-family: 'Poiret One', cursive; color: white; font-size: 18px; cursor:pointer;"></input> </form></li>
       <li class="text-center" style = "cursor:pointer;" onclick="datos2()">Acerca de este equipo</li>
     </ul>
   </div>



  <nav id ="navigate3" >
     <div class="flex-item"><div style"width:10px;" class="circle2" onclick="closeStart()"><p style="position:absolute; top:-.5%; left:0.2%;">x</p></div></div>
     <div class="text-right">
     <i class="fa fa-volume-up colorWhite"></i>
      <i class="fa fa-battery-full inlineblock colorWhite"></i>
      <div class="flex-item text-center text-right colorWhite inlineblock" id = "hora" > 
      </div>
    </div>
  </nav>
</div>

<div id = "fondo"></div>
<div id = "all">
 <div id = "navigate2" class="">
 <input type="image" src="start.png" alt="Submit" class="btn" onclick="abrirStart()">
  <nav id="navigation" style = "height: 90%; width:100%; display:flex; flex-direction: column;">
    <input type="image" src="archivos-logo.png" alt="Submit" class="btn">
    <input type="image" src="firefox.png" alt="Submit" class="btn">
    <input type="image" src="chrome.png" alt="Submit" class="btn">
    <input type="image" src="libreoffice.png" alt="Submit" class="btn">
    <input type="image" src="calc.png" alt="Submit" class="btn">
  <?php if($admin == 2) { ?>
    <input type="image" src="editor.png" alt="Submit" class="btn" onclick="notesApp()">
    <input type="image" src="calculator.png" alt="Submit" class="btn" onclick='abrir()'>
  <?php }else{
    ?>
    <input type="image" src="addUser.png" alt="Submit" class="btn" onclick="usuariosApp()">
    <?php  } ?>
  </nav>
  <input type="image" src="papelera.png" alt="Submit" class="btn">
  
  </div >
  <div id="apps">
    <div id = "calc" >
    <div id = "cierracalc">
      <div class="circle" style="" onclick='closec()'><p style="left:1%; position:absolute; top:-1%;">x</p>
    </div>
    </div>
     <input type="text" id="panel" readonly>
     <div id="numeros" class="point">
       <button type="button" value="<"  onclick="calc()" class="btnNumbers"> rt </button>
       <button type="button" value="7"  onclick="calc('7')" class="btnNumbers"> 7 </button>
       <button type="button" value="4"  onclick="calc('4')" class="btnNumbers"> 4 </button>
       <button type="button" value="1"  onclick="calc('1')" class="btnNumbers"> 1 </button>
       <button type="button" value="0" style="border-right: none; text-align: right;" onclick="calc('0')" class="btnNumbers"> 0 </button>
       <button type="button" value="C"  onclick="calc('C')" class="btnNumbers"> C </button>
       <button type="button" value="8"  onclick="calc('8')" class="btnNumbers"> 8 </button>
       <button type="button" value="5"  onclick="calc('5')" class="btnNumbers"> 5 </button>
       <button type="button" value="2"  onclick="calc('2')" class="btnNumbers"> 2 </button>
       <button type="button" value="" style="border-left: none;"  onclick="calc('0')" class="btnNumbers">  </button>
       <button type="button" value="%"  onclick="calc('%')" class="btnNumbers"> % </button>
       <button type="button" value="9"  onclick="calc('9')" class="btnNumbers"> 9 </button>
       <button type="button" value="6"  onclick="calc('6')" class="btnNumbers"> 6 </button>
       <button type="button" value="3"  onclick="calc('3')" class="btnNumbers"> 3 </button>
       <button type="button" value="."  onclick="calc('.')" class="btnNumbers"> . </button>
       <button type="button" value="/"  onclick="calc('/')" class="btnNumbers"> / </button>
       <button type="button" value="*"  onclick="calc('*')" class="btnNumbers"> * </button>
       <button type="button" value="-"  onclick="calc('-')" class="btnNumbers"> - </button>
        <button type="button" value="+"  onclick="calc('+')" class="btnNumbers"> + </button>
       <button type="button" value="="  onclick="calc('=')" class="btnNumbers"> = </button>

     </div>
     </div>

        <div id= "datitos" style="display:none;"> 
         <div class="absol" style="height: 7%; width:100%; background-color: #3C3C3C;">
         <div class="circle3" style="" onclick='closedatos()'><p style="left:.7%; position:absolute; top:-2%;">x</p>
         </div>
         </div>
         <div style="width=100%; height:20%; background-color: #373737;">
           <button style="position:absolute; top: 10%; width:10%;">Detalles
           </button>k
         </div>
         <div style="width=100%; height:80%;background-color: #D6D6D6;">
         <input type="image" src="ubun.png" alt="Submit" class="btn2">
         <input type="image" src="upchiapas.png" alt="Submit" style="width: 10%; height: 20%; position: absolute; left: 80%;top:30%;" >
         <p style="position: absolute; left: 30%;top:50%; text-align:center" >  Universidad Politécnica de Chiapas <br>Programación Web<br>Ingeniería en Desarrollo de Software<br>Simulación de SO Corte 1<br>Profesor: Dr. Juan Carlos López Pimentel<br>Alumno Andrés Aguilar Cruz 143385<br>Entrega 05/02/2016 </p>
         <div style="position:absolute; width: 25%; height:65%; background-color:white; top:27%; left: 2%;">
           <ul style="padding-top:2%; list-style: none;" class="">
            <li  style = "cursor:pointer; background-color:#FF6E2B ;" onclick="">Resumen</li>
           </ul>
         </div>
         </div>
       </div>

       <div id= "notas" style="display:none"> 
         <div class="absol" style="height: 3.8%; width:100%; background-color: #3C3C3C;">
         <div class="circle3" style="" onclick='notesAppclose()'><p style="left:.7%; position:absolute; top:-2%;">x</p>
         </div>
         </div>
         <div style="width=100%; height:17%; background-color: #373737;">
           <input type="image" src="new.png" alt="Submit" style="width: 7%; height: 8%; position: absolute; left: 5%;top:6%;"
            onclick="newnote()">
           <input type="image" src="Abrir.png" alt="Submit" style="width: 7%; height: 9%; position: absolute; left:15%;top:6%;"  onclick="opennote()"> <p style=" position: absolute; left:23%;top:9%;" class="colorWhite">Abrir</p>
           <input type="image" src="save.png" alt="Submit" style="width: 7%; height: 9%; position: absolute; left:30%;top:6%;" onclick="guardarnota()"> 
           <p style=" position: absolute; left:38%;top:9%;" class="colorWhite">Guardar</p>
           <input type="image" src="remove.png" alt="Submit" style="width: 7%; height: 9%; position: absolute; left:50%;top:6%;" onclick="deletenote()"> 
         </div>
         <div style="width=100%; height:85%;background-color: #D6D6D6;">
         <textarea id = 'txNotas'; style="position:absolute; width: 65%; height:75%; background-color:white; top:20%; left: 30%;"></textarea>

         <div style="position:absolute; width: 25%; height:75%; background-color:white; top:20%; left: 2%;">
           <ul id ='listNotas' style="padding-top:2%; list-style: none;" class="">
            
           </ul>
         </div>
         </div>
       </div>




      <div id= "usuarios" style="display:none"> 
         <div class="absol" style="height: 3.8%; width:100%; background-color: #3C3C3C;">
         <div class="circle3" style="" onclick='usuariosAppclose()'><p style="left:.7%; position:absolute; top:-2%;">x</p>
         </div>
         </div>
         <div style="width=100%; height:17%; background-color: #373737;">
           <input type="image" src="new.png" alt="Submit" style="width: 7%; height: 8%; position: absolute; left: 5%;top:6%;"
            onclick="">
           <input type="image" src="editUsser.png" alt="Submit" style="width: 7%; height: 9%; position: absolute; left:15%;top:6%;"  onclick=""> <p style=" position: absolute; left:23%;top:9%;" class="colorWhite">Abrir</p>
           <input type="image" src="save.png" alt="Submit" style="width: 7%; height: 9%; position: absolute; left:30%;top:6%;" onclick=""> 
           <p style=" position: absolute; left:38%;top:9%;" class="colorWhite">Guardar</p>
           <input type="image" src="remove.png" alt="Submit" style="width: 7%; height: 9%; position: absolute; left:50%;top:6%;" onclick=""> 
         </div>
         <div style="width=100%; height:85%;background-color: #D6D6D6;">
          <div id = "divUsers"style="position:absolute; width: 65%; height:75%; background-color:white; top:20%; left: 30%;">
           
         </div>
         <div id = ""style=" display:none;position:absolute; width: 65%; height:75%; background-color:green; top:20%; left: 30%;">
         </div>

         <div style="position:absolute; width: 25%; height:75%; background-color:white; top:20%; left: 2%;">
           <ul id ='listUsers' style="padding-top:2%; list-style: none;" class="">
            
           </ul>
         </div>
         </div>
       </div>






    </div>
  

  <div  id="buscador">  
  <form >
       <i class="fa fa-search" id = "lupa"></i>
      <input type="text" id="txBuscador" placeholder="             Buscar en su equipo y en linea">
  </form>
  </div>
  


  <div id = "start">
    <div class="left5 top2 bold size20 colorGray">Aplicaciones</div>
    <div class="left5 top2 flex" style="width: 90%;
  height: 80%; align-content:space-between;">
   <input type="image" src="terminal.png" alt="Submit" class="btnApps">
   <input type="image" src="archivos-logo.png" alt="Submit" class="btnApps">
    <input type="image" src="firefox.png" alt="Submit" class="btnApps">
    <input type="image" src="chrome.png" alt="Submit" class="btnApps">
    <input type="image" src="libreoffice.png" alt="Submit" class="btnApps">
    <input type="image" src="calc.png" alt="Submit" class="btnApps">
  <?php if($admin == 2) { ?>
    <input type="image" src="editor.png" alt="Submit" class="btnApps"onclick="notesApp();">
    <input type="image" src="calculator.png" alt="Submit" class="btnApps">
    <?php
  }else{
  ?>
    <input type="image" src="addUser.png" alt="Submit" class="btnApps">
  <?php  } ?>

 
  </div>
  </div>
  <!--
  para no olvidar como hacer comentarios
  -->
</div>
</body>
</html>

<?php

 }else{
   echo "<script> alert('usuario o contraseña NO Valido(a)') </script>";
    echo '<script>window.location = "login.php"</script>';
  }

   if(isset($_POST['cerrar'])){
    session_destroy();
     echo '<script>window.location = "login.php"</script>';
  }

 ?>