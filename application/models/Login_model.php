<?php
class Login_model extends CI_Model
{
    public function validate($username, $password)
    {
        $this->db->where('username', $username);
        $this->db->where('password', $password);
        $this->db->where('isactive', 1);
       
        $result = $this->db->get('emmployee');
        return $result;
    }




    public function validate1($username, $password)
    {
        $this->db->where('username', $username);
        $this->db->where('password', $password);
        $this->db->where('isactive', 1);
        
        // echo $username;
        // echo $password;
        $result = $this->db->get('users');
        //  print_r($result);die();
        return $result;
    }


    public function validateface($firsname)
    {
        $this->db->where('firsname', $firsname);
        $result = $this->db->get('users', 1);
        return $result;
    }
}
