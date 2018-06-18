<?php
class indexControl extends baseControl
{
    function index()
    {
        $this->registro->template = new Template();
        $this->registro->template->mostrar('index');
    }
}