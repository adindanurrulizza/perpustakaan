<?php
error_reporting(0);
include "config/koneksi.php";
$pass=$_POST[password];
$level=$_POST[level];
$username = $_POST[id_user];
if ($level=='admin')
{
$login=mysql_query("SELECT * FROM rb_login
			WHERE username='".mysql_real_escape_string($username)."' AND password='$pass'");
$cocok=mysql_num_rows($login);
$r=mysql_fetch_array($login);

if ($cocok > 0){
	session_start();
	$_SESSION[id_user]     = $r[id_user];
	$_SESSION[namauser]     = $r[username];
	$_SESSION[email]    	= $r[email];
  	$_SESSION[namalengkap]  = $r[nama_lengkap];
  	$_SESSION[passuser]     = $r[password];
  	$_SESSION[leveluser]    = $r[level];

	header('location:http://localhost/saw/');
	}
else {
echo "<script>window.alert('Username atau Password anda salah.');
				window.location='administrator.php'</script>";
	}
}

else if ($level=='members'){
$login=mysql_query("SELECT * FROM rb_login
			WHERE username='".mysql_real_escape_string($username)."' AND password='$pass'");
$cocok=mysql_num_rows($login);
$r=mysql_fetch_array($login);

if ($cocok > 0){
	session_start();
	$_SESSION[user]     = $r[username];
	$_SESSION[passuser]     = $r[password];
  	$_SESSION[namalengkap]  = $r[nama_lengkap];
  	$_SESSION[leveluser]    = $r[level];

	header('location:http:media.php?module=utama');
	}
else {
echo "<script>window.alert('Username atau Password anda salah.');
				window.location='login.html'</script>";
	}
}

?>
