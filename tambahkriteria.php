<?php

include("konfig/koneksi.php");


$query = "SELECT MAX(CONVERT(REPLACE(id_kriteria, 'C', ''), SIGNED)) as idMaks FROM kriteria";
$hasil = mysqli_query($conn, $query);
$data  = mysqli_fetch_array($hasil);
$nim = $data['idMaks'];

//mengatur 6 karakter sebagai jumalh karakter yang tetap
//mengatur 3 karakter untuk jumlah karakter yang berubah-ubah
$noUrut = (int) $nim;
$noUrut++;

//menjadikan 201353 sebagai 6 karakter yang tetap
$char = "C";
//%03s untuk mengatur 3 karakter di belakang 201353
$IDbaru = $char . $noUrut;

?>
<div class="box-header">
    <h3 class="box-title">Tambah Kriteria</h3>
</div>


<form action="" method="POST">

    <input type="text" name="id_kriteria" class="form-control" value="<?php echo $IDbaru; ?>" readonly>
    <br />
    <input type="text" name="nama_kriteria" class="form-control" placeholder="Nama Kriteria" required>
    <br />
    <input type="number" step="any" name="bobot" class="form-control" placeholder="Bobot" required>
    <br />
    <input type="number" step="any" name="poin1" class="form-control" placeholder="Poin 1" required>
    <br />
    <input type="number" step="any" name="poin2" class="form-control" placeholder="Poin 2" required>
    <br />
    <input type="number" step="any" name="poin3" class="form-control" placeholder="Poin 3" required>
    <br />
    <input type="number" step="any" name="poin4" class="form-control" placeholder="Poin 4" required>
    <br />
    <input type="number" step="any" name="poin5" class="form-control" placeholder="Poin 5" required>
    <br />
    <input type="number" step="any" name="poin6" class="form-control" placeholder="Poin 6" required>
    <br />
    <input type="number" step="any" name="poin7" class="form-control" placeholder="Poin 7" required>
    <br />
    <input type="number" step="any" name="poin8" class="form-control" placeholder="Poin 8" required>
    <br />
    <input type="number" step="any" name="poin9" class="form-control" placeholder="Poin 9" required>
    <br />
    <input type="number" step="any" name="poin10" class="form-control" placeholder="Poin 10" required>
    <br />
    <select name="sifat" class="form-control">
        <option value="benefit">Benefit</option>
        <option value="cost">Cost</option>
    </select>
    <br />
    <input type="submit" name="simpan" value="Simpan" class="btn btn-primary">
    <br />
</form>

<?php
if (isset($_POST['simpan'])) {
	$s = mysqli_query($conn, "insert into kriteria (id_kriteria,nama_kriteria,bobot,poin1,poin2,poin3,poin4,poin5,poin6,poin7,poin8,poin9,poin10,sifat) 
	values 
	('$_POST[id_kriteria]','$_POST[nama_kriteria]','$_POST[bobot]','$_POST[poin1]','$_POST[poin2]','$_POST[poin3]','$_POST[poin4]','$_POST[poin5]','$_POST[poin6]','$_POST[poin7]','$_POST[poin8]','$_POST[poin9]','$_POST[poin10]','$_POST[sifat]')");

	if ($s) {
		echo "<script>alert('Disimpan'); window.open('index.php?a=kriteria&k=kriteria','_self');</script>";
	}
}

?>