<?php
class setControl extends baseControl
{
    function index()
    {
        if (isset($_POST))
        {
            $id = $_POST['id'];
            if (array_key_exists('marca', $_POST) && !empty($_POST['marca'] && !empty($_POST['proveedor'])))
            {
                $marca = $_POST['marca'];
                $proveedor = $_POST['proveedor'];
                Marca::update($marca,$proveedor,$id);
            }
            else if (array_key_exists('proveedor', $_POST) && !empty($_POST['proveedor']))
            {
                $proveedor = $_POST['proveedor'];
                Proveedor::update($proveedor,$id);
            }
            else if (array_key_exists('email', $_POST) && !empty($_POST['pass']) && !empty($_POST['email']))
            {
                $email = $_POST['email'];
                if (!filter_var($email, FILTER_VALIDATE_EMAIL))
                    die("Correo Invalido");
                $pass = md5($_POST['pass']);
                Usuario::update($email,$pass,$id);
            }
            else if (array_key_exists('nombre', $_POST) && !empty($_POST['nombre']) && !empty($_POST['precio']) && !empty($_POST['marca']))
            {
                $nombre = $_POST['nombre'];
                $precio = $_POST['precio'];
                $marca = $_POST['marca'];
                Producto::update($nombre,$precio,$marca,$id);
            }
            else
            {
                die("Te falta un campo");
            }
            $this->registro->template = new Template();
            $this->registro->template->mostrar('index');
        }
        else
        {
            die("No ha iniciado sesion");
        }

    }
}