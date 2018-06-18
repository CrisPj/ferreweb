<?php
include "models/Empleado.php";
class datosEmpleadoControl extends baseControl
{
    function index()
    {
        $this->registro->template = new Template();
        $correoUsuario = $_SESSION['email'];
        $idUsuario = Empleado::getByCorreoUser($correoUsuario);
        $datosUsuario = Empleado::getDatos($idUsuario);
        $this->registro->template->datos = array("name" => "datos",
            "value" => $datosUsuario);
        $this->registro->template->mostrar('admin/datosUsuario');
    }
    
}