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
class Login_api extends \Restserver\Libraries\REST_Controller
{
    

    public function index_post()
    {
        $username = $this->input->post('usertxt', true);
        $password = $this->input->post('passtxt', true);

        $this->db->where('username', $username);
        $this->db->where('password', $password);
        
        
        $query =  $this->db->get('users', 1);
        if($query->num_rows()== 1)
        {
            // $data = $query->row_array();
            // $this->session->set_userdata($data);
            $this->response(array(
                'status' => 'yes'));
            
        }else
        {
            $this->response(array(
                'status' => 'no'

            ));
        }
        
        // $validate = $this->login_model->validate($username, $password);

        // if ($validate->num_rows() > 0) {
        //     $data  = $validate->row_array();
        //     $id = $data['employee_id'];
        //     $name  = $data['firstname_emp'];
        //     $email = $data['email'];
        //     $level = $data['statusem'];
        //     $sesdata = array(
        //         'employee_id' => $id,
        //         'firstname_emp'  => $name,
        //         'email'     => $email,
        //         'statusem'     => $level,
        //         'logged_in' => true
        //     );
        //     $this->session->set_userdata($sesdata);
        //     // access login for admin
        //     if ($level === '1' || $level === '2') {
        //         redirect('page');

        //         // access login for staff
        //     } elseif ($level === '0') {
        //         redirect('page/staff');
                
        //         // access login for author
        //     }
        // } else {
        //     echo $this->session->set_flashdata('msg', 'Username or Password is Wrong');
        //     redirect('LoginController');
            
        // }
    }

    // public function logout()
    // {
    //     $this->session->sess_destroy();
    //     redirect('LoginController');
    // }
    // public function loginmember(){
    //     $username = $this->input->post('usertxt', true);
    //     $password = $this->input->post('passtxt', true);
    //     $validate = $this->login_model->validate1($username, $password);
    //     if ($validate->num_rows() > 0) {
    //         $data  = $validate->row_array();
    //         $id = $data['user_id'];
    //         $name  = $data['firstname'];
    //         $email = $data['email'];
          
    //         $sesdata = array(
    //             'user_id' => $id,
    //             'firstname'  => $name,
    //             'email'     => $email,
    //             'logged_in' => true
    //         );
    //         $this->session->set_userdata($sesdata);

    //         // access login for author
    //     // access login for staff
           
    //             redirect('page/staff');

    //             // access login for author
            
    //     } else {
    //         echo $this->session->set_flashdata('msg', 'Username or Password is Wrong');
    //         redirect('ReservationsController');
    //     }
    // }
    // public function logoutMember()
    // {
    //     $this->session->sess_destroy();
    //     redirect('ReservationsController');
    // }
    
}
