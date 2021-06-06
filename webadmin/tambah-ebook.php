<?php include 'header.php';
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

                    $tipe_file = isset($_FILES['nama_file']['type']) ? $_FILES['nama_file']['type'] : ''; //mendapatkan mime type
                    $tipe_file = !empty($_FILES['nama_file']['type']) ? $_FILES['nama_file']['type'] : ''; //mendapatkan mime type

                    //$var_judul = isset($_POST['judul']) ? $_POST['judul'] : '';
                    //$var_kategori = isset($_POST['kategori']) ? $_POST['kategori'] : '';
                    //$var_teksberita = isset($_POST['teks_berita']) ? $_POST['teks_berita'] : '';


                    if ($tipe_file == "application/pdf") //mengecek apakah file tersebut pdf atau bukan
                    {
                        $kategori = ($_POST['kategori']);
                        $teks_ebook = $_POST['teks_ebook'];
                        $judul     = trim($_POST['judul']);
                        $nama_file = trim($_FILES['nama_file']['name']);
                        $id = ($_POST['id']) ?: '1';

                        $sql = "INSERT INTO ebook VALUES ('', '$judul','$teks_ebook','','$kategori','$id')";
                        mysqli_query($mysqli, $sql); //simpan data judul dahulu untuk mendapatkan id

                        //dapatkan id terkahir
                        $query = mysqli_query($mysqli, "SELECT id FROM ebook ORDER BY id DESC LIMIT 1");
                        $data  = mysqli_fetch_array($query);

                        //mengganti nama pdf
                        $nama_baru = "file_" . $data['id'] . ".pdf"; //hasil contoh: file_1.pdf
                        $file_temp = $_FILES['nama_file']['tmp_name']; //data temp yang di upload
                        $folder    = "../file"; //folder tujuan

                        move_uploaded_file($file_temp, "$folder/$nama_baru"); //fungsi upload
                        //update nama file di database
                        mysqli_query($mysqli, "UPDATE ebook SET nama_file='$nama_baru' WHERE id='$data[id]' ");

                        echo "<script>alert('Data Berhasil Ditambah'); window.location = 'bsd.php'</script>";
                    } else {
                        echo "<script>alert('Gagal Upload File Bukan PDF! <a href='index.php'> Kembali </a>')</script>";
                    }
                    ?>

                    <div class="row">
                        <div class="col-md-12">
                            <h2 class="page-header"><i class="fa fa-newspaper-o"></i> Tambah Buku</h2>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <form action="" method="post" enctype="multipart/form-data">
                                <div class="col-sm-8">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="judul" placeholder="Judul File" required>
                                    </div>
                                    <div class="form-group">
                                        <textarea class="form-control input-sm" name="teks_ebook" id="editor" rows="15"></textarea>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Kategori</label>
                                        <input type="text" class="form-control input-sm" name="kategori" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="file" name="nama_file" placeholder="Fle" required>
                                        <label class="text-muted">Pastikan format file .pdf</label>
                                    </div>
                                    <!-- <div class="form-group">
										<label for="file">File PDF</label>
										<input type="file" name="file" id="file">
									</div> -->
                                </div>
                                <div class="col-sm-12">
                                    <a href="berita.php" class="btn btn-danger btn-sm">
                                        <i class="fa fa-arrow-left"></i> Kembali
                                    </a>
                                    <button class="btn btn-sm btn-primary" type="submit" name="btn_publish">
                                        <i class="fa fa-check"></i> Tambahkan
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