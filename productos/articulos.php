<?php include "conexion.php";
class Producto {
    private $codigo;
    private $nombre;
    private $cantidad;
    private $precio;

    public function Producto(){
        $this->codigo="";
        $this->nombre="";
        $this->cantidad="";
        $this->precio="";
    }
    
    public function getCodigo(){
        return $this->codigo;
    }
    public function setCodigo($codigo){
        $this->codigo=$codigo;
    }
    public function getNombreProducto(){
        return $this->nombre;
    }
    public function setNombreProducto($nombre){
        $this->nombre=$nombre;
    }
    public function getCantidad(){
        return $this->cantidad;
    }
    public function setCantidad($cantidad){
        $this->cantidad=$cantidad;
    }
    public function getPrecio(){
        return $this->precio;
    }
    public function setPrecio($precio){
        $this->precio=$precio;
    }
}

    function __construct()
    {
        parent::__construct();
    }
    public function getProducto($id_producto){
        $sql = "SELECT * FROM productos WHERE id_producto = '$id_producto'";
        $result = $this->conection->query($sql);
    {
    public function getItemsByCategoria($categoria){

    }    
    }
}

?>