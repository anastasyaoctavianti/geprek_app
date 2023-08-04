<?php
class M_barang extends CI_Model{

	function get_all_barang(){
		$hsl=$this->db->query("SELECT * FROM barang,cabang WHERE barang.id_cabang=cabang.id_cabang");
		return $hsl;
	}


	function hapus_barang($kode){
		$hsl=$this->db->query("DELETE FROM barang where id_barang='$kode'");
		return $hsl;
	}

	public function add_barang($data){
			$this->db->insert('barang', $data);
			return true;
		}

		public function get_barang_by_id($id){
			$query = $this->db->get_where('barang', array('id_barang' => $id));
			return $result = $query->row_array();
		}

		public function edit_barang($data, $id){
			$this->db->where('id_barang', $id);
			$this->db->update('barang', $data);
			return true;
		}

}	