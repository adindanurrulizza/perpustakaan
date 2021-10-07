<body onLoad="javascript:print()"> 
<div class="panel panel-default">
<h2 align="center">Perpustakaan Amanah Masjid Muhammadiyah</h2> 
<h4 align="center">Laporan Buku Per Kategori</h5> 
<table  align="center"  width="53%">
<?php
$idk=$_POST['idk'];
include "koneksi/koneksi.php";
$sql_limit = "SELECT * FROM  kategori WHERE id_ketegori='".$idk."' ";
$query=mysql_query($sql_limit);$no=1;
$baris=1;
$tampi=mysql_fetch_array($query);

?>

    

          

          <td>Id Kategori :<?php echo $tampi['id_ketegori'] ?>
          <td width="35%">Nama Kategori :<?php echo $tampi['nm_kategori'] ?>

         
  


</table>

<table border="1" align="center"  width="53%">
					<thead>
<tr>
<th>No</th>
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
include "koneksi/koneksi.php";
$sql_limit = "SELECT buku.no_induk_buku,judul,pengarang,penerbit,tahun_terbit,lokasirak,jumlah_buku,kategori.id_ketegori, nm_kategori,
subkategori.id_sub_kategori,nm_sub
FROM buku, kategori,subkategori
WHERE  kategori.id_ketegori='".$idk."' and   buku.id_ketegori = kategori.id_ketegori and 
buku.id_sub_kategori= subkategori.id_sub_kategori";
$query=mysql_query($sql_limit);$no=0;
$baris=1;
while($tampil=mysql_fetch_array($query)){ 
$no++;
?>

     <tr>
        

           </p>
<td><?php echo $no ?></td>
          <td><?php echo $tampil['nm_sub'] ?></td>
          <td><?php echo $tampil['judul'] ?></td>

          <td><?php echo $tampil['pengarang'] ?></td>
          <td><?php echo $tampil['penerbit'] ?></td>
          <td><?php echo $tampil['tahun_terbit'] ?></td>
		  <td><?php echo $tampil['jumlah_buku'] ?></td>
          <td><?php echo $tampil['lokasirak'] ?></td>

    

<?php
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

