<?php
include "koneksi/koneksi.php";


# TOMBOL SIMPAN DIKLIK
if(isset($_POST['btnSimpan'])){
	# Baca Variabel Form
	$cmbKelas		= $_POST['cmbKelas'];
	$txtNamaKls		= $_POST['txtNamaKls'];
	$txtNamaKls		= str_replace("'","&acute;",$txtNamaKls);
	$txtTahunAjar	= $_POST['txtTahunAjar'];
	$cmbGuru		= $_POST['cmbGuru'];

	# Validasi form, jika kosong sampaikan pesan error
	$pesanError = array();
	if (trim($txtTahunAjar)=="") {
		$pesanError[] = "Data <b>Tahun Ajaran</b> tidak boleh kosong !";		
	}
	if (trim($cmbKelas)=="KOSONG") {
		$pesanError[] = "Data <b>Kelas (VII, VIII, IX) </b> belum ada yang dipilih !";			
	}
	if (trim($txtNamaKls)=="") {
		$pesanError[] = "Data <b>Nama Kelas</b> tidak boleh kosong !";			
	}
	if (trim($cmbGuru)=="KOSONG") {
		$pesanError[] = "Data <b>Guru Wali Kelas</b> belum ada yang dipilih !";			
	}
	if(! isset($_POST['cbSiswa'])) {
		$pesanError[] = "Data <b>Data Siswa (CekBox)</b> belum ada yang dipilih !";		
	}
			
	# Validasi Nama kelas, jika sudah ada akan ditolak
	$sqlCek="SELECT * FROM kelas WHERE nama_kelas='$txtNamaKls' AND tahun_ajar='$txtTahunAjar'";
	$qryCek=mysql_query($sqlCek, $koneksidb) or die ("Eror Query".mysql_error()); 
	if(mysql_num_rows($qryCek)>=1){
		$pesanError[] = "Maaf, Nama Kelas<b> $txtNamaKls </b> dengan <b>tahun ajaran</b> yang sama sudah dibuat";
	}

	# JIKA ADA PESAN ERROR DARI VALIDASI
	if (count($pesanError)>=1 ){
		echo "<div class='mssgBox'>";
		echo "<img src='images/attention.png'> <br><hr>";
			$noPesan=0;
			foreach ($pesanError as $indeks=>$pesan_tampil) { 
			$noPesan++;
				echo "&nbsp;&nbsp; $noPesan. $pesan_tampil<br>";	
			} 
		echo "</div> <br>"; 
	}
	else {
		# SIMPAN DATA KE DATABASE. Jika jumlah error $pesanError tidak ada, simpan datanya
		// Menyimpan data ke tabel Kelas
		
	}	
} // Penutup POST
	
# MEMBUAT NILAI DATA KE VARIABEL

# =============================================================
# FILTER TAHUN ANGAKATAN PADA DATA SISWA
# =============================================================
# Tahun Terpilih dari URL dan form
$tahun 			= isset($_GET['tahun']) ? $_GET['tahun'] : date('Y');
$dataAngkatan 	= isset($_POST['cmbAngkatan']) ? $_POST['cmbAngkatan'] : $tahun;

$filterSQL	= "";
# Set nilai pada filter
if(isset($_POST['btnTampil'])) {
	$filterSQL = " WHERE kategori='$_POST[cmbAngkatan]'";
}
else {
	$sekarang = date('Y');
	$filterSQL = " WHERE kategori='$_POST[cmbAngkatan]'";
}
?>
<form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" name="frmadd">
<table width="700" cellpadding="2" cellspacing="1" class='table table-bordered table-striped' style="margin-top:0px;">
	<tr>
	  <td colspan="3" bgcolor="#CCCCCC"><strong>
	    <h3>MEMBUAT KELAS</h3>
	  </strong></td>
	</tr>
	
	
	
	
	<tr>
	  <td bgcolor="#F5F5F5"><strong>FILTER  SISWA </strong></td>
	  <td>&nbsp;</td>
	  <td>&nbsp;</td>
    </tr>
	<tr>
      <td><b>Kategori</b></td>
	  <td><b>:</b></td>
	  <td><select name="cmbAngkatan">
          <?php
  $dataSql = "SELECT * FROM kategori ";
  $dataQry = mysql_query($dataSql, $koneksidb) or die ("Gagal Query".mysql_error());
  while ($dataRow = mysql_fetch_array($dataQry)) {
	
	echo "<option value='$dataRow[nm_kategori]'>$dataRow[nm_kategori]</option>";
  }
  ?>
        </select>
          <input name="btnTampil" type="submit" value=" Tampilkan " /></td>
    </tr>
	<tr><td>&nbsp;</td>
	  <td>&nbsp;</td>
	  <td align="right">&nbsp;</td>
	</tr>
</table>

<table class='table table-bordered table-striped' width="700" border="0" cellspacing="1" cellpadding="2">
  <tr>
    <td width="24" height="23" align="center" bgcolor="#F5F5F5"><strong>No</strong></td>
    <td width="29" align="center" bgcolor="#F5F5F5"><strong>Pilih</strong></td>
    <td width="70" bgcolor="#F5F5F5"><strong>NIS</strong></td>
    <td width="236" bgcolor="#F5F5F5"><strong>Nama Siswa </strong></td>
    <td width="70" bgcolor="#F5F5F5"><strong>Kelamin</strong></td>
    <td width="100" bgcolor="#F5F5F5"><strong>Agama</strong></td>
    <td width="69" bgcolor="#F5F5F5"><strong> Angkatan </strong></td>
    <td width="61" bgcolor="#F5F5F5"><strong>Kelas</strong></td>
    </tr>
  <?php
  	// Menampilkan Semua data Siswa dengan Filter per Tahun
	$bacaSql = "SELECT * FROM buku $filterSQL ";
	$bacaQry = mysql_query($bacaSql, $koneksidb)  or die ("Query salah : ".mysql_error()); 
	$nomor = 0; 
	while ($bacaData = mysql_fetch_array($bacaQry)) {
		$nomor++;
		$kodeSiswa = $bacaData['kode_siswa'];
		
		// Skrip untuk membaca posisi Kelas Siswa
		
		
		// gradasi warna
		if($nomor%2==1) { $warna=""; } else {$warna="#F5F5F5";}
	?>
  <tr bgcolor="<?php echo $warna; ?>">
    <td align="center"><?php echo $nomor; ?></td>
    <td align="center"><input name="cbSiswa[]" type="checkbox" id="cbSiswa" value="<?php echo $kodeSiswa; ?>"  <?php echo $mati; ?>/></td>
    <td><?php echo $bacaData['nis']; ?></td>
    <td><?php echo $bacaData['nama_siswa']; ?></td>
    <td><?php echo $bacaData['kelamin']; ?></td>
    <td><?php echo $bacaData['agama']; ?></td>
    <td><?php echo $bacaData['tahun_angkatan']; ?></td>
    <td bgcolor="<?php echo $warna; ?>"><?php echo $infoData['kelas']."-".$infoData['nama_kelas']; ?></td>
    </tr>
  <?php } ?>
  <tr>
    <td colspan="8"><input name="btnSimpan" type="submit" style="cursor:pointer;" value=" SIMPAN KELAS " /></td>
  </tr>
</table>
</form>
