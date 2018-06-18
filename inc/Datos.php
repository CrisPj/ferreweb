<?php
include "Conexion.php";
class Datos extends Conexion
{
    private static $estancia = NULL;

    public function __construct()
    {
        parent::Conectar();
    }

    public function ejecutar($query)
    {
        $resultado = dibi::query($query);
        return $resultado;
    }

    public function exec($query)
    {
         dibi::nativeQuery($query);
    }

    public function obtenerDato($query)
    {
        $valor = $this->ejecutar($query)->fetchSingle();
        return $valor;
    }

    public function obtenerFila($query)
    {
        $valor = $this->ejecutar($query)->fetch();
        return $valor;
    }

    public function obtenerColumnas($nombreTabla)
    {

        $retorno = array();
        if (DB_DRIVER == 'mysql')
        {
            $datos = $this->ejecutar("desc ".$nombreTabla);
            foreach ($datos as $valor => $row)
            {
                array_push($retorno,$row['Field']);
            }
        }
        else if(DB_DRIVER == "sqlite3")
        {
            $retorno = $this->obtenerDatosAssoc1("PRAGMA TABLE_INFO([$nombreTabla])");
        }
    else
    {
        $retorno = $this->obtenerDatosAssoc1("select column_name
from INFORMATION_SCHEMA.COLUMNS where table_name =  '".$nombreTabla."'");
    }

        return $retorno;
    }

    public function obtenerDatos($query)
    {
        $valor = $this->ejecutar($query)->fetchAll();
        return $valor;
    }
    public function obtenerDatosAssoc1($query)
    {
        $valor = $this->ejecutar($query)->fetchPairs();
        return $valor;
    }

    public function obtenerDatosAssoc2($query,$tipo1,$tipo2)
    {
        $valor = $this->ejecutar($query)->fetchPairs($tipo1,$tipo2);
        return $valor;
    }

    public static function getDB()
    {
        if (!isset(self::$estancia))
        {
            self::$estancia = new Datos();
        }
        return self::$estancia;
    }
}