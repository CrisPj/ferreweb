<?php
/**
 * Copyright (c) 2016. Cristian Perez
 */


class guardarControl extends baseControl
{
    /**
     *
     */
    function index()
    {
        if (isset($_POST))
        {

            if (array_key_exists('marca', $_POST) && !empty($_POST['marca'] && !empty($_POST['proveedor'])))
            {
                include "models/Marca.php";
                $marca = $_POST['marca'];
                $proveedor = $_POST['proveedor'];
                Marca::insertar($marca,$proveedor);
            }
            else if (array_key_exists('proveedor', $_POST) && !empty($_POST['proveedor']))
            {
                include "models/Proveedor.php";
                $proveedor = $_POST['proveedor'];
                Proveedor::insertar($proveedor);
            }
            else if (array_key_exists('roluser', $_POST) && !empty($_POST['roluser']))
            {
                include "models/Usuario.php";
                $id_user = $_POST['id'];
                $rol = $_POST['roluser'];
                Usuario::insertarRolUsuario($id_user,$rol);
            }
            else if (array_key_exists('email', $_POST) && !empty($_POST['pass']) && !empty($_POST['email']))
            {
                include "models/Usuario.php";
                $email = $_POST['email'];
                if (!filter_var($email, FILTER_VALIDATE_EMAIL))
                    die("Correo Invalido");
                $pass = md5($_POST['pass']);
                Usuario::crearNuevo($email,$pass);
            }
            else if (array_key_exists('nombre', $_POST) && !empty($_POST['nombre']) && !empty($_POST['precio']) && !empty($_POST['marca']))
            {
                include "models/Producto.php";
                $nombre = $_POST['nombre'];
                $precio = $_POST['precio'];
                $marca = $_POST['marca'];
                Producto::insertar($nombre,$precio,$marca);
            }
            else if (array_key_exists('privilegio', $_POST) && !empty($_POST['privilegio']))
            {
                include "models/Usuario.php";
                $privilegio = $_POST['marca'];
                $id_rol = $_POST['id'];
                Usuario::insertarRolPrivilegio($id_rol,$privilegio);
            }
            else
            {
                die("Te falta un campo");
            }
            $this->registro->template = new Template();
            $this->registro->template->mostrar('admin/principal');
        }
    }
}