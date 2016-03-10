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
	$('#calc').fadeOut(500);
}

function abrir(){
	$('#calc').fadeIn(500);
}

function closeStart(){
	$('#start').fadeOut(500);
	$('#buscador').fadeOut(500);
	
	document.getElementById("navigate3").style.display="none";
	document.getElementById("navigate").style.display="flex";
	document.getElementById("apps").style.filter="none";
	document.getElementById("navigation").style.filter="none";
	//document.getElementById("buscador").style.display="none";
}

function abrirStart(){
	$('#start').fadeIn(500);
	$('#buscador').fadeIn(500);

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
	$('#notas').fadeIn(500);
}

function notesAppclose(){
	$('#notas').fadeOut(500);
}

function datos1(){
	$('#datos').fadeIn(500);
}

function datos2(){
	$('#andres').fadeIn(500);
	$('#datos').fadeOut(500);
}

function closedatos(){
	$('#andres').fadeOut(500);
}

/*$(document).ready(function{
	$('#notas').draggable();
	$('#andres').draggable();
	$('#calc').draggable();
});*/