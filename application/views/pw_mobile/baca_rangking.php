
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
	<li data-role="list-divider">Nama Mahasiswa<span class='ui-li-count'>IPK --- JURUSAN</span></li> 
	<?php
	$no = 1;
			foreach($rangking->result_array() as $rows) 
			{
				echo '<li>'.$no.' - '.$rows['nama_mhs'].'<span class="ui-li-count">'. $rows['IPK'].' --- '.$angkatan.'</span></li>';
				$no++;
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

