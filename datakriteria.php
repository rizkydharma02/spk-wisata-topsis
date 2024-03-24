<div class="box-header">
    <h3 class="box-title">Data Kriteria</h3>
</div>
<div class="table-responsive">
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Id Kriteria</th>
                <th>Nama Kriteria</th>
                <th>Bobot</th>
                <th>Poin 1</th>
                <th>Poin 2</th>
                <th>Poin 3</th>
                <th>Poin 4</th>
                <th>Poin 5</th>
                <th>Poin 6</th>
                <th>Poin 7</th>
                <th>Poin 8</th>
                <th>Poin 9</th>
                <th>Poin 10</th>
                <th>Sifat Kriteria</th>
                <th>Pilihan</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include("konfig/koneksi.php");

            $s = mysqli_query($conn, "select * from kriteria order by CONVERT(REPLACE(id_kriteria, 'A', ''), SIGNED) ASC");
            while ($d = mysqli_fetch_assoc($s)) {
            ?>
                <tr>
                    <td><?php echo $d['id_kriteria']; ?></td>
                    <td><?php echo $d['nama_kriteria']; ?></td>
                    <td><?php echo $d['bobot']; ?></td>
                    <td><?php echo $d['poin1']; ?></td>
                    <td><?php echo $d['poin2']; ?></td>
                    <td><?php echo $d['poin3']; ?></td>
                    <td><?php echo $d['poin4']; ?></td>
                    <td><?php echo $d['poin5']; ?></td>
                    <td><?php echo $d['poin6']; ?></td>
                    <td><?php echo $d['poin7']; ?></td>
                    <td><?php echo $d['poin8']; ?></td>
                    <td><?php echo $d['poin9']; ?></td>
                    <td><?php echo $d['poin10']; ?></td>
                    <td><?php echo $d['sifat']; ?></td>
                    <td>
                        <a href="?a=kriteria&k=ubahk&id=<?php echo $d['id_kriteria']; ?>" class="btn btn-warning">Ubah</a>
                        <a href="hapus.php?id=<?php echo $d['id_kriteria']; ?>" class="btn btn-danger">Hapus</a>
                    </td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</div>