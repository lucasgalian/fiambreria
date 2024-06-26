<?php 
    include 'conexion.php';
    include 'articulos.php';

    class DAOProducto{
        private $conexion;

        public function __construct(){

        }
        public function conectar(){
            $this->conexion = new mysqli();

        }
        public function desconectar(){
            $this->conexion->cerrar();
        }
        public function getTabla(){
            $sql="select * from producto";
            $this->conectar();
            $this->conexion->query($sql);
            $this->desconectar();
        }
    }

    $obj= new DAOProducto();
    echo $obj->getTabla();
?>