<?php

class Pedido {
  private $id;
  private $usuario_id;
  private $provincia;
  private $localidad;
  private $direccion;
  private $coste;
  private $estado;
  private $fecha;
  private $hora;

  private $db;

  public function __construct() {
    $this->db = Database::connect();
  }

  //create all getters and setters
    function getId() {
        return $this->id;
    }

    function getUsuario_id() {
        return $this->usuario_id;
    }

    function getProvincia() {
        return $this->provincia;
    }

    function getLocalidad() {
        return $this->localidad;
    }

    function getDireccion() {
        return $this->direccion;
    }

    function getCoste() {
        return $this->coste;
    }

    function getEstado() {
        return $this->estado;
    }

    function getFecha() {
        return $this->fecha;
    }

    function getHora() {
        return $this->hora;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setUsuario_id($usuario_id) {
        $this->usuario_id = $usuario_id;
    }

    function setProvincia($provincia) {
        $this->provincia = $this->db->real_escape_string($provincia);
    }

    function setLocalidad($localidad) {
        $this->localidad = $this->db->real_escape_string($localidad);
    }

    function setDireccion($direccion) {
        $this->direccion = $this->db->real_escape_string($direccion);
    }

    function setCoste($coste) {
        $this->coste = $coste;
    }

    function setEstado($estado) {
        $this->estado = $estado;
    }

    function setFecha($fecha) {
        $this->fecha = $fecha;
    }

    function setHora($hora) {
        $this->hora = $hora;
    }

    //get all products

    public function getAll() {
      $productos = $this->db->query("SELECT * FROM pedidos ORDER BY id DESC;");
      return $productos;
    }


  //get products by category
  public function getAllCategory() {
    $sql = "SELECT p.*, c.nombre AS 'catnombre' FROM productos p "
            . "INNER JOIN categorias c ON c.id = p.categoria_id "
            . "WHERE p.categoria_id = {$this->getCategoria_id()} "
            . "ORDER BY id DESC;";
    $productos = $this->db->query($sql);
    return $productos;
  }


  //get random products
  public function getRandom($limit) {
    $productos = $this->db->query("SELECT * FROM productos ORDER BY RAND() LIMIT $limit;");
    return $productos;
  }

  //getOne
  public function getOne() {
    $producto = $this->db->query("SELECT * FROM pedidos WHERE id = {$this->getId()};");
    return $producto->fetch_object();
  }

  //getOneByUser
  public function getOneByUser() {
    $sql = "SELECT p.id, p.coste FROM pedidos p "
            . "WHERE p.usuario_id = {$this->getUsuario_id()} ORDER BY id DESC LIMIT 1;";
    $pedido = $this->db->query($sql);
    return $pedido->fetch_object();
  }

  //get all products by user
  public function getAllByUser() {
    $sql = "SELECT p.* FROM pedidos p "
            . "WHERE p.usuario_id = {$this->getUsuario_id()} ORDER BY id DESC;";
    $productos = $this->db->query($sql);
    return $productos;
  }

  public function getProductosByPedido($id){
    $sql = "SELECT pr.*, lp.unidades FROM productos pr "
            . "INNER JOIN lineas_pedidos lp ON pr.id = lp.producto_id "
            . "WHERE lp.pedido_id = {$id};";

    $productos = $this->db->query($sql);
    return $productos;
  }

  public function save(){
    $sql = "INSERT INTO pedidos VALUES (NULL, {$this->getUsuario_id()}, '{$this->getProvincia()}', '{$this->getLocalidad()}', '{$this->getDireccion()}', {$this->getCoste()}, 'confirm', CURDATE(), CURTIME());";
    $save = $this->db->query($sql);

    $result = false;
    if($save){
      $result = true;
    }
    return $result;
  }

  public function save_linea(){
    $sql = "SELECT LAST_INSERT_ID() as 'pedido';";
    $query = $this->db->query($sql);
    $pedido_id = $query->fetch_object()->pedido;

    foreach($_SESSION['carrito'] as $elemento){
      $producto = $elemento['producto'];

      $insert = "INSERT INTO lineas_pedidos VALUES(NULL, {$pedido_id}, {$producto->id}, {$elemento['unidades']});";
      $save = $this->db->query($insert);
    }

    $result = false;
    if($save){
      $result = true;
    }
    return $result;
  }

  public function edit(){
    $sql = "UPDATE pedidos SET estado='{$this->getEstado()}' ";
    $sql .= " WHERE id={$this->getId()};";

    $save = $this->db->query($sql);

    $result = false;
    if($save){
      $result = true;
    }
    return $result;
  }




}