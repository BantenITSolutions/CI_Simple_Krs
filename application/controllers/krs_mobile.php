<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Krs_Mobile extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		session_start();
		$this->load->model('krs_mobile_model');
	}

	public function index()
	{
		$session=isset($_SESSION['username_siakad']) ? $_SESSION['username_siakad']:'';
		if($session==""){
			$this->login();
		}
		else{
			$this->home();
		}
	}
	
	public function login()
	{
		$session=isset($_SESSION['username_siakad']) ? $_SESSION['username_siakad']:'';
		if($session==""){
		$data["browser"] = $this->agent->browser().' '.$this->agent->version();
		$data["os"] = $this->agent->platform();
		$data["pesan"]="Selamat Datang di Sistem Perwalian Online STIKOM PGRI Banyuwangi versi mobile.";
		$this->load->view('pw_mobile/bg_atas');
		$this->load->view('pw_mobile/bg_login',$data);
		}
	}
	
	public function loginact()
	{
		$username = $this->input->post('username');
		$pwd = $this->input->post('password');
		$tanda = "";
		$hasil = $this->krs_mobile_model->Data_Login($username,$pwd);
		if (count($hasil->result_array())>0){
			foreach($hasil->result() as $items){
				$session_username=$items->username."|".$items->nama_mhs."|".$items->status."|".$items->angkatan."|".$items->kode_jur;
				$tanda=$items->status;
			}
			
			$_SESSION['username_siakad']=$session_username;
			$this->home();
		}
		else{
			$this->login();
		}
	}
	
	public function logout()
	{
		session_destroy();
		$data["browser"] = $this->agent->browser().' '.$this->agent->version();
		$data["os"] = $this->agent->platform();
		$data["pesan"]="Anda telah berhasil keluar dari sistem perwalian online STIKOM PGRI Banyuwangi.";
		$this->load->view('pw_mobile/bg_atas');
		$this->load->view('pw_mobile/bg_login',$data);
	}
	
	public function home()
	{
		$session=isset($_SESSION['username_siakad']) ? $_SESSION['username_siakad']:'';
		if($session==""){
			$this->login();
		}
		else{
			$pecah=explode("|",$session);
			$data["nama"] = $pecah[1];
			$data["browser"] = $this->agent->browser().' '.$this->agent->version();
			$data["os"] = $this->agent->platform();
			$this->load->view('pw_mobile/bg_atas');
			$this->load->view('pw_mobile/header_menu_user');
			$this->load->view('pw_mobile/home',$data);
		}
	}
	
	public function akun()
	{
		$session=isset($_SESSION['username_siakad']) ? $_SESSION['username_siakad']:'';
		if($session==""){
			$this->login();
		}
		else{
			$pecah=explode("|",$session);
			$data["nama"] = $pecah[1];
			$data["browser"] = $this->agent->browser().' '.$this->agent->version();
			$data["os"] = $this->agent->platform();
			$data["pesan"]="Pengaturan Akun";
			$this->load->view('pw_mobile/bg_atas');
			$this->load->view('pw_mobile/header_menu_user');
			$this->load->view('pw_mobile/akun',$data);
		}
	}
	
	public function gantipassword()
	{
		$session=isset($_SESSION['username_siakad']) ? $_SESSION['username_siakad']:'';
		if($session==""){
			$this->login();
		}
		else{
			$pecah=explode("|",$session);
			$usr = $pecah[0];
			$data["nama"] = $pecah[1];
			$data["browser"] = $this->agent->browser().' '.$this->agent->version();
			$data["os"] = $this->agent->platform();
			$pwd = $this->input->post('passlama');
			$pass = $this->input->post('password');
			$hasil = $this->krs_mobile_model->Data_Login($usr,$pwd);
			if (count($hasil->result_array())>0){
				$this->krs_mobile_model->Update_Pass($usr,$pass);
				$data['pesan'] = "Berhasil mengubah password lama anda";
				$this->load->view('pw_mobile/bg_atas');
				$this->load->view('pw_mobile/header_menu_user');
				$this->load->view('pw_mobile/akun',$data);
			}
			else{
				$data['pesan'] = "Gagal mengubah password..!!!";
				$this->load->view('pw_mobile/bg_atas');
				$this->load->view('pw_mobile/header_menu_user');
				$this->load->view('pw_mobile/akun',$data);
			}
		}
	}
	
	public function transkrip_nilai()
	{
		$session=isset($_SESSION['username_siakad']) ? $_SESSION['username_siakad']:'';
		if($session==""){
			$this->login();
		}
		else{
			$pecah=explode("|",$session);
			$usr = $pecah[0];
			$data["nama"] = $pecah[1];
			$data["browser"] = $this->agent->browser().' '.$this->agent->version();
			$data["os"] = $this->agent->platform();
			
			$data['transkrip'] = $this->krs_mobile_model->transkrip_nilai($usr);
			
			$data['pesan'] = "Transkrip Nilai";
			$this->load->view('pw_mobile/bg_atas');
			$this->load->view('pw_mobile/header_menu_user');
			$this->load->view('pw_mobile/transkrip',$data);
		}
	}
	
	public function khs()
	{
		$session=isset($_SESSION['username_siakad']) ? $_SESSION['username_siakad']:'';
		if($session==""){
			$this->login();
		}
		else{
			$pecah=explode("|",$session);
			$data["usr"] = $pecah[0];
			$data["nama"] = $pecah[1];
			$data["browser"] = $this->agent->browser().' '.$this->agent->version();
			$data["os"] = $this->agent->platform();
			$data["khs"]=$this->krs_mobile_model->transkrip_nilai($data["usr"]);
			$data['pesan'] = "Transkrip Nilai";
			$this->load->view('pw_mobile/bg_atas');
			$this->load->view('pw_mobile/header_menu_user');
			$this->load->view('pw_mobile/khs',$data);
		}
	}
	
	public function krs()
	{
		$session=isset($_SESSION['username_siakad']) ? $_SESSION['username_siakad']:'';
		if($session==""){
			$this->login();
		}
		else{
			$pecah=explode("|",$session);
			$data["usr"] = $pecah[0];
			$data["nama"] = $pecah[1];
			$data["browser"] = $this->agent->browser().' '.$this->agent->version();
			$data["os"] = $this->agent->platform();
			$data['jadwal'] = $this->krs_mobile_model->baca_jadwal($data["usr"],"ganjil");
			$data['pesan'] = "Kartu Rencana Studi";
			$this->load->view('pw_mobile/bg_atas');
			$this->load->view('pw_mobile/header_menu_user');
			$this->load->view('pw_mobile/krs',$data);
		}
	}
	
	public function rangking()
	{
		$session=isset($_SESSION['username_siakad']) ? $_SESSION['username_siakad']:'';
		if($session==""){
			$this->login();
		}
		else{
			$pecah=explode("|",$session);
			$data["usr"] = $pecah[0];
			$data["nama"] = $pecah[1];
			$data["browser"] = $this->agent->browser().' '.$this->agent->version();
			$data["os"] = $this->agent->platform();
			$data['angkatan'] = $this->krs_mobile_model->baca_angkatan();
			$data['pesan'] = "Kartu Rencana Studi";
			$this->load->view('pw_mobile/bg_atas');
			$this->load->view('pw_mobile/header_menu_user');
			$this->load->view('pw_mobile/rangking',$data);
		}
	}
	
	public function baca_rangking()
	{
		$session=isset($_SESSION['username_siakad']) ? $_SESSION['username_siakad']:'';
		if($session==""){
			$this->login();
		}
		else{
			$pecah=explode("|",$session);
			$jurusan = $this->uri->segment(3);
			$data["angkatan"] = "";
			if(substr($jurusan,0,2)==11)
			{
				$data["angkatan"] = "TI - 20";
			}
			else if(substr($jurusan,0,2)==31)
			{
				$data["angkatan"] = "MI - 20";
			}
			$data["angkatan"] .= substr($jurusan,2,2);
			$data["usr"] = $pecah[0];
			$data["nama"] = $pecah[1];
			$data["browser"] = $this->agent->browser().' '.$this->agent->version();
			$data["os"] = $this->agent->platform();
			$data['rangking'] = $this->krs_mobile_model->baca_rangking($jurusan);
			$data['pesan'] = "Kartu Rencana Studi";
			$this->load->view('pw_mobile/bg_atas');
			$this->load->view('pw_mobile/header_menu_user');
			$this->load->view('pw_mobile/baca_rangking',$data);
		}
	}
	
	public function jadwal()
	{
		$session=isset($_SESSION['username_siakad']) ? $_SESSION['username_siakad']:'';
		if($session==""){
			$this->login();
		}
		else{
			$pecah=explode("|",$session);
			$data["usr"] = $pecah[0];
			$data["nama"] = $pecah[1];
			$data["browser"] = $this->agent->browser().' '.$this->agent->version();
			$data["os"] = $this->agent->platform();
			$data['jadwal'] = $this->krs_mobile_model->jadwal_tersimpan($data["usr"]);
			$data['pesan'] = "Kartu Rencana Studi";
			$this->load->view('pw_mobile/bg_atas');
			$this->load->view('pw_mobile/header_menu_user');
			$this->load->view('pw_mobile/baca_jadwal',$data);
		}
	}
	
	public function simpan_krs()
	{
		$nim = $this->input->post('nim');
		$detail = $this->input->post('detailfrs');
		if($detail!="")
		{
			$pw_header=array(
				'nim' => $nim ,
				'status' => "0");
			$temp=explode("|", $detail);
			foreach($temp as $value) 
			{
				$pw=explode("+", $value);
				$pw_detail[]=array(
				'nim' => $nim ,
				'kode_mk' => $pw[0],
				'kode_dosen' => $pw[1],
				'jadwal' => $pw[2]);
			}
			$this->krs_mobile_model->hapus_data_pw_lama($nim);
			$this->krs_mobile_model->simpan_krs($pw_header,$pw_detail);
			$this->jadwal();
		}
		else
		{
			$this->krs();
		}
	}
}
