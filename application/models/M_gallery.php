<?php 

class M_gallery extends CI_Model{


public function getdata($table, $where)
	{
		return $this->db->get_where($table,$where);
    }
    public function deletedata($where,$table)
    {
      $this->db->where($where);
      return $this->db->delete($table);
    }    
public function insertdata($data)
{
  return $this->db->insert('tbl_gallery', $data);  
}

}
    ?>