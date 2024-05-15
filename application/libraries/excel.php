<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once APPPATH."/third_party/PHPExcel.php";

class Excel extends PHPExcel 
{
    public function __construct() {
        parent::__construct();
    }

    public function output($filename, $PHPExcel = NULL)
    {
        
        if ($PHPExcel == NULL){ $PHPExcel = $this; }
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header("Content-Disposition: attachment;filename='{$filename}'"); 
        header('Cache-Control: max-age=0'); //no cache
        //$objWriter = PHPExcel_IOFactory::createWriter($this, $fileType);
        $objWriter = new PHPExcel_Writer_Excel2007($PHPExcel);
        ob_end_clean();
        $objWriter->save('php://output');
        exit();
    }

    public function created_file($filename, $PHPExcel = NULL)
    {
        if ($PHPExcel == NULL){ $PHPExcel = $this; }

        $objWriter = new PHPExcel_Writer_Excel2007($PHPExcel);
        ob_end_clean();
        $objWriter->save($filename);

    }
    public function export($filename, $data = array())
    {
        $filename .= '_'.date('Ymd').'.xlsx';
        
        /* 
        EX:
        $data = array();
        $data[] = array('A', 'B', 'C');
        */

        $fileType = 'Excel2007';       
        //$this->setActiveSheetIndex(0); 
        $activeSheet = $this->getActiveSheet();
        $activeSheet->fromArray($data, NULL, 'A1');  

        $range = range('A', $activeSheet->getHighestDataColumn());

        foreach ( $range as $col)
        {
            $activeSheet->getColumnDimension($col)->setAutoSize(true);
        }

        

        $this->output($filename);
    }

    function columnAutoSize()
    {
        $activeSheet = $this->getActiveSheet();
        $range = range('A', $activeSheet->getHighestDataColumn());
        foreach ( $range as $col)
        {
            $activeSheet->getColumnDimension($col)->setAutoSize(true);
        }
    }



    function read_file($file_path = '')
    {
         $objReader = PHPExcel_IOFactory::createReader('Excel2007');
         $objPhpExcel = $objReader->load($file_path);
         $sheetData = $objPhpExcel->getActiveSheet()->toArray();

         return $sheetData;
    }


    function upload_file($post_name = 'file')
    {
        $config = array(
            'allowed_types' => 'xlsx',
            'overwrite' => TRUE,
            'max_size' => 5000000,
            'upload_path' => './uploads/import_data/'
        );       
        $CI =& get_instance();
        $CI->load->library('upload', $config);        
        $CI->upload->initialize($config);

        //$file = $this->input->post($post_name);

        if (!$CI->upload->do_upload($post_name)) 
        {
            $msg = 'Upload fail: ' . $CI->upload->display_errors();
            var_dump($msg);
            
        }
        else {
            $data = $CI->upload->data();
            return $data;
        }
        return NULL;
    }



}