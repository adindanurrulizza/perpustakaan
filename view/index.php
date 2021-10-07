<?php 
ob_start();
session_start();
error_reporting(0);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Perpustakaan Amanah</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="Perpustakaan">
	<link href="view/css/bootstrap.min.css" rel="stylesheet">
	<link href="view/css/bootstrap-responsive.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="dist/sweetalert.css">
		<link rel="stylesheet" type="text/css" href="themea/twitter.css">
	<link href="view/css/style.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="javascript/autocomplete/jquery.autocomplete.css" />
	<link rel="shortcut icon" href="favicon.png">
<script type="text/javascript" src="javascript/autocomplete/jquery.js"></script>
<script type="text/javascript" src="javascript/autocomplete/jquery.autocomplete.js"></script>
<script type="text/javascript" src="plugin/Charts/jquery.fusioncharts.js" ></script>
<script language="javascript" src="modul/anggota/tampil.js"></script>
<script language="javascript" src="modul/peminjaman/ajax.js"></script>
<script language="javascript" src="modul/pencarian/caribuku.js"></script>
<script language="javascript" src="modul/pencarian/caripeminjaman.js"></script>
<script language="javascript" src="modul/pencarian/carianggota.js"></script>
	<script type="text/javascript" src="view/js/ga.js"></script>
	<script type="text/javascript" src="view/js/jquery.min.js"></script>
	<script type="text/javascript" src="view/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="view/js/jquery.min.js"></script>
	<script type="text/javascript" src="view/js/jscript_jquery-1.6.4.js"></script>
	<script type="text/javascript" src="view/js/jquery.validate.js"></script>
	<script type="text/javascript" src="dist/sweetalert.min.js"></script>
	  <script type="text/javascript">	  
	  $(document).ready(function(){
			$('#registerHere input').hover(function()
			{
			$(this).popover('show')
		});
			$("#registerHere").validate({
				rules:{
					nama_lengkap:"required",
					email:{
							required:true,
							email: true
						},
					no_telp:{
						required:true,
						minlength: 11
					},
					gender:"required"
				},
				messages:{
					nama_lengkap:"Enter your Full Name",
					email:{
						required:"Enter your email address",
						email:"Enter valid email address"
					},
					no_telp:{
						required:"Enter your Phone Number",
						minlength:"Phone Number must be minimum 11 characters"
					},
					gender:"Select Gender"
				},
				errorClass: "help-inline",
				errorElement: "span",
				highlight:function(element, errorClass, validClass) {
					$(element).parents('.control-group').addClass('error');
				},
				unhighlight: function(element, errorClass, validClass) {
					$(element).parents('.control-group').removeClass('error');
					$(element).parents('.control-group').addClass('success');
				}
			});
		});
	  </script>
<script type="text/javascript">
$(document).ready(function()//When the dom is ready 
{
$("#email").change(function(){ 
 //if theres a change in the email textbox
//alert(hello);
var email = $("#email").val();//Get the value in the email textbox
	var regdata = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
	 if(!(regdata).test($("#email").val()))
	 {
	 //alert("hello");
	 $("#email").css('border','1px solid red');
	 $("#email").focus();
	 $("#error1").html("enter the valid emailid!");
	  return false;
	 }
    else{
	   $("#email").css('border','1px solid #7F9DB9');
	  $("#error1").html('<img src="view/img/loader.gif" align="absmiddle">&nbsp;Checking availability...'); 
	  
     $.ajax({  //Make the Ajax Request
     type: "POST",  
     url: "check.php",  //file name
     data:"email="+ email,  //data
     success: function(server_response){
	$("#error1").ajaxComplete(function(event,request){
	//alert(server_response);
	if(server_response == '0')
	{ 
	$("#error1").html('<img src="view/img/available.png" align="absmiddle"> <font color="Green"> Available, Alamat Email masih perawan. </font>  ');
	}  
	else  if(server_response == '1')
	{  
	$("#error1").html('<img src="view/img/not_available.png" align="absmiddle"><font color="red"> Alamat Email ini sudah terdaftar di sistem. </font>');
	}  
     });
   } 
   
  }); 
 }
});

});
</script>
</head>

<body>
<div style="padding-top:2%" class="container-fluid">
	<div class="row-fluid">
		<div class="span12">
		<img style="margin-bottom:2px;" alt="937x250" src="images/header.png" />
			<div class="navbar">
				<div class="navbar-inner">
					<div class="container-fluid">
						 <a data-target=".navbar-responsive-collapse" data-toggle="collapse" class="btn btn-navbar"><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></a> 
						<div class="nav-collapse collapse navbar-responsive-collapse">
							<ul class="nav">
								
								
								<?php if ($_SESSION[leveluser] == 'members'){ ?>
								<li><a href="media.php?module=utama"><i class="icon-home icon-black"></i> Home</a></li>
								<li class="dropdown">
									<a data-toggle="dropdown" class="dropdown-toggle" href="#"><i class="icon-book icon-black"></i> Data <strong class="caret"></strong></a>
									<ul class="dropdown-menu">
																				
									    
										<li><a href="media.php?module=anggota&aksi=tampil" >Data Anggota</a></li>
									
										
									</ul>
								</li>	
								
								<li><a href="media.php?module=pinjam&aksi=tampil" ><i class="icon-book icon-black"></i>Peminjaman</a></li>
										<li><a href="media.php?module=kembali&aksi=tampil" ><i class="icon-book icon-black"></i>Pengembalian</a></li>	
										
									
								<?php }elseif ($_SESSION[leveluser] == ''){ ?>
								<li><a href="./"><i class="icon-home icon-black"></i> Home</a></li>
									<li><a href="media.php?module=profil"><i class="icon-book icon-black"></i> Profil Perpustakaan</a>
									</li>
									<li><a id='wew' href="media.php?module=view_cari&aksi=tampil"><i class="icon-search icon-black"></i> Pencarian</a>
									</li>
								<?php }elseif ($_SESSION[leveluser] == 'admin'){ ?>
									<li><a href="media.php?module=utama"><i class="icon-home icon-black"></i> Home</a></li>
										<li class="dropdown">
									<a data-toggle="dropdown" class="dropdown-toggle" href="#"><i class="icon-th-large icon-black"></i> Transaksi<strong class="caret"></strong></a>
									<ul class="dropdown-menu">
																				
									     <li><a href="media.php?module=pinjam&aksi=tampil" >Peminjaman</a></li>
										<li><a href="media.php?module=kembali&aksi=tampil" >Pengembalian</a></li>
										
										
									</ul>
								</li>

								<li class="dropdown">
									<a data-toggle="dropdown" class="dropdown-toggle" href="#"><i class="icon-book icon-black"></i> Data<strong class="caret"></strong></a>
									<ul class="dropdown-menu">
																				
									    <li><a href="media.php?module=buku&aksi=tampil">Data Buku</a></li>
										<li><a href="media.php?module=rak">Data Rak</a></li>
									    <li><a href="media.php?module=kategori&aksi=tampil">Data Kategori</a></li>
									    <li><a href="media.php?module=sub&aksi=tampil">Data Sub Kategori</a></li>
										<li><a href="media.php?module=anggota&aksi=tampil" >Data Anggota</a></li>
										<li><a href="media.php?module=user">Data Petugas</a></li>
										<li><a href="media.php?module=view_cari&aksi=tampil">Katalog Buku</a></li>
																	
									</ul>
								</li>	
										<!--<li><a href="media.php?module=statistikpeminjaman&aksi=tampil#jump">
										<i class="icon-book icon-black"></i> Statistik</a></li>-->
									

									<li class="dropdown">
									<a data-toggle="dropdown" class="dropdown-toggle" href="#"><i class="icon-signal icon-black"></i> Laporan <strong class="caret"></strong></a>
									<ul class="dropdown-menu">
																				
									    <!-- <li><a href="laporan_pengunjung.php" target="_blank">Pengunjung</a></li>-->
										<li><a href="media.php?module=laporanpinjam&aksi=tampil" target="_blank">Peminjaman Buku</a></li>
										<li><a href="media.php?module=laporandenda&aksi=tampil" target="_blank">Pengembalian Buku</a></li>
										<li><a href="./modul/laporanbuku/cetak.php" target="_blank">Data Buku</a></li>
										<li><a href="media.php?module=view_lap&aksi=tampil">Buku Per Kategori</a></li>
										<li><a href="media.php?module=view_lap1&aksi=tampil">Peminjaman Per Buku</a></li>
										<li><a href="media.php?module=view1&aksi=tampil">Pengembalian Per Anggota</a></li>
										<li><a href="./modul/laporananggota/cetak.php" target="_blank">Data Anggota</a></li>
										
									<!--	<li><a href="media.php?module=laporandenda&aksi=tampil" target="_blank">Denda</a></li>-->
									</ul>
								</li>
								
								<li class="dropdown">
									<a data-toggle="dropdown" class="dropdown-toggle" href="#"><i class="icon-asterisk icon-black"></i> Pengaturan<strong class="caret"></strong></a>
									<ul class="dropdown-menu">
										<li><a href="media.php?module=tarif&aksi=tampil" >Tarif Denda per Hari</a></li>
										
										<li><a href="media.php?module=jumlah_hari&aksi=tampil">Jumlah Hari Pinjam</a></li>
									</ul>
								</li>

									
									<?php }elseif ($_SESSION[leveluser] == 'siswa'){ ?>
									
									<li><a href="media.php?module=guru"><i class="icon-th-large icon-black"></i> Pinjam Buku</a></li>
									
								<?php } ?>
								
									
									
								
								
								<?php if ($_SESSION[leveluser] == ''){ ?>
									<li><a href="login.html"><i class="icon-off icon-black"></i> Login Area</a></li>
									
							</ul>
								<?php }else{ ?>
							<ul class="nav pull-right">
								<li class="dropdown">
									<a data-toggle="dropdown" class="dropdown-toggle" href="#"><i class="icon-globe icon-black"></i> Apa Kabar, <?php echo "$_SESSION[namalengkap]"; ?> <strong class="caret"></strong></a>
									<ul class="dropdown-menu">
									    
														
										<li><a href="logout.php">Logout</a></li>
									</ul>
								</li>
							</ul>		
								<?php } ?>
						</div>
						
					</div>
				</div>
				
			</div>
			<div class="row-fluid">
				<?php
				if (isset($_GET[analisa])){
				?>
					<div class="span12">
						<?php include "content.php"; ?>
					</div>
				<?php
				}else{
				?>
					<?php if ($_SESSION[leveluser] == 'admin'){ ?>
						<?php include "content.php"; ?>
						<?php }elseif ($_SESSION[leveluser] == 'members'){ ?>
						<?php include "content.php"; ?>
					<br>
					<?php }elseif ($_SESSION[leveluser] == ''){ ?>
					<div class="span8">
						<?php include "content.php";  ?>
					</div>
					<div class="span4">
						<?php include "sidebar.php";  ?>
					</div>
				<?php } 
				}?>
			</div>
			<br><br><br>
			<center style='background:#197b30; padding:10px; color:#fff; font-size:12px; margin-bottom:3px; border-top:5px solid #000'>
			<b>Copyright (c) 2016 - Perpustakaan Amanah Masjid Muhammadiyah </b>
		</center>
		</div>
	</div>
</div>	

<!-- Modal -->
<div id="myModal1" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">Tambah Data Kriteria</h3>
  </div>
  <div class="modal-body">
	    <form class="form-horizontal" action='kriteria.html' method='POST'>
			  <div class="control-group">
			    <label class="control-label" for="inputEmail">Nama Kriteria</label>
			    <div class="controls">
			      <input type="text" class='span3' name='a' id="inputEmail" placeholder="">
			    </div>
			  </div>
			  <div class="control-group">
			    <label class="control-label" for="inputPassword">Kepentingan</label>
			    <div class="controls">
			      <input type="text" class='span1' name='b' id="inputPassword" placeholder="">
			    </div>
			  </div>
		
  </div>
  <div class="modal-footer">
    <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
    <button type='submit' name='c' class="btn btn-primary">Simpan</button>
  </div>
  </form>
</div>

<!-- Modal -->
<div id="myModal2" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">Tambah Data Alternatif</h3>
  </div>
  <div class="modal-body">
	    <form class="form-horizontal" action='alternatif.html' method='POST'>
			  <div class="control-group">
			    <label class="control-label" for="inputEmail">Nama Alternatif</label>
			    <div class="controls">
			      <input type="text" class='span3' name='a' id="inputEmail" placeholder="">
			    </div>
			  </div>
			  <div class="control-group">
			    <label class="control-label" for="inputPassword">Deskripsi</label>
			    <div class="controls">
			      <textarea name='b' rows='7' class='span3' id="inputPassword" placeholder=""></textarea> 
			    </div>
			  </div>
		
  </div>
  <div class="modal-footer">
    <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
    <button type='submit' name='c' class="btn btn-primary">Simpan</button>
  </div>
  </form>
</div>

</body>
</html>
