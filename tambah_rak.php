	

<form class='form-horizontal' action='input_rak.php' method='POST'  enctype='multipart/form-data'>
	  <fieldset>
		<div class='alert alert-alert'>
			<button type='button' class='close' data-dismiss='alert'>&times;</button>
			Silahkan Mengisi Data pada Form di bawah ini dengan baik dan benar.
		</div><br/>
		 <div class='control-group'>
	      <label class='control-label' for='input01'>Kode Rak</label>
	      <div class='controls'>
	        <input type='text' data-field="x_username" id="x_username" name='kode' class='required'>      
	      </div>
	</div>
	
	  <div class='control-group'>
	      <label class='control-label' for='input01'>Nama Rak</label>
	      <div class='controls'>
	        <input type='text' data-field="x_username" id="x_username" name='nama' class='required'>      
	      </div>
	</div>
	
	  <div class='control-group'>
	      <label class='control-label' for='input01'>Kategori</label>
	      <div class='controls'>
	       <select name="kategori" id="kategori" onchange="changeValue(this.value)" >
        <option value=0>-Pilih-</option>
        <?php
    $result = mysql_query("select * from kategori");   
    $jsArray1 = "var dtMhs = new Array();\n";       
    while ($row = mysql_fetch_array($result)) {   
        echo '<option value="' . $row['nm_kategori'] . '">' . $row['nm_kategori'] . '</option>';   
        
    }     
    ?>   
        </select>     
	      </div>
	</div>
	
	
		
		
	
	 
	 
	 
	<div class='control-group'>
		<label class='control-label' for='input01'></label>
	      <div class='controls'>
	       <button type='submit' name="simpan" class='btn btn-success' rel='tooltip' title='first tooltip'>Simpan</button>
	       
	      </div>
	
	</div> 
</fieldset>
	</form>