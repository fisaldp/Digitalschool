-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 05, 2021 at 07:07 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pemweb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(40) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL,
  `level` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`, `nama_lengkap`, `foto`, `deskripsi`, `level`) VALUES
(1, 'admin', '$2y$10$J5je.aznSkyK6osLsEwrz.CJ1N32YTLo036emTTubYXBFzWsql94G', 'admin Portal', 'sahawe.jpg', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `berita`
--

CREATE TABLE `berita` (
  `id_berita` int(11) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `teks_berita` text NOT NULL,
  `tgl_posting` datetime NOT NULL,
  `id_admin` int(11) NOT NULL,
  `dilihat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `berita`
--

INSERT INTO `berita` (`id_berita`, `judul`, `id_kategori`, `gambar`, `teks_berita`, `tgl_posting`, `id_admin`, `dilihat`) VALUES
(8, 'Beasiswa Bidikmisi', 10, 'Bidikmisi.jpg', '<p>Cara Mendaftar Beasiswa Bidikmisi</p>\r\n\r\n<ol>\r\n	<li>Buka laman&nbsp;http://daftar.bidikmisi.dikti.go.id&nbsp;atau&nbsp;http://bidikmisi.dikti.go.id</li>\r\n	<li>Pilih menu siswa</li>\r\n	<li>Login (masukkan nomor pendaftaran dan kode akses, bisa didapatkan dari sekolah yang sudah merekomendasikan)</li>\r\n	<li>Pilih menu seleksi</li>\r\n	<li>Pilih tombol Ikuti Seleksi pada kolom SBMPTN (Jika Anda pendaftar SNMPTN, Anda tidak dapat memilih tombol ini sebelum pengumuman SNMPTN)</li>\r\n	<li>Anda akan mendapatkan KAP dan PIN yang dapat Anda gunakan pada laman pendaftaran SBMPTN di&nbsp;http://sbmptn.or.id&nbsp;dan jika anda pendaftar SNMPTN&nbsp;http://snmptn.or.id<br />\r\n	&nbsp;</li>\r\n</ol>\r\n', '2021-06-04 10:55:32', 1, 16),
(9, 'Beasiswa Bank BI', 11, 'Beasiswa Bank BI.jpg', '<p>Cara Mendaftar Beasiswa Bank BI</p>\r\n\r\n<ol>\r\n	<li>Mahasiswa/i jenjang strata 1 (S1).</li>\r\n	<li>Telah menyelesaikan minimal 40 sks atau 3 semester.</li>\r\n	<li>Maksimal berusia 23 tahun atau belum berusia 24 tahun pada saat ditetapkan sebagai penerima beasiswa.</li>\r\n	<li>IPK minimal 3.00 (skala 4).</li>\r\n	<li>Mengisi biodata calon mahasiswa penerima beasiswa BI.</li>\r\n	<li>Surat keterangan kurang mampu dari kelurahan.</li>\r\n	<li>Surat Pernyataan belum bekerja tetap , tidak menerima beasiswa dari instansi lain dan bersedia untuk berperan aktif, mengelola dan mengembangkan Generasi Baru Indonesia (GenBi) serta berpartisipasi dalam kegiatan yang diselenggarakan oleh Bank Indonesia yang diketahui WD III.</li>\r\n	<li>Fotocopy KTM dan KTP.</li>\r\n	<li>Historis nilai.</li>\r\n	<li>Fotokopi halaman depan buku tabungan yang berisi nomor rekening atas nama mahasiswa. yang bersangkutan.</li>\r\n	<li>Membuat resume pribadi dan motivation letter dalam bahasa Indonesia.</li>\r\n	<li>Mempunyai pengalaman menjalankan aktivitas social yang memiliki dampak kebermanfaatan bagi masyarakat.</li>\r\n</ol>\r\n', '2021-06-05 14:30:08', 1, 0),
(10, 'Beasiswa Pemkot Surabaya', 14, 'Beasiswa pemkot.jpeg', '<p>Cara Mendaftar Beasiswa Pemkot Surabaya</p>\r\n\r\n<ol>\r\n	<li>Untuk mendaftar Beasiswa Mahasiswa Surabaya, peserta dapat melakukan pendaftaran secara online pada laman berikut: https://generasiemasdispendik.surabaya.go.id/.</li>\r\n	<li>Klik menu Login. Jika belum mempunyai akun, klik tulisan Register, dan masukkan email, username dan password yang akan digunakan saat login.</li>\r\n	<li>Buka email, kemudian klik link aktivasi yang sudah dikirimkan.</li>\r\n	<li>Login kembali menggunakan username dan password yang sudah dibuat pada website https://generasiemasdispendik.surabaya.go.id.</li>\r\n	<li>Upload softocopy berkas dokumen yang disebutkan di atas pada laman pendaftaran online tersebut.</li>\r\n</ol>\r\n', '2021-06-05 14:36:19', 1, 0),
(13, 'Beasiswa Semen Gresik', 12, 'Beasiswa Semen Gresik.jpg', '<p>Cara Mendaftar Beasiswa Semen Gresik</p>\r\n\r\n<ol>\r\n	<li>Merupakan siswa/i SMA/SMK/Sederajat yang lulus tahun 2018, 2019 dan 2020 dan akan mendaftar sebagai mahasiswa baru tahun 2020.</li>\r\n	<li>Mempunyai keterbatasan ekonomi dibuktikan dengan kepemilikan KIP (Kartu Indonesia Pintar) atau PKH (Program Keluarga Harapan) atau KKS (Kartu Keluarga Sejahtera).</li>\r\n	<li>Mempunyai potensi akademik yang baik, dibuktikan dengan prestasi dan nilai rapor semester 1 s/d 5 (nilai pengetahuan).</li>\r\n	<li>Tidak sedang mendapatkan Beasiswa Unggulan, Beasiswa APERTI BUMN, Bidikmisi atau beasiswa lainnya yang membiayai UKT/SPP secara penuh atau sebagian.</li>\r\n</ol>\r\n', '2021-06-05 14:50:48', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `buku_tamu`
--

CREATE TABLE `buku_tamu` (
  `komentar_id` int(11) NOT NULL,
  `komentar_pengirim` varchar(100) NOT NULL,
  `komentar_email` varchar(100) NOT NULL,
  `komentar_isi` text NOT NULL,
  `komentar_status` enum('ya','tidak') NOT NULL DEFAULT 'tidak',
  `komentar_tgl` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `buku_tamu`
--

INSERT INTO `buku_tamu` (`komentar_id`, `komentar_pengirim`, `komentar_email`, `komentar_isi`, `komentar_status`, `komentar_tgl`) VALUES
(1, 'Faisal', 'faisal.19049@mhs.unesa.ac.id', 'Webnya Informatif Sekali', 'ya', '2021-06-05 16:20:21'),
(2, 'Kemala', 'kemala@gmail.com', 'Asik Webnya', 'ya', '2021-06-05 16:21:03'),
(3, 'Putri', 'putri@gmail.com', 'Fungsinya Sangat Beragam', 'ya', '2021-06-05 16:22:38'),
(4, 'Havina', 'havina@gmail.com', 'Koleksi Bukunya Sangat Lengkap', 'ya', '2021-06-05 16:23:11'),
(5, 'Rian', 'rian@gmail.com', 'yang bikin pingin aku nikahin deh @kemala', 'ya', '2021-06-05 16:50:19'),
(6, 'wahyu', 'wahyu@gmail.com', 'lucu banget webnya', 'ya', '2021-06-05 16:52:29');

-- --------------------------------------------------------

--
-- Table structure for table `ebook`
--

CREATE TABLE `ebook` (
  `id` int(11) NOT NULL,
  `judul` varchar(50) CHARACTER SET latin1 NOT NULL,
  `text_ebook` varchar(500) NOT NULL,
  `nama_file` varchar(50) NOT NULL,
  `kategori` varchar(50) CHARACTER SET latin1 NOT NULL,
  `id_admin` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ebook`
--

INSERT INTO `ebook` (`id`, `judul`, `text_ebook`, `nama_file`, `kategori`, `id_admin`) VALUES
(23, 'Modul Pelatihan Pengelolaan Bank Indonesia', '', 'file_23.pdf', 'Buku Bank Indonesia', '1'),
(25, 'Buku Matematika Kelas X', '', 'file_25.pdf', 'Buku Umum', '1'),
(26, 'Buku Bahasa Indonesia Kelas X', '', 'file_26.pdf', 'Buku Umum', '1'),
(27, 'Buku Bahasa Inggris Kelas X', '', 'file_27.pdf', 'Buku Umum', '1'),
(28, 'Buku Sejarah Kelas X', '', 'file_28.pdf', 'Buku Umum', '1'),
(29, 'Buku Komik Pendidikan', '', 'file_29.pdf', 'Buku Pendidikan', '1'),
(30, 'Modul Pendidikan Anti Korupsi', '', 'file_30.pdf', 'Buku Anti Korupsi', '1'),
(31, 'Buku KPK Integritas', '', 'file_31.pdf', 'Buku Anti Korupsi', '1'),
(32, 'Buku Edukasi Keuangan Untuk Pelajar', '', 'file_32.pdf', 'Buku Bank Indonesia', '1'),
(33, 'Buku Edukasi Keuangan Untuk Pengajar', '', 'file_33.pdf', 'Buku Bank Indonesia', '1'),
(34, 'Buku Administrasi Server 1 Kelas X', '', 'file_34.pdf', 'Buku Siswa SMK', '1'),
(35, 'Buku Administrasi Server 2 Kelas X', '', 'file_35.pdf', 'Buku Siswa SMK', '1'),
(36, 'Buku Jaringan Dasar 1 Kelas X', '', 'file_36.pdf', 'Buku Siswa SMK', '1'),
(37, 'Buku Jaringan Dasar 2 Kelas X', '', 'file_37.pdf', 'Buku Siswa SMK', '1'),
(38, 'Buku Pemrograman Web 1 Kelas X', '', 'file_38.pdf', 'Buku Siswa SMK', '1'),
(39, 'Buku Pemrograman Web 2 Kelas X', '', 'file_39.pdf', 'Buku Siswa SMK', '1'),
(40, 'Buku Perakitan Komputer 1 Kelas X', '', 'file_40.pdf', 'Buku Siswa SMK', '1'),
(41, 'Buku Perakitan Komputer 2 Kelas X', '', 'file_41.pdf', 'Buku Siswa SMK', '1'),
(42, 'Buku Basis Data 1 Kelas XI', '', 'file_42.pdf', 'Buku Siswa SMK', '1'),
(43, 'Buku Basis Data 2 Kelas XI', '', 'file_43.pdf', 'Buku Siswa SMK', '1'),
(44, 'Buku Desain Multimedia 1 Kelas XI', '', 'file_44.pdf', 'Buku Siswa SMK', '1'),
(45, 'Buku Desain Multimedia 2 Kelas XI', '', 'file_45.pdf', 'Buku Siswa SMK', '1'),
(46, 'Buku PBO 1 Kelas XI', '', 'file_46.pdf', 'Buku Siswa SMK', '1'),
(47, 'Buku PBO 2 Kelas XI', '', 'file_47.pdf', 'Buku Siswa SMK', '1'),
(48, 'Buku Sistem Operasi Jaringan 1 Kelas XI', '', 'file_48.pdf', 'Buku Siswa SMK', '1'),
(49, 'Buku Sistem Operasi Jaringan 2 Kelas XI', '', 'file_49.pdf', 'Buku Siswa SMK', '1'),
(51, 'Buku Animasi 2D 1 Kelas XII', '', 'file_51.pdf', 'Buku Siswa SMK', '1'),
(52, 'Buku Animasi 2D 2 Kelas XII', '', 'file_52.pdf', 'Buku Siswa SMK', '1'),
(53, 'Buku Administrasi Server 1 Kelas X', '', 'file_53.pdf', 'Buku Guru SMK', '1'),
(54, 'Buku Administrasi Server 2 Kelas X', '', 'file_54.pdf', 'Buku Guru SMK', '1'),
(55, 'Buku Jaringan Dasar 1 Kelas X', '', 'file_55.pdf', 'Buku Guru SMK', '1'),
(56, 'Buku Jaringan Dasar 2 Kelas X', '', 'file_56.pdf', 'Buku Guru SMK', '1'),
(57, 'Buku Pemrograman Web 1 Kelas X', '', 'file_57.pdf', 'Buku Guru SMK', '1'),
(58, 'Buku Pemrograman Web 2 Kelas X', '', 'file_58.pdf', 'Buku Guru SMK', '1'),
(59, 'Buku Perakitan Komputer 1 Kelas X', '', 'file_59.pdf', 'Buku Guru SMK', '1'),
(60, 'Buku Perakitan Komputer 2 Kelas X', '', 'file_60.pdf', 'Buku Guru SMK', '1'),
(61, 'Buku Basis Data 1 Kelas XI', '', 'file_61.pdf', 'Buku Guru SMK', '1'),
(62, 'Buku Basis Data 2 Kelas XI', '', 'file_62.pdf', 'Buku Guru SMK', '1'),
(63, 'Buku Desain Multimedia 1 Kelas XI', '', 'file_63.pdf', 'Buku Guru SMK', '1'),
(64, 'Buku Desain Multimedia 2 Kelas XI', '', 'file_64.pdf', 'Buku Guru SMK', '1'),
(65, 'Buku PBO 1 Kelas XI', '', 'file_65.pdf', 'Buku Guru SMK', '1'),
(66, 'Buku PBO 2 Kelas XI', '', 'file_66.pdf', 'Buku Guru SMK', '1'),
(67, 'Buku Sistem Operasi Jaringan 1 Kelas XI', '', 'file_67.pdf', 'Buku Guru SMK', '1'),
(68, 'Buku Sistem Operasi Jaringan 2 Kelas XI', '', 'file_68.pdf', 'Buku Guru SMK', '1'),
(69, 'Buku Animasi 2D 1 Kelas XII', '', 'file_69.pdf', 'Buku Guru SMK', '1'),
(70, 'Buku Animasi 2D 2 Kelas XII', '', 'file_70.pdf', 'Buku Guru SMK', '1'),
(71, 'Silabus C1 Fisika Kelas X', '', 'file_71.pdf', 'Silabus SMK', '1'),
(72, 'Silabus C1 Perakitan Komputer Kelas X', '', 'file_72.pdf', 'Silabus SMK', '1'),
(73, 'Silabus C1 Simulasi Digital Kelas X', '', 'file_73.pdf', 'Silabus SMK', '1'),
(74, 'Silabus C1 Sistem Operasi Kelas X', '', 'file_74.pdf', 'Silabus SMK', '1'),
(75, 'Silabus C2 Pemrograman Dasar Kelas X', '', 'file_75.pdf', 'Silabus SMK', '1'),
(76, 'Silabus C2 Jaringan dan Komunikasi Dasar Kelas X', '', 'file_76.pdf', 'Silabus SMK', '1'),
(77, 'Silabus C2 Desain Grafis Dasar Kelas X', '', 'file_77.pdf', 'Silabus SMK', '1'),
(78, 'Silabus C2 Sistem Komputer Kelas X', '', 'file_78.pdf', 'Silabus SMK', '1'),
(79, 'Silabus C3 RPL Basis Data Kelas XI', '', 'file_79.pdf', 'Silabus SMK', '1'),
(80, 'Silabus C3 RPL PBO Kelas XI', '', 'file_80.pdf', 'Silabus SMK', '1'),
(81, 'Silabus C3 RPL Permodelan Perangkat Lunak Kelas XI', '', 'file_81.pdf', 'Silabus SMK', '1'),
(82, 'Silabus C3 RPL Pemrograman Dekstop Kelas XI', '', 'file_82.pdf', 'Silabus SMK', '1'),
(83, 'Silabus C3 RPL Pemrograman Web Kelas XI', '', 'file_83.pdf', 'Silabus SMK', '1'),
(84, 'Silabus C3 RPL Administrasi Basis Data Kelas XII', '', 'file_84.pdf', 'Silabus SMK', '1'),
(85, 'Silabus C3 RPL Pemrograman Grafik Kelas XII', '', 'file_85.pdf', 'Silabus SMK', '1'),
(86, 'Silabus C3 RPL Pemrograman Perangkat Dinamis Kelas', '', 'file_86.pdf', 'Silabus SMK', '1'),
(87, 'Silabus C3 RPL Kerja Proyek Kelas XII', '', 'file_87.pdf', 'Silabus SMK', '1'),
(88, 'Silabus C3 MM Desain Multimedia Kelas XI', '', 'file_88.pdf', 'Silabus SMK', '1'),
(89, 'Silabus C3 MM Animasi 2D Kelas XI', '', 'file_89.pdf', 'Silabus SMK', '1'),
(90, 'Silabus C3 MM Animasi 3D Kelas XI', '', 'file_90.pdf', 'Silabus SMK', '1'),
(91, 'Silabus C3 MM Komposisi Foto Digital Kelas XI', '', 'file_91.pdf', 'Silabus SMK', '1'),
(92, 'Silabus C3 MM Pengolahan Citra Digital Kelas XI', '', 'file_92.pdf', 'Silabus SMK', '1'),
(93, 'Silabus C3 MM Pengambilan Gambar Bergerak Kelas XI', '', 'file_93.pdf', 'Silabus SMK', '1'),
(94, 'Silabus C3 MM Teknik Pengolahan Audio Kelas XII', '', 'file_94.pdf', 'Silabus SMK', '1'),
(95, 'Silabus C3 MM Teknik Pengolahan Video Kelas XII', '', 'file_95.pdf', 'Silabus SMK', '1'),
(96, 'Silabus C3 MM Kerja Proyek Kelas XII', '', 'file_96.pdf', 'Silabus SMK', '1'),
(97, 'Silabus C3 TKJ Administrasi Sistem Jaringan Kelas ', '', 'file_97.pdf', 'Silabus SMK', '1'),
(98, 'Silabus C3 TKJ Administrasi Server Kelas XI', '', 'file_98.pdf', 'Silabus SMK', '1'),
(99, 'Silabus C3 TKJ Komunikasi Data Kelas XI', '', 'file_99.pdf', 'Silabus SMK', '1'),
(100, 'Silabus C3 TKJ Komputer Terapan Kelas XI', '', 'file_100.pdf', 'Silabus SMK', '1'),
(101, 'Silabus C3 TKJ Rancang Bangun Jaringan Kelas XI', '', 'file_101.pdf', 'Silabus SMK', '1'),
(102, 'Silabus C3 TKJ Jaringan Nirkabel Kelas XII', '', 'file_102.pdf', 'Silabus SMK', '1'),
(103, 'Silabus C3 TKJ Keamanan Jaringan Kelas XII', '', 'file_103.pdf', 'Silabus SMK', '1'),
(104, 'Silabus C3 TKJ Troubleshooting Jaringan Kelas XII', '', 'file_104.pdf', 'Silabus SMK', '1'),
(105, 'Silabus C3 TKJ Kerja Proyek Kelas XII', '', 'file_105.pdf', 'Silabus SMK', '1');

-- --------------------------------------------------------

--
-- Table structure for table `halaman`
--

CREATE TABLE `halaman` (
  `id_hal` int(11) NOT NULL,
  `nm_halaman` varchar(30) NOT NULL,
  `link` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `halaman`
--

INSERT INTO `halaman` (`id_hal`, `nm_halaman`, `link`) VALUES
(1, 'E-BSD', 'ebookbsd.php'),
(2, 'Tentang Kami', 'about.php'),
(3, 'Saran & Masukan', 'buku-tamu.php'),
(5, 'Kontak', 'contact.php'),
(6, 'Login', 'webadmin/index.php');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `kategori` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `kategori`) VALUES
(10, 'Beasiswa Bidikmisi'),
(11, 'Beasiswa Bank BI'),
(12, 'Beasiswa Semen Gresik'),
(14, 'Beasiswa Pemkot Surabaya');

-- --------------------------------------------------------

--
-- Table structure for table `komentar`
--

CREATE TABLE `komentar` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `pesan` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id_berita`);

--
-- Indexes for table `buku_tamu`
--
ALTER TABLE `buku_tamu`
  ADD PRIMARY KEY (`komentar_id`);

--
-- Indexes for table `ebook`
--
ALTER TABLE `ebook`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `halaman`
--
ALTER TABLE `halaman`
  ADD PRIMARY KEY (`id_hal`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `komentar`
--
ALTER TABLE `komentar`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `berita`
--
ALTER TABLE `berita`
  MODIFY `id_berita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `buku_tamu`
--
ALTER TABLE `buku_tamu`
  MODIFY `komentar_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `ebook`
--
ALTER TABLE `ebook`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- AUTO_INCREMENT for table `halaman`
--
ALTER TABLE `halaman`
  MODIFY `id_hal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `komentar`
--
ALTER TABLE `komentar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
