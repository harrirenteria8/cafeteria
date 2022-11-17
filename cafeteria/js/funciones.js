let _id_seleccion;
var dato; 

$("#btn_guardar").show()
$("#btn_modificar").hide()

function editbtn(){
	$("#btn_guardar").hide()
	$("#btn_modificar").show()
}

function selectregistro(id){
	_id_seleccion = id;

	$.ajax({
		url: 'class/ajaxphp.php',
		type: 'POST',
		dataType: 'json',
		data: {
			accion: 'buscar',
			tabla: 'producto',
			campo: 'id',
			valor: _id_seleccion
		},
	})
	.always(function(data) {
		
		var stringified = JSON.stringify(data);
		var parsedObj = JSON.parse(stringified);
		console.log(parsedObj[0].precio);

		$("#nombre_producto").val(parsedObj[0].nombre_producto);
		$("#referencia").val(parsedObj[0].referencia);
		$("#precio").val(parsedObj[0].precio);
		$("#peso").val(parsedObj[0].peso);
		$("#categoria").val(parsedObj[0].categoria);
		$("#stock").val(parsedObj[0].stock);
		$("#fecha").val(parsedObj[0].fecha);
	});
}



function eliminar()
{
	let text;
	if (confirm("Realmente desea eliminar el registro") == true)
	{
	  alert(" se eliminara el registro " + _id_seleccion);


		  $.ajax({
		  	url: 'class/ajaxphp.php',
		  	type: 'POST',
		  	dataType: 'text',
		  	data: {
		  		accion: 'eliminar',
		  		id: _id_seleccion
		  	},
		  })
		  .always(function(data) {
		  	alert(data);
		  	window.top.location.reload();
		  });		  
	} 
	else 
	{
 
	}
}


function crearProducto(){

	if (confirm("Realmente desea agregar este registro") == true){


		$.ajax({
			url: 'class/ajaxphp.php',
			type: 'POST',
			dataType: 'text',
			data: {
				accion: 'agregar',
				id: $("#id").val(),
				nombre_producto: $("#nombre_producto").val(),
				referencia: $("#referencia").val(),
				precio: $("#precio").val(),
				peso: $("#peso").val(),
				categoria: $("#categoria").val(),
				stock: $("#stock").val(),
				fecha: $("#fecha").val()
			},
		})
		.always(function(data) {
			alert(data);
		  	window.top.location.reload();

		});
	}else{

	}
}


function crearProducto(){
	if (confirm("Realmente desea agregar este registro") == true){
		$.ajax({
			url: 'class/ajaxphp.php',
			type: 'POST',
			dataType: 'text',
			data: {
				accion: 'agregar',
				id: $("#id").val(),
				nombre_producto: $("#nombre_producto").val(),
				referencia: $("#referencia").val(),
				precio: $("#precio").val(),
				peso: $("#peso").val(),
				categoria: $("#categoria").val(),
				stock: $("#stock").val(),
				fecha: $("#fecha").val()
			},
		})
		.always(function(data) {
			alert(data);
		  	window.top.location.reload();
			
		});
	}else{
	}
}


function editarRegistro(){

	$.ajax({
		url: 'class/ajaxphp.php',
		type: 'POST',
		dataType: 'text',
		data: {
			accion: 'modificar',
			tabla: 'producto',
			campo: 'id',
			valor: _id_seleccion,
			id: $("#id").val(),
			nombre_producto: $("#nombre_producto").val(),
			referencia: $("#referencia").val(),
			precio: $("#precio").val(),
			peso: $("#peso").val(),
			categoria: $("#categoria").val(),
			stock: $("#stock").val(),
			fecha: $("#fecha").val()
		},
	})
	.always(function(data) {
		alert(data);
		window.top.location.reload();

	});
	

}


function buscarProducto(){
	if ($("#reference").val() != "") {
	$.ajax({
		url: 'class/ajaxphp.php',
		type: 'POST',
		dataType: 'json',
		data: {
			accion: 'buscar_prod_cod',
			tabla: 'producto',
			valor: $("#reference").val()
		},
	})
	.always(function(data) {
		
		var stringified = JSON.stringify(data);
		var parsedObj = JSON.parse(stringified);
		console.log(data);

		if (parsedObj[0].stock > 0) {
			$("#nombre_pro").val(parsedObj[0].nombre_producto);
			$("#stock_pro").val(parsedObj[0].stock);
			$("#precio_pro").val(parsedObj[0].precio);
			$("#_id_producto").val(parsedObj[0].id);
		}else{
			alert("No es posible realizar la venta por falta de stock en el inventario");
			$("#reference").val("");
			$("#stock_pro").val("");
			$("#precio_pro").val("");
			$("#nombre_pro").val("");
			$("#cantidad_compra").val("");
			$("#reference").focus();

		}




		

	});

	}
}



var x= 0, x2 = 0;
var totalfactura = 0;

function agregarProductos(){





	totalfactura = totalfactura + $("#cantidad_compra").val()*$("#precio_pro").val();

	x++;

    cadena = "<tr>";
    cadena = cadena + "<td class='idprod'>" + $("#_id_producto").val() + "</td>";
    cadena = cadena + "<td class='nomprod'>" + $("#nombre_pro").val() + "</td>";
    cadena = cadena + "<td class='precioprod'>" + $("#precio_pro").val() + "</td>";
    cadena = cadena + "<td class='cantprod'>" + $("#cantidad_compra").val() + "</td>";
    cadena = cadena + "<td class='subtotal'>" + $("#cantidad_compra").val()*$("#precio_pro").val() + "</td>";
    cadena = cadena + "<td></td>";
    $("#grilla tbody").append(cadena);


    $("#totalventa").empty();
    $("#totalventa").html("Total : $" + totalfactura);


	$("#reference").val("");
	$("#stock_pro").val("");
	$("#precio_pro").val("");
	$("#nombre_pro").val("");
	$("#cantidad_compra").val("");




            
}

var msg;
function guardarFactura(factura){

	let materiales = [];
	

	document.querySelectorAll('#grilla tbody tr').forEach(function(e){
		
	 
	  $.ajax({
	  	url: 'class/ajaxphp.php',
	  	type: 'POST',
	  	dataType: 'text',
	  	data: {
	  		accion: 'vender',
	  		factura: factura,
	  		codigo: e.querySelector('.idprod').innerText,
	  		nombre: e.querySelector('.nomprod').innerText,
	  		precio: e.querySelector('.precioprod').innerText,
	  		cantidad: e.querySelector('.cantprod').innerText,
	  		subtotal: e.querySelector('.subtotal').innerText

	  	},
	  })
	  .always(function(data) {
	  	x2++;
	  	if (x2 == x) {
	  		alert(data);
			window.top.location.reload();
	  	}
	  	
	  });  
	});

	console.log(materiales);

}