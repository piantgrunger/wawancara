-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.1.34-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win32
-- HeidiSQL Version:             11.2.0.6213
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Dumping data for table wawancara.auth_assignment: ~0 rows (approximately)
/*!40000 ALTER TABLE `auth_assignment` DISABLE KEYS */;
INSERT IGNORE INTO `auth_assignment` (`item_name`, `user_id`, `created_at`) VALUES
	('admin', '1', 1612427160),
	('pewawancara', '3', NULL);
/*!40000 ALTER TABLE `auth_assignment` ENABLE KEYS */;

-- Dumping data for table wawancara.auth_item: ~7 rows (approximately)
/*!40000 ALTER TABLE `auth_item` DISABLE KEYS */;
INSERT IGNORE INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
	('/*', 2, NULL, NULL, NULL, 1612427122, 1612427122),
	('/api/*', 2, NULL, NULL, NULL, 1613102809, 1613102809),
	('/api/nilai', 2, NULL, NULL, NULL, 1613102811, 1613102811),
	('/penilaian/*', 2, NULL, NULL, NULL, 1613102863, 1613102863),
	('/site/*', 2, NULL, NULL, NULL, 1612622749, 1612622749),
	('admin', 1, NULL, NULL, NULL, 1612427118, 1612427118),
	('pewawancara', 1, NULL, NULL, NULL, 1612622736, 1613102817);
/*!40000 ALTER TABLE `auth_item` ENABLE KEYS */;

-- Dumping data for table wawancara.auth_item_child: ~4 rows (approximately)
/*!40000 ALTER TABLE `auth_item_child` DISABLE KEYS */;
INSERT IGNORE INTO `auth_item_child` (`parent`, `child`) VALUES
	('admin', '/*'),
	('pewawancara', '/api/*'),
	('pewawancara', '/api/nilai'),
	('pewawancara', '/penilaian/*'),
	('pewawancara', '/site/*');
/*!40000 ALTER TABLE `auth_item_child` ENABLE KEYS */;

-- Dumping data for table wawancara.auth_rule: ~0 rows (approximately)
/*!40000 ALTER TABLE `auth_rule` DISABLE KEYS */;
/*!40000 ALTER TABLE `auth_rule` ENABLE KEYS */;

-- Dumping data for table wawancara.detail_indikator: ~44 rows (approximately)
/*!40000 ALTER TABLE `detail_indikator` DISABLE KEYS */;
INSERT IGNORE INTO `detail_indikator` (`id`, `id_indikator`, `jawaban`, `nilai`) VALUES
	(9, 3, 'Saya mendaftar MANPK disuruh orang tua (orang lain) padahal saya tidak berminat', 1),
	(10, 3, 'Saya mendaftar MANPK disuruh orang tua (orang lain) dan saya akan mencoba dahulu.', 2),
	(11, 3, 'Saya mendaftar MANPK atas keinginan saya sendiri tetapi orang tua tidak mendukung', 3),
	(12, 3, 'Saya mendaftar MANPK atas keinginan sendiri', 4),
	(13, 3, 'Saya mendaftar MANPK atas keinginan saya sendiri dan orang tua', 5),
	(14, 4, 'Tidak ada satupun PT Islam atau Pondok Pesantren', 1),
	(15, 4, 'Ada 1 PT Islam atau Pondok Pesantren', 2),
	(16, 4, 'Ada 2 PT Islam atau Pondok Pesantren', 3),
	(17, 4, 'Ada 3 PT Islam atau Pondok Pesantren', 4),
	(18, 4, ' Semua PT Islam atau Pondok Pesantren', 5),
	(19, 5, 'Kurang lancar, Tajwid & Makhroj kurang benar.', 1),
	(20, 5, 'Kurang lancar, Tajwid Lancar & Makhroj kurang benar.', 2),
	(21, 5, 'Lancar, Tajwid benar & Makhroj benar.', 3),
	(22, 5, 'Lancar, Tajwid benar & Makhroj benar.', 4),
	(23, 5, 'Sangat Lancar, dengan lagu tartil,Tajwid & Makhroj benar', 5),
	(24, 6, 'tulisan dan harakat benar 51 - 60 %', 1),
	(25, 6, 'tulisan dan harakat benar 61 - 70 %', 2),
	(26, 6, 'tulisan dan harakat benar 71 - 80 %', 3),
	(27, 6, 'tulisan dan harakat benar 81 - 90 %', 4),
	(28, 6, 'tulisan dan harakat benar 91 - 100 %', 5),
	(29, 7, 'Belum sampai 1 juz', 1),
	(30, 7, '1- 2 Juz', 2),
	(31, 7, '3 Juz', 3),
	(32, 7, '4 Juz', 4),
	(33, 7, '5 Juz', 5),
	(34, 8, 'Tidak lancar dalam membaca teks dan salah dalam menterjemah', 1),
	(35, 8, 'lancar dalam membaca teks dan benar dalam menterjemah', 2),
	(36, 8, 'lancar dalam membaca teks dan kurang lancar dalam menterjemah', 3),
	(37, 8, 'sangat lancar dalam membaca teks dan  menterjemah sudah bagus tapi masih ada yang salah', 4),
	(38, 8, '5.sangat lancar dalam membaca teks dan benar dalam menterjemah', 5),
	(39, 9, 'tidak bisa Jelaskan qawaid/grammar.', 1),
	(40, 9, 'Jelaskan qawaid/grammar tidak lancar dan benar.', 2),
	(41, 9, 'Jelaskan qawaid/grammar kurang lancar dan benar.', 3),
	(42, 9, 'Jelaskan qawaid/grammar cukup lancar dan benar.', 4),
	(43, 9, 'Jelaskan qawaid/grammar sangat lancar dan benar.', 5),
	(44, 10, 'Tidak  bisa melakukan Tanya jawab.', 1),
	(45, 10, 'Mampu menjawab dan bertanya tapi masih terbata bata.', 2),
	(46, 10, 'Mampu menjawab tapi kurang lancar dalam bertanya.', 3),
	(47, 10, 'Mampu melakukan Tanya jawab tapi kurang lancar.', 4),
	(48, 10, 'Mampu melakukan Tanya jawab dengan lancar', 5),
	(49, 11, 'Tidak lancar dalam membaca teks dan salah dalam menterjemah', 1),
	(50, 11, 'lancar dalam membaca teks dan benar dalam menterjemah', 2),
	(51, 11, 'lancar dalam membaca teks dan kurang lancar dalam menterjemah ', 3),
	(52, 11, 'sangat lancar dalam membaca teks dan  menterjemah sudah bagus tapi masih ada yang salah', 4),
	(53, 11, 'sangat lancar dalam membaca teks dan benar dalam menterjemah', 5),
	(54, 12, 'Tidak  bisa melakukan Tanya jawab.', 1),
	(55, 12, 'Mampu menjawab dan bertanya tapi masih terbata bata.', 2),
	(56, 12, 'Mampu menjawab tapi kurang lancar dalam bertanya', 3),
	(57, 12, 'Mampu melakukan Tanya jawab tapi kurang lancar.', 4),
	(58, 12, 'Mampu melakukan Tanya jawab dengan lancar', 5);
/*!40000 ALTER TABLE `detail_indikator` ENABLE KEYS */;

-- Dumping data for table wawancara.elemen: ~4 rows (approximately)
/*!40000 ALTER TABLE `elemen` DISABLE KEYS */;
INSERT IGNORE INTO `elemen` (`id`, `nama`, `nilai`, `prasyarat_minimal`) VALUES
	(1, 'Motivasi', 20.00, 70.00),
	(2, 'Membaca , Menulis dan Hafalan Al Qur\'an', 35.00, 70.00),
	(3, 'Membaca Kitab dan Berbahasa Arab', 35.00, 0.00),
	(4, 'Kemampuan Bahasa Inggris', 35.00, 70.00);
/*!40000 ALTER TABLE `elemen` ENABLE KEYS */;

-- Dumping data for table wawancara.indikator: ~8 rows (approximately)
/*!40000 ALTER TABLE `indikator` DISABLE KEYS */;
INSERT IGNORE INTO `indikator` (`id`, `id_elemen`, `nama`, `pertanyaan`) VALUES
	(3, 1, 'Siswa mendaftar MANPK karena keinginan sendiri, bukan karena keinginan orang tuanya ', 'Siapa yang menyuruh anda masuk MANPK:'),
	(4, 1, 'Siswa memiliki tujuan dan cita-cita yang jelas dan terarah ketika memilih MANPK :', 'Sebutkan 5 PT yang ingin anda tuju Setelah lulus MANPK sesuai prioritas: '),
	(5, 2, 'Siswa mampu membaca al-Qur’an dengan lancar dan benar makhroj dan tajwidnya:', 'Siswa mampu membaca al-Qur’an dengan lancar dan benar makhroj dan tajwidnya:'),
	(6, 2, 'Siswa mampu menuliskan ayat-ayat pendek atau kalimat-kalimat populer (istirja’, hauqalah, syahadat dll) dengan benar:', 'Siswa mampu menuliskan ayat-ayat pendek atau kalimat-kalimat populer (istirja’, hauqalah, syahadat dll) dengan benar:'),
	(7, 2, 'Siswa memiliki hafalan al-Qur’an  (>5 juz = 5, 4 juz = 4, 3 juz = 3, 2 juz = 2, 1 juz = 1):', 'Siswa memiliki hafalan al-Qur’an \r\n(>5 juz = 5, 4 juz = 4, 3 juz = 3, 2 juz = 2, 1 juz = 1):'),
	(8, 3, 'Mampu membaca dan menterjemahkan teks berbahasa Arab.', 'Mampu membaca dan menterjemahkan teks berbahasa Arab.'),
	(9, 3, 'Mampu menjelaskan i’rab sederhana (nahwu dan shorofnya) (disiapkan kitab taqrib/fathul qarib mujib) atau langsung dalam bentuk kalimat', 'Mampu menjelaskan i’rab sederhana (nahwu dan shorofnya) (disiapkan kitab taqrib/fathul qarib mujib) atau langsung dalam bentuk kalimat'),
	(10, 3, 'Mampu berkomunikasi dalam bahasa Arab', 'Mampu berkomunikasi dalam bahasa Arab'),
	(11, 4, 'Mampu membaca dan menterjemahkan teks berbahasa Inggris', 'Mampu membaca dan menterjemahkan teks berbahasa Inggris'),
	(12, 4, 'Mampu berkomunikasi dalam bahasa Inggris', 'Mampu berkomunikasi dalam bahasa Inggris');
/*!40000 ALTER TABLE `indikator` ENABLE KEYS */;

-- Dumping data for table wawancara.migration: ~9 rows (approximately)
/*!40000 ALTER TABLE `migration` DISABLE KEYS */;
INSERT IGNORE INTO `migration` (`version`, `apply_time`) VALUES
	('m000000_000000_base', 1612426756),
	('m130524_201442_init', 1612426758),
	('m170228_064223_rbac_create', 1612426759),
	('m170228_064635_mimin_init', 1612426759),
	('m210205_033951_create_peserta_table', 1612517565),
	('m210205_040305_create_sekolah_table', 1612517565),
	('m210205_060653_create_elemen_table', 1612517565),
	('m210205_062723_create_indikator_table', 1612517565),
	('m210205_062857_create_detail_indikator_table', 1612517565),
	('m210205_094313_alterUser', 1612518397),
	('m210206_154305_create_nilai_table', 1612626235);
/*!40000 ALTER TABLE `migration` ENABLE KEYS */;


-- Dumping data for table wawancara.peserta: ~0 rows (approximately)
/*!40000 ALTER TABLE `peserta` DISABLE KEYS */;
INSERT IGNORE INTO `peserta` (`id`, `nopeserta`, `nama`, `tgl_lahir`, `status`, `foto`) VALUES
	(1, '10.10.10', 'Diki Cahyadi', '2001-01-01', 1, '');
/*!40000 ALTER TABLE `peserta` ENABLE KEYS */;

-- Dumping data for table wawancara.route: ~87 rows (approximately)
/*!40000 ALTER TABLE `route` DISABLE KEYS */;
INSERT IGNORE INTO `route` (`name`, `alias`, `type`, `status`) VALUES
	('/*', '*', '', 1),
	('/api/*', '*', 'api', 1),
	('/api/nilai', 'nilai', 'api', 1),
	('/datecontrol/*', '*', 'datecontrol', 1),
	('/datecontrol/parse/*', '*', 'datecontrol/parse', 1),
	('/datecontrol/parse/convert', 'convert', 'datecontrol/parse', 1),
	('/debug/*', '*', 'debug', 1),
	('/debug/default/*', '*', 'debug/default', 1),
	('/debug/default/db-explain', 'db-explain', 'debug/default', 1),
	('/debug/default/download-mail', 'download-mail', 'debug/default', 1),
	('/debug/default/index', 'index', 'debug/default', 1),
	('/debug/default/toolbar', 'toolbar', 'debug/default', 1),
	('/debug/default/view', 'view', 'debug/default', 1),
	('/debug/user/*', '*', 'debug/user', 1),
	('/debug/user/reset-identity', 'reset-identity', 'debug/user', 1),
	('/debug/user/set-identity', 'set-identity', 'debug/user', 1),
	('/elemen/*', '*', 'elemen', 1),
	('/elemen/create', 'create', 'elemen', 1),
	('/elemen/delete', 'delete', 'elemen', 1),
	('/elemen/index', 'index', 'elemen', 1),
	('/elemen/update', 'update', 'elemen', 1),
	('/elemen/view', 'view', 'elemen', 1),
	('/gii/*', '*', 'gii', 1),
	('/gii/default/*', '*', 'gii/default', 1),
	('/gii/default/action', 'action', 'gii/default', 1),
	('/gii/default/diff', 'diff', 'gii/default', 1),
	('/gii/default/index', 'index', 'gii/default', 1),
	('/gii/default/preview', 'preview', 'gii/default', 1),
	('/gii/default/view', 'view', 'gii/default', 1),
	('/gridview/*', '*', 'gridview', 1),
	('/gridview/export/*', '*', 'gridview/export', 1),
	('/gridview/export/download', 'download', 'gridview/export', 1),
	('/indikator/*', '*', 'indikator', 1),
	('/indikator/create', 'create', 'indikator', 1),
	('/indikator/delete', 'delete', 'indikator', 1),
	('/indikator/index', 'index', 'indikator', 1),
	('/indikator/update', 'update', 'indikator', 1),
	('/indikator/view', 'view', 'indikator', 1),
	('/mimin/*', '*', 'mimin', 1),
	('/mimin/role/*', '*', 'mimin/role', 1),
	('/mimin/role/create', 'create', 'mimin/role', 1),
	('/mimin/role/delete', 'delete', 'mimin/role', 1),
	('/mimin/role/index', 'index', 'mimin/role', 1),
	('/mimin/role/permission', 'permission', 'mimin/role', 1),
	('/mimin/role/update', 'update', 'mimin/role', 1),
	('/mimin/role/view', 'view', 'mimin/role', 1),
	('/mimin/route/*', '*', 'mimin/route', 1),
	('/mimin/route/create', 'create', 'mimin/route', 1),
	('/mimin/route/delete', 'delete', 'mimin/route', 1),
	('/mimin/route/generate', 'generate', 'mimin/route', 1),
	('/mimin/route/index', 'index', 'mimin/route', 1),
	('/mimin/route/update', 'update', 'mimin/route', 1),
	('/mimin/route/view', 'view', 'mimin/route', 1),
	('/mimin/user/*', '*', 'mimin/user', 1),
	('/mimin/user/create', 'create', 'mimin/user', 1),
	('/mimin/user/delete', 'delete', 'mimin/user', 1),
	('/mimin/user/index', 'index', 'mimin/user', 1),
	('/mimin/user/update', 'update', 'mimin/user', 1),
	('/mimin/user/view', 'view', 'mimin/user', 1),
	('/penilaian/*', '*', 'penilaian', 1),
	('/penilaian/elemen', 'elemen', 'penilaian', 1),
	('/penilaian/finish', 'finish', 'penilaian', 1),
	('/penilaian/index', 'index', 'penilaian', 1),
	('/penilaian/nilai', 'nilai', 'penilaian', 1),
	('/peserta/*', '*', 'peserta', 1),
	('/peserta/create', 'create', 'peserta', 1),
	('/peserta/delete', 'delete', 'peserta', 1),
	('/peserta/index', 'index', 'peserta', 1),
	('/peserta/update', 'update', 'peserta', 1),
	('/peserta/view', 'view', 'peserta', 1),
	('/sekolah/*', '*', 'sekolah', 1),
	('/sekolah/create', 'create', 'sekolah', 1),
	('/sekolah/delete', 'delete', 'sekolah', 1),
	('/sekolah/index', 'index', 'sekolah', 1),
	('/sekolah/update', 'update', 'sekolah', 1),
	('/sekolah/view', 'view', 'sekolah', 1),
	('/site/*', '*', 'site', 1),
	('/site/about', 'about', 'site', 1),
	('/site/captcha', 'captcha', 'site', 1),
	('/site/contact', 'contact', 'site', 1),
	('/site/error', 'error', 'site', 1),
	('/site/index', 'index', 'site', 1),
	('/site/login', 'login', 'site', 1),
	('/site/login-wawancara', 'login-wawancara', 'site', 1),
	('/site/logout', 'logout', 'site', 1),
	('/site/request-password-reset', 'request-password-reset', 'site', 1),
	('/site/reset-password', 'reset-password', 'site', 1),
	('/site/signup', 'signup', 'site', 1),
	('/user/*', '*', 'user', 1),
	('/user/create', 'create', 'user', 1),
	('/user/delete', 'delete', 'user', 1),
	('/user/index', 'index', 'user', 1),
	('/user/update', 'update', 'user', 1),
	('/user/view', 'view', 'user', 1);
/*!40000 ALTER TABLE `route` ENABLE KEYS */;


-- Dumping data for table wawancara.user: ~2 rows (approximately)
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT IGNORE INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`, `id_sekolah`, `tanggal_lahir`) VALUES
	(1, 'admin', 'Bj2xEpff-WmRLtY4TyHPHxRp6eAxsNZ0', '$2y$13$lyzLwLoeBeCxjFtGgQVPquL0qaL6F1ygdBgqTnKE22Q2x.dwAaQ9S', NULL, 'piant.grunger@gmail.com', 10, 1485769884, 1488270381, NULL, NULL),
	(3, 'Alfian Naufal', '6xvUZybaBtVXj1cTu_eCmy3-msotf96u', '$2y$13$ZFZFnWUCttHd1gz3g7so6eqcMOr6q7mGyoFGQVclyPvAvgjzjbJVW', NULL, '', 10, 1612623255, 1612623255, 1, '1985-06-07');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
