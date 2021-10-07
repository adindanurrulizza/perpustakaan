<?php

$server   ="localhost" ;
$username ="root";
$password ="";
$database   ="db_perpustakaan";
$con=@mysql_connect("localhost","root","")or die ("Server Tidak Ditemukan");
$db=@mysql_select_db("db_perpustakaan") or die (mysql_error());
?>