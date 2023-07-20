<?php 

class pedidoController{
  public function index(){
    echo "Controlador pedido acción index";
  }

  public function add(){
    require_once 'views/pedido/add.php';
  }
}