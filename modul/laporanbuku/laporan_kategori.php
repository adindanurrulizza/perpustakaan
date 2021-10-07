<body onLoad="javascript:print()"> 
<div class="panel panel-default">
<h2 align="center">Perpustakaan Amanah Masjid Muhammadiyah</h2> 
<h4 align="center">Laporan Buku Per Kategori</h5> 

<table border="1" align="center"  width="50%">
					<thead>
<tr>
<hr width="45%"/>
<th>Sub Kategori</th>
<th>Judul Buku</th>
<th>Pengarang</th>
<th>Penerbit</th>
<th>Tahun Terbit</th>
<th>Jumlah</th>
<th>Rak</th>
</tr>
</thead>

<?php
$idk=$_POST['idk'];
include "../../koneksi/koneksi.php";
$sql_limit = "SELECT buku.no_induk_buku,judul,pengarang,penerbit,tahun_terbit,kategori.id_ketegori, nm_kategori,
subkategori.id_sub_kategori,nm_sub
FROM buku, kategori,subkategori
WHERE  kategori.id_ketegori='".$idk."' and   buku.id_ketegori = kategori.id_ketegori and 
buku.id_sub_kategori= subkategori.id_sub_kategori";
$query=mysql_query($sql_limit);$no=1;
$baris=1;

while($tampil=mysql_fetch_array($query)){ 
?>

     <tr>
        
          <td><?php echo $tampil['nm_sub'] ?></td>
          <td><?php echo $tampil['judul'] ?></td>

          <td><?php echo $tampil['pengarang'] ?></td>
          <td><?php echo $tampil['penerbit'] ?></td>
          <td><?php echo $tampil['tahun_terbit'] ?></td>
    

<?php
}


?>