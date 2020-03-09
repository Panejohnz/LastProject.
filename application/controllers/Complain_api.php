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
        $detail = $this->input->post('detail');
        $dat = date("Y-m-d");
		$object = array(
            'complaindetail' => $detail ,
            'date'=> $dat
			// 'user_id' => $this->input->post('user_id'),
			// 'date' => $this->input->post('date')
			
        );
        if($detail == null){
            $this->response(array(
                'status' => 'no'
            ));
        }else{
            $this->db->insert('complain', $object);
            $this->response(array(
                'status' => 'insert'
            ));
            
        }
      

	}
}