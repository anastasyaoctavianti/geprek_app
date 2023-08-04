
<?php
class M_test1 extends CI_Model{

		function get_all_test1(){
			$hsl=$this->db->query("SELECT * FROM test1");
			return $hsl;
		}


		function hapus_test1($kode){
			$hsl=$this->db->query("DELETE FROM test1 where id_test1=".$kode."");
			return $hsl;
		}

		public function add_test1($data){
			$this->db->insert("test1", $data);
			return true;
		}

		public function get_test1_by_id($id){
			$query = $this->db->get_where("test1", array("id_test1" => $id));
			return $result = $query->row_array();
		}

		public function edit_test1($data, $id){
			$this->db->where("id_test1", $id);
			$this->db->update("test1", $data);
			return true;
		}

}	
			