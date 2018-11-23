<?php 
//include the file that loads the PhpSpreadsheet classes

//now you can use the Spreadsheet and Xlsx classes
//include the file that loads the PhpSpreadsheet classes

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
require 'excel/spreadsheet/vendor/autoload.php';
require_once('../db_connection.php');
//include the classes needed to create and write .xlsx file

if(isset($_REQUEST['fecha']))
{
//object of the Spreadsheet class to create the excel data
$spreadsheet = new Spreadsheet();

//add some data in excel cells
$spreadsheet->setActiveSheetIndex(0)
 ->setCellValue('A1', 'IMEI')
 ->setCellValue('B1', 'ICCID')
 ->setCellValue('C1', 'MARCA')
  ->setCellValue('D1', 'MODELO')
   ->setCellValue('E1', 'PRECIO')
    ->setCellValue('F1', 'PRECIOTAE')
        ->setCellValue('G1', 'FECHA_ENTRADA');
  $Dbobj = new db_connection(); 
  $count=0;
  $consulta="SELECT * FROM entradas WHERE Fecha_Entrada=DATE('".$_REQUEST['fecha']."')";
  $conexion = mysqli_connect("localhost","root","","dpbodega");
  $result = mysqli_query($Dbobj->getdbconnect(),$consulta);
  $rows = array();
  $count =2;
  while($r=$result->fetch_assoc()){
  $spreadsheet->setActiveSheetIndex(0)
   ->setCellValue('A'.$count,$r["Imei"])
 ->setCellValue('B'.$count,$r["Iccid"])
  ->setCellValue('C'.$count,$r["Marca"])
   ->setCellValue('D'.$count,$r["Modelo"])
    ->setCellValue('E'.$count,$r["Precio"])
     ->setCellValue('F'.$count,$r["PrecioTAE"])
     ->setCellValue('G'.$count,$r["Fecha_Entrada"]);
     $count++;
      }

//set style for A1,B1,C1 cells
$cell_st =[
 'font' =>['bold' => true],
 'alignment' =>['horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER],
 'borders'=>['bottom' =>['style'=> \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_MEDIUM]]
];
$spreadsheet->getActiveSheet()->getStyle('A1:G1')->applyFromArray($cell_st);

//set columns width
$spreadsheet->getActiveSheet()->getColumnDimension('A')->setWidth(16);
$spreadsheet->getActiveSheet()->getColumnDimension('B')->setWidth(18);
$spreadsheet->getActiveSheet()->getColumnDimension('C')->setWidth(12);
$spreadsheet->getActiveSheet()->getColumnDimension('D')->setWidth(12);
$spreadsheet->getActiveSheet()->getColumnDimension('E')->setWidth(15);
$spreadsheet->getActiveSheet()->getColumnDimension('F')->setWidth(15);
$spreadsheet->getActiveSheet()->getColumnDimension('G')->setWidth(15);

$spreadsheet->getActiveSheet()->setTitle('Simple'); //set a title for Worksheet

//make object of the Xlsx class to save the excel file
header('Content-Type: application/vnd.ms-excel');
$filename = 'excelreportdetail';
header('Content-Disposition: attachment;filename="'. $filename .'.xlsx"'); /*-- $filename is  xsl filename ---*/
header('Cache-Control: max-age=0');
$writer = new Xlsx($spreadsheet);
$writer->save('php://output');
exit;
}
?>