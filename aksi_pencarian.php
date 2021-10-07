<?php 
session_start();

?>
	<?php  
	include"conn.php";
	if(isset($_GET['q']) && $_GET['q']){  
	   
	    $q = $_GET['q'];  
	    $sql = "select * from data_buku where judul like '%$q%' ";  
    $result = mysql_query($sql);  
	    if(mysql_num_rows($result) > 0){  
	        ?>  <?php include "tampil.php";?>
        <?php  
    }else{  
	        echo 'Data not found!';  
	    }  
	}  
	?>  
