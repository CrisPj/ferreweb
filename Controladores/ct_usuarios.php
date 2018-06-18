<?php
include "models/Usuario.php";
class usuariosControl extends baseControl
{
    function index()
    {
        if (isset($_SESSION['logueado']))
        {
        $this->registro->template = new Template($this->registro);
        $this->registro->template->menus = array( "name" => "tipo",
            "value" => "usuarios");
        $datos = Usuario::obtenerTodos();
        $nombreColumnas = Usuario::getColumnNames();
        $this->registro->template->tipos = array( "name" => "nombrecolumnas",
            "value" => $nombreColumnas);
        $this->registro->template->datos = array( "name" => "datos",
            "value" => $datos);

            $privilegios = ($_SESSION['privilegios']);

            if (in_array('administrar_todo',$privilegios))
            {
                $campos = array ('email'=>"Correo",'nombre'=>"Nombre",'pass'=>"Contraseña");
                $this->registro->template->campos = array( "name" => "campos",
                    "value" => $campos);
                $this->registro->template->num = array( "name" => "nombForm",
                    "value" => "Agregar Usuario");
                $this->registro->template->pname = array( "name" => "nomb",
                    "value" => "Roles");
            }
            $this->registro->template->mostrar('admin/mostrarTabla');
        }
        else
            $this->registro->template->mostrar('index');
    }
}