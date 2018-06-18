<?php
include "models/Usuario.php";
define("nuevoUsuario",-1);
class logeoControl extends baseControl
{
    public $flag = false;

    function index()
    {
        die("Llego al index");
    }
    public function entrar($email, $pass)
    {

        $pass = md5($pass);
        $datos = Usuario::obtenerDatos($email,$pass);

        if ($datos == nuevoUsuario)
        {
            Usuario::crearNuevo($email, $pass);

                $roles = Usuario::obtenerRoles($email);
                $privilegios = Usuario::obtenerPrivilegios($email);
                $_SESSION['email'] = $email;
                $_SESSION['logueado'] = true;
                $_SESSION['roles'] = $roles;
                $_SESSION['privilegios'] = $privilegios;

        }
        elseif ($pass == Usuario::obtenerClaveTemporal($email))
        {
            $this->flag = true;
        }
        elseif ($datos != nuevoUsuario)
        {
            if (!filter_var($email, FILTER_VALIDATE_EMAIL))
            {
                die ("formato de correo electronico invalido");
            }
            $roles = Usuario::obtenerRoles($email);
            $privilegios = Usuario::obtenerPrivilegios($email);
            $_SESSION['email'] = $email;
            $_SESSION['logueado'] = true;
            $_SESSION['roles'] = $roles;
            $_SESSION['privilegios'] = $privilegios;
        }
        else
        {
            die("Datos invalidos Logeo");
        }
    }

    function logeo()
    {
        $this->registro->template = new Template($this->registro);
        if (isset($_POST['rpassword']))
        {
            $mail = $_POST['email'];
            $pass = $_POST['password'];
            $rpass = $_POST['rpassword'];

            if ($rpass == $pass)
            {
                $this->entrar($mail,$pass);
            }
            else
            {
                $this->registro->template->error = array('name'=>"warning",'value'=>"Los passwords no coinciden");
                $this->registro->template->mostrar('nueva');
                die();
            }

        }
        elseif (isset($_POST['email'] ) && isset($_POST['password']))
        {
            $mail = $_POST['email'];
            $pass = $_POST['password'];
            $this->entrar($mail,$pass);
        }
        else
        {
            die("datos no introducidos");
        }


        if ($this->flag)
        {
            $this->registro->template->mostrar('admin/cambia');
        }
        else if (isset($_SESSION['roles']))
        {
            if ((in_array('Administrador',$_SESSION['roles'])))
            $this->registro->template->mostrar('admin/principal');
            else
            {
                $this->registro->template->mostrar('index');
            }
        }
        else
        {
            $this->registro->template->mostrar('index');
        }

    }
}