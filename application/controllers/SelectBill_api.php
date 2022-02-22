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
class SelectBill_api extends \Restserver\Libraries\REST_Controller {

    public function index_post($user,$id)
    {
       
        $data1 =  $this->db->query("SELECT * , (select  SUM(billfurniture.furnitureprice) FROM billfurniture where billfurniture.biil_id = bill.bill_id ) as sum1, 
        (select  SUM(billutility.utilitypricetotal) FROM billutility where billutility.bill_id = bill.bill_id ) as sum2 
        FROM  bill
                INNER JOIN contract on contract.contract_id = bill.contract_id
                INNER JOIN users on users.user_id = contract.user_id
                LEFT JOIN emmployee on emmployee.employee_id = bill.employee_id
                LEFT JOIN employeestatus ON employeestatus.employeestatus_id = emmployee.statusem
                WHERE users.user_id = '$user' and contract.room_id = '$id'
                GROUP BY bill.bill_id");
        
        $yy = $data1->result_array();
       
        foreach( $yy as &$row) {
            // $row['sum1'] = "555";
            $data2 =  $this->db->query("select * from billutility 
            left join publicutility
            on billutility.utility_id = publicutility.utility_id WHERE billutility.bill_id ='".$row['bill_id']."'");
            $yy2 = $data2->result_array();
            $row['arraypublicutility'] =  $yy2;
            $data2 =  $this->db->query("SELECT * FROM billfurniture LEFT JOIN furniture ON billfurniture.furniture_id = furniture.furniture_id 
            WHERE billfurniture.biil_id = '".$row['bill_id']."' ");
            $yy3 = $data2->result_array();
            $row['arrayfuniture'] =  $yy3;
           
        }
        


            // $this->db->select('*');
            // $this->db->from('bill');
            // $this->db->join('contract', 'contract.contract_id  = bill.contract_id');
            // $this->db->join('users', 'users.user_id = contract.user_id ');
            // $this->db->join('room', 'room.room_id  = contract.room_id');
            // $this->db->join('billutility','billutility.bill_id = bill.bill_id');
            // $this->db->join('emmployee','emmployee.employee_id = bill.employee_id','LEFT');

            
            // $this->db->join('employeestatus', 'employeestatus.employeestatus_id = emmployee.statusem','LEFT');
            // // $this->db->join('approvestatus','approvestatus.approvestatus_id = complain.complain_status','LEFT');
           
            
            // $this->db->where('users.user_id', $user);
            // $this->db->where('contract.room_id', $id);
            
            
           
            // $data = $this->db->get();
            // $data1 = $data->result_array();
            
            if(!empty($yy)){
                $this->response(array(
                    'message' => 'success', 
                    'status' => 'true', 
                    'data' => $yy));
            }else{
                $this->response(array(
                    'message' => 'unsuccess', 
                    'status' => 'false'));
            }
       
       
        
    
    
    }
}
?>