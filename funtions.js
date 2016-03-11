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
	$("#listUsers").load('cargaUsuarios.php');
	$("#saveIcon").attr("disabled","");
}


function openUser($user) {

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
	$("#saveIcon").attr("disabled","");
	$("#divUsers").fadeIn(400);
	$("#divUsersEditar").fadeOut(200);
	openUser($user);
}


function divEditar(){
	$("#saveIcon").removeAttr("disabled","");
	$user = $('#subParrafo').text();
	//document.getElementById('divUsers').style.display="none";
	$("#divUsersEditar").fadeIn(400);
	$("#divUsers").fadeOut(200);
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


function editUsers($user) {
	$.ajax({
		url: 'funcionesdeUsuario.php',
		data: {accion:'editar',usuario:$user},
		type: 'POST',
		datatype:"html",
		success: function(data) {
			//alert(contenido);
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
	if(txNotas != ""){
		document.getElementById("listNotas").innerHTML = document.getElementById('listNotas').innerHTML+"<li id = 'nota"+ count+"'"+" type='none' onclick='opennote(this.id)' style = 'cursor:pointer; background-color:#FF6E2B;'>"+txNotas+"</li";
		document.getElementById("txNotas").value="";
		count++;
	}

}

function guardarUsuario(){
	var txNotas  = document.getElementById('txNotas').value;
	if(txNotas != ""){
		document.getElementById("listNotas").innerHTML = document.getElementById('listNotas').innerHTML+"<li id = 'nota"+ count+"'"+" type='none' onclick='opennote(this.id)' style = 'cursor:pointer; background-color:#FF6E2B;'>"+txNotas+"</li";
		document.getElementById("txNotas").value="";
		count++;
	}

}

function actualizarUser(){
	
}


    

function opennote(id){
	document.getElementById("txNotas").value = document.getElementById(id).innerHTML;
}

function newnote(id){
	//guardarnota();
	document.getElementById("txNotas").value = "";
}


function deletenote(){
	var notita = document.getElementById("txNotas").value;
   var notitas = document.getElementById("listNotas").value;
   var lista_notas = document.getElementsByTagName("li");


   for(var i = 0; i<lista_notas.length;i++){

      if (lista_notas[i].innerHTML == notita) {
         lista_notas[i].parentNode.removeChild(lista_notas[i]);
      };
   }
   document.getElementById("txNotas").value = "";
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