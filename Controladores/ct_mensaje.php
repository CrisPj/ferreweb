<?php
include "models/Usuario.php";
class mensajeControl extends baseControl
{
    function index()
    {
        if (isset($_POST['email']))
        {
            $email = $_POST['email'];
            $clave = Usuario::obtenerClave();

            if (empty(Usuario::obtenerCorreo($email)))
            {
                die("No existe el correo");
            }
            Usuario::mandarMail($email,"Recuperacion de Cuenta Ferreweb","Tu nueva contraseña es $clave",Usuario::obtenerNombre($email));
            //almacenar en la base de dato sla contraseña temporal encriptada, y  no voy a sobrescibir la contraseña
            // vieja del usuario
            $claveTemporal = md5($clave);
            // aqui voy a insertar la contraseña temporal
            Usuario::insertarClaveTemporal($claveTemporal,$email);
        }
        else
        {
            die("Debe especificar un correo electronico");
        }


        $this->registro->template = new Template($this->registro);
        $this->registro->template->mostrar('exito');
    }
}