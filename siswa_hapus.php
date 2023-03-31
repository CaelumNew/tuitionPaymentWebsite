<?php
error_reporting(0);
if( empty( $_SESSION['iduser'] ) ){
	//session_destroy();
	$_SESSION['err'] = '<strong>ERROR!</strong> Anda harus login terlebih dahulu.';
	header('Location: ./');
	die();
} else {
	if( isset( $_REQUEST['submit'] )){
		$nis = $_REQUEST['nis'];
		$sql = mysql_query("DELETE FROM siswa WHERE nis='$nis'");
		if($sql > 0){
			header('Location: ./admin.php?hlm=master&sub=siswa');
			die();
		} else {
			echo 'ada ERROR dengan query';
		}
	} else {
		$nis = $_REQUEST['nis'];
		$sql = mysql_query("SELECT * FROM siswa WHERE nis='$nis'");
		list($nis,$siswa,$idprodi) = mysql_fetch_array($sql);
		
		echo '<div class="alert alert-danger">Yakin akan menghapus Siswa:';
		echo '<br>Nama  : <strong>'.$siswa.'</strong>';
		echo '<br>NIS   : '.$nis;
		
		$qprodi = mysql_query("SELECT prodi FROM prodi WHERE idprodi='$idprodi'");
		list($prodi) = mysql_fetch_array($qprodi);
		
		echo '<br>Prodi : '.$prodi.' ('.$idprodi.')<br><br>';
		echo '<a href="./admin.php?hlm=master&sub=siswa&aksi=hapus&submit=ya&nis='.$nis.'" class="btn btn-sm btn-success">Ya, Hapus</a> ';
		echo '<a href="./admin.php?hlm=master&sub=siswa" class="btn btn-sm btn-default">Tidak</a>';
		echo '</div>';
	}
}
?>