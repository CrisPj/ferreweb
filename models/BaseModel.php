<?php

/**
 * Created by PhpStorm.
 * User: cresh
 * Date: 4/12/16
 * Time: 9:51 PM
 */
include "inc/Datos.php";
Abstract class BaseModel
{
    public function html2df($contenido, $nombre)
{
    $html2pdf = new HTML2PDF('P','A4','es');
    $html2pdf->setDefaultFont('Arial');
    $html2pdf->writeHTML($contenido,isset($_GET['vuehtml']));
    $html2pdf->Output($nombre.'.pdf');
}
}