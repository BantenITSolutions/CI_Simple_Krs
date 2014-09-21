
   <!-- /navbar -->
   <!-- /header -->

   <div data-role="content">
   <ul data-role="listview" data-inset="true" data-theme="c" data-dividertheme="a"> 
			<li data-role="list-divider">Selamat Datang</li> 
			<li><?php echo $nama; ?></li>
			<li data-role="list-divider"></li>
	</ul>
	<br>
	<ul data-role="listview" data-theme="c" data-dividertheme="a"> 
	<?php
	$st='';
	$tot_nxb=0;	
	$tot_sks=0;
	$no=1;
	foreach($khs->result_array() as $value)
	{
		if($st=='')
		{
			$simpan[]='<li data-theme="a">Semester '.$value['semester_ditempuh'].'<span class="ui-li-count">NILAI-SKS-SMT</span></li> <li>'. $value['nama_mk'].'
			<span class="ui-li-count">'. $value['grade'].' ----- '.$value['semester_ditempuh'].' ----- 
			'. $value['jum_sks'].'</span></li>';
			$no++;
			$tot_nxb=0;
			$tot_sks=0;
		}
		else if($value['semester_ditempuh']!=$st)
		{
			$ip = 0;
			if($tot_nxb !=0)			
				$ip = round($tot_nxb/$tot_sks, 2);			
			$simpan[]='<li data-role="list-divider"> SKS : '.$tot_sks.' - IP Semester : '.$ip.'</li>
			<li></li>';

			$simpan[]='<li data-theme="a">Semester '.$value['semester_ditempuh'].'<span class="ui-li-count">NILAI-SKS-SMT</span></li> <li>'. $value['nama_mk'].'
			<span class="ui-li-count">'. $value['grade'].' ----- '.$value['semester_ditempuh'].' ----- 
			'. $value['jum_sks'].'</span></li>';
			$no++;
			$tot_nxb =0;
			$tot_sks=0;
		}		
		else 
		{ 
			$simpan[]='<li>'. $value['nama_mk'].'
			<span class="ui-li-count">'. $value['grade'].' ----- '.$value['semester_ditempuh'].' ----- 
			'. $value['jum_sks'].'</span></li>';
			$no++;
					
		}
		if($value['grade'] != 'T') 
		{
			$tot_nxb +=$value['NxB'];
			$tot_sks+=$value['jum_sks'];
		}
		$st=$value['semester_ditempuh'];	
	}
	$ip = 0;
	if($tot_nxb !=0)			
		$ip = round($tot_nxb/$tot_sks, 2);
	$simpan[]='<li data-role="list-divider"> SKS : '.$tot_sks.' - IP Semester : '.$ip.'</li>
			<li></li>';

	foreach($simpan as $tampil)
	{
		echo $tampil;
	}
	?>
	<li data-role="list-divider"></li>
	</ul>
	<br>
	<ul data-role="listview" data-inset="true" data-theme="c" data-dividertheme="a"> 
			<li data-role="list-divider">Informasi Pengunjung</li> 
			<li>Browser : <?php echo $browser; ?></li> 
			<li>Platform OS : <?php echo $os; ?></li>
			<li data-role="list-divider"></li>
	</ul> 
   </div>

   <footer data-role="footer" data-theme="a">
   <div data-role="navbar" data-theme="a">
		<ul>
			<li><a href="<?php echo base_url(); ?>krs_mobile/home" data-role="button" data-icon="star">Beranda</a></li>
			<li><a href="#" data-role="button" data-icon="refresh">Refresh</a></li>
		</ul>
	</div>
      <h1>Sistem Perwalian Online STIKOM PGRI Banyuwangi - 2011</h1>
   </footer>

 </div>
 <!-- /page -->
</body>
</html>

