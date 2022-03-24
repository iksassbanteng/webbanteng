<?php include('config.php'); ?>


<div class="container" style="margin-top:20px">
    <center>
        <font size="6">Profil Santri</font>
    </center>

    <hr>

    <?php
    //jika sudah mendapatkan parameter GET id dari URL
    if (isset($_GET['NIS'])) {
        //membuat variabel $id untuk menyimpan id dari GET id di URL
        $NIS = $_SESSION['nis'];

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
    <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align">NIS</label>
        <div class="col-md-6 col-sm-6">
            <?php echo $data['NIS']; ?>
        </div>
    </div>
    <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align">NIK</label>
        <div class="col-md-6 col-sm-6">
            <?php echo $data['NIK']; ?>
        </div>
    </div>
    <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align">Nama</label>
        <div class="col-md-6 col-sm-6">
            <?php echo $data['NAMA']; ?>
        </div>
    </div>
    <div class="item form-group">
        <?= "<img src='images/" . $data['FOTO'] . "'style='width:200px;'>" ?>
    </div>
    <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align">Asrama</label>
        <div class="col-md-6 col-sm-6">
            <?php echo $data['ASRAMA']; ?>
        </div>
    </div>
    <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align">Jenis Kelamin</label>
        <div class="col-md-6 col-sm-6">
            <?php echo $data['JK']; ?>
        </div>
    </div>
    <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align">Dusun</label>
        <div class="col-md-6 col-sm-6">
            <?php echo $data['DUSUN']; ?>
        </div>
    </div>
    <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align">RT</label>
        <div class="col-md-6 col-sm-6">
            <?php echo $data['RT']; ?>
        </div>
    </div>
    <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align">RW</label>
        <div class="col-md-6 col-sm-6">
            <?php echo $data['RW']; ?>
        </div>
    </div>
    <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align">Desa</label>
        <div class="col-md-6 col-sm-6">
            <?php echo $data['DESA']; ?>
        </div>
    </div>
    <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align">Kecamatan</label>
        <div class="col-md-6 col-sm-6">
            <?php echo $data['KECAMATAN']; ?>
        </div>
    </div>
    <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align">Wali</label>
        <div class="col-md-6 col-sm-6">
            <?php echo $data['WALI']; ?>
        </div>
    </div>
    <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align">Telepon</label>
        <div class="col-md-6 col-sm-6">
            <?php echo $data['TELEPON']; ?>
        </div>
    </div>
    <div class="col-md-6 col-sm-6 offset-md-3">
        <a href="index.php?page=index.php">Kembali</a>
    </div>
</div>