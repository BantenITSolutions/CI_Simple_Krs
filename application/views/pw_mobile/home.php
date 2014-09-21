
   <!-- /navbar -->
   <!-- /header -->

   <div data-role="content">
   <ul data-role="listview" data-inset="true" data-theme="c" data-dividertheme="a"> 
			<li data-role="list-divider">Selamat Datang</li> 
			<li><?php echo $nama; ?></li>
			<li data-role="list-divider"></li>
	</ul>
	<br> 
	<ul data-role="listview" data-theme="a"> 
		<li><a href="<?php echo base_url(); ?>krs_mobile/krs"> 
		<img src="<?php echo base_url(); ?>asset/image/krs.png" /> 
		<h6>Kartu Rencana Studi</h6> 
		<p>Mengisi Atau Mengedit Kartu Rencana Studi</p> 
		</a>
		</li>
		<li><a href="<?php echo base_url(); ?>krs_mobile/transkrip_nilai"> 
		<img src="<?php echo base_url(); ?>asset/image/trans-nilai.png" /> 
		<h5>Transkrip Nilai</h5> 
		<p>Melihat Transkrip Nilai Semua Mata Kuliah Yang Telah Ditempuh</p> 
		</a>
		</li>
		<li><a href="<?php echo base_url(); ?>krs_mobile/khs"> 
		<img src="<?php echo base_url(); ?>asset/image/khs.png" /> 
		<h5>Kartu Hasil Studi</h5> 
		<p>Melihat Nilai Per Semester Yang Telah Ditempuh</p> 
		</a>
		</li>
		<li><a href="<?php echo base_url(); ?>krs_mobile/rangking"> 
		<img src="<?php echo base_url(); ?>asset/image/rangking.png" /> 
		<h5>Rangking Angkatan</h5> 
		<p>Melihat Rangking Per Angkatan Berdasarkan IPK Tertinggi</p> 
		</a>
		</li>
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
      <h3>Sistem Perwalian Online STIKOM PGRI Banyuwangi - 2011</h3>
   </footer>

 </div>
 <!-- /page -->
</body>
</html>

