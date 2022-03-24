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
        $PAGI = $_POST['PAGI'];
        $SKOR_P    = $_POST['SKOR_P'];
        $SORE    = $_POST['SORE'];
        $SKOR_S    = $_POST['SKOR_S'];

        $sql = mysqli_query($koneksi, "UPDATE santri SET NIS='$NIS', NAMA='$NAMA', PAGI='$PAGI', SKOR_P='$SKOR_P', SORE='$SORE', SKOR_S='$SKOR_S' WHERE NIS='$NIS'") or die(mysqli_error($koneksi));
        if ($sql) {
            echo '<script>alert("Berhasil menyimpan data."); document.location="index.php?page=tampil_pendidikan";</script>';
        } else {
            echo '<div class="alert alert-warning">Gagal melakukan proses edit data.</div>';
        }
    }
    ?>

    <form action="index.php?page=edit_pendidikan&NIS=<?php echo $NIS; ?>" method="post">
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
            <label class="col-form-label col-md-3 col-sm-3 label-align">Sekolah Pagi</label>
            <div class="col-md-6 col-sm-6">
                <input type="text" name="PAGI" class="form-control" value="<?php echo $data['PAGI']; ?>" required>
            </div>
        </div>
        <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align">Sekolah Sore</label>
            <div class="col-md-6 col-sm-6">
                <input type="text" name="SORE" class="form-control" value="<?php echo $data['SORE']; ?>" required>
            </div>
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