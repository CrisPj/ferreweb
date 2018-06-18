<?php
include "models/Marca.php";
class marcasControl extends baseControl
{
    function index()
    {
        $this->registro->template = new Template($this->registro);
        $this->registro->template->menus = array( "name" => "tipo",
            "value" => "marcas");
        $datos = Marca::getAll();
        $nombreColumnas = Marca::getColumnNames();
        $this->registro->template->tipos = array( "name" => "nombrecolumnas",
            "value" => $nombreColumnas);
        $this->registro->template->datos = array( "name" => "datos",
            "value" => $datos);
        /* Load the index template. */
        if (isset($_SESSION['logueado']))
        {
            $privilegios = ($_SESSION['privilegios']);

            if (in_array("agregar_marca",$privilegios) || in_array('administrar_todo',$privilegios))
            {
                $campos = array('marca' => "Nombre de la marca");
                $this->registro->template->combos = array( "name" => "combos",
                    "value" => Marca::getProveedores());
                $this->registro->template->select = array( "name" => "select",
                    "value" => 'proveedor');
                $this->registro->template->campos = array( "name" => "campos",
                    "value" => $campos);
                $this->registro->template->num = array( "name" => "nombForm",
                    "value" => "Agregar Marca");
                $this->registro->template->pname = array( "name" => "nomb",
                    "value" => "Proveedores");
                $this->registro->template->mostrar('admin/mostrarTabla');
            }else
                $this->registro->template->mostrar('mostrarTabla');

        }

        else
            $this->registro->template->mostrar('mostrarTabla');
    }
}