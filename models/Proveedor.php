<?php

/**
 * Created by PhpStorm.
 * User: cresh
 * Date: 4/12/16
 * Time: 9:39 PM
 */
include "models/BaseModel.php";
class Proveedor extends BaseModel
{
    public $id_proveedor = 0;
    public $proveedor = "";

    /**
     * Proveedor constructor.
     * @param $id_proveedor
     * @param $proveedor
     */
    public function __construct($proveedor)
    {
        $this->proveedor = $proveedor;
        echo $proveedor;
    }

    public static function insertar($proveedor)
    {
        $db = Datos::getDB();
        $db->ejecutar("insert into proveedor (proveedor) values ('$proveedor')");
    }

    public static function getAll()
    {
        $db = Datos::getDB();
        return $db->obtenerDatos("select id_proveedor, proveedor  from proveedor");
    }

    public static function getColumnNames()
    {
        return array("id","proveedor");
    }

    static function getById($id)
    {
        $db = Datos::getDB();
        return $db->obtenerFila("select proveedor from proveedor where id_proveedor ='$id'");
    }

    public static function update($proveedor, $id)
    {
        $db = Datos::getDB();
        $db->ejecutar("update proveedor set proveedor = '$proveedor' where id_proveedor = '$id'");
    }

    public static function delete($id)
    {
        $db = Datos::getDB();
        $db->ejecutar("delete from proveedor where id_proveedor=$id");
    }
}