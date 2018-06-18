<?php
ini_set('display_errors', 'On');
include('inc/Sistema.php');
$web->router = new Rutas($web);
$web->router->establecer(".");
$web->router->cargar();

