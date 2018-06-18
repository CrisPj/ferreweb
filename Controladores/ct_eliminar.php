<?php
class eliminarControl extends baseControl
{

    function index()
    {
        if(isset($_SESSION['logueado']) && isset($_GET['id']) && isset($_GET['que']))
        {
            $id = $_GET['id'];
            switch ($_GET['que'])
            {
                case 'marca':
                    if (in_array("borrar_marca",$_SESSION['privilegios']) || in_array("administrar_todo",$_SESSION['privilegios']))
                    {
                        include "models/Marca.php";
                        Marca::delete($id);
                    }
                    break;
                case 'producto':
                    if (in_array("borrar_producto",$_SESSION['privilegios']) || in_array("administrar_todo",$_SESSION['privilegios']))
                    {
                        include "models/Producto.php";
                        Producto::delete($id);
                    }
                    break;
                case 'usuario':
                    if (in_array("administrar_todo",$_SESSION['privilegios']))
                    {
                        include "models/Usuario.php";
                        Usuario::delete($id);
                    }
                    break;
                case 'rolusuario':
                    if (in_array("administrar_todo",$_SESSION['privilegios']))
                    {
                        include "models/Usuario.php";
                        $user = $_GET['user'];
                        Usuario::deleteRol($id,$user);
                    }
                    break;
                case 'proveedor':
                    if (in_array("borrar_proveedor",$_SESSION['privilegios']) || in_array("administrar_todo",$_SESSION['privilegios']))
                    {
                        include "models/Proveedor.php";
                        Proveedor::delete($id);
                    }
                    break;
                case 'privilegio':
                    if ( in_array("administrar_todo",$_SESSION['privilegios']))
                    {
                        $id_privilegio = $_GET['privilegio'];
                        include "models/Usuario.php";
                        Usuario::deletePrivilegioRol($id,$id_privilegio);
                    }
                    break;
                default:
                    die("Datos modificados");
                    break;
            }
            $this->registro->template = new Template($this->registro);
            $this->registro->template->mostrar('admin/principal');
        }
        else
        {
            die("No ha iniciado sesion");
        }
    }
}