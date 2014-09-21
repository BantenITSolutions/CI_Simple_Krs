
   <!-- /navbar -->
   <!-- /header -->

   <div data-role="content">
   <ul data-role="listview" data-inset="true" data-theme="c" data-dividertheme="a"> 
			<li data-role="list-divider">Selamat Datang</li> 
			<li><?php echo $nama; ?></li>
			<li data-role="list-divider"></li>
	</ul>
	<?php echo $pesan; ?>
   	<form method="post" action="<?php echo base_url(); ?>krs_mobile/gantipassword">
	
		<div data-role="fieldcontain">
		<label for="name">Password Lama :</label>
		<input type="text" name="passlama" id="name"  />
    	<label for="password">Password Baru :</label>
    	<input type="password" name="password" id="password" />
		<fieldset class="ui-grid-a">
		<div class="ui-block-a"><input type="submit" value="Ganti" data-icon="arrow-r" data-theme="a"></div>
		<div class="ui-block-b"><input type="reset" value="Hapus" data-icon="delete" data-theme="c"></div>	   
	</fieldset>
		
		</div>	
	</form>
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

