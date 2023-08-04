<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barang extends CI_Controller {

		function __construct(){
		parent::__construct();
		if($this->session->userdata('status2') != "loggg"){
			redirect(base_url("login"));
		}
		$this->load->model('m_barang');
	}

	public function index()
	{
		$x['data_barang']=$this->m_barang->get_all_barang();
		$x['sidebar']="barang";
		$this->load->view('header',$x);
		$this->load->view('sidebar');
		$this->load->view('barang/barang');
		$this->load->view('footer');
	}

	public function lihat()
	{
		$x['data_barang']=$this->m_barang->get_all_barang();
		$x['sidebar']="barang2";
		$this->load->view('header',$x);
		$this->load->view('sidebar');
		$this->load->view('barang/lihat');
		$this->load->view('footer');
	}

	public function cetak()
	{	
		$x['data_barang']=$this->m_barang->get_all_barang();
		$this->load->view('barang/cetak',$x);
	}

		public function simpan_barang()
	{
				$data['id_cabang'] = $this->input->post('id_cabang');
				$data['nama_barang'] = $this->input->post('nama_barang');
				$data['merek'] = $this->input->post('merek');
				$data['stok'] = $this->input->post('stok');
				$data['satuan'] = $this->input->post('satuan');

								

				
					$result = $this->m_barang->add_barang($data);
					if($result){
						$this->session->set_flashdata('berhasil_simpan', 'Record is Added Successfully!');
						redirect(base_url('barang'));
					}
	}


	


		public function update_barang()
	{
		$id = $this->input->post('id_barang'); 
			

					$data['id_cabang'] = $this->input->post('id_cabang');
					$data['nama_barang'] = $this->input->post('nama_barang');
					$data['merek'] = $this->input->post('merek');
					$data['stok'] = $this->input->post('stok');
					$data['satuan'] = $this->input->post('satuan');
					
				
					$result = $this->m_barang->edit_barang($data,$id);
					if($result){
						$this->session->set_flashdata('berhasil_edit', 'Record is Added Successfully!');
						redirect(base_url('barang'));
					}
	}

	function hapus_barang(){
		$kode=$this->input->post('kode');
		$this->m_barang->hapus_barang($kode);
		echo $this->session->set_flashdata('berhasil_hapus','berhasil_hapus');
		redirect('barang');
	}

	public function cari_barang(){
        $id_cabang = $this->input->post('id_cabang');
        $barang = $this->db->query("SELECT * FROM barang,cabang WHERE barang.id_cabang=cabang.id_cabang AND barang.id_cabang = '$id_cabang' ")->result();
        $lists = "<option value=''>--pilih--</option>";
        foreach($barang as $data){
            $lists .= "<option value='".$data->id_barang."'>".$data->nama_barang." | ".$data->merek."</option>";
        }
          

        $callback = array('list_barang'=>$lists); 
        echo json_encode($callback); 
    }
}