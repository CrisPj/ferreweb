<?php

/**
 * Created by PhpStorm.
 * User: cresh
 * Date: 4/12/16
 * Time: 9:39 PM
 */
include "models/BaseModel.php";
class RolUsuario extends BaseModel
{
    public static function obtenerRoles($email)
    {
        $db = Datos::getDB();
        return $db->obtenerDatosAssoc1("select rol.id_rol,rol from usuario u inner join rol_usuario r ON u.id_usuario = r.id_usuario
                                                   join rol on rol.id_rol = r.id_rol where email = '$email'");
    }
}