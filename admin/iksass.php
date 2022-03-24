<?php
//memasukkan file config.php
include('config.php');
?>


<div class="" style="margin-top:20px">
    <center>
        <font size="6">Data Pendidikan</font>
    </center>
    <hr>
    <div class="table-responsive">
        <table class="table table-striped jambo_table bulk_action">
            <thead>
                <tr>
                    <th>NO</th>
                    <th>NIS</th>
                    <th>NAMA</th>
                    <th>AKTIF</th>
                    <th>PUJA</th>
                    <th>BAJA</th>
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
							<td>' . $data['NIS'] . '</td>
							<td>' . $data['NAMA'] . '</td>
                            <td>' . $data['AKTIF'] . '</td>
                            <td>' . $data['PUJA'] . '</td>
                            <td>' . $data['BAJA'] . '</td>
                            <td>
								<a href="index.php?page=edit_iksass&NIS=' . $data['NIS'] . '" class="btn btn-secondary btn-sm">Edit</a>
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