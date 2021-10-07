
<h4>Data Peminjaman</h4>
<input type=button value='Tambah Data Peminjaman' onclick=location.href='media.php?module=peminjaman&aksi=tampil' class='btn btn-primary'></br></br>
<center><div style='overflow:auto;height:400px;width:950;padding:0px;margin-bottom:0px'>  
<table id='tabel' class='table table-bordered table-striped'>
<tr  align='center'>

					<thead>
<tr>
<th>No</th>
<th>Nomor Peminjaman</th>
<th>Nomor Anggota</th>
<th>Kode Buku</th>
<th>Buku</th>
<th>Tanggal Pinjam</th>
<th>Tanggal Kembali</th>
<th>Status</th>
<th>Aksi</th>

</tr>
</thead>

<?php
$cri=$_POST['cri'];
include "koneksi/koneksi.php";
$sql_limit = "SELECT * from peminjaman 	 ";
$query=mysql_query($sql_limit);$no=1;
$baris=1;
$no=1;
while($tampil=mysql_fetch_array($query)){ 

?>

     <tr>
        

           

          <td><?php echo $no ?></td>
          <td><?php echo $tampil['no_peminjaman'] ?></td>
          <td><?php echo $tampil['no_agt'] ?></td>
       
          <td><?php echo $tampil['kode_buku'] ?></td>
          <td><?php echo $tampil['buku'] ?></td>
          <td><?php echo $tampil['tgl_pinjam'] ?></td>
          <td><?php echo $tampil['tgl_kembali'] ?></td>
          <td><?php echo $tampil['status'] ?></td>
		   <td><a href='laporan_peminjaman.php?id=<?php echo $tampil[no_peminjaman]?>' target="_blank" ><img src='./images/printer.png' width=25></img></a>
      

          

    

<?php
$no++;
}
?>
</table>
