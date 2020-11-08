<?php
// Cargamos la librería dompdf que hemos instalado en la carpeta dompdf
require_once '../dompdf/autoload.inc.php';

$id_=$_REQUEST['nest'];


// reference the Dompdf namespace
use Dompdf\Dompdf;

// instantiate and use the dompdf class
$dompdf = new Dompdf();

$archivo = "http://127.0.0.1/sisinv/reportes/persona/reporte.php?nest=".$id_;

$html=file_get_contents($archivo);


$dompdf->load_html(mb_convert_encoding($html,'UTF-8'));


// (Optional) Setup the paper size and orientation
$dompdf->setPaper('A4', 'landscape');

// Render the HTML as PDF
$dompdf->render();

// Output the generated PDF to Browser
$dompdf->stream();
