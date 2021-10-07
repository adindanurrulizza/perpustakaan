<form name="ctk" method="POST" action="laporan_p_an.php" target="_blank"/>
<td><label>Pilih ID Anggota</label></td>

<td>
<select name="idk">
<option value=0 selected>-Pilih ID Anggota-</option>
<?php

$kon=mysqli_connect("localhost","root","","db_perpustakaan");
$sqlKategori	= "select * from anggota order by  	no_agt";
$result	= mysql_query($sqlKategori);
while($dataKategori = mysql_fetch_array($result))
{
echo "<option value=$dataKategori[no_agt]>$dataKategori[no_agt]</option>";
}
?>
</select>
<br>
<input type="submit" value="Cetak" class='btn btn-primary'/>