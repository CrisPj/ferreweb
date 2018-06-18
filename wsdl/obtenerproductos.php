<?php
ini_set('display_errors', 'On');
include('../inc/Sistema.php');
ini_set("soap.wsdl_cache_enabled","0");
$server = new SoapServer("productos");
include ("../inc/Datos.php");


function obtenerproductos($buscar)
{
    $buscar = htmlentities($buscar);
    $db = Datos::getDB();
    return $db->obtenerDatosAssoc1("select id_producto, producto from producto where producto LIKE '%$buscar%'");
}

$server->addFunction("obtenerproductos");
$server->handle();