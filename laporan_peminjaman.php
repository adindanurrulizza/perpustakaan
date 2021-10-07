<body onLoad="javascript:print()"> 
<div class="panel panel-default">
<h2 align="center">Perpustakaan Amanah Masjid Muhammadiyah</h2> 
<h4 align="center">Bukti Peminjaman Buku</h5> 

<table  align="center"  width="53%">
<?php
$id=$_GET['id'];
include "koneksi/koneksi.php";
$sql_limit = "SELECT * FROM  peminjaman,anggota WHERE peminjaman.no_peminjaman='".$id."' and anggota.no_agt=peminjaman.no_agt";
$query=mysql_query($sql_limit);$no=1;
$baris=1;
$tampi1=mysql_fetch_array($query);

?>

    
<tr>
           <td>ID Peminjaman  :<?php echo $tampi1['no_peminjaman'] ?></td>
		  <td width="35%">&nbsp;</td>
		  </tr>
<tr>
          <td>No Anggota :<?php echo $tampi1['no_agt'] ?></td>
		  <td width="35%">Tanggal Peminjaman :<?php echo $tampi1['tgl_pinjam'] ?></td>
		 
</tr>
		  
		  <tr>
          <td>Nama Anggota :<?php echo $tampi1['nama'] ?></td>
		 <td width="35%">Tanggal Harus Kembali :<?php echo $tampi1['tgl_kembali'] ?></td>
            
		  	 
        </tr>
		
           
        

         
  


</table>




<table border="1" align="center"  width="53%">


					<thead>
<tr>
<th>No</th>
<th>No Buku</th>
<th>Judul Buku</th>
<th>Pengarang</th>
<th>Penerbit</th>
</tr>
</thead>

<?php
$id=$_GET['id'];
include "koneksi/koneksi.php";
$sql_limit = "SELECT peminjaman.no_peminjaman, buku.no_induk_buku, judul, pengarang, penerbit
FROM peminjaman, buku
WHERE peminjaman.no_peminjaman = '".$id."'
AND peminjaman.kode_buku = buku.no_induk_buku";
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
       
     
          

          

    

<?php
$no++;
}
?>
</table>

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

