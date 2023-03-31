<?php
if( empty( $_SESSION['iduser'] ) ){
	//session_destroy();
	$_SESSION['err'] = '<strong>ERROR!</strong> Anda harus login terlebih dahulu.';
	header('Location: ./');
	die();
} else {
	if( isset( $_REQUEST['submit'] )){
		$idprodi = $_REQUEST['idprodi'];
		$prodi = $_REQUEST['prodi'];
		
		$sql = mysql_query("UPDATE prodi SET prodi='$prodi' WHERE idprodi='$idprodi'");
		
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
?>
<h2><b>Edit Program Studi</b></h2>
<hr>
<form method="post" action="admin.php?hlm=master&sub=jurusan&aksi=edit" class="form-horizontal" role="form">
	<div class="form-group">
		<label for="idprodi" class="col-sm-2 control-label">Kode Prodi</label>
		<div class="col-sm-2">
			<input type="text" class="form-control" id="idprodi" name="idprodi" value="<?php echo $idprodi; ?>" readonly>
		</div>
	</div>
	<div class="form-group">
		<label for="prodi" class="col-sm-2 control-label">Nama Prodi</label>
		<div class="col-sm-4">
			<input type="text" class="form-control" id="prodi" name="prodi" value="<?php echo $prodi; ?>">
		</div>
	</div>
	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
			<button type="submit" name="submit" class="btn btn-success">Simpan</button>
			<a href="./admin.php?hlm=master&sub=jurusan" class="btn btn-link">Batal</a>
		</div>
	</div>
</form>
<?php
	}
}
?>