<?php
class privilegiosControl extends baseControl
{

    /**
     *
     */
    function index()
    {
        if (isset($_GET['id']))
        {
            if (in_array("administrar_todo", $_SESSION['privilegios']))
            {
                include "models/Usuario.php";
                $id = $_GET['id'];
                $rol = Usuario::getRoleById($id);
                $roles = Usuario::obtenerPrivilegiosID($rol);
                $campos = array('id'=>"$id");
                $this->registro->template = new Template($this->registro);
                $this->registro->template->campos = array( "name" => "campos",
                    "value" => $campos);
                $this->registro->template->menus = array( "name" => "tipo",
                    "value" => "privilegios");
                $this->registro->template->tipos = array( "name" => "nombrecolumnas",
                    "value" => array("id_privilegio","privilegio"));
                $this->registro->template->datos = array( "name" => "datos",
                    "value" => $roles);
                $this->registro->template->combos = array( "name" => "combos",
                    "value" => Usuario::obtenerTodosPrivilegios());
                $this->registro->template->pname = array( "name" => "nomb",
                    "value" => "Roles");
                $this->registro->template->select = array( "name" => "select",
                    "value" => 'privilegio');
                $this->registro->template->num = array( "name" => "nombForm",
                    "value" => "Agregar Permiso a Rol: $rol");
                $this->registro->template->mostrar('admin/mostrarTabla');
            }

        }
    }
}