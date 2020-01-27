<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ReservationsModel extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function record_count($keyword)
    {
        $this->db->like('reservationsstart', $keyword);
        $this->db->from('reservations');
        return $this->db->count_all_results();
    }

    public function fetch_room($limit, $start, $keryword)
    {
        $this->db->like('reservationsstart', $keryword);
        $this->db->limit($limit, $start);
        $query = $this->db->get('reservations');
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }

    public function read_reservations($id){
		$this->db->where('reservations_id',$id);
		$query = $this->db->get('reservations');
		if($query->num_rows() > 0){
			$data = $query->row();
			return $data;
		}
		return FALSE;
	}
	
	public function remove_reservations($id){
		$this->db->delete('reservations',array('reservations_id'=>$id));
	}

    // public function search_room($cateid)
    // {
    //     $this->db->where('id', $cateid);
    //     $result = $this->db->get('roomcategory');
    //     return $result;
    // }
    // public function cate1()
    // {
    //     $this->db->where('id');
    //     $query = $this->db->get('room');
    //     return $query;
    // }
    
    public function historybill($id){
        $this->db->where('roomcategory_id',$id);
		$query = $this->db->get('roomcategory');
		if($query->num_rows() > 0){
			$data = $query->row();
			return $data;
		}
		return FALSE;
	}
        
        
    
}