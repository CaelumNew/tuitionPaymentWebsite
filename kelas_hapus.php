<?php
include "koneksi.php";

$nis=$_GET['nis'];
if ($nis=="") {
echo "<script>alert('Pilih dulu data yang akan di-hapus');</script>";
} else {

$query = mysql_query("DELETE FROM kelas WHERE nis='$nis'");

If ($query) {
Echo "<script>alert('Data berhasil dihapus')</script>";
echo "<meta http-equiv='refresh' content='0; url=./admin.php?hlm=master&sub=kelas'>";
} else {
Echo "Data anda gagal dihapus. Ulangi sekali lagi";
echo "<meta http-equiv='refresh' content='0; url=./admin.php?hlm=master&sub=kelas'>";
}
}
?>
