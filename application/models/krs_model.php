<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
	KRS Model - source code oleh Gede Lumbung
	lihat tutorial menarik lainnya di http://gedelumbung.com
	Powered by CodeIgniter 2.1
*/

class Krs_Model extends CI_Model 
{

	public function baca_siswa()
	{
		$q = $this->db->query("select * from pw_mst_mahasiswa");
		return $q;
	}
	
	public function baca_detail_siswa($nim)
	{
		$q = $this->db->query("select * from pw_mst_mahasiswa where nim='".$nim."'");
		return $q;
	}
	
	public function baca_jadwal($nim,$status)
	{
		$thn_skr = substr(date('Y'),2,2);
		$smt = "";
		if($status=="ganjil")
		{
			$smt = (($thn_skr-$nim)*2)-1;
		}
		else
		{
			$smt = ($thn_skr-$nim)*2;
		}
		$q = $this->db->query("select * from ja_tr_jadwal as a left join (ja_mst_mk,ja_mst_dosen ) on a.kode_mk=ja_mst_mk.kode_mk and 
		a.kode_dosen=ja_mst_dosen.kode_dosen where ja_mst_mk.semester=".$smt."");
		return $q;
	}
	
	public function hapus_data_pw_lama($nim)
	{
		$this->db->trans_start();
		$hapus_head ="(nim='".$nim."')";
		$hapus_detail ="(nim='".$nim."')";
		$this->db->delete('pw_tr_perwalian_header',$hapus_head);
		$this->db->delete('pw_tr_perwalian_detail',$hapus_detail);
		$this->db->trans_complete();
		if ($this->db->trans_status() === FALSE)
		{
    		echo "Error";
		}
	}
	
	public function simpan_krs($data_head,$data_detail) 
	{
		$this->db->trans_start();
		$this->db->insert('pw_tr_perwalian_header',$data_head);			
		foreach($data_detail as $value) {			
			$this->db->insert('pw_tr_perwalian_detail',$value);
		}
		$this->db->trans_complete();
		if ($this->db->trans_status() === FALSE)
		{
    		echo "Error";
		} 
	}
}
