<form name="ctk" method="POST" action="laporan_p_buku.php" target="_blank"/>
<td><label>Pilih ID Buku</label></td>

<td>
<select name="idk">
<option value=0 selected>-Pilih ID Buku-</option>
<?php

$kon=mysqli_connect("localhost","root","","db_perpustakaan");
$sqlKategori	= "select * from buku order by  	no_induk_buku";
$result	= mysql_query($sqlKategori);
while($dataKategori = mysql_fetch_array($result))
{
echo "<option value=$dataKategori[no_induk_buku]>$dataKategori[no_induk_buku]</option>";
}
?>
</select>
<br>
<input type="submit" value="Cetak" class='btn btn-primary'/>