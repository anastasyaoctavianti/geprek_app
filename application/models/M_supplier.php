<?php
class M_supplier extends CI_Model{

	function get_all_supplier(){
		$hsl=$this->db->query("SELECT * FROM supplier");
		return $hsl;
	}


	function hapus_supplier($kode){
		$hsl=$this->db->query("DELETE FROM supplier where id_supplier='$kode'");
		return $hsl;
	}

	public function add_supplier($data){
			$this->db->insert('supplier', $data);
			return true;
		}

		public function get_supplier_by_id($id){
			$query = $this->db->get_where('supplier', array('id_supplier' => $id));
			return $result = $query->row_array();
		}

		public function edit_supplier($data, $id){
			$this->db->where('id_supplier', $id);
			$this->db->update('supplier', $data);
			return true;
		}

}	