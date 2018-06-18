<?php

class nuevaControl extends baseControl
{

    function index()
    {
        $this->registro->template = new Template();
        $this->registro->template->mostrar("nueva");
    }
}