<?php

/**
 * Created by PhpStorm.
 * User: cresh
 * Date: 4/12/16
 * Time: 9:39 PM
 */
include "models/BaseModel.php";
class Empleado extends BaseModel
{
    public static function getByCorreoUser($correoUsuario)
    {
        $db = Datos::getDB();
        return $db->obtenerDato("select id_usuario from usuario where email = '$correoUsuario'");
    }

    public static function getDatos($idUsuario)
    {
        $db = Datos::getDB();
        $sql = "select nombre, apaterno, amaterno, rfc,nacimiento,foto from empleado where id_usuario = $idUsuario";
        return $db->obtenerFila($sql);
    }

    public static function cambiarDatos($iduser,$nombre, $apaterno, $amaterno, $rfc, $nacimiento)
    {
        $db = Datos::getDB();
        $sql = "update empleado set nombre='$nombre', apaterno='$apaterno',amaterno='$amaterno',rfc='$rfc',nacimiento = '$nacimiento' where id_usuario=$iduser";
        $db->ejecutar($sql);
    }

    public static function cambiarFoto($id, $foto)
    {
        $db = Datos::getDB();
        $sql = "update empleado set foto = '$foto' where id_usuario=$id";
        $db->exec($sql);
    }

    public static function existe($id_usuario)
    {
        $db = Datos::getDB();
        $sql = "select * from empleado where id_usuario = $id_usuario";
        return $datos = $db->obtenerDato($sql);
    }

    public static function nuevo($id, $nombre, $apaterno, $amaterno, $rfc, $nacimiento)
    {
        $db = Datos::getDB();
        $sql = "insert into empleado(id_usuario,nombre,apaterno,amaterno,rfc,nacimiento) values ('$id','$nombre','$apaterno','$amaterno','$rfc','$nacimiento')";
        $db->ejecutar($sql);
    }
}