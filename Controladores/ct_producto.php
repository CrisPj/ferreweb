<?php
/**
 * Copyright (c) 2016. Cristian Perez
 */

include "models/Producto.php";
class productoControl extends baseControl
{
    function index()
    {
        $id = $_GET['id'];
        $this->registro->template = new Template($this->registro);
        $datos = Producto::prod($id);
        $comentarios = Producto::getComentarios($id);
        $this->registro->template->datos = array( "name" => "datos",
            "value" => $datos);
        $this->registro->template->comentarios = array( "name" => "comentarios",
            "value" => $comentarios);
        $this->registro->template->mostrar('producto');
    }
}