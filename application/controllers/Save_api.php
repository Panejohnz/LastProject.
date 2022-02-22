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
class Save_api extends \Restserver\Libraries\REST_Controller {

    public function index_post($idc,$idcomp){
        $img = $this->input->post('img4');

        $arr = array(
            'image_filename'=>$img,
            'contract_id'=>$idc,
            'complain_id'=>$idcomp
            
            
            
        );
        
        if(!empty($img)){
                $this->response(array(
                    'status' => 'true'
                ));
         
            $this->db->insert('imagecomplain', $arr);
           
        }
        else
        {
                $this->response(array(
                    'status' => 'false'
                ));
        }   
    }
}
