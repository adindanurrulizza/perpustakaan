<style type="text/css">
<!--
.style1 {font-size: 18px}
-->
</style>
<?php

$edit=mysql_query("SELECT * FROM config ");
    $r=mysql_fetch_array($edit);

?>
<form name="form1" method="post" action="./aksi.php?module=setting&act=update">
<input type="hidden" name="id" value="<?php echo "$r[id]";?>">
  <table width="521" class='table table-bordered table-striped'>
    <tr>
      <td colspan="2"><div align="center" class="style1">Setting</div>        <div align="center"></div></td>
    </tr>
    <tr>
      <td width="123">Jangka Waktu Maks Peminjaman </td>
      
        <td width="386"> : <input type="text" name="jangka" value="<?php echo "$r[jangka]";?>" size="15"></td>
      </tr>
    <tr>
      <td>Denda Per Hari </td>
      <td>
        : <input type="text" name="denda" value="<?php echo "$r[denda]";?>" size="15"></tr>
    <tr>
      <td>&nbsp;</td>
      <td><label>
        <input type="submit" name="Submit" class="btn btn-info" value="Simpan">
      </label></td>
    </tr>
  </table>
</form>
