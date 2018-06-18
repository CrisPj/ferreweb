<?php
class actualizarControl extends baseControl
{
    function index()
    {
        if (isset($_GET['que']))
        {
            $combos = array();
            $valores = array();
            $this->registro->template = new Template();
            switch ($_GET['que'])
            {
                case 'marca':
                    if (in_array("editar_marca",$_SESSION['privilegios']) || in_array("administrar_todo",$_SESSION['privilegios']))
                    {
                        include "models/Marca.php";
                        $campos = array('marca' => "Nombre de la marca");
                        $valores = Marca::getByID($_GET['id']);
                        $select = Marca::getProveedor($_GET['id']);
                        $combos = Marca::getProveedores();
                        $this->registro->template->combos = array( "name" => "combos",
                            "value" => $combos);
                        $this->registro->template->numb = array( "name" => "nombForm",
                            "value" => "Actualizar Marca");
                        $this->registro->template->select = array( "name" => "select",
                            "value" => "proveedor");
                        $this->registro->template->nomnb = array( "name" => "nomb",
                            "value" => "Proveedor");
                        $this->registro->template->val = array( "name" => "selec",
                            "value" => $select);
                    }
                    break;
                case 'producto':
                    include "models/Producto.php";
                    $campos = array ('nombre'=>"Nombre del producto",'precio'=>"precio");
                    $valores = Producto::getByID($_GET['id']);
                    $select = Producto::getMarca($_GET['id']);
                    $combos = Producto::getMarcas();
                    $this->registro->template->combos = array( "name" => "combos",
                        "value" => $combos);
                    $this->registro->template->numb = array( "name" => "nombForm",
                        "value" => "Actualizar Producto");
                    $this->registro->template->select = array( "name" => "select",
                        "value" => "proveedor");
                    $this->registro->template->nomnb = array( "name" => "nomb",
                        "value" => "Proveedor");
                    $this->registro->template->val = array( "name" => "selec",
                        "value" => $select);
                    break;
                case 'usuario':
                    include "models/Usuario.php";
                      $campos = array ('email'=>"email",'pass'=>"contraseña");
//                    
//                    $valores = $web->obtener($sql);
                    $valores = Usuario::getByID($_GET['id']);
                    $this->registro->template->numb = array( "name" => "nombForm",
                        "value" => "Actualizar Usuario");
                    break;
                case 'proveedor':

                    if (in_array("editar_proveedor",$_SESSION['privilegios']) || in_array('administrar_todo',$_SESSION['privilegios']))
                    {
                        include "models/Proveedor.php";
                        $campos = array('proveedor' => "Nombre del proveedor");

                        $valores = Proveedor::getById($_GET['id']);
                        $this->registro->template->numb = array( "name" => "nombForm",
                            "value" => "Actualizar Proveedores");
                    }
                    break;
                default:
                    break;
            }
            $this->registro->template->campos = array( "name" => "campos",
                "value" => $campos);
            $this->registro->template->valores = array( "name" => "valores",
                "value" => $valores);

            $this->registro->template->id = array( "name" => "id",
            "value" => $_GET['id']);

            $this->registro->template->mostrar('admin/actualiza');
        }

    }
}