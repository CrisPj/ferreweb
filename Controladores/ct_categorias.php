<?php
/**
 * Copyright (c) 2016. Cristian Perez
 */

include "models/Producto.php";
class categoriasControl extends baseControl
{
    function index()
    {
        $this->registro->template = new Template($this->registro);
        $this->registro->template->menus = array( "name" => "tipo",
            "value" => "Categorias");
        $datos = Producto::getCategorias();
        $this->registro->template->datos = array( "name" => "datos",
            "value" => $datos);
        $this->registro->template->mostrar('categorias');
    }
}