<?php
class krs_mobile_model extends CI_Model{

	function __construct()
	{
		parent::__construct();
	}
		
	public function Data_Login($user,$pass)
	{
		$user_bersih=mysql_real_escape_string($user);
		$pass_bersih=mysql_real_escape_string($pass);
		$query=$this->db->query("select * from pw_mst_login left join pw_mst_mahasiswa on pw_mst_login.username=pw_mst_mahasiswa.nim where username='$user_bersih' and 
		pass=md5('$pass_bersih')");
		return $query;
	}
	public function Update_Pass($user,$pass)
	{
		$pass_bersih=mysql_real_escape_string($pass);
		$q = $this->db->query("update pw_mst_login set pass=md5('$pass_bersih') where username='$user'");
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
	
	public function baca_jadwal($nim_mhs,$status)
	{
		$thn_skr = substr(date('Y'),2,2);
		$smt = "";
		$nim = substr($nim_mhs,2,2);
		if($status=="ganjil")
		{
			$smt = (($thn_skr-$nim)*2)-1;
		}
		else
		{
			$smt = ($thn_skr-$nim)*2;
		}
		$q = $this->db->query("select * from ja_tr_jadwal as a left join (ja_mst_mk,ja_mst_dosen ) on a.kode_mk=ja_mst_mk.kode_mk and 
		a.kode_dosen=ja_mst_dosen.kode_dosen where ja_mst_mk.semester=".$smt." and ja_mst_mk.kode_mk not in (select kode_mk from eva_tr_nilai where nim='".$nim_mhs."')");
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
	
	public function baca_angkatan()
	{
		$q = $this->db->query("select substring(n.nim,1,4) as angkatan from eva_tr_nilai as n where substring(n.nim,1,2) = 11 or substring(n.nim,1,2) = 31 group by angkatan");
		return $q;
	}
	
	public function baca_rangking($jur){
		$q = $this->db->query("select nama_mhs,eva_tr_nilai.nim, round(SUM((eva_mst_bobot.bobot * ja_mst_mk.jum_sks))/ SUM(ja_mst_mk.jum_sks), 2) as IPK 
		FROM eva_tr_nilai LEFT JOIN (ja_mst_mk,eva_mst_bobot,pw_mst_mahasiswa) 
		ON eva_tr_nilai.kode_mk=ja_mst_mk.kode_mk
		and eva_mst_bobot.nilai = eva_tr_nilai.grade
		and eva_tr_nilai.nim=pw_mst_mahasiswa.nim
 		WHERE  substring(eva_tr_nilai.nim, 1, 4)='$jur' AND eva_tr_nilai.grade NOT IN('T') group by eva_tr_nilai.nim ORDER BY IPK DESC LIMIT 0, 20");
		return $q;
	}
	
	public function jadwal_tersimpan($nim)
	{
		$q = $this->db->query("select * from pw_tr_perwalian_detail as pd left join ja_mst_mk as jm on 
		pd.kode_mk=jm.kode_mk left join ja_mst_dosen as jd on pd.kode_dosen=jd.kode_dosen where pd.nim='".$nim."'");
		return $q;
	}
}
?>		