function reloj(){
	ahora = new Date();
	hora = ahora.getHours();
	minuto = ahora.getMinutes();

	if(minuto <= 9){
		minuto = "0" + minuto
	}

	if(hora <= 9){
		hora = "0" + hora
	}
	horaFin = hora + ":" + minuto;
	document.getElementById("hora").innerHTML = horaFin;
}




function leerUsuarios(){
	alert("entra");
	$("#listUsers").load('cargaUsuarios.php');
	$("#listNotas").load('cargarNotas.php');
	$("#saveIcon").attr("disabled","");
	$("#saveIcon2").hide();
}



function openUser($user) {
	$("#saveIcon2").hide();
	$("#saveIcon").attr("disabled","");
	$("#divUsers").fadeIn(400);
	$("#divUsersEditar").fadeOut(200);
	$('#divUsersAnadir').fadeOut(200);
	$.ajax({
		url: 'funcionesdeUsuario.php',
		data: {accion:'openUser',usuario:$user},
		type: 'POST',
		datatype:"html",
		success: function(data) {
			//alert(contenido);
			$('#divUsers').html(data);
		}
	});
}

function regresaEstado($user){
	openUser($user);
}


function divEditar(){
	$("#saveIcon2").hide();
	$("#saveIcon").removeAttr("disabled","");
	$user = $('#subParrafo').text();
	//document.getElementById('divUsers').style.display="none";
	$("#divUsersEditar").fadeIn(400);
	$("#divUsers").fadeOut(200);
	$('#divUsersAnadir').fadeOut(200);
	$.ajax({
		url: 'funcionesdeUsuario.php',
		data: {accion:'editar',usuario:$user},
		type: 'POST',
		datatype:"html",
		success: function(data) {
			$('#divUsersEditar').html(data);
		}
	});

}


function calc (elemento) {
	var panel = document.getElementById("panel");

	switch(elemento){
		case 'C':
			panel.value = "";
		break;

		case '=':
			panel.value=eval(panel.value);
		break;

		default:
			panel.value=panel.value + elemento;
		break;

	}
}

function closec(){
	$('#calc').fadeOut(300);
}

function abrir(){
	$('#calc').fadeIn(300);
}

function closeStart(){
	$('#start').fadeOut(300);
	$('#buscador').fadeOut(300);
	
	document.getElementById("navigate3").style.display="none";
	document.getElementById("navigate").style.display="flex";
	document.getElementById("apps").style.filter="none";
	document.getElementById("navigation").style.filter="none";
	//document.getElementById("buscador").style.display="none";
}

function abrirStart(){
	$('#start').fadeIn(300);
	$('#buscador').fadeIn(300);

	document.getElementById("buscador").style.display="flex";
	document.getElementById("navigate3").style.display="flex";
	document.getElementById("navigate").style.display="none";
	document.getElementById("apps").style.filter="blur(2px)";
	document.getElementById("navigation").style.filter="blur(2px)";
	
}

var count = 0;

function guardarnota(){
	var txNotas  = document.getElementById('txNotas').value;
	var txNotasname  = document.getElementById('txNotas').name;
	if(txNotas.trim() != ""){


		alert("si esta pasando");
	$.ajax({
		url: 'funcionesdeUsuario.php',
		data: {accion:'guardarNota',nota:txNotas,id:txNotasname},
		type: 'POST',
		datatype:"html",
		success: function(data) {
			//$('#divUsersAnadir').append(data);
			alert(data);
		}
	}).done(function() {
  		$("#listNotas").load('cargarNotas.php');
		});
	}

}

/*function guardarUsuario(){
	var txNotas  = document.getElementById('txNotas').value;
	if(txNotas != ""){
		document.getElementById("listNotas").innerHTML = document.getElementById('listNotas').innerHTML+"<li id = 'nota"+ count+"'"+" type='none' onclick='
		(this.id)' style = 'cursor:pointer; background-color:#FF6E2B;'>"+txNotas+"</li";
		document.getElementById("txNotas").value="";
		count++;
	}

}*/

function actualizarUser(){
	var usuarioM = $('#subParrafo').text();
	var tipos = [];
	tipos[0] = $('#inputTipo').val();
	tipos[1] = $('#inputUser').val();
	tipos[2] = $('#inputNombre').val();
	tipos[3] = $('#inputTelefono').val();
	tipos[4] = $('#inputCorreo').val();
	tipos[5] = $('#inputFacebook').val();
	tipos[6] = $('#inputPassword').val();

	for (var i = 0; i < tipos.length; i++) {
		if(isnull(tipos[i])){
			alert("Uno o mas campos están vacios, por favor rellenelos");
			return;
		}
	}

	if(!verificaCorreo(tipos[4])){
		alert("por favor ingrese un correo valido");
			return;
	}
	//alert(usuarioM);

	$.ajax({
		url: 'funcionesdeUsuario.php',
		data: {accion:'guardaEdicion',usuarioconsulta:usuarioM,user:tipos[1], password:tipos[6], nombre:tipos[2], admin:tipos[0], telefono:tipos[3], correo:tipos[4], facebook:tipos[5]},
		type: 'POST',
		datatype:"html",
		success: function(data) {
			$('#divUsersEditar').html(data);
		}
	}).done(function() {
  		$("#listUsers").load('cargaUsuarios.php');
		});
}

function divAnadirUser(){
	$("#divUsersEditar").fadeOut(200);
	$("#divUsers").fadeOut(200);
	$('#divUsersAnadir').fadeIn(400);
	$("#saveIcon2").show();
	
}

function anadirUser(){
	var tipos = [];
	tipos[0] = $('#inputTipo2').val();
	tipos[1] = $('#inputUser2').val();
	tipos[2] = $('#inputNombre2').val();
	tipos[3] = $('#inputTelefono2').val();
	tipos[4] = $('#inputCorreo2').val();
	tipos[5] = $('#inputFacebook2').val();
	tipos[6] = $('#inputPassword2').val();


	for (var i = 0; i < tipos.length; i++) {
		if(isnull(tipos[i])){
			alert("Uno o mas campos están vacios, por favor rellenelos");
			return;
		}
	}

	if(!verificaCorreo(tipos[4])){
		alert("por favor ingrese un correo valido");
			return;
	}

	$.ajax({
		url: 'funcionesdeUsuario.php',
		data: {accion:'nuevo',user:tipos[1], password:tipos[6], nombre:tipos[2], admin:tipos[0], telefono:tipos[3], correo:tipos[4], facebook:tipos[5]},
		type: 'POST',
		datatype:"html",
		success: function(data) {
			$('#divUsersAnadir').append(data);
		}
	}).done(function() {
  		$("#listUsers").load('cargaUsuarios.php');
		});

	
}


function removeDiv() {
	var user = $('#subParrafo').text();
	$.ajax({
		url: 'funcionesdeUsuario.php',
		data: {accion:'deleteUser', user:user},
		type: 'POST',
		datatype:"html",
		success: function(data) {
			//alert(contenido);
			$('#divUsers').append(data);
		}
	}).done(function() {
  		$("#listUsers").load('cargaUsuarios.php');
		});

	
}




function isnull(variable){
	if(variable.trim() === "" || variable.trim() === null){
		return true;
	}
	return false;
}

function verificaCorreo(variable){
	var res = variable.split("@");
	if(res.length != 2){
		return false
	}
	var res2 = res[1].split(".");
	if(res2.length != 2){
		return false;
	}
	return true;
}


    

function opennote(id){

	document.getElementById("txNotas").value = document.getElementById(id).innerHTML;
	document.getElementById("txNotas").name = id;
}

function newnote(){
	document.getElementById("txNotas").name = "";
	document.getElementById("txNotas").value = "";
}


function deletenote(){
	var id = document.getElementById("txNotas").name;

  $.ajax({
		url: 'funcionesdeUsuario.php',
		data: {accion:'deleteNota', id2:id},
		type: 'POST',
		datatype:"html",
		success: function(data) {
			//alert(contenido);
			//$('#divUsers').append(data);
		}
	}).done(function() {
  		$("#listNotas").load('cargarNotas.php');
		});

   document.getElementById("txNotas").value = "";
   document.getElementById("txNotas").name="";
}



function notesApp(){
	$('#notas').fadeIn(300);
}

function notesAppclose(){
	$('#notas').fadeOut(300);
}

function usuariosApp(){
	$('#usuarios').fadeIn(300);
}

function usuariosAppclose(){
	$('#usuarios').fadeOut(300);
}


function datos1(){
	$('#datos').fadeIn(300);
	 $('#apagar').dblclick(function() {
	  $('#datos').fadeOut(300);
		});
}

function datos2(){
	$('#datitos').fadeIn(300);
	$('#datos').fadeOut(300);
}

function closedatos(){
	$('#datitos').fadeOut(300);
}



/*$(document).ready(function{
	$('#notas').draggable();
	$('#datitos').draggable();
	$('#calc').draggable();
});*/