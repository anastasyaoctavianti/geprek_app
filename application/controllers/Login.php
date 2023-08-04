<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

		function __construct(){
		parent::__construct();
		$this->load->model('m_pengguna');
	}

	public function index()
	{
		$this->load->view('login');
	}
	public function reg()
	{
		$this->load->view('register');
	}
	public function lupa()
	{
		$this->load->view('lupa');
	}

	public function daftar()
	{
		$no_hp=$this->input->post('no_hp');
		$numm=$this->db->query("SELECT * FROM konsumen where no_hp='$no_hp'")->num_rows();
		if ($numm>0) {
			$this->session->set_flashdata('nik_ada', ' ');
			redirect("login/reg");
		}

		if ($this->input->post('password')!=$this->input->post('password2')) {
			$this->session->set_flashdata('salahaa', ' ');
			redirect("login/reg");
		}else{
			$data = array(
								'kode_konsumen' => $this->input->post('kode_konsumen'),
								'nama_konsumen' => $this->input->post('nama_konsumen'),
								'alamat' => $this->input->post('alamat'),
								'no_hp' => $this->input->post('no_hp'),
								'tanggal_lahir' => $this->input->post('tanggal_lahir'),
								'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
							);
					$this->db->insert("konsumen", $data);
					$iid_last=$this->db->insert_id();
					 $data_session = array(
							'id_pengguna2' => $iid_last,
							'username2' => $this->input->post('nama_konsumen'),
							'nama_lengkap' => $this->input->post('nama_konsumen'),
							'no_hp' => $this->input->post('no_hp'),
							'foto' => "",
							'level' => "Pelanggan",
							'email' => "",
						 	'status2' => "loggg"
						);
					$this->session->set_userdata($data_session);
					$this->session->set_flashdata('berhasil_reg', 'Record is Added Successfully!');
					redirect("dashboard");
		}
	}



	function aksi_login(){

		$username = $this->input->post('username');
		$password = $this->input->post('password');

        $result = $this->db->get_where('pengguna', ['username' => $username])->row_array();
        $result2 = $this->db->get_where('konsumen', ['no_hp' => $username])->row_array();

        // jika usernya ada
        if ($result) {
                if (password_verify($password, $result['password'])) {
                    $data_session = array(
							'id_pengguna2' => $result['id_pengguna'],
							'username2' => $result['username'],
							'nama_lengkap' => $result['nama_lengkap'],
							'foto' => "",
							'level' => $result['level'],
						 	'status2' => "loggg"
						);
					$this->session->set_userdata($data_session);
					redirect("dashboard");
                } else {
                    $this->session->set_flashdata('pw_salah', ' ');
					redirect("login");
                }
           
        }elseif ($result2) {
                if (password_verify($password, $result2['password'])) {
                    $data_session = array(
							'id_pengguna2' => $result2['id_konsumen'],
							'username2' => $result2['nama_konsumen'],
							'nama_lengkap' => $result2['nama_konsumen'],
							'foto' => "",
							'level' => "Pelanggan",
						 	'status2' => "loggg"
						);
					$this->session->set_userdata($data_session);
					redirect("dashboard");
                } else {
                    $this->session->set_flashdata('pw_salah', ' ');
					redirect("login");
                }
           
        }  else{
			$this->session->set_flashdata('username_salah', ' ');
			redirect("login");
		}

	}



	function reset(){
		$username = $this->input->post('username');
		$no_hp = $this->input->post('no_hp');
        $result = $this->db->get_where('pengguna', ['username' => $username])->row_array();
        // jika usernya ada
        $pw_baru=rand(10000, 99999);
        if ($result) {
                if ($no_hp==$result['no_hp']) {
$userkey = 'fbb13a7909ae';
$passkey = '748411ab05590d3e375c4b66';
$telepon = $no_hp;
$message = 'Password akun Anda telah berhasil di reset, password baru Anda adalah : '.$pw_baru;
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
			$id_pengguna = $result['id_pengguna']; 
				$data2 = array(
								'password' => password_hash($pw_baru, PASSWORD_DEFAULT),
							);
					 $this->m_pengguna->edit_pengguna($data2,$id_pengguna);
                   	 $this->session->set_flashdata('berhasil', ' ');
					redirect("login");
                } else {
                    $this->session->set_flashdata('nphp_salah', ' ');
					redirect("login/lupa");
                }
        }  else{
			$this->session->set_flashdata('username_salah', ' ');
			redirect("login/lupa");
		}
	}


			public function logout(){
			$this->session->sess_destroy();
			redirect("login");
		}
}
