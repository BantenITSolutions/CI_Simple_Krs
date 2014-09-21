<body>
 <div data-role="page">
   <header data-role="header" data-theme="a">
     <h1>
       <img src="<?php echo base_url();?>asset/image/title-stikom.png" alt="STIKOM PGRI Banyuwangi" />
     </h1>
	 <div data-role="navbar" data-theme="a">
		<ul>
			<li><a href="<?php echo base_url(); ?>krs_mobile/login" data-role="button" data-icon="star">Beranda</a></li>
			<li><a href="#" data-role="button" data-icon="refresh">Refresh</a></li>
		</ul>
	</div>
   </header>
   <!-- /header -->

   <div data-role="content">
  	<?php echo $pesan; ?>
   	<form method="post" action="<?php echo base_url(); ?>krs_mobile/loginact">
		<div data-role="fieldcontain">
		<label for="name">Username :</label>
		<input type="text" name="username" id="name"  />
    	<label for="password">Password :</label>
    	<input type="password" name="password" id="password" />
		<fieldset class="ui-grid-a">
		<div class="ui-block-a"><input type="submit" value="Masuk" data-icon="arrow-r" data-theme="a"></div>
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
      <h1>Sistem Perwalian Online STIKOM PGRI Banyuwangi - 2011</h1>
   </footer>

 </div>
 <!-- /page -->
</body>
</html>

