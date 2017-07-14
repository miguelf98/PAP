<pre>
<?php
session_start();
print_r($_SESSION);
require __DIR__.'/vendor/autoload.php';
use Spipu\Html2Pdf\Html2Pdf;
ob_end_clean();
$html2pdf = new Html2Pdf('P','A8','en');
$html2pdf->writeHTML('<page backleft="13mm"><h1>1</h1></page>');
//$html2pdf->output();









?>
</pre>
