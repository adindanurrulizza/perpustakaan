
<h4>Data Pengembalian</h4>
<input type=button value='Tambah Data Pengembalian' onclick=location.href='media.php?module=pengembalian&aksi=tampil' class='btn btn-primary'></br></br>
<center><div style='overflow:auto;height:400px;width:950;padding:0px;margin-bottom:0px'>  
<table id='tabel' class='table table-bordered table-striped'>
<tr  align='center'>

					<thead>
<tr>
<th>No</th>
<th>Id Pengembalian</th>
<th>Id Peminjaman</th>
<th>Tanggal Pengembalian</th>
<th>Denda</th>
<th>Aksi</th>


</tr>
</thead>

<?php
$cri=$_POST['cri'];
include "koneksi/koneksi.php";
$sql_limit = "SELECT * from pengembalian 	 ";
$query=mysql_query($sql_limit);$no=1;
$baris=1;
$no=1;
while($tampil=mysql_fetch_array($query)){ 

?>

     <tr>
        

           

          <td><?php echo $no ?></td>
          <td>PG0000000<?php echo $tampil['id'] ?></td>
          <td><?php echo $tampil['no_peminjaman'] ?></td>
       
          <td><?php echo $tampil['tgl_pengembalian'] ?></td>
          <td><?php echo $tampil['denda'] ?></td>
		  <td><a href='laporan_kembali.php?id=<?php echo $tampil[id]?>' target="_blank"  ><img src='./images/printer.png' width=25></img></a>
      

          

    

<?php
$no++;
}
?>
</table>
