<?php
if( empty( $_SESSION['iduser'] ) ){
	$_SESSION['err'] = '<strong>ERROR!</strong> Anda harus login terlebih dahulu.';
	header('Location: ./');
	die();
} else {
	/* tahapan pembayaran SPP
		1. masukkan nis
		2. tampilkan histori pembayaran (jika ada) dan form pembayaran
		3. proses pembayaran, kembali ke nomor 2
	*/
	echo '<h2><b>PEMBAYARAN SPP</h2></b><hr>';
	
	if(isset($_REQUEST['submit'])){
		//proses pembayaran secara bertahap
		$submit = $_REQUEST['submit'];
		$nis = $_REQUEST['nis'];
		
		//proses simpan pembayaran
		if($submit=='bayar'){
			$kls = $_REQUEST['kls'];
			$bln = $_REQUEST['bln'];
			$tgl = $_REQUEST['tgl'];
			$jml = $_REQUEST['jml'];
			
			$qbayar = mysql_query("INSERT INTO pembayaran VALUES('$kls','$nis','$bln','$tgl','$jml')");
			
			if($qbayar > 0){
				header('Location: ./admin.php?hlm=bayar&submit=v&nis='.$nis);
				die();
			} else {
				echo 'ada ERROR dg query';
			}
		}
		
		//proses hapus pembayaran, hanya ADMIN
		if($submit=='hapus'){
			$kls = $_REQUEST['kls'];
			$bln = $_REQUEST['bln'];
			$tgl = $_REQUEST['tgl'];
			$jml = $_REQUEST['jml'];
			
			$qbayar = mysql_query("DELETE FROM pembayaran WHERE kelas='$kls' AND nis='$nis' AND bulan='$bln'");
			
			if($qbayar > 0){
				header('Location: ./admin.php?hlm=bayar&submit=v&nis='.$nis);
				die();
			} else {
				echo 'ada ERROR dg query';
			}
		}
		
		//tampilkan data siswa
		$qsiswa = mysql_query("SELECT * FROM siswa WHERE nis='$nis'");
		list($nis,$nama,$idprodi) = mysql_fetch_array($qsiswa);
		
      echo '<div class="row" >';
		echo '<div class="col-sm-9">
		<table class="table table-bordered">';
		echo '<tr>
				<td colspan="2"><b>Nomor Induk</b></td>
				<td colspan="3">'.$nis.'</td>';
      	  echo '<td align="center">
           		   <a href="./cetak.php?nis='.$nis.'" target="_blank" class="btn btn-success btn-sm">
             	   <span class="glyphicon glyphicon-print"  aria-hidden="true"></span></a>
            	</td>
              </tr>';
		echo '<tr>
				<td colspan="2"><b>Nama Siswa</b></td>
				<td colspan="4">'.$nama.'</td>
			  </tr>';
      
		
?>

<?php
		echo '</td></tr>';
		echo '<tr class="table table-hover">
				<th width="50">No</th>
				<th width="100">Kelas</th>
				<th>Bulan</th>
				<th>Tanggal Bayar</th>
				<th>Jumlah</th>';
				
		echo '<th>&nbsp;</th>';
		echo '</tr>';
		
		//tampilkan histori pembayaran, jika ada
		$qbayar = mysql_query("SELECT kelas,bulan,tgl_bayar,jumlah FROM pembayaran WHERE nis='$nis' ORDER BY tgl_bayar DESC");
		if(mysql_num_rows($qbayar) > 0){
			$no = 1;
			while(list($kelas,$bulan,$tgl,$jumlah) = mysql_fetch_array($qbayar)){
				echo '<tr><td>'.$no.'</td>';
				echo '<td>'.$kelas.'</td>';
				echo '<td>'.$bulan.'</td>';
				echo '<td>'.$tgl.'</td>';
				echo '<td>'.$jumlah.'</td>
				<td align="center">';

				
				if( $_SESSION['admin'] == 1 ){
					echo '<a href="./admin.php?hlm=bayar_siswa&submit=hapus&kls='.$kelas.'&nis='.$nis.'&bln='.$bulan.'"  class="glyphicon glyphicon-trash"></a>';
				}
            
				echo '</td></tr>';
				
				$no++;
			}
		} else {
			echo '<tr><td colspan="6"><em>Belum ada data!</em></td></tr>';
		}
		echo '</table></div></div>';
		
	} else {
?>
<!-- form input nomor induk siswa -->
<form class="form-horizontal" role="form" method="post" action="./admin.php?hlm=bayar_siswa">
  <div class="form-group">
    <label for="nis" class="col-sm-2 control-label">Nomor Induk Siswa</label>
    <div class="col-sm-3">
      <input type="text" class="form-control" id="nis" name="nis" placeholder="Nomor Induk Siswa" required autofocus>
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-3">
      <button type="submit" name="submit" class="btn btn-success">Lanjut</button>
    </div>
  </div>
</form>
<?php
	}
}
?>