<?php
if( empty( $_SESSION['iduser'] ) ){
	//session_destroy();
	$_SESSION['err'] = '<strong>ERROR!</strong> Anda harus login terlebih dahulu.';
	header('Location: ./');
	die();
} else {
	if( isset( $_REQUEST['aksi'] )){
		$aksi = $_REQUEST['aksi'];
		
		if($aksi == 'view'){
			//menampilkan daftar siswa dalam kelas
			include 'kelas_baru.php';
		}
		if($aksi == 'hapus'){
			//menghapus kelas beserta siswa yg ada di dalamnya
			include 'kelas_hapus.php';
		}
		
	} else {
		$sql = mysql_query("SELECT * FROM kelas ORDER BY id_kelas");
		echo '<h2><b>Daftar Kelas</b></h2><hr>';
      echo '<div class="row">';
		echo '<div class="col-md-9"><table class="table table-bordered">';
		echo '<tr class="success"><th>No</th><th width="100">Kelas</th><th>Tahun Pelajaran</th><th>Nis</th>';
		echo '<th width="200"><a href="./admin.php?hlm=master&sub=kelas&aksi=view" class="btn btn-default btn-xs">Tambah Data</a></th></tr>';
		
		if( mysql_num_rows($sql) > 0 ){
			$no = 1;
			while(list($id_kelas,$th_pelajaran,$nis) = mysql_fetch_array($sql)){
				echo '<tr><td>'.$no.'</td>';
				echo '<td>'.$id_kelas.'</td>';
				echo '<td>'.$th_pelajaran.'</td>';
				echo '<td>'.$nis.'</td>';
				echo '<td><a href="./admin.php?hlm=master&sub=kelas&aksi=hapus&nis='.$nis.'" class="btn btn-danger btn-xs">Hapus</a></td>';
				echo '</tr>';
				$no++;
			}
		} else {
			echo '<tr><td colspan="5"><em>Belum ada data</em></td></tr>';
		}
		
		echo '</table></div></div>';
	}
}
?>