<?php
$host	= "localhost";	//alamat server, biasanya 'localhost' atau isi dengan alamat ip server mysql anda
$user	= "root";		//defaultnya 'root', sesuaikan dg konfigurasi server anda
$pass	= "";		//kosongkan jika tidak ada
$db		= "sppku";	//isi dengan nama database

mysqli_connect($host, $user, $pass) or die( "server database tidak ditemukan!");
mysqli_select_db($db) or die( "database tidak ditemukan di server!" );
?>