<?php
ini_set('display_errors', 'On');
include('../inc/Sistema.php');
ini_set("soap.wsdl_cache_enabled","0");
$server = new SoapServer("marcas");
include ("../inc/Datos.php");


function obtenermarcas($buscar)
{
    $buscar = htmlentities($buscar);
    $db = Datos::getDB();
    return $db->obtenerDatosAssoc1("select id_marca, marca from marca where marca LIKE '%$buscar%'","id_marca","marca");
}

$server->addFunction("obtenermarcas");
$server->handle();