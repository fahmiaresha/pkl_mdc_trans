-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 05, 2021 at 11:48 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mdctrans`
--

-- --------------------------------------------------------

--
-- Table structure for table `armada`
--

CREATE TABLE `armada` (
  `ID_ARMADA` varchar(10) NOT NULL,
  `ID_CATEGORY` varchar(10) NOT NULL,
  `NAMA_ARMADA` varchar(30) DEFAULT NULL,
  `PLAT_NOMOR` varchar(20) NOT NULL,
  `KAPASITAS` int(11) NOT NULL,
  `FASILITAS_ARMADA` text NOT NULL,
  `HARGA` float DEFAULT NULL,
  `STATUS_ARMADA` tinyint(1) NOT NULL DEFAULT 1,
  `avatar` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `armada`
--

INSERT INTO `armada` (`ID_ARMADA`, `ID_CATEGORY`, `NAMA_ARMADA`, `PLAT_NOMOR`, `KAPASITAS`, `FASILITAS_ARMADA`, `HARGA`, `STATUS_ARMADA`, `avatar`) VALUES
('ARMD001', 'CTG01', NULL, 'S 7450 UJ', 61, 'Berikut daftar fasilitas big bus pariwisata yang perlu Anda ketahui :  \r\n- 40 - 59 seats \r\n- Full AC TV DVD Player \r\n- Karaoke Reclining Seat 3-2 atau 2-2\r\n- Hand Rest Terminal Listrik Cool Box*\r\n- Dispenser* Smoking Room* Toilet* \r\n- Bantal Selimut* WiFi* \r\nDari semua fasilitas diatas, ada beberapa fasilitas yang sifatnya optional.  \r\nKarena tidak semua PO bus pariwisata menyediakan, dan hanya untuk perjalanan-perjalanan tertentu saja.', NULL, 1, 'WhatsApp Image 2020-12-06 at 08.48.10 (1).jpeg'),
('ARMD002', 'CTG01', NULL, 'S 7321 UJ', 61, 'Berikut daftar fasilitas big bus pariwisata yang perlu Anda ketahui :  \r\n- 40 - 59 seats \r\n- Full AC TV DVD Player \r\n- Karaoke Reclining Seat 3-2 atau 2-2\r\n- Hand Rest Terminal Listrik Cool Box*\r\n- Dispenser* Smoking Room* Toilet* \r\n- Bantal Selimut* WiFi* \r\nDari semua fasilitas diatas, ada beberapa fasilitas yang sifatnya optional.  \r\nKarena tidak semua PO bus pariwisata menyediakan, dan hanya untuk perjalanan-perjalanan tertentu saja.', NULL, 1, 'WhatsApp Image 2020-12-06 at 08.48.10.jpeg'),
('ARMD003', 'CTG01', NULL, 'S 7342 UJ', 61, 'Berikut daftar fasilitas big bus pariwisata yang perlu Anda ketahui :  \r\n- 40 - 59 seats \r\n- Full AC TV DVD Player \r\n- Karaoke Reclining Seat 3-2 atau 2-2\r\n- Hand Rest Terminal Listrik Cool Box*\r\n- Dispenser* Smoking Room* Toilet* \r\n- Bantal Selimut* WiFi* \r\nDari semua fasilitas diatas, ada beberapa fasilitas yang sifatnya optional.  \r\nKarena tidak semua PO bus pariwisata menyediakan, dan hanya untuk perjalanan-perjalanan tertentu saja.', NULL, 1, 'WhatsApp Image 2020-12-06 at 08.48.09.jpeg'),
('ARMD004', 'CTG01', NULL, 'S 7349 UJ', 61, 'Berikut daftar fasilitas big bus pariwisata yang perlu Anda ketahui :  \r\n- 40 - 59 seats \r\n- Full AC TV DVD Player \r\n- Karaoke Reclining Seat 3-2 atau 2-2\r\n- Hand Rest Terminal Listrik Cool Box*\r\n- Dispenser* Smoking Room* Toilet* \r\n- Bantal Selimut* WiFi* \r\nDari semua fasilitas diatas, ada beberapa fasilitas yang sifatnya optional.  \r\nKarena tidak semua PO bus pariwisata menyediakan, dan hanya untuk perjalanan-perjalanan tertentu saja.', NULL, 1, 'WhatsApp Image 2020-12-06 at 08.48.06.jpeg'),
('ARMD005', 'CTG01', NULL, 'S 7449 UJ', 61, 'Berikut daftar fasilitas big bus pariwisata yang perlu Anda ketahui :  \r\n- 40 - 59 seats \r\n- Full AC TV DVD Player \r\n- Karaoke Reclining Seat 3-2 atau 2-2\r\n- Hand Rest Terminal Listrik Cool Box*\r\n- Dispenser* Smoking Room* Toilet* \r\n- Bantal Selimut* WiFi* \r\nDari semua fasilitas diatas, ada beberapa fasilitas yang sifatnya optional.  \r\nKarena tidak semua PO bus pariwisata menyediakan, dan hanya untuk perjalanan-perjalanan tertentu saja.', NULL, 1, 'WhatsApp Image 2020-11-24 at 17.20.20 (1).jpeg'),
('ARMD006', 'CTG01', NULL, 'S 7495 UJ', 61, 'Berikut daftar fasilitas big bus pariwisata yang perlu Anda ketahui :  \r\n- 40 - 59 seats \r\n- Full AC TV DVD Player \r\n- Karaoke Reclining Seat 3-2 atau 2-2\r\n- Hand Rest Terminal Listrik Cool Box*\r\n- Dispenser* Smoking Room* Toilet* \r\n- Bantal Selimut* WiFi* \r\nDari semua fasilitas diatas, ada beberapa fasilitas yang sifatnya optional.  \r\nKarena tidak semua PO bus pariwisata menyediakan, dan hanya untuk perjalanan-perjalanan tertentu saja.', NULL, 1, 'WhatsApp Image 2020-11-09 at 11.10.32 (2).jpeg'),
('ARMD007', 'CTG03', NULL, 'S 7364 UJ', 19, 'Berikut daftar fasilitas big bus pariwisata yang perlu Anda ketahui :  \r\n- 40 - 59 seats \r\n- Full AC TV DVD Player \r\n- Karaoke Reclining Seat 3-2 atau 2-2\r\n- Hand Rest Terminal Listrik Cool Box*\r\n- Dispenser* Smoking Room* Toilet* \r\n- Bantal Selimut* WiFi* \r\nDari semua fasilitas diatas, ada beberapa fasilitas yang sifatnya optional.  \r\nKarena tidak semua PO bus pariwisata menyediakan, dan hanya untuk perjalanan-perjalanan tertentu saja.', NULL, 1, 'WhatsApp Image 2020-11-09 at 11.10.31.jpeg'),
('ARMD008', 'CTG02', NULL, 'S 7483 UJ', 35, '•	RECLINING SEAT 2-2 \r\n•	KAPASITAS 35 ORANG\r\n•	TV \r\n•	DVD PLAYER\r\n•	KARAOKE\r\n•	COOL BOX\r\n•	BANTAL SELIMUT \r\n•	FULL AIR CONDITIONER (AC)\r\n•	LAMPU TIDUR\r\n•	STOP KONTAK', NULL, 1, '5.jpg'),
('ARMD009', 'CTG02', NULL, 'S 765 UJ', 61, 'hhh', NULL, 1, 'WhatsApp Image 2020-12-06 at 08.48.10 (1).jpeg');

--
-- Triggers `armada`
--
DELIMITER $$
CREATE TRIGGER `trigger_armada` BEFORE INSERT ON `armada` FOR EACH ROW BEGIN
	SELECT SUBSTRING((MAX(`ID_ARMADA`)),5,3) INTO @max FROM armada;
    IF(@max >=1) THEN
    	SET new.ID_ARMADA = CONCAT(("ARMD"),LPAD(@max+1,3,'0'));
    ELSE
    	SET new.ID_ARMADA = CONCAT(("ARMD"),LPAD(1,3,'0'));
    END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `category_armada`
--

CREATE TABLE `category_armada` (
  `ID_CATEGORY` varchar(10) NOT NULL,
  `NAMA_CATEGORY` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category_armada`
--

INSERT INTO `category_armada` (`ID_CATEGORY`, `NAMA_CATEGORY`) VALUES
('CTG01', 'Bus Besar'),
('CTG02', 'Bus Sedang'),
('CTG03', 'Elf Bus (Mini Bus)');

--
-- Triggers `category_armada`
--
DELIMITER $$
CREATE TRIGGER `trigger_category` BEFORE INSERT ON `category_armada` FOR EACH ROW BEGIN
	SELECT SUBSTRING((MAX(`ID_CATEGORY`)),4,2) INTO @max FROM category_armada;
    IF(@max >=1) THEN
    	SET new.ID_CATEGORY = CONCAT(("CTG"),LPAD(@max+1,2,'0'));
    ELSE
    	SET new.ID_CATEGORY = CONCAT(("CTG"),LPAD(1,2,'0'));
    END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `ID_CUSTOMER` varchar(20) NOT NULL,
  `NAMA_CUSTOMER` varchar(50) NOT NULL,
  `EMAIL_CUSTOMER` varchar(50) NOT NULL,
  `TELEPHONE` varchar(20) NOT NULL,
  `ALAMAT` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`ID_CUSTOMER`, `NAMA_CUSTOMER`, `EMAIL_CUSTOMER`, `TELEPHONE`, `ALAMAT`) VALUES
('CUS001', 'a', 's@d', '4', 's'),
('CUS002', 'hanum', 'hanum@gmail.com', '976', 'lamongan'),
('CUS003', 'a', 's@d', '3', 'a'),
('CUS004', 'gg', 'f@d', '7', 'c');

--
-- Triggers `customer`
--
DELIMITER $$
CREATE TRIGGER `trigger_customer` BEFORE INSERT ON `customer` FOR EACH ROW BEGIN
	SELECT SUBSTRING((MAX(`ID_CUSTOMER`)),4,3) INTO @max FROM customer;
    IF(@max >=1) THEN
    	SET new.ID_CUSTOMER = CONCAT(("CUS"),LPAD(@max+1,3,'0'));
    ELSE
    	SET new.ID_CUSTOMER = CONCAT(("CUS"),LPAD(1,3,'0'));
    END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `galeri`
--

CREATE TABLE `galeri` (
  `ID_GALERI` varchar(10) NOT NULL,
  `ID_ARMADA` varchar(10) NOT NULL,
  `DESKRIPSI_FOTO` text NOT NULL,
  `STATUS_FOTO` tinyint(1) DEFAULT 1,
  `FOTO_ARMADA` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `galeri`
--

INSERT INTO `galeri` (`ID_GALERI`, `ID_ARMADA`, `DESKRIPSI_FOTO`, `STATUS_FOTO`, `FOTO_ARMADA`) VALUES
('GLR001', 'ARMD001', 'Bagus', NULL, '3.jpg');

--
-- Triggers `galeri`
--
DELIMITER $$
CREATE TRIGGER `trigger_galeri` BEFORE INSERT ON `galeri` FOR EACH ROW BEGIN
	SELECT SUBSTRING((MAX(`ID_GALERI`)),4,3) INTO @max FROM galeri;
    IF(@max >=1) THEN
    	SET new.ID_GALERI = CONCAT(("GLR"),LPAD(@max+1,3,'0'));
    ELSE
    	SET new.ID_GALERI = CONCAT(("GLR"),LPAD(1,3,'0'));
    END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `hari`
--

CREATE TABLE `hari` (
  `ID_HARI` int(11) NOT NULL,
  `TOTAL_HARI` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hari`
--

INSERT INTO `hari` (`ID_HARI`, `TOTAL_HARI`) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4),
(5, 5),
(6, 6),
(7, 7);

-- --------------------------------------------------------

--
-- Table structure for table `history_lama_pricelist`
--

CREATE TABLE `history_lama_pricelist` (
  `id` int(11) NOT NULL,
  `ID_PRICELIST` varchar(20) NOT NULL,
  `ID_CATEGORY` varchar(10) NOT NULL,
  `TUJUAN_SEWA` text NOT NULL,
  `PRICELIST_SEWA` float DEFAULT NULL,
  `JUMLAH_HARI` int(11) DEFAULT 1,
  `TGL_GANTI` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `history_lama_pricelist`
--

INSERT INTO `history_lama_pricelist` (`id`, `ID_PRICELIST`, `ID_CATEGORY`, `TUJUAN_SEWA`, `PRICELIST_SEWA`, `JUMLAH_HARI`, `TGL_GANTI`) VALUES
(5, 'HRG171', 'CTG01', 'gege', 80, 1, '2021-05-24 14:24:10'),
(6, 'HRG009', 'CTG01', 'Blitar', 4000000, 1, '2021-06-03 19:39:58');

-- --------------------------------------------------------

--
-- Table structure for table `history_pricelist`
--

CREATE TABLE `history_pricelist` (
  `id` int(11) NOT NULL,
  `ID_PRICELIST` varchar(20) NOT NULL,
  `ID_CATEGORY` varchar(10) NOT NULL,
  `TUJUAN_SEWA` text NOT NULL,
  `PRICELIST_SEWA` float DEFAULT NULL,
  `JUMLAH_HARI` int(11) DEFAULT 1,
  `TGL_GANTI` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `history_pricelist`
--

INSERT INTO `history_pricelist` (`id`, `ID_PRICELIST`, `ID_CATEGORY`, `TUJUAN_SEWA`, `PRICELIST_SEWA`, `JUMLAH_HARI`, `TGL_GANTI`) VALUES
(5, 'HRG171', 'CTG01', 'gege', 900, 1, '2021-05-24 14:24:10'),
(6, 'HRG009', 'CTG01', 'Blitar', 500, 1, '2021-06-03 19:39:58');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_bayar`
--

CREATE TABLE `jenis_bayar` (
  `ID_JENIS` int(11) NOT NULL,
  `JENIS_BAYAR` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jenis_bayar`
--

INSERT INTO `jenis_bayar` (`ID_JENIS`, `JENIS_BAYAR`) VALUES
(1, 'DP (25%)'),
(2, 'Lunas');

-- --------------------------------------------------------

--
-- Table structure for table `paket_wisata`
--

CREATE TABLE `paket_wisata` (
  `ID_PAKET` varchar(10) NOT NULL,
  `ID_CATEGORY` varchar(10) DEFAULT NULL,
  `NAMA_PAKET` varchar(10000) NOT NULL,
  `TIPE_PAKET` varchar(100) DEFAULT NULL,
  `HARGA_PAKET` float NOT NULL,
  `HARGA_JUAL` float DEFAULT NULL,
  `TEMPAT_KUNJUNG` text NOT NULL,
  `FASILITAS_PAKET` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `paket_wisata`
--

INSERT INTO `paket_wisata` (`ID_PAKET`, `ID_CATEGORY`, `NAMA_PAKET`, `TIPE_PAKET`, `HARGA_PAKET`, `HARGA_JUAL`, `TEMPAT_KUNJUNG`, `FASILITAS_PAKET`) VALUES
('PWST001', 'CTG01', 'Jogja - Paket A (Kapasitas 40 Orang)', NULL, 400000, 16000000, '-	Candi Prambanan / Candi Ratu Boko\r\n-	Malioboro\r\n-	Kampung Watu Lumbung\r\n-	Hutan Pinus\r\n-	Pusat Oleh-oleh Bakpia Tugu', '-	Bus kapasitas 50 Seat\r\n-	Menginap di Hotel 1 Malam\r\n-	Snack + Air Mineral\r\n-	Makan 4 kali'),
('PWST002', 'CTG02', 'Jogja - Paket B (Kapasitas 35 Orang)', NULL, 425000, 14875000, '-	Candi Prambanan / Candi Ratu Boko\r\n-	Malioboro\r\n-	Kampung Watu Lumbung\r\n-	Hutan Pinus\r\n-	Pusat Oleh-oleh Bakpia Tugu', '-	Bus kapasitas 50 Seat\r\n-	Menginap di Hotel 1 Malam\r\n-	Snack + Air Mineral\r\n-	Makan 4 kali'),
('PWST003', 'CTG02', 'Jogja - Paket C (Kapasitas 30 Orang)', NULL, 470000, 14100000, '-	Candi Prambanan / Candi Ratu Boko\r\n-	Malioboro\r\n-	Kampung Watu Lumbung\r\n-	Hutan Pinus\r\n-	Pusat Oleh-oleh Bakpia Tugu', '-	Bus kapasitas 50 Seat\r\n-	Menginap di Hotel 1 Malam\r\n-	Snack + Air Mineral\r\n-	Makan 4 kali');

--
-- Triggers `paket_wisata`
--
DELIMITER $$
CREATE TRIGGER `trigger_paket_wisata` BEFORE INSERT ON `paket_wisata` FOR EACH ROW BEGIN
	SELECT SUBSTRING((MAX(`ID_PAKET`)),5,3) INTO @max FROM paket_wisata;
    IF(@max >=1) THEN
    	SET new.ID_PAKET = CONCAT(("PWST"),LPAD(@max+1,3,'0'));
    ELSE
    	SET new.ID_PAKET = CONCAT(("PWST"),LPAD(1,3,'0'));
    END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id` int(11) NOT NULL,
  `ID_REKENING` varchar(10) NOT NULL,
  `ID_SEWA_BUS` varchar(20) NOT NULL,
  `ID_JENIS` int(11) DEFAULT NULL,
  `CARA_BAYAR` varchar(20) NOT NULL,
  `JENIS_BAYAR` varchar(20) DEFAULT NULL,
  `TGL_BAYAR` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `JUMLAH_BAYAR` float NOT NULL,
  `NAMA_BANK_PENGIRIM` varchar(50) DEFAULT NULL,
  `NOREK_PENGIRIM` varchar(100) DEFAULT NULL,
  `ATAS_NAMA` varchar(50) DEFAULT NULL,
  `BUKTI_TF` varchar(255) DEFAULT NULL,
  `KETERANGAN` text NOT NULL,
  `STATUS_BAYAR` tinyint(1) NOT NULL DEFAULT 1,
  `STATUS_CEK` tinyint(1) DEFAULT 1,
  `tgl` date NOT NULL DEFAULT current_timestamp(),
  `SISA_BAYAR` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id`, `ID_REKENING`, `ID_SEWA_BUS`, `ID_JENIS`, `CARA_BAYAR`, `JENIS_BAYAR`, `TGL_BAYAR`, `JUMLAH_BAYAR`, `NAMA_BANK_PENGIRIM`, `NOREK_PENGIRIM`, `ATAS_NAMA`, `BUKTI_TF`, `KETERANGAN`, `STATUS_BAYAR`, `STATUS_CEK`, `tgl`, `SISA_BAYAR`) VALUES
(40, 'REK001', '210604003', 1, 'Transfer', 'DP (25%)', '2021-06-04 14:53:42', 4546, 'df', '545', 'fd', 'd85ee6c6677834fe0a5426c88c3cf462.jpg', 'as', 1, 1, '2021-06-04', NULL),
(41, 'REK001', '210604003', 1, 'Transfer', NULL, '2021-06-04 14:54:19', 250000, 's', '23', 'as', 'd85ee6c6677834fe0a5426c88c3cf462.jpg', 'cv', 1, 1, '2021-06-04', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran_paket`
--

CREATE TABLE `pembayaran_paket` (
  `id_paket` int(11) NOT NULL,
  `ID_REKENING` varchar(10) NOT NULL,
  `ID_SEWA_PAKET` varchar(20) DEFAULT NULL,
  `CARA_BAYAR` varchar(20) NOT NULL,
  `JENIS_BAYAR` varchar(20) NOT NULL,
  `TGL_BAYAR` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `JUMLAH_BAYAR` float NOT NULL,
  `NAMA_BANK_PENGIRIM` varchar(50) DEFAULT NULL,
  `NOREK_PENGIRIM` varchar(100) DEFAULT NULL,
  `ATAS_NAMA` varchar(50) DEFAULT NULL,
  `BUKTI_TF` varchar(255) DEFAULT NULL,
  `KETERANGAN` text NOT NULL,
  `STATUS_BAYAR` tinyint(1) NOT NULL DEFAULT 1,
  `tgl` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `ID_PENGGUNA` varchar(20) NOT NULL,
  `NAMA_PENGGUNA` varchar(50) NOT NULL,
  `USERNAME` varchar(30) NOT NULL,
  `EMAIL_PENGGUNA` varchar(30) NOT NULL,
  `TELEPHONE_PENGGUNA` varchar(20) NOT NULL,
  `ALAMAT_PENGGUNA` varchar(50) NOT NULL,
  `PASSWORD` text NOT NULL,
  `JOB_STATUS` varchar(20) NOT NULL,
  `FOTO` varchar(255) DEFAULT NULL,
  `PERTANYAAN` text DEFAULT NULL,
  `JAWABAN` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`ID_PENGGUNA`, `NAMA_PENGGUNA`, `USERNAME`, `EMAIL_PENGGUNA`, `TELEPHONE_PENGGUNA`, `ALAMAT_PENGGUNA`, `PASSWORD`, `JOB_STATUS`, `FOTO`, `PERTANYAAN`, `JAWABAN`) VALUES
('USR001', 'Admin', 'admin', 'admin@gmail.com', '085607875343', 'Lamongan', '$2y$10$DqTvw1t2P8jFCBi76qHw4O6AjekmA3Fezc50OHmXS3OG6LStGSkRa', 'Admin', 'IMG_2028 (1).JPG', NULL, NULL),
('USR002', 'Hanum dwi', 'hanumdwi', 'hanum@gmail.com', '085607875343', 'Lamongan', '$2y$10$q8DoRqoG.0UMKLPZVACIGOGwoFfgMKQWuNPGz4rJO89IKhiN.QOPK', 'Admin', 'IMG_2028 (1).JPG', 'Apa makanan favorite Anda?', 'siomay'),
('USR003', 'Ibnu Maksum', 'ibnumaksum', 'ibnu@gmail.com', '081216600609', 'Lamongan', '$2y$10$6Mh2In50864D1FmM3GB5yerQJSAOzOUHX0Ygs0cUNg77bK3YvUk3S', 'Kasir', 'WhatsApp Image 2020-12-06 at 08.48.10 (1).jpeg', 'Apa binatang favorite Anda?', 'kucing');

--
-- Triggers `pengguna`
--
DELIMITER $$
CREATE TRIGGER `trigger_pengguna` BEFORE INSERT ON `pengguna` FOR EACH ROW BEGIN
	SELECT SUBSTRING((MAX(`ID_PENGGUNA`)),4,3) INTO @max FROM pengguna;
    IF(@max >=1) THEN
    	SET new.ID_PENGGUNA = CONCAT(("USR"),LPAD(@max+1,3,'0'));
    ELSE
    	SET new.ID_PENGGUNA = CONCAT(("USR"),LPAD(1,3,'0'));
    END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `pricelist_sewa_armada`
--

CREATE TABLE `pricelist_sewa_armada` (
  `ID_PRICELIST` varchar(20) NOT NULL,
  `ID_CATEGORY` varchar(10) NOT NULL,
  `TUJUAN_SEWA` text NOT NULL,
  `PRICELIST_SEWA` float DEFAULT NULL,
  `JUMLAH_HARI` int(11) DEFAULT 1,
  `ID_HARI` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pricelist_sewa_armada`
--

INSERT INTO `pricelist_sewa_armada` (`ID_PRICELIST`, `ID_CATEGORY`, `TUJUAN_SEWA`, `PRICELIST_SEWA`, `JUMLAH_HARI`, `ID_HARI`) VALUES
('HRG001', 'CTG01', 'Bali (Inap 1 Malam)', 10500000, 2, 2),
('HRG002', 'CTG01', 'Bali (Inap 2 Malam)', 11500000, 3, 3),
('HRG003', 'CTG01', 'Bandung', 12000000, 2, 2),
('HRG004', 'CTG01', 'Bangkalan', 3000000, 1, 1),
('HRG005', 'CTG01', 'Banyuwangi (Wisata)', 7000000, 2, 2),
('HRG006', 'CTG01', 'Banyuwangi (Inap)', 7500000, 2, 2),
('HRG007', 'CTG01', 'Batang', 7000000, 1, 1),
('HRG008', 'CTG01', 'Batu', 3500000, 1, 1),
('HRG009', 'CTG01', 'Blitar', 500, 1, 1),
('HRG010', 'CTG01', 'Blitar Gusdur', 4000000, 1, 1),
('HRG011', 'CTG01', 'Bojonegoro', 3000000, 1, 1),
('HRG012', 'CTG01', 'Brebes', 7500000, 2, 2),
('HRG013', 'CTG01', 'Bromo', 5500000, 2, 2),
('HRG014', 'CTG01', 'Cilacap', 8500000, 2, 2),
('HRG015', 'CTG01', 'Cirebon', 9000000, 2, 2),
('HRG016', 'CTG01', 'Dieng', 8500000, 1, 1),
('HRG017', 'CTG01', 'Demak - Muria', 4500000, 3, 3),
('HRG018', 'CTG01', 'Jakarta - Bandung', 13000000, 3, 3),
('HRG019', 'CTG03', 'Jakarta (3 Hari)', 13000000, 3, 3),
('HRG020', 'CTG01', 'Jember', 4000000, 1, 1),
('HRG021', 'CTG01', 'Jember (Malam)', 4500000, 1, 1),
('HRG022', 'CTG01', 'Jogja', 6500000, 2, 2),
('HRG023', 'CTG01', 'Jogja (Inap 1 Malam)', 7000000, 2, 2),
('HRG024', 'CTG01', 'Jombang', 2800000, 1, 1),
('HRG025', 'CTG01', 'Kediri', 3500000, 1, 1),
('HRG026', 'CTG01', 'Kudus', 4000000, 1, 1),
('HRG027', 'CTG01', 'Lasem', 3500000, 1, 1),
('HRG028', 'CTG01', 'Lumajang', 4000000, 1, 1),
('HRG029', 'CTG01', 'Magelang', 6500000, 1, 1),
('HRG030', 'CTG01', 'Magetan - Sarangan', 4000000, 1, 1),
('HRG031', 'CTG01', 'Magetan - Sarangan (Inap 1 Hari)', 5500000, 2, 2),
('HRG032', 'CTG01', 'Malang', 3500000, 1, 1),
('HRG033', 'CTG01', 'Malang Inap', 4500000, 2, 2),
('HRG034', 'CTG01', 'Malang Selatan', 4000000, 1, 1),
('HRG035', 'CTG01', 'Masjid Turen', 3800000, 1, 1),
('HRG036', 'CTG01', 'Mojokerto', 2500000, 1, 1),
('HRG037', 'CTG01', 'Nganjuk', 3500000, 1, 1),
('HRG038', 'CTG01', 'Pacet', 3000000, 1, 1),
('HRG039', 'CTG01', 'Pacet Inap', 4000000, 2, 2),
('HRG040', 'CTG01', 'Pacitan', 6000000, 1, 1),
('HRG041', 'CTG01', 'Pamekasan (Berangkat Pagi)', 4500000, 1, 1),
('HRG042', 'CTG01', 'Pamekasan (Berangkat Sore)', 5000000, 1, 1),
('HRG043', 'CTG01', 'Pasuruan', 3000000, 1, 1),
('HRG044', 'CTG01', 'Pati', 3500000, 1, 1),
('HRG045', 'CTG01', 'Pekalongan', 7000000, 2, 2),
('HRG046', 'CTG01', 'Ponorogo', 4000000, 1, 1),
('HRG047', 'CTG01', 'Probolingo', 3500000, 1, 1),
('HRG048', 'CTG01', 'Purwokerto', 9500000, 1, 1),
('HRG049', 'CTG01', 'Purworejo', 7500000, 1, 1),
('HRG050', 'CTG01', 'Purworejo Inap', 8000000, 2, 2),
('HRG051', 'CTG01', 'Rembang', 3500000, 1, 1),
('HRG052', 'CTG01', 'Sarangan', 4000000, 1, 1),
('HRG053', 'CTG01', 'Sarangan Inap', 5500000, 2, 2),
('HRG054', 'CTG01', 'Semarang (Berangkat Pagi)', 5000000, 1, 1),
('HRG055', 'CTG01', 'Semarang Inap', 5500000, 2, 2),
('HRG056', 'CTG01', 'Situbondo', 4500000, 1, 1),
('HRG057', 'CTG01', 'Solo - Inap', 5000000, 2, 2),
('HRG058', 'CTG01', 'Sumenep', 6000000, 1, 1),
('HRG059', 'CTG01', 'Surabaya', 2800000, 1, 1),
('HRG060', 'CTG01', 'Surabaya Bandara', 3000000, 1, 1),
('HRG061', 'CTG01', 'Surabaya Bandara (Biro Jasa)', 2600000, 1, 1),
('HRG062', 'CTG01', 'Tegal', 8000000, 1, 1),
('HRG063', 'CTG01', 'Trenggalek', 4000000, 1, 1),
('HRG064', 'CTG01', 'Tuban', 3000000, 1, 1),
('HRG065', 'CTG01', 'Tulungagung', 4000000, 1, 1),
('HRG066', 'CTG01', 'Ungaran', 6500000, 1, 1),
('HRG067', 'CTG01', 'Wali 5', 3500000, 2, 2),
('HRG068', 'CTG01', 'Wali 5 + Bangkalan', 3800000, 2, 2),
('HRG069', 'CTG01', 'Madura Komplit', 6500000, 1, 1),
('HRG070', 'CTG01', 'Wali 9 Komplit (4 Hari, Panitia Rp. 500.000)', 14000000, 4, 4),
('HRG071', 'CTG01', 'Wali 9 Komplit (5 Hari, Panitia Rp. 500.000)', 15000000, 5, 5),
('HRG072', 'CTG01', 'Wali 9 Komplit (6 Hari, Panitia Rp. 500.000)', 16000000, 6, 6),
('HRG073', 'CTG01', 'Wali 9 Komplit (7 Hari, Panitia Rp. 500.000)', 18000000, 7, 7),
('HRG074', 'CTG01', 'Wali 9 Murni', 9000000, 7, 7),
('HRG075', 'CTG01', 'Wali Jateng Jogja', 7500000, 2, 2),
('HRG076', 'CTG01', 'Wali Madura Komplit', 6500000, 1, 1),
('HRG077', 'CTG01', 'WBL', 2500000, 1, 1),
('HRG078', 'CTG01', 'Trawas Inap', 4000000, 2, 2),
('HRG079', 'CTG01', 'Trawas', 3000000, 1, 1),
('HRG080', 'CTG02', 'Sidoarjo', 1800000, 1, 1),
('HRG081', 'CTG02', 'Waru', 1700000, 1, 1),
('HRG082', 'CTG02', 'Gresik', 1500000, 1, 1),
('HRG083', 'CTG02', 'Surabaya', 1700000, 1, 1),
('HRG084', 'CTG02', 'Mojokerto', 1500000, 1, 1),
('HRG085', 'CTG02', 'Pacet', 2100000, 1, 1),
('HRG086', 'CTG02', 'Bojonegoro', 1700000, 1, 1),
('HRG087', 'CTG02', 'Tuban', 1700000, 1, 1),
('HRG088', 'CTG02', 'Jombang ', 1600000, 1, 1),
('HRG089', 'CTG02', 'Nganjuk', 2000000, 1, 1),
('HRG090', 'CTG02', 'Malang', 2500000, 1, 1),
('HRG091', 'CTG02', 'Malang Selatan', 3000000, 1, 1),
('HRG092', 'CTG02', 'Taman Safari', 2400000, 1, 1),
('HRG093', 'CTG02', 'Batu', 2500000, 1, 1),
('HRG094', 'CTG02', 'Bromo', 2500000, 1, 1),
('HRG095', 'CTG02', 'Blitar', 2500000, 1, 1),
('HRG096', 'CTG02', 'Kediri', 1800000, 1, 1),
('HRG097', 'CTG02', 'Trenggalek', 2500000, 1, 1),
('HRG098', 'CTG02', 'Tulungagung', 2500000, 1, 1),
('HRG099', 'CTG02', 'Ponorogo', 2000000, 1, 1),
('HRG100', 'CTG02', 'Magetan ', 2500000, 1, 1),
('HRG101', 'CTG02', 'Sarangan', 3000000, 1, 1),
('HRG102', 'CTG02', 'Sarangan Inap', 4000000, 2, 2),
('HRG103', 'CTG02', 'Madiun', 2500000, 1, 1),
('HRG104', 'CTG02', 'Ngawi', 2500000, 1, 1),
('HRG105', 'CTG02', 'Pacitan', 3500000, 1, 1),
('HRG106', 'CTG02', 'Lumajang', 3000000, 1, 1),
('HRG107', 'CTG02', 'Jember', 3500000, 1, 1),
('HRG108', 'CTG02', 'Banyuwangi', 4000000, 1, 1),
('HRG109', 'CTG02', 'Situbondo', 3500000, 1, 1),
('HRG110', 'CTG02', 'Bondowoso', 3500000, 1, 1),
('HRG111', 'CTG02', 'Yogja', 4500000, 2, 2),
('HRG112', 'CTG02', 'Yogja Inap', 5500000, 3, 3),
('HRG113', 'CTG02', 'Demak', 4500000, 1, 1),
('HRG114', 'CTG02', 'Jepara', 5000000, 1, 1),
('HRG115', 'CTG02', 'Kudus', 4000000, 1, 1),
('HRG116', 'CTG02', 'Purwokerto (Inap 1 Malam)', 10000000, 2, 2),
('HRG117', 'CTG02', 'Boyolali', 3500000, 1, 1),
('HRG118', 'CTG02', 'Klaten', 3500000, 1, 1),
('HRG119', 'CTG02', 'Karanganyar', 3500000, 1, 1),
('HRG120', 'CTG02', 'Semarang', 5000000, 2, 2),
('HRG121', 'CTG02', 'Ungaran', 5000000, 1, 1),
('HRG122', 'CTG02', 'Ambarawa', 5000000, 1, 1),
('HRG123', 'CTG02', 'Bandung', 9000000, 2, 2),
('HRG124', 'CTG02', 'Cianjur', 9000000, 2, 2),
('HRG125', 'CTG02', 'Cilacap (Inap 1 Malam)', 10000000, 2, 2),
('HRG126', 'CTG02', 'Sukabumi', 9000000, 2, 2),
('HRG127', 'CTG02', 'Dieng', 6500000, 2, 2),
('HRG128', 'CTG02', 'Garut', 9000000, 2, 2),
('HRG129', 'CTG02', 'Jakarta', 9000000, 2, 2),
('HRG130', 'CTG02', 'Bogor', 9000000, 2, 2),
('HRG131', 'CTG02', 'Bekasi', 9000000, 2, 2),
('HRG132', 'CTG02', 'Tangerang', 9500000, 2, 2),
('HRG133', 'CTG02', 'Banten', 9000000, 2, 2),
('HRG134', 'CTG02', 'Cilegon', 9000000, 2, 2),
('HRG135', 'CTG02', 'Bali (Inap 1 Malam)', 9000000, 2, 2),
('HRG136', 'CTG02', 'Lombok', 12000000, 3, 3),
('HRG137', 'CTG03', 'Mojokerto (1 Hari)', 700000, 1, 1),
('HRG138', 'CTG03', 'Jombang', 1000000, 1, 1),
('HRG139', 'CTG03', 'Tuban', 800000, 1, 1),
('HRG140', 'CTG03', 'Bojonegoro', 1000000, 1, 1),
('HRG141', 'CTG03', 'Surabaya', 1000000, 1, 1),
('HRG142', 'CTG03', 'Sidoarjo', 1200000, 1, 1),
('HRG143', 'CTG03', 'Rembang', 1700000, 1, 1),
('HRG144', 'CTG03', 'Blora', 1700000, 1, 1),
('HRG145', 'CTG03', 'Ngawi', 1700000, 2, 2),
('HRG146', 'CTG03', 'Madiun ', 1700000, 1, 1),
('HRG147', 'CTG03', 'Malang', 1500000, 1, 1),
('HRG148', 'CTG03', 'Batu', 1500000, 1, 1),
('HRG149', 'CTG03', 'Ponorogo', 2000000, 1, 1),
('HRG150', 'CTG03', 'Tulungagung', 1700000, 1, 1),
('HRG151', 'CTG03', 'Magetan', 2000000, 1, 1),
('HRG152', 'CTG03', 'Blitar', 1700000, 1, 1),
('HRG153', 'CTG03', 'Nganjuk', 1500000, 1, 1),
('HRG154', 'CTG03', 'Kediri', 1300000, 1, 1),
('HRG155', 'CTG03', 'Jember (2 Hari)', 3000000, 2, 2),
('HRG156', 'CTG03', 'Situbondo (2 Hari)', 3000000, 2, 2),
('HRG157', 'CTG03', 'Bondowoso (2 Hari)', 3000000, 2, 2),
('HRG158', 'CTG03', 'Banyuwangi (2 Hari)', 3500000, 2, 2),
('HRG159', 'CTG01', 'Gunung Kidul (2 Hari)', 3500000, 2, 2),
('HRG160', 'CTG03', 'Bali (3 Hari)', 4000000, 3, 3),
('HRG161', 'CTG03', 'Bali (4 Hari)', 6000000, 4, 4),
('HRG162', 'CTG03', 'Semarang (2 Hari)', 3300000, 2, 2),
('HRG163', 'CTG03', 'Wonosobo (3 Hari)', 4000000, 3, 3),
('HRG164', 'CTG03', 'Cirebon (4 Hari)', 4800000, 4, 4),
('HRG165', 'CTG03', 'Bandung (4 Hari)', 5500000, 4, 4),
('HRG166', 'CTG03', 'Jakarta - Bogor (5 Hari)', 7000000, 5, 5),
('HRG167', 'CTG03', 'Wali 5', 1500000, 3, 3),
('HRG168', 'CTG03', 'Wali Madura', 2300000, 3, 3),
('HRG169', 'CTG03', 'Wali Jateng', 3000000, 2, 2),
('HRG170', 'CTG03', 'Wali 9', 6500000, 7, 7),
('HRG171', 'CTG01', 'gege', 900, 1, 1);

--
-- Triggers `pricelist_sewa_armada`
--
DELIMITER $$
CREATE TRIGGER `trigger_pricelist_sewa` BEFORE INSERT ON `pricelist_sewa_armada` FOR EACH ROW BEGIN
	SELECT SUBSTRING((MAX(`ID_PRICELIST`)),4,3) INTO @max FROM pricelist_sewa_armada;
    IF(@max >=1) THEN
    	SET new.ID_PRICELIST = CONCAT(("HRG"),LPAD(@max+1,3,'0'));
    ELSE
    	SET new.ID_PRICELIST = CONCAT(("HRG"),LPAD(1,3,'0'));
    END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `rekening`
--

CREATE TABLE `rekening` (
  `ID_REKENING` varchar(10) NOT NULL,
  `NAMA_BANK` varchar(50) NOT NULL,
  `NOMOR_REKENING` varchar(100) NOT NULL,
  `ATAS_NAMA` varchar(50) NOT NULL,
  `GAMBAR` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rekening`
--

INSERT INTO `rekening` (`ID_REKENING`, `NAMA_BANK`, `NOMOR_REKENING`, `ATAS_NAMA`, `GAMBAR`) VALUES
('REK001', 'BTPN', '90260078897', 'PT. MDC TRANS', NULL);

--
-- Triggers `rekening`
--
DELIMITER $$
CREATE TRIGGER `trigger_rekening` BEFORE INSERT ON `rekening` FOR EACH ROW BEGIN
	SELECT SUBSTRING((MAX(`ID_REKENING`)),4,3) INTO @max FROM rekening;
    IF(@max >=1) THEN
    	SET new.ID_REKENING = CONCAT(("REK"),LPAD(@max+1,3,'0'));
    ELSE
    	SET new.ID_REKENING = CONCAT(("REK"),LPAD(1,3,'0'));
    END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `schedule_armada`
--

CREATE TABLE `schedule_armada` (
  `ID_SCHEDULE` varchar(20) NOT NULL,
  `ID_ARMADA` varchar(10) DEFAULT NULL,
  `ID_SEWA_BUS` varchar(20) DEFAULT NULL,
  `id_bus_category` int(11) DEFAULT NULL,
  `ID_SEWA_PAKET` varchar(20) DEFAULT NULL,
  `TGL_SEWA` date DEFAULT NULL,
  `JAM_SEWA` time DEFAULT NULL,
  `TGL_AKHIR_SEWA` date DEFAULT NULL,
  `JAM_AKHIR_SEWA` time DEFAULT NULL,
  `STATUS_ARMADA` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Triggers `schedule_armada`
--
DELIMITER $$
CREATE TRIGGER `trigger_schedule` BEFORE INSERT ON `schedule_armada` FOR EACH ROW BEGIN
	SELECT SUBSTRING((MAX(`ID_SCHEDULE`)),6,3) INTO @max FROM schedule_armada;
    IF(@max >=1) THEN
    	SET new.ID_SCHEDULE = CONCAT(("SCHDL"),LPAD(@max+1,3,'0'));
    ELSE
    	SET new.ID_SCHEDULE = CONCAT(("SCHDL"),LPAD(1,3,'0'));
    END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `sewa_bus`
--

CREATE TABLE `sewa_bus` (
  `ID_SEWA_BUS` varchar(50) NOT NULL,
  `ID_PENGGUNA` varchar(20) DEFAULT NULL,
  `ID_CUSTOMER` varchar(20) DEFAULT NULL,
  `EMAIL_CUSTOMER` varchar(50) DEFAULT NULL,
  `TGL_SEWA_BUS` date DEFAULT NULL,
  `TGL_AKHIR_SEWA` date DEFAULT NULL,
  `JAM_SEWA` time DEFAULT NULL,
  `JAM_AKHIR_SEWA` time DEFAULT NULL,
  `DP_BUS` float DEFAULT NULL,
  `SISA_SEWA_BUS` float DEFAULT NULL,
  `STATUS_SEWA` varchar(100) DEFAULT NULL,
  `total_payment` float DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `TGL` date DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sewa_bus`
--

INSERT INTO `sewa_bus` (`ID_SEWA_BUS`, `ID_PENGGUNA`, `ID_CUSTOMER`, `EMAIL_CUSTOMER`, `TGL_SEWA_BUS`, `TGL_AKHIR_SEWA`, `JAM_SEWA`, `JAM_AKHIR_SEWA`, `DP_BUS`, `SISA_SEWA_BUS`, `STATUS_SEWA`, `total_payment`, `created_at`, `TGL`) VALUES
('210604001', 'USR001', 'CUS002', 'hanum@gmail.com', '2021-06-05', '2021-06-06', '13:23:00', NULL, 200000, 600000, 'Booking', 800000, '2021-06-04 06:28:41', '2021-06-04'),
('210604002', 'USR002', 'CUS002', NULL, '2021-06-05', '2021-06-05', '13:45:00', NULL, 1750000, 5250000, 'On Schedule', 7000000, '2021-06-04 06:45:21', '2021-06-04'),
('210604003', 'USR001', 'CUS003', 's@d', '2021-06-05', '2021-06-06', '14:09:00', NULL, 250000, 750000, 'Booking', 1000000, '2021-06-04 07:09:17', '2021-06-04'),
('210604004', 'USR001', 'CUS004', 'f@d', '2021-06-04', '2021-06-05', '22:20:00', NULL, 3425000, 10275000, 'Booking', 13700000, '2021-06-04 15:20:25', '2021-06-04');

--
-- Triggers `sewa_bus`
--
DELIMITER $$
CREATE TRIGGER `trigger_sewa_bus` BEFORE INSERT ON `sewa_bus` FOR EACH ROW BEGIN
            DECLARE max integer DEFAULT 0;
            SELECT SUBSTRING((MAX(`ID_SEWA_BUS`)),1,6) INTO @tgl FROM sewa_bus;
            SELECT DATE_FORMAT(CURRENT_DATE, '%y%m%d') INTO @today;
            SELECT SUBSTRING((MAX(`ID_SEWA_BUS`)),7,4) INTO @max FROM sewa_bus;
            SELECT STRCMP(@tgl,@today) INTO @check;
                 IF(@max >=1) THEN
                    IF(@check = 0) THEN
                        SET new.ID_SEWA_BUS = CONCAT(@today,LPAD(@max+1,3,'0'));
                    ELSE
                        SET new.ID_SEWA_BUS = CONCAT(@today,LPAD(1,3,'0'));
                    END IF;
                 ELSE
                     SET new.ID_SEWA_BUS = CONCAT(@today,LPAD(1,3,'0'));
                 END IF;
        END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `sewa_bus_category`
--

CREATE TABLE `sewa_bus_category` (
  `id` int(11) NOT NULL,
  `ID_SEWA_BUS` varchar(50) NOT NULL,
  `ID_PRICELIST` varchar(20) NOT NULL,
  `QUANTITY` int(11) DEFAULT NULL,
  `DISCOUNT` float DEFAULT NULL,
  `DP_BUS` float DEFAULT NULL,
  `TOTAL` float DEFAULT NULL,
  `SISA_BAYAR` float DEFAULT NULL,
  `total_payment` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sewa_bus_category`
--

INSERT INTO `sewa_bus_category` (`id`, `ID_SEWA_BUS`, `ID_PRICELIST`, `QUANTITY`, `DISCOUNT`, `DP_BUS`, `TOTAL`, `SISA_BAYAR`, `total_payment`) VALUES
(133, '210604001', 'HRG139', 1, 0, NULL, 800000, NULL, NULL),
(134, '210604002', 'HRG008', 1, 0, NULL, 3500000, NULL, NULL),
(135, '210604003', 'HRG141', 1, 0, NULL, 1000000, NULL, NULL),
(136, '210604004', 'HRG081', 1, 0, NULL, 1700000, NULL, NULL),
(137, '210604004', 'HRG003', 1, 0, NULL, 12000000, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sewa_paket_wisata`
--

CREATE TABLE `sewa_paket_wisata` (
  `ID_SEWA_PAKET` varchar(20) NOT NULL,
  `ID_PENGGUNA` varchar(20) DEFAULT NULL,
  `ID_CUSTOMER` varchar(20) DEFAULT NULL,
  `ID_PAKET` varchar(10) NOT NULL,
  `TGL_SEWA_PAKET` date DEFAULT NULL,
  `TGL_AKHIR_SEWA_PAKET` date DEFAULT NULL,
  `JAM_SEWA_PAKET` time DEFAULT NULL,
  `JAM_AKHIR_SEWA_PAKET` time DEFAULT NULL,
  `DP_PAKET` float DEFAULT NULL,
  `SISA_SEWA_PAKET` float DEFAULT NULL,
  `STATUS_PAKET_WISATA` varchar(30) DEFAULT NULL,
  `QUANTITY` int(11) DEFAULT NULL,
  `DISCOUNT` float DEFAULT NULL,
  `TOTAL` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Triggers `sewa_paket_wisata`
--
DELIMITER $$
CREATE TRIGGER `trigger_sewa_paket` BEFORE INSERT ON `sewa_paket_wisata` FOR EACH ROW BEGIN
            DECLARE max integer DEFAULT 0;
            SELECT SUBSTRING((MAX(`ID_SEWA_PAKET`)),1,6) INTO @tgl FROM sewa_paket_wisata;
            SELECT DATE_FORMAT(CURRENT_DATE, '%y%m%d') INTO @today;
            SELECT SUBSTRING((MAX(`ID_SEWA_PAKET`)),7,4) INTO @max FROM sewa_paket_wisata;
            SELECT STRCMP(@tgl,@today) INTO @check;
                 IF(@max >=1) THEN
                    IF(@check = 0) THEN
                        SET new.ID_SEWA_PAKET = CONCAT(@today,LPAD(@max+1,3,'0'));
                    ELSE
                        SET new.ID_SEWA_PAKET = CONCAT(@today,LPAD(1,3,'0'));
                    END IF;
                 ELSE
                     SET new.ID_SEWA_PAKET = CONCAT(@today,LPAD(1,3,'0'));
                 END IF;
        END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `testimony`
--

CREATE TABLE `testimony` (
  `ID_TESTI` varchar(20) NOT NULL,
  `NAMA_TESTI` varchar(50) DEFAULT NULL,
  `TESTIMONY` text DEFAULT NULL,
  `STATUS` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `testimony`
--

INSERT INTO `testimony` (`ID_TESTI`, `NAMA_TESTI`, `TESTIMONY`, `STATUS`) VALUES
('TEST0001', 'Julian', 'Pelayanan super nyaman, harga terjangkau dengan kualitas terbaik.', 1),
('TEST0002', 'Henny', 'Tempat sewa bus pariwisata di Lamongan yang paling saya rekomendasikan. Bus terbaru membuat penumpang nyaman dalam perjalanan.', 1),
('TEST0003', 'Roni', 'Lokasi bersih luas bisnya bagus dan baru.', 1),
('TEST0004', 'Maksum', 'Perjalanan nyaman, asik, dan sopir menyetir dengan tenang, tidak ugal-ugalan', 1),
('TEST0005', 'hokah', 'hokeh', 0),
('TEST0006', 'hanum', 'sangat nyaman', 1);

--
-- Triggers `testimony`
--
DELIMITER $$
CREATE TRIGGER `trigger_testimony` BEFORE INSERT ON `testimony` FOR EACH ROW BEGIN
	SELECT SUBSTRING((MAX(`ID_TESTI`)),5,4) INTO @max FROM TESTIMONY;
    IF(@max >=1) THEN
    	SET new.ID_TESTI = CONCAT(("TEST"),LPAD(@max+1,4,'0'));
    ELSE
    	SET new.ID_TESTI = CONCAT(("TEST"),LPAD(1,4,'0'));
    END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Stand-in structure for view `vw_bus_ready`
-- (See below for the actual view)
--
CREATE TABLE `vw_bus_ready` (
`ID_CATEGORY` varchar(10)
,`NAMA_CATEGORY` varchar(20)
,`jmlbis` decimal(43,0)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vw_listallschedule`
-- (See below for the actual view)
--
CREATE TABLE `vw_listallschedule` (
`ID_CATEGORY` varchar(10)
,`ID_PRICELIST` varchar(20)
,`ID_SCHEDULE` varchar(20)
,`ID_ARMADA` varchar(10)
,`ID_SEWA_BUS` varchar(20)
,`id_bus_category` int(11)
,`ID_SEWA_PAKET` varchar(20)
,`TGL_SEWA` date
,`JAM_SEWA` time
,`TGL_AKHIR_SEWA` date
,`JAM_AKHIR_SEWA` time
,`STATUS_ARMADA` tinyint(1)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vw_schedule_armada`
-- (See below for the actual view)
--
CREATE TABLE `vw_schedule_armada` (
`NAMA_CUSTOMER` varchar(50)
,`TUJUAN_SEWA` text
,`ID_SCHEDULE` varchar(20)
,`title` varchar(20)
,`start` date
,`end` date
,`STATUS_ARMADA` varchar(11)
,`className` varchar(10)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vw_schedule_armada_paket`
-- (See below for the actual view)
--
CREATE TABLE `vw_schedule_armada_paket` (
`NAMA_CUSTOMER` varchar(50)
,`TUJUAN_SEWA` text
,`ID_SCHEDULE` varchar(20)
,`title` varchar(20)
,`start` date
,`end` date
,`STATUS_ARMADA` varchar(11)
,`className` varchar(10)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vw_tampil_schedule`
-- (See below for the actual view)
--
CREATE TABLE `vw_tampil_schedule` (
`NAMA_CUSTOMER` varchar(50)
,`TUJUAN_SEWA` mediumtext
,`ID_SCHEDULE` varchar(20)
,`title` varchar(20)
,`start` date
,`end` date
,`STATUS_ARMADA` varchar(11)
,`className` varchar(10)
);

-- --------------------------------------------------------

--
-- Structure for view `vw_bus_ready`
--
DROP TABLE IF EXISTS `vw_bus_ready`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_bus_ready`  AS SELECT `tmp`.`ID_CATEGORY` AS `ID_CATEGORY`, `tmp`.`NAMA_CATEGORY` AS `NAMA_CATEGORY`, sum(`tmp`.`jmlbis`) AS `jmlbis` FROM (select `ct`.`ID_CATEGORY` AS `ID_CATEGORY`,`ct`.`NAMA_CATEGORY` AS `NAMA_CATEGORY`,count(`ar`.`ID_ARMADA`) AS `jmlbis` from (`armada` `ar` join `category_armada` `ct` on(`ct`.`ID_CATEGORY` = `ar`.`ID_CATEGORY`)) where `ar`.`STATUS_ARMADA` = 1 group by `ct`.`ID_CATEGORY`,`ct`.`NAMA_CATEGORY` union select `ca`.`ID_CATEGORY` AS `ID_CATEGORY`,`ca`.`NAMA_CATEGORY` AS `NAMA_CATEGORY`,-count(`ar`.`ID_ARMADA`) AS `jmlbis` from ((`schedule_armada` `sa` join `armada` `ar` on(`ar`.`ID_ARMADA` = `sa`.`ID_ARMADA`)) join `category_armada` `ca` on(`ca`.`ID_CATEGORY` = `ar`.`ID_CATEGORY`)) where `sa`.`STATUS_ARMADA` = 0 group by `ca`.`ID_CATEGORY`,`ca`.`NAMA_CATEGORY`) AS `tmp` GROUP BY `tmp`.`ID_CATEGORY`, `tmp`.`NAMA_CATEGORY` ;

-- --------------------------------------------------------

--
-- Structure for view `vw_listallschedule`
--
DROP TABLE IF EXISTS `vw_listallschedule`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_listallschedule`  AS SELECT `psa`.`ID_CATEGORY` AS `ID_CATEGORY`, `psa`.`ID_PRICELIST` AS `ID_PRICELIST`, `sa`.`ID_SCHEDULE` AS `ID_SCHEDULE`, `sa`.`ID_ARMADA` AS `ID_ARMADA`, `sa`.`ID_SEWA_BUS` AS `ID_SEWA_BUS`, `sa`.`id_bus_category` AS `id_bus_category`, `sa`.`ID_SEWA_PAKET` AS `ID_SEWA_PAKET`, `sa`.`TGL_SEWA` AS `TGL_SEWA`, `sa`.`JAM_SEWA` AS `JAM_SEWA`, `sa`.`TGL_AKHIR_SEWA` AS `TGL_AKHIR_SEWA`, `sa`.`JAM_AKHIR_SEWA` AS `JAM_AKHIR_SEWA`, `sa`.`STATUS_ARMADA` AS `STATUS_ARMADA` FROM ((`schedule_armada` `sa` join `sewa_bus_category` `sbc` on(`sbc`.`id` = `sa`.`id_bus_category`)) join `pricelist_sewa_armada` `psa` on(`psa`.`ID_PRICELIST` = `sbc`.`ID_PRICELIST`)) ;

-- --------------------------------------------------------

--
-- Structure for view `vw_schedule_armada`
--
DROP TABLE IF EXISTS `vw_schedule_armada`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_schedule_armada`  AS SELECT `cus`.`NAMA_CUSTOMER` AS `NAMA_CUSTOMER`, `pr`.`TUJUAN_SEWA` AS `TUJUAN_SEWA`, `schdl`.`ID_SCHEDULE` AS `ID_SCHEDULE`, `ar`.`PLAT_NOMOR` AS `title`, `schdl`.`TGL_SEWA` AS `start`, `schdl`.`TGL_AKHIR_SEWA` AS `end`, CASE WHEN `schdl`.`STATUS_ARMADA` = 1 THEN 'Selesai' ELSE 'On Schedule' END AS `STATUS_ARMADA`, CASE WHEN `schdl`.`STATUS_ARMADA` = 1 THEN 'bg-danger' ELSE 'bg-primary' END AS `className` FROM (((((`schedule_armada` `schdl` join `armada` `ar` on(`schdl`.`ID_ARMADA` = `ar`.`ID_ARMADA`)) join `sewa_bus` `sb` on(`sb`.`ID_SEWA_BUS` = `schdl`.`ID_SEWA_BUS`)) join `customer` `cus` on(`cus`.`ID_CUSTOMER` = `sb`.`ID_CUSTOMER`)) join `sewa_bus_category` `sbc` on(`sbc`.`ID_SEWA_BUS` = `sb`.`ID_SEWA_BUS` and `sbc`.`id` = `schdl`.`id_bus_category`)) join `pricelist_sewa_armada` `pr` on(`pr`.`ID_PRICELIST` = `sbc`.`ID_PRICELIST`)) ;

-- --------------------------------------------------------

--
-- Structure for view `vw_schedule_armada_paket`
--
DROP TABLE IF EXISTS `vw_schedule_armada_paket`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_schedule_armada_paket`  AS SELECT `cus`.`NAMA_CUSTOMER` AS `NAMA_CUSTOMER`, `pr`.`TUJUAN_SEWA` AS `TUJUAN_SEWA`, `schdl`.`ID_SCHEDULE` AS `ID_SCHEDULE`, `ar`.`PLAT_NOMOR` AS `title`, `schdl`.`TGL_SEWA` AS `start`, `schdl`.`TGL_AKHIR_SEWA` AS `end`, CASE WHEN `schdl`.`STATUS_ARMADA` = 1 THEN 'Selesai' ELSE 'On Schedule' END AS `STATUS_ARMADA`, CASE WHEN `schdl`.`STATUS_ARMADA` = 1 THEN 'bg-danger' ELSE 'bg-primary' END AS `className` FROM (((((`schedule_armada` `schdl` join `armada` `ar` on(`schdl`.`ID_ARMADA` = `ar`.`ID_ARMADA`)) join `sewa_bus` `sb` on(`sb`.`ID_SEWA_BUS` = `schdl`.`ID_SEWA_BUS`)) join `customer` `cus` on(`cus`.`ID_CUSTOMER` = `sb`.`ID_CUSTOMER`)) join `sewa_bus_category` `sbc` on(`sbc`.`ID_SEWA_BUS` = `sb`.`ID_SEWA_BUS` and `sbc`.`id` = `schdl`.`id_bus_category`)) join `pricelist_sewa_armada` `pr` on(`pr`.`ID_PRICELIST` = `sbc`.`ID_PRICELIST`)) ;

-- --------------------------------------------------------

--
-- Structure for view `vw_tampil_schedule`
--
DROP TABLE IF EXISTS `vw_tampil_schedule`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_tampil_schedule`  AS SELECT `cus`.`NAMA_CUSTOMER` AS `NAMA_CUSTOMER`, `pr`.`TUJUAN_SEWA` AS `TUJUAN_SEWA`, `schdl`.`ID_SCHEDULE` AS `ID_SCHEDULE`, `ar`.`PLAT_NOMOR` AS `title`, `schdl`.`TGL_SEWA` AS `start`, `schdl`.`TGL_AKHIR_SEWA` AS `end`, CASE WHEN `schdl`.`STATUS_ARMADA` = 1 THEN 'Selesai' ELSE 'On Schedule' END AS `STATUS_ARMADA`, CASE WHEN `schdl`.`STATUS_ARMADA` = 1 THEN 'bg-danger' ELSE 'bg-primary' END AS `className` FROM (((((`schedule_armada` `schdl` join `armada` `ar` on(`schdl`.`ID_ARMADA` = `ar`.`ID_ARMADA`)) join `sewa_bus` `sb` on(`sb`.`ID_SEWA_BUS` = `schdl`.`ID_SEWA_BUS`)) join `customer` `cus` on(`cus`.`ID_CUSTOMER` = `sb`.`ID_CUSTOMER`)) join `sewa_bus_category` `sbc` on(`sbc`.`ID_SEWA_BUS` = `sb`.`ID_SEWA_BUS` and `sbc`.`id` = `schdl`.`id_bus_category`)) join `pricelist_sewa_armada` `pr` on(`pr`.`ID_PRICELIST` = `sbc`.`ID_PRICELIST`)) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `armada`
--
ALTER TABLE `armada`
  ADD PRIMARY KEY (`ID_ARMADA`),
  ADD UNIQUE KEY `PLAT_NOMOR` (`PLAT_NOMOR`),
  ADD KEY `FK_CATEGORY` (`ID_CATEGORY`);

--
-- Indexes for table `category_armada`
--
ALTER TABLE `category_armada`
  ADD PRIMARY KEY (`ID_CATEGORY`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`ID_CUSTOMER`);

--
-- Indexes for table `galeri`
--
ALTER TABLE `galeri`
  ADD PRIMARY KEY (`ID_GALERI`),
  ADD KEY `FK` (`ID_ARMADA`);

--
-- Indexes for table `hari`
--
ALTER TABLE `hari`
  ADD PRIMARY KEY (`ID_HARI`);

--
-- Indexes for table `history_lama_pricelist`
--
ALTER TABLE `history_lama_pricelist`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `history_pricelist`
--
ALTER TABLE `history_pricelist`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jenis_bayar`
--
ALTER TABLE `jenis_bayar`
  ADD PRIMARY KEY (`ID_JENIS`);

--
-- Indexes for table `paket_wisata`
--
ALTER TABLE `paket_wisata`
  ADD PRIMARY KEY (`ID_PAKET`),
  ADD KEY `FK_ID_CATEGORY` (`ID_CATEGORY`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_ID_REKENING` (`ID_REKENING`),
  ADD KEY `FK_ID_SEWA_BUS` (`ID_SEWA_BUS`),
  ADD KEY `FK_JENIS` (`ID_JENIS`);

--
-- Indexes for table `pembayaran_paket`
--
ALTER TABLE `pembayaran_paket`
  ADD PRIMARY KEY (`id_paket`),
  ADD KEY `FK_ID_REKENING` (`ID_REKENING`),
  ADD KEY `FK_ID_SEWA_PAKET` (`ID_SEWA_PAKET`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`ID_PENGGUNA`);

--
-- Indexes for table `pricelist_sewa_armada`
--
ALTER TABLE `pricelist_sewa_armada`
  ADD PRIMARY KEY (`ID_PRICELIST`),
  ADD KEY `ID_CATEGORY_ARMADA_SEWA` (`ID_CATEGORY`),
  ADD KEY `FK_ID_HARI` (`ID_HARI`);

--
-- Indexes for table `rekening`
--
ALTER TABLE `rekening`
  ADD PRIMARY KEY (`ID_REKENING`);

--
-- Indexes for table `schedule_armada`
--
ALTER TABLE `schedule_armada`
  ADD PRIMARY KEY (`ID_SCHEDULE`),
  ADD KEY `FK_ID_ARMADAAA` (`ID_ARMADA`),
  ADD KEY `fk_sewa_bus_category` (`id_bus_category`),
  ADD KEY `FK_ID_BUS` (`ID_SEWA_BUS`),
  ADD KEY `FK_PAKET_SEWA` (`ID_SEWA_PAKET`);

--
-- Indexes for table `sewa_bus`
--
ALTER TABLE `sewa_bus`
  ADD PRIMARY KEY (`ID_SEWA_BUS`),
  ADD KEY `FK_SEWA_BUS_MELAYANI__PENGGUNA` (`ID_PENGGUNA`),
  ADD KEY `FK_SEWA_BUS_MEMILIH_S_CUSTOMER` (`ID_CUSTOMER`);

--
-- Indexes for table `sewa_bus_category`
--
ALTER TABLE `sewa_bus_category`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_PRICELIST` (`ID_PRICELIST`),
  ADD KEY `FK_BUS` (`ID_SEWA_BUS`);

--
-- Indexes for table `sewa_paket_wisata`
--
ALTER TABLE `sewa_paket_wisata`
  ADD PRIMARY KEY (`ID_SEWA_PAKET`),
  ADD KEY `FK_SEWA_PAK_MELAYANI__PENGGUNA` (`ID_PENGGUNA`),
  ADD KEY `FK_SEWA_PAK_MEMILIH_P_PAKET_WI` (`ID_PAKET`),
  ADD KEY `FK_SEWA_PAK_MEMILIH_S_CUSTOMER` (`ID_CUSTOMER`);

--
-- Indexes for table `testimony`
--
ALTER TABLE `testimony`
  ADD PRIMARY KEY (`ID_TESTI`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `hari`
--
ALTER TABLE `hari`
  MODIFY `ID_HARI` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `history_lama_pricelist`
--
ALTER TABLE `history_lama_pricelist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `history_pricelist`
--
ALTER TABLE `history_pricelist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `jenis_bayar`
--
ALTER TABLE `jenis_bayar`
  MODIFY `ID_JENIS` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `pembayaran_paket`
--
ALTER TABLE `pembayaran_paket`
  MODIFY `id_paket` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `sewa_bus_category`
--
ALTER TABLE `sewa_bus_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=138;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `armada`
--
ALTER TABLE `armada`
  ADD CONSTRAINT `FK_CATEGORY` FOREIGN KEY (`ID_CATEGORY`) REFERENCES `category_armada` (`ID_CATEGORY`);

--
-- Constraints for table `galeri`
--
ALTER TABLE `galeri`
  ADD CONSTRAINT `FK` FOREIGN KEY (`ID_ARMADA`) REFERENCES `armada` (`ID_ARMADA`);

--
-- Constraints for table `paket_wisata`
--
ALTER TABLE `paket_wisata`
  ADD CONSTRAINT `FK_ID_CATEGORY` FOREIGN KEY (`ID_CATEGORY`) REFERENCES `category_armada` (`ID_CATEGORY`);

--
-- Constraints for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `FK_ID_SEWA_BUS` FOREIGN KEY (`ID_SEWA_BUS`) REFERENCES `sewa_bus` (`ID_SEWA_BUS`),
  ADD CONSTRAINT `FK_JENIS` FOREIGN KEY (`ID_JENIS`) REFERENCES `jenis_bayar` (`ID_JENIS`);

--
-- Constraints for table `pembayaran_paket`
--
ALTER TABLE `pembayaran_paket`
  ADD CONSTRAINT `FK_ID_SEWA_PAKET` FOREIGN KEY (`ID_SEWA_PAKET`) REFERENCES `sewa_paket_wisata` (`ID_SEWA_PAKET`);

--
-- Constraints for table `pricelist_sewa_armada`
--
ALTER TABLE `pricelist_sewa_armada`
  ADD CONSTRAINT `FK_ID_HARI` FOREIGN KEY (`ID_HARI`) REFERENCES `hari` (`ID_HARI`);

--
-- Constraints for table `schedule_armada`
--
ALTER TABLE `schedule_armada`
  ADD CONSTRAINT `FK_ID_BUS` FOREIGN KEY (`ID_SEWA_BUS`) REFERENCES `sewa_bus` (`ID_SEWA_BUS`),
  ADD CONSTRAINT `FK_PAKET_SEWA` FOREIGN KEY (`ID_SEWA_PAKET`) REFERENCES `sewa_paket_wisata` (`ID_SEWA_PAKET`);

--
-- Constraints for table `sewa_bus_category`
--
ALTER TABLE `sewa_bus_category`
  ADD CONSTRAINT `FK_BUS` FOREIGN KEY (`ID_SEWA_BUS`) REFERENCES `sewa_bus` (`ID_SEWA_BUS`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
