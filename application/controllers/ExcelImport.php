<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ExcelImport extends CI_Controller {

    public function __construct() {
        Parent::__construct();
        $this->load->model("Members_model", "Members");
        $this->load->model("Transactions_model", "Transactions");
        
    }
	public function index()
	{
        $this->load->view('header');
        $this->load->view('excelimport');
        $this->load->view('footer');
    }
    
    public function import() {
        if(isset($_FILES["excelfile"]["name"]))
		{
			$path = $_FILES["excelfile"]["tmp_name"];
			$object = PHPExcel_IOFactory::load($path);
			foreach($object->getWorksheetIterator() as $worksheet)
			{
				$highestRow = $worksheet->getHighestRow();
				$highestColumn = $worksheet->getHighestColumn();
				for($row=2; $row<=$highestRow; $row++)
				{
                    $date = $worksheet->getCellByColumnAndRow(0, $row)->getValue();
                    $ref_no = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
                    $member_name = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
                    $member_no = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
					$pay_type = $worksheet->getCellByColumnAndRow(4, $row)->getValue();
                    $member_company = $worksheet->getCellByColumnAndRow(5, $row)->getValue();
                    $payment_by = $worksheet->getCellByColumnAndRow(6, $row)->getValue();
                    $batch_no = $worksheet->getCellByColumnAndRow(7, $row)->getValue();
                    $receipt_no = $worksheet->getCellByColumnAndRow(8, $row)->getValue();
                    $cheque_no = $worksheet->getCellByColumnAndRow(9, $row)->getValue();
                    $payment_description = $worksheet->getCellByColumnAndRow(10, $row)->getValue();
                    $renewal_year = $worksheet->getCellByColumnAndRow(11, $row)->getValue();
                    $subtotal = $worksheet->getCellByColumnAndRow(12, $row)->getValue();
                    $totaltax = $worksheet->getCellByColumnAndRow(13, $row)->getValue();
                    $total = $worksheet->getCellByColumnAndRow(14, $row)->getValue();
					$members[] = array(
						'type' => explode(" ", $member_no)[0],
						'no' =>	explode(" ", $member_no)[1],
						'name' => $member_name,
						'company' => $member_company,
                        'created' => date('Y-m-d H:i:s'),
                        'modified' => date('Y-m-d H:i:s')
                    );
                    $transactions[] = array(
                        'member_id' => $row-1,
                        'member_name' => $member_name,
                        'member_paytype' => $pay_type,
                        'member_company' => $member_company,
                        'date' => date("Y-m-d", PHPExcel_Shared_Date::ExcelToPHP($date)),
                        'year' => date("Y", PHPExcel_Shared_Date::ExcelToPHP($date)),
                        'month' => date("m", PHPExcel_Shared_Date::ExcelToPHP($date)),
                        'ref_no' => $ref_no,
                        'receipt_no' => $receipt_no,
                        'payment_method' => $payment_by,
                        'batch_no' => $batch_no,
                        'cheque_no' => $cheque_no,
                        'payment_type' => $payment_description,
                        'renewal_year' => $renewal_year,
                        'remarks' => '',
                        'subtotal' => $subtotal,
                        'tax' => $totaltax,
                        'total' => $total,
                        'created' => date('Y-m-d H:i:s'),
                        'modified' => date('Y-m-d H:i:s')
                    );
                    $transaction_details[] = array(
                        'transaction_id' => $row-1,
                        'description' => 'Being Payment for : '.$payment_description.':'.$renewal_year,
                        'quantity' => 1.00,
                        'unit_price' => $subtotal,
                        'sum' => $subtotal,
                        'created' => date('Y-m-d H:i:s'),
                        'modified' => date('Y-m-d H:i:s'),
                        'table' => 'Member',
                        'table_id' => $row-1
                    );
				}
            }
            
            // echo 'Data Imported successfully';
            $this->Members->memberSave($members);
            $this->Transactions->transactionSave($transactions);
            $this->Transactions->trandetailSave($transaction_details);

            echo "<pre>";
            print_r($transactions);
		}	
    }
}