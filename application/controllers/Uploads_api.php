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
class Uploads_api extends \Restserver\Libraries\REST_Controller {
    
 
        public function index_post(){
    
        $config['upload_path'] = './imageapp/';
        $config['allowed_types'] = '*';
        $config['max_size']  = '1000000000';
        $config['max_width']  = '1000000000';
        $config['max_height']  = '1000000000';
        
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        // $img = $this->upload->do_upload('file');
        if ( ! $this->upload->do_upload('file')){
            $error = array('error' => $this->upload->display_errors());
            $this->response(array(
                'status' => 'false',
                 
                ));
        }
        else{
            $dd = $this->upload->data();
            $data = array('upload_data' => $dd);
             $this->response(array(
            'status' => 'true',
            'error' => $dd['file_name']
            
            ));
            
            // $kk = $dd['file_name'];
           
            // $arr = array(
            //                     'Name_image4'=>$kk,
            //                     'id_Problem'=>$idp
            //                 );
            // $this->db->insert('Images4', $arr);
           
            
        
        }
        
    
        }
    

}