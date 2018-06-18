<?php

class Rutas
{
    private $registro;
    public $archivo;
    public $controlador;
    public $accion;

    function __construct($registro)
    {
        $this->registro = $registro;
    }
    
    function establecer($pRuta)
    {
        if (is_dir($pRuta) == false)
        {
            throw new Exception ('Ruta invalida: `' . $pRuta . '`');
        }
        $this->path = $pRuta;
    }

    function cargar()
    {
        $this->obtenerControlador();
        if (is_readable($this->archivo) != true)
        {
            die("Controlador Invalido o Inexistente");
        }

        include $this->archivo;
        $className =  $this->controlador . 'Control';
        $controlador = new $className($this->registro);
        if (is_callable(array($controlador, $this->accion)) == false)
        {
            $action = 'index';
        }
        else
        {
            $action = $this->accion;
        }
        $controlador->$action();
    }

    private function obtenerControlador()
    {

        if (isset($_GET['buscar']))
        {
            $ruta = "buscar/".$_GET['buscar'];
        }
         elseif (isset($_SESSION['logueado']) && !isset($_GET['ruta']) )
         {
             $ruta='admin';
         }
        else
        {
            $ruta = (empty($_GET['ruta'])) ? '' : $_GET['ruta'];
        }
        if (empty($ruta))
        {
            $ruta = 'index';
        }
        else
        {
            $parts = explode('/', $ruta);
            $this->controlador = $parts[0];
            if(isset( $parts[1]) && $parts[0] == "buscar")
                $this->accion = $parts[0];
            elseif (isset( $parts[1]))
                $this->accion = $parts[0];
            elseif($parts[0] == "logeo")
                $this->accion = $parts[0];
        }
        if (empty($this->controlador)) {
            $this->controlador = 'index';
        }
        $this->archivo = 'Controladores' . '/' .  'ct_' . $this->controlador . '.php';
    }

}