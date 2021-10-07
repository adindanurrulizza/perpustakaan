<table>

<td></td>

<?php
	$host = "localhost";
	$user = "root";
	$pass = "";
	$db   = "db_perpustakaan";
	
	$koneksi = mysql_connect($host, $user, $pass);
	$koneksi_db = mysql_select_db($db, $koneksi);
	
?>

</tabl
><table width="56%" border="0">
  <tr>
    <td width="30%">Kategori</td>
    <td><?php
	  	$sqlfakultas = mysql_query("select * from kategori");
          echo"<form action='media.php?module=view_cari&aksi=tampil' method='POST'>";
		echo"<select name='nm_ketegori' id='select' >";
		echo"<option value='0'></option>";
		while($rfakultas = mysql_fetch_array($sqlfakultas)){
			if($rfakultas['id_ketegori']==$_POST['nm_ketegori']){
			echo"<option value='$rfakultas[id_ketegori]' selected>$rfakultas[nm_kategori]</option>";
		}else {
			echo"<option value='$rfakultas[id_ketegori]'>$rfakultas[nm_kategori]</option>";
			}
		}
		echo"</select>";
	  ?> <input name="petugas" type="submit" value=" Tampilkan " /></form></td>
  </tr>
  <tr>
    <td width="30%">Sub Kategori</td>
    <td><label for="namajurusan3"><form name="dd" action="media.php?module=view_cari&aksi=tampil" method="POST"/>
	 <?php
	  	$sqlkelas = mysql_query("select * from subkategori where id_ketegori='$_POST[nm_ketegori]'");
		echo"<select name='idkelas' id='select'>";
		echo"<option value='0'></option>";
		while($rkelas = mysql_fetch_array($sqlkelas)){
		
			if($rkelas['id_sub_kategori']==$_POST['idkelas']){
			echo"<option value='$rkelas[id_sub_kategori]' selected>$rkelas[nm_sub]</option>";
		}else {
			echo"<option value='$rkelas[id_sub_kategori]'>$rkelas[nm_sub]</option>";
			}
		}
		echo"</select>";
	  ?>
      <input name="pasien" type="submit" value=" Tampilkan " />
</form>
    </label></td>
  </tr>


<tr>





<form name="dd" action="media.php?module=view_cari&aksi=tampil" method="POST"/>
<td>Pencarian</td><td><input id="nn1" type="text" name="cri" />  <input name="karyawan" type="submit" value=" Tampilkan " /></td>
</table>

<table border="1"  class='table table-bordered table-striped'>

					<thead>
<tr>
<th>No</th>
<th>Kode Buku</th>
<th>Nama</th>
<th>Pengarang</th>
<th>Penerbit</th>
<th>Sinopsis</th>
<th>Jumlah</th>
<th>Rak</th>

</tr>
</thead>

<?php


include "koneksi/koneksi.php";
if($_POST["pasien"]){
			
				$cri=$_POST['idkelas'];

			$sql_limit = "SELECT * from buku  where id_sub_kategori like '$cri%' ";
$query=mysql_query($sql_limit);

}else if($_POST["petugas"]){
	$cri=$_POST['nm_ketegori'];
		$sql_limit = "SELECT * from buku  where id_ketegori like '$cri%' ";
$query=mysql_query($sql_limit);

	}else if($_POST["karyawan"]){
	$cri=$_POST['cri'];
		$sql_limit = "SELECT * from buku  where judul like '$cri%' or no_induk_buku like '$cri%' or pengarang like '$cri%' or penerbit like '$cri%' or sinopsis like '$cri%' ";
$query=mysql_query($sql_limit);
	}else {
	$sql_limit = "SELECT * from buku  ";
$query=mysql_query($sql_limit);
	
	}

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
          <td><?php echo $tampil['sinopsis'] ?></td>
          <td><?php echo $tampil['jumlah_buku'] ?></td>
          <td><?php echo $tampil['lokasirak'] ?></td>

          

    

<?php
$no++;
}
?>
</table>
