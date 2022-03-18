-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 16 Mar 2022 pada 17.36
-- Versi server: 10.4.13-MariaDB
-- Versi PHP: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bangundatacenter`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `about`
--

CREATE TABLE `about` (
  `about_id` int(11) NOT NULL,
  `about_text` longtext NOT NULL,
  `about_team` longtext NOT NULL,
  `about_image` text NOT NULL,
  `post_date` datetime NOT NULL,
  `post_by` int(1) NOT NULL DEFAULT 1,
  `update_date` datetime NOT NULL,
  `update_by` int(11) NOT NULL,
  `delete_date` datetime NOT NULL,
  `delete_by` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `about`
--

INSERT INTO `about` (`about_id`, `about_text`, `about_team`, `about_image`, `post_date`, `post_by`, `update_date`, `update_by`, `delete_date`, `delete_by`, `status`) VALUES
(1, '<p class=\"text-justify\">Tes Bangundatacenter adalah salah satu solusi bisnis baru PT NPS Pemuda Berdikarisma yang berfokus pada Penyediaan Solusi Pembangunan Data Center secara komprehensif.</p>\r\n<p class=\"text-justify\">PT. NPS Pemuda Berdikarisma adalah Authorized Distributor &amp; Authorized Service Partner Liebert Vertiv di Indonesia sebagai salah satu penyedia solusi Data Center Infrastruktur terkemuka di dunia dan PT. NPS Pemuda Berdikarisma juga adalah Mitra Solusi Resmi untuk perangkat pendukung Data Center &amp; IT Infrastruktur seperti Zt Floor, HIKvision, Ritar, Panduit, Kidde, Dell, HP, Cisco &amp; Fortinet</p>\r\n<p class=\"text-justify\">Dengan tim kami yang berpengalaman, bersertifikat dan terampil, kami memastikan pelanggan kami akan mendapatkan manfaat ekstra dari semua solusi yang diberikan. Kami juga memberikan pengalaman pra dan purna jual yang akan memastikan semuanya berjalan dengan kualitas pekerjaan terbaik.</p>\r\n<p class=\"text-justify\">Kami adalah penyedia solusi yang dapat Anda percaya dan andalkan untuk menyediakan solusi daya untuk cadangan daya kritis Anda. Kami tidak hanya menjual produk kami tetapi juga memberi Anda pengetahuan dan pengalaman kami untuk memberikan solusi terbaik berdasarkan kebutuhan Anda.</p>', '<p>Tes PT. NPS Pemuda memiliki staf yang profesional di bidang Teknologi Informasi untuk memberikan solusi terbaik serta tim ahli dan konsultan untuk memenuhi kebutuhan industri berdasarkan pengetahuan di bidangnya. Lebih dari 3 engineer/konsultan dengan solusi sertifikasi multi-platform, terdiri dari individu-individu yang kompeten dan berpengalaman dengan berbagai sertifikasi internasional, terdiri dari Sertifikasi Data Center (CDCP, CDCS, CDCE), UPS Sertifikasi, PAC Sertifikasi. NPS juga memiliki tim manajemen proyek yang solid dengan Manajer Proyek (PMP) bersertifikat. Kami hadir untuk mendukung pertumbuhan bisnis Anda.</p>', 'about--1647000273.jpg', '2022-02-24 18:28:53', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_username` varchar(50) NOT NULL,
  `admin_email` varchar(100) NOT NULL,
  `admin_password` varchar(100) NOT NULL,
  `admin_role` enum('superadmin','admin','writer') NOT NULL,
  `post_date` datetime NOT NULL,
  `post_by` int(1) NOT NULL DEFAULT 1,
  `update_date` datetime DEFAULT NULL,
  `update_by` int(1) DEFAULT NULL,
  `delete_date` datetime DEFAULT NULL,
  `delete_by` int(1) DEFAULT NULL,
  `status` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_username`, `admin_email`, `admin_password`, `admin_role`, `post_date`, `post_by`, `update_date`, `update_by`, `delete_date`, `delete_by`, `status`) VALUES
(1, 'superadmin', 'superadmin@bangundatacentral.com', '$2y$10$g3JXHKamC80pVlAQI4Z90eoDQv4NVb7bd1erTtpMw2LS/R2/vN8Xa', 'superadmin', '2022-02-21 17:01:46', 1, NULL, NULL, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `ci_sessions`
--

CREATE TABLE `ci_sessions` (
  `id` varchar(40) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `data` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `ci_sessions`
--

INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES
('2dt6o8cms72cq2mkgjvdnuh93jjokdpt', '::1', 1647444504, 0x5f5f63695f6c6173745f726567656e65726174657c693a313634373434343530343b61646d696e5f69647c733a313a2231223b61646d696e5f757365726e616d657c4e3b61646d696e5f72756c657c733a31303a22737570657261646d696e223b),
('68h1s4sj1f0jkf87chjdoj97qm06m5vp', '::1', 1647445157, 0x5f5f63695f6c6173745f726567656e65726174657c693a313634373434353135373b61646d696e5f69647c733a313a2231223b61646d696e5f757365726e616d657c4e3b61646d696e5f72756c657c733a31303a22737570657261646d696e223b),
('anh152m08asg829rc8ucqqm6p04khso8', '::1', 1647446862, 0x5f5f63695f6c6173745f726567656e65726174657c693a313634373434363836323b61646d696e5f69647c733a313a2231223b61646d696e5f757365726e616d657c4e3b61646d696e5f72756c657c733a31303a22737570657261646d696e223b),
('dp1hclkvr4t66c5q9kk4ubda5p3g24v6', '::1', 1647443352, 0x5f5f63695f6c6173745f726567656e65726174657c693a313634373434333335323b61646d696e5f69647c733a313a2231223b61646d696e5f757365726e616d657c4e3b61646d696e5f72756c657c733a31303a22737570657261646d696e223b),
('kiljj4l1dg7pooipf09bqodf1lt1t7f3', '::1', 1647446115, 0x5f5f63695f6c6173745f726567656e65726174657c693a313634373434363131353b61646d696e5f69647c733a313a2231223b61646d696e5f757365726e616d657c4e3b61646d696e5f72756c657c733a31303a22737570657261646d696e223b),
('m09hanve95kv849kvdve4sj50mu317r4', '::1', 1647444198, 0x5f5f63695f6c6173745f726567656e65726174657c693a313634373434343139383b61646d696e5f69647c733a313a2231223b61646d696e5f757365726e616d657c4e3b61646d696e5f72756c657c733a31303a22737570657261646d696e223b),
('mus7cqbdrnc8q55vjhvhqa0lvp0t7aqj', '::1', 1647448296, 0x5f5f63695f6c6173745f726567656e65726174657c693a313634373434383031383b61646d696e5f69647c733a313a2231223b61646d696e5f757365726e616d657c4e3b61646d696e5f72756c657c733a31303a22737570657261646d696e223b),
('nk7qv1mq7dfte14m3345nnrsbrf0pl7n', '::1', 1647447238, 0x5f5f63695f6c6173745f726567656e65726174657c693a313634373434373233383b61646d696e5f69647c733a313a2231223b61646d696e5f757365726e616d657c4e3b61646d696e5f72756c657c733a31303a22737570657261646d696e223b),
('r0jqojcfru7bihdsda75u193p877mr0o', '::1', 1647447715, 0x5f5f63695f6c6173745f726567656e65726174657c693a313634373434373731353b61646d696e5f69647c733a313a2231223b61646d696e5f757365726e616d657c4e3b61646d696e5f72756c657c733a31303a22737570657261646d696e223b),
('uumek5hcblo4s13dkl182r47dv0tn02s', '::1', 1647448018, 0x5f5f63695f6c6173745f726567656e65726174657c693a313634373434383031383b61646d696e5f69647c733a313a2231223b61646d696e5f757365726e616d657c4e3b61646d696e5f72756c657c733a31303a22737570657261646d696e223b);

-- --------------------------------------------------------

--
-- Struktur dari tabel `contact_us`
--

CREATE TABLE `contact_us` (
  `contact_id` int(11) NOT NULL,
  `contact_title` varchar(100) NOT NULL,
  `contact_content` text NOT NULL,
  `contact_type` enum('address','phone','email') NOT NULL,
  `post_date` datetime NOT NULL,
  `post_by` int(1) NOT NULL DEFAULT 1,
  `update_date` datetime DEFAULT NULL,
  `update_by` int(1) DEFAULT NULL,
  `delete_date` datetime DEFAULT NULL,
  `delete_by` int(11) DEFAULT NULL,
  `status` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `contact_us`
--

INSERT INTO `contact_us` (`contact_id`, `contact_title`, `contact_content`, `contact_type`, `post_date`, `post_by`, `update_date`, `update_by`, `delete_date`, `delete_by`, `status`) VALUES
(1, 'Main Office', '<p>Graha Global,<br /> ITC Duta Mas Fatmawati D2/8<br /> Kebayoran Baru, Jakarta Selatan</p>', 'address', '2022-02-25 13:57:30', 1, '2022-02-28 17:13:26', 1, NULL, NULL, 1),
(2, 'Wa Phone', '628111444735', 'phone', '2022-02-28 22:57:44', 1, '2022-02-28 17:13:26', 1, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `faq`
--

CREATE TABLE `faq` (
  `faq_id` int(11) NOT NULL,
  `faq_title` varchar(100) NOT NULL,
  `faq_content` longtext NOT NULL,
  `post_date` datetime NOT NULL,
  `post_by` int(1) NOT NULL DEFAULT 1,
  `update_date` datetime DEFAULT NULL,
  `update_by` int(1) DEFAULT NULL,
  `delete_date` datetime DEFAULT NULL,
  `delete_by` int(1) DEFAULT NULL,
  `status` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `faq`
--

INSERT INTO `faq` (`faq_id`, `faq_title`, `faq_content`, `post_date`, `post_by`, `update_date`, `update_by`, `delete_date`, `delete_by`, `status`) VALUES
(1, 'WHAT IS A DATA CENTER ?', '<p style=\"text-align: justify;\">Data Center adalah sebuah bangunan , ruang khusus di dalam gedung, atau sekelompok bangunan yang digunakan untuk menampung sistem komputer dan terkait komponen, seperti telekomunikasi dan sistem penyimpanan . Karena operasi TI sangat penting untuk kelangsungan bisnis , biasanya mencakup komponen dan infrastruktur yang berlebihan atau cadangan untuk catu daya , koneksi komunikasi data, kontrol lingkungan (misalnya, AC , pemadam kebakaran), dan berbagai perangkat keamanan. Pusat data besar adalah operasi skala industri yang menggunakan listrik sebanyak kota kecil</p>', '2022-03-11 11:37:35', 1, NULL, NULL, NULL, NULL, 1),
(2, 'WHY SHOULD YOU BUILD A DATA CENTER ?', '<p style=\"text-align: justify;\">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent nisl lorem, dictum id pellentesque at, vestibulum ut arcu. Curabitur erat libero, egestas eu tincidunt ac, rutrum ac justo. Vivamus condimentum laoreet lectus, blandit posuere tortor aliquam vitae. Curabitur molestie eros.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent nisl lorem, dictum id pellentesque at, vestibulum ut arcu. Curabitur erat libero, egestas eu tincidunt ac, rutrum ac justo. Vivamus condimentum laoreet lectus, blandit posuere tortor aliquam vitae. Curabitur molestie eros.</p>', '2022-03-11 11:37:56', 1, NULL, NULL, NULL, NULL, 1),
(3, 'WHO SHOULD BUILD THE DATA CENTER ?', '<p style=\"text-align: justify;\">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent nisl lorem, dictum id pellentesque at, vestibulum ut arcu. Curabitur erat libero, egestas eu tincidunt ac, rutrum ac justo. Vivamus condimentum laoreet lectus, blandit posuere tortor aliquam vitae. Curabitur molestie eros.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent nisl lorem, dictum id pellentesque at, vestibulum ut arcu. Curabitur erat libero, egestas eu tincidunt ac, rutrum ac justo. Vivamus condimentum laoreet lectus, blandit posuere tortor aliquam vitae. Curabitur molestie eros.</p>', '2022-03-11 11:38:14', 1, NULL, NULL, NULL, NULL, 1),
(4, 'WHEN TO BUILD A DATA CENTER ?', '<p style=\"text-align: justify;\">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent nisl lorem, dictum id pellentesque at, vestibulum ut arcu. Curabitur erat libero, egestas eu tincidunt ac, rutrum ac justo. Vivamus condimentum laoreet lectus, blandit posuere tortor aliquam vitae. Curabitur molestie eros.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent nisl lorem, dictum id pellentesque at, vestibulum ut arcu. Curabitur erat libero, egestas eu tincidunt ac, rutrum ac justo. Vivamus condimentum laoreet lectus, blandit posuere tortor aliquam vitae. Curabitur molestie eros.</p>', '2022-03-11 11:38:31', 1, NULL, NULL, NULL, NULL, 1),
(5, 'WHERE IS THE DATA CENTER BUILD ?', '<p style=\"text-align: justify;\">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent nisl lorem, dictum id pellentesque at, vestibulum ut arcu. Curabitur erat libero, egestas eu tincidunt ac, rutrum ac justo. Vivamus condimentum laoreet lectus, blandit posuere tortor aliquam vitae. Curabitur molestie eros.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent nisl lorem, dictum id pellentesque at, vestibulum ut arcu. Curabitur erat libero, egestas eu tincidunt ac, rutrum ac justo. Vivamus condimentum laoreet lectus, blandit posuere tortor aliquam vitae. Curabitur molestie eros.</p>', '2022-03-11 11:38:52', 1, NULL, NULL, NULL, NULL, 1),
(6, 'HOW TO BUILD A DATA CENTER ?', '<p style=\"text-align: justify;\">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent nisl lorem, dictum id pellentesque at, vestibulum ut arcu. Curabitur erat libero, egestas eu tincidunt ac, rutrum ac justo. Vivamus condimentum laoreet lectus, blandit posuere tortor aliquam vitae. Curabitur molestie eros.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent nisl lorem, dictum id pellentesque at, vestibulum ut arcu. Curabitur erat libero, egestas eu tincidunt ac, rutrum ac justo. Vivamus condimentum laoreet lectus, blandit posuere tortor aliquam vitae. Curabitur molestie eros.</p>', '2022-03-11 11:39:12', 1, NULL, NULL, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `header`
--

CREATE TABLE `header` (
  `header_id` int(11) NOT NULL,
  `header_title` varchar(200) NOT NULL,
  `header_subtitle` text DEFAULT NULL,
  `header_link` text DEFAULT NULL,
  `header_image` text DEFAULT 'header-defalut.svg',
  `header_page` enum('home','solution','faq','insight','about','inquery','footer','section') NOT NULL,
  `post_date` datetime NOT NULL,
  `post_by` int(1) NOT NULL DEFAULT 1,
  `update_date` datetime DEFAULT NULL,
  `update_by` int(1) DEFAULT NULL,
  `delete_date` datetime DEFAULT NULL,
  `delete_by` int(1) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `header`
--

INSERT INTO `header` (`header_id`, `header_title`, `header_subtitle`, `header_link`, `header_image`, `header_page`, `post_date`, `post_by`, `update_date`, `update_by`, `delete_date`, `delete_by`, `status`) VALUES
(1, 'Solution', 'Data Center Infrastructure Solution', NULL, 'solution-1647057336.jpg', 'solution', '2022-02-23 00:11:19', 1, '2022-03-12 04:55:36', 1, NULL, NULL, 1),
(2, 'FAQ', 'Frequently Asked Questions', NULL, 'faq-1647002196.jpg', 'faq', '2022-02-23 00:12:24', 1, '2022-03-11 13:36:36', 1, NULL, NULL, 1),
(3, 'Insight', 'Useful insights designed for you and your business growth', NULL, 'insight-1647063657.jpg', 'insight', '2022-02-23 00:15:11', 1, '2022-03-12 06:40:57', 1, NULL, NULL, 1),
(4, 'About Us', 'Build together, grow together and worldwide', NULL, 'about-1647000021.jpg', 'about', '2022-02-23 00:21:29', 1, '2022-03-11 13:00:29', 1, NULL, NULL, 1),
(5, 'Inquiry', 'Grow your business with us let\'s collaborate.', '', 'header-defalut.svg', 'inquery', '2022-02-23 00:23:12', 1, '2022-03-16 04:29:51', 1, NULL, NULL, 1),
(6, 'Footer', '', '', 'footer-1647402025.jpg', 'footer', '2022-02-23 01:16:23', 1, '2022-03-16 04:40:25', 1, NULL, NULL, 1),
(7, 'Build Data Center', 'Data center infrastructure is one of the most critical IT infrastructures, where a <br/>\r\n          company will stake its data storage on a data center.', 'http://localhost/bangundataadmin/Website/About', 'header-home-1646978381.jpg', 'home', '2022-02-23 08:31:09', 1, '2022-03-16 11:53:59', 1, NULL, NULL, 1),
(8, 'Banner Inquery', 'Let\'s build a data center for your business growth', 'https://www.youtube.com/', 'section.jpg', 'section', '2022-03-16 10:12:58', 1, '2022-03-16 04:29:23', 1, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `inquiry`
--

CREATE TABLE `inquiry` (
  `inquiry_id` int(11) NOT NULL,
  `inquiry_name` varchar(100) NOT NULL,
  `inquiry_company` varchar(100) DEFAULT NULL,
  `inquiry_phone` varchar(100) DEFAULT NULL,
  `inquiry_industry` varchar(100) DEFAULT NULL,
  `inquiry_needs` text DEFAULT NULL,
  `post_date` datetime NOT NULL,
  `delete_date` datetime DEFAULT NULL,
  `delete_by` int(1) DEFAULT NULL,
  `read_by` int(11) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `inquiry`
--

INSERT INTO `inquiry` (`inquiry_id`, `inquiry_name`, `inquiry_company`, `inquiry_phone`, `inquiry_industry`, `inquiry_needs`, `post_date`, `delete_date`, `delete_by`, `read_by`, `status`) VALUES
(1, 'dharma saputra', 'tedihouse', '081316947758', 'komputer', 'adsasa asdsadsad', '2022-03-16 15:09:27', NULL, NULL, 1, 1),
(2, 'dharma saputra', 'tedihouse', '081316947758', 'komputer', 'tes asdsad', '2022-03-16 15:19:39', NULL, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `insight_category`
--

CREATE TABLE `insight_category` (
  `category_id` int(11) NOT NULL,
  `category_title` varchar(100) NOT NULL,
  `post_date` datetime NOT NULL,
  `post_by` int(1) NOT NULL DEFAULT 1,
  `update_date` datetime DEFAULT NULL,
  `update_by` int(1) DEFAULT NULL,
  `delete_date` datetime DEFAULT NULL,
  `delete_by` int(1) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `insight_category`
--

INSERT INTO `insight_category` (`category_id`, `category_title`, `post_date`, `post_by`, `update_date`, `update_by`, `delete_date`, `delete_by`, `status`) VALUES
(1, 'Case Study', '2022-03-01 15:26:16', 1, '2022-03-01 09:47:09', 1, NULL, NULL, 1),
(2, 'Article', '2022-03-01 15:26:28', 1, '2022-03-14 00:46:45', 1, NULL, NULL, 1),
(3, 'Tes Category 2', '2022-03-01 10:26:35', 1, '2022-03-01 10:26:42', 1, '2022-03-14 00:45:53', 1, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `insight_data`
--

CREATE TABLE `insight_data` (
  `insight_id` int(11) NOT NULL,
  `insight_title` varchar(100) NOT NULL,
  `insight_content` longtext NOT NULL,
  `insight_slug` text NOT NULL,
  `insight_category` int(11) NOT NULL,
  `insight_image` varchar(100) NOT NULL,
  `insight_view` int(1) NOT NULL DEFAULT 1,
  `post_date` datetime NOT NULL,
  `post_by` int(1) NOT NULL DEFAULT 1,
  `update_date` datetime DEFAULT NULL,
  `update_by` int(1) DEFAULT NULL,
  `delete_date` datetime DEFAULT NULL,
  `delete_by` int(1) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `insight_data`
--

INSERT INTO `insight_data` (`insight_id`, `insight_title`, `insight_content`, `insight_slug`, `insight_category`, `insight_image`, `insight_view`, `post_date`, `post_by`, `update_date`, `update_by`, `delete_date`, `delete_by`, `status`) VALUES
(1, 'New Data Center Development', '<h3><strong>Objektif Tes</strong></h3>\r\n<p class=\"pt-3\">Tujuan dari Penugasan ini adalah untuk memberikan solusi untuk kebutuhan pusat data baru, Instalasi dan konfigurasi Pusat Data Baru &amp; Migrasi untuk Perangkat yang Ada.&nbsp;Proyek ini bertujuan untuk menciptakan Pusat Data dan sistem ICT / AV / Keamanan yang sesuai dan terkondisikan dalam rangka pengelolaan yang efektif untuk mendukung kegiatan dan layanan bisnis</p>\r\n<h3 class=\"pt-3\"><strong>Solusi Produk Kami</strong></h3>\r\n<div class=\"row\">\r\n<div class=\"col-6 col-md-4\">\r\n<h4 class=\"pt-4\">Listrik</h4>\r\n<ul>\r\n<li>MDP - DC</li>\r\n<li>SDP-UPS</li>\r\n<li>PP-CRAC</li>\r\n<li>MDP - DC</li>\r\n</ul>\r\n</div>\r\n<div class=\"col-12 col-md-4\">\r\n<h4 class=\"pt-4\">Lantai yang Ditinggikan</h4>\r\n<ul>\r\n<li>Kalsium Sulfat yang Diperkuat Serat</li>\r\n<li>Penutup HPL SDP-Antistatik</li>\r\n<li>600 x 600 mm x 32 mm</li>\r\n<li>52,92 kN/m2</li>\r\n<li>24,26 kN</li>\r\n</ul>\r\n</div>\r\n<div class=\"col-12 col-md-4\">\r\n<h4 class=\"pt-4\">Pemadaman Kebakaran</h4>\r\n<ul>\r\n<li>Ruang Utilitas</li>\r\n<li>Penutup HPL SDP-Antistatik</li>\r\n<li>Ruang server</li>\r\n</ul>\r\n</div>\r\n<div class=\"col-12 col-md-4\">\r\n<h4 class=\"pt-4\">CCTV</h4>\r\n<ul>\r\n<li>Kamera IP Dome 4MP Dalam Ruangan</li>\r\n<li>NVR 8Ch</li>\r\n</ul>\r\n</div>\r\n<div class=\"col-12 col-md-4\">\r\n<h4 class=\"pt-4\">Pendingin Udara Presisi</h4>\r\n<ul>\r\n<li>Sistem Pendingin: Sistem Pendingin Udara</li>\r\n<li>Debit Udara: Debit Udara Aliran Bawah</li>\r\n<li>Kapasitas Pendinginan: 46,9 Kw</li>\r\n<li>Sistem: Redundansi Paralel</li>\r\n</ul>\r\n</div>\r\n<div class=\"col-12 col-md-4\">\r\n<h4 class=\"pt-4\">Rak &amp; Kontainmen</h4>\r\n<ul>\r\n<li>Rak 42U Lebar 600mm x Kandang Dalam 1070mm dengan Sisi Hitam</li>\r\n<li>Rak PDU 16A</li>\r\n<li>Rak PDU 32A</li>\r\n</ul>\r\n</div>\r\n<div class=\"col-12 col-md-4\">\r\n<h4 class=\"pt-4\"><br />Sistem&nbsp;Pemantauan Lingkungan</h4>\r\n<ul>\r\n<li>Kekuatan pemantauan</li>\r\n<li>Sensor Suhu / Kelembaban</li>\r\n<li>Kebocoran Air 10 Kaki</li>\r\n<li>Suar Alarm</li>\r\n</ul>\r\n</div>\r\n<div class=\"col-12 col-md-4\">\r\n<h4 class=\"pt-4\">UPS</h4>\r\n<ul>\r\n<li>Kapasitas Daya: 60 KVA</li>\r\n<li>Waktu pencadangan: 15 Menit Muatan penuh</li>\r\n<li>Sistem: Redundansi Paralel</li>\r\n</ul>\r\n</div>\r\n<div class=\"col-12 col-md-4\">\r\n<h4 class=\"pt-4\">Penahanan</h4>\r\n<ul>\r\n<li>Penahanan</li>\r\n<li>Rel Pemasangan Panel Seluler - 1800mm</li>\r\n<li>Rel Pemasangan Panel Seluler - 300mm</li>\r\n<li>Rel Pemasangan Panel Seluler - 100mm</li>\r\n<li>Panel Seluler - 1200mm</li>\r\n<li>Kunci Panel Seluler</li>\r\n<li>Pintu Penahan Lorong - Geser</li>\r\n<li>Header Pintu - 42U</li>\r\n<li>Kunci pintu</li>\r\n</ul>\r\n<p>&nbsp;</p>\r\n</div>\r\n</div>\r\n<p><img src=\"http://localhost/bangundataadmin/assets/website/img/insight/upload-1647414254.png\" alt=\"\" width=\"100%\" /></p>', 'new-data-center-development', 1, 'insight-new-data-center-development-1647414203.png', 1, '2022-03-01 16:34:40', 1, '2022-03-16 09:21:14', 1, NULL, NULL, 1),
(2, 'Kapan Waktu yang Tepat Mengganti UPS Data Center Anda', '<p>Sebuah unit UPS terdiri atas berbagai komponen. Salah satu komponen utamanya adalah baterai. Karena sejumlah penyebab, baterai UPS dapat mengalami kegagalan fungsi. Akibatnya, peralatan yang terhubung dengan perangkat ini tak berjalan semestinya ketika daya listrik utama tak mengalir.<br /><br />Bukan hanya baterai, ada juga beberapa komponen dalam UPS yang bisa mengalami kerusakan, misalnya kapasitor, papan sirkuit, dan sebagainya. Masalah dapat terjadi karena komponen-komponen tersebut terpapar panas atau justru berada di tempat yang terlalu lembap. Debu dan gangguan lain juga bisa membuat UPS tak berfungsi dengan normal</p>\r\n<h3 class=\"pt-3\"><strong>Haruskah Mengganti UPS?</strong></h3>\r\n<p class=\"pt-3\">Apabila terjadi masalah pada unit UPS yang digunakan, wajar jika Anda bertanya kapan waktu yang tepat untuk menggantinya. Pada beberapa kasus, sebuah UPS masih bisa diperbaiki. Karena itu, akan sayang jika Anda langsung menggantinya dengan unit yang baru.</p>\r\n<p class=\"pt-3\">Nah, sebelum memikirkan penggantian perangkat, hal pertama yang perlu dipertimbangkan adalah apakah UPS memiliki fungsi yang sangat vital bagi perusahaan Anda. Jika ya, Anda tentu harus menjadikan opsi penggantian sebagai solusi utama.</p>\r\n<p class=\"pt-3\">Pada beberapa kasus, misalnya di rumah sakit, kegiatan operasional akan terhambat tanpa adanya UPS. Peralatan medis yang menggunakan aliran listrik akan terganggu jika terjadinya pemadaman listrik secara tiba-tiba. Kondisi ini dapat membahayakan bagi pasien yang sedang kritis.</p>\r\n<p class=\"pt-3\">Dalam situasi seperti itu, UPS yang tidak berfungsi perlu langsung diganti demi menghindari hal-hal yang tidak diinginkan.</p>\r\n<h3 class=\"pt-3\"><strong>Pentingnya Perencanaan Penggunaan UPS ?</strong></h3>\r\n<p class=\"pt-3\">Langkah yang paling penting setelah mengambil sebuah keputusan adalah melakukan perencanaan. Setelah Anda memastikan bahwa perusahaan harus memiliki UPS demi keberlangsungan kegiatan operasional, jangan lupa untuk melakukan perencanaan pembelian.</p>\r\n<p class=\"pt-3\">Luangkanlah waktu sejenak untuk memahami kebutuhan perusahaan akan perangkat ini. Jika perlu, berdiskusilah dengan seorang konsultan independen yang sangat memahami pentingnya UPS bagi sebuah perusahaan.</p>\r\n<p class=\"pt-3\">Tugas seorang konsultan independen adalah membantu Anda untuk memperjelas kebutuhan dari sudut pandang yang kritis. Selain itu, konsultan UPS juga memiliki pengetahuan dan wawasan mengenai jenis-jenis UPS yang paling sesuai dengan kebutuhan dan kemampuan Anda.</p>\r\n<p class=\"pt-3\">Ada beberapa topik yang bisa didiskusikan bersama konsultan independen dalam rangka merencanakan penggunaan UPS, yaitu pentingnya efisiensi energi, beban daya yang harus ditanggung, lingkungan tempat UPS dipasang, dan sebagainya.</p>\r\n<h3 class=\"pt-3\"><strong>Tanggungan Biaya Penggunaan UPS</strong></h3>\r\n<p class=\"pt-3\">Seiring dengan proses merencanakan jenis UPS yang akan dipasang di perusahaan Anda, tak kalah penting juga mengetahui total biaya yang diperlukan. Bukan saja anggaran untuk menyediakan unit perangkat UPS, tetapi juga termasuk biaya pemeliharaan yang harus dikeluarkan selama penggunaannya.</p>\r\n<p class=\"pt-3\">Biaya-biaya ini bervariasi tergantung pada distributor yang dipilih. Sebagian mungkin tidak mahal pada awal pembelian, tetapi Anda harus mengeluarkan uang yang banyak untuk kebutuhan pemeliharaan. Perlu diketahui, pemeliharaan UPS sangat penting demi memastikan fungsinya berjalan dengan baik.</p>\r\n<p class=\"pt-3\">Pada kasus ini, Anda mungkin harus membayar biaya tahunan yang tidak sedikit. Bukan hanya untuk mengoperasikan perangkat, tetapi juga mendinginkan sistem yang digunakan. Distributor secara tidak langsung membuat Anda membayar cukup besar, meskipun harga unit UPS terbilang murah.</p>\r\n<p class=\"pt-3\">Bukan hanya itu, Anda pun perlu waspada pada kondisi baterai UPS yang akan digunakan. Komponen baterai yang buruk mau tidak mau harus diselesaikan dengan pergantian baterai dalam waktu yang cepat. Hal ini tentu tidak menguntungkan bagi pengeluaran bisnis Anda.</p>\r\n<p class=\"pt-3\">Karena itu, dalam perencanaan yang sedang disusun, sangat penting untuk menghitung jumlah biaya yang harus dikeluarkan secara keseluruhan. Jika biaya awal mahal, tetapi pemeliharaan lebih praktis, Anda bisa saja mempertimbangkannya demi penghematan pengeluaran.</p>\r\n<h3 class=\"pt-3\"><strong>Pahami Perubahan Bisnis ke Depan</strong></h3>\r\n<p class=\"pt-3\">Perusahaan yang menggunakan UPS tentu telah mengetahui pentingnya kehadiran perangkat ini dalam operasional. Demikian pula perusahaan menyadari risikonya jika UPS tak berfungsi atau tak tersedia.</p>\r\n<p class=\"pt-3\">Akan tetapi, perusahaan kadang mengalami perubahan dari waktu ke waktu, terutama bisnis yang masih dalam tahap berkembang. Dalam situasi seperti itu, mungkin bagi Anda untuk mengenyampingkan penggunaan UPS. Pasalnya, perangkat ini mungkin tidak akan dibutuhkan pada masa mendatang.</p>\r\n<p class=\"pt-3\">Karena itu, Anda perlu menetapkan sejak awal visi bisnis Anda ke depan. Apabila mengalami perubahan pun, tidak sampai membuat model bisnis berubah dengan signifikan. Jadi, ketika memutuskan untuk menggunakan UPS dengan biaya yang besar, hal ini tidak menjadi sia-sia.</p>\r\n<p class=\"pt-3\">Khusus bagi bisnis yang telah mapan, risiko perubahan model bisnis tetap ada, tetapi biasanya tidak melenceng terlalu jauh.</p>\r\n<h3 class=\"pt-3\"><strong>Pilihan Mengganti Ganti Baterai Atau UPS</strong></h3>\r\n<p class=\"pt-3\">Selain mengganti UPS secara keseluruhan, Anda juga memiliki opsi untuk mengganti baterainya saja. Pada perangkat ini, baterai memiliki peran yang sangat penting. Sering kali, masalah pada UPS terjadi karena baterai sudah tak berfungsi dengan baik.</p>\r\n<p class=\"pt-3\">Agar tak bingung, Anda tentu perlu mengetahui kondisi baterai perangkat yang digunakan saat ini. Masalah yang terjadi biasanya gagal fungsi sehingga ketika daya utama terputus, peralatan elektronik juga ikut berhenti beroperasi.</p>\r\n<p class=\"pt-3\">Ada pula masalah berupa menurunnya kapasitas baterai. Sebagai contoh, jika UPS bisa bertahan selama 15 menit sebelum daya alternatif disambungkan, sekarang tak selama itu. Hal tersebut dapat menjadi sumber kerugian bagi Anda, terutama jika perangkat sumber daya alternatif butuh waktu lama untuk dapat digunakan.</p>\r\n<p class=\"pt-3\">Setelah mengamati dan memperhatikan kondisi baterai, Anda baru bisa memutuskan pilihan untuk mengganti komponen dan menggunakan UPS kembali atau justru membeli unit UPS baru.</p>\r\n<p class=\"pt-3\">Keduanya tentu memiliki konsekuensi yang berbeda. Untuk membeli unit baru, ada sejumlah biaya yang harus disediakan. Namun, perangkat dapat digunakan secara maksimal karena masih berada dalam kondisi terbaik.</p>\r\n<p class=\"pt-3\">Salah satu masalah yang mungkin terjadi ketika Anda mengganti baterainya saja adalah spesifikasinya tidak cocok dengan unit UPS. Tiap UPS memang harus dikombinasikan dengan baterai yang sesuai supaya perangkat ini dapat berfungsi dengan baik.</p>\r\n<h3 class=\"pt-3\"><strong>Ketahui Masa Pakai Perangkat UPS</strong></h3>\r\n<p class=\"pt-3\">Lalu, kapan waktu yang tepat untuk mengganti perangkat UPS? Cara yang paling mudah untuk mengetahuinya adalah mengenal perangkat tersebut secara mendalam. Hal ini termasuk masa pakai perangkat pada kondisi yang normal. Ada UPS yang bisa digunakan selama jangka waktu 3-5 tahun. Namun, ada pula yang kurang dari itu.</p>\r\n<p class=\"pt-3\">Biasanya, produsen UPS telah memperkirakan masa pakai perangkat sesuai dengan kapasitas jenis yang telah diproduksi. Hal ini berkaitan dengan kemampuan komponennya dalam menjalankan fungsi-fungsi UPS.</p>\r\n<p class=\"pt-3\">Nah, jika perangkat ini tetap berfungsi normal, tetapi hampir mencapai batas masa pakainya, ada baiknya Anda mempersiapkan solusi. Jika UPS mengalami kegagalan sewaktu-waktu, Anda pun telah siap sehingga terhindar dari kerugian karena kerusakan peralatan elektronik.</p>\r\n<p class=\"pt-3\">Untuk mengganti baterai, Anda bisa memanfaatkan jasa spesialis pergantian battery UPS Liebert Vertiv Terbaik di Jakarta. Dengan layanan yang disediakan, urusan pergantian baterai UPS tidak akan menjadi masalah besar. Bahkan, Anda tak perlu khawatir dengan baterai yang tidak cocok dengan unit UPS yang digunakan.</p>', 'kapan-waktu-yang-tepat-mengganti-ups-data-center-anda', 2, 'insight-kapan-waktu-yang-tepat-mengganti-ups-data-center-anda-1647409581.png', 1, '2022-03-02 11:39:05', 1, '2022-03-16 16:43:51', 1, NULL, NULL, 1),
(3, 'Mengenal Beragam Bagian Penting dari UPS', '<p>UPS punya fungsi penting dalam menjaga agar aliran daya tidak terputus walau listrik mendadak padam. Banyak pemilik bisnis, perusahaan, dan bahkan individu mengandalkan jasa Pemeliharaan UPS Liebert Vertiv Emerson untuk mencegah perangkat cepat rusak akibat pemadaman listrik. Teknologi UPS memberi Anda waktu untuk mematikan perangkat atau menyalakan generator segera setelah listrik mati.<br />Jika UPS menjadi bagian penting dari kegiatan sehari-hari, ada baiknya Anda mengetahui beragam komponen pentingnya. Selain menambah wawasan, mempelajari komponen UPS bisa membantu Anda mengenali kejanggalan atau tanda-tanda kerusakan lebih awal.</p>\r\n<h3 class=\"pt-3\"><strong>Komponen Utama UPS</strong></h3>\r\n<p class=\"pt-3\">Unit UPS rata-rata memiliki empat komponen utama, yaitu sebagai berikut:</p>\r\n<h4 class=\"pt-3\"><strong>1. Rectifier dan Charger Block</strong></h4>\r\n<p class=\"pt-3\">Rectifier dan charger block biasanya dideskripsikan bersama-sama karena posisi mereka biasanya berdekatan. Mereka bertanggung jawab menerima arus listrik dari luar, mengolahnya, lalu menyimpannya di dalam baterai untuk digunakan kelak. Rectifier mengubah arus bolak-balik (AC) dari asupan listrik luar menjadi arus searah (DC).</p>\r\n<p class=\"pt-3\">Setelah rectifier mengubah arus, charger block mengirimkannya ke baterai untuk disimpan. Cadangan energi ini akan menjadi asupan daya ketika listrik mati, mencegah perangkat elektronik mati mendadak.</p>\r\n<h4 class=\"pt-3\"><strong>2. Baterai</strong></h4>\r\n<p class=\"pt-3\">Baterai adalah bagian penting dari UPS karena perannya sebagai penyimpan cadangan daya. Produk UPS di pasaran kebanyakan punya baterai berbahan asam timbal (lead) dan litium (lithium ion). Anda sebaiknya menyesuaikan jenis dan kapasitas baterai UPS dengan jumlah serta tuntutan daya perangkat yang tersambung.</p>\r\n<h4 class=\"pt-3\"><strong>2. Inverter</strong></h4>\r\n<p class=\"pt-3\">Inverter adalah bagian kedua dari proses transfer daya dari sumber listrik ke baterai dan perangkat elektronik Anda saat mati lampu. Inverter mengubah arus searah dari baterai menjadi arus bolak-balik yang dialirkan ke perangkat. UPS berkualitas memiliki inverter yang mampu menjaga kestabilan arus ketika mengalirkannya ke perangkat saat listrik mati.</p>\r\n<h4 class=\"pt-3\"><strong>4. Sakelar Transfer</strong></h4>\r\n<p class=\"pt-3\">Sakelar transfer (transfer switch) berguna jika UPS mengalami kerusakan, menimbulkan risiko terputusnya daya ke perangkat elektronik yang tersambung. Untuk mengatasi hal ini, Anda bisa menggunakan sakelar transfer untuk memindahkan sumber daya dari baterai UPS langsung ke sumber listrik utama (bypass). Hal ini memberi Anda waktu untuk segera memperbaiki UPS.</p>\r\n<p class=\"pt-3\">Bagaimana cara memperbaiki UPS secara cepat? Hindari melakukannya sendiri jika tidak paham, dan manfaatkan jasa perbaikan serta instalasi UPS Liebert Vertiv Emerson untuk mendapat UPS berkualitas demi mendukung kegiatan bisnis harian.</p>\r\n<p class=\"pt-3\">&nbsp;</p>\r\n<p class=\"pt-3\"><img src=\"http://localhost/bangundataadmin/assets/website/img/insight/upload-1647412857.png\" width=\"400\" /></p>\r\n<h3 class=\"pt-3\"><strong>Jenis Baterai UPS</strong></h3>\r\n<p class=\"pt-3\">Sebagai komponen penting, baterai UPS hadir dalam beragam jenis dengan karakteristik unik masing-masing. Berikut tiga jenis yang ada di pasaran:</p>\r\n<h4 class=\"pt-3\"><strong>1. Asam Timbal (Lead Acid)</strong></h4>\r\n<p class=\"pt-3\">Baterai asam timbal merupakan jenis yang paling umum, hadir dalam unit UPS paling sederhana maupun yang digunakan dalam perusahaan. Harganya cukup ekonomis dan bisa tahan selama lima, 10, bahkan 20 tahun asal dirawat dengan baik. Baterai asam timbal terdiri dari dua jenis berdasarkan mekanismenya, yaitu model katup (VRLA) dan terbuka (VLA).</p>\r\n<p class=\"pt-3\">Model VRLA merupakan yang paling jamak ditemukan di pasaran. Baterai ini terbungkus lapisan pelindung sehingga bisa dipasang dalam posisi bertumpuk. Model VRLA yang tercanggih berisi gel dan lebih tahan lama, namun harganya lebih mahal sehingga lebih cocok untuk bisnis atau perusahaan.</p>\r\n<p class=\"pt-3\">Model VLA terdiri dari panel terbuka yang terendam di dalam cairan elektrolit. Model ini membutuhkan penanganan khusus dan berharga jauh lebih mahal serta tidak bisa ditaruh begitu saja di rak. Akan tetapi, baterai UPS ini bisa tahan selama sekitar 20 tahun.</p>\r\n<h4 class=\"pt-3\"><strong>2. Nikel Kadmium</strong></h4>\r\n<p class=\"pt-3\">Baterai nikel kadmium terdiri dari komponen nikel hidroksida untuk kutub positif serta kadmium hidroksida untuk negatifnya. Harganya sangat mahal bahkan untuk standar perusahaan. Akan tetapi, baterai UPS ini penting bagi fasilitas yang beroperasi di area dengan perbedaan temperatur tinggi, misalnya di daerah beriklim gurun. Hal ini karena bahannya mampu menoleransi fluktuasi suhu.</p>\r\n<p class=\"pt-3\">Perusahaan yang menggunakan baterai UPS berbahan nikel kadmium harus siap mengeluarkan dana ekstra untuk proses pembuangan dan daur ulang. Pasalnya, hasil buangan baterai cukup beracun dan bisa merusak lingkungan.</p>\r\n<h4 class=\"pt-3\"><strong>3. Litium Ion</strong></h4>\r\n<p class=\"pt-3\">Baterai litium ion kini semakin banyak mendominasi produk UPS baru, termasuk merek populer seperti Liebert Vertiv. Baterai ini lebih tipis dan ringan dari baterai asam timbal, lebih cepat terisi, dan tahan lama. Baterai litium ion juga tidak gampang panas sehingga tidak membutuhkan terlalu banyak pendingin dibandingkan baterai asam timbal.</p>\r\n<p class=\"pt-3\">Harga baterai litium ion sedikit lebih mahal dari baterai asam timbal, tetapi tidak semahal nikel kadmium. UPS bertenaga baterai litium juga semakin banyak tersedia di pasaran, sehingga harganya mulai terjangkau.</p>\r\n<h4 class=\"pt-3\"><strong>Jenis Aksesori UPS</strong></h4>\r\n<p class=\"pt-3\">Harga baterai litium ion sedikit lebih mahal dari baterai asam timbal, tetapi tidak semahal nikel kadmium. UPS bertenaga baterai litium juga semakin banyak tersedia di pasaran, sehingga harganya mulai terjangkau.</p>\r\n<h4 class=\"pt-3\"><strong>1. Panel Bypass</strong></h4>\r\n<p class=\"pt-3\">Panel bypass bisa dipasang pada UPS jika Anda harus melakukan bypass langsung ke sumber listrik utama tanpa mengalami pemutusan daya. Alat ini juga memudahkan untuk memutus sumber listrik agar bisa memperbaiki UPS, tetapi tanpa mengganggu aliran daya.</p>\r\n<h4 class=\"pt-3\"><strong>2. Kabel Koneksi</strong></h4>\r\n<p class=\"pt-3\">Kabel koneksi cadangan memungkinkan Anda menghubungkan UPS dengan perangkat elektronik baru. Aksesori ini berguna untuk pemilik bisnis atau perusahaan yang sedang berkembang dan secara rutin menambah jumlah perangkat yang digunakan. Kabel koneksi ini tersedia dalam beragam panjang, warna, dan ketebalan, jadi pastikan produk yang dipilih sesuai dengan jenis UPS.</p>\r\n<h4 class=\"pt-3\"><strong>3. Rail Kit</strong></h4>\r\n<p class=\"pt-3\">Rail kit adalah &ldquo;rel&rdquo; untuk memasang UPS pada rak besi tinggi, biasanya digunakan di ruang penyimpanan server. Sama seperti kabel koneksi, rail kit penting bagi perusahaan atau pemilik bisnis yang sedang berkembang dan harus menambah unit UPS tanpa memakan banyak tempat. Produk ini tersedia dalam berbagai warna dan ukuran, jadi pastikan spesifikasinya sesuai dengan rak yang Anda beli.</p>\r\n<h4 class=\"pt-3\"><strong>4. Baterai Eksternal</strong></h4>\r\n<p class=\"pt-3\">Baterai eksternal (external battery packs) biasanya disambungkan di bagian belakang UPS dan berfungsi sebagai sumber daya cadangan. Tergantung jenis dan kapasitasnya, baterai eksternal biasanya bisa menyumbang kapasitas dua hingga tiga kali lebih besar daripada jika UPS hanya bergantung pada baterai internalnya. Produk ini cocok untuk Anda yang memiliki ruang terbatas untuk UPS tetapi membutuhkan kapasitas daya tambahan.</p>\r\n<p class=\"pt-3\">Baterai eksternal juga bisa menambah periode runtime, terutama jika Anda menggunakan banyak perangkat elektronik. Misalnya, jika normalnya periode runtime hanya 15 menit, baterai eksternal bisa meningkatkannya menjadi 30 bahkan 60 menit, tergantung berapa banyak baterai yang digunakan.</p>\r\n<h4 class=\"pt-3\"><strong>5. Filter Debu</strong></h4>\r\n<p class=\"pt-3\">Panel filter debu tersedia untuk UPS yang dipasang pada instalasi UPS berukuran besar atau di pusat data. Panel tersebut tersedia dalam beragam ukuran untuk mengakomodasi kebutuhan ukuran instalasi UPS berbeda. Panel ini bisa dilepas untuk dibersihkan atau diganti jika sudah terlalu lama. Walau terlihat sederhana, aksesori ini berguna untuk menjaga keawetan unit UPS dan mengurangi risiko kerusakan.</p>\r\n<p class=\"pt-3\">Anda mungkin bisa menggunakan jasa&nbsp;<strong>perbaikan dan Pemeliharaan UPS Liebert Vertiv Emerson dari PT. NPS Pemuda Berdikarisama Sebagai Authorized Service Partner Liebert Vertiv Emerson&nbsp;</strong>untuk kebutuhan profesional. Akan tetapi, mengetahui berbagai bagian penting UPS akan memudahkan dalam mengambil keputusan terkait penggunaan dan pemeliharaan setiap unit.</p>\r\n<p class=\"pt-3\">&nbsp;</p>\r\n<p class=\"pt-3\">&nbsp;</p>', 'mengenal-beragam-bagian-penting-dari-ups', 2, 'insight-mengenal-beragam-bagian-penting-dari-ups-1647412986.png', 3, '2022-03-14 01:24:30', 1, '2022-03-16 17:22:53', 1, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `introduction_text`
--

CREATE TABLE `introduction_text` (
  `text_id` int(11) NOT NULL,
  `text_title` text NOT NULL,
  `text_sub_title` varchar(100) DEFAULT NULL,
  `text_intro` text DEFAULT NULL,
  `text_image` varchar(100) DEFAULT NULL,
  `text_link` varchar(100) DEFAULT NULL,
  `post_date` datetime NOT NULL,
  `post_by` int(1) NOT NULL DEFAULT 1,
  `update_date` datetime DEFAULT NULL,
  `update_by` int(1) DEFAULT NULL,
  `delete_date` datetime DEFAULT NULL,
  `delete_by` int(1) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `introduction_text`
--

INSERT INTO `introduction_text` (`text_id`, `text_title`, `text_sub_title`, `text_intro`, `text_image`, `text_link`, `post_date`, `post_by`, `update_date`, `update_by`, `delete_date`, `delete_by`, `status`) VALUES
(1, 'Build a leading data center center in Indonesia', 'Who are we', 'Bangundatacenter adalah salah satu solusi bisnis baru PT NPS Pemuda Berdikarisma yang berfokus pada Penyediaan Solusi Pembangunan\r\nData Center secara komprehensif.', 'introduction-brand.svg', 'https://alfinagamulya.github.io/bangundatacenter/about.html', '2022-02-24 21:10:04', 1, NULL, NULL, NULL, NULL, 1),
(2, 'Tes We Design, Build and Maintain Your Data Center As you want it.', 'Tes-Solution', 'tes Bangundatacenter adalah salah satu solusi bisnis baru PT NPS Pemuda Berdikarisma yang berfokus pada Penyediaan Solusi Pembangunan Data Center secara komprehensif.', 'introduction-Tes-Solution-1646992126.png', 'https://alfinagamulya.github.io/bangundatacenter/solution.html', '2022-02-24 21:12:54', 1, '2022-03-11 10:48:46', 1, NULL, NULL, 1),
(3, 'Locations spread throughout Indonesia', 'Our Location', 'Kami dekat dengan Anda sehingga Anda mendapatkan perhatian individu yang terfokus untuk kebutuhan bisnis Anda yang unik.', 'introduction-location.svg', NULL, '2022-02-25 09:26:57', 1, NULL, NULL, NULL, NULL, 1),
(4, 'Frequently\r\nAsked Questions', 'FAQ', 'Pertanyaan umum yang sering\r\nditanyakan oleh customer kami', NULL, NULL, '2022-02-25 09:30:08', 1, NULL, NULL, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `logo`
--

CREATE TABLE `logo` (
  `logo_id` int(11) NOT NULL,
  `logo_name` varchar(100) DEFAULT NULL,
  `logo_image` varchar(300) NOT NULL,
  `logo_image_dark` varchar(100) DEFAULT NULL,
  `logo_link` text DEFAULT NULL,
  `logo_type` enum('partner','customer') NOT NULL,
  `post_date` datetime NOT NULL,
  `post_by` int(1) NOT NULL DEFAULT 1,
  `update_date` datetime DEFAULT NULL,
  `update_by` int(11) DEFAULT NULL,
  `delete_date` datetime DEFAULT NULL,
  `delete_by` int(11) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `logo`
--

INSERT INTO `logo` (`logo_id`, `logo_name`, `logo_image`, `logo_image_dark`, `logo_link`, `logo_type`, `post_date`, `post_by`, `update_date`, `update_by`, `delete_date`, `delete_by`, `status`) VALUES
(0, 'test logo', 'logo-customer-test-logo-1647345996.png', 'logo-customer-test-logo-dark-1647345996.png', '', 'customer', '2022-03-15 13:06:36', 1, NULL, NULL, '2022-03-16 10:06:15', 1, 1),
(1, 'Avocent', 'logo-partner-Avocent-1646979487.png', NULL, '', 'partner', '2022-03-11 07:18:07', 1, NULL, NULL, NULL, NULL, 1),
(2, 'Vertiv', 'logo-partner-Vertiv-1646979638.png', 'partner-Vertiv-dark-1647424519.png', '', 'partner', '2022-03-11 07:20:38', 1, '2022-03-16 10:55:19', 1, NULL, NULL, 1),
(3, 'EnerSys', 'logo-partner-EnerSys-1646980060.png', NULL, '', 'partner', '2022-03-11 07:27:40', 1, NULL, NULL, NULL, NULL, 1),
(4, 'Panduit', 'logo-partner-Panduit-1646980181.png', 'partner-Panduit-dark-1647425313.png', '', 'partner', '2022-03-11 07:29:41', 1, '2022-03-16 11:08:33', 1, NULL, NULL, 1),
(5, 'Kidde', 'logo-partner-Kidde-1646980426.png', 'partner-Kidde-dark-1647426135.png', '', 'partner', '2022-03-11 07:33:46', 1, '2022-03-16 11:22:15', 1, NULL, NULL, 1),
(6, 'Ritar', 'logo-partner-Ritar-1646980541.png', 'partner-Ritar-dark-1647425035.png', '', 'partner', '2022-03-11 07:35:41', 1, '2022-03-16 11:03:55', 1, NULL, NULL, 1),
(7, 'Hik Vision', 'logo-partner-Hik-Vision-1646980650.png', 'partner-Hik-Vision-dark-1647426496.png', '', 'partner', '2022-03-11 07:37:30', 1, '2022-03-16 11:28:16', 1, NULL, NULL, 1),
(8, 'Trellis', 'logo-partner-Trellis-1646980764.png', NULL, '', 'partner', '2022-03-11 07:39:24', 1, NULL, NULL, NULL, NULL, 1),
(9, 'ZTFLOOR', 'logo-partner-ZTFLOOR-1646981930.png', 'partner-ZTFLOOR-dark-1647426274.png', '', 'partner', '2022-03-11 07:58:50', 1, '2022-03-16 11:24:34', 1, NULL, NULL, 1),
(11, 'logo test 2', 'logo-partner-logo-test-2-1647346039.png', 'logo-partner-logo-test-2-dark-1647346039.png', '', 'partner', '2022-03-15 13:07:19', 1, '2022-03-15 15:18:39', 1, '2022-03-16 10:39:17', 1, 1),
(12, 'BMW Indonesia', 'logo-customer-BMW-Indonesia-1647421615.png', NULL, '', 'customer', '2022-03-16 10:06:55', 1, NULL, NULL, NULL, NULL, 1),
(13, 'Data Center Indoneisa', 'logo-customer-Data-Center-Indoneisa-1647421651.png', NULL, '', 'customer', '2022-03-16 10:07:31', 1, NULL, NULL, NULL, NULL, 1),
(14, 'Indonesia Power', 'logo-customer-Indonesia-Power-1647421745.png', NULL, '', 'customer', '2022-03-16 10:09:05', 1, NULL, NULL, NULL, NULL, 1),
(15, 'Kawasaki', 'logo-customer-Kawasaki-1647421793.png', NULL, '', 'customer', '2022-03-16 10:09:53', 1, NULL, NULL, NULL, NULL, 1),
(16, 'Indonesia Eximbank', 'logo-customer-Indonesia-Eximbank-1647421833.png', NULL, '', 'customer', '2022-03-16 10:10:33', 1, NULL, NULL, NULL, NULL, 1),
(17, 'Admedika', 'logo-customer-Admedika-1647421858.png', NULL, '', 'customer', '2022-03-16 10:10:58', 1, NULL, NULL, NULL, NULL, 1),
(18, 'Trakindo', 'logo-customer-Trakindo-1647421875.png', NULL, '', 'customer', '2022-03-16 10:11:15', 1, NULL, NULL, NULL, NULL, 1),
(19, 'JEC', 'logo-customer-JEC-1647421890.png', NULL, '', 'customer', '2022-03-16 10:11:30', 1, NULL, NULL, NULL, NULL, 1),
(20, 'De Heus', 'logo-customer-De-Heus-1647421924.png', NULL, '', 'customer', '2022-03-16 10:12:04', 1, NULL, NULL, NULL, NULL, 1),
(21, 'Polantas', 'logo-customer-Polantas-1647421937.png', NULL, '', 'customer', '2022-03-16 10:12:17', 1, NULL, NULL, NULL, NULL, 1),
(22, 'Toyota Astra Finace Service', 'logo-customer-Toyota-Astra-Finace-Service-1647421959.png', NULL, '', 'customer', '2022-03-16 10:12:39', 1, NULL, NULL, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `social_media`
--

CREATE TABLE `social_media` (
  `social_id` int(11) NOT NULL,
  `social_title` varchar(100) NOT NULL,
  `social_icon` varchar(100) DEFAULT NULL,
  `social_link` text DEFAULT NULL,
  `post_date` datetime NOT NULL,
  `post_by` int(1) DEFAULT 1,
  `update_date` datetime DEFAULT NULL,
  `update_by` int(1) DEFAULT NULL,
  `delete_date` datetime DEFAULT NULL,
  `delete_by` int(1) DEFAULT NULL,
  `status` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `social_media`
--

INSERT INTO `social_media` (`social_id`, `social_title`, `social_icon`, `social_link`, `post_date`, `post_by`, `update_date`, `update_by`, `delete_date`, `delete_by`, `status`) VALUES
(1, 'Facebook', 'fab fa-facebook-f', 'https://www.facebook.com/npspemuda/?_rdc=1&_rdr', '2022-02-28 20:46:54', 1, NULL, NULL, NULL, NULL, 1),
(2, 'Instargarm', 'fab fa-instagram', 'https://www.instagram.com/npspemuda/?hl=en', '2022-02-28 20:48:06', 1, NULL, NULL, NULL, NULL, 1),
(3, 'Linkedin', 'fab fa-linkedin', 'https://www.linkedin.com/company/pt-nps-pemuda-berdikarisma/about/', '2022-02-28 20:49:52', 1, NULL, NULL, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `solution`
--

CREATE TABLE `solution` (
  `solution_id` int(11) NOT NULL,
  `solution_title` varchar(100) NOT NULL,
  `solution_list` tinyint(1) DEFAULT 1,
  `post_date` datetime NOT NULL,
  `post_by` int(1) DEFAULT 1,
  `update_date` datetime DEFAULT NULL,
  `update_by` int(11) DEFAULT NULL,
  `delete_date` datetime DEFAULT NULL,
  `delete_by` int(11) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `solution`
--

INSERT INTO `solution` (`solution_id`, `solution_title`, `solution_list`, `post_date`, `post_by`, `update_date`, `update_by`, `delete_date`, `delete_by`, `status`) VALUES
(1, 'Design & Engineering', 0, '2022-03-04 17:43:50', 1, NULL, NULL, NULL, NULL, 1),
(2, 'Project Delivery & Management', 0, '2022-03-04 17:44:47', 1, '2022-03-04 16:07:50', 1, NULL, NULL, 1),
(3, 'Operaton & Maintenance', 0, '2022-03-04 17:46:14', 1, NULL, NULL, NULL, NULL, 1),
(5, 'After Sales Service', 1, '2022-03-04 19:21:14', 1, NULL, NULL, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `solution_image`
--

CREATE TABLE `solution_image` (
  `solution_id` int(11) NOT NULL,
  `solution_image` varchar(100) NOT NULL,
  `post_date` datetime NOT NULL,
  `post_by` int(1) DEFAULT 1,
  `update_date` datetime DEFAULT NULL,
  `update_by` int(1) DEFAULT NULL,
  `delete_date` datetime DEFAULT NULL,
  `delete_by` int(1) NOT NULL DEFAULT 1,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `solution_image`
--

INSERT INTO `solution_image` (`solution_id`, `solution_image`, `post_date`, `post_by`, `update_date`, `update_by`, `delete_date`, `delete_by`, `status`) VALUES
(1, 'solution--1647064077.jpg', '2022-03-04 22:39:19', 1, '2022-03-12 06:47:57', 1, NULL, 1, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `solution_list`
--

CREATE TABLE `solution_list` (
  `list_id` int(11) NOT NULL,
  `solution_id` int(11) NOT NULL,
  `list_title` varchar(100) NOT NULL,
  `list_text` longtext NOT NULL,
  `post_date` datetime NOT NULL,
  `post_by` int(1) NOT NULL DEFAULT 1,
  `update_date` datetime DEFAULT NULL,
  `update_by` int(1) DEFAULT NULL,
  `delete_date` datetime DEFAULT NULL,
  `delete_by` int(1) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `solution_list`
--

INSERT INTO `solution_list` (`list_id`, `solution_id`, `list_title`, `list_text`, `post_date`, `post_by`, `update_date`, `update_by`, `delete_date`, `delete_by`, `status`) VALUES
(1, 5, 'TIER 1', 'Small Businesses 99.671% Uptime 28.8% Hour Downtime Per Years No Redundacy tes', '2022-03-05 16:44:56', 1, '2022-03-12 07:04:57', 1, NULL, NULL, 1),
(2, 5, 'TIER 2', 'Medium Size Businesses 99.749% Uptime 22 Hours Downtime Per years Partial Redundancy in power and cooling', '2022-03-05 16:57:55', 1, '2022-03-05 17:09:19', 1, NULL, NULL, 1),
(3, 1, 'Tes 1', 'test 1', '2022-03-05 17:43:02', 1, NULL, NULL, NULL, NULL, 1),
(4, 5, 'TIER 3', 'Large Businesses 99.882% Uptime 1.6 Hours Downtime Per years N+1 Fault Tolerant 72 Hour Power Outage Protection', '2022-03-11 15:16:54', 1, NULL, NULL, NULL, NULL, 1),
(5, 5, 'TIER 4', 'Enterprise Corporations 99.995% Uptime 2.4 Minutes Downtime per years 2N+1 Full Redundant 96 Hour power outage protection', '2022-03-12 07:14:08', 1, NULL, NULL, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `solution_logo`
--

CREATE TABLE `solution_logo` (
  `logo_id` int(11) NOT NULL,
  `logo_partner_id` int(11) NOT NULL,
  `logo_title` varchar(100) NOT NULL,
  `post_date` datetime NOT NULL,
  `post_by` int(1) NOT NULL DEFAULT 1,
  `update_date` datetime DEFAULT NULL,
  `update_by` int(1) DEFAULT NULL,
  `delete_date` datetime DEFAULT NULL,
  `delete_by` int(1) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `solution_logo`
--

INSERT INTO `solution_logo` (`logo_id`, `logo_partner_id`, `logo_title`, `post_date`, `post_by`, `update_date`, `update_by`, `delete_date`, `delete_by`, `status`) VALUES
(1, 11, 'Auto Transfer Switch 2', '2022-03-16 01:55:02', 1, NULL, NULL, '2022-03-16 10:39:43', 1, 1),
(2, 2, 'Auto Transfer Switch', '2022-03-16 10:45:31', 1, NULL, NULL, NULL, NULL, 1),
(3, 2, 'Uninterruptible Power Supplies', '2022-03-16 10:57:22', 1, NULL, NULL, NULL, NULL, 1),
(4, 6, 'Batteries', '2022-03-16 11:04:27', 1, NULL, NULL, NULL, NULL, 1),
(5, 2, 'Precision Cooling', '2022-03-16 11:04:52', 1, NULL, NULL, NULL, NULL, 1),
(6, 2, 'Hot Aisle Containment', '2022-03-16 11:05:05', 1, NULL, NULL, NULL, NULL, 1),
(7, 2, 'Racks', '2022-03-16 11:05:15', 1, NULL, NULL, NULL, NULL, 1),
(8, 2, 'Power Dissribution Unit', '2022-03-16 11:05:23', 1, NULL, NULL, NULL, NULL, 1),
(9, 2, 'Infrastructur management & Monitoring', '2022-03-16 11:05:36', 1, NULL, NULL, NULL, NULL, 1),
(10, 4, 'Cabling Management', '2022-03-16 11:19:37', 1, NULL, NULL, NULL, NULL, 1),
(11, 5, 'Fire System', '2022-03-16 11:21:48', 1, NULL, NULL, NULL, NULL, 1),
(12, 9, 'Raised Floor', '2022-03-16 11:24:59', 1, NULL, NULL, NULL, NULL, 1),
(13, 7, 'Access Control', '2022-03-16 11:28:36', 1, NULL, NULL, NULL, NULL, 1),
(14, 7, 'CCTV', '2022-03-16 11:28:47', 1, NULL, NULL, NULL, NULL, 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`about_id`);

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indeks untuk tabel `ci_sessions`
--
ALTER TABLE `ci_sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ci_sessions_timestamp` (`timestamp`);

--
-- Indeks untuk tabel `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`contact_id`);

--
-- Indeks untuk tabel `faq`
--
ALTER TABLE `faq`
  ADD PRIMARY KEY (`faq_id`);

--
-- Indeks untuk tabel `header`
--
ALTER TABLE `header`
  ADD PRIMARY KEY (`header_id`);

--
-- Indeks untuk tabel `inquiry`
--
ALTER TABLE `inquiry`
  ADD PRIMARY KEY (`inquiry_id`);

--
-- Indeks untuk tabel `insight_category`
--
ALTER TABLE `insight_category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indeks untuk tabel `insight_data`
--
ALTER TABLE `insight_data`
  ADD PRIMARY KEY (`insight_id`);

--
-- Indeks untuk tabel `introduction_text`
--
ALTER TABLE `introduction_text`
  ADD PRIMARY KEY (`text_id`);

--
-- Indeks untuk tabel `logo`
--
ALTER TABLE `logo`
  ADD PRIMARY KEY (`logo_id`);

--
-- Indeks untuk tabel `social_media`
--
ALTER TABLE `social_media`
  ADD PRIMARY KEY (`social_id`);

--
-- Indeks untuk tabel `solution`
--
ALTER TABLE `solution`
  ADD PRIMARY KEY (`solution_id`);

--
-- Indeks untuk tabel `solution_image`
--
ALTER TABLE `solution_image`
  ADD PRIMARY KEY (`solution_id`);

--
-- Indeks untuk tabel `solution_list`
--
ALTER TABLE `solution_list`
  ADD PRIMARY KEY (`list_id`);

--
-- Indeks untuk tabel `solution_logo`
--
ALTER TABLE `solution_logo`
  ADD PRIMARY KEY (`logo_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `about`
--
ALTER TABLE `about`
  MODIFY `about_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `contact_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `faq`
--
ALTER TABLE `faq`
  MODIFY `faq_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `header`
--
ALTER TABLE `header`
  MODIFY `header_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `inquiry`
--
ALTER TABLE `inquiry`
  MODIFY `inquiry_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `insight_category`
--
ALTER TABLE `insight_category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `insight_data`
--
ALTER TABLE `insight_data`
  MODIFY `insight_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `introduction_text`
--
ALTER TABLE `introduction_text`
  MODIFY `text_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `logo`
--
ALTER TABLE `logo`
  MODIFY `logo_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `social_media`
--
ALTER TABLE `social_media`
  MODIFY `social_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `solution`
--
ALTER TABLE `solution`
  MODIFY `solution_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `solution_image`
--
ALTER TABLE `solution_image`
  MODIFY `solution_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `solution_list`
--
ALTER TABLE `solution_list`
  MODIFY `list_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `solution_logo`
--
ALTER TABLE `solution_logo`
  MODIFY `logo_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
