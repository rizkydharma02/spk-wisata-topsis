<?php
$s = mysqli_query($conn, "select * from kriteria");
$h = mysqli_num_rows($s);




?>

<div class="box-header">
	<h3 class="box-title ">Matriks Ideal Positif (A<sup>+</sup>)</h3>
</div>

<table class="table table-bordered table-responsive">
	<thead>
		<tr>
			<th colspan="<?php echo $h; ?>">
				<center>Kriteria</center>
			</th>
		</tr>
		<tr>
			<?php
			$hk = mysqli_query($conn, "select nama_kriteria from kriteria order by id_kriteria asc;");
			while ($dhk = mysqli_fetch_assoc($hk)) {

				echo "<th>$dhk[nama_kriteria]</th>";
			}
			?>
		</tr>
		<tr>
			<?php

			for ($n = 1; $n <= $h; $n++) {

				echo "<th>y<sub>$n</sub><sup>+</sup></th>";
			}
			?>
		</tr>
	</thead>
	<tbody>
		<?php
		$i = 0;
		$a = mysqli_query($conn, "select * from kriteria order by id_kriteria asc;");
		echo "<tr>";
		while ($da = mysqli_fetch_assoc($a)) {



			$idalt = $da['id_kriteria'];

			//ambil nilai

			$n = mysqli_query($conn, "select * from nilai_matrik where id_kriteria='$idalt'  order by id_matrik ASC");

			$c = 0;
			$ymax = array();
			while ($dn = mysqli_fetch_assoc($n)) {
				$idk = $dn['id_kriteria'];


				//nilai kuadrat

				$nilai_kuadrat = 0;
				$k = mysqli_query($conn, "select * from nilai_matrik where id_kriteria='$idk'  order by id_matrik ASC ");
				while ($dkuadrat = mysqli_fetch_assoc($k)) {
					$nilai_kuadrat = $nilai_kuadrat + ($dkuadrat['nilai'] * $dkuadrat['nilai']);
				}

				//hitung jml alternatif
				$jml_alternatif = mysqli_query($conn, "select * from alternatif");
				$jml_a = mysqli_num_rows($jml_alternatif);
				//nilai bobot kriteria (rata")
				$bobot = 0;
				$tnilai = 0;

				$k2 = mysqli_query($conn, "select * from nilai_matrik where id_kriteria='$idk'  order by id_matrik ASC ");
				while ($dbobot = mysqli_fetch_assoc($k2)) {
					$tnilai = $tnilai + $dbobot['nilai'];
				}
				$bobot = $tnilai / $jml_a;

				//nilai bobot input
				$b2 = mysqli_query($conn, "select * from kriteria where id_kriteria='$idk'");
				$nbot = mysqli_fetch_assoc($b2);
				$bot = $nbot['bobot'];


				$v = round(($dn['nilai'] / sqrt($nilai_kuadrat)) * $bot, 4);

				$ymax[$c] = $v;
				$c++;
			}

			if ($nbot['sifat'] == 'benefit') {
				//echo "<pre>";    
				//print_r($ymax);    
				//echo "</pre>";    

				echo "<td>" . max($ymax) . "</td>";
			} else {
				echo "<td>" . min($ymax) . "</td>";
			}
		}
		echo "</tr>";
		?>

	</tbody>
</table>

<!-- tabel min -->

<div class="box-header">
	<h3 class="box-title ">Matriks Ideal Negatif (A<sup>-</sup>)</h3>
</div>

<table class="table table-bordered table-responsive">
	<thead>
		<tr>
			<th colspan="<?php echo $h; ?>">
				<center>Kriteria</center>
			</th>
		</tr>
		<tr>
			<?php
			$hk = mysqli_query($conn, "select nama_kriteria from kriteria order by id_kriteria asc;");
			while ($dhk = mysqli_fetch_assoc($hk)) {

				echo "<th>$dhk[nama_kriteria]</th>";
			}
			?>
		</tr>
		<tr>
			<?php

			for ($n = 1; $n <= $h; $n++) {

				echo "<th>y<sub>$n</sub><sup>-</sup></th>";
			}
			?>
		</tr>
	</thead>
	<tbody>
		<?php
		$i = 0;
		$a = mysqli_query($conn, "select * from kriteria order by id_kriteria asc;");
		echo "<tr>";
		while ($da = mysqli_fetch_assoc($a)) {



			$idalt = $da['id_kriteria'];

			//ambil nilai

			$n = mysqli_query($conn, "select * from nilai_matrik where id_kriteria='$idalt'  order by id_matrik ASC");

			$c = 0;
			$ymax = array();
			while ($dn = mysqli_fetch_assoc($n)) {
				$idk = $dn['id_kriteria'];


				//nilai kuadrat

				$nilai_kuadrat = 0;
				$k = mysqli_query($conn, "select * from nilai_matrik where id_kriteria='$idk' order by id_matrik ASC ");
				while ($dkuadrat = mysqli_fetch_assoc($k)) {
					$nilai_kuadrat = $nilai_kuadrat + ($dkuadrat['nilai'] * $dkuadrat['nilai']);
				}

				//hitung jml alternatif
				$jml_alternatif = mysqli_query($conn, "select * from alternatif");
				$jml_a = mysqli_num_rows($jml_alternatif);
				//nilai bobot kriteria (rata")
				$bobot = 0;
				$tnilai = 0;

				$k2 = mysqli_query($conn, "select * from nilai_matrik where id_kriteria='$idk' order by id_matrik ASC ");
				while ($dbobot = mysqli_fetch_assoc($k2)) {
					$tnilai = $tnilai + $dbobot['nilai'];
				}
				$bobot = $tnilai / $jml_a;

				//nilai bobot input
				$b2 = mysqli_query($conn, "select * from kriteria where id_kriteria='$idk'");
				$nbot = mysqli_fetch_assoc($b2);
				$bot = $nbot['bobot'];


				$v = round(($dn['nilai'] / sqrt($nilai_kuadrat)) * $bot, 4);

				$ymax[$c] = $v;
				$c++;
			}

			if ($nbot['sifat'] == 'cost') {
				echo "<td>" . max($ymax) . "</td>";
			} else {
				echo "<td>" . min($ymax) . "</td>";
			}
		}
		echo "</tr>";
		?>

	</tbody>
</table>