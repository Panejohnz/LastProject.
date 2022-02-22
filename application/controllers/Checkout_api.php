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
class Checkout_api extends \Restserver\Libraries\REST_Controller{

    public function index_post()

	{
        $id = $this->input->post('idu');
        $dout = $this->input->post('date_out');
        
        $this->db->where('contract_id', $id);
		$object = array(
            'date_out' => $dout,
            // 'contract_id' => $id
			// 'user_id' => $this->input->post('user_id'),
			// 'date' => $this->input->post('date')
			'is_checkout' => 2
        );


        if($dout == null){
            $this->response(array(
                'status' => 'no'
            ));
        }else{
            $this->db->update('contract', $object);
            $this->response(array(
                'status' => 'update'
            ));
            
        }
    

    }
    
}