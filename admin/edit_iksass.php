<?php include('config.php'); ?>


<div class="container" style="margin-top:20px">
    <center>
        <font size="6">Edit Data</font>
    </center>

    <hr>

    <?php
    //jika sudah mendapatkan parameter GET id dari URL
    if (isset($_GET['NIS'])) {
        //membuat variabel $id untuk menyimpan id dari GET id di URL
        $NIS = $_GET['NIS'];

        //query ke database SELECT tabel mahasiswa berdasarkan id = $id
        $select = mysqli_query($koneksi, "SELECT * FROM santri WHERE NIS='$NIS'") or die(mysqli_error($koneksi));

        //jika hasil query = 0 maka muncul pesan error
        if (mysqli_num_rows($select) == 0) {
            echo '<div class="alert alert-warning">ID tidak ada dalam database.</div>';
            exit();
            //jika hasil query > 0
        } else {
            //membuat variabel $data dan menyimpan data row dari query
            $data = mysqli_fetch_assoc($select);
        }
    }

    ?>

    <?php
    //jika tombol simpan di tekan/klik
    if (isset($_POST['submit'])) {
        $NIS = $_POST['NIS'];
        $NAMA = $_POST['NAMA'];
        $AKTIF = $_POST['AKTIF'];
        $PUJA    = $_POST['PUJA'];
        $BAJA    = $_POST['BAJA'];
        $HADIR    = $_POST['HADIR'];
        $KEGIATAN    = $_POST['KEGIATAN'];
        $AKTIF = ($HADIR / $KEGIATAN) * 100;


        $sql = mysqli_query($koneksi, "UPDATE santri SET NIS='$NIS', NAMA='$NAMA', AKTIF='$AKTIF', PUJA='$PUJA', BAJA='$BAJA' WHERE NIS='$NIS'") or die(mysqli_error($koneksi));
        if ($sql) {
            echo '<script>alert("Berhasil menyimpan data."); document.location="index.php?page=tampil_iksass";</script>';
        } else {
            echo '<div class="alert alert-warning">Gagal melakukan proses edit data.</div>';
        }
    }
    ?>

    <form action="index.php?page=edit_iksass&NIS=<?php echo $NIS; ?>" method="post">
        <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align">NIS</label>
            <div class="col-md-6 col-sm-6">
                <input type="text" name="NIS" class="form-control" size="20" value="<?php echo $data['NIS']; ?>" readonly required>
            </div>
        </div>
        <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align">NAMA</label>
            <div class="col-md-6 col-sm-6">
                <input type="text" name="NAMA" class="form-control" value="<?php echo $data['NAMA']; ?>" readonly required>
            </div>
        </div>
        <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align">AKTIF</label>
            <div class="col-md-3 col-sm-3">
                <input type="text" name="KEGIATAN" class="form-control" placeholder="jumlah Kegiatan" value="<?php echo $data['KEGIATAN']; ?>" required>
            </div>
            <div class="col-md-3 col-sm-3">
                <input type="text" name="HADIR" class="form-control" placeholder="jumlah Hadir" value="<?php echo $data['HADIR']; ?>" required>
            </div>
            <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align">PUJA</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="PUJA">
                    <label class="form-check-label" for="AKTIF">
                        Aktif
                    </label>
                </div>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="flexRadioDefault" id="PUJA" checked>
                <label class="form-check-label" for="TIDAK">
                    Tidak
                </label>
            </div>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="flexRadioDefault" id="BAJA">
            <label class="form-check-label" for="AKTIF">
                Aktif
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="flexRadioDefault" id="BAJA" checked>
            <label class="form-check-label" for="TIDAK">
                Tidak
            </label>
        </div>
        <div class="item form-group">
            <div class="col-md-6 col-sm-6 offset-md-3">
                <input type="submit" name="submit" class="btn btn-primary" value="Simpan">
            </div>
        </div>
    </form>
    <div class="col-md-6 col-sm-6 offset-md-3">
        <a href="index.php?page=tampil_pendidikan">Kembali</a>
    </div>
</div>