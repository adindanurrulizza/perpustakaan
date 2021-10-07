
<form class='form-horizontal' action='simpan-formulir.html' method='POST' onSubmit='return valid()' method='POST' id='registerHere' enctype='multipart/form-data'>
	  <fieldset>
	  <div class='alert alert-info'>Selamat Datang di Perpustakaan Amanah Masjid Muhammadiyah</div>
		<div class='alert alert-alert'>
			<button type='button' class='close' data-dismiss='alert'>&times;</button>
			Silakan masukkan data kunjungan Anda, sebelum masuk ke perpustakaan. Terima kasih ... 
		</div><br/>
	    <div class='control-group'>
	      <label class='control-label' for='input01'>Nama</label>
	      <div class='controls'>
	        <input name='nama' type='text' class='required' id="x_username" size="" data-field="x_username">      
	      </div>
	</div>
	<div class='control-group'>
		<label class='control-label' for='input01'>Jenis Kelamin </label>
	      <div class='controls'>
	        <select name='jk' id='jk' >
            				<option value=''>- Jenis Kelamin -</option>
			                <option value='L'>Laki-laki</option>
			                <option value='P'>Perempuan</option>
			
			               
            </select>     
	      </div>
	</div>
	 
	<div class='control-group'>
		<label class='control-label' for='input01'>Keperluan</label>
	      <div class='controls'>
	        <select name='perlu' id='perlu' >
            				<option value=''>- Keperluan -</option>
			                <option value='Baca Buku'>Baca Buku</option>
			                <option value='Pinjam Buku'>Pinjam Buku</option>
							 <option value='Kembalikan Buku'>Kembalikan Buku</option>
							  <option value='Baca Koran'>Baca Koran</option>
							   <option value='Lainnya'>Lainnya</option>
			
			               
            </select>     
	      </div>
	</div>
	<div class='control-group'>
		<label class='control-label' for='input01'>Saran & Kritik</label>
      <div class='controls'>
	          
          
	            <textarea name="saran"></textarea>
            
          </div>
	</div>
		
	<div class='control-group'>
		<label class='control-label' for='input01'></label>
	      <div class='controls'>
	       <button type='submit' class='btn btn-success' rel='tooltip' title='first tooltip'>Simpan</button>
	       
	      </div>
	
	</div> 
</fieldset>
	</form>