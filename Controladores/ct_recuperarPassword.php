<?php
/**
 * Created by PhpStorm.
 * User: cresh
 * Date: 4/13/16
 * Time: 2:00 PM
 */

include "models/Usuario.php";
class recuperarPasswordControl extends baseControl
{

    function index()
    {
        $this->registro->template = new Template($this->registro);
        $this->registro->template->mostrar('recuperar');
    }
}