<?php
defined('BASEPATH') or exit('No direct script access allowed');

class RegisController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }
    
    public function index()
    {
        $this->load->view('Register');
        $this->load->model('insert_users');
        $this->load->library('form_validation');
    }

    public function Register()
    {
        // $email = $this->input->post('email');
        //$userrja = $this->input->post('username');
        // $pass1 = $this->input->post('password');
        // $pass2 = $this->input->post('password1');
    
        // $this->db->where('email', $email);
        // $emailja =  $this->db->get('users', 1);
        
           
        // $this->db->where('email', $email);
        // $this->db->where('username', $userrja);
        // $emailja =  $this->db->get('users', 1);
        // $userrja =  $this->db->get('users', 1);
        // if ($emailja->num_rows() > 0) {
        //     $this->load->view('bbb1');
        // } elseif ($userrja->num_rows() > 0) {
        //     $this->load->view('bbb1');
        // if ($pass1 != $pass2) {
        //     $this->load->view('bbb1');
        // } else {
            $data = array(
                'firstname' => $this->input->post('firstname'),
                'lastname' => $this->input->post('lastname'),
                'username' => $this->input->post('username'),
                'email' => $this->input->post('email'),
                'password' => $this->input->post('password'),
                'tel'=> $this->input->post('tel')
                );
            $this->load->model('insert_users');
            $this->insert_users->insert($data);
            $this->load->view('newhome');
        
    }
    public function checkmail()
    {
        $this->load->model("insert_users");
        if ($this->insert_users->is_email_available($_POST["email"])) {
            echo '<label class="text-danger"><span class="glyphicon glyphicon-remove"></span> email นี้ได้ถูกใช้ไปแล้ว</label>';
        } else {
            echo '<label class="text-success"><span class="glyphicon glyphicon-ok"></span> Email นี้สามารถใช้ได้</label>';
        }
    }
    public function checkusername()
    {
        $this->load->model("insert_users");
        if ($this->insert_users->is_username_available($_POST["username"])) {
            echo '<label class="text-danger"><span class="glyphicon glyphicon-remove"></span> username นี้ได้ถูกใช้ไปแล้ว</label>';
        } else {
            echo '<label class="text-success"><span class="glyphicon glyphicon-ok"></span> username นี้สามารถใช้ได้</label>';
        }
    }
}
    
    
    //Loadingd View
   // $this->load->view('Register', $data);

?>  