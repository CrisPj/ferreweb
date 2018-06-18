<?php
/**
 * Copyright (c) 2016. Cristian Perez
 */

include "models/Cliente.php";
class eliminarCarroControl extends baseControl
{

    function index()
    {
        $this->registro->template = new Template($this->registro);
        if (isset($_SESSION['logueado']))
        {
            if (isset($_GET['id_producto'],$_GET['id_cliente'],$_GET['id_carrito']))
            {
                $email = $_SESSION['email'];
                $id_clienteSesion = Cliente::obtenerIddeEmail($email);
                $id_producto = $_GET['id_producto'];
                $id_cliente = $_GET['id_cliente'];
                $id_carrito = $_GET['id_carrito'];

                if ($id_clienteSesion == $id_cliente)
                {
                    Cliente::borrarProductoCarrito($id_carrito, $id_producto);
                }
                else
                {
                    $this->registro->template->warning = array( "name" => "warning",
                        "value" => "NO es tu carrito :v");
                }
            }
        $this->registro->template->menus = array( "name" => "tipo",
            "value" => "carrito");
            $this->registro->template->mostrar('index');
        }
        else
            $this->registro->template->mostrar('index');
    }
}