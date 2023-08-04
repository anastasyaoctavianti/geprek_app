<?php
class M_complement_karyawan extends CI_Model{

	function get_all_complement_karyawan(){
		$hsl=$this->db->query("SELECT * FROM complement_karyawan,menu_makanan,cabang where complement_karyawan.id_menu_makanan=menu_makanan.id_menu_makanan AND cabang.id_cabang=complement_karyawan.id_cabang order by id_complement_karyawan asc");
		return $hsl;
	}


	function hapus_complement_karyawan($kode){
		$hsl=$this->db->query("DELETE FROM complement_karyawan where id_complement_karyawan='$kode'");
		return $hsl;
	}

	public function add_complement_karyawan($data){
			$this->db->insert('complement_karyawan', $data);
			return true;
		}

		public function get_complement_karyawan_by_id($id){
			$query = $this->db->get_where('complement_karyawan', array('id_complement_karyawan' => $id));
			return $result = $query->row_array();
		}

		public function edit_complement_karyawan($data, $id){
			$this->db->where('id_complement_karyawan', $id);
			$this->db->update('complement_karyawan', $data);
			return true;
		}

}	