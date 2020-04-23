<?php 

class M_property extends CI_Model
{
	public function cek_login($table,$where)
	{
		return $this->db->get_where($table,$where);
	}
	public function getdata($table)
	{
		return $this->db->get($table)->result();
	}
	public function deletedata($where,$table)
	{
		$this->db->where($where);
		return $this->db->delete($table);
	}
	public function editdata($where,$table)
	{
		return $this->db->get_where($table,$where);
	}
	public function updatedata($table,$data,$where)
	{
		$this->db->where($where);
		return $this->db->update($table,$data);
	}
	public function join_table()
	{
		$this->db->select("*");
		$this->db->from('property');
		$this->db->join('room','property.property_id = room.property_id');
		return $this->db->get()->result();
	}
	public function inner_join()
	{
		$this->db->select("*");
		$this->db->from('room');
		$this->db->join('navigate_button','room.room_id = navigate_button.room_id');
		return $this->db->get()->result();
	}
	public function getdata_v($table,$where)
	{
		$this->db->where($where);
		return $this->db->get($table)->result();
	}
	public function room_button($table,$where)
	{

		return $this->db->query("SELECT navigate_button.*, room.room_id FROM room INNER JOIN navigate_button ON navigate_button.room_id = room.room_id WHERE navigate_button.room_id = $where")->result();

		// $this->db->select("*");
		// $this->db->from('navigate_button');
		// $this->db->join('room','navigate_button.room_id = room.room_id');
		// $this->db->where($where);
		// return $this->db->get()->result();
		// return $this->db->query("SELECT * FROM navigate_button
		// 						INNER JOIN room on room.room_id = navigate_button.room_id
		// 						INNER JOIN property on room.property_id = property.property_id
		// 						WHERE property.property_id = $where");
	}
}
 ?>
