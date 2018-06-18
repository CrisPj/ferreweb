<?php

/**
 * Created by PhpStorm.
 * User: cresh
 * Date: 4/13/16
 * Time: 9:26 AM
 */
include "lib/phpmailer/PHPMailerAutoload.php";
include "models/BaseModel.php";
class Usuario extends BaseModel
{

    public static function obtenerDatos($email, $password)
    {
        $db = Datos::getDB();


        $retorno = $db->obtenerDatos("select * from usuario where email ='$email' and password = '$password'");
        if (empty($retorno)) {
            return -1;
        }
        return $retorno;
    }

    public static function mandarMail($destino, $asunto, $mensaje, $nombre)
    {
        $mail = new PHPMailer();
        $mail->isSMTP();

        try
        {
            $mail->SMTPDebug  = MAIL_SMTPDEBUG;
            $mail->SMTPAuth = true;
            $mail->SMTPSecure = MAIL_SECURE;
            $mail->Host = MAIL_HOST;
            $mail->Port = MAIL_PORT;
            $mail->Username = MAIL_USERNAME;
            $mail->Password = MAIL_PASSWORD;
//            $mail->addReplyTo('name@yourdomain.com', 'First Last');
            $mail->addAddress($destino, $nombre);
            $mail->setFrom(MAIL_USERNAME, 'Servicio Ferreweb');
            $mail->Subject = $asunto;
            $mail->msgHTML($mensaje);
            $mail->send();
        }
        catch (phpmailerException $e)
        {
            echo $e->errorMessage();
        }
    }


    public static function obtenerPrivilegiosID($rol)
    {
        $db = Datos::getDB();
        return $db->obtenerDatos("select p.id_privilegio, privilegio from rol r join rol_privilegio rp on r.id_rol = rp.id_rol 
                                                    join privilegio p on p.id_privilegio = rp.id_privilegio where r.rol = '$rol'");
    }

    public static function obtenerRoles($email)
    {
        $db = Datos::getDB();
        return $db->obtenerDatosAssoc1("select rol.id_rol,rol from usuario u inner join rol_usuario r ON u.id_usuario = r.id_usuario
                                                   join rol on rol.id_rol = r.id_rol where email = '$email'");
    }

    public static function obtenerClave()
    {
        return strtolower(substr(md5(rand(0, 100000)), 0, 8));
    }

    public static function insertarClaveTemporal($claveTemporal, $email)
    {
        $db = Datos::getDB();
        $db->ejecutar("update usuario set clave='$claveTemporal' WHERE email='$email'");
    }

    public static function insertarPass($pass, $email)
    {
        $db = Datos::getDB();
        $db->ejecutar("update usuario set password='$pass' WHERE email='$email'");
    }

    public static function obtenerClaveTemporal($email)
    {
        $db = Datos::getDB();
        return $db->obtenerDato("SELECT clave FROM usuario where email = '$email'");
    }

    public static function crearNuevo($email, $pass)
    {
        $db = Datos::getDB();
        $db->ejecutar("insert into usuario(email, password) values ('$email','$pass')");
        $id =self::obtenerId($email);
        $db->ejecutar("insert into rol_usuario(id_rol, id_usuario) values (3,'$id')");
        return $db->ejecutar("insert into cliente(id_usuario) values ('$id')");
    }

    private static function obtenerId($email)
    {
        $db = Datos::getDB();
        return $db->obtenerDato("SELECT id_usuario FROM usuario WHERE email = '$email'");
    }

    public static function obtenerTodos()
    {
        $db = Datos::getDB();
        return $db->obtenerDatos("SELECT id_usuario,email,nombre FROM usuario");
    }

    public static function obtenerCorreo($id)
    {
        $db = Datos::getDB();
        return $db->obtenerDato("SELECT email FROM usuario WHERE id_usuario = '$id'");
    }

    public static function obtenerNombre($email)
    {
        $db = Datos::getDB();
        return $db->obtenerDato("select nombre from usuario where email = '$email'");
    }

    static function obtenerTodosRoles()
    {
        $db = Datos::getDB();
        return $db->obtenerDatosAssoc1("select * from rol");
    }

    static function obtenerTodosRolesTabla()
    {
        $db = Datos::getDB();
        return $db->obtenerDatos("select * from rol");
    }

    public static function obtenerPrivilegios($email)
    {
        $db = Datos::getDB();
        return $db->obtenerDatosAssoc1("Select p.privilegio from privilegio p join rol_privilegio rp on p.id_privilegio = rp.id_privilegio
                                                                join rol r on r.id_rol = rp.id_rol
                                                                join rol_usuario ru on r.id_rol = ru.id_rol
                                                                join usuario u on ru.id_usuario = u.id_usuario
                                                                where u.email = '$email'");
    }

    public static function getColumnNames()
    {
        return array('id_usuario','correo','nombre');
    }

    public static function obtenerTodosPrivilegios()
    {
        $db = Datos::getDB();
        return $db->obtenerDatosAssoc1("select privilegio from privilegio");
    }

    public static function update($email, $pass, $id)
    {
        $db = Datos::getDB();
        $db->ejecutar("update usuario set email='$email',pass='$pass' where id = $id");
    }

    public static function delete($id)
    {
        $db = Datos::getDB();
        $db->ejecutar("delete from usuario where id=$id");
    }

    public static function getByID($id)
    {
        $db = Datos::getDB();
        return $db->obtenerFila("select email, password from usuario where id_usuario =$id");
    }

    public static function getRoleById($id)
    {
        $db = Datos::getDB();
        return $db->obtenerDato("Select rol from  rol where id_rol = $id");
    }

    public static function insertarRolUsuario($id_user, $rol)
    {
        $db = Datos::getDB();
        $db->ejecutar("insert into rol_usuario (id_rol, id_usuario) values ($rol,$id_user)");
    }

    public static function deleteRol($id_rol,$id_user)
    {
        $db = Datos::getDB();
        $db->ejecutar("delete from rol_usuario  where id_rol =$id_rol and id_usuario = $id_user");
    }

    public static function deletePrivilegioRol($id, $id_privilegio)
    {
        $db = Datos::getDB();
        $db->ejecutar("delete from rol_privilegio  where id_rol =$id and id_privilegio = $id_privilegio");
    }

    public static function insertarRolPrivilegio($id_rol, $privilegio)
    {
        $db = Datos::getDB();
        $db->ejecutar("insert into rol_privilegio (id_rol,id_privilegio) values ($id_rol, id_privilegio)");
    }

    public static function borrarClaveTemporal($email)
    {
        self::insertarClaveTemporal("NULL",$email);
    }

}