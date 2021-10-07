<body onLoad="javascript:print()"> 
<div class="panel panel-default">
<h2 align="center">Perpustakaan Amanah Masjid Muhammadiyah</h2> 
<h4 align="center">Bukti Pengembalian Buku</h5> 

<table  align="center"  width="70%">
<?php
$id=$_GET['id'];
include "koneksi/koneksi.php";
$sql_limit = "SELECT pengembalian.id,tgl_pengembalian, denda, peminjaman.no_peminjaman,tgl_pinjam,no_agt,
tgl_kembali 	 	
FROM peminjaman, pengembalian
WHERE pengembalian.id='".$id."'
AND pengembalian.no_peminjaman = peminjaman.no_peminjaman 	
 ";
$query=mysql_query($sql_limit);$no=1;
$baris=1;
$tampi1=mysql_fetch_array($query);

?>

    

          
<tr>
          <td>ID Kembali  : PG0000000<?php echo $tampi1['id'] ?></td>
		  <td width="35%">Tanggal Peminjaman :<?php echo $tampi1['tgl_pinjam'] ?></td>
	</tr>	 

		  
		  <tr>
         <td>ID Pinjam : <?php echo $tampi1['no_peminjaman'] ?></td>
		 <td>Tanggal Harus Kembali :<?php echo $tampi1['tgl_kembali'] ?></td>
		 </tr>
		 <tr>
		 
		  <td>Nama Anggota : <?php echo $tampi1['no_agt'] ?></td>
		 <td>Tanggal Dikembalikan :<?php echo $tampi1['tgl_pengembalian'] ?></td>
            
		  	 
        </tr>
           
        

         
  


</table>




<table border="1" align="center"  width="70%">


					<thead>
<tr>
<th>No</th>
<th>Nomor Buku</th>
<th>Judul Buku</th>
<th>Pengarang</th>
<th>Penerbit</th>
<th>Denda</th>
</tr>
</thead>

<?php
$id=$_GET['id'];
include "koneksi/koneksi.php";
$sql_limit = "SELECT pengembalian.id,denda,peminjaman.no_peminjaman,
buku.no_induk_buku, judul, pengarang,penerbit
FROM peminjaman,pengembalian,buku
WHERE  pengembalian.id = '".$id."'
AND pengembalian.no_peminjaman 	 =peminjaman.no_peminjaman and
peminjaman.kode_buku = buku.no_induk_buku	";
$query=mysql_query($sql_limit);$no=1;
$baris=1;
$no=1;
while($tampil=mysql_fetch_array($query)){ 

?>

     <tr>
        

           

          <td><?php echo $no ?></td>
          <td><?php echo $tampil['no_induk_buku'] ?></td>
          <td><?php echo $tampil['judul'] ?></td>
          <td><?php echo $tampil['pengarang'] ?></td>
          <td><?php echo $tampil['penerbit'] ?></td>
      
          <td><?php echo $tampil['denda'] ?></td>
       
     
          

          

    

<?php
$denda=$tampil['denda'];
$total+=$denda;
$no++;
}
?>
<tr><td colspan="5" align="right">Total :</td>
<td><?php echo "$total";?> </td></tr>
</table>

<table width="85%" border="0" align="center" cellpadding="3" cellspacing="1" bgcolor="#FFFFFF" >
<tr>
<td width="65%" bgcolor="#FFFFFF">
							  
	  <p align="center"><br/>
    </td><td width="70%" bgcolor="#FFFFFF"><div align="center"> <?php $tgl = date('d M Y');
echo "Padang, $tgl";?><br/>
  <br/><br/>
								
								 Petugas<br/>
								  
								  
								  </div></td>
</tr></table>

