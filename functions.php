<?php
$conn = mysqli_connect("localhost", "root", "", "pemweb");

function query($query)
{
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function tambah($data)
{
    global $conn;
    //ambil data dari tiap elemen dalam form
    $judul = htmlspecialchars($data["judul"]);
    $kategori = htmlspecialchars($data["kategori"]);

    //query insert data
    $query = "INSERT INTO buku VALUES ('', '$judul', '$kategori')";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function hapus($id)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM ebook WHERE id = $id");
    return mysqli_affected_rows($conn);
}

function ubah($data)
{
    global $conn;
    //ambil data dari tiap elemen dalam form
    $id = $data["id"];
    $judul = htmlspecialchars($data["judul"]);
    $nama_file = htmlspecialchars($data["nama_file"]);
    $kategori = htmlspecialchars($data["kategori"]);


    $tipe_file = isset($_FILES['nama_file']['type']) ? $_FILES['nama_file']['type'] : ''; //mendapatkan mime type
    $tipe_file = !empty($_FILES['nama_file']['type']) ? $_FILES['nama_file']['type'] : ''; //mendapatkan mime type
    if ($tipe_file == "application/pdf") //mengecek apakah file tersebut pdf atau bukan
    {
        $kategori = ($_POST['kategori']);
        $judul     = trim($_POST['judul']);
        $nama_file = trim($_FILES['nama_file']['name']);

        $sql = "INSERT INTO ebook VALUES ('$id', '$judul','','$kategori')";
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

        header('location:buku.php');
    } else {
        echo "<script>alert('Gagal Upload File Bukan PDF! <a href='index.php'> Kembali </a>')</script>";
    }

    //query update data
    $query = "UPDATE ebook SET
                    judul = '$judul', nama_file ='$nama_file', kategori = '$kategori'
                    WHERE id = $id";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function cari($keyword)
{
    $query = "SELECT * FROM buku WHERE
                    judul LIKE '%$keyword%' OR kategori LIKE '%$keyword%'";


    return query($query);
}

function cariebook($keyword)
{
    $query = "SELECT * FROM ebook WHERE
                    judul LIKE '%$keyword%' OR kategori LIKE '%$keyword%'";


    return query($query);
}

function komen($data)
{
    global $conn;
    $nama = $_POST['nama']; // Get Name from form
    $email = $_POST['email']; // Get Email from form
    $pesan = $_POST['pesan']; // Get Pesan from form

    $query = "INSERT INTO komentar VALUES ('', '$nama', '$email', '$pesan')";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function registrasi($data, $role)
{
    global $conn;

    $username = strtolower(stripslashes($data["username"]));
    $email = strtolower($data["email"]);
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $password2 = mysqli_real_escape_string($conn, $data["password2"]);

    //cek username sudah ada atau belom
    $result = mysqli_query($conn, "SELECT username FROM user WHERE username = '$username'");
    if (mysqli_fetch_assoc($result)) {
        echo "<script>
                    alert('username sudah terdaftar!');
                  </script>";
        return false;
    }

    $result = mysqli_query($conn, "SELECT email FROM user WHERE email = '$email'");
    if (mysqli_fetch_assoc($result)) {
        echo "<script>
                    alert('email sudah terdaftar!');
                  </script>";
        return false;
    }

    //cek konfirmasi password
    if ($password !== $password2) {
        echo "<script>
                    alert('konfirmasi password tidak sesuai!');
                    </script>";
        return false;
    }

    //enkripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);

    //tambahkan user baru ke database
    return mysqli_query($conn, "INSERT INTO user VALUES('', '$username', '$email', '$password','$role')");
}
