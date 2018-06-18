<?php
/**
 * Created by PhpStorm.
 * User: cresh
 * Date: 4/12/16
 * Time: 2:23 PM
 */
Abstract class baseControl
{
    public $registro;
    function __construct($registro)
    {
        $this->registro = $registro;
    }

    abstract function index();
}