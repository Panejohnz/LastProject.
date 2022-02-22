<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Bookaroom extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        
        $this->load->model('ReservationsModel');
    }
    public function index()
    {
    }
    public function dd($id)
    {   
        $this->db->where('room_id', $id);
        $query = $this->db->get('room');
        $qq = $query->row_array();
        //print_r($qq);
        
        $this->load->view('Reservations', $qq);
    }

    // public function keyword($cateid = null)
    // {
    //     $this->db->where('id', $cateid);
    //     $query = $this->db->get('roomcategory');
    //     $qq = $query->row_array();

    //     $search_room = $this->ReservationsModel->search_room($cateid);
    //     $data  = $search_room->row_array();
    //     $level = $data['id'];
    //     $sesdata = array(
    //             'id'     => $level,
    //         );
    //     $this->session->set_userdata($sesdata);
            
    //     if ($level === '1') {
    //         redirect('ReservationsController/airroom');
    //     }
    // }


    public function postdata($user_id)
    {
      
        $stringrow = base_url(uri_string());
        $arraystate = (explode("/", $stringrow));
        $idtestt = ($arraystate[5]);
        $idtestt1 = ($arraystate[6]);
        
        
        $cust_id = $this->session->userdata('user_id');
      
        
     
        $arr=array(         'start_date' => $idtestt1,
                            'reservation_date' => date('Y-m-d'),
                                'slip_date' => date('Y-m-d'),
                                'end_date' => date('0000-00-00'),
                                'user_id' => $cust_id,
                                'room_id' => $idtestt,
                                'deposit' => $this->input->post('deposit'),
                                'reservations_status' => 1,
                               
                            );
        $ord_id = $this->ReservationsModel->insert_order($arr);
           
                         
        $order_detail = array(
                                
                              'reservations_id' => $ord_id,
                              'room_id' => $idtestt
                            );
                        

            
                    
        // Insert product imformation with order detail, store in cart also store in database.
           
        $f_id = $this->ReservationsModel->insert_order_detail($order_detail);
            
        if (isset($_POST['submit'])) {
            $user_id=$ord_id;//Pass the userid here
                
            $checkbox = $_POST['customCheck1']; //บัคไลน์นี้
            $hee = $_POST['hee'];
               
            // print_r($checkbox);
            for ($i=0;$i<count($checkbox);$i++) {
                $this->db->where('furniture_id', $checkbox[$i]);
                $fur = $this->db->get('furniture');
                $furr = $fur->row_array();
               
                $sss=array(
                        'reservationsroom_id' => $user_id,
                        'furniture_id' => $checkbox[$i],
                        'furniture_amount' => '1',
                        'furnitureprice' => $furr['price']
                    );
            
                    
                $cust_id = $this->ReservationsModel->insert_order_detail1($sss);//Call the modal
                $nan = $sss['furniture_id'];
        
               
                    
                $this->db->set('stock', 'stock-' . 1, false);
                $this->db->where('furniture_id', $checkbox[$i]);
                $this->db->update('furniture');
            }
        }
        $queryy=$this->db->query("SELECT SUM(furniture.price) as pp FROM reservationsfurniture JOIN furniture ON furniture.furniture_id = reservationsfurniture.furniture_id WHERE reservationsfurniture.reservationsroom_id = $user_id ");
        $yy = $queryy->row_array();
        // echo $yy['pp']. "บาท";
        $this->load->library('session');
               

        $this->db->where('room_id', $idtestt);
        $mana = $this->db->get('room');
        $hh = $mana->row_array();

        $this->db->where('roomcategory_id', $hh['roomcategory_id']);
        $mana1 = $this->db->get('roomcategory');
        $hh1 = $mana1->row_array();

        $sum = $yy['pp'] + $hh1['roomprice'];
        // echo "ราคารวม " . $sum;
              
        $this->db->where('reservations_id', $ord_id);
        $oo = array(
               'roomprice' => $hh1['roomprice']
            );
        $this->db->update('reservationsroom', $oo);
            
               
               
                
                
   
        $id = $this->input->post('roomnum');
        $this->db->where('room_id', $id);
     

        $data2 = array(
                'roomstatus' => '2'
              );
   
            
        $this->db->update('room', $data2);

        

        $this->data0['his'] = $this->ReservationsModel->historybill($id);
        $this->load->view('Hee', $this->data0, $sum, false);
        redirect("/Slipcontroller/paylate/".$ord_id.'/'.$idtestt);
    }

    public function postdatawalkin()
    {
      
        $stringrow = base_url(uri_string());
        $arraystate = (explode("/", $stringrow));
        $idtestt = ($arraystate[5]);
        // $idtestt1 = ($arraystate[6]);
        // $idtestt2 = ($arraystate[7]);
        
        
        $cust_id = $this->session->userdata('user_id');
      
        
     
        $arr=array(             'start_date' => date('Y-m-d'),
                                'reservation_date' => date('Y-m-d'),
                                'slip_date' => 'แอ๊',
                                'end_date' => date('0000-00-00'),
                                'user_id' => $this->input->post('Hee'),
                                'room_id' => $idtestt,
                                'deposit' => ' ',
                                'reservations_status' => 1,
                               
                            );
        $ord_id = $this->ReservationsModel->insert_order($arr);
           
                         
        $order_detail = array(
                                
                              'reservations_id' => $ord_id,
                              'room_id' => $idtestt
                            );
                        

            
                    
        // Insert product imformation with order detail, store in cart also store in database.
           
        $f_id = $this->ReservationsModel->insert_order_detail($order_detail);
            
        if (isset($_POST['submit'])) {
            $user_id=$ord_id;//Pass the userid here
                
            $checkbox = $_POST['customCheck1']; //บัคไลน์นี้
            $hee = $_POST['hee'];
               
            // print_r($checkbox);
            for ($i=0;$i<count($checkbox);$i++) {
                $this->db->where('furniture_id', $checkbox[$i]);
                $fur = $this->db->get('furniture');
                $furr = $fur->row_array();
               
                $sss=array(
                        'reservationsroom_id' => $user_id,
                        'furniture_id' => $checkbox[$i],
                        'furniture_amount' => '1',
                        'furnitureprice' => $furr['price']
                    );
            
                    
                $cust_id = $this->ReservationsModel->insert_order_detail1($sss);//Call the modal
                $nan = $sss['furniture_id'];
        
               
                    
                $this->db->set('stock', 'stock-' . 1, false);
                $this->db->where('furniture_id', $checkbox[$i]);
                $this->db->update('furniture');
            }
        }
        $queryy=$this->db->query("SELECT SUM(furniture.price) as pp FROM reservationsfurniture JOIN furniture ON furniture.furniture_id = reservationsfurniture.furniture_id WHERE reservationsfurniture.reservationsroom_id = $user_id ");
        $yy = $queryy->row_array();
        // echo $yy['pp']. "บาท";
        $this->load->library('session');
               

        $this->db->where('room_id', $idtestt);
        $mana = $this->db->get('room');
        $hh = $mana->row_array();

        $this->db->where('roomcategory_id', $hh['roomcategory_id']);
        $mana1 = $this->db->get('roomcategory');
        $hh1 = $mana1->row_array();

        $sum = $yy['pp'] + $hh1['roomprice'];
        // echo "ราคารวม " . $sum;
              
        $this->db->where('reservations_id', $ord_id);
        $oo = array(
               'roomprice' => $hh1['roomprice']
            );
        $this->db->update('reservationsroom', $oo);
            
        $id = $this->input->post('roomnum');
        $this->db->where('room_id', $id);
     

        $data2 = array(
                'roomstatus' => '2'
              );
   
            
        $this->db->update('room', $data2);


        
        // $data3 = array(
        //     'roomstatus' => '1'
        // );
        // $this->db->where('room_id', $idtestt2);
        // $this->db->update('room', $data3);

        redirect('Reservationadmin');

        // $this->data0['his'] = $this->ReservationsModel->historybill($id);
        // $this->load->view('Hee', $this->data0, $sum, false);
        // redirect("/Slipcontroller/paylate/".$ord_id.'/'.$idtestt);
    }
 
 

    public function up($id)
    {
        $data2 = array(
            'roomstatus' => '2 '
          );
            
        $this->db->where('room_id', $id);
        $this->db->update('room', $data2);
        redirect('Room');
    }

   
}
