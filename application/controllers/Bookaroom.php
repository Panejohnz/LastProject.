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
    public function dd($id = null)
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
    //     //    $qq = array(
    //     //     'reservationsstart' => $this->input->post('datepicker'),
    //     //     'reservationsprice' => '2000');
    //     //     $this->db->insert('reservations', $qq);
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
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'gif|jpg|png|pdf';
        $config['max_size']  = '1000000000';
        $config['max_width']  = '1000000000';
        $config['max_height']  = '1000000000';
        
        $this->load->library('upload', $config);
        
        $cust_id = $this->session->userdata('user_id');
      
        
        if (! $this->upload->do_upload('file')) {
            echo $this->upload->display_errors();
        } else {
            $data = $this->upload->data();

            $filename = $data['file_name'];
            //$imgtype_name = $data['imgtype_name'];
            $arr=array(         'reservationsstart' => $this->input->post('reservationsstart'),
                                'slip_date' => date('Y-m-d'),
                                'slip_file'=>$filename,
                                'id_users' => $cust_id
                            );
            $ord_id = $this->ReservationsModel->insert_order($arr);
           
                         
            $order_detail = array(
                                'room_id' => $this->input->post('roomnum'),
                              'reservations_id' => $ord_id
                            );
                    
            // Insert product imformation with order detail, store in cart also store in database.
                    
            $f_id = $this->ReservationsModel->insert_order_detail($order_detail);
            
            if (isset($_POST['submit'])) {
                $user_id=$ord_id;//Pass the userid here
                $checkbox = $_POST['customCheck1'];
                // print_r($checkbox);
                for ($i=0;$i<count($checkbox);$i++) {
                    $sss=array(
                        'reservations_id' => $user_id,
                        'furniture_id' => $checkbox[$i]
                    );
                    $cust_id = $this->ReservationsModel->insert_order_detail1($sss);//Call the modal
                }
            }
           
            //     $this->db->insert('reservations', $arr);

            //     $rr = $this->db->get('reservations');
            //     $rrr = $rr->row_array();
            //     $ss=array(
            //         'room_id' => $this->input->post('roomnum'),
            //         'reservations_id' => $rrr['reservations_id'],
            //     );
            //     $this->db->insert('reservationsroom', $ss);
            $id = $this->input->post('roomnum');
            $this->db->where('room_id', $id);
            //     // $query = $this->db->get('room');
            //     // $imf = $query->row_array();

            $data2 = array(
                'roomstatus' => '1'
              );
   
           
            $this->db->update('room', $data2);

            // if (isset($_POST['submit'])) {
            //     $user_id=$rrr['reservations_id'];//Pass the userid here
            //     $checkbox = $_POST['customCheck1'];
            //     print_r($checkbox);
            //     for ($i=0;$i<count($checkbox);$i++) {
            //         $sss=array(
            //             'reservations_id' => $user_id,
            //             'furniture_id' => $checkbox[$i]
            //         );
            //         $this->db->insert('reservationsfurniture', $sss);//Call the modal
            //     }
            // }
            $this->load->view('Hee');
            // echo "<script>";
            // echo "alert('จองห้องพักเรียบร้อย');";
            // echo "window.location.href = '". base_url()."page/staff';";
            // echo "</script>";

            
        
            // redirect('ReservationsController');
        }
    }
    // $config['upload_path'] = './pic/';
    // $config['allowed_types'] = 'gif|jpg|png';
    // $config['max_size']  = '1000000000';
    // $config['max_width']  = '1000000000';
    // $config['max_height']  = '1000000000';
        
    // $this->load->library('upload', $config);
        
    // if ( ! $this->upload->do_upload('file')){
    //     echo $this->upload->display_errors();
    // }
    // else{
    //     $data = $this->upload->data();

    //     $filename = $data['file_name'];
    //     //$imgtype_name = $data['imgtype_name'];
    //     $arr=array(         'roomnum' => $this->input->post('roomnum'),
    // 	                    'name' => $this->input->post('name'),
    // 	                    'telephone' => $this->input->post('telephone'),
    //                         'image'=>$filename,
                                
    //                     );
    //     $this->db->insert('reservations', $arr);
        
    //     public function entry_member($id)
    // {
    // 	$this->roomnum = $this->input->post('roomnum');
    // 	$this->name = $this->input->post('name');
    // 	$this->telephone = $this->input->post('telephone');
    // 	$this->image = $this->input->post('image');

    // 	//$this->description = $this->input->post('description');
    // 	if($id == NULL)
    // 	{
    // 		$this->db->insert('reservations', $this);
    // 	}
    // 	else
    // 	{
    // 		$this->db->update('reservations', $this, array('id'=> $id));
    // 	}
    // }
    // public function read_member($id){
    // 	$this->db->where('id',$id);
    // 	$query = $this->db->get('reservations');
    // 	if($query->num_rows() > 0){
    // 		$data = $query->row();
    // 		return $data;
    // 	}
    // 	return FALSE;
    // }
    // public function remove_member($id){
    // 	$this->db->delete('reservations',array('id'=>$id));
    // }
    

    public function up($id)
    {
        $data2 = array(
            'roomstatus' => '1'
          );
            
        $this->db->where('room_id', $id);
        $this->db->update('room', $data2);
        redirect('Room');
    }
}
