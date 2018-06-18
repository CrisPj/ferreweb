<?php
/**
 * Copyright (c) 2016. Cristian Perez
 */

include "models/Cliente.php";
class comprasControl extends baseControl
{

    function index()
    {
        $this->registro->template = new Template($this->registro);
        if (isset($_SESSION['logueado']))
        {
            $id_cliente = Cliente::obtenerIddeEmail($_SESSION['email']);
            
            $compras = Cliente::obtenerCompras($id_cliente);
            $this->registro->template->tipos = array( "name" => "nombrecolumnas",
                "value" => array("Producto","fecha","fecha compra"));
            $this->registro->template->datos = array( "name" => "datos",
                "value" => $compras);
            $this->registro->template->mostrar('cliente/compras');
        }
        else
            $this->registro->template->mostrar('index');
    }
}