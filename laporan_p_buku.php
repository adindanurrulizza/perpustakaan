<body onLoad="javascript:print()"> 
<?php
$tgl = date('M Y');
?>
<div class="panel panel-default">
<h2 align="center">Perpustakaan Amanah Masjid Muhammadiyah</h2> 
<h4 align="center">Laporan Peminjaman Buku Per Buku <br> Bulan : <?php echo"$tgl";?></h4> 
<table  align="center"  width="53%">
<?php
$idk=$_POST['idk'];
include "koneksi/koneksi.php";
$sql_limit = "SELECT * FROM  buku WHERE no_induk_buku='".$idk."' ";
$query=mysql_query($sql_limit);$no=1;
$baris=1;
$tampi=mysql_fetch_array($query);

?>

    

          

          <td>Id Buku  :<?php echo $tampi['no_induk_buku'] ?></td>
		  <tr>
          <td>Judul Buku :<?php echo $tampi['judul'] ?></td>
		  <tr>
          <td>Pengarang :<?php echo $tampi['pengarang'] ?></td>
		  	  <tr>
          <td>Penerbit:<?php echo $tampi['penerbit'] ?></td>
		  	  <tr>
          <td>Kategori :<?php echo $tampi['id_ketegori'] ?></td>
        

         
  


</table>

<table border="1" align="center"  width="53%">
					<thead>
<tr>

<th>No</th>
<th>Id Pinjam</th>
<th>Nama Anggota</th>
<th>Tanggal Pinjam</th>
<th>Tanggal Pengembalian</th>

</tr>
</thead>

<?php
$idk=$_POST['idk'];
include "koneksi/koneksi.php";
$sql_limit = "select peminjaman.no_peminjaman,tgl_pinjam,tgl_kembali,anggota.no_agt,nama
from peminjaman,anggota
where peminjaman.no_agt=anggota.no_agt";
$query=mysql_query($sql_limit);$no=1;
$baris=1;
$no=1;
while($tampil=mysql_fetch_array($query)){ 

?>

     <tr>
        

           

          <td><?php echo $no ?></td>
          <td><?php echo $tampil['no_peminjaman'] ?></td>
          <td><?php echo $tampil['nama'] ?></td>
          <td><?php echo $tampil['tgl_pinjam'] ?></td>
          <td><?php echo $tampil['tgl_kembali'] ?></td>

          

    

<?php
$no++;
}

?>
<table width="65%" border="0" align="center" cellpadding="3" cellspacing="1" bgcolor="#FFFFFF" >
<tr>
<td width="65%" bgcolor="#FFFFFF">
							  
	  <p align="center"><br/>
    </td><td width="65%" bgcolor="#FFFFFF"><div align="center"> <?php $tgl = date('d M Y');
echo "Padang, $tgl";?><br/>
  <br/><br/>
								
								  Kepala Perpustakaan<br/>
								  
								  
								  </div></td>
</tr></table>

