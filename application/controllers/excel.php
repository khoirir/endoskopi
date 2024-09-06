<?php
require APPPATH . '/libraries/vendor/autoload.php'; 
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Excel extends CI_Controller{

	function __construct(){
		parent::__construct();
		$this->load->model('m_proses');
	}

	function cetak(){
		if($this->session->userdata("sess_admin")){
			$spreadsheet = new Spreadsheet();
			$sheet = $spreadsheet->getActiveSheet();
			$sheet->setCellValue('A1', 'Hello World !');
	        
			$writer = new Xlsx($spreadsheet);
			
			$filename = 'simple';
			
			header('Content-Type: application/vnd.ms-excel');
			header('Content-Disposition: attachment;filename="'. $filename .'.xlsx"'); 
			header('Cache-Control: max-age=0');

			$writer->save('php://output');
		}
		else{
			redirect("login","refresh");
		}
	}
}
?>