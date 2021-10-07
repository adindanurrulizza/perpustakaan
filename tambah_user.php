<style type="text/css">
<!--
.style1 {
	font-family: "Trebuchet MS";
	font-size: 16px;
	font-weight: bold;
}
-->
</style>
	

<form class='form-horizontal' action='input_user.php' method='POST'  enctype='multipart/form-data'>
	  <fieldset>
	  <span class="style1">Tambah Petugas</span>
		<hr>
		<div class='alert alert-alert'>
			<button type='button' class='close' data-dismiss='alert'>&times;</button>
			Silahkan Mengisi Data pada Form di bawah ini dengan baik dan benar.
		</div>
		 <div class='control-group'>
	      <label class='control-label' for='input01'>ID Petugas </label>
	      <div class='controls'>
	        <input type='text' data-field="x_username" id="x_username" name='id' class='required'>      
	      </div>
	</div>
		 <div class='control-group'>
	      <label class='control-label' for='input01'>Username </label>
	      <div class='controls'>
	        <input type='text' data-field="x_username" id="x_username" name='username' class='required'>      
	      </div>
	</div>
	<div class='control-group'>
	      <label class='control-label' for='input01'>Password </label>
	      <div class='controls'>
	              <input type='password' data-field="x_username" id="x_username" name='password' class='required'> 
	      </div>
	</div>
	    <div class='control-group'>
	      <label class='control-label' for='input01'>Nama Lengkap</label>
	      <div class='controls'>
	        <input type='text' data-field="x_username" id="x_username" name='nama' class='required'>      
	      </div>
	</div>
	
	 <div class='control-group'>
		<label class='control-label' for='input01'>Jenis Kelamin</label>
		<div class='controls'>
	        <select name='jk' id='jk' >
            				<option value=''>Silahkan dipilih</option>
			                <option value='Laki-Laki'>Laki-Laki</option>
			                <option value='Perempuan'>Perempuan</option>
			
			               
            </select>  
	        <br /> <span id='error1'></span>            
       </div>
	</div>
	
	<div class='control-group'>
		
		<label class='control-label' for='input01'>Email</label>
		<div class='controls'>
	        <input type='text' class='input-xlarge' id='email' name='email' rel='popover'>    
      </div>
	</div>
	
	 
	 <div class='control-group'>
		<label class='control-label' for='input01'>No Hp</label>
		<div class='controls'>
	     <input type='text' class='input-xlarge' id='nohp' name='nohp' rel='popover'>    
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