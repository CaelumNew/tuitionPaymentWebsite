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
		
		$sql = mysql_query("INSERT INTO prodi VALUES('$idprodi','$prodi')");
		
		if($sql > 0){
			header('Location: ./admin.php?hlm=master&sub=jurusan');
			die();
		} else {
			echo 'ada ERROR dg query';
		}
	} else {
?>
<h2><b>Tambah Program Studi</b></h2>
<hr>
<form method="post" action="admin.php?hlm=master&sub=jurusan&aksi=baru" class="form-horizontal" role="form">
	<div class="form-group">
		<label for="idprodi" class="col-sm-2 control-label">Kode Prodi</label>
		<div class="col-sm-2">
			<input type="text" class="form-control" id="idprodi" name="idprodi" placeholder="Kode Prodi" required autofocus>
		</div>
	</div>
	<div class="form-group">
		<label for="prodi" class="col-sm-2 control-label">Nama Prodi</label>
		<div class="col-sm-4">
			<input type="text" class="form-control" id="prodi" name="prodi" placeholder="Nama Prodi" required>
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