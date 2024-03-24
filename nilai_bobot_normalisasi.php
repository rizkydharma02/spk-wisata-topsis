<?php
include("konfig/koneksi.php");
$s = mysqli_query($conn, "select * from kriteria ");
$h = mysqli_num_rows($s);


?>

<div class="box-header">
	<h3 class="box-title ">Nilai Bobot Ternormalisasi</h3>
</div>

<table class="table table-bordered table-responsive">
	<thead>
		<tr>
			<th rowspan="2">No</th>
			<th rowspan="2">Nama</th>
			<th colspan="<?php echo $h; ?>">Kriteria</th>
		</tr>
		<tr>
			<?php
			for ($n = 1; $n <= $h; $n++) {
				echo "<th>C{$n}</th>";
			}
			?>
		</tr>
	</thead>
	<tbody>
		<?php
		$i = 0;
		$a = mysqli_query($conn, "select * from alternatif order by id_alternatif asc");



		while ($da = mysqli_fetch_assoc($a)) {


			echo "<tr>
		<td>" . (++$i) . "</td>
		<td>$da[nm_alternatif]</td>";
			$idalt = $da['id_alternatif'];

			//ambil nilai

			$n = mysqli_query($conn, "select * from nilai_matrik where id_alternatif='$idalt' order by id_matrik asc");

			while ($dn = mysqli_fetch_assoc($n)) {
				$idk = $dn['id_kriteria'];

				//nilai kuadrat

				$nilai_kuadrat = 0;
				$k = mysqli_query($conn, "select * from nilai_matrik where id_kriteria='$idk' ");
				while ($dkuadrat = mysqli_fetch_assoc($k)) {
					$nilai_kuadrat = $nilai_kuadrat + ($dkuadrat['nilai'] * $dkuadrat['nilai']);
				}

				//hitung jml alternatif
				$jml_alternatif = mysqli_query($conn, "select * from alternatif");
				$jml_a = mysqli_num_rows($jml_alternatif);
				//nilai bobot kriteria (rata")
				$bobot = 0;
				$tnilai = 0;

				$k2 = mysqli_query($conn, "select * from nilai_matrik where id_kriteria='$idk' ");
				while ($dbobot = mysqli_fetch_assoc($k2)) {
					$tnilai = $tnilai + $dbobot['nilai'];
				}
				$bobot = $tnilai / $jml_a;

				//nilai bobot input
				$b2 = mysqli_query($conn, "select * from kriteria where id_kriteria='$idk'");
				$nbot = mysqli_fetch_assoc($b2);
				$bot = $nbot['bobot'];

				echo "<td align='center'>" . round(($dn['nilai'] / sqrt($nilai_kuadrat)) * $bot, 3) . "</td>";
			}
			echo "</tr>\n";
		}
		?>

	</tbody>
</table>