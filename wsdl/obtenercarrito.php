<?php
ini_set('display_errors', 'On');
include('../inc/Sistema.php');
include ("../inc/Datos.php");

   $buscar = htmlentities($_GET['id_carrito']);
    $db = Datos::getDB();
    $datos = $db->obtenerFila("select v.id_carrito as id, c.nombre as nombreCliente, id_producto, cantidad, precio, subtotal from vistaCarrito v join cliente c on v.id_cliente = c.id_cliente where id_carrito = $buscar");
    $productos = $db->obtenerDatos("select p.id_producto, p.nombre, p.precio, c.cantidad from carrito_detalle c join producto  p on c.id_producto = p.id_producto  where id_carrito = $buscar");
    $xml = new SimpleXMLElement('<xml/>');
    $track = $xml->addChild('carrito');
    $track->addChild('id_carrito',$datos['id']);
    $track->addChild('cliente', $datos['nombreCliente']);
    $prod = $track->addChild('productos');
foreach ($productos as $item)
{
    $nuevo = $prod->addChild('producto');
    $nuevo->addChild('nombre',$item['nombre']);
    $nuevo->addChild('precio',$item['precio']);
    $nuevo->addChild('cantidad',$item['cantidad']);

}
    $track->addChild('cantidad', $datos['cantidad']);
    $track->addChild('precio', $datos['precio']);
    $track->addChild('subtotal', $datos['subtotal']);
    header('Content-type: text/xml');
    print($xml->asXML());