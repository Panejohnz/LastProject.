<?php
class Page extends CI_Controller{
  function __construct(){
    parent::__construct();
    if($this->session->userdata('logged_in') !== TRUE){
      redirect('TestController');
    }
  }
 
  function index(){
    //Allowing akses to admin only
      if($this->session->userdata('statusem')==='1' || $this->session->userdata('statusem')==='2'){
       redirect('member');
      }else{
          echo "Access Denied";
      }
 
  }
 
  function staff(){
    //Allowing akses to staff only
    if($this->session->userdata('status_user')==='0'){
      $this->load->view('aaa');
    }else{
        echo "Access Denied";
    }
  }
 
/*  function author(){
    //Allowing akses to author only
    if($this->session->userdata('level')==='3'){
      $this->load->view('dashboard_view');
    }else{
        echo "Access Denied";
    }
  }*/
 
}