<?php include('config.php'); ?>

<center>
    <font size="6">Tambah Data</font>
</center>
<hr>
<?php
if (isset($_POST['submit'])) {
    $NAMA = $_POST['NAMA'];
    $JK = $_POST['JK'];
    $ALAMAT = $_POST['ALAMAT'];
    $PEKERJAAN = $_POST['PEKERJAAN'];
    $STATS    = $_POST['STATUS'];
    $TAHUN_BERHENTI    = $_POST['TAHUN_BERHENTI'];
    $TELEPON    = $_POST['TELEPON'];

    $cek = mysqli_query($koneksi, "SELECT * FROM db_alumni ") or die(mysqli_error($koneksi));

    if (mysqli_num_rows($cek) == 0) {
        $sql = mysqli_query($koneksi, "INSERT INTO db_alumni(NAMA, JK, ALAMAT, PEKERJAAN, STATS, TAHUN_BERHENTI ,DUSUN, TELEPON) VALUES('$NAMA', '$JK', '$ALAMAT', '$PEKERJAAN', '$STATUS', '$TAHUN_BERHENTI' ,'$TELEPON')") or die(mysqli_error($koneksi));

        if ($sql) {
            echo '<script>alert("Berhasil menambahkan data."); document.location="index.php?page=tampil_alumni";</script>';
        } else {
            echo '<div class="alert alert-warning">Gagal melakukan proses tambah data.</div>';
        }
    } else {
        echo '<div class="alert alert-warning">Gagal, ID sudah terdaftar.</div>';
    }
}

?>

<form action="index.php?page=tambah_alumni" method="post" enctype="multipart/form-data">
    <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align">Nama</label>
        <div class="col-md-6 col-sm-6 ">
            <input type="text" name="NAMA" class="form-control" size="4" required>
        </div>
    </div>
    <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align">Jenis Kelamin</label>
        <div class="col-md-6 col-sm-6 ">
            <div class="btn-group" data-toggle="buttons">
                <label class="btn btn-secondary" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                    <input type="radio" class="join-btn" name="JK" value="L" required>L
                </label>
                <label class="btn btn-primary " data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                    <input type="radio" class="join-btn" name="JK" value="P" required>P
                </label>
            </div>
        </div>
    </div>
    <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align">Alamat</label>
        <div class="col-md-6 col-sm-6">
            <input type="text" name="ALAMAT" class="form-control" required>
        </div>
    </div>
    <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align">Pekerjaan</label>
        <div class="col-md-6 col-sm-6">
            <input type="text" name="PEKERJAAN" class="form-control" required>
        </div>
    </div>
    <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align">Status</label>
        <div class="col-md-6 col-sm-6">
            <input type="text" name="STATUS" class="form-control" required>
        </div>
    </div>
    <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align">Tahun Behenti</label>
        <div class="col-md-6 col-sm-6">
            <input type="text" name="TAHUN_BERHENTI" class="form-control" required>
        </div>
    </div>
    <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align">Telepon</label>
        <div class="col-md-6 col-sm-6">
            <input type="text" name="TELELPON" class="form-control" required>
        </div>
    </div>
    <div class="item form-group">
        <div class="col-md-1 col-sm-1 offset-md-3">
            <input type="submit" name="submit" class="btn btn-primary" value="Simpan">
        </div>
    </div>
</form>
<div>
    <a href="index.php?page=tampil_santri">Kembali</a>
</div>
<div>