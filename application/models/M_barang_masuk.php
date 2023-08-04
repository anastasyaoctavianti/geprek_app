<?php
class M_barang_masuk extends CI_Model{

	function get_all_barang_masuk(){
		$hsl=$this->db->query("SELECT * FROM barang_masuk,barang,supplier,cabang where barang_masuk.id_barang=barang.id_barang AND supplier.id_supplier=barang_masuk.id_supplier AND barang.id_cabang=cabang.id_cabang");
		return $hsl;
	}


	function hapus_barang_masuk($kode){
		$hsl=$this->db->query("DELETE FROM barang_masuk where id_barang_masuk='$kode'");
		return $hsl;
	}

	public function add_barang_masuk($data){
			$this->db->insert('barang_masuk', $data);
			return true;
		}

		public function get_barang_masuk_by_id($id){
			$query = $this->db->get_where('barang_masuk', array('id_barang_masuk' => $id));
			return $result = $query->row_array();
		}

		public function edit_barang_masuk($data, $id){
			$this->db->where('id_barang_masuk', $id);
			$this->db->update('barang_masuk', $data);
			return true;
		}

}	