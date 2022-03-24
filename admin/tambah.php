<?php include('config.php'); ?>

<center>
	<font size="6">Tambah Data</font>
</center>
<hr>
<?php
if (isset($_POST['submit'])) {
	$nis = $_POST['NIS'];
	$nik = $_POST['NIK'];
	$Nama_santri = $_POST['NAMA'];
	$JK = $_POST['JK'];
	$Asrama	= $_POST['ASRAMA'];
	$Usia	= $_POST['USIA'];
	$Dusun	= $_POST['DUSUN'];
	$RT	= $_POST['RT'];
	$RW	= $_POST['RW'];
	$Desa	= $_POST['DESA'];
	$Kecamatan	= $_POST['KECAMATAN'];
	$Wali	= $_POST['WALI'];
	$Telepon	= $_POST['TELEPON'];
	$foto = $_FILES['FOTO']['name'];
	$tmp = $_FILES['FOTO']['tmp_name'];
	// NIK"
	$cek = mysqli_query($koneksi, "SELECT * FROM santri WHERE NIS='$nis'") or die(mysqli_error($koneksi));


	// Rename nama fotonya dengan menambahkan tanggal dan jam upload
	$fotobaru = date('dmYHis') . $foto;

	// Set path folder tempat menyimpan fotonya
	$path = "images/" . $fotobaru;

	if (move_uploaded_file($tmp, $path)) {

		if (mysqli_num_rows($cek) == 0) {
			$sql = mysqli_query($koneksi, "INSERT INTO santri(NIS, NIK, NAMA, ASRAMA , DUSUN, RT, RW, DESA, KECAMATAN, WALI, TELEPON , FOTO) VALUES('$nis', '$nik', '$Nama_santri', '$Asrama' ,'$Dusun', '$RT', '$RW', '$Desa', '$Kecamatan', '$Wali', '$Telepon', '$fotobaru' )") or die(mysqli_error($koneksi));

			if ($sql) {
				echo '<script>alert("Berhasil menambahkan data."); document.location="index.php?page=tampil_santri";</script>';
			} else {
				echo '<div class="alert alert-warning">Gagal melakukan proses tambah data.</div>';
			}
		} else {
			echo '<div class="alert alert-warning">Gagal, NIS sudah terdaftar.</div>';
		}
	} else {
		echo '<div class="alert alert-warning">Gagal untuk di upload.</div>';
	}
}
?>

<form action="index.php?page=tambah_santri" method="post" enctype="multipart/form-data">
	<div class="item form-group">
		<label class="col-form-label col-md-3 col-sm-3 label-align">NIS</label>
		<div class="col-md-6 col-sm-6 ">
			<input type="text" name="NIS" class="form-control" size="4" required>
		</div>
	</div>
	<div class="item form-group">
		<label class="col-form-label col-md-3 col-sm-3 label-align">Foto</label>
		<div class="col-md-6 col-sm-6">
			<input type="file" name="FOTO" class="" required>
		</div>
	</div>
	<div class="item form-group">
		<label class="col-form-label col-md-3 col-sm-3 label-align">Jenis Kelamin</label>
		<div class="col-md-6 col-sm-6 ">
			<div class="btn-group" data-toggle="buttons">
				<label class="btn btn-secondary" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
					<input type="radio" class="join-btn" name="Jenis_Kelamin" value="L" required>L
				</label>
				<label class="btn btn-primary " data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
					<input type="radio" class="join-btn" name="Jenis_Kelamin" value="P" required>P
				</label>
			</div>
		</div>
	</div>
	<div class="item form-group">
		<label class="col-form-label col-md-3 col-sm-3 label-align">NIK</label>
		<div class="col-md-6 col-sm-6">
			<input type="text" name="NIK" class="form-control" required>
		</div>
	</div>
	<div class="item form-group">
		<label class="col-form-label col-md-3 col-sm-3 label-align">Nama</label>
		<div class="col-md-6 col-sm-6">
			<input type="text" name="NAMA" class="form-control" required>
		</div>
	</div>
	<div class="item form-group">
		<label class="col-form-label col-md-3 col-sm-3 label-align">Asrama</label>
		<div class="col-md-6 col-sm-6">
			<input type="text" name="ASRAMA" class="form-control" required>
		</div>
	</div>
	<div class="item form-group">
		<label class="col-form-label col-md-3 col-sm-3 label-align">Dusun</label>
		<div class="col-md-6 col-sm-6">
			<input type="text" name="DUSUN" class="form-control" required>
		</div>
	</div>
	<div class="item form-group">
		<label class="col-form-label col-md-3 col-sm-3 label-align">RT</label>
		<div class="col-md-6 col-sm-6">
			<input type="text" name="RT" class="form-control" required>
		</div>
	</div>
	<div class="item form-group">
		<label class="col-form-label col-md-3 col-sm-3 label-align">RW</label>
		<div class="col-md-6 col-sm-6">
			<input type="text" name="RW" class="form-control" required>
		</div>
	</div>
	<div class="item form-group">
		<label class="col-form-label col-md-3 col-sm-3 label-align">Desa</label>
		<div class="col-md-6 col-sm-6">
			<input type="text" name="DESA" class="form-control" required>
		</div>
	</div>
	<div class="item form-group">
		<label class="col-form-label col-md-3 col-sm-3 label-align">Kecamatan</label>
		<div class="col-md-6 col-sm-6">
			<input type="text" name="KECAMATAN" class="form-control" required>
		</div>
	</div>
	<div class="item form-group">
		<label class="col-form-label col-md-3 col-sm-3 label-align">Wali</label>
		<div class="col-md-6 col-sm-6">
			<input type="text" name="WALI" class="form-control" required>
		</div>
	</div>
	<div class="item form-group">
		<label class="col-form-label col-md-3 col-sm-3 label-align">Telepon</label>
		<div class="col-md-6 col-sm-6">
			<input type="text" name="TELEPON" class="form-control" required>
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