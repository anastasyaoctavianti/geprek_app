<?php
class M_penjualan extends CI_Model{

	function get_all_penjualan(){
		$hsl=$this->db->query("SELECT * FROM penjualan,menu_makanan,pegawai,cabang,konsumen where penjualan.id_barang=menu_makanan.id_menu_makanan AND penjualan.id_pegawai=pegawai.id_pegawai AND cabang.id_cabang=penjualan.id_cabang AND penjualan.id_konsumen=konsumen.id_konsumen order by id_penjualan asc");
		return $hsl;
	}


	function hapus_penjualan($kode){
		$hsl=$this->db->query("DELETE FROM penjualan where id_penjualan='$kode'");
		return $hsl;
	}

	public function add_penjualan($data){
			$this->db->insert('penjualan', $data);
			return true;
		}

		public function get_penjualan_by_id($id){
			$query = $this->db->get_where('penjualan', array('id_penjualan' => $id));
			return $result = $query->row_array();
		}

		public function edit_penjualan($data, $id){
			$this->db->where('id_penjualan', $id);
			$this->db->update('penjualan', $data);
			return true;
		}

}	