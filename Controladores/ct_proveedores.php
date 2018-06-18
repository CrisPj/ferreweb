<?php
include "models/Proveedor.php";
class proveedoresControl extends baseControl
{
    function index()
    {
        $this->registro->template = new Template($this->registro);
        $this->registro->template->menus = array( "name" => "tipo",
            "value" => "proveedores");
        $datos = Proveedor::getAll();
        $nombreColumnas = Proveedor::getColumnNames();
        $this->registro->template->tipos = array( "name" => "nombrecolumnas",
            "value" => $nombreColumnas);
        $this->registro->template->datos = array( "name" => "datos",
            "value" => $datos);
        if (isset($_SESSION['logueado']))
        {
            $privilegios = ($_SESSION['privilegios']);

            if (in_array("agregar_proveedor",$privilegios) || in_array('administrar_todo',$privilegios))
            {
                $campos = array('proveedor' => "Nombre del proveedor");
                $this->registro->template->campos = array( "name" => "campos",
                    "value" => $campos);
                $this->registro->template->num = array( "name" => "nombForm",
                    "value" => "Agregar Proveedores");
                $this->registro->template->mostrar('admin/mostrarTabla');
            }
            else
                $this->registro->template->mostrar('mostrarTabla');

        }
        else
            $this->registro->template->mostrar('mostrarTabla');
    }
}