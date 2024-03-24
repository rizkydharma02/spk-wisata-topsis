<?php

include("konfig/koneksi.php");


$query = "SELECT max(id_kriteria) as idMaks FROM kriteria";
$hasil = mysqli_query($conn, $query);
$data  = mysqli_fetch_array($hasil);
$nim = $data['idMaks'];

//mengatur 6 karakter sebagai jumalh karakter yang tetap
//mengatur 3 karakter untuk jumlah karakter yang berubah-ubah
$noUrut = (int) substr($nim, 2, 3);
$noUrut++;

//menjadikan 201353 sebagai 6 karakter yang tetap
$char = "kr";
//%03s untuk mengatur 3 karakter di belakang 201353
$IDbaru = $char . sprintf("%03s", $noUrut);

//ambil data \
$s = mysqli_query($conn, "select * from kriteria where id_kriteria='$_GET[id]'");
$d = mysqli_fetch_assoc($s);


?>
<div class="box-header">
    <h3 class="box-title">Ubah Kriteria</h3>
</div>

<div class="box-body pad">
    <form action="" method="POST">

        <input type="text" name="id_kriteria" class="form-control" value="<?php echo $d['id_kriteria']; ?>" readonly>
        <br />
        <input type="text" name="nama_kriteria" class="form-control" placeholder="Nama Kriteria"
            value="<?php echo $d['nama_kriteria']; ?>" required>
        <br />
        <input type="number" step="any" name="bobot" class="form-control" placeholder="Bobot"
            value="<?php echo $d['bobot']; ?>" required>
        <br />
        <input type="number" step="any" name="poin1" class="form-control" placeholder="Poin 1"
            value="<?php echo $d['poin1']; ?>" required>
        <br />
        <input type="number" step="any" name="poin2" class="form-control" placeholder="Poin 2"
            value="<?php echo $d['poin2']; ?>" required>
        <br />
        <input type="number" step="any" name="poin3" class="form-control" placeholder="Poin 3"
            value="<?php echo $d['poin3']; ?>" required>
        <br />
        <input type="number" step="any" name="poin4" class="form-control" placeholder="Poin 4"
            value="<?php echo $d['poin4']; ?>" required>
        <br />
        <input type="number" step="any" name="poin5" class="form-control" placeholder="Poin 5"
            value="<?php echo $d['poin5']; ?>" required>
        <br />
        <input type="number" step="any" name="poin6" class="form-control" placeholder="Poin 6"
            value="<?php echo $d['poin6']; ?>" required>
        <br />
        <input type="number" step="any" name="poin7" class="form-control" placeholder="Poin 7"
            value="<?php echo $d['poin7']; ?>" required>
        <br />
        <input type="number" step="any" name="poin8" class="form-control" placeholder="Poin 8"
            value="<?php echo $d['poin8']; ?>" required>
        <br />
        <input type="number" step="any" name="poin9" class="form-control" placeholder="Poin 9"
            value="<?php echo $d['poin9']; ?>" required>
        <br />
        <input type="number" step="any" name="poin10" class="form-control" placeholder="Poin 10"
            value="<?php echo $d['poin10']; ?>" required>
        <br />
        <select name="sifat" class="form-control">
            <option value="<?php echo $d['sifat']; ?>"><?php echo $d['sifat']; ?></option>
            <option value="benefit">Benefit</option>
            <option value="cost">Cost</option>
        </select>
        <br />
        <input type="submit" name="ubah" value="Ubah" class="btn btn-primary">
        <br />
    </form>
</div>
<?php
if (isset($_POST['ubah'])) {
	$s = mysqli_query($conn, "update kriteria set nama_kriteria='$_POST[nama_kriteria]', bobot='$_POST[bobot]', poin1='$_POST[poin1]',poin2='$_POST[poin2]', poin3='$_POST[poin3]', poin4='$_POST[poin4]', poin5='$_POST[poin5]',poin6='$_POST[poin6]',poin7='$_POST[poin7]',poin8='$_POST[poin8]',poin9='$_POST[poin9]',poin10='$_POST[poin10]', sifat='$_POST[sifat]' where id_kriteria='$_POST[id_kriteria]'");

	if ($s) {
		echo "<script>alert('Diubah'); window.open('index.php?a=kriteria&k=kriteria','_self');</script>";
	}
}

?>