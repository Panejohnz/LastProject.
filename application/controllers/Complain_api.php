<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
// This can be removed if you use __autoload() in config.php OR use Modular Extensions
/** @noinspection PhpIncludeInspection */
require APPPATH . '/libraries/REST_Controller.php';
 
/**
 * This is an example of a few basic user interaction methods you could use
 * all done with a hardcoded array
 *
 * @package         CodeIgniter
 * @subpackage      Rest Server
 * @category        Controller
 * @author          Phil Sturgeon, Chris Kacerguis
 * @license         MIT
 * @link            https://github.com/chriskacerguis/codeigniter-restserver
 */
class Complain_api extends \Restserver\Libraries\REST_Controller{

    public function index_post()

	{
        $id = $this->input->post('idu');
        $title = $this->input->post('title');
        $detail = $this->input->post('complaindetail');
        $dat = date("Y-m-d");
		$object = array(
            'title' => $title,
            'complaindetail' => $detail,
            'complain_date'=> $dat,
            'contract_id' => $id,
           
			// 'user_id' => $this->input->post('user_id'),
			// 'date' => $this->input->post('date')
			
        );
        if($detail == null){
            $this->response(array(
                'status' => 'no'
            ));
        }else{
            
            $this->response(array(
                'status' => 'insert'
            ));
            
        }
    $config['upload_path'] = './imageapp/';
    $config['allowed_types'] = '*';
    $config['max_size']  = '1000000000';
    $config['max_width']  = '1000000000';
    $config['max_height']  = '1000000000';

    $this->load->library('upload', $config);
    $this->upload->initialize($config);
    if ( ! $this->upload->do_upload('file')){
        $error = array('error' => $this->upload->display_errors());
    }
    else{
        $data = array('upload_data' => $this->upload->data());
    }
    $upload_data = $this->upload->data(); //Returns array of containing all of the data related to the file you uploaded.
        $file_name = $upload_data['file_name'];
    
    $id = $this->input->post('idu');
    $title = $this->input->post('title');
    $detail = $this->input->post('complaindetail');
    $dat = date("Y-m-d");
    $object = array(
        'title' => $title,
        'complaindetail' => $detail,
        'complain_date'=> $dat,
        'contract_id' => $id,
        'image_filename'  => $file_name,
        'complain_status' => 1
        // 'user_id' => $this->input->post('user_id'),
        // 'date' => $this->input->post('date')
        
    );
    $this->db->insert('complain', $object);

    }
    
}