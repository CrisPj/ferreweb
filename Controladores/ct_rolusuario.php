<?php
class rolusuarioControl extends baseControl
{

    function index()
    {
        if (isset($_GET['id']))
        {
            if (in_array("administrar_todo", $_SESSION['privilegios']))
            {
                include "models/Usuario.php";
                $id = $_GET['id'];
                $email = Usuario::obtenerCorreo($id);
                $roles = Usuario::obtenerRoles($email);
                $campos = array('id'=>"$id");
                $this->registro->template = new Template($this->registro);
                $this->registro->template->campos = array( "name" => "campos",
                    "value" => $campos);
                $this->registro->template->menus = array( "name" => "tipo",
                    "value" => "rolUsuario");
                $this->registro->template->tipos = array( "name" => "nombrecolumnas",
                    "value" => array("id_rol","rol"));
                $this->registro->template->datos = array( "name" => "datos",
                    "value" => $roles);
                $this->registro->template->combos = array( "name" => "combos",
                    "value" => Usuario::obtenerTodosRoles());
                $this->registro->template->pname = array( "name" => "nomb",
                    "value" => "Roles");
                $this->registro->template->select = array( "name" => "select",
                    "value" => 'roluser');
                $this->registro->template->num = array( "name" => "nombForm",
                    "value" => "Agregar Rol a Usuario: $email");
                $this->registro->template->mostrar('admin/mostrarTabla');
            }

        }
    }
}