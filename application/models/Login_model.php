<?php
class Login_model extends CI_Model
{
    public function validate($username, $password)
    {
        $this->db->where('username', $username);
        $this->db->where('password', $password);
       
        $result = $this->db->get('users', 1);
        return $result;
    }


   public function validateface($firsname)
 {
     $this->db->where('firsname', $firsname);
         $result = $this->db->get('users', 1);
        return $result;
    }
 }
