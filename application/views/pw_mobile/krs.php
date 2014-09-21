
   <!-- /navbar -->
   <!-- /header -->

<script languange="javascript">

function pilih(chk) {
	var jumlahSKS=0;	
	var detailfrs="";
	var beban=document.datafrs.beban_study.value;
	var temp=document.datafrs.jumlahsks.value;

	for(i=0 ; i<document.datafrs.length; i++) 
	{
		if(document.datafrs.elements[i].type=='checkbox')
		{
			if(document.datafrs.elements[i].checked==true)
			{
					parseData= document.datafrs[i].name.split("_");
					jumlahSKS += parseInt(document.getElementById(parseData[1]).innerHTML);
					if(jumlahSKS > beban) {
					chk.checked=false;
					jumlahSKS = temp;
					alert('Jumlah SKS yang anda ambil tidak boleh lebih dari beban maksimal');
				}
			}
		}
	}

	for(i=0 ; i<document.datafrs.length; i++) 
	{
		if(document.datafrs.elements[i].type=='checkbox')
		{
			if(document.datafrs.elements[i].checked==true)
			{
				parseData= document.datafrs[i].name.split("_");
				idMk = "mk_"+parseData[1];
				idDosen = "dosen_"+parseData[1];
				idJadwal = "jdw_"+parseData[1];
				if(detailfrs=="")
				{
					detailfrs += document.getElementById(idMk).innerHTML+"+"+document.
					getElementById(idDosen).innerHTML+"+"+document.getElementById(idJadwal).innerHTML;
				}
				else
				{
					detailfrs += "|"+document.getElementById(idMk).innerHTML+"+"+document.
					getElementById(idDosen).innerHTML+"+"+document.getElementById(idJadwal).innerHTML;
				}
				
			}
		}
	}
	document.datafrs.jumlahsks.value=jumlahSKS;
	document.datafrs.detailfrs.value=detailfrs;
}//end function


</script>
   <div data-role="content">
   
	<form method="post" action="<?php echo base_url(); ?>krs_mobile/simpan_krs" name="datafrs" id="datafrs">
   <ul data-role="listview" data-inset="true" data-theme="c" data-dividertheme="a"> 
			<li data-role="list-divider">Selamat Datang</li> 
			<li><?php echo $nama; ?></li>
			<li>
			<table width="100%">
			<tr><td width="30%">Beban SKS</td><td><input name="beban_study" value="24" type="text" readonly="readonly" /></td></tr>
			<tr><td>Dosen PA</td><td><input name="dosen" value="Tatang Sunarya a.k.a Sule" type="text" readonly="readonly" /><input name="nim" value="<?php echo $usr ?>" type="hidden"/></td></tr>
			</table>
			</li>
			<li data-role="list-divider"></li>
	</ul>
		<?php
			foreach($jadwal->result_array() as $d)
			{
		?>
		<?php
				echo '
		<ul data-role="listview" data-inset="true" data-theme="c" data-dividertheme="a"><li data-role="list-divider">'.$d[
		'nama_mk'].'
				</li><li>
	<div>
	<table>
	<tr valign="top"><td width=90>Kode MK</td><td width=10> : </td><td id="mk_'.$d['id_jadwal'].'">'.$d['kode_mk'].'</td></tr>
	<tr valign="top"><td>Mata Kuliah</td><td> : </td><td>'.$d['nama_mk'].'</td></tr>
	<tr valign="top"><td>Nama Dosen</td><td> : </td><td>'.$d['nama_dosen'].'</td></tr>
	<tr valign="top"><td>Kode Dosen</td><td> : </td><td id="dosen_'.$d['id_jadwal'].'">'.$d['kode_dosen'].'</td></tr>
	<tr valign="top"><td>Semester</td><td> : </td><td>'.$d['semester'].'</td></tr>
	<tr valign="top"><td>Jumlah SKS</td><td> : </td><td id="'.$d['id_jadwal'].'">'.$d['jum_sks'].'</td></tr>
	<tr valign="top"><td>Jadwal</td><td> : </td><td id="jdw_'.$d['id_jadwal'].'">'.$d['jadwal'].'</td></tr>
	<tr valign="bottom" align="left"><td>Pilih MK</td><td>:</td><td>
	<input type="checkbox" name="chk_'.$d['id_jadwal'].'" onchange="javascript:pilih(this);" />
	</td></tr>
	</table>
	</div>
	</li>
		<li data-role="list-divider"></li>
		</ul>';
		?>
		
		<?php
			}
		?>
	<div id="hasil"></div>
	<table width="100%">
	<tr><td width="40%">Total SKS</td><td>
	<input id="idJumlahSKS" name="jumlahsks" value="0" type="text" size="2" style="background-color: #CFCFCF;" readonly="readonly"/>	
	<input name="detailfrs" type="hidden" size=100 value=""/></td></tr>
	<tr><td colspan="2"><input type="submit" value="Simpan KRS" name="tombolsimpan" id="tombolsimpan"></td></tr>
	</form>
	</table>
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

