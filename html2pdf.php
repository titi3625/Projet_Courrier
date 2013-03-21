<?php
$content = require('recherche.php');

require_once(dirname(__FILE__).'/html2pdf/html2pdf.class.php');
$html2pdf = new HTML2PDF('L','A4','fr');
$html2pdf->WriteHTML($content);
$html2pdf->Output('recherche.pdf');