
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Welcome extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('url'));
		$this->load->model('contract_model');
		//include(APPPATH."third_party/mpdf/mpdf.php");
	}
	public function hee(){
		$config = array();
		$data['results'] = $this->contract_model->fetch_Contract($config['per_page'], $page, $this->input->get('keyword'));
		$this->load->view("receipt_view" , $data); 
	}
	public function save()
	{
		// แปลง html view ให้เป็นรูปก่อน 
		$base64Image = $_REQUEST['base64Image'];
		$image_name = $this->input->post('image_name');
		$image_name_save = $image_name.".png";
		file_put_contents(FCPATH."download/".$image_name_save, base64_decode(str_replace('data:image/png;base64,','',$base64Image)));
		
		// นำรูปมา save เป็น pdf ด้วย mPDf
		$image = base_url("download/".$image_name_save);
		$html = '<img src="'.$image.'"/>';
		$mpdf=new mPDF('c'); 
		$mpdf->AddPage();
		$mpdf->WriteHTML($html);
		$pdf_name = $image_name.".pdf";
		$mpdf->Output(FCPATH."download/".$pdf_name,"F"); //F
		echo base_url("download/".$pdf_name);
	}
}
