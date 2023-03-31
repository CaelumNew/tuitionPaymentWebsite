<?php
if( empty( $_SESSION['iduser'] ) ){
	$_SESSION['err'] = '<strong>ERROR!</strong> Anda harus login terlebih dahulu.';
	header('Location: ./');
	die();
} else {
   echo '<h2><b>Tagihan Pembayaran</b></h2><hr>';
   echo '<a class="noprint pull-right btn btn-default" onclick="fnCetak()"><span class="glyphicon glyphicon-print" aria-hidden="true"></span></a>';
   $sql = mysql_query("SELECT s.nis,s.nama,k.id_kelas,p.bulan,p.jumlah FROM (siswa s INNER JOIN kelas k ON s.nis = k.nis) LEFT JOIN pembayaran p ON s.nis = p.nis ORDER BY k.id_kelas, s.nis");
   
   echo '<div class="row">';
   echo '<div class="col-md-7">';
   echo '<table class="table table-bordered">';
   echo '<tr class="success"><th width="50">No</th><th>NIS</th><th>Nama</th><th>Kelas</th><th>Bulan</th><th>Jumlah</th></tr>';
   
   $no=1;
   while(list($nis,$nama,$id_kelas,$bln,$jml)=mysql_fetch_array($sql)){
      echo '<tr class="table table-hover">
      <td>'.$no.'</td>
      <td>'.$nis.'</td>
      <td>'.$nama.'</td>
      <td>'.$id_kelas.'</td>';
      if(empty($bln) AND empty($jml)){
         echo '<td>--</td><td>BL</td></tr>';
      } else {
         echo '<td>'.$bln.'</td><td>LUNAS</td></tr>';
      }
      $no++;
   }
   echo '</table></div></div>';
}
?>