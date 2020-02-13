<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Page extends CI_Controller{
  function __construct(){
    parent::__construct();
    if($this->session->userdata('logged_in') !== TRUE){
      redirect('logincontroller');
  
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
 
  function staff($id=null){
    //Allowing akses to staff only
    $this->load->model('ReservationsModel');
    $this->data['his'] = $this->ReservationsModel->historybill($id);
    $this->load->view('home',$this->data,false);
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