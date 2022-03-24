<?php
//memasukkan file config.php
include('config.php');
?>


<div class="container" style="margin-top:20px">
    <center>
        <font size="6">Data Alumni</font>
    </center>
    <hr>
    <div class="table-responsive">
        <table class="table table-striped jambo_table bulk_action">
            <thead>
                <tr>
                    <th>NO</th>
                    <th>Nama</th>
                    <th>Jenis Kelamin</th>
                    <th>Pekerjaan</th>
                    <th>Status</th>
                    <th>Tahun Berhneti</th>
                    <th>Telepon</th>
                    <th>AKSI</th>
                </tr>
            </thead>
            <tbody>
                <?php
                //query ke database SELECT tabel mahasiswa urut berdasarkan id yang paling besar
                $sql = mysqli_query($koneksi, "SELECT * FROM santri ORDER BY ASRAMA ") or die(mysqli_error($koneksi));
                //jika query diatas menghasilkan nilai > 0 maka menjalankan script di bawah if...
                if (mysqli_num_rows($sql) > 0) {
                    //membuat variabel $no untuk menyimpan nomor urut
                    $no = 1;
                    //melakukan perulangan while dengan dari dari query $sql
                    while ($data = mysqli_fetch_assoc($sql)) {
                        //menampilkan data perulangan
                        echo '
						<tr>
							
							<td>' . $no . '</td>
							<td>' . $data['JK'] . '</td>
							<td>' . $data['ALAMAT'] . '</td>
							<td>' . $data['PEKERJAAN'] . '</td>
							<td>' . $data['STATUS'] . '</td>
							<td>' . $data['THN_BERHENTI'] . '</td>
							<td>' . $data['TELEPON'] . '</td>
							<td>' . $data['RT'] . '</td>
							<td>' . $data['RW'] . '</td>
							<td>' . $data['DESA'] . '</td>
							<td>' . $data['KECAMATAN'] . '</td>
							<td>' . $data['WALI'] . '</td>
							<td>' . $data['TELEPON'] . '</td>
							<td>
								<a href="index.php?page=edit_santri&NIS=' . $data['NIS'] . '" class="btn btn-secondary btn-sm">Edit</a>
								<a href="index.php?page=profil_santri&NIS=' . $data['NIS'] . '" class="btn btn-secondary btn-sm">Profil</a>
								<a href="delete.php?NIS=' . $data['NIS'] . '" class="btn btn-danger btn-sm" onclick="return confirm(\'Yakin ingin menghapus data ini?\')">Delete</a>
							</td>
						</tr>
						';
                        $no++;
                    }
                    //jika query menghasilkan nilai 0
                } else {
                    echo '
					<tr>
						<td colspan="6">Tidak ada data.</td>
					</tr>
					';
                }
                ?>

                <body>
        </table>
    </div>
</div>