<?php

/**
 * Created by PhpStorm.
 * User: cresh
 * Date: 4/12/16
 * Time: 9:39 PM
 */
include "models/BaseModel.php";
class Producto extends BaseModel
{
    public $id_producto = 0;
    public $id_marca = 0;
    public $nombre = "";
    public $foto = "";


    public static function getAll()
    {
        $db = Datos::getDB();
        return $db->obtenerDatos("select * from producto");
    }

    public static function prod($id)
    {
        $db = Datos::getDB();
        return $db->obtenerFila("select p.id_producto,p.nombre,p.descripcion, p.foto, round(avg(pl.calificacion),1) as calificacion,p.precio, m.marca
from  producto p
  join marca m on m.id_marca = p.id_marca
  join producto_cliente pl on pl.id_producto = p.id_producto where p.id_producto = $id");
    }


    public static function getColumnNames()
    {
        return array("id","nombre","foto","precio","Detalles");
    }

    public static function search($buscar)
    {
        $db = Datos::getDB();
        return $db->obtenerDatos("select * from producto where nombre like '%$buscar%'");
    }

    public static function getMarcas()
    {
        $db = Datos::getDB();
        return $db->obtenerDatosAssoc2("select id_marca,marca from marca",'id_marca','marca');
    }

    public static function insertar($nombre, $precio, $marca)
    {
        $db = Datos::getDB();
        $db->ejecutar("insert into producto (nombre,precio,id_marca) values ('$nombre','$precio','$marca')");
    }

    public static function getByID($id)
    {
        $db = Datos::getDB();
        return $db->obtenerFila("select nombre, precio from producto where id_producto =$id");
    }

    public static function getMarca($id)
    {
        $db = Datos::getDB();
        return $db->obtenerDato("select p.id_marca from producto p join marca m on p.id_marca = m.id_marca where p.id_producto =$id");
    }

    public static function update($nombre, $precio, $marca, $id)
    {
        $db = Datos::getDB();
        $db->ejecutar("update producto set nombre='$nombre',precio='$precio',id_marca='$marca' where id = $id");
    }

    public static function delete($id)
    {
        $db = Datos::getDB();
        $db->ejecutar("delete from producto where id=$id");
    }

    public static function getCategorias()
    {
        $db = Datos::getDB();
        return $db->obtenerDatos("select categoria,imagen from categoria");
    }

    public static function getProductoCategoria($categoria)
    {
        $db = Datos::getDB();
        return $db->obtenerDatos("select p.id_producto as id,nombre,foto,precio from producto p
        join producto_categoria pc on p.id_producto = pc.id_producto
        join categoria c on c.id_categoria = pc.id_categoria
        where c.categoria='$categoria'");
    }

    public static function getComentarios($id)
    {
        $db = Datos::getDB();
        return $db->obtenerDatos("select pc.comentario,c.nombre,c.foto from producto p
        join producto_cliente pc on p.id_producto = pc.id_producto
        join cliente c on pc.id_cliente = c.id_cliente
        where p.id_producto='$id'");
    }
}