<?php
if( empty( $_SESSION['iduser'] ) ){
	//session_destroy();
	$_SESSION['err'] = '<strong>ERROR!</strong> Anda harus login terlebih dahulu.';
	header('Location: ./');
	die();
} else {
	if( isset( $_REQUEST['submit'] )){
		$idprodi = $_REQUEST['idprodi'];
		$sql = mysql_query("DELETE FROM prodi WHERE idprodi='$idprodi'");
		if($sql > 0){
			header('Location: ./admin.php?hlm=master&sub=jurusan');
			die();
		} else {
			echo 'ada ERROR dengan query';
		}
	} else {
		$idprodi = $_REQUEST['idprodi'];
		$sql = mysql_query("SELECT * FROM prodi WHERE idprodi='$idprodi'");
		list($idprodi,$prodi) = mysql_fetch_array($sql);
		
		echo '<div class="alert alert-danger">Yakin akan menghapus Program Studi: <strong>'.$prodi.' ('.$idprodi.')</strong><br><br>';
		echo '<a href="./admin.php?hlm=master&sub=jurusan&aksi=hapus&submit=ya&idprodi='.$idprodi.'" class="btn btn-sm btn-success">Ya, Hapus</a> ';
		echo '<a href="./admin.php?hlm=master&sub=jurusan" class="btn btn-sm btn-default">Tidak</a>';
		echo '</div>';
	}
}
?>