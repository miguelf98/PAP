<?php
session_start();

require __DIR__.'/vendor/autoload.php';

use Spipu\Html2Pdf\Html2Pdf;

$html2pdf = new Html2Pdf('P','A8','en');
$html2pdf->writeHTML('<page backleft="13mm"><h1>'.$_SESSION['ticket_number'].'</h1></page>');
$html2pdf->output(' '.$_SESSION['token'].'.pdf');

?>