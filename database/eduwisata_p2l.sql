-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 17, 2022 at 03:20 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `eduwisata_p2l`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE `tb_admin` (
  `id_admin` int(5) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `email` varchar(200) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`id_admin`, `nama_lengkap`, `email`, `username`, `password`) VALUES
(1, 'Nimas Ayuning Prameswari', 'anin.nap.na@gmail.com', 'nimas_ap', 'acbf67c001ed2e654a10d73f3ca87d81'),
(4, 'Didik Imron', 'di2k.imron@gmail.com', 'didik_imron', '3e7668c26b2d9f160be923db6550cd62'),
(6, 'Tri Suwartiningsih', '3suwarti.n@gmail.com', 'tri_sn', '8c13345ffab975c2488a99ee4b7a337a'),
(7, 'Hadi Suparno', 'hadisuparno24@gmail.com', 'hadi_suparno', '25d55ad283aa400af464c76d713c07ad'),
(9, 'Khun AA', 'aguero.biru@gmail.com', 'khun_aa', '202cb962ac59075b964b07152d234b70');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kategori`
--

CREATE TABLE `tb_kategori` (
  `id_kategori` int(5) NOT NULL,
  `kategori` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_kategori`
--

INSERT INTO `tb_kategori` (`id_kategori`, `kategori`) VALUES
(1, 'Resmi'),
(2, 'Tidak Resmi');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kegiatan`
--

CREATE TABLE `tb_kegiatan` (
  `id_kegiatan` int(5) NOT NULL,
  `id_kategori` int(5) NOT NULL,
  `id_admin` int(5) NOT NULL,
  `judul` varchar(500) NOT NULL,
  `tgl_posting` date NOT NULL,
  `deskripsi_kegiatan` longtext NOT NULL,
  `dilihat` int(11) NOT NULL,
  `gambar` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_kegiatan`
--

INSERT INTO `tb_kegiatan` (`id_kegiatan`, `id_kategori`, `id_admin`, `judul`, `tgl_posting`, `deskripsi_kegiatan`, `dilihat`, `gambar`) VALUES
(1, 1, 1, 'Panen Raya bersama Ibu Wali Kota Madiun', '2022-07-30', 'Panen Raya kangkung dan padi dilakukan bersama Ibu Wali Kota Madiun dan anggota P2L', 1, 'p2l(3).jpg'),
(2, 1, 1, 'Panen Raya Bersama Bapak Wali Kota Madiun', '2022-08-04', 'Panen Raya kangkung dan padi dilakukan bersama Bapak Wali Kota Madiun dan anggota P2L', 1, 'NTFO2211.jpg'),
(3, 2, 1, 'Panen Padi', '2022-08-05', 'Panen padi bersama warga sekitar', 1, 'IMG_2286.JPG');

-- --------------------------------------------------------

--
-- Table structure for table `tb_tanaman`
--

CREATE TABLE `tb_tanaman` (
  `id_tanaman` int(5) NOT NULL,
  `id_admin` int(5) NOT NULL,
  `tgl_posting` date NOT NULL,
  `nama_tanaman` varchar(200) NOT NULL,
  `nama_latin` varchar(200) NOT NULL,
  `deskripsi` varchar(1000) NOT NULL,
  `gambar_tanaman` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_tanaman`
--

INSERT INTO `tb_tanaman` (`id_tanaman`, `id_admin`, `tgl_posting`, `nama_tanaman`, `nama_latin`, `deskripsi`, `gambar_tanaman`) VALUES
(1, 1, '2022-08-16', 'PADI SERANG', 'Oryza sativa L', 'Beberapa manfaat padi diantaranya mengandung energi yang tinggi, mengobati dan mencegah gangguan pencernaan, untuk obat dan kosmetik, dan masih banyak lagi. Padi jenis Serang merupakan tipe padi varietas unggul yang biasa ditanam oleh petani Indonesia. Jenis padi Serang memiliki rasa yang gurih dan sedikit mengandung rasa manis.', 'IMG_2086.JPG'),
(2, 1, '2022-08-16', 'KACANG SACHA', 'Plukenetia volubilis', 'Kacang sacha adalah jenis tanaman yang menghasilkan biji seperti kacang. Berbagai bagian dari tanaman ini dapat dimanfaatkan. Daunnya mengandung antioksidan dan dapat dimakan sebagai sayur ataupun diolah sebagai teh. Bijinya biasa digunakan dalam campuran bubuk protein, sereal, dan makanan lainnya. Minyak hasil ekstraksi biji sacha inchi memiliki berbagai manfaat baik untuk kosmetik sebagai pelembab dan pencerah kulit. Manfaat lain diantaranya adalah untuk menurunkan kolesterol, asam urat, menyehatkan pencernaan, menurunkan berat badan.', 'IMG_2093.JPG'),
(3, 1, '2022-08-16', 'PISANG CAVENDISH', 'Muca acuminata', 'Pisang Cavendish disebut pisang ambon putih di Indonesia. Manfaat dari pisang ini antara lain adalah untuk menyehatkan pencernaan, membuat ginjal lebih sehat, mengontrol tekanan darah, asupan energi, penguat gigi dan tulang, pencegah anemia, baik untuk mata, menyehatkan jantung, mengatasi asma, baik untuk kesehatan otak, menjaga bentuk badan, masker wajah untuk jerawat, baik untuk lambung, membantu pertumbuhan janin, dan meningkatkan sistem imun tubuh.', 'IMG_2088.JPG'),
(4, 1, '2022-08-16', 'SAWI', 'Brassica', 'Sawi merupakan salah satu jenis sayuran hijau yang baik bagi tubuh karena memiliki kandungan vitamin dan mineral yang dibutuhkan tubuh. Manfaat sawi diantaranya adalah sebagai antioksidan, detoksifikasi tubuh, mencegah kanker, menjaga sistem imun tubuh, mengontrol kadar kolesterol, baik untuk dikonsumsi ibu hamil, membantu menurunkan berat badan, dan lain sebagainya.', 'IMG_2092.JPG'),
(5, 1, '2022-08-16', 'KANGKUNG', 'Ipomea aquatic', 'Kangkung dapat dikonsumsi tidak hanya orang dewasa saja melainkan anak-anak juga sangat dianjurkan untuk mengkonsumsinya agar manfaat kangkung bagi tubuh dapat dirasakan. Manfaat kangkung diantara lain adalah mencegah anemia, mengatasi penyakit kuning, mencegah dehidrasi, menurunkan kolesterol, mencegah radikal bebas, menjaga sistem kekebalan tubuh, melancarkan sistem pencernaan, mencegah sariawan, menjaga kesehatan jantung, dan menjaga kesehatan mata.', 'IMG_2090.JPG'),
(6, 1, '2022-08-16', 'BAYAM', 'Amaranthus', 'Bayam adalah salah satu sayuran yang mengandung vitamin dan mineral yang cukup lengkap. Adapun manfaat bayam diantaranya yaitu dapat mengurangi radang, menjaga sistem kekebalan tubuh, baik bagi penderita diabetes, mencegah kanker, mencegah anemia, menjaga kesehatan mata, menurunkan risiko penyakit kardiovaskular, mencegah asma, menyehatkan tulang, menjaga kesehatan kulit, memberikan manfaat neurologis, menguatkan otot, meningkatkan metabolisme, mencegah aterosklerosis, dan membantu perkembangan janin.', 'IMG_2091.JPG'),
(7, 1, '2022-08-16', 'KACANG PANJANG', 'Vigna unguiculata', 'Kandungan nutrisi yang melimpah dalam kacang panjang akan memberikan berbagai manfaat jangka panjang untuk tubuh. Selain meringankan nyeri haid ada juga manfaat lainnya yaitu dapat meningkatkan kesuburan dan peluang kehamilan, mengatasi depresi, meningkatkan kesehatan tulang, menyehatkan kulit, meningkatkan kesehatan jantung, menjaga imun tubuh, mencegah risiko penyakit stroke, mencegah anemia, mencegah terkena osteoporosis, mencegah sakit kepala, dan lainnya.', 'IMG_2085.JPG'),
(8, 1, '2022-08-16', 'TOMAT', 'Solanum lycopersicum', 'Dengan mengonsumsi buah tomat, dapat mendapatkan berbagai khasiat untuk kesehatan seperti menjaga kesehatan jantung, mencegah kanker, mengatasi diabetes, melancarkan pencernaan, menjaga kesehatan mata, menjaga kesehatan kulit, meningkatkan kesehatan saat hamil, dan masih banyak lagi.', '25.jpg'),
(9, 1, '2022-08-16', 'Cabai', 'Capsicum annum', 'Cabai mengandung berbagai nutrisi, yaitu vitamin A, vitamin B, vitamin C dan vitamin E. Cabai juga mengandung vitamin C tujuh kali lebih banyak daripada buah jeruk. Manfaat cabai diantara lain adalah dapat melindungi tubuh dari radikal bebas, menangkal racun, penghilang rasa sakit, sebagai antibiotik, mengurangi resiko kanker, mencegah serangan jantung, mengurangi resiko penyakit paru-paru, sebagai terapi dan relaksasi, menurunkan tingkat gula darah, dan membantu membakar lemak.', '26.jpg'),
(10, 1, '2022-08-16', 'SELADA', 'Lactuca sativa', 'Daun selada adalah sumber vitamin yang baik, termasuk vitamin A dan vitamin K yang sangat tinggi. Macam-macam manfaat selada yaitu menjaga kesehatan jantung, merawat kecantikan kulit, menjaga kekebalan tubuh, mencegah komplikasi kehamilan, menjaga kesehatan mata, mencegah tulang keropos, melawan infeksi mikroba, mengontrol tekanan darah, mencegah kanker, dan masih banyak lagi.', '28.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(5) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `jenis_kelamin` enum('Perempuan','Laki-Laki','','') NOT NULL,
  `pekerjaan` varchar(100) NOT NULL,
  `alamat` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `nama`, `jenis_kelamin`, `pekerjaan`, `alamat`) VALUES
(1, 'Didik Imron', 'Laki-Laki', 'Swasta', 'Jl.Sidomakmur No.24 RT 26 RW 07 Gedongan, Manguharjo, Madiun');

-- --------------------------------------------------------

--
-- Table structure for table `tb_video`
--

CREATE TABLE `tb_video` (
  `id_video` int(5) NOT NULL,
  `id_kategori` int(5) NOT NULL,
  `id_admin` int(5) NOT NULL,
  `judul` varchar(500) NOT NULL,
  `tgl_posting` date NOT NULL,
  `video` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_video`
--

INSERT INTO `tb_video` (`id_video`, `id_kategori`, `id_admin`, `judul`, `tgl_posting`, `video`) VALUES
(3, 1, 1, 'Panen Raya Bersama Ibu Wali Kota Madiun', '2022-08-13', 'InShot_20220816_122956822.mp4'),
(4, 2, 1, 'Panen Padi', '2022-08-13', 'IMG_2288.MOV'),
(6, 1, 1, 'Panen Raya', '2022-08-14', 'IMG_2198.MOV'),
(10, 1, 1, 'Lomba Kemerdekaan di Kampung Edu Wisata', '2022-08-16', 'InShot_20220816_165158757.mp4');

-- --------------------------------------------------------

--
-- Table structure for table `tb_videoyoutube`
--

CREATE TABLE `tb_videoyoutube` (
  `id` int(5) NOT NULL,
  `nama` varchar(1000) NOT NULL,
  `tgl_posting` date NOT NULL,
  `youtubeid` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_videoyoutube`
--

INSERT INTO `tb_videoyoutube` (`id`, `nama`, `tgl_posting`, `youtubeid`) VALUES
(1, 'Panen Raya Bersama Ibu Wali Kota', '2022-08-17', 'dtxoY72yG18'),
(2, 'Panen Padi', '2022-08-17', 'GqlNNKRLhQ0'),
(3, 'Lomba Kemerdekaan di Kampung Edu Wisata', '2022-08-17', '9msh62Bj2fA');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `tb_kegiatan`
--
ALTER TABLE `tb_kegiatan`
  ADD PRIMARY KEY (`id_kegiatan`),
  ADD KEY `id_kategori` (`id_kategori`),
  ADD KEY `id_pengelola` (`id_admin`);

--
-- Indexes for table `tb_tanaman`
--
ALTER TABLE `tb_tanaman`
  ADD PRIMARY KEY (`id_tanaman`),
  ADD KEY `id_admin` (`id_admin`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `tb_video`
--
ALTER TABLE `tb_video`
  ADD PRIMARY KEY (`id_video`),
  ADD KEY `id_kategori` (`id_kategori`,`id_admin`),
  ADD KEY `id_admin` (`id_admin`);

--
-- Indexes for table `tb_videoyoutube`
--
ALTER TABLE `tb_videoyoutube`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `id_admin` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  MODIFY `id_kategori` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_kegiatan`
--
ALTER TABLE `tb_kegiatan`
  MODIFY `id_kegiatan` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `tb_tanaman`
--
ALTER TABLE `tb_tanaman`
  MODIFY `id_tanaman` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_video`
--
ALTER TABLE `tb_video`
  MODIFY `id_video` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tb_videoyoutube`
--
ALTER TABLE `tb_videoyoutube`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_kegiatan`
--
ALTER TABLE `tb_kegiatan`
  ADD CONSTRAINT `tb_kegiatan_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `tb_kategori` (`id_kategori`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_kegiatan_ibfk_2` FOREIGN KEY (`id_admin`) REFERENCES `tb_admin` (`id_admin`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_tanaman`
--
ALTER TABLE `tb_tanaman`
  ADD CONSTRAINT `tb_tanaman_ibfk_1` FOREIGN KEY (`id_admin`) REFERENCES `tb_admin` (`id_admin`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_video`
--
ALTER TABLE `tb_video`
  ADD CONSTRAINT `tb_video_ibfk_2` FOREIGN KEY (`id_kategori`) REFERENCES `tb_kategori` (`id_kategori`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_video_ibfk_3` FOREIGN KEY (`id_admin`) REFERENCES `tb_admin` (`id_admin`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
