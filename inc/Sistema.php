<?php
/**
 * Created by PhpStorm.
 * User: cresh
 * Date: 4/11/16
 * Time: 10:16 PM
 */
session_start();
include 'config.php';
// Include las librerias
//require_once(PATHLIB.'html2pdf/vendor/autoload.php');
require_once('Rutas.php');
require_once('baseControl.php');
require_once('Registro.php');
require_once('Template.php');
//

$web = new Registro();