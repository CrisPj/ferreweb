<?php
class cambiadoControl extends baseControl
{
    function index()
    {
        if (isset($_POST['viejopass']) && isset($_POST['nuevoPass']) && isset($_POST['repepass']))
        {
            $email = $_SESSION['email'];
            $viejo = $_POST['viejopass'];
            $nuevo = $_POST['nuevoPass'];
            $repe= $_POST['repepass'];

            if ($nuevo == $repe)
            {
               if ($viejo != $nuevo)
               {
                   if (preg_match("/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,16}$/", $nuevo))
                   {
                       die("asd");
                       Usuario::insertarPass(md5($nuevo),$email);
                       Usuario::borrarClaveTemporal($email);
                   }
                   else
                   {
                       die("Mensaje no valido");
                   }
               }
                else
                {
                    die("Los password deben ser diferentes");
                }
            }
            else
            {
                die ("El password no coincide");
            }
        }
        $this->registro->template = new Template($this->registro);
        $this->registro->template->select = array( "name" => "info",
            "value" => 'asd');
        $this->registro->template->mostrar('admin/cambiar');
    }
}