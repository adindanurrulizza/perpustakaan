<?php   
    mysql_connect("localhost","root","");   
    mysql_select_db("pustaka_smk");  
    ?>
<title>Combobox</title>

<p></p>
    <table width="451" border="0" align="left">
      <tr>
        <td width="118">No Induk</td>
        <td width="323"><select name="induk" id="induk" onchange="changeValue(this.value)" >
        <option value=0>-Pilih-</option>
        <?php
    $result = mysql_query("select * from anggota");   
    $jsArray = "var dtMhs = new Array();\n";       
    while ($row = mysql_fetch_array($result)) {   
        echo '<option value="' . $row['induk'] . '">' . $row['induk'] . '</option>';   
        $jsArray .= "dtMhs['" . $row['induk'] . "'] = {Nama:'" . addslashes($row['nama_lengkap']) . "',Status:'".addslashes($row['status'])."'};\n";   
    }     
    ?>   
        </select></td>
      </tr>
      <tr>
        <td>Nama</td>
        <td><input type="text" name="nm" id="nm"/></td>
      </tr>
      <tr>
        <td>Status</td>
        <td><input type="text" name="jrsn" id="jrsn"/></td>
      </tr>
</table>
      <script type="text/javascript">   
    <?php echo $jsArray; ?> 
    function changeValue(induk){ 
    document.getElementById('nm').value = dtMhs[induk].Nama; 
    document.getElementById('jrsn').value = dtMhs[induk].Status; 
    }; 
    </script> 
	
	