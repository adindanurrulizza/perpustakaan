<form name="ctk" method="POST" action="laporan_kategori.php" target="_blank"/>
<td><label>Pilih Kategori</label></td>

<td>
<select name="idk">
<option value=0 selected>-Pilih ID Kategori-</option>
<?php

$kon=mysqli_connect("localhost","root","","db_perpustakaan");
$sqlKategori	= "select * from kategori order by id_ketegori";
$result	= mysql_query($sqlKategori);
while($dataKategori = mysql_fetch_array($result))
{
echo "<option value=$dataKategori[id_ketegori]>$dataKategori[id_ketegori]-$dataKategori[nm_kategori]</option>";
}
?>
</select>
<br>
<input type="submit" value="Cetak" class='btn btn-primary'/>