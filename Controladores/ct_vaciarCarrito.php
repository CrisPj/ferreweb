<?php
/**
 * Copyright (c) 2016. Cristian Perez
 */

include "models/Cliente.php";
class vaciarCarritoControl extends baseControl
{

    function index()
    {
        $this->registro->template = new Template($this->registro);
        if (isset($_SESSION['logueado']))
        {

        $this->registro->template->menus = array( "name" => "tipo",
            "value" => "carrito");
            $email = $_SESSION['email'];
            $id_cliente = Cliente::obtenerIddeEmail($email);
            $id_cliente2 = $_GET['id_cliente'];
            if ($id_cliente==$id_cliente)
            {
                Cliente::borrarCarro($id_cliente2);
            }
            else
            {
                // No es tu carro, regresas a la pagina anterior
                $this->registro->template->warning = array( "name" => "warning",
                    "value" => "NO es tu carrito :v");
            }
            $this->registro->template->mostrar('index');
        }
        else
            $this->registro->template->mostrar('index');
    }
}