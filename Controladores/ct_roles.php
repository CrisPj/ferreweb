<?php
include "models/Usuario.php";
class rolesControl extends baseControl
{
    function index()
    {
        if (isset($_SESSION['logueado']))
        {
        $this->registro->template = new Template($this->registro);
        $this->registro->template->menus = array( "name" => "tipo",
            "value" => "roles");
        $datos = Usuario::obtenerTodosRolesTabla();
        $nombreColumnas = array('id_rol','rol');
        $this->registro->template->tipos = array( "name" => "nombrecolumnas",
            "value" => $nombreColumnas);
        $this->registro->template->datos = array( "name" => "datos",
            "value" => $datos);

            $privilegios = ($_SESSION['privilegios']);

            if (in_array('administrar_todo',$privilegios))
            {
                $campos = array ('rol'=>"Rol");
                $this->registro->template->combos = array( "name" => "combos",
                    "value" => Usuario::obtenerTodosPrivilegios());
                $this->registro->template->select = array( "name" => "select",
                    "value" => 'privilegio');
                $this->registro->template->campos = array( "name" => "campos",
                    "value" => $campos);
                $this->registro->template->num = array( "name" => "nombForm",
                    "value" => "Agregar Privilegio");
                $this->registro->template->pname = array( "name" => "nomb",
                    "value" => "Privilegio");
            }
            $this->registro->template->mostrar('admin/mostrarTabla');
        }
        else
            $this->registro->template->mostrar('index');
    }
}