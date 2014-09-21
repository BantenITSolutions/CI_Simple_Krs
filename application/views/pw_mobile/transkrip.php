
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
	<li data-role="list-divider">Transkrip Nilai<span class='ui-li-count'>NILAI-SKS-SMT</span></li> 
   	<?php
	$totalNB=0;	
	$totalSKS=0;
	$no=1;
	
	foreach($transkrip->result_array() as $value)
	{
		echo '
			<li>'. $value['nama_mk'].'
			<span class="ui-li-count">'. $value['grade'].' ----- '.$value['semester_ditempuh'].' ----- 
			'. $value['jum_sks'].'</span></li>';
		
		$no++;
		if($value['grade'] != 'T') {
			$totalNB +=$value['NxB'];
			$totalSKS+=$value['jum_sks'];
		}
	}
	$ip = 0;
	if($totalNB !=0)			
		$ip = round($totalNB/$totalSKS, 2);
	echo '<li data-role="list-divider">Total SKS Terselesaikan : '.$totalSKS.' SKS</li>
			<li data-role="list-divider">IP Kumulatif : '.$ip.'</li>';
	
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

