<?php
/**
 * Created by IntelliJ IDEA.
 * User: Sargis
 * Date: 11/6/2016
 * Time: 6:29 PM
 */

define("EXCEL_PATH", APPPATH."/libraries/Excel");

class Excel extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        /** Error reporting */
        error_reporting(E_ALL);
    }

    public function create_file($data, $name = null, $path = null) {
        date_default_timezone_set("Asia/Yerevan");
        $file = $path.$name.date(" d.m.Y G.i.s").".xlsx";

        /** Include path **/
        ini_set('include_path', ini_get('include_path').';../Classes/');
        /** PHPExcel */
        include EXCEL_PATH.'/PHPExcel.php';

        /** PHPExcel_Writer_Excel2007 */
        include EXCEL_PATH.'/PHPExcel/Writer/Excel2007.php';

        $objPHPExcel = new PHPExcel();

        foreach ($data as $key => $row) {
            $objPHPExcel->getActiveSheet()->SetCellValue($key, $row);
        }

        // Must be regenerated, test mode
		$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(30);
		$letters = ['B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M'];
		foreach ($letters as $letter) {
			$objPHPExcel->getActiveSheet()->getColumnDimension($letter)->setWidth(15);
		}

        $objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel);
        $objWriter->save(str_replace('.php', '.xlsx', __FILE__));

        rename(APPPATH."models/Excel.xlsx", $file);

        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="'.basename($file).'"');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($file));

        readfile($file);
        unlink($file);
    }

    public function read_file($path) {
        /** Include path **/
        set_include_path(get_include_path() . PATH_SEPARATOR . '../../../Classes/');

        /** PHPExcel_IOFactory */
        include EXCEL_PATH.'/PHPExcel/IOFactory.php';

        $objPHPExcel = PHPExcel_IOFactory::load($path);

        $sheetData = $objPHPExcel->getActiveSheet()->toArray(null,true,true,true);

        return $sheetData;
    }
}
