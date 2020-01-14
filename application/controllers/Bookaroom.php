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
         $this->load->view('Reservations');
         
       
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


    public function postdata()
	{
        
		$config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size']  = '1000000000';
        $config['max_width']  = '1000000000';
        $config['max_height']  = '1000000000';
        
        $this->load->library('upload', $config);
        
        if ( ! $this->upload->do_upload('file')){
            echo $this->upload->display_errors();
        }
        else{
            $data = $this->upload->data();

            $filename = $data['file_name'];
            //$imgtype_name = $data['imgtype_name'];
            $arr=array(         'roomnum' => $this->input->post('roomnum'),
			                    'name' => $this->input->post('name'),
			                    'telephone' => $this->input->post('telephone'),
                                'image'=>$filename,
                                
                            );
                            echo "<script>";
            echo "alert('จองห้องพักเรียบร้อย');";
            echo "window.location.href = '". base_url(). "ReservationsController ';";
            echo "</script>";
            $this->db->insert('reservations', $arr);
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
    
}