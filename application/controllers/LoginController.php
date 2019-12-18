<?php
defined('BASEPATH') or exit('No direct script access allowed');

class LoginController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('login_model');
    }

    public function _remap($method, $params = array())
    {
        if (method_exists($this, $method)) {
            return call_user_func_array(array($this, $method), $params);
        } else {
            $this->index();
        }
    }

    public function index()
    {
        $this->load->view('Login');
        
    
    }

    public function auth()
    {
        $username = $this->input->post('usertxt', true);
        $password = $this->input->post('passtxt', true);
        $validate = $this->login_model->validate($username, $password);
        if ($validate->num_rows() > 0) {
            $data  = $validate->row_array();
            $id = $data['id'];
            $name  = $data['firsname'];
            $email = $data['email'];
            $level = $data['status_user'];
            $sesdata = array(
                'id' => $id,
                'firsname'  => $name,
                'email'     => $email,
                'status_user'     => $level,
                'logged_in' => true
            );
            $this->session->set_userdata($sesdata);
            // access login for admin
            if ($level === '1' || $level === '2') {
                redirect('page');

                // access login for staff
            } elseif ($level === '0') {
                redirect('page/staff');

                // access login for author
            }
        } else {
            echo $this->session->set_flashdata('msg', 'Username or Password is Wrong');
            redirect('TestController');
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('homecontroller');
    }
}
