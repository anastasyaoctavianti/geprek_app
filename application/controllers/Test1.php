
<?php
defined("BASEPATH") OR exit("No direct script access allowed");

class Test1 extends CI_Controller {

		function __construct(){
		parent::__construct();
		if($this->session->userdata("status2") != "loggg"){
			redirect(base_url("login"));
		}
		$this->load->model("m_test1");
		$this->load->library("upload");
		$this->load->model("m_data");
	}

	public function index()
	{
		$x["data_test1"]=$this->m_test1->get_all_test1();
		$x["sidebar"]="test1";
    $this->load->view("header",$x);
    $this->load->view("sidebar");
    $this->load->view("test1/test1");
    $this->load->view("footer");
	}


	public function cetak()
	{
		$x["data_test1"]=$this->m_test1->get_all_test1();
		$this->load->view("test1/cetak",$x);
	}


	public function lihat()
	{
		$x["data_test1"]=$this->m_test1->get_all_test1();
    $x["sidebar"]="test12";
		$this->load->view("header",$x);
    $this->load->view("sidebar");
		$this->load->view("test1/lihat");
		$this->load->view("footer");
	}

	public function filter()
	{	
		$tgl1=$this->input->post("tgl1");
		$tgl2=$this->input->post("tgl2");
		$x["tgl1"]=$this->input->post("tgl1");
		$x["tgl2"]=$this->input->post("tgl2");
		$x["data_test1"]=$this->db->query("SELECT * FROM test1 WHERE date() BETWEEN date('$tgl1') AND date('$tgl2')");
		$this->load->view("test1/cetak_filter",$x);
	}

	public function cetak2($id)
	{	
		$x["data_test1"]=$this->db->query("SELECT * FROM test1 WHERE test1.id_test1=".$id."")->row_array();
		$this->load->view("test1/cetak2",$x);
	}
	

		public function simpan_test1()
	{
			$data["nama"] = $this->input->post("nama");
				
				
					$result = $this->m_test1->add_test1($data);
					if($result){
						$this->session->set_flashdata("berhasil_simpan", "Record is Added Successfully!");
						redirect(base_url("test1"));
					}
	}



		public function update_test1()
	{
		$id = $this->input->post("id_test1"); 
		
			$data["nama"] = $this->input->post("nama");
				
				
					$result = $this->m_test1->edit_test1($data,$id);
					if($result){
						$this->session->set_flashdata("berhasil_edit", "Record is Added Successfully!");
						redirect(base_url("test1"));
					}
	}

	function hapus_test1(){
		$kode=$this->input->post("kode");
		$this->m_test1->hapus_test1($kode);
		echo $this->session->set_flashdata("berhasil_hapus","berhasil_hapus");
		redirect("test1");
	}
}
			