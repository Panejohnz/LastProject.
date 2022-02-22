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
class SelectRoomaa_api extends \Restserver\Libraries\REST_Controller {

    public function index_post($id)
    {

            $this->db->select('*');
            $this->db->from('moveroom');
            $this->db->join('contract', 'contract.contract_id  = moveroom.contract_id');
            $this->db->join('users', 'users.user_id = contract.user_id ');
            $this->db->join('emmployee','emmployee.employee_id = moveroom.employee_id','LEFT');
            $this->db->join('employeestatus', 'employeestatus.employeestatus_id = emmployee.statusem','LEFT');
            $this->db->join('approvestatus','approvestatus.approvestatus_id = moveroom.moveroom_status','LEFT');
            
            $this->db->where('contract.user_id', $id);
            $data = $this->db->get();
            $data = $data->result_array();
            
            if(!empty($data)){
                $this->response(array(
                    'message' => 'success', 
                    'status' => 'true', 
                    'data' => $data));
            }else{
                $this->response(array(
                    'message' => 'unsuccess', 
                    'status' => 'false'));
            }
       
                           
       
    
    }
}
?>