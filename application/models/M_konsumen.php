<?php
class M_konsumen extends CI_Model{

	function get_all_konsumen(){
		$hsl=$this->db->query("SELECT * FROM konsumen where id_konsumen!=1");
		return $hsl;
	}


	function hapus_konsumen($kode){
		$hsl=$this->db->query("DELETE FROM konsumen where id_konsumen='$kode'");
		return $hsl;
	}

	public function add_konsumen($data){
			$this->db->insert('konsumen', $data);
			return true;
		}

		public function get_konsumen_by_id($id){
			$query = $this->db->get_where('konsumen', array('id_konsumen' => $id));
			return $result = $query->row_array();
		}

		public function edit_konsumen($data, $id){
			$this->db->where('id_konsumen', $id);
			$this->db->update('konsumen', $data);
			return true;
		}

}	