<?php

include("konfig/koneksi.php");


$query = "SELECT MAX(CONVERT(REPLACE(id_alternatif, 'A', ''), SIGNED)) as idMaks FROM alternatif";
$hasil = mysqli_query($conn, $query);
$data  = mysqli_fetch_array($hasil);
$nim = $data['idMaks'];

//mengatur 6 karakter sebagai jumalh karakter yang tetap
//mengatur 3 karakter untuk jumlah karakter yang berubah-ubah
$noUrut = (int) $nim;
$noUrut++;

//menjadikan 201353 sebagai 6 karakter yang tetap
$char = "A";
//%03s untuk mengatur 3 karakter di belakang 201353
$IDbaru = $char . $noUrut;

?>
<div class="box-header">
    <h3 class="box-title">Tambah Alternatif</h3>
</div>

<div class="box-body pad">
    <form action="" method="POST">

        <input type="text" name="id_alternatif" class="form-control" value="<?php echo $IDbaru; ?>" readonly>
        <br />
        <input type="text" name="nama_alternatif" class="form-control" placeholder="Nama Alternatif" required>
        <br />
        <input type="submit" name="simpan" value="Simpan" class="btn btn-primary">
        <br />
    </form>
</div>
<?php
if (isset($_POST['simpan'])) {
	$s = mysqli_query($conn, "insert into alternatif (id_alternatif,nm_alternatif) values('$_POST[id_alternatif]','$_POST[nama_alternatif]')");

	if ($s) {
		echo "<script>alert('Disimpan'); window.open('index.php?a=alternatif&k=alternatif','_self');</script>";
	}
}

?>