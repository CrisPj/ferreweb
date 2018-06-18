<?php
class loginControl extends baseControl
{
    function index()
    {
        $this->registro->template = new Template($this->registro);
        $this->registro->template->mostrar('login');
    }
}