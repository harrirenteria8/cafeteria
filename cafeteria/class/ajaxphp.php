<?php 

require_once("conexion.php");
$db = new DB();


if ($_POST['accion'] == 'eliminar'){
	$db->deleteRegistro('producto','id', $_POST['id']);
}

if ($_POST['accion'] == 'agregar'){
	$db->insertRegistro('producto');
}


if ($_POST['accion'] == 'modificar'){
	$db->editRegistro('producto');
}

if ($_POST['accion'] == 'buscar'){
	$db->buscar('producto', 'id', $_POST['valor']);
}

if ($_POST['accion'] == 'buscar_prod_cod'){
	$db->buscar_producto($_POST['tabla'], $_POST['valor']);
}

if ($_POST['accion'] == 'vender'){
	$db->insertVenta('venta');

}

?>