<?php
include "models/Producto.php";
class buscarControl extends baseControl
{
    function index()
    {
        die("Funcion no valida");
    }

    function buscar()
    {
        $this->registro->template = new Template($this->registro);
        $this->registro->template->menus = array("name" => "tipo",
            "value" => "Busqueda");
        $datos =Producto::search($_GET['buscar']);
        $nombreColumnas = Producto::getColumnNames();
        $this->registro->template->tipos = array("name" => "nombrecolumnas",
            "value" => $nombreColumnas);
        $this->registro->template->datos = array("name" => "datos",
            "value" => $datos);
        $this->registro->template->mostrar('mostrarTabla');
    }
}