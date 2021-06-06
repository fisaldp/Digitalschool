<?php include 'header.php';

$sql_berita = "SELECT *
FROM
ebook
WHERE
id ='$_GET[id]'";

$qry_berita = $mysqli->query($sql_berita) or die($mysqli->error);

$data = $qry_berita->fetch_assoc();
?>

<div class="container-fluid body">
	<div class="row">
		<div class="col-lg-2 sidebar">
			<?php include 'sidebar.php'; ?>
		</div>
		<div class="col-lg-10 main-content">
			<div class="panel panel-default">
				<div class="panel-body">
					<?php

					// $nama_baru = "file_" . $data['id'] . ".pdf"; //hasil contoh: file_1.pdf
					// $file_temp = $_FILES['nama_file']['tmp_name']; //data temp yang di upload
					// $folder    = "../file";

					$var_judul = isset($_POST['judul']) ? $_POST['judul'] : $data['judul'];
					$var_kategori = isset($_POST['kategori']) ? $_POST['kategori'] : $data['kategori'];
					$var_nama_file = isset($_POST['nama_file']) ? $_POST['nama_file'] : $data['nama_file'];
					if (isset($_POST['btn_edit'])) {
						$message = array();

						if (!empty($_FILES['gambar']['name'])) {

							$nama = "file_" . $_GET['id'] . ".pdf";
							$file_name_gambar = $_FILES['gambar']['name'];
							$filename_gambar = explode(".", $file_name_gambar);
							$file_extension_gambar = $filename_gambar[count($filename_gambar) - 1];
							$file_weight_gambar = $_FILES['gambar']['size'];
							$target_path_gambar = "/pemweb/file/";
							$file_max_weight = 2048000; //batas maksimum ukuran file
							$ok_ext = array('pdf'); //type file yang diperbolehkan

							if (in_array($file_extension_gambar, $ok_ext)) {
								if ($file_weight_gambar <= $file_max_weight) {
									$l = unlink('../file/' .  $data['nama_file']);
									//echo "<script>alert('" . $l . "')</script>";

									move_uploaded_file($_FILES['gambar']['tmp_name'], '../file/' . $nama);
								} else {
									$message[] = "<b>Ukuran File</b> terlalu besar!";
								}
							} else {
								$message[] = "<b>Type File</b> tidak diperbolehkan";
							}
						} else {
							$nama = $data['nama_file'];
							echo "<script>alert('pdf kosong')</script>";
						}

						if (count($message) == 0) {
							$insert_sql = "UPDATE ebook SET judul = '$var_judul', nama_file = '$nama', kategori ='$var_kategori' WHERE id = '$_GET[id]'";
							$insert_qry = $mysqli->query($insert_sql) or die($mysqli->error);

							echo "<script>alert('Data Berhasil Diperbarui'); window.history.back(); </script>";
						}

						if (!count($message) == 0) {
							$num = 0;
							foreach ($message as $index => $show_message) {
								$num++;
					?>
								<div class="alert alert-danger alert-dismissable fade in">
									<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
									<?php
									echo "<script>console.log('" . $show_message . "')</script>";
									?>
								</div>
					<?php
							}
						}
					}
					?>
					<div class="row">
						<div class="col-md-12">
							<h2 class="page-header"><i class="fa fa-newspaper-o"></i> Edit Berita</h2>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<form action="" method="post" enctype="multipart/form-data">
								<div class="col-sm-8">
									<div class="form-group">
										<input type="text" class="form-control" name="judul" placeholder="Judul Berita" value="<?php echo $var_judul; ?>">
									</div>
									<div class="form-group">
										<label>Tanggal Posting</label>
										<input type="date" class="form-control input-sm" name="tgl_posting" value="<?php echo date('Y-m-d'); ?>" disabled>
									</div>
									<div class="form-group">
										<label>Kategori</label>
										<input type="text" class="form-control" name="kategori" placeholder="Kategori Ebook" value="<?php echo $var_kategori; ?>">
									</div>
									<div class="form-group">
										<input type="file" name="gambar" id="gambar">
										<script type="text/javascript">
											document.getElementById("gambar").onchange = function() {
												var reader = new FileReader();

												reader.onload = function(e) {
													// get loaded data and render thumbnail.
													document.getElementById("view").src = e.target.result;
													//console.log(e.target.result);
												};

												// read the image file as a data URL.
												reader.readAsDataURL(this.files[0]);
											};
										</script>
										<label class="text-muted">Ukuran E-book maks. 2 MB dengan type: PDF</label>
									</div>
									<embed src="../file/<?php echo $var_nama_file; ?>" id="view" width="500px" height="300px" />
								</div>
								<div class="col-sm-12">
									<a href="bsd.php" class="btn btn-danger btn-sm">
										<i class="fa fa-arrow-left"></i> Kembali
									</a>
									<button class="btn btn-sm btn-primary" type="submit" name="btn_edit">
										<i class="fa fa-check"></i> Edit
									</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script>
	CKEDITOR.replace('editor');
</script>
<?php include 'footer.php'; ?>