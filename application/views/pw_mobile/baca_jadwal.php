
   <!-- /navbar -->
   <!-- /header -->

   <div data-role="content">
   <ul data-role="listview" data-inset="true" data-theme="c" data-dividertheme="a"> 
			<li data-role="list-divider">Selamat Datang</li> 
			<li><?php echo $nama; ?></li>
			<li data-role="list-divider"></li>
	</ul>
	<div data-role="collapsible-set" data-theme="a" data-content-theme="c">
   	<?php
	foreach($jadwal->result_array() as $d)
	{

		echo '<div data-role="collapsible">
		<h3>'.$d['nama_mk'].'</h3>
		<p>
		<table>
	<tr valign="top"><td width=100>Kode MK</td><td width=10> : </td><td>'.$d['kode_mk'].'</td></tr>
	<tr valign="top"><td>Mata Kuliah</td><td> : </td><td>'.$d['nama_mk'].'</td></tr>
	<tr valign="top"><td>Nama Dosen</td><td> : </td><td>'.$d['nama_dosen'].'</td></tr>
	<tr valign="top"><td>Kode Dosen</td><td> : </td><td>'.$d['kode_dosen'].'</td></tr>
	<tr valign="top"><td>Semester</td><td> : </td><td>'.$d['semester'].'</td></tr>
	<tr valign="top"><td>Jumlah SKS</td><td> : </td><td>'.$d['jum_sks'].'</td></tr>
	<tr valign="top"><td>Jadwal</td><td> : </td><td>'.$d['jadwal'].'</td></tr>
	</table>
		</p>
		</div>';
	}
	?>
	</div>
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

