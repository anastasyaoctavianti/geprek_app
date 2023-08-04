<?php
class M_penggunaan_barang extends CI_Model{

	function get_all_penggunaan_barang(){
		$hsl=$this->db->query("SELECT * FROM penggunaan_barang,barang,cabang where penggunaan_barang.id_barang=barang.id_barang AND barang.id_cabang=cabang.id_cabang");
		return $hsl;
	}


	function hapus_penggunaan_barang($kode){
		$hsl=$this->db->query("DELETE FROM penggunaan_barang where id_penggunaan_barang='$kode'");
		return $hsl;
	}

	public function add_penggunaan_barang($data){
			$this->db->insert('penggunaan_barang', $data);
			return true;
		}

		public function get_penggunaan_barang_by_id($id){
			$query = $this->db->get_where('penggunaan_barang', array('id_penggunaan_barang' => $id));
			return $result = $query->row_array();
		}

		public function edit_penggunaan_barang($data, $id){
			$this->db->where('id_penggunaan_barang', $id);
			$this->db->update('penggunaan_barang', $data);
			return true;
		}

}	