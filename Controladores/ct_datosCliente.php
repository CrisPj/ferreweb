<?php
include "models/Cliente.php";
class datosClienteControl extends baseControl
{
    function index()
    {
        $this->registro->template = new Template();
        $correoUsuario = $_SESSION['email'];
        $idUsuario = Cliente::obtenerIddeEmail($correoUsuario);
        $datosUsuario = Cliente::obtenerDatosCliente($idUsuario);
        $this->registro->template->datos = array("name" => "datos",
            "value" => $datosUsuario);
        $this->registro->template->mostrar('cliente/datosCliente');
    }
    
}