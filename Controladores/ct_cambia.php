<?php

class cambiaControl extends baseControl
{

    function index()
    {
        $this->registro->template = new Template();
        $this->registro->template->mostrar("admin/cambia");
    }
}