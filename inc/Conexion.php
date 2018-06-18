<?php
/**
 * Copyright (c) 2016. Cristian Perez
 */

require PATHAPP . PATHLIB . 'dibi/src/loader.php';


class Conexion
{
    public $DB;
    public $conn;
    private $server;
    private $host;
    private $userdb;
    private $passdb;
    private $database;
    private $driver;

    public function Conectar()
    {
        $this->server = DB_DBMS;
        $this->host = DB_HOST;
        $this->userdb = DB__USER;
        $this->passdb = DB_PASS;
        $this->database = DB_NAME;
        $this->driver = DB_DRIVER;

        if (DB_DRIVER == "sqlite3")
        {
            dibi::connect([
                'driver' => $this->driver,
                'database' => $this->database,
            ]);
        }
        else
        {
            dibi::connect([
                'driver' => $this->driver,
                'host' => $this->host,
                'username' => $this->userdb,
                'password' => $this->passdb,
                'database' => $this->database,
            ]);
        }

    }
}



