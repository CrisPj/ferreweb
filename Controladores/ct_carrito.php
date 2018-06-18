<?php
/**
 * Copyright (c) 2016. Cristian Perez
 */

include "models/Cliente.php";
class carritoControl extends baseControl
{
    /**
     *
     */
    function index()
    {
        $this->registro->template = new Template($this->registro);
        if (isset($_SESSION['logueado']))
        {

        $this->registro->template->menus = array( "name" => "tipo",
            "value" => "carrito");
            $email = $_SESSION['email'];
            $id_cliente = Cliente::obtenerIddeEmail($email);
        $datos = Cliente::obtenerDatos($id_cliente);
        $nombreColumnas = array('id_carrito','id_cliente','id_producto','cantidad','precio','subtotal','nombre','foto');
        $this->registro->template->tipos = array( "name" => "nombrecolumnas",
            "value" => $nombreColumnas);
        $this->registro->template->datos = array( "name" => "datos",
            "value" => $datos);
            $this->registro->template->total = array( "name" => "total",
                "value" => Cliente::getTotal($id_cliente));
            $this->registro->template->cliente = array( "name" => "id_cliente",
                "value" => $id_cliente);
            $this->registro->template->mostrar('cliente/mostrarCarro');
        }
        else
            $this->registro->template->mostrar('index');
    }
}