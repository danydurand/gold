<?php
//----------------------------------------------------------------------------------
// Programa      : test_xls.php
// Realizado por : Daniel Durand
// Fecha Elab.   : 09/03/2018
//----------------------------------------------------------------------------------
require_once('qcubed.inc.php');
use PHPMailer\PHPMailer\PHPMailer;
use Maatwebsite\Excel\Facades\Excel as Excel;

echo 1;
$data = array(
    array('data1', 'data2'),
    array('data3', 'data4')
);

echo 2;
Excel::create('Filename', function($excel) use($data) {

    $excel->sheet('Sheetname', function($sheet) use($data) {

        $sheet->fromArray($data);

    });

})->store('xls');

echo 3;