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
class Selectcon_api extends \Restserver\Libraries\REST_Controller {

    public function index_post($id)
    {

            $this->db->select('*');
            $this->db->from('users');
            $this->db->join('contract', 'contract.user_id  = users.user_id');
            $this->db->join('room', 'contract.room_id  = room.room_id');
            $this->db->join('roomcategory', 'roomcategory.roomcategory_id  = room.roomcategory_id');
            
            $this->db->where('contract.user_id', $id);
<<<<<<< HEAD
            $this->db->where('contract.is_checkout',1);
            $data = $this->db->get();
            $data1 = $data->result_array();
            
            if(!empty($data1)){
                $this->response(array(
                    'message' => 'success', 
                    'status' => 'true', 
                    'data' => $data1));
=======
            $data = $this->db->get();
            $data = $data->result_array();
            
            if(!empty($data)){
                $this->response(array(
                    'message' => 'success', 
                    'status' => 'true', 
                    'data' => $data));
>>>>>>> 3588236fa7fed00d3b180629b813a77e77440522
            }else{
                $this->response(array(
                    'message' => 'unsuccess', 
                    'status' => 'false'));
            }
       
                           
       
    
    }
}
?>