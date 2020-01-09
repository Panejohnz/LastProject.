<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class insert_users extends CI_Model {
   
    public function __construct()
    {
        parent::__construct();
    }
    
    function is_email_available($email)  
    {  
         $this->db->where('email', $email);  
         $query = $this->db->get("users");  
         if($query->num_rows() > 0)  
         {  
              return true;  
         }  
         else  
         {  
              return false;  
         }  
    }  
    function is_username_available($username)  
    {  
         $this->db->where('username', $username);  
         $query = $this->db->get("users");  
         if($query->num_rows() > 0)  
         {  
              return true;  
         }  
         else  
         {  
              return false;  
         }  
    }  
    public function insert($data)
    {
        $this->db->insert('users', $data);
        
    }
    
}  

