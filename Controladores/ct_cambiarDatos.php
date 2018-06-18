<?php
include "models/Empleado.php";
class cambiarDatosControl extends baseControl
{
    function index()
    {
        if (isset($_POST['foto']) && isset($_POST['rfc']))
        {
            $id = Empleado::getByCorreoUser($_SESSION['email']);
            $nombre = $_POST['nombre'];

            $apaterno = $_POST['apaterno'];
            $amaterno = $_POST['amaterno'];
            $rfc = $_POST['rfc'];

            $nacimiento = $_POST['nacimiento'];
            $foto = $_POST['foto'];
            if (!empty($nombre) && !empty($apaterno) && !empty($amaterno) && !empty($rfc) && !empty($nacimiento))
            {
                if (Empleado::existe($id))
                {
                    Empleado::cambiarDatos($id,$nombre,$apaterno,$amaterno,$rfc,$nacimiento);
                }
                else{
                    Empleado::nuevo($id,$nombre,$apaterno,$amaterno,$rfc,$nacimiento);
                }
                Empleado::cambiarFoto($id,$foto);

                $this->registro->template = new Template();
                $this->registro->template->msj = array( "name" => "sucess",
                    "value" => "Datos actualizados correctamente");
            }

            else{
                $this->registro->template->msj = array( "name" => "danger",
                    "value" => "Datos incorrectos");
            }
        }
        else
        {
            //Cambiar Datos Cliente
        }
        $this->registro->template->mostrar("admin/principal");
    }

    function validarRFC($rfc)
    {
        $regex = '/^[A-Z]{3,4}([0-9]{2})(1[0-2]|0[1-9])([0-3][0-9])([ -]?)([A-Z0-9]{4})$/';
        return preg_match($regex, $rfc);
    }
}