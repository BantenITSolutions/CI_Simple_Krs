<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
	KRS Controller - source code oleh Gede Lumbung
	lihat tutorial menarik lainnya di http://gedelumbung.com
	Powered by CodeIgniter 2.1
*/

class Krs extends CI_Controller 
{
	public function index()
	{
		$dt['siswa'] = $this->krs_model->baca_siswa();
		$this->load->view('krs/daftar_siswa',$dt);
	}
	
	public function isi_krs()
	{
		$kode='';		
		if ($this->uri->segment(3) === FALSE)
		{
    			$kode='';
				$dt['jadwal'] = "";
				echo "akses error";
		}
		else
		{
    			$kode = substr($this->uri->segment(3),2,2);
				$dt['nim'] = $this->uri->segment(3);
				$detail = $this->krs_model->baca_detail_siswa($dt['nim']);
				foreach($detail->result() as $d)
				{
					$dt["nama_mhs"] = $d->nama_mhs;
				}
				$dt['jadwal'] = $this->krs_model->baca_jadwal($kode,"ganjil");
		}
		$this->load->view('krs/isi_krs',$dt);
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
			$this->krs_model->hapus_data_pw_lama($nim);
			$this->krs_model->simpan_krs($pw_header,$pw_detail);
			echo "<div style='background-color:red; color:white; padding:5px; width:99%; text-align:center;'>Data Kartu Rencana Studi Tersimpan</div>";
		}
	}
}