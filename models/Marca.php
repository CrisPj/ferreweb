<?php

/**
 * Created by PhpStorm.
 * User: cresh
 * Date: 4/12/16
 * Time: 9:38 PM
 */
include "models/BaseModel.php";
class Marca
{
    public static function getAll()
    {
        $db = Datos::getDB();
        return $db->obtenerDatos("select * from marca");
    }

    public static function getProveedores()
    {
        $db = Datos::getDB();
        return $datos = $db->obtenerDatosAssoc2("select id_proveedor,proveedor from proveedor",'id_proveedor','proveedor');
    }

    public static function getColumnNames()
    {
        $db = Datos::getDB();
        return $db->obtenerColumnas("marca");
    }

    public static function insertar($marca, $proveedor)
    {
        $db = Datos::getDB();
        $db->ejecutar("insert into marca (marca, id_proveedor) values ('$marca',$proveedor)");
    }

    public static function getByID($id)
    {
        $db = Datos::getDB();
        return $db->obtenerFila("select marca from marca where id_marca = '$id'");
    }

    public static function getProveedor($id)
    {
        $db = Datos::getDB();
        return $db->obtenerDato("select p.id_proveedor from marca m join proveedor p on p.id_proveedor = m.id_proveedor where m.id_marca =$id");
    }

    public static function update($marca, $proveedor, $id)
    {
        $db = Datos::getDB();
        $db->ejecutar("update marca set marca='$marca',id_proveedor='$proveedor' where id_marca=$id");

    }

    public static function delete($id)
    {
        $db = Datos::getDB();
        $db->ejecutar("delete from marca where id_marca=$id");
    }
}