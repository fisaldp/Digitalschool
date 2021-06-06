<?php include 'header.php'; ?>
<?php
require 'functions.php';

//tombol cari 
$buku = query("SELECT * FROM ebook");
if (isset($_POST["cari"])) {
	$buku = cariebook($_POST["keyword"]);
}

$tipe_file = isset($_FILES['nama_file']['type']) ? $_FILES['nama_file']['type'] : ''; //mendapatkan mime type
$tipe_file = !empty($_FILES['nama_file']['type']) ? $_FILES['nama_file']['type'] : ''; //mendapatkan mime type
if ($tipe_file == "application/pdf") //mengecek apakah file tersebut pdf atau bukan
{
	$kategori = ($_POST['kategori']);
	$judul     = trim($_POST['judul']);
	$nama_file = trim($_FILES['nama_file']['name']);

	$sql = "INSERT INTO ebook VALUES ('', '$judul','','$kategori')";
	mysqli_query($conn, $sql); //simpan data judul dahulu untuk mendapatkan id

	//dapatkan id terkahir
	$query = mysqli_query($conn, "SELECT id FROM ebook ORDER BY id DESC LIMIT 1");
	$data  = mysqli_fetch_array($query);

	//mengganti nama pdf
	$nama_baru = "file_" . $data['id'] . ".pdf"; //hasil contoh: file_1.pdf
	$file_temp = $_FILES['nama_file']['tmp_name']; //data temp yang di upload
	$folder    = "file"; //folder tujuan

	move_uploaded_file($file_temp, "$folder/$nama_baru"); //fungsi upload
	//update nama file di database
	mysqli_query($conn, "UPDATE ebook SET nama_file='$nama_baru' WHERE id='$data[id]' ");

	// header('location:buku.php');
}



?>
<div class="container-fluid">
	<div class="row">
		<div class="container konten-wrapper">
			<div class="panel panel-default">
				<div class="panel-body main">
					<div class="col-md-8">
						<div class="tabel">
							<table class="main-table">
								<tr>
									<th>No.</th>
									<th>Judul Buku</th>
									<th>Kategori</th>
									<th>Aksi</th>
								</tr>

								<?php $i = 1; ?>
								<?php foreach ($buku as $row) : ?>
									<tr>
										<td><?= $i ?></td>
										<td><?= $row["judul"]; ?></td>
										<td><?= $row["kategori"]; ?></td>
										<td>

											<a href="file/<?= $row["nama_file"]; ?>">Lihat File</a>
										</td>
									</tr>
									<?php $i++; ?>
								<?php endforeach;  ?>
							</table>
						</div>

					</div>
					<?php include 'sidebar.php'; ?>
				</div>
			</div>
		</div>
	</div>
</div>

<?php include 'footer.php';
