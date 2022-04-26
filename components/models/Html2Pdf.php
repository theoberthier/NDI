<?php

require getcwd() . "/public/assets/vendors/vendor/autoload.php";
use Spipu\Html2Pdf\Html2Pdf;

class PdfGenerator {
    static function generate($content) {
        $html2pdf = new Html2Pdf();
        // $html2pdf->addFont('Potta One', 'B', getcwd() . "/link");
        // $html2pdf->setDefaultFont('Potta One');
        $html2pdf->writeHTML($content);
        $html2pdf->Output();
    } 
    static function generateMailAttachment($pdfname, $content) {
        $html2pdf = new Html2Pdf();
        // $html2pdf->addFont('Potta One', 'B', getcwd() . "/link");
        // $html2pdf->setDefaultFont('Potta One');
        $html2pdf->writeHTML($content);
        return $html2pdf->Output('', 'S');
    } 
}