<?php
class logoutControl extends baseControl
{

    function index()
    {
        unset($_SESSION);
        session_destroy();
        $this->registro->template = new Template();
        $this->registro->template->mostrar('index');
    }
}