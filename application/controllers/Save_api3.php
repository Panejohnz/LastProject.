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
class Save_api3 extends \Restserver\Libraries\REST_Controller {

    public function index_post(){
        
        // $img = $this->input->post('img4');
        // $dat = date("Y-m-d");

        // $arr = array(
        //     'image_filename'=>$img,
        //     'contract_id'=>$idc,
        //     'payment_date'=> $dat,
        //     'bill_id'=> $idb
            
            
        // );
        
        // if(!empty($arr)){
        //         $this->response(array(
        //             'status' => 'true'
        //         ));
         
        //     $this->db->insert('payment', $arr);
            
           
        // }
        // else
        // {
        //         $this->response(array(
        //             'status' => 'false'
        //         ));
        // } 

    $config['upload_path'] = './imageapp3/';
    $config['allowed_types'] = '*';
    $config['max_size']  = '1000000000';
    $config['max_width']  = '1000000000';
    $config['max_height']  = '1000000000';

    // $this->load->library('upload', $config);
    $this->upload->initialize($config);
    if ( ! $this->upload->do_upload('file')){
        $error = array('error' => $this->upload->display_errors());
    }
    else{
        $data = array('upload_data' => $this->upload->data());
    }
    // $upload_data = $this->upload->data(); //Returns array of containing all of the data related to the file you uploaded.
    //     $file_name = $upload_data['file_name'];
    
        $idc = $this->input->post('idu');
        $idb = $this->input->post('billid');
        $upload_data = $this->upload->data();
        $file_name = $upload_data['file_name'];
        $dat = date("Y-m-d");
         
        $arr = array(
            'image_filename'=>$file_name,
            'contract_id'=>$idc,
            'payment_date'=> $dat,
            'bill_id'=> $idb,
            'payment_status' => 1
        // 'user_id' => $this->input->post('user_id'),
        // 'date' => $this->input->post('date')
        
    );
    if($dat == null){
        $this->response(array(
            'status' => 'no'
        ));
    }else{
        
        $this->response(array(
            'status' => 'insert'
        ));
        
    }
    $this->db->insert('payment', $arr);  
    
}
}
