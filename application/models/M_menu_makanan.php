<?php
class M_menu_makanan extends CI_Model{

	function get_all_menu_makanan(){
		$hsl=$this->db->query("SELECT * FROM menu_makanan");
		return $hsl;
	}


	function hapus_menu_makanan($kode){
		$hsl=$this->db->query("DELETE FROM menu_makanan where id_menu_makanan='$kode'");
		return $hsl;
	}

	public function add_menu_makanan($data){
			$this->db->insert('menu_makanan', $data);
			return true;
		}

		public function get_menu_makanan_by_id($id){
			$query = $this->db->get_where('menu_makanan', array('id_menu_makanan' => $id));
			return $result = $query->row_array();
		}

		public function edit_menu_makanan($data, $id){
			$this->db->where('id_menu_makanan', $id);
			$this->db->update('menu_makanan', $data);
			return true;
		}

}	