<body onLoad="javascript:print()"> 
<div class="panel panel-default">
<h2 align="center">Perpustakaan Amanah Masjid Muhammadiyah</h2> 
<h4 align="center">Laporan Data Pengembalian Buku</h5> 


<table border="1" align="center"  width="53%">
					<thead>
<tr>

<th>No</th>
<th>Id Kembali</th>
<th>Id Pinjaman</th>
<th>Nama Anggota</th>
<th>Judul Buku</th>
<th>Tanggal Pinjam</th>
<th>Tanggal Harus Kembali</th>
<th>Tanggal Dikembalikan</th>
<th>Denda</th>

</tr>
</thead>

<?php
$idk=$_POST['idk'];
include "koneksi/koneksi.php";
$sql_limit = "select peminjaman.no_peminjaman,tgl_pinjam,tgl_kembali,anggota.no_agt,nama,buku.no_induk_buku,judul,pengarang
from peminjaman,anggota,buku
where anggota.no_agt='".$idk."' and  peminjaman.no_agt=anggota.no_agt and peminjaman.kode_buku=buku.no_induk_buku order by anggota.no_agt ";
$query=mysql_query($sql_limit);$no=1;
$baris=1;
$no=1;
while($tampil=mysql_fetch_array($query)){ 

?>

     <tr>
        

           

          <td><?php echo $no ?></td>
          <td><?php echo $tampil['no_peminjaman'] ?></td>
          <td><?php echo $tampil['no_induk_buku'] ?></td>
          <td><?php echo $tampil['judul'] ?></td>
          <td><?php echo $tampil['pengarang'] ?></td>
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

