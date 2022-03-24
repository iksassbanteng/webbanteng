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
		$NIK = $_POST['NIK'];
		$Nama_santri = $_POST['NAMA'];
		$Asrama	= $_POST['ASRAMA'];
		$Dusun	= $_POST['DUSUN'];
		$RT	= $_POST['RT'];
		$RW	= $_POST['RW'];
		$Desa	= $_POST['DESA'];
		$Kecamatan	= $_POST['KECAMATAN'];
		$Wali	= $_POST['WALI'];
		$Telepon	= $_POST['TELEPON'];
		$foto = $_FILES['FOTO']['name'];
		$tmp = $_FILES['FOTO']['tmp_name'];


		$fotobaru = date('dmYHis') . $foto;

		// Set path folder tempat menyimpan fotonya
		$path = "images/" . $fotobaru;

		if (move_uploaded_file($tmp, $path)) {

			$sql = mysqli_query($koneksi, "UPDATE santri SET NIS='$NIS', NIK='$NIK', NAMA='$Nama_santri', JK='$JK', ASRAMA='$Asrama' ,DUSUN='$Dusun', RT='$RT', RW='$RW', DESA='$Desa', KECAMATAN='$Kecamatan', WALI='$Wali', TELEPON='$Telepon',FOTO='$fotobaru' WHERE NIS='$NIS'") or die(mysqli_error($koneksi));
			if ($sql) {
				echo '<script>alert("Berhasil menyimpan data."); document.location="index.php?page=tampil_santri";</script>';
			} else {
				echo '<div class="alert alert-warning">Gagal melakukan proses edit data.</div>';
			}
		} else {
			echo '<div class="alert alert-warning">Gagal untuk di upload.</div>';
		}
	}
	?>

	<form action="index.php?page=edit_santri&NIS=<?php echo $NIS; ?>" method="post">
		<div class="item form-group">
			<label class="col-form-label col-md-3 col-sm-3 label-align">NIS</label>
			<div class="col-md-6 col-sm-6">
				<input type="text" name="NIS" class="form-control" size="20" value="<?php echo $data['NIS']; ?>" readonly required>
			</div>
		</div>
		<div class="item form-group">
			<label class="col-form-label col-md-3 col-sm-3 label-align">Foto</label>
			<div class="col-md-6 col-sm-6">
				<input type="file" name="FOTO" class="" required>
			</div>
		</div>
		<div class="item form-group">
			<label class="col-form-label col-md-3 col-sm-3 label-align">NIK</label>
			<div class="col-md-6 col-sm-6">
				<input type="text" name="NIK" class="form-control" value="<?php echo $data['NIK']; ?>" required>
			</div>
		</div>
		<div class="item form-group">
			<label class="col-form-label col-md-3 col-sm-3 label-align">Nama Santri</label>
			<div class="col-md-6 col-sm-6">
				<input type="text" name="NAMA" class="form-control" value="<?php echo $data['NAMA']; ?>" required>
			</div>
		</div>
		<div class="item form-group">
			<label class="col-form-label col-md-3 col-sm-3 label-align">Jenis Kelamin</label>
			<div class="col-md-6 col-sm-6 ">
				<div class="btn-group" data-toggle="buttons">
					<label class="btn btn-secondary" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
						<input type="radio" class="join-btn" name="JK" value="L" required>laki-laki
					</label>
					<label class="btn btn-primary " data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
						<input type="radio" class="join-btn" name="JK" value="P" required>Perempuan
					</label>
				</div>
			</div>
		</div>
		<div class="item form-group">
			<label class="col-form-label col-md-3 col-sm-3 label-align">Asrama</label>
			<div class="col-md-6 col-sm-6">
				<input type="text" name="ASRAMA" class="form-control" value="<?php echo $data['ASRAMA']; ?>" required>
			</div>
		</div>
		<div class="item form-group">
			<label class="col-form-label col-md-3 col-sm-3 label-align">Dusun</label>
			<div class="col-md-6 col-sm-6">
				<input type="text" name="DUSUN" class="form-control" value="<?php echo $data['DUSUN']; ?>" required>
			</div>
		</div>
		<div class="item form-group">
			<label class="col-form-label col-md-3 col-sm-3 label-align">RT</label>
			<div class="col-md-6 col-sm-6">
				<input type="text" name="RT" class="form-control" value="<?php echo $data['RT']; ?>" required>
			</div>
		</div>
		<div class="item form-group">
			<label class="col-form-label col-md-3 col-sm-3 label-align">RW</label>
			<div class="col-md-6 col-sm-6">
				<input type="text" name="RT" class="form-control" value="<?php echo $data['RW']; ?>" required>
			</div>
		</div>
		<div class="item form-group">
			<label class="col-form-label col-md-3 col-sm-3 label-align">Desa</label>
			<div class="col-md-6 col-sm-6">
				<input type="text" name="DESA" class="form-control" value="<?php echo $data['DESA']; ?>" required>
			</div>
		</div>
		<div class="item form-group">
			<label class="col-form-label col-md-3 col-sm-3 label-align">Kecamatan</label>
			<div class="col-md-6 col-sm-6">
				<input type="text" name="KECAMATAN" class="form-control" value="<?php echo $data['KECAMATAN']; ?>" required>
			</div>
		</div>
		<div class="item form-group">
			<label class="col-form-label col-md-3 col-sm-3 label-align">Wali</label>
			<div class="col-md-6 col-sm-6">
				<input type="text" name="WALI" class="form-control" value="<?php echo $data['WALI']; ?>" required>
			</div>
		</div>
		<div class="item form-group">
			<label class="col-form-label col-md-3 col-sm-3 label-align">Telepon</label>
			<div class="col-md-6 col-sm-6">
				<input type="text" name="TELEPON" class="form-control" value="<?php echo $data['TELEPON']; ?>" required>
			</div>
		</div>
		<div class="item form-group">
			<div class="col-md-6 col-sm-6 offset-md-3">
				<input type="submit" name="submit" class="btn btn-primary" value="Simpan">
			</div>
		</div>
	</form>
	<div class="col-md-6 col-sm-6 offset-md-3">
		<a href="index.php?page=tampil_santri">Kembali</a>
	</div>
</div>