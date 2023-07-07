<?php
require_once app_path('ThirdParty/MPDF/mpdf.php');

$mpdf = new \Mpdf\Mpdf([
    'mode' => 'utf-8',
    'format' => 'A4',   // A4-L
    'margin_left' => 5,
    'margin_right' => 5,
    'margin_top' => 5,
    'margin_bottom' => 5,
    'margin_header' => 0,
    'margin_footer' => 0
]);

$mpdf->autoLangToFont = true;
$mpdf->autoScriptToLang = true;
$mpdf->useSubstitutions = true;

$stylesheet = '<style>';
$stylesheet.= '* { font-family: Arial, "Microsoft JhengHei", 微軟正黑體, "Heiti TC", "PMingLiU", 新細明體; box-sizing: border-box; outline: none; padding: 0px; margin: 0px; }';
$stylesheet = '</style>';
if(!empty($stylesheet)) {
    $mpdf->WriteHTML($stylesheet,\Mpdf\HTMLParserMode::HEADER_CSS);
}

$mpdf->WriteHTML($html_1);

$mpdf->AddPage();

$mpdf->WriteHTML($html_2);

// set pdf title
$mpdf->SetTitle('your_title_here');
$mpdf->Output();
