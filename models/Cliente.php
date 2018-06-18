<?php
/**
 * Copyright (c) 2016. Cristian Perez
 */
include "models/BaseModel.php";
class Cliente extends BaseModel
{
    public static function obtenerDatosCliente($id_cliente)
    {
        $db = Datos::getDB();
        return $db->obtenerFila("select * from cliente where id_cliente ='$id_cliente'");
    }

    public static function obtenerDatos($id_cliente)
    {
        $db = Datos::getDB();
        return $db->obtenerDatos("select * from vistaCarrito where id_cliente ='$id_cliente'");
    }

    public static function obtenerIddeEmail($email)
    {
        $db = Datos::getDB();
        return $db->obtenerDato("select c.id_cliente from cliente c join usuario u on u.id_usuario = c.id_usuario where u.email = '$email'");
    }

    public static function getTotal($id_cliente)
    {
        $db = Datos::getDB();
        return $db->obtenerDato("select sum(subtotal) from vistaCarrito where id_cliente='$id_cliente'");

    }

    public static function esMiCarrito($id_cliente, $id_carro)
    {
        $db = Datos::getDB();
        return $db->obtenerDato("select id_carrito from carrito where id_cliente='$id_cliente'");

    }

    public static function borrarCarro($id_cliente)
    {
        $db = Datos::getDB();
        $sql = "delete from carrito_detalle where id_carrito in (select id_carrito from carrito where id_cliente = $id_cliente and fecha_compra = '0-0-0')";
        $db->ejecutar($sql);
        $sql = "delete from carrito where id_cliente = $id_cliente and fecha_compra = '0-0-0'";
        $db->ejecutar($sql);
    }

    public static function tengoCarrito($id_cliente)
    {
        $db = Datos::getDB();
        return $db->obtenerDatos("select id_carrito from carrito where id_cliente = '$id_cliente'");
    }
    public static function actualizarCarrito($id_carro,$id_producto,$cantidad)
    {
        $db = Datos::getDB();
        $cantidadOld = $db->obtenerDato("select cantidad from carrito_detalle where id_carrito = $id_carro and id_producto =$id_producto");
$db->ejecutar("update carrito_detalle set cantidad = ($cantidadOld)+ $cantidad where id_carrito = $id_carro and id_producto = $id_producto");
    }
    public static function crearCarrito($id_cliente,$id_producto,$fecha,$cantidad)
    {
        $db = Datos::getDB();
        $sql = "insert into carrito(id_cliente,fecha) values ($id_cliente,'$fecha')";
        $db->ejecutar($sql);
        $id_carrito = self::obtenerIdCarrito($id_cliente);
        $sql = "insert into carrito_detalle(id_carrito,id_producto,cantidad) values ($id_carrito,$id_producto,$cantidad)";
        $db->ejecutar($sql);
    }
    public static function limpiarCarritos($id_cliente)
    {
        $db = Datos::getDB();
        $sql = implode(",",$db->obtenerDatosAssoc1("select id_carrito from carrito where fecha_compra = '0-0-0' and fecha < DATE_SUB(NOW(), INTERVAL 7 DAY)"));
        if (!empty($sql))
        {
            $db->ejecutar("delete from carrito_detalle where id_carrito in ($sql)");
            $db->ejecutar("delete from carrito where id_carrito in ($sql);");
        }

    }

    public static function agregarProductoCarro($id_producto, $id_cliente,$cantidad)
    {
        $actualizo = false;
        if (self::tengoCarrito($id_cliente))
        {
            $id_carritos = self::obtenerIdCarritos($id_cliente);
            self::limpiarCarritos($id_cliente);
            foreach ($id_carritos as $id_carro)//no seguro
            {
                if (self::existeProductoCarrito($id_carro,$id_producto))
                {
                    self::actualizarCarrito($id_carro,$id_producto, $cantidad);
                    $actualizo = true;
                    break;
                }
            }
            if (!$actualizo)
            {
                self::actualizarProductoCarrito($id_carritos[0],$id_producto,$cantidad);
            }
        }
        else
        {
            self::crearCarrito($id_cliente,$id_producto,date("Y-m-d"),$cantidad);
        }
    }

    private static function obtenerIdCarrito($id_cliente)
    {
        $db = Datos::getDB();
        return $db->obtenerDato("select id_carrito from carrito where id_cliente = $id_cliente AND fecha_compra = '0-0-0'");
    }

    private static function obtenerIdCarritos($id_cliente)
    {
        $db = Datos::getDB();
        return $db->obtenerDatosAssoc1("select id_carrito from carrito where id_cliente = $id_cliente AND fecha_compra is NULL ");
    }

    private static function existeProductoCarrito($id_carrito, $id_producto)
    {
        $db = Datos::getDB();
        return $db->obtenerDato("select * from carrito_detalle where id_carrito = $id_carrito and id_producto=$id_producto");
    }

    private static function actualizarProductoCarrito($id_carrito, $id_producto,$cantidad)
    {
        $db = Datos::getDB();
        return $db->ejecutar("insert into carrito_detalle values ($id_carrito,$id_producto,$cantidad)");
    }

    public static function borrarProductoCarrito($id_carrito, $id_producto)
    {
        $db = Datos::getDB();
        return $db->ejecutar("delete from carrito_detalle where id_carrito = $id_carrito and id_producto = $id_producto");
    }

    public static function comprarCarro($id_cliente)
    {
        $db = Datos::getDB();

        $id_carro = self::obtenerIdCarrito($id_cliente);
        $fecha = date("Y-m-d");
        $sql = "update carrito set fecha_compra = $fecha where id_cliente=$id_cliente and id_carrito = $id_carro and fecha_compra = '0-0-0'";
        die($sql);
        $db->ejecutar("update carrito set fecha_compra = '$fecha' where id_cliente=$id_cliente and id_carrito = $id_carro and fecha_compra = '0-0-0' ");
    }

    public static function obtenerCompras($id_cliente)
    {
        $db = Datos::getDB();
        return $db->obtenerDatos("select p.nombre, c.fecha,c.fecha_compra from carrito c 
JOIN carrito_detalle cd on c.id_carrito = cd.id_carrito
 join producto p on p.id_producto = cd.id_producto where c.id_cliente=$id_cliente and c.fecha_compra != '0-0-0' ");
    }
}