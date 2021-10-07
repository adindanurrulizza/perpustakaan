<head>
  <title>E-Library SMK Bintek Purwokerto</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="Ferri">
	<link href="view/css/bootstrap.min.css" rel="stylesheet">
	<link href="view/css/bootstrap-responsive.min.css" rel="stylesheet">
	<link href="view/css/style.css" rel="stylesheet">
	<link rel="shortcut icon" href="images/favicon.ico">
	<script type="text/javascript" src="view/js/ga.js"></script>
	<script type="text/javascript" src="view/js/jquery.min.js"></script>
	<script type="text/javascript" src="view/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="view/js/jquery.min.js"></script>
	<script type="text/javascript" src="view/js/jscript_jquery-1.6.4.js"></script>
	<script type="text/javascript" src="view/js/jquery.validate.js"></script>
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

<?php include "conn.php";
include "config/tglindo.php"; ?>
<style type="text/css">

<!--
.style3 {font-size: 12px}
.style4 {font-size: 16px}
-->
</style>

<br>
<br>
<body onLoad="javascript:window:print()">
<table id='theList' border=1 width='100%' class='table table-bordered table-striped'>
<tr>
<td width="68" style="width: 18mm"><img src="images/logo_baru.png" style="width: 50px; height: 50px"></td>
<td style="" colspan="7"><div align="center" class="style4"><b>PERPUSTAKAAN SMK Bintek Purwokerto</b><br>
    Alamat : Jl. Pahlawan VI/18 Tanjung, kecamatan Purwokerto kabupaten Banyumas, Jawa Tengah</div></td>
</tr>
<tr><th width="68" bgcolor="#CCCCCC"><span class="style3">No.</span></th>
<th bgcolor="#CCCCCC"><span class="style3">Nama Lengkap</span></th>
<th bgcolor="#CCCCCC"><span class="style3">Jenis Kelamin</span></th>
<th bgcolor="#CCCCCC"><span class="style3">Status Anggota</span></th>
<th width="12%" bgcolor="#CCCCCC"><span class="style3">Keperluan</span></th>
<th width="12%" bgcolor="#CCCCCC"><span class="style3">Kritik dan Saran</span></th>
<th width="12%" bgcolor="#CCCCCC"><span class="style3">Tanggal</span></th>
</tr>
<?php
$sql = mysql_query("select * from pengunjung order by id asc");
$no=1;
while($r = mysql_fetch_array($sql)){
if($r[aktif]==1){
$status="Online";
}else{
$status="Offline";
}
?>
<tr>
<td class='td' align='center'><span class="style3"><?echo$no;?></span></td>
<td class='td' width='23%' ><span class="style3"><?echo"$r[nama]";?></span></td>
<td class='td' width='14%' ><span class="style3"><?echo"$r[jk]";?></span></td>
<td class='td' width='14%' ><span class="style3"><?echo"$r[level]";?></span></td>
<td class='td'><span class="style3"><?echo$r[keperluan];?></span></td>
<td class='td'><span class="style3"><?echo$r[saran];?></span></td>
<td class='td'><span class="style3"><?php echo" ".TanggalIndo($r[tgl_input])."";?></span></td>



<?
$no++;
}
?>
</table>

