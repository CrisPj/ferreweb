<?php
include "models/Producto.php";
class productosControl extends baseControl
{
    function index()
    {
        $categoria = $_GET['categoria'];
        $this->registro->template = new Template($this->registro);
        $this->registro->template->menus = array( "name" => "tipo",
            "value" => "productos");
        $datos = Producto::getProductoCategoria($categoria);
        $nombreColumnas = Producto::getColumnNames();
        $this->registro->template->tipos = array( "name" => "nombrecolumnas",
            "value" => $nombreColumnas);
        $this->registro->template->datos = array( "name" => "datos",
            "value" => $datos);
        if (isset($_SESSION['logueado']))
        {
            $privilegios = ($_SESSION['privilegios']);

            if (in_array("agregar_productos",$privilegios) || in_array('administrar_todo',$privilegios))
            {
                $campos = array ('nombre'=>"Nombre del produto",'precio'=>"precio");
                $this->registro->template->combos = array( "name" => "combos",
                    "value" => Producto::getMarcas());
                $this->registro->template->campos = array( "name" => "campos",
                    "value" => $campos);
                $this->registro->template->select = array( "name" => "select",
                    "value" => 'marca');
                $this->registro->template->num = array( "name" => "nombForm",
                    "value" => "Agregar Producto");
                $this->registro->template->pname = array( "name" => "nomb",
                    "value" => "Marcas");
                $this->registro->template->mostrar('admin/mostrarTabla');
            }else
                $this->registro->template->mostrar('mostrarTabla');

        }
        else
            $this->registro->template->mostrar('mostrarTabla');
    }
}