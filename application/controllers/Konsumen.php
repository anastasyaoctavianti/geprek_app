<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Konsumen extends CI_Controller {

		function __construct(){
		parent::__construct();
		if($this->session->userdata('status2') != "loggg"){
			redirect(base_url("login"));
		}
		$this->load->model('m_konsumen');
	}

	public function index()
	{
		$x['data_konsumen']=$this->m_konsumen->get_all_konsumen();
		$x['sidebar']="konsumen";
		$this->load->view('header',$x);
		$this->load->view('sidebar');
		$this->load->view('konsumen/konsumen');
		$this->load->view('footer');
	}

	public function cetak()
	{	
		$x['data_konsumen']=$this->m_konsumen->get_all_konsumen();
		$this->load->view('konsumen/cetak',$x);
	}

	public function filter()
	{
		$tgl1=$this->input->post('tgl1');
		$tgl2=$this->input->post('tgl2');
		$data['tgl1']=$this->input->post('tgl1');
		$data['tgl2']=$this->input->post('tgl2');
		$data['data_konsumen'] = $this->db->query("SELECT * FROM konsumen WHERE date(tgl_input) BETWEEN '$tgl1' AND '$tgl2' ");
		$this->load->view('konsumen/cetak_filter',$data);
	}

	public function lihat(){
		$x['data_konsumen']=$this->m_konsumen->get_all_konsumen();
		$x['sidebar']="konsumen2";
		$this->load->view('header',$x);
		$this->load->view('sidebar');
		$this->load->view('konsumen/lihat');
		$this->load->view('footer');
	}

		public function simpan_konsumen()
	{
				$data = array(
								'kode_konsumen' => $this->input->post('kode_konsumen'),
								'nama_konsumen' => $this->input->post('nama_konsumen'),
								'alamat' => $this->input->post('alamat'),
								'no_hp' => $this->input->post('no_hp'),
								'tanggal_lahir' => $this->input->post('tanggal_lahir'),
								'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
							);
				
					$result = $this->m_konsumen->add_konsumen($data);
					if($result){
						$this->session->set_flashdata('berhasil_simpan', 'Record is Added Successfully!');
						redirect(base_url('konsumen'));
					}
	}


	


		public function update_konsumen()
	{
		$id = $this->input->post('id_konsumen'); 
			
				if (empty($this->input->post('password'))) {
					$data = array(
								'kode_konsumen' => $this->input->post('kode_konsumen'),
								'nama_konsumen' => $this->input->post('nama_konsumen'),
								'alamat' => $this->input->post('alamat'),
								'no_hp' => $this->input->post('no_hp'),
								'tanggal_lahir' => $this->input->post('tanggal_lahir'),
							);
				} else {
					$data = array(
								'kode_konsumen' => $this->input->post('kode_konsumen'),
								'nama_konsumen' => $this->input->post('nama_konsumen'),
								'alamat' => $this->input->post('alamat'),
								'no_hp' => $this->input->post('no_hp'),
								'tanggal_lahir' => $this->input->post('tanggal_lahir'),
								'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
							);
				}
				
				
					$result = $this->m_konsumen->edit_konsumen($data,$id);
					if($result){
						$this->session->set_flashdata('berhasil_edit', 'Record is Added Successfully!');
						redirect(base_url('konsumen'));
					}
			
	}

		public function notif()
	{
		$id = $this->input->post('id_konsumen'); 
		$isi = $this->input->post('isi'); 
		$no_hp = $this->input->post('no_hp'); 
				
					$userkey = 'fbb13a7909ae';
$passkey = '748411ab05590d3e375c4b66';
$telepon = $no_hp;
$message = $isi;
$url = 'https://console.zenziva.net/wareguler/api/sendWA/';
$curlHandle = curl_init();
curl_setopt($curlHandle, CURLOPT_URL, $url);
curl_setopt($curlHandle, CURLOPT_HEADER, 0);
curl_setopt($curlHandle, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($curlHandle, CURLOPT_SSL_VERIFYHOST, 2);
curl_setopt($curlHandle, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($curlHandle, CURLOPT_TIMEOUT,30);
curl_setopt($curlHandle, CURLOPT_POST, 1);
curl_setopt($curlHandle, CURLOPT_POSTFIELDS, array(
    'userkey' => $userkey,
    'passkey' => $passkey,
    'to' => $telepon,
    'message' => $message
));
$results = json_decode(curl_exec($curlHandle), true);
curl_close($curlHandle);

				
						$this->session->set_flashdata('berhasil_edit2', 'Record is Added Successfully!');
						redirect(base_url('konsumen'));
					
			
	}

	function hapus_konsumen(){
		$kode=$this->input->post('kode');
		$this->m_konsumen->hapus_konsumen($kode);
		echo $this->session->set_flashdata('berhasil_hapus','berhasil_hapus');
		redirect('konsumen');
	}
}