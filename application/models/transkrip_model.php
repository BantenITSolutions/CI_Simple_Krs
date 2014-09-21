<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
	Transkrip Model - source code oleh Gede Lumbung
	lihat tutorial menarik lainnya di http://gedelumbung.com
	Powered by CodeIgniter 2.1
*/

class Transkrip_Model extends CI_Model 
{

	public function baca($tabel)
	{
		$q = $this->db->get($tabel);
		return $q;
	}

	public function baca_siswa($offset,$limit)
	{
		$q = $this->db->get("pw_mst_mahasiswa",$limit,$offset);
		return $q;
	}

	public function baca_detail($tabel,$seleksi)
	{
		$q = $this->db->get_where($tabel,$seleksi);
		return $q;
	}
	
	public function transkrip_nilai($nim){
		$q = $this->db->query("
			SELECT t_n.nim, m.nama_mhs, t_n.kode_mk, t_n.nama_mk, t_n.semester_ditempuh, t_n.jum_sks, t_n.grade, b.bobot, (
			t_n.jum_sks * b.bobot) AS NxB FROM
			(SELECT n.nim, n.kode_mk, mk.nama_mk, mk.jum_sks, n.semester_ditempuh, n.grade
			FROM eva_tr_nilai as n LEFT JOIN ja_mst_mk as mk ON n.kode_mk = mk.kode_mk
			WHERE n.nim = '$nim') as t_n
			LEFT JOIN eva_mst_bobot as b ON b.nilai = t_n.grade
			LEFT JOIN pw_mst_mahasiswa as m ON t_n.nim = m.nim
			ORDER BY t_n.semester_ditempuh
			");
		return $q;
	}

}
