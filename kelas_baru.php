<?php
if( empty( $_SESSION['iduser'] ) ){
	//session_destroy();
	$_SESSION['err'] = '<strong>ERROR!</strong> Anda harus login terlebih dahulu.';
	header('Location: ./');
	die();
} else {
	if( isset( $_REQUEST['submit'] )){
		//variabel session ditransfer ke variabel lokal yg lebih mudah diingat penamaannya
		$submit = $_REQUEST['submit'];
		$kelas = $_REQUEST['kelas'];
		$tapel = $_REQUEST['tapel'];
		$idprodi = $_REQUEST['idprodi'];
		
		//proses simpan siswa ke dalam kelas
		if(($submit=='simpan') AND isset($_REQUEST['nis'])){
			$nis = $_REQUEST['nis'];
			$sql = mysql_query("INSERT INTO kelas VALUES('$kelas','$tapel','$nis')");
		}
		
		//proses hapus siswa dari kelas
		if(($submit=='hapus') AND isset($_REQUEST['nis'])){
			$nis = $_REQUEST['nis'];
			$qsiswa = mysql_query("DELETE FROM kelas WHERE id_kelas='$kelas' AND th_pelajaran='$tapel' AND nis='$nis'");
		}
		
		//form untuk menambahkan siswa ke dalam kelas
		echo '<div class="row">';
		echo '<div class="col-md-12">';
		echo '<h2><b>Daftar Siswa</b></h2><hr>';
		echo '<form method="post" action="admin.php?hlm=master&sub=kelas&aksi=view" class="form-inline" role="form">';
		echo '<input type="hidden" name="kelas" value="'.$kelas.'">';
		echo '<input type="hidden" name="tapel" value="'.$tapel.'">';
		echo '<input type="hidden" name="idprodi" value="'.$idprodi.'">';
		echo '<div class="form-group"><select name="nis" class="form-control">';
		//query untuk menampilkan nama2 siswa pada prodi terkait yang belum mendapatkan/masuk kelas
		$qsiswa = mysql_query("SELECT nis,nama FROM siswa WHERE idprodi='$idprodi' AND nis NOT IN (SELECT nis FROM kelas ) ORDER BY nis");
		while(list($nis,$nama)=mysql_fetch_array($qsiswa)){
			echo '<option value="'.$nis.'">'.$nis.' '.$nama.'</option>';
		}
		echo '</select></div>';
		echo ' <button type="submit" name="submit" value="simpan" class="btn btn-Success"><span class="glyphicon glyphicon-plus"></span> Tambahkan</button>';
		echo ' <a href="admin.php?hlm=master&sub=kelas" class="btn btn-link"><b>Daftar Kelas</b></a>';
		echo '</form>';
		echo '</div></div><br>';
			
		//tabel daftar siswa
		echo '<div class="row">';
		echo '<div class="col-md-9">';
		echo '<table class="table table-bordered">';
		echo '<tr><td colspan="2">Kelas</td>
				<td colspan="2">'.$kelas.'</td></tr>';
		echo '<tr><td colspan="2">Tahun Pelajaran</td>
				<td colspan="2">'.$tapel.'</td></tr>';
		echo '<tr class="success">
		<th width="20">No.</th>
			<th width="150">NIS</th>
			<th>Nama Siswa</th><th>&nbsp;</th></tr>';
		
		$qkelas = mysql_query("SELECT nis FROM kelas WHERE id_kelas='$kelas' AND th_pelajaran='$tapel'");
		if(mysql_num_rows($qkelas) > 0){
			$no=1;
			while(list($nis)=mysql_fetch_array($qkelas)){
				echo '<tr><td>'.$no.'</td>';
				echo '<td>'.$nis.'</td>';
				$qsiswa = mysql_query("SELECT nama FROM siswa WHERE nis='$nis'");
				list($siswa) = mysql_fetch_array($qsiswa);
				echo '<td>'.$siswa.'</td>';
				//button hapus siswa
				echo '<td><a href="admin.php?hlm=master&sub=kelas&aksi=view&nis='.$nis.'&kelas='.$kelas.'&tapel='.$tapel.'&idprodi='.$idprodi.'&submit=hapus" class="btn btn-danger btn-xs">Hapus</a></td></tr>';
				$no++;
			}
		} else {
			echo '<tr><td colspan="4"><em>Belum ada data.</em></td></tr>';
		}
		echo '</table></div></div>';
	} else {
?>
<!--
form pertama untuk tahapan menambahkan kelas baru, yaitu:
1. ketikkan nama kelas
2. ketikkan tahun pelajaran, misalnya: 2014/2015 atau 2014-2015
3. pilih prodi yg bersangkutan dg kelas
4. klik tombol [LANJUT]
//-->
<h2><b>Tambah Kelas</b></h2><hr>
<form method="post" action="admin.php?hlm=master&sub=kelas&aksi=view" class="form-horizontal" role="form">
	<div class="form-group">
		<label for="kelas" class="col-sm-2 control-label">Kelas</label>
		<div class="col-sm-2">
			<input type="text" class="form-control" id="kelas" name="kelas" placeholder="Kelas" required autofocus>
		</div>
	</div>
	<div class="form-group">
		<label for="tapel" class="col-sm-2 control-label">Tahun Pelajaran</label>
		<div class="col-sm-2">
			<!-- <input type="text" class="form-control" id="tapel" name="tapel" placeholder="mmmm/nnnn" required> //-->
			<select name="tapel" class="form-control">
			<?php
				$qtapel = mysql_query("SELECT tapel FROM tapel ORDER BY tapel DESC");
				while(list($tapel)=mysql_fetch_array($qtapel)){
					echo '<option value="'.$tapel.'">'.$tapel.'</option>';
				}
			?>
			</select>
		</div>
	</div>
	<div class="form-group">
		<label for="prodi" class="col-sm-2 control-label">Program Studi</label>
		<div class="col-sm-3">
			<select class="form-control" id="prodi" name="idprodi">
			<?php
			//menampilkan daftar prodi ke dalam combo-box atau pulldown
			$qprodi = mysql_query("SELECT * FROM prodi ORDER BY idprodi");
			while(list($idprodi,$prodi)=mysql_fetch_array($qprodi)){
				echo '<option value="'.$idprodi.'">'.$prodi.'</option>';
			}
			?>
			</select>
		</div>
	</div>
	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
			<button type="submit" name="submit" value="baru" class="btn btn-Success">Lanjut</button>
			<a href="./admin.php?hlm=master&sub=kelas" class="btn btn-link">Batal</a>
		</div>
	</div>
</form>
<?php
	}
}
?>