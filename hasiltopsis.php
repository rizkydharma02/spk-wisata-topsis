<h1>Hasil Topsis</h1>
<ul class="nav nav-tabs">
	<?php
	if ($_GET['k'] == 'nilai_matriks') {
		$act1 = 'class="active"';
		$act2 = '';
		$act3 = '';
		$act4 = '';
		$act5 = '';
		$act6 = '';
	} else if ($_GET['k'] == 'nilai_matriks_normalisasi') {
		$act1 = '';
		$act2 = 'class="active"';
		$act3 = '';
		$act4 = '';
		$act5 = '';
		$act6 = '';
	} else if ($_GET['k'] == 'nilai_bobot_normalisasi') {
		$act1 = '';
		$act2 = '';
		$act3 = 'class="active"';
		$act4 = '';
		$act5 = '';
		$act6 = '';
	} else if ($_GET['k'] == 'matriks_ideal') {
		$act1 = '';
		$act2 = '';
		$act3 = '';
		$act4 = 'class="active"';
		$act5 = '';
		$act6 = '';
	} else if ($_GET['k'] == 'jarak_solusi') {
		$act1 = '';
		$act2 = '';
		$act3 = '';
		$act4 = '';
		$act5 = 'class="active"';
		$act6 = '';
	} else if ($_GET['k'] == 'nilai_preferensi') {
		$act1 = '';
		$act2 = '';
		$act3 = '';
		$act4 = '';
		$act5 = '';
		$act6 = 'class="active"';
	} else {
		$act1 = '';
		$act2 = '';
		$act3 = '';
		$act4 = '';
		$act5 = '';
		$act6 = '';
	}
	?>
	<li <?php echo $act1; ?>><a href="index.php?a=hasiltopsis&k=nilai_matriks">Nilai Matriks</a></li>

	<li <?php echo $act2; ?>><a href="index.php?a=hasiltopsis&k=nilai_matriks_normalisasi">Nilai Matriks Ternormalisasi</a></li>

	<li <?php echo $act3; ?>><a href="index.php?a=hasiltopsis&k=nilai_bobot_normalisasi">Nilai Bobot Ternormalisasi</a></li>

	<li <?php echo $act4; ?>><a href="index.php?a=hasiltopsis&k=matriks_ideal">Matriks Ideal Posistif/Negatif</a></li>

	<li <?php echo $act5; ?>><a href="index.php?a=hasiltopsis&k=jarak_solusi">Jarak Solusi Ideal Posistif/Negatif</a></li>

	<li <?php echo $act6; ?>><a href="index.php?a=hasiltopsis&k=nilai_preferensi">Nilai Preferensi</a></li>

</ul>

<?php

if (@$_GET['a'] == 'hasiltopsis' and @$_GET['k'] == 'nilai_matriks') {
	include("nilai_matriks.php");
} else if (@$_GET['k'] == 'nilai_matriks_normalisasi') {
	include("nilai_matriks_normalisasi.php");
} else if (@$_GET['k'] == 'nilai_bobot_normalisasi') {
	include("nilai_bobot_normalisasi.php");
} else if (@$_GET['k'] == 'matriks_ideal') {
	include("matriks_ideal.php");
} else if (@$_GET['k'] == 'jarak_solusi') {
	include("jarak_solusi.php");
} else if (@$_GET['k'] == 'nilai_preferensi') {
	include("nilai_preferensi.php");
}
?>