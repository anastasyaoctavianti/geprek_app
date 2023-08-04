
<?php
class M_pengiriman extends CI_Model{

		function get_all_pengiriman(){
			$hsl=$this->db->query("SELECT * FROM penjualan,menu_makanan,pegawai,cabang,konsumen,pengiriman where penjualan.id_barang=menu_makanan.id_menu_makanan AND cabang.id_cabang=penjualan.id_cabang AND penjualan.id_konsumen=konsumen.id_konsumen  AND pengiriman.id_penjualan=penjualan.id_penjualan AND pengiriman.id_pegawai=pegawai.id_pegawai");
			return $hsl;
		}


		function hapus_pengiriman($kode){
			$hsl=$this->db->query("DELETE FROM pengiriman where id_pengiriman=".$kode."");
			return $hsl;
		}

		public function add_pengiriman($data){
			$this->db->insert("pengiriman", $data);
			return true;
		}

		public function get_pengiriman_by_id($id){
			$query = $this->db->get_where("pengiriman", array("id_pengiriman" => $id));
			return $result = $query->row_array();
		}

		public function edit_pengiriman($data, $id){
			$this->db->where("id_pengiriman", $id);
			$this->db->update("pengiriman", $data);
			return true;
		}

		public function edit_pengiriman2($data, $id){
			$this->db->where("id_penjualan", $id);
			$this->db->update("pengiriman", $data);
			return true;
		}

}	
			