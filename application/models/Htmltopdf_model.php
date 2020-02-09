<?php
class Htmltopdf_model extends CI_Model
{
 function fetch()
 {
  $this->db->order_by('contract_id');
  return $this->db->get('contract');
 }
 function fetch_single_details($contract_id)
 {
  $this->db->where('contract_id', $contract_id);
  $data = $this->db->get('contract');
  $output = '<table width="100%" cellspacing="5" cellpadding="5">';
  foreach($data->result() as $row)
  {
   $output .= '
   <tr>
   
    <td width="75%">
     <p><b>Name: </b>'.$row->contract_id.'</p>
     <p><b>Address : </b>'.$row->identity_card.'</p>
     <p><b>Postal Code : </b>'.$row->identity_card.'</p>
     <p><b>Country : </b> '.$row->datecontract_start.' </p>
    </td>
   </tr>
   ';
  }
  $output .= '
  <tr>
   <td colspan="2" align="center"><a href="'.base_url().'htmltopdf" class="btn btn-primary">Back</a></td>
  </tr>
  ';
  $output .= '</table>';
  return $output;
 }
}

?>