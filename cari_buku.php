<?php  
	if(isset($_GET['q']) && $_GET['q']){  
	    $conn = mysql_connect("localhost", "root", "");  
	    mysql_select_db("pustaka_smk");  
	    $q = $_GET['q'];  
	    $sql = "select * from data_buku where isbn like '%$q%' ";  
    $result = mysql_query($sql);  
	    if(mysql_num_rows($result) > 0){  
	        ?>  
			<?php  
    }else{  
	        echo 'Data not found!';  
	    }  
	}  
	$no=1;
	?>  
			<?php  
	            while($r = mysql_fetch_array($result)){?> 
			<?php 
			$edit=mysql_query("SELECT * FROM trans_pinjam WHERE id_trans='$_GET[id]'");
    $re=mysql_fetch_array($edit);
echo "<h4>Masukkan Data Buku</h4>
	<hr><br>
          <form method=POST action=./aksi.php?module=buku&act=cari>
		  
          <input type=hidden name=id value='$re[id_trans]'>
          <table class='table table-bordered table-striped'>
          
		  <tr><td>Kode Buku </td>   <td> : <input type=text name='kode' value='$r[isbn]' size=15></td></tr>
		   <tr><td>Judul</td>   <td> : <input type=text name='judul' value='$r[judul]' size=15></td></tr>
		   <tr><td>Pengarang</td>   <td> : <input type=text name='pengarang' value='$r[pengarang]' size=15></td></tr>
          <tr><td colspan=2><input type=submit value=Update class='btn btn-primary'>
                            <input type=button value=Batal onclick=self.history.back() class='btn btn-warning'></td></tr>
          </table></form>";
		  ?>
	          
	          
      
  <?php }?>  