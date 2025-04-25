-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 25, 2025 at 07:48 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_surat`
--

-- --------------------------------------------------------

--
-- Table structure for table `disposisi`
--

CREATE TABLE `disposisi` (
  `id_disposisi` int(11) NOT NULL,
  `id_surat` int(11) NOT NULL,
  `tujuan` varchar(255) NOT NULL,
  `isi_surat` varchar(255) NOT NULL,
  `status` enum('pending','diteruskan','selesai','') NOT NULL,
  `tanggal_disposisi` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `nominatif_asn`
--

CREATE TABLE `nominatif_asn` (
  `id` int(11) NOT NULL,
  `nip` varchar(255) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `tempat_lahir` varchar(100) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `pangkat_golongan` varchar(20) NOT NULL,
  `pangkat_tmt` varchar(20) NOT NULL,
  `nama_jabatan_eselon` varchar(255) NOT NULL,
  `jabatan_eselon_tmt` varchar(20) NOT NULL,
  `bulan_masakerja` int(20) NOT NULL,
  `tahun_masakerja` int(20) NOT NULL,
  `nama_diklat` varchar(255) DEFAULT NULL,
  `bulan_diklat` int(20) DEFAULT NULL,
  `tahun_diklat` int(20) DEFAULT NULL,
  `jumlah_jam_diklat` varchar(100) DEFAULT NULL,
  `tingkat_pendidikan_terakhir` varchar(50) NOT NULL,
  `jurusan` varchar(50) NOT NULL,
  `instansi_sekolah` varchar(100) NOT NULL,
  `tahun_lulus_pendidikan` int(20) NOT NULL,
  `no_ijazah` varchar(100) NOT NULL,
  `usia` int(100) NOT NULL,
  `agama` enum('Islam','Katolik','Protestan','Budha','Hindu','Konghucu','Lainnya') NOT NULL,
  `karpeg` varchar(100) NOT NULL,
  `jenis_kelamin` enum('laki-laki','perempuan','.','') NOT NULL,
  `asal` varchar(100) NOT NULL,
  `kgb` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `nominatif_asn`
--

INSERT INTO `nominatif_asn` (`id`, `nip`, `nama_lengkap`, `tempat_lahir`, `tanggal_lahir`, `pangkat_golongan`, `pangkat_tmt`, `nama_jabatan_eselon`, `jabatan_eselon_tmt`, `bulan_masakerja`, `tahun_masakerja`, `nama_diklat`, `bulan_diklat`, `tahun_diklat`, `jumlah_jam_diklat`, `tingkat_pendidikan_terakhir`, `jurusan`, `instansi_sekolah`, `tahun_lulus_pendidikan`, `no_ijazah`, `usia`, `agama`, `karpeg`, `jenis_kelamin`, `asal`, `kgb`) VALUES
(14, '19810323 199912 1 004', 'KARMIN EKO. E. WADOR, S.STP, M.Si', 'Bade', '1981-03-23', 'Pembina (IV/b)', '2024-06-01', 'Kepala Biro Pemerintahan, Otsus & Kesra Setda Provinsi Papua Selatan', '2023-11-13', 21, 1, 'PKN TK.II', 9, 2024, NULL, 'S-II', 'Magister Sains', 'IPDN', 2008, '423.7/466/PPs.MAPD/08', 43, 'Islam', 'K.000788', 'laki-laki', 'Non-OAP', NULL),
(15, '19720713 199203 1 010', 'Drs. JOSAFAT FONATABA, M.AP', 'Manokwari', '1972-07-13', 'Pembina (IV/a)', '2024-04-01', 'Kepala Bagian Pemerintahan pada Biro Pemerintahan, Otsus & Kesra Setda Provinsi Papua Selatan', '2023-04-03', 27, 1, NULL, NULL, NULL, NULL, 'S-II', 'Administrasi Publik', 'Universitas Cenderawasih', 2016, '0010/11.6/2016', 52, 'Protestan', 'F.362027', 'laki-laki', 'Non-OAP', '2023-03-01'),
(16, '19740122 200112 1 004', 'JENSEN JANRI, S.Sos', 'Manado', '1974-01-22', 'Penata Tk. I (III/d)', '2022-04-01', 'Kepala Bagian Kesra pada Biro Pemerintahan, Otsus & Kesra Setda Provinsi Papua Selatan', '2023-04-03', 17, 4, NULL, NULL, NULL, NULL, 'S-I', 'Ilmu Sosial', 'STIA KARYA DHARMA', 2005, '12310056', 50, 'Protestan', 'L.011484', 'laki-laki', 'Non-OAP', NULL),
(17, '19850818 200412 1 001', 'AGUSTINUS TARYUSRI, S,STP', 'Pemalang', '1985-08-18', 'Pembina (IV/a)', '2024-04-01', 'Kasubbag Evaluasi & Penyelenggaraan Pemerintahan Bag. Otsus pada Biro Pemerintahan, Otsus & Kesra Setda Provinsi Papua Selatan', '2023-04-03', 15, 6, NULL, NULL, NULL, NULL, 'D-IV', 'Ilmu Pemerintahan', 'IPDN', 2006, '423.7/761/XVI/IPDN/2008', 39, 'Islam', 'N.012762', 'laki-laki', 'Non-OAP', '2023-10-01'),
(18, '19870706 200701 1 001', 'DESWY TATAWALAT, S.IP', 'Merauke', '1987-07-06', 'Pembina (IV/a)', '2020-04-01', 'Kasubbag Administrasi Kepala Daerah dan DPRD Bag. Otsus pada Biro Pemerintahan, Otsus & Kesra Setda Provinsi Papua Selatan', '2023-04-03', 14, 6, NULL, NULL, NULL, NULL, 'S-I', 'Ilmu Pemerintahan', 'IPDN', 2009, '423.7/0843/XVIII/IPDN/2009', 37, 'Islam', '6038440000000000', 'laki-laki', 'Non-OAP', NULL),
(19, '19690701 199203 1 011', 'MUSLIMIN', 'Rantepao', '1969-07-01', 'Pembina (IV/a)', '2022-04-01', 'Pelaksana pada Subbag Administrasi Kepala Daerah dan DPRD Bag. Otsus pada Biro Pemerintahan, Otsus & Kesra Setda Provinsi Papua Selatan', '2023-04-01', 27, 1, NULL, NULL, NULL, NULL, 'STM', 'STM', 'Santo Anthonius Merauke', 1989, '98 OC DM 0002972', 55, 'Islam', 'G.184573', 'laki-laki', 'Non-OAP', '2023-03-01'),
(20, '19710823 199203 1 009', 'HASAN', 'Banda', '1971-08-23', 'Pembina (IV/a)', '2022-10-01', 'Pelaksana pada Subbag Evaluasi & Penyelenggaraan Pemerintahan Bag. Otsus pada Biro Pemerintahan, Otsus & Kesra Setda Provinsi Papua Selatan', '2023-04-01', 27, 1, NULL, NULL, NULL, NULL, 'S-I', 'ILMU ADMINISTRASI NEGARA', 'STIA KARYA DHARMA', 2003, '1231003197', 53, 'Islam', 'F.329324', 'laki-laki', 'Non-OAP', '2023-03-01'),
(21, '19730502 200012 2 002', 'EMILIA, S.E', 'Merauke', '1973-05-02', 'Penata Tk. I (III/d)', '2013-04-01', 'Kasubbag Perpustakaan Bag. Kesra pada Biro Pemerintahan, Otsus & Kesra Setda Provinsi Papua Selatan', '2023-04-03', 23, 4, NULL, NULL, NULL, NULL, 'S-I', 'Ilmu Ekonomi', 'UNIVERSITAS CENDERAWASIH', 1997, '97.5.16.1.0.5203', 51, 'Katolik', 'K.029920', 'perempuan', 'Non-OAP', NULL),
(22, '19831125 200212 2 001', 'FADILA, S.STP', 'Merauke', '1983-11-25', 'Penata Tk. I (III/d)', '2016-10-01', 'Kasubbag Administrasi & Fasilitasi Penataan Wilayah Bag. Pemerintahan pada Biro Pemerintahan, Otsus & Kesra Setda Provinsi Papua Selatan', '2023-04-03', 17, 6, NULL, NULL, NULL, NULL, 'D-IV', 'Ilmu Pemerintahan', 'IPDN', 2006, '423.7/144/XIV/STPDN/2006', 41, 'Islam', 'M.019969', 'perempuan', 'Non-OAP', NULL),
(23, '19740524 200605 1 001', 'ALEXIUS DARMAN RONGGO, S.Si', 'Elar', '1974-05-24', 'Penata Tk. I (III/d)', '2021-10-01', 'Kasubbag Bina Mental Spritual Bag. Kesra pada Biro Pemerintahan, Otsus & Kesra Setda Provinsi Papua Selatan', '2023-04-03', 21, 3, NULL, NULL, NULL, NULL, 'S-I', 'Ilmu Sains', 'UNIV. ATMA JAYA YOGYAKARTA', 2002, '08 93 2002 080', 50, 'Katolik', 'P.687940', 'laki-laki', 'Non-OAP', NULL),
(24, '19850608 200701 1 001', 'ERMA, S.IP', 'Sawaerma', '1985-06-08', 'Penata Tk. I (III/d)', '2021-10-01', 'Kasubbag Tata Usaha Bag. Otsus pada Biro Pemerintahan, Otsus & Kesra Provinsi Papua Selatan', '2023-04-03', 14, 8, NULL, NULL, NULL, NULL, 'S-I', 'Ilmu Pemerintahan', 'IPDN', 2009, '423.7/1191/XVIII/IPDN/2009', 39, 'Islam', 'P.006107', 'laki-laki', 'Non-OAP', '2023-03-01'),
(25, '19870330 200701 1 001', 'ALBERT STEVEN RAHAIL, S.IP', 'Senggo', '1987-03-30', 'Penata Tk. I (III/d)', '2021-04-01', 'Kasubbag Pelayanan Dasar Bag. Kesra pada Biro Pemerintahan, Otsus & Kesra Setda Provinsi Papua Selatan', '2023-04-03', 14, 8, NULL, NULL, NULL, NULL, 'S-I', 'Ilmu Pemerintahan', 'IPDN', 2009, '423.7/0474/XVIII/IPDN/2009', 37, 'Katolik', 'P.006001', 'laki-laki', 'Non-OAP', '2023-03-01'),
(26, '19720606 199503 2 004', 'YETTI INDRAWATI, S. IP, MM', 'Merauke', '1972-06-06', 'Penata Tk. I (III/d)', '2022-04-01', 'Kasubbag Non Pelayanan Dasar Bag. Kesra pada Biro Pemerintahan, Otsus & Kesra Setda Provinsi Papua Selatan', '2023-04-03', 24, 1, NULL, NULL, NULL, NULL, 'S-II', 'Magister Sains', 'Universitas Yapis Papua', 2019, '611012019000336', 52, 'Protestan', 'G.318029', 'perempuan', 'Non-OAP', '2024-03-01'),
(27, '19690906 200112 1 002', 'SYAMSUDDIN, S.Ag', 'Ujung Pandang', '1969-09-06', 'Penata Tk. I (III/d)', '2014-04-01', 'Pelaksana pada subbag Bina Mental Spritual Bag. Kesra pada Biro Pemerintahan, Otsus & Kesra Setda Provinsi Papua Selatan', '2023-07-01', 23, 5, NULL, NULL, NULL, NULL, 'S-I', 'Ilmu Agama', 'Institut Agama Islam DDI', 1998, 'KS.II/PP 01.1/3117/98', 55, 'Islam', 'L. 010752', 'laki-laki', 'Non-OAP', NULL),
(28, '19760901 200312 1 006', 'RIKARDO, S.E', 'Jakarta', '1976-09-01', 'Penata Tk. I (III/d)', '2016-04-01', 'Pelaksana pada Subbag Perpustakaan Bag. Kesra pada Biro Pemerintahan, Otsus & Kesra Setda Provinsi Papua Selatan', '2023-04-01', 20, 4, NULL, NULL, NULL, NULL, 'S-I', 'Ilmu Ekonomi Akuntansi', 'STIE YAYASAN KELUARGA PAHLAWAN NEGARA YOGYAKARTA', 2001, '121/IX/2001', 48, 'Protestan', 'M.073729', 'laki-laki', 'Non-OAP', '2023-12-01'),
(29, '19810407 200605 1 001', 'MUHAMMAD IRIANSYAH', 'Merauke', '1981-04-07', 'Penata Tk. I (III/d)', '2022-04-01', 'Pelaksana pada Administrasi & Fasilitasi Penataan Wilayah Bag. Pemerintahan pada Biro Pemerintahan, Otsus & Kesra Setda Provinsi Papua Selatan', '2023-04-01', 15, 11, NULL, NULL, NULL, NULL, 'S-I', 'Ilmu Administrasi Negara', 'STIA KARYA DHARMA', 2010, '1231010473', 43, 'Islam', 'N.342319', 'laki-laki', 'Non-OAP', '2023-04-01'),
(30, '19770712 199712 1 002', 'ABRAHAM SOTER MINIP, A.Md.IP', 'Merauke', '1977-07-12', 'Penata (III/c)', '2020-04-01', 'Kasubbag Pemerintahan Umum & Kerja Sama Bag. Pemerintahan pada Biro Pemerintahan, Otsus & Kesra Setda Provinsi Papua Selatan', '2023-04-04', 21, 4, NULL, NULL, NULL, NULL, 'D-III', 'Ilmu Pemerintahan', 'UNIVERSITAS CENDERAWASIH', 2006, '06.3.17.0.0.15731', 47, 'Katolik', 'H.049542', 'laki-laki', 'OAP', NULL),
(31, '19831121 201004 1 001', 'HARYSTON GEBED PHE ETE, S.IP', 'Merauke', '1983-11-21', 'Penata (III/c)', '2020-04-01', 'Kasubbag Pengelolaan Perbatasan daerah Bag. Pemerintahan pada Biro Pemerintahan, Otsus & Kesra Setda Provinsi Papua Selatan', '2023-04-04', 14, 0, NULL, NULL, NULL, NULL, 'S-I', 'Ilmu Pemerintahan', 'STIP AN', 2006, '023033040023120061', 41, 'Katolik', 'B.09003235', 'laki-laki', 'OAP', NULL),
(32, '19910921 201206 2 001', 'AVIA  ADRIANA BASIK BASIK, S.STP', 'Merauke', '1991-09-21', 'Penata (III/c)', '2021-10-01', 'Kasubbag Pengembangan Otsus & Penataan Urusan Bag. Otsus pada Biro Pemerintahan, Otsus & Kesra Provinsi Papua Selatan', '2023-04-04', 10, 6, NULL, NULL, NULL, NULL, 'D-IV', 'Ilmu Pemerintahan', 'IPDN', 2013, '423.7/1183/XX/IPDN/2013', 33, 'Protestan', 'Q.343349', 'perempuan', 'OAP', '2023-10-01'),
(33, '19730910 201512 2 001', 'LENI MARSAURIA, S.Sos', 'Kuala Simpang', '1973-09-10', 'Penata Muda Tk. I (I', '2021-04-01', 'Pelaksana pada Subbag Pengembangan Otsus & Penataan Urusan Bag. Otsus pada Biro Pemerintahan, Otsus & Kesra Setda Provinsi Papua Selatan', '2023-04-01', 19, 3, NULL, NULL, NULL, NULL, 'S-I', 'Ilmu Administrasi Negara', 'UNIVERSITAS HKBP NOMMENSEN', 1998, '1478/S-1/NIA/98', 51, 'Protestan', 'B.09017371', 'perempuan', 'Non-OAP', NULL),
(34, '199504162018082000', 'MARIA MATHILDA ELISABETH RIRY AYOMI,S.STP', 'Merauke', '1995-04-16', 'Penata Muda (III/a)', '2019-08-01', 'Pelaksana pada Subbag Pelayanan Dasar Bag. Kesra pada Biro Pemerintahan, Otsus & Kesra Setda Provinsi Papua Selatan', '2023-08-01', 1, 0, NULL, NULL, NULL, NULL, 'S-I', 'Ilmu Pemerintahan', 'IPDN', 2018, '833/0450/IPDN', 29, 'Protestan', 'B.0042990', 'perempuan', 'Non-OAP', NULL),
(35, '19841108 201004 2004', 'TRANINGSIH, S.IP', 'Merauke', '1984-11-08', 'Penata Muda (III/a)', '2019-10-01', 'Pelaksana pada Tata Usaha Bag. Otsus pada Biro Pemerintahan, Otsus & Kesra Provinsi Papua Selatan', '2023-04-01', 9, 0, NULL, NULL, NULL, NULL, 'S-I', 'Ilmu Pemerintahan', 'UNIVERSITAS TERBUKA', 2014, 'CA 010943/32014301033', 40, 'Islam', 'B.09002098', 'perempuan', 'Non-OAP', '2023-04-01'),
(36, '198412032023112000', 'KLARCE PAULINA BARANSANO, S.IP', 'Jayapura', '1984-12-03', 'Penata Muda (III/a)', '2023-11-01', 'Pelaksana pada subbag Pengelolaan Perbatasan Daerah Bag. Pemerintahan Biro Pemerintahan, Otsus & Kesra Setda Provinsi Papua Selatan', '2023-11-01', 7, 0, NULL, NULL, NULL, NULL, 'S-I', 'Ilmu Pemerintahan', 'UNIVERSITAS YAPIS PAPUA', 2010, 'B65201-0045/UYP-01312/02/2010', 0, 'Protestan', '', 'perempuan', 'OAP', NULL),
(37, '19880105 201004 2 001', 'SITI NURSOLICHAH', 'Jombang', '1988-01-05', 'Pengatur Tk. I (II/d', '2022-04-01', 'Pelaksana pada Subbag Pemerintahan Umum & Kerja Sama Bag. Pemerintahan pada Biro Pemerintahan, Otsus & Kesra Setda Provinsi Papua Selatan', '2023-04-01', 13, 0, NULL, NULL, NULL, NULL, 'SMK', 'Bisnis Manajemen', 'SMK WDIJAYA', 2006, 'DN-05Mk0343330', 36, 'Islam', 'A.09006890', 'perempuan', 'Non-OAP', '2023-04-01'),
(38, '1979081520233110000', 'LUSYE TRISYE MANSNEMBRA, A.Md.IP', 'Biak Numfor', '1979-08-15', 'Pengatur (II/c)', '2023-11-01', 'Pelaksana pada subbag Non Pelayanan Dasar Bag. Kesra pada Biro Pemerintahan, Otsus & Kesra Setda Provinsi Papua Selatan', '2023-11-01', 8, 9, NULL, NULL, NULL, NULL, 'D-III', 'Ilmu Pemerintahan', 'UNIVERSITAS CENDERAWASIH', 2006, '06.3.17.0.0.15876', 0, 'Protestan', '', 'perempuan', 'OAP', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE `tb_admin` (
  `id_admin` int(10) NOT NULL,
  `nama_admin` varchar(50) NOT NULL,
  `username_admin` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `gambar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`id_admin`, `nama_admin`, `username_admin`, `password`, `gambar`) VALUES
(1, 'admin', 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'admin.jpg'),
(2, 'admin2', 'admin2', '315f166c5aca63a157f7d41007675cb44a948b33', 'admin2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_bagian`
--

CREATE TABLE `tb_bagian` (
  `id_bagian` int(11) NOT NULL,
  `nama_bagian` varchar(120) NOT NULL,
  `username_admin_bagian` varchar(50) NOT NULL,
  `password_bagian` varchar(50) NOT NULL,
  `nama_lengkap` varchar(70) NOT NULL,
  `tanggal_lahir_bagian` date NOT NULL,
  `alamat` text NOT NULL,
  `no_hp_bagian` varchar(12) NOT NULL,
  `gambar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tb_bagian`
--

INSERT INTO `tb_bagian` (`id_bagian`, `nama_bagian`, `username_admin_bagian`, `password_bagian`, `nama_lengkap`, `tanggal_lahir_bagian`, `alamat`, `no_hp_bagian`, `gambar`) VALUES
(1, 'WALIKOTA', 'walikota', 'daaf9486f7039e0087f268db4215998bfb6185cb', 'walikota', '2017-05-25', 'samarinda', '081222222222', 'walikota.jpg'),
(2, 'WAKIL WALIKOTA', 'wawali', '61e1322f11261e3c4c9c8631f86bc70237c5ee42', 'wawali', '2017-11-04', 'samarinda', '081222222222', 'wawali.jpg'),
(3, 'SEKDA', 'sekda', 'ba09b363755a11c5a46f1be9a8dd6e579a1c75b7', 'SEKDA', '2017-11-10', 'Samarinda', '081299101309', 'sekda.jpg'),
(4, 'PLH.SEKDA', 'plh sekda', 'ce26252389e1562bdd0a4094270b2cfb2d16f6be', 'plh sekda', '2017-11-10', 'Samarinda', '087731311111', 'plh sekda.jpg'),
(5, 'ASS.I', 'ass i', '972a3c20bb3d97797348df57ec7d81185de5ce17', 'ass i', '2017-11-10', 'samarinda', '322222222222', 'ass i.jpg'),
(6, 'PLT.ASS.I', 'plt ass i', '4182b75e1a82d3e2d1751e9d903eefad6a80d212', 'plt ass i', '2017-11-03', 'samarinda', '233333333333', 'plt ass i.jpg'),
(7, 'PLT.ASS.II', 'plt ass ii', '3f17afaf0a4238fdd1ddc0c3a88686fb96f5c68c', 'plt ass ii', '2017-11-10', 'bpp', '344444444444', 'plt ass ii.jpg'),
(8, 'ASS.III', 'ass iii', 'fed0054dcfee81465402afa25f65e9f66cb697af', 'ass iii', '2017-11-01', 'bpp', '222222222222', 'ass iii.png'),
(9, 'UMUM', 'umum', 'b617726c7f45ecb196ef74881089fa17d90d7276', 'umum', '2017-11-17', 'smd', '333333333333', 'umum.jpg'),
(10, 'TU', 'tu', 'a3da4c6307d230e1f1c8ad62e00d05ff1f1f5b52', 'tu', '2017-11-10', 'badak', '24224242', 'tu.png'),
(11, 'KESRA', 'kesra', '983a6611e9d0f6e5601896247285eb2858ff46bd', 'kesra', '2017-11-17', 'bpp', '098979989999', 'kesra.png'),
(12, 'ADM.PEMB', 'adm pemb', '263bca10cf6fe2407537f3da354c2a5bd41f0046', 'adm pemb', '2017-11-07', 'samarinda', '089836323711', 'adm pemb.jpg'),
(13, 'ORTAL', 'ortal', '1e760e356d62c56a70893e1d3843c1c89b4a2212', 'ortal', '2017-11-13', 'samarinda', '081299101309', 'ortal.jpg'),
(14, 'PEM-OTDA', 'pem-otda', '278f69af54d64f658a430ecc6e060a9c936cba75', 'pem-otda', '2017-11-13', 'samarinda', '081222222222', 'pem-otda.jpg'),
(15, 'EKONOMI & SDA', 'ekonomi', 'edbc608bc611081ad29a586f1a328fc553a83cb5', 'ekonomi', '2017-11-15', 'samarinda', '081299101309', 'ekonomi.jpg'),
(16, 'HUKUM', 'hukum', 'ab86e34c8b761c9e534f9c020f83cb927c1ad673', 'hukum', '2017-11-15', 'Balikpapan', '081222222222', 'hukum.png'),
(17, 'BKPPD', 'bkppd', '50818d7e0331a1dec698c35c32af22556f90fb1a', 'bkppd', '2017-12-01', 'samarinda', '081299101309', 'bkppd.png'),
(18, 'PROTOKOL', 'protokol', 'a50492e61cab897b02e491d340de4083cb74f537', 'protokol', '2017-12-01', 'samarinda', '081242424223', 'protokol.png'),
(19, 'HUMAS', 'humas', 'b4c4048e1c66effb3ac466b6f33df58c0e93672c', 'humas', '2017-12-01', 'samarinda', '081344444444', 'humas.png'),
(20, 'INFRASTRUKTUR', 'infrastruktur', 'cc48a8c41985da07efc915fea8fc0ac3bec7f0e9', 'infrastruktur', '2017-12-01', 'smd', '083455253225', 'infrastruktur.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_berkasdigital`
--

CREATE TABLE `tb_berkasdigital` (
  `id_berkas` int(11) NOT NULL,
  `nip` varchar(50) NOT NULL,
  `nama_dokumen` varchar(50) NOT NULL,
  `kategori_dokumen` varchar(50) NOT NULL,
  `tanggal_upload` date NOT NULL,
  `file_path` text NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_galeri`
--

CREATE TABLE `tb_galeri` (
  `id` int(11) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `tanggal` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_informasikepegawaian`
--

CREATE TABLE `tb_informasikepegawaian` (
  `id_info` int(11) NOT NULL,
  `nip` varchar(100) NOT NULL,
  `riwayat_pendidikan` text NOT NULL,
  `riwayat_diklat` text NOT NULL,
  `riwayat_jabatan` text NOT NULL,
  `riwayat_mutasi` text NOT NULL,
  `riwayat_penghargaan` text NOT NULL,
  `tugas_belajar` tinyint(1) NOT NULL,
  `izin_belajar` tinyint(1) NOT NULL,
  `masa_kerja_tahun` int(11) NOT NULL,
  `masa_kerja_bulan` int(11) NOT NULL,
  `catatan_lain` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_laporan`
--

CREATE TABLE `tb_laporan` (
  `id` int(11) NOT NULL,
  `nama_pegawai` varchar(255) NOT NULL,
  `dokumentasi` varchar(255) NOT NULL,
  `file_laporan` varchar(255) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_riwayat_kgp_kp`
--

CREATE TABLE `tb_riwayat_kgp_kp` (
  `id_riwayat` int(11) NOT NULL,
  `nip` varchar(100) NOT NULL,
  `jenis_kenaikan` enum('KGB','KP','','') NOT NULL,
  `pangkat_gol_sebelumnya` varchar(50) NOT NULL,
  `pangkat_gol_sekarang` varchar(50) NOT NULL,
  `tmt_kenaikan` date NOT NULL,
  `no_sk` varchar(50) NOT NULL,
  `tanggal_sk` date NOT NULL,
  `penandatanganan_sk` varchar(50) NOT NULL,
  `file_sk` text NOT NULL,
  `status_proses` enum('sudah','belum','ditolak','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_sptsppd`
--

CREATE TABLE `tb_sptsppd` (
  `id` int(11) NOT NULL,
  `pegawai` varchar(200) NOT NULL,
  `tujuan` varchar(100) NOT NULL,
  `spt` varchar(100) NOT NULL,
  `sppd` varchar(100) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_sptsppd`
--

INSERT INTO `tb_sptsppd` (`id`, `pegawai`, `tujuan`, `spt`, `sppd`, `tanggal`) VALUES
(2, 'Adi Prasetyo', 'Papua ', 'jkj', 'jkjk', '0000-00-00'),
(4, 'DESWY TATAWALAT, S.IP', 'Papua Pegunungan', '1745559780_spt_Notulensi Rapat DR_09-04-2025.pdf', '1745559780_sppd_Notulensi Rapat DR_09-04-2025.pdf', '2025-04-25');

-- --------------------------------------------------------

--
-- Table structure for table `tb_suratkeluar`
--

CREATE TABLE `tb_suratkeluar` (
  `id_suratkeluar` int(11) NOT NULL,
  `tanggalkeluar_suratkeluar` datetime NOT NULL,
  `kode_suratkeluar` varchar(10) NOT NULL,
  `nomor_suratkeluar` varchar(45) NOT NULL,
  `nama_bagian` varchar(70) NOT NULL,
  `tanggalsurat_suratkeluar` date NOT NULL,
  `kepada_suratkeluar` varchar(255) NOT NULL,
  `perihal_suratkeluar` text NOT NULL,
  `file_suratkeluar` varchar(255) NOT NULL,
  `operator` varchar(50) NOT NULL,
  `tanggal_entry` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tb_suratkeluar`
--

INSERT INTO `tb_suratkeluar` (`id_suratkeluar`, `tanggalkeluar_suratkeluar`, `kode_suratkeluar`, `nomor_suratkeluar`, `nama_bagian`, `tanggalsurat_suratkeluar`, `kepada_suratkeluar`, `perihal_suratkeluar`, `file_suratkeluar`, `operator`, `tanggal_entry`) VALUES
(27, '2017-11-15 11:15:00', '411', '3451/WALIKOTA/2017', 'WALIKOTA', '2017-11-15', 'Masyarakat', 'Himbauan Gotong Royong', '2017-3451.pdf', 'admin', '2017-11-18 01:25:31'),
(29, '2017-11-15 08:20:00', '851', '3453/TU/2017', 'TU', '2017-11-15', 'Kepala Bagian Tata Usaha', 'Cuti Tahunan ', '2017-3453.pdf', 'admin', '2017-11-18 02:39:32'),
(30, '2017-11-14 13:25:00', '915.1', '3454/ADM.PEMB/2017', 'ADM.PEMB', '2017-11-15', 'Walikota', 'Daftar Usulan Proyek', '2017-3454.pdf', 'admin', '2017-11-14 23:29:41'),
(31, '2017-11-17 08:30:00', '125.4', '3455/PEM-OTDA/2017', 'PEM-OTDA', '2017-11-16', 'Camat Samarida Seberang', 'Pemekaran Wilayah', '2017-3455.pdf', 'admin', '2017-11-16 02:30:02'),
(35, '2017-11-17 08:30:00', '821.1', '3452/TU/2017', 'TU', '2017-11-16', 'Kepala Bagian Lingkup Pemkot Samarinda', 'Pengangkatan Jabatan Pegawai Negeri ', '2017-3452.pdf', 'admin', '2017-11-16 17:35:35'),
(88, '2017-11-17 08:45:00', '476.4', '3456/KESRA/2017', 'KESRA', '2017-11-17', 'Lurah SE-KOTA SAMARINDA', 'Peninjauan Kampung KB', '2017-3456.pdf', 'admin', '2017-11-17 02:58:51'),
(90, '2017-11-18 08:30:00', '376', '3458/ASSIII/2017', 'ASS.III', '2017-11-18', 'Kontraktor Bangunan', 'Penindakan Bangunan tanpa surat izin mendirikan bangunan', '2017-3458.pdf', 'admin', '2017-11-18 03:19:54'),
(91, '2017-11-30 01:00:00', '454', '3457/ORTAL/2017', 'ORTAL', '2017-11-30', 'Lurah SE-KOTA SAMARINDA', 'Pelatihan Kelembagaan Desa', '2017-3457.pdf', 'admin', '2017-11-30 00:01:06'),
(92, '2017-12-06 08:17:00', '342', '3459/TU/2017', 'TU', '2017-12-06', 'CAMAT SE-KOTA SAMARINDA', 'pilgub', '2017-3459.pdf', 'admin', '2017-12-06 07:19:29');

-- --------------------------------------------------------

--
-- Table structure for table `tb_suratmasuk`
--

CREATE TABLE `tb_suratmasuk` (
  `id_suratmasuk` int(11) NOT NULL,
  `tanggalmasuk_suratmasuk` datetime NOT NULL DEFAULT current_timestamp(),
  `kode_suratmasuk` varchar(10) NOT NULL,
  `nomorurut_suratmasuk` varchar(7) NOT NULL,
  `nomor_suratmasuk` varchar(25) NOT NULL,
  `tanggalsurat_suratmasuk` date NOT NULL,
  `pengirim` varchar(255) NOT NULL,
  `kepada_suratmasuk` varchar(255) NOT NULL,
  `perihal_suratmasuk` text NOT NULL,
  `file_suratmasuk` varchar(255) NOT NULL,
  `operator` varchar(50) NOT NULL,
  `tanggal_entry` datetime NOT NULL DEFAULT current_timestamp(),
  `disposisi1` varchar(50) NOT NULL,
  `tanggal_disposisi1` datetime NOT NULL DEFAULT current_timestamp(),
  `disposisi2` varchar(50) NOT NULL,
  `tanggal_disposisi2` varchar(25) NOT NULL,
  `disposisi3` varchar(50) NOT NULL,
  `tanggal_disposisi3` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tb_suratmasuk`
--

INSERT INTO `tb_suratmasuk` (`id_suratmasuk`, `tanggalmasuk_suratmasuk`, `kode_suratmasuk`, `nomorurut_suratmasuk`, `nomor_suratmasuk`, `tanggalsurat_suratmasuk`, `pengirim`, `kepada_suratmasuk`, `perihal_suratmasuk`, `file_suratmasuk`, `operator`, `tanggal_entry`, `disposisi1`, `tanggal_disposisi1`, `disposisi2`, `tanggal_disposisi2`, `disposisi3`, `tanggal_disposisi3`) VALUES
(2, '2017-09-20 13:00:00', '900', '4518', '050/588/300.01', '2017-09-20', 'BAPPEDA PROVINSI PAPUA SELATAN', 'Sekretaris Daerah', 'Penyampaian Usulan Bantuan Keuangan Pada APBD Prov. Papua Selatan Tahun 2025\n', '2017-4518.pdf', 'admin', '2017-11-18 03:30:06', 'SEKDA', '2017-09-20 14:30:00', 'PLT.ASS.II', '2017-09-28 09:00:00', 'ADM.PEMB', '2017-09-29 10:00:00'),
(3, '2017-09-20 14:00:00', '010', '4519', '036/B/HMJELEKTRO/IX/2017', '2017-09-18', 'FORUM KOMUNIKASI HIMPUNAN MAHASISWA ELEKTRO INDONESIA WILAYAH XIII KALIMANTAN', 'UMUM', 'Permohonan\r\n', '2017-4519.pdf', 'admin2', '2017-11-14 23:43:44', 'UMUM', '2017-09-22 11:00:00', '', '1970-01-01 07:00:00', 'UMUM', '2017-09-22 11:05:00'),
(5, '2017-09-21 15:10:00', '660', '4520', '660.2/1539/100.14', '2017-09-19', 'DINAS LINGKUNGAN HIDUP KOTA SAMARINDA', 'Sekretaris Daerah', 'Penting', '2017-4520.pdf', 'admin2', '2017-11-14 23:58:01', 'SEKDA', '2017-09-21 23:00:00', 'PLT.ASS.II', '2017-09-24 21:00:00', 'EKONOMI & SDA', '2017-09-25 09:00:00'),
(6, '2017-09-26 10:00:00', '061', '4521', '061/4382/SJ', '2017-09-20', 'MENDAGRI RI', 'Organisasi', 'Surat Edaran Tentang Mekanisme Layanan Administrasi Kemendagri\r\n', '2017-4521.pdf', 'admin', '2017-12-02 21:44:11', 'ASS.III', '2017-09-26 15:00:00', '', '1970-01-01 07:00:00', 'ORTAL', '2017-09-27 11:30:00'),
(7, '2017-09-25 14:00:00', '503', '4522', '503/744/100.26', '2017-09-25', 'DINAS PENANAMAN MODAL DAN PELAYANAN TERPADU SATU PINTU KOTA SAMARINDA', 'PLH SEKDA', 'Tindak Lanjut Permohonan Penghapusan Denda Retribusi IMB PT.Borneo Inti Graha\r\n', '2017-4522.pdf', 'admin', '2017-12-06 00:32:23', 'PLH.SEKDA', '2017-09-26 10:00:00', '', '1970-01-01 07:00:00', 'HUKUM', '2017-09-27 15:00:00'),
(8, '2017-12-06 08:12:00', '454', '4523 ', '4121/wawali/2017', '2017-12-06', 'pdam', 'wawali', 'air', '2017-4523.pdf', 'admin', '2017-12-06 07:15:07', 'WAKIL WALIKOTA', '2017-12-14 08:14:00', 'ADM.PEMB', '2017-12-12 08:14:00', 'PEM-OTDA', '2017-12-13 08:15:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `disposisi`
--
ALTER TABLE `disposisi`
  ADD PRIMARY KEY (`id_disposisi`),
  ADD KEY `id_surat` (`id_surat`);

--
-- Indexes for table `nominatif_asn`
--
ALTER TABLE `nominatif_asn`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nip` (`nip`);

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id_admin`),
  ADD UNIQUE KEY `username_admin` (`username_admin`);

--
-- Indexes for table `tb_bagian`
--
ALTER TABLE `tb_bagian`
  ADD PRIMARY KEY (`id_bagian`),
  ADD UNIQUE KEY `username_admin_bagian` (`username_admin_bagian`);

--
-- Indexes for table `tb_berkasdigital`
--
ALTER TABLE `tb_berkasdigital`
  ADD PRIMARY KEY (`id_berkas`),
  ADD KEY `nip` (`nip`);

--
-- Indexes for table `tb_galeri`
--
ALTER TABLE `tb_galeri`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_informasikepegawaian`
--
ALTER TABLE `tb_informasikepegawaian`
  ADD PRIMARY KEY (`id_info`),
  ADD KEY `nip` (`nip`);

--
-- Indexes for table `tb_laporan`
--
ALTER TABLE `tb_laporan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_riwayat_kgp_kp`
--
ALTER TABLE `tb_riwayat_kgp_kp`
  ADD PRIMARY KEY (`id_riwayat`),
  ADD KEY `nip` (`nip`);

--
-- Indexes for table `tb_sptsppd`
--
ALTER TABLE `tb_sptsppd`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_suratkeluar`
--
ALTER TABLE `tb_suratkeluar`
  ADD PRIMARY KEY (`id_suratkeluar`),
  ADD UNIQUE KEY `nomor_suratkeluar` (`nomor_suratkeluar`);

--
-- Indexes for table `tb_suratmasuk`
--
ALTER TABLE `tb_suratmasuk`
  ADD PRIMARY KEY (`id_suratmasuk`),
  ADD UNIQUE KEY `nomorurut_suratmasuk` (`nomorurut_suratmasuk`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `disposisi`
--
ALTER TABLE `disposisi`
  MODIFY `id_disposisi` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `nominatif_asn`
--
ALTER TABLE `nominatif_asn`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `id_admin` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_bagian`
--
ALTER TABLE `tb_bagian`
  MODIFY `id_bagian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `tb_berkasdigital`
--
ALTER TABLE `tb_berkasdigital`
  MODIFY `id_berkas` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_galeri`
--
ALTER TABLE `tb_galeri`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_informasikepegawaian`
--
ALTER TABLE `tb_informasikepegawaian`
  MODIFY `id_info` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_laporan`
--
ALTER TABLE `tb_laporan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_riwayat_kgp_kp`
--
ALTER TABLE `tb_riwayat_kgp_kp`
  MODIFY `id_riwayat` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_sptsppd`
--
ALTER TABLE `tb_sptsppd`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_suratkeluar`
--
ALTER TABLE `tb_suratkeluar`
  MODIFY `id_suratkeluar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT for table `tb_suratmasuk`
--
ALTER TABLE `tb_suratmasuk`
  MODIFY `id_suratmasuk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `disposisi`
--
ALTER TABLE `disposisi`
  ADD CONSTRAINT `disposisi_ibfk_1` FOREIGN KEY (`id_surat`) REFERENCES `tb_suratmasuk` (`id_suratmasuk`);

--
-- Constraints for table `tb_berkasdigital`
--
ALTER TABLE `tb_berkasdigital`
  ADD CONSTRAINT `tb_berkasdigital_ibfk_1` FOREIGN KEY (`nip`) REFERENCES `nominatif_asn` (`nip`);

--
-- Constraints for table `tb_informasikepegawaian`
--
ALTER TABLE `tb_informasikepegawaian`
  ADD CONSTRAINT `tb_informasikepegawaian_ibfk_1` FOREIGN KEY (`nip`) REFERENCES `nominatif_asn` (`nip`);

--
-- Constraints for table `tb_riwayat_kgp_kp`
--
ALTER TABLE `tb_riwayat_kgp_kp`
  ADD CONSTRAINT `tb_riwayat_kgp_kp_ibfk_1` FOREIGN KEY (`nip`) REFERENCES `nominatif_asn` (`nip`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
