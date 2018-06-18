<?php

class adminControl extends baseControl
{
    function index()
    {
        $this->registro->template = new Template();
        if (isset($_SESSION['logueado']) && in_array('Administrador' ,$_SESSION['roles']))
        {
            $this->registro->template->mostrar('admin/principal');
        }
        else
        {
            $this->registro->template->mostrar('index');
        }
    }

}