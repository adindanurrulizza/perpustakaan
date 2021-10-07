

<?php
//buat konkesi
include "../../koneksi/koneksi.php";


//pencarian nama
$key=str_replace("'", "''",$_GET['no_induk_buku']);
$tampil=str_replace("''", "'",$key);
echo "<font face=verdana size=2px>Yang Anda cari adalah : </font>".$tampil;
$result=mysql_query("select * from buku where no_induk_buku like '%$key%' or call_number_1 like '%$key%' or call_number_2 like '%$key%' or call_number_3 like '%$key%' or pengarang like '%$key%' or penerbit like '%$key%' or kota_terbit like '%$key%' or judul like '%$key%' or tajuk_subjek like '%$key%' order by no_induk_buku",$con); 
$get_pages=mysql_num_rows($result);

if ($get_pages){
	?>
		<center><table border='1' id='tabel' style='width:900; font-size:11px;'>
		<tr bgcolor='#999999' style="color:#003" align='center'>
			<td width='100'>No Induk</td>
          <!-- <td width='10%' colspan=3>Call Number</td>
            <td width='10%'>Tajuk</td>-->
			<td width='150'>Pengarang</td>
			<td width='300'>Judul</td>
			<td width='120'>Lokasi Rak</td>
			<td width='120'>Penerbit</td>
			<!-- <td width='10%'>Kota</td>-->
			<td width='45'>Stok</td>
		</tr>
	<?php

	$no=1;
$baris=1;
function hightlight($str, $keywords = '')
{
$keywords = preg_replace('/\s\s+/', ' ', strip_tags(trim($keywords))); // filter

$style = 'highlight';
$style_i = 'highlight_important';

/* Apply Style */

$var = '';

foreach(explode(' ', $keywords) as $keyword)
{
$replacement = "<span class='".$style."'>".$keyword."</span>";
$var .= $replacement." ";

$str = str_ireplace($keyword, $replacement, $str);
}
$str = str_ireplace(rtrim($var), "<span class='".$style_i."'>".$keywords."</span>", $str);
return $str;
}
	while ($tampil=mysql_fetch_array($result)){
	if($baris%2==0)
{
echo "<tr bgcolor=\"#d9e2da\">"; 
}
else 
{
echo "<tr bgcolor=\"#FFFFFF\">"; 
}
echo"<td>".hightlight($tampil['no_induk_buku'],$key)."</td>";
//echo"<td>".hightlight($tampil['call_number_1'],$key)."</td><td>".hightlight($tampil['call_number_2'],$key)."</td><td>".hightlight($tampil['call_number_3'],$key)."</td>";
//echo"<td>".hightlight($tampil['tajuk_subjek'],$key)."</td>";
echo"<td>".hightlight($tampil['pengarang'],$key)."</td>";
echo"<td>".hightlight($tampil['judul'],$key)."</td>";
echo"<td>".hightlight($tampil['lokasirak'],$key)."</td>";
echo"<td>".hightlight($tampil['penerbit'],$key)."</td>";
//echo"<td>".hightlight($tampil['kota_terbit'],$key)."</td>";
echo"<td align='center'>".hightlight($tampil['jumlah_eksemplar'],$key)."</td>";
$no++;
$baris++;}
echo"</tr>";
echo"</table></center>";
	
	
	?></TABLE>
		<?php
}else{
	?><br /><b>Belum ada data!!</b><?php
}
?>