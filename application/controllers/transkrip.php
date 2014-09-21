<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
	Transkrip Controller - source code oleh Gede Lumbung
	lihat tutorial menarik lainnya di http://gedelumbung.com
	Powered by CodeIgniter 2.1
*/

class Transkrip extends CI_Controller 
{
	public function index()
	{
		$page=$this->uri->segment(3);
      	$limit=12;
		if(!$page):
		$offset = 0;
		else:
		$offset = $page;
		endif;	
		
		$tot_hal = $this->transkrip_model->baca("pw_mst_mahasiswa");
		$config['base_url'] = base_url() . 'transkrip/index/';
        	$config['total_rows'] = $tot_hal->num_rows();
        	$config['per_page'] = $limit;
			$config['uri_segment'] = 3;
	    	$config['first_link'] = 'First';
			$config['last_link'] = 'Last';
			$config['next_link'] = 'Next';
			$config['prev_link'] = 'Previous';
       		$this->pagination->initialize($config);
		$dt["paginator"] =$this->pagination->create_links();
		
		$dt['siswa'] = $this->transkrip_model->baca_siswa($offset,$limit);
		$this->load->view('transkrip/daftar_siswa',$dt);
	}
	
	public function lihat_transkrip()
	{	
		if ($this->uri->segment(3) === FALSE)
		{
				echo "<meta http-equiv='refresh' content='0; url=".base_url()."/transkrip'>";
		}
		else
		{
				$dt['nim'] = $this->uri->segment(3);
				$seleksi = array('nim' => $dt['nim']);
				$detail = $this->transkrip_model->baca_detail("pw_mst_mahasiswa",$seleksi);
				foreach($detail->result() as $d)
				{
					$dt["nama_mhs"] = $d->nama_mhs;
				}
				$dt['transkrip'] = $this->transkrip_model->transkrip_nilai($dt['nim']);
		}
		$this->load->view('transkrip/lihat_transkrip',$dt);
	}
}