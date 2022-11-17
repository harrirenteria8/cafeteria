<?php

class DB{
    private $dbHost     = "localhost";
    private $dbUsername = "root";
    private $dbPassword = "";
    private $dbName     = "cafeteria";
    
    public function __construct(){
        if(!isset($this->db)){
            $conn = new mysqli($this->dbHost, $this->dbUsername, $this->dbPassword, $this->dbName);
            if($conn->connect_error){
                die("Error al conectar en la base de datos: " . $conn->connect_error);
            }else{
                $this->db = $conn;
            }
        }
    }
    
    public function getRegistros($tabla){
        $sql = 'select * from ' . $tabla;
        $result = $this->db->query($sql);
        return $result;
    }


    public function insertRegistro($tabla){
        $sql = "INSERT INTO ".$tabla." (id, nombre_producto, referencia, precio, peso, categoria, stock, fecha) VALUES(Null, '".$_POST['nombre_producto']."','".$_POST['referencia']."','".$_POST['precio']."','".$_POST['peso']."','".$_POST['categoria']."','".$_POST['stock']."','".$_POST['fecha']."')";
        $result = $this->db->query($sql);
        if ($result) {
            echo "insertado";
        }else{
            echo "error al insertar datos";
        }

    }

    public function deleteRegistro($tabla, $campo, $id){

        $sql = 'delete from ' . $tabla . ' where ' . $campo . '=' . $id ;

        $result = $this->db->query($sql);

        if ($result) {
            echo "registro eliminado";
        }else{
            echo "error al eliminar registro";
        }

    }


    public function buscar($tabla, $campo, $valor){
        $resultado = array();
        $sql = 'Select * from ' . $tabla . ' where ' . $campo . '=' . $valor;
        $result = $this->db->query($sql);

        while($resultado = $result->fetch_assoc()) {
        $datos[] = $resultado;
        }
        echo json_encode($datos);

    }

    public function buscar_producto($tabla, $valor){
        $resultado = array();
        $sql = 'SELECT * FROM '.$tabla.' WHERE nombre_producto LIKE "%'.$valor.'%" or referencia LIKE "%'.$valor.'%" ';
        $result = $this->db->query($sql);

        while($resultado = $result->fetch_assoc()) {
        $datos[] = $resultado;
        }
        echo json_encode($datos);

    }

    public function editRegistro(){

        $sql = "UPDATE producto SET nombre_producto='".$_POST['nombre_producto']."',referencia='".$_POST['nombre_producto']."',precio='".$_POST['precio']."',peso='".$_POST['peso']."',categoria='".$_POST['categoria']."',stock='".$_POST['stock']."',fecha='".$_POST['fecha']."' WHERE id='".$_POST['valor']."' ";
        
        $result = $this->db->query($sql);
        if ($result) {
            echo "Registro Modificado correctamente";
        }else{
            echo "error al modificar el Registro";
        }

    }





    public function insertVenta($tabla){
        $sql = "INSERT INTO ".$tabla." (id, factura, id_producto, cantidad, precio, fecha_venta) VALUES (Null,
                        '".$_POST['factura']."', '".$_POST['codigo']."', '".$_POST['cantidad']."', '".$_POST['precio']."', '".date('Y-m-d')."')";



        $result = $this->db->query($sql);
        if ($result) {
            $sql = "UPDATE `producto` SET `stock` = stock-".$_POST['cantidad']." WHERE `id` = '".$_POST['codigo']."'";
        $result = $this->db->query($sql);
            echo "Venta Registrada ";
        }else{
            echo "error al registar la venta";
        }

    }


   



}