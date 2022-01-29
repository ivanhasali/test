-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 19, 2022 at 11:14 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ta_penjadwalan`
--

-- --------------------------------------------------------

--
-- Table structure for table `detail_binaan`
--

CREATE TABLE `detail_binaan` (
  `id` int(11) NOT NULL,
  `id_pembinaan` int(10) NOT NULL,
  `nip_guru` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `detail_binaan`
--

INSERT INTO `detail_binaan` (`id`, `id_pembinaan`, `nip_guru`) VALUES
(40, 18, '‌196606261990032010'),
(42, 19, '‌196701251990032003');

-- --------------------------------------------------------

--
-- Table structure for table `guru`
--

CREATE TABLE `guru` (
  `nip_guru` varchar(64) NOT NULL,
  `nama_guru` varchar(144) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `tempat_lahir` varchar(64) NOT NULL,
  `jenis_kelamin` varchar(32) NOT NULL,
  `mengajar_sekolah` varchar(64) NOT NULL,
  `mata_pelajaran` varchar(64) DEFAULT NULL,
  `golongan` varchar(32) NOT NULL,
  `status_guru` varchar(64) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `guru`
--

INSERT INTO `guru` (`nip_guru`, `nama_guru`, `tanggal_lahir`, `tempat_lahir`, `jenis_kelamin`, `mengajar_sekolah`, `mata_pelajaran`, `golongan`, `status_guru`) VALUES
('11231', 'Setiadi,S.Pd, M.Pd', '2021-11-18', 'Padang', 'Laki-laki', '10303461', 'Matematika', 'IA', 'PNS'),
('11232', 'Bayu PRamudi', '2021-11-18', 'Padang', 'Laki-laki', '10303461', 'Matematika', 'IA', 'HONOR'),
('11233', 'Bayu PRamudi 2', '2021-11-18', 'Padang', 'Laki-laki', '10303461', 'Matematika', 'IA', 'HONOR'),
('11234', 'Bayu PRamudi 3', '2021-11-16', 'Padang', 'Laki-laki', '10303461', 'Fisika', 'IA', 'HONOR'),
('11235', 'Bayu PRamudi 4', '2021-11-23', 'Padang', 'Laki-laki', '10303461', 'Kimia', 'IA', 'HONOR'),
('11236', 'Bayu PRamudi 5', '2021-11-25', 'Padang', 'Laki-laki', '10303461', 'Matematika', 'IA', 'HONOR'),
('12231', 'Barata,S.Pd, M.Pd', '2021-11-16', 'padang', 'Laki-laki', '10303461', 'Kimia', 'IA', 'HONOR'),
('123223', 'Intan Ayu,S.Pd, M.Pd', '2021-11-26', 'Payakumbuh', 'Perempuan', '10303781', 'Matematika', 'IA', 'HONOR'),
('123312', 'Aji Pratama,S.Pd, M.Pd', '2021-11-24', 'Solok', 'Laki-laki', '10303781', 'Matematika', 'IA', 'PNS'),
('‌196009091982022002', 'Eni Darlen', '1960-09-09', 'Batusangkar', 'Perempuan', '10302802', 'Seni dan Budaya', 'IV/a', 'PNS'),
('‌196012311983031179', 'Nashri', '1960-12-31', 'Tamparungo', 'Laki-laki', '10305620', 'Ilmu Pengetahuan Sosial (IPS)', 'IV/a', 'PNS'),
('‌196107081987031005', 'Ismail', '1961-07-08', 'Sijunjung', 'Laki-laki', '10302781', 'Pendidikan Jasmani, Olahraga, dan Kesehatan', 'IV/a', 'PNS'),
('‌196107141983012001', 'Elvi Suherni', '1961-07-14', 'Air Molek', 'Perempuan', '10302776', 'Bahasa Indonesia', 'IV/a', 'PNS'),
('‌196201201984121001', 'Irianul Watan', '1962-01-20', 'Sijunjung', 'Laki-laki', '10302802', 'Matematika', 'IV/a', 'PNS'),
('‌196202241984032003', 'Linda Thomas', '1962-02-24', 'Payakumbuh', 'Perempuan', '10302780', 'Matematika', 'IV/a', 'PNS'),
('‌196203121984121001', 'Jasrul', '1962-03-12', 'Palaluar', 'Laki-laki', '10305624', 'Ilmu Pengetahuan Sosial (IPS)', 'IV/a', 'PNS'),
('‌196204172007012002', 'Yulfiarti', '1962-04-17', 'Muara Panas', 'Perempuan', '10305625', 'Geografi', 'III/c', 'PNS'),
('‌196204211989032007', 'Syafnidar', '1962-04-21', 'Pekanbaru', 'Perempuan', '10302779', 'Bimbingan dan Konseling/Konselor (BP/BK)', 'IV/a', 'PNS'),
('‌196207111989031004', 'Jufrizal', '1962-07-11', 'Sijunjung', 'Laki-laki', '10305625', 'Sejarah', 'III/c', 'PNS'),
('‌196209011987031007', 'Syafrijal', '1962-09-01', 'Pulau Punjung', 'Laki-laki', '10302800', 'Pendidikan Jasmani, Olahraga, dan Kesehatan', 'IV/a', 'PNS'),
('‌196210251990032003', 'Ernawati', '1962-10-25', 'Tanah Datar', 'Perempuan', '10302782', 'Matematika', 'IV/a', 'PNS'),
('‌196210261985012002', 'Jasmiati', '1962-10-26', 'Tanah Datar', 'Perempuan', '10302802', 'Ilmu Pengetahuan Sosial (IPS)', 'IV/a', 'PNS'),
('‌196211211989031006', 'Delfiandri', '1962-11-21', 'Bukittinggi', 'Laki-laki', '10302778', 'Matematika', 'IV/a', 'PNS'),
('‌196211281987032012', 'Azmiati', '1962-11-28', 'Tanjung Ampalu', 'Perempuan', '10302802', 'Bahasa Inggris', 'IV/a', 'PNS'),
('‌196309141984122001', 'Nefdwina', '1963-09-14', 'Tanjung', 'Perempuan', '10302782', 'Matematika', 'IV/a', 'PNS'),
('‌196312061991031013', 'Afrijon', '1963-12-06', 'Pangkalan 50 Kota', 'Laki-laki', '10302802', 'Pendidikan Jasmani, Olahraga, dan Kesehatan', 'IV/a', 'PNS'),
('‌196312281984122002', 'Ermantati', '1963-12-28', 'Batu Bulat T. Datar', 'Perempuan', '10302802', 'Geografi', 'IV/a', 'PNS'),
('‌196312301984122002', 'Ermalini', '1963-12-30', 'Tanjung Ampalu', 'Perempuan', '10302776', 'Seni dan Budaya', 'IV/a', 'PNS'),
('‌196402191989032005', 'Merijas', '1964-02-19', 'Atar Tanah Datar', 'Perempuan', '10302783', 'Matematika', 'IV/a', 'PNS'),
('‌196403062003122003', 'Asnijar', '1964-03-06', 'Kampung Surau', 'Perempuan', '10302800', 'Pendidikan Pancasila dan Kewarganegaraan', 'III/c', 'PNS'),
('‌196404011989032004', 'Yusni', '1964-04-01', 'Padang Lawas', 'Perempuan', '10302802', 'Bimbingan dan Konseling/Konselor (BP/BK)', 'IV/a', 'PNS'),
('‌196406191997022001', 'Reni', '1964-06-19', 'Sungayang', 'Perempuan', '10302799', 'Biologi', 'IV/a', 'PNS'),
('‌196407031990032004', 'Hadiatul Asma', '1964-07-03', 'Tanjung', 'Perempuan', '10302802', 'Matematika', 'IV/a', 'PNS'),
('‌196409051987032002', 'Miswarita', '1964-09-05', 'Pematang Panjang', 'Perempuan', '10302780', 'Pendidikan Jasmani, Olahraga, dan Kesehatan', 'IV/a', 'PNS'),
('‌196412091984122002', 'Rosmalia', '1964-12-09', 'Bagan Siapiapi', 'Perempuan', '10302802', 'Biologi', 'IV/a', 'PNS'),
('‌196412121990031007', 'Rusnaldi', '1964-12-12', 'Jalan Baru', 'Laki-laki', '10305620', 'Matematika', 'IV/a', 'PNS'),
('‌196501131986022002', 'Sasnaini', '1965-01-13', 'Sungai Penuh', 'Perempuan', '10302800', 'Ilmu Pengetahuan Sosial (IPS)', 'IV/a', 'PNS'),
('‌196503021989032007', 'Zefnarawita', '1965-03-02', 'Silungkang', 'Perempuan', '10302779', 'Matematika', 'IV/a', 'PNS'),
('‌196503191999032001', 'Marni Yendri', '1965-03-19', 'Padang Panjang', 'Perempuan', '10302802', 'Ilmu Pengetahuan Sosial (IPS)', 'IV/a', 'PNS'),
('‌196505251992032008', 'Dahlia', '1965-05-25', 'Padang Panjang', 'Perempuan', '10305620', 'Pendidikan Pancasila dan Kewarganegaraan', 'IV/a', 'PNS'),
('‌196508191991031011', 'Drs. Syafnel. M.M', '1965-08-19', 'Batunanggai', 'Laki-laki', '10302784', 'Pendidikan Jasmani, Olahraga, dan Kesehatan', 'IV/a', 'PNS'),
('‌196511012005012003', 'Sri Syufni', '1965-11-01', 'Agam', 'Perempuan', '10302798', 'Bahasa Indonesia', 'III/c', 'PNS'),
('‌196602011998032002', 'Busma Darmi', '1966-02-01', 'Swl/Sijunjung', 'Perempuan', '0305621', 'Ilmu Pengetahuan Sosial (IPS)', 'IV/a', 'PNS'),
('‌196605101990031010', 'Suratno', '1966-05-10', 'Sawahlunto', 'Laki-laki', '10302802', 'Bahasa Inggris', 'IV/a', 'PNS'),
('‌196606252005012004', 'Risofni', '1966-06-25', 'Palaluar', 'Perempuan', '10305625', 'Sejarah', 'III/c', 'PNS'),
('‌196606261990032010', 'Hildayetti', '1966-06-26', 'Gunung', 'Laki-laki', '10302783', 'Pendidikan Pancasila dan Kewarganegaraan', 'IV/a', 'PNS'),
('‌196607042014062004', 'Rosmawati', '1966-07-04', 'Sijunjung', 'Perempuan', '10302781', 'Ilmu Pengetahuan Sosial (IPS)', 'III/a', 'PNS'),
('‌196608191990032005', 'Darmayanti', '1966-08-19', 'Swl/sijunjung', 'Perempuan', '10302802', 'Pendidikan Pancasila dan Kewarganegaraan', 'IV/a', 'PNS'),
('‌196609021993031003', 'Edwar', '1966-09-02', 'Sikalang', 'Laki-laki', '10302799', 'Matematika', 'IV/a', 'PNS'),
('‌196701251990032003', 'Yastinoferi', '1967-01-25', 'Tanah Datar', 'Perempuan', '0305621', 'Pendidikan Pancasila dan Kewarganegaraan', 'IV/a', 'PNS'),
('‌196704191994121001', 'Afrizal Yendri', '1967-04-19', 'Swl/Sijunjung', 'Laki-laki', '10302782', 'Pendidikan Pancasila dan Kewarganegaraan', 'IV/a', 'PNS'),
('‌196706072005011008', 'Mohamad Ikhsan', '1967-06-07', 'Jember', 'Laki-laki', '10302781', 'Bimbingan dan Konseling/Konselor (BP/BK)', 'III/c', 'PNS'),
('‌196706121990032010', 'Imma Setiawati', '1967-06-12', 'Magelang', 'Perempuan', '10305624', 'Biologi', 'IV/a', 'PNS'),
('‌196708042002122002', 'Rifa Zanty', '1967-08-04', 'Padang', 'Perempuan', '10302780', 'Ilmu Pengetahuan Sosial (IPS)', 'III/d', 'PNS'),
('‌196709072005012003', 'Lilisbed', '1967-09-07', 'Swl/Sijunjung', 'Perempuan', '10302776', 'Matematika', 'III/c', 'PNS'),
('‌196711261999032002', 'Nurhasniarti', '1967-11-26', 'Bukittinggi', 'Perempuan', '10302802', 'Ilmu Pengetahuan Sosial (IPS)', 'IV/a', 'PNS'),
('‌196807102000122003', 'Erni  Nurwati', '1968-07-10', 'Swl/Sijunjung', 'Perempuan', '10302780', 'Pendidikan Pancasila dan Kewarganegaraan', 'III/d', 'PNS'),
('‌196809061998022001', 'Darlisma', '1978-09-06', 'Swl/Sijunjung', 'Perempuan', '10302784', 'Bahasa Inggris', 'IV/a', 'PNS'),
('‌196902102002122001', 'Eri Hastina', '1969-02-10', 'Padang Lawas', 'Perempuan', '10302776', 'Ilmu Pengetahuan Alam (IPA)', 'III/d', 'PNS'),
('‌196904062008012005', 'Getrina Fiziyanti', '1969-04-06', 'Sawahlunto', 'Perempuan', '10302802', 'Pendidikan Pancasila dan Kewarganegaraan', 'III/c', 'PNS'),
('‌196905161999031002', 'Masril Saputra', '1969-05-16', 'Simawang', 'Laki-laki', '10305622', 'Matematika', 'IV/a', 'PNS'),
('‌196906071994122001', 'Yarmini', '1969-06-07', 'Ketaping Kb. Putih', 'Perempuan', '10302780', 'Ilmu Pengetahuan Sosial (IPS)', 'IV/a', 'PNS'),
('‌196908152007012009', 'Gusnizar Jr', '1969-08-15', 'Swl/Sijunjung', 'Perempuan', '10302803', 'Ilmu Pengetahuan Sosial (IPS)', 'III/b', 'PNS'),
('‌196908271994122002', 'Almi Gustiti', '1969-08-27', 'Pematang Panjang', 'Perempuan', '10302784', 'Ilmu Pengetahuan Alam (IPA)', 'IV/a', 'PNS'),
('‌196908281997022001', 'Gusnita', '1969-08-28', 'Tembilahan', 'Perempuan', '10302784', 'Bimbingan dan Konseling/Konselor (BP/BK)', 'IV/a', 'PNS'),
('‌196909102007012008', 'Sri Gunawati', '1969-09-10', 'Tanjung Gadang', 'Perempuan', '10305625', 'Pendidikan Pancasila dan Kewarganegaraan', 'III/b', 'PNS'),
('‌196912012005012004', 'Lolina Yasti', '1969-12-01', 'Pincuran Balik', 'Perempuan', '10302791', 'Matematika', 'III/c', 'PNS'),
('‌196912172005012001', 'Arlianis', '1969-12-17', 'Solok', 'Perempuan', '10302798', 'Matematika', 'III/d', 'PNS'),
('‌197001272007012003', 'Ernawati', '1970-01-27', 'Kampung Dalam', 'Perempuan', '10305626', 'Pendidikan Pancasila dan Kewarganegaraan', 'III/a', 'PNS'),
('‌197102112005012004', 'Desy Delarosa', '1971-02-11', 'Sei Penuh Kerinci', 'Perempuan', '10305625', 'Matematika', 'III/c', 'PNS'),
('‌197109061997022002', 'Upita Septimar', '1971-09-06', 'Sikalang', 'Laki-laki', '10302784', 'Ilmu Pengetahuan Sosial (IPS)', 'IV/a', 'PNS'),
('‌197201172006042006', 'Elvianti', '1972-01-17', 'Sisawah', 'Perempuan', '10302778', 'Ilmu Pengetahuan Sosial (IPS)', 'III/c', 'PNS'),
('‌197202081999031007', 'Iswandi', '1972-02-08', 'Kapas Panji', 'Laki-laki', '10302800', 'Matematika', 'IV/a', 'PNS'),
('‌197206102006042012', 'Yuni Asmara', '1972-06-10', 'Koto Baru', 'Perempuan', '10302782', 'Ilmu Pengetahuan Sosial (IPS)', 'III/c', 'PNS'),
('‌197206181999032003', 'Susi Olinda', '1972-06-18', 'Tanjung Ampalu', 'Perempuan', '10302776', 'Ilmu Pengetahuan Sosial (IPS)', 'IV/a', 'PNS'),
('‌197207122006041027', 'Osica Viste', '1972-07-12', 'Sawahlunto', 'Laki-laki', '10302784', 'Pendidikan Pancasila dan Kewarganegaraan', 'III/c', 'PNS'),
('‌197210031997022004', 'Adriyanti', '1972-10-03', 'Talawi', 'Perempuan', '10302784', 'Ilmu Pengetahuan Alam (IPA)', 'IV/a', 'PNS'),
('‌197402262002122004', 'Afdarnita', '1974-02-26', 'Sijunjung', 'Perempuan', '10302783', 'Ilmu Pengetahuan Sosial (IPS)', 'III/d', 'PNS'),
('‌197409202006042012', 'Elmiati', '1974-09-20', 'Batu Ajung', 'Perempuan', '10302781', 'Matematika', 'III/c', 'PNS'),
('‌197410182006042021', 'Wirda Mulia', '1974-10-18', 'Kinawai', 'Perempuan', '10302780', 'Ilmu Pengetahuan Sosial (IPS)', 'III/c', 'PNS'),
('‌197604032006042028', 'Sesri Afni', '1976-04-03', 'Sijunjung', 'Laki-laki', '10302784', 'Ilmu Pengetahuan Sosial (IPS)', 'III/c', 'PNS'),
('‌197604201999121001', 'Tri Aprizal', '1976-04-20', 'Timbulun', 'Laki-laki', '10302781', 'Bimbingan dan Konseling/Konselor (BP/BK)', 'III/c', 'PNS'),
('‌197606162010011016', 'Joni Kusnadi', '1976-06-16', 'Solok', 'Laki-laki', '10305622', 'Ilmu Pengetahuan Sosial (IPS)', 'III/b', 'PNS'),
('‌197607052006042022', 'Yuli Reni', '1976-07-05', 'Sijunjung', 'Perempuan', '10302784', 'Pendidikan Jasmani, Olahraga, dan Kesehatan', 'III/c', 'PNS'),
('‌197702092006041006', 'R. Ferri Yulizir', '1977-02-09', 'Padang', 'Laki-laki', '10302803', 'Pendidikan Jasmani, Olahraga, dan Kesehatan', 'III/c', 'PNS'),
('‌197705192007012003', 'Sastrawati', '1977-05-19', 'Tanjung', 'Perempuan', '10302776', 'Bahasa Inggris', 'III/c', 'PNS'),
('‌197708182008032001', 'Eviniza', '1977-08-18', 'Padang', 'Perempuan', '10302776', 'Pendidikan Pancasila dan Kewarganegaraan', 'III/b', 'PNS'),
('‌197708312010012006', 'Leni Rahmawati', '1977-08-31', 'Padang', 'Perempuan', '10302801', 'Pendidikan Pancasila dan Kewarganegaraan', 'III/b', 'PNS'),
('‌197709242006041008', 'Evitrah', '1977-09-24', 'Padang Sibusuk', 'Laki-laki', '10305626', 'Sejarah', 'III/c', 'PNS'),
('‌197710102005012013', 'Reni Ofriyanti', '1977-10-10', 'Sijunjung', 'Perempuan', '10302779', 'Pendidikan Pancasila dan Kewarganegaraan', 'III/d', 'PNS'),
('‌197711012006041011', 'Pardi', '1977-11-01', 'Sumanik', 'Laki-laki', '10302798', 'Geografi', 'III/c', 'PNS'),
('‌197801242009022001', 'Yarnemi', '1978-01-24', 'Koto Baru', 'Perempuan', '10302791', 'Pendidikan Pancasila dan Kewarganegaraan', 'III/b', 'PNS'),
('‌197803232006042020', 'Wenti Yusna', '1978-03-23', 'Padang', 'Perempuan', '10302799', 'Ekonomi', 'III/c', 'PNS'),
('‌197803292005012014', 'Nur Wahdah', '1978-03-29', 'Batu Bulat', 'Perempuan', '10302802', 'Fisika', 'III/c', 'PNS'),
('‌197805102007012007', 'Neneng Masriyanti', '1978-05-10', 'Sijunjung', 'Perempuan', '10302779', 'Ilmu Pengetahuan Sosial (IPS)', 'III/d', 'PNS'),
('‌197806082008012004', 'Wildawati', '1978-06-08', 'Pematang Panjang', 'Perempuan', '10302779', 'Ilmu Pengetahuan Sosial (IPS)', 'III/c', 'PNS'),
('‌197811012003121004', 'Rusdi Awang', '1978-11-01', 'Padang Lawas', 'Laki-laki', '10305625', 'Pendidikan Jasmani, Olahraga, dan Kesehatan', 'III/d', 'PNS'),
('‌198101022008012008', 'Nurkhairiah', '1981-01-02', 'Sijunjung', 'Perempuan', '10305624', 'Pendidikan Pancasila dan Kewarganegaraan', 'III/b', 'PNS'),
('‌198102112009022002', 'Nelty', '1981-02-11', 'Bukittinggi', 'Perempuan', '10302782', 'Matematika', 'III/b', 'PNS'),
('‌198105162009021001', 'Yance Peratama', '1981-05-16', 'Bengkulu', 'Laki-laki', '10302784', 'Matematika', 'III/b', 'PNS'),
('‌198106032014062005', 'Darmayeni', '1981-06-03', 'Lubuk Basung', 'Perempuan', '10302783', 'Ilmu Pengetahuan Sosial (IPS)', 'III/a', 'PNS'),
('‌198109222006042011', 'Ernawati', '1981-09-22', 'Pakan Sinayan', 'Perempuan', '10302803', 'Matematika', 'III/c', 'PNS'),
('‌198201182010012017', 'Yeni Suriatni', '1982-01-18', 'Padang', 'Perempuan', '10305625', 'Matematika', 'III/a', 'PNS'),
('‌198202282010011026', 'Hendra Utama', '1982-02-28', 'Padang Panjang', 'Perempuan', '0305621', 'Pendidikan Pancasila dan Kewarganegaraan', 'III/b', 'PNS'),
('‌198202282010012024', 'Widia', '1982-02-28', 'Balingka', 'Perempuan', '10302798', 'Matematika', 'III/b', 'PNS'),
('‌198204242010012029', 'Popy Novita', '1982-04-24', 'Payakumbuh', 'Perempuan', '10302801', 'Ekonomi', 'III/b', 'PNS'),
('‌198205042009022006', 'Elma Sengketa', '1960-12-31', 'Padang Benai', 'Perempuan', '10305620', 'Pendidikan Pancasila dan Kewarganegaraan', 'III/b', 'PNS'),
('‌198206062009022003', 'Nova Liza', '1982-06-06', 'Payakumbuh', 'Perempuan', '10305625', 'Matematika', 'III/c', 'PNS'),
('‌198206112010011017', 'Alvi Deri Fitri', '1982-06-11', 'Silantai', 'Laki-laki', '10305620', 'Pendidikan Jasmani, Olahraga, dan Kesehatan', 'III/b', 'PNS'),
('‌198301212011012004', 'Elmi Isra', '1983-01-21', 'Balai Rapih', 'Perempuan', '10302791', 'Bimbingan dan Konseling/Konselor (BP/BK)', 'III/b', 'PNS'),
('‌198302282009021004', 'Cossasi Febri', '1983-02-28', 'Silungkang', 'Laki-laki', '10302779', 'Pendidikan Jasmani, Olahraga, dan Kesehatan', 'III/b', 'PNS'),
('‌198305102009022004', 'Asra Laila', '1983-05-10', 'Padang', 'Perempuan', '10302803', 'Bimbingan dan Konseling/Konselor (BP/BK)', 'III/b', 'PNS'),
('‌198307312011012002', 'Afnilaswati', '1983-07-31', 'Supayang', 'Perempuan', '10302780', 'Bimbingan dan Konseling/Konselor (BP/BK)', 'III/b', 'PNS'),
('‌198310282010012035', 'Helma Oktavia', '1983-10-28', 'P. Tarab', 'Perempuan', '10305622', 'Matematika', 'III/b', 'PNS'),
('‌198310302009022007', 'Anita Oktri Yance', '1983-10-30', 'Lubuk Jambi', 'Perempuan', '10302782', 'Bimbingan dan Konseling/Konselor (BP/BK)', 'III/c', 'PNS'),
('‌198407022009022010', 'Fitria Yunita', '1984-07-02', 'Padang', 'Perempuan', '10302780', 'Matematika', 'III/b', 'PNS'),
('‌198407202010011020', 'Yudi Irfandi', '1984-07-20', 'Koto Alam', 'Laki-laki', '10302776', 'Ilmu Pengetahuan Sosial (IPS)', 'III/b', 'PNS'),
('‌198407252010011016', 'Andries', '1984-07-25', 'Bukittinggi', 'Laki-laki', '10302783', 'Pendidikan Jasmani, Olahraga, dan Kesehatan', 'III/a', 'PNS'),
('‌198410122009022006', 'Irma Lisfina', '1984-10-12', 'Lubuk Tarab', 'Perempuan', '10302801', 'Matematika', 'III/c', 'PNS'),
('‌198412182009022007', 'Swl/sijunjung', '1984-12-18', 'Simpang Sender', 'Perempuan', '10302802', 'Teknologi Informasi dan Komunikasi (TIK)', 'III/a', 'PNS'),
('‌198501192011012021', 'Betri Syafrina', '1985-01-19', 'KT.Tengah SMLG', 'Perempuan', '10302801', 'Matematika', 'III/b', 'PNS'),
('‌198506142010011012', 'Rahmat Wahyudi', '1985-06-14', 'Padang', 'Laki-laki', '10302803', 'Ilmu Pengetahuan Sosial (IPS)', 'III/b', 'PNS'),
('‌198511072010012026', 'Novita Sari', '1985-11-07', 'Padang', 'Perempuan', '10305626', 'Ekonomi', 'III/b', 'PNS'),
('‌198512152010012027', 'Dian Ferdayani', '1985-12-15', 'Samarinda', 'Perempuan', '10302782', 'Ilmu Pengetahuan Sosial (IPS)', 'III/c', 'PNS'),
('‌198601122011011003', 'Duski Ardi', '1986-01-12', 'Tanjung Bonai Aur', 'Laki-laki', '10302798', 'Pendidikan Jasmani, Olahraga, dan Kesehatan', 'III/a', 'PNS'),
('‌198601182010011014', 'Wyrho Fransischo', '1986-01-18', 'Sawahlunto', 'Laki-laki', '10302782', 'Pendidikan Jasmani, Olahraga, dan Kesehatan', 'III/a', 'PNS'),
('‌198601192009021001', 'Aulia Perkasa', '1986-01-19', 'Padang', 'Laki-laki', '10302791', 'Pendidikan Jasmani, Olahraga, dan Kesehatan', 'III/b', 'PNS'),
('‌198604302010012030', 'Cori Apri Yeniarti', '1986-04-30', 'Durian Gadang', 'Perempuan', '10302799', 'Pendidikan Jasmani, Olahraga, dan Kesehatan', 'III/b', 'PNS'),
('‌198605192010012028', 'Nindia Warni', '1986-05-19', 'Padang', 'Perempuan', '10302782', 'Ilmu Pengetahuan Sosial (IPS)', 'III/b', 'PNS'),
('‌198606042010012031', 'Siska Eka Putri', '1986-06-04', 'Bukit Sikumpar', 'Perempuan', '10302781', 'Matematika', 'III/c', 'PNS'),
('‌198612112010012026', 'Luci Deswita', '1986-12-11', 'Batusangkar', 'Perempuan', '10302778', 'Matematika', 'III/c', 'PNS'),
('‌198703302010012016', 'Ferina', '1987-03-30', 'Sawah Dangka', 'Perempuan', '10302782', 'Pendidikan Pancasila dan Kewarganegaraan', 'III/b', 'PNS'),
('‌198708312011012006', 'Rahmi Enalia', '1987-12-09', 'Sijunjung', 'Perempuan', '10302802', 'Geografi', 'III/b', 'PNS'),
('‌198711102019031004', 'Marko Basten', '1987-11-10', 'Silantai', 'Laki-laki', '10302776', 'Pendidikan Jasmani, Olahraga, dan Kesehatan', 'III/a', 'PNS'),
('‌198803062011012005', 'Martita Lina', '1988-03-06', 'Pebaun Hulu', 'Perempuan', '10302781', 'Pendidikan Pancasila dan Kewarganegaraan', 'III/b', 'PNS'),
('‌198803092010012011', 'Ria Andini', '1988-03-09', 'Tanjung Ampalu', 'Perempuan', '10302802', 'Bahasa Inggris', 'III/b', 'PNS');

-- --------------------------------------------------------

--
-- Table structure for table `mata_pelajaran`
--

CREATE TABLE `mata_pelajaran` (
  `id_pelajaran` int(6) NOT NULL,
  `kode_mapel` varchar(32) NOT NULL,
  `mata_pelajaran` varchar(144) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mata_pelajaran`
--

INSERT INTO `mata_pelajaran` (`id_pelajaran`, `kode_mapel`, `mata_pelajaran`) VALUES
(2, '124', 'Kimia'),
(3, '125', 'Matematika'),
(4, '126', 'Fisika'),
(8, '105', 'Ilmu Pengetahuan Alam (IPA)'),
(9, '106', 'Ilmu Pengetahuan Sosial (IPS)'),
(10, '117', 'Bahasa Inggris'),
(11, '123', 'Biologi'),
(12, '110', 'Pendidikan Jasmani, Olahraga, dan Kesehatan'),
(13, '102', 'Bimbingan dan Konseling/Konselor (BP/BK)'),
(14, '111', 'Teknologi Informasi dan Komunikasi (TIK)'),
(15, '115', 'Pendidikan Pancasila dan Kewarganegaraan'),
(16, '116', 'Bahasa Indonesia'),
(17, '104', 'Seni dan Budaya'),
(18, '131', 'Sejarah'),
(19, '103', 'Muatan Lokal'),
(20, '132', 'Antropologi'),
(21, '133', 'Ekonomi'),
(22, '134', 'Geografi'),
(23, '108', 'Pendidikan Agama Islam dan Budi Pekerti'),
(24, '107', 'Prakarya');

-- --------------------------------------------------------

--
-- Table structure for table `pembinaan`
--

CREATE TABLE `pembinaan` (
  `id` int(10) NOT NULL,
  `nip_pengawas` varchar(64) NOT NULL,
  `npsn_sekolah` varchar(64) NOT NULL,
  `semester` varchar(32) NOT NULL,
  `tahun_pendidikan` varchar(32) NOT NULL,
  `status` varchar(64) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pembinaan`
--

INSERT INTO `pembinaan` (`id`, `nip_pengawas`, `npsn_sekolah`, `semester`, `tahun_pendidikan`, `status`) VALUES
(18, '19872002', '10302783', 'Ganjil', '2022', 'DISETUJUI'),
(19, '19872002', '0305621', 'Ganjil', '2022', 'DISETUJUI');

-- --------------------------------------------------------

--
-- Table structure for table `pengawas`
--

CREATE TABLE `pengawas` (
  `nip_pengawas` varchar(64) NOT NULL,
  `id_user` int(6) NOT NULL,
  `nama_pengawas` varchar(144) NOT NULL,
  `tanggal_lahir_pengawas` date NOT NULL,
  `tempat_lahir_pengawas` varchar(64) NOT NULL,
  `jenis_kelamin_pengawas` varchar(32) NOT NULL,
  `golongan_pengawas` varchar(32) NOT NULL,
  `mata_pelajaran` varchar(144) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengawas`
--

INSERT INTO `pengawas` (`nip_pengawas`, `id_user`, `nama_pengawas`, `tanggal_lahir_pengawas`, `tempat_lahir_pengawas`, `jenis_kelamin_pengawas`, `golongan_pengawas`, `mata_pelajaran`) VALUES
('19872002', 7, 'Ayu Diah Putri', '2021-11-17', 'Bukittinggi', 'Perempuan', 'IVA', 'Kimia');

-- --------------------------------------------------------

--
-- Table structure for table `penjadwalan_binaan`
--

CREATE TABLE `penjadwalan_binaan` (
  `id_penjadwalan` int(6) NOT NULL,
  `id_pembinaan` int(10) NOT NULL,
  `kegiatan_binaan` text NOT NULL,
  `penjelasan` text DEFAULT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `penjadwalan_binaan`
--

INSERT INTO `penjadwalan_binaan` (`id_penjadwalan`, `id_pembinaan`, `kegiatan_binaan`, `penjelasan`, `tanggal`) VALUES
(5, 18, 'Penilaian Kinerja Guru', 'Menilai Kinerja Guru', '2022-01-22');

-- --------------------------------------------------------

--
-- Table structure for table `sekolah`
--

CREATE TABLE `sekolah` (
  `npsn` varchar(64) NOT NULL,
  `nama_sekolah` varchar(144) NOT NULL,
  `nomortlp_sekolah` varchar(32) NOT NULL,
  `alamat_sekolah` text NOT NULL,
  `kepala_sekolah` varchar(144) NOT NULL,
  `status_sekolah` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sekolah`
--

INSERT INTO `sekolah` (`npsn`, `nama_sekolah`, `nomortlp_sekolah`, `alamat_sekolah`, `kepala_sekolah`, `status_sekolah`) VALUES
(' 10305633', 'SMP N 36 SIJUNJUNG', 'smpn36.sijunjung@yahoo.co.id', 'Jorong Taruko, Nagari Manganti, Sisawah, Sumpur Kudus, Kabupaten Sijunjung, Sumatera Bara', 'Masgamal', 'NEGERI'),
('0305621', 'SMP N 25 SIJUNJUNG', 'smpn25sjj@gmail.com', 'Taratak Baru, TANJUNG GADANG, Kec. Tanjung Gadang', 'Imma Setiawati', 'NEGERI'),
('10302775', 'SMP N 9 SIJUNJUNG', 'smpn9sijunjung@gmail.com', 'Jl. Raya Kumanis, Limo Koto, Koto Tujuh, Kabupaten Sijunjung, Sumatera Barat 27563', 'Emrisnal', 'NEGERI'),
('10302776', 'SMP N 16 SIJUNJUNG', '085376517676 ', 'Jorong Taruko Nagari Tanjung, Kec. Koto Tujuh', 'Gusmanidar Mr', 'NEGERI'),
('10302778', 'SMP N 15 SIJUNJUNG', '0852-7873-2065', 'Sisawah, SISAWAH, Kec. Sumpur Kudus', 'Delfiandri', 'NEGERI'),
('10302779', 'SMP N 14 SIJUNJUNG', 'smpn14sijunjung@yahoo.com', 'Padang Layang-layang, SIJUNJUNG, Kec. Sijunjung, Kab. Sijunjung, Sumatera Barat 27553', 'Zefnarawita S.Pd', 'NEGERI'),
('10302780', 'SMP N 13 SIJUNJUNG', '0754 7002710', 'Alamat: JALAN PEMUDA PEMATANG PANJANG, PEMATANG PANJANG, Kec. Sijunjung', 'Yusmawati, M.Pd', 'NEGERI'),
('10302781', 'SMP N 12 SIJUNJUNG', 'smpn12sijunjung@yahoo.com', 'Jalan Jambu Lipo, LUBUK TAROK, Kec. Lubuk Tarok', 'Tri Aprizal,S.Pd.Kons', 'NEGERI'),
('10302782', 'SMP N 11 SIJUNJUNG', '(0754) 2452511', ' Kunangan Parit Rantang, Kamang Baru, Kabupaten Sijunjung, Sumatera Barat 27572', 'Riswel Asrita', 'NEGERI'),
('10302783', 'SMP N 10 SIJUNJUNG', '085263832418 ', 'Jl. Lintas Sumatera No.KM.154, Sungai Lansek, Kamang Baru, Kabupaten Sijunjung, Sumatera Barat 27572', 'Norawati S.Pd', 'NEGERI'),
('10302784', 'SMP N 1 SIJUNJUNG', '(0754) 20025', 'Jalan Diponegoro, Desa Kp. Baru, Kecamaten Sijunjung, Kabupaten Sijunjung, Sumatera Barat 2756', 'Drs. Syafnel M.M', 'NEGERI'),
('10302790', 'SMP N 17 SIJUNJUNG', '085375550167 ', 'Jorong Pasar Sungai Betung, KENAGARIAN SUNGAI BATUANG, Kec. Kamang Baru', 'Khairuddin', 'NEGERI'),
('10302791', 'SMP N 18 SIJUNJUNG', 'smpn18sijunjung@gmail.com', 'Kurnia Kamang, Kamang, Kamang Baru, Kabupaten Sijunjung, Sumatera Barat 27572', 'Suwarno', 'NEGERI'),
('10302792', 'SMP N 8 SIJUNJUNG', 'smpn_8_sijunjung@yahoo.co.id', 'Jln. Parupuk Indah Padang Laweh, PADANG LAWEH, Kec. Koto VII, Kab. Sijunjung, Sumatera Barat 27562', ' Evi Delvita', 'NEGERI'),
('10302793', 'SMP N 7 SIJUNJUNG', '0813-7219-3271', 'Jln. M. Syafei No 2 Muaro Sijunjung, MUARO, Kec. Sijunjung, Kab. Sijunjung, Sumatera Barat, 27511.', 'Carly Marlinton', 'NEGERI'),
('10302794', 'SMP N 6 SIJUNJUNG', 'smpn6_sjjg@yahoo.co.id', 'Jl. Protokol No.2 Muaro Bodi, MUARO BODI, Kec. IV Nagari, Kab. Sijunjung, Sumatera Barat 27561', 'Amsuhardi', 'NEGERI'),
('10302795', 'SMP N 5 SIJUNJUNG', '(0754) 20507', 'Jln Lintas Sumatera Km 131 Tanjung Gadang, Kec. Tanjung Gadang', 'Sugesti', 'NEGERI'),
('10302796', 'SMP N 4 SIJUNJUNG', 'smpn4sijunjung@gmail.com', 'Guguk Tadak Indah Silantai, SEPAKAT SILANTAI, Kec. Sumpur Kudus, Kab. Sijunjung, Sumatera Barat, 27563', 'Rusnaldi M.Pd', 'NEGERI'),
('10302797', 'SMA N 3 SIJUNJUNG', 'smpn03sijunjung@gmail.com', 'Padang Sibusuk, Padang Sibusuk, Kec. Kupitan, Kab. Sijunjung, Sumatera Barat', 'Sri Erlinda', 'NEGERI'),
('10302798', 'SMP N 23 SIJUNJUNG', 'smp23sijunjung@yahoo.co.id', 'Durian Gadang, NAGARI DURIAN GADANG, Kec. Sijunjung', 'Pardi', 'NEGERI'),
('10302799', 'SMP N 22 SIJUNJUNG', 'sekolahsmpn22sjj@gmail.com', 'jalan Silabau Aie Angek Sijunjung, AIE ANGEK, Kec. Sijunjung', 'Reni', 'NEGERI'),
('10302800', 'SMP N 21 SIJUNJUNG', 'Smpn21_sijunjung@yahoo.co.id.', 'Kamang Baru, MUARO TAKUNG, Kec. Kamang Baru', 'Iswandi', 'NEGERI'),
('10302801', 'SMP N 20 SIJUNJUNG', 'smpn20sjj@gmail.com', 'Tanjung Gadang, Pulasan, Kec. Tanjung Gadang, Kab. Sijunjung, Prov. Sumatera Barat 27571', 'Irma Lisfiani', 'NEGERI'),
('10302802', 'SMP N 2 SIJUNJUNG', '(0754) 7527232 ', 'Sinaung Jaya, Tanjung Ampalu, Kec. Koto Tujuh', 'Nurhasniarti', 'NEGERI'),
('10302803', 'SMP N 19 SIJUNJUNG', 'smpn19sijunjung@gmail.com       ', 'Jln. Ranah Pasar No. 99, Mundam Sakti, Kec. Iv Nagari', 'Hasrul', 'NEGERI'),
('10305620', 'SMP N 24 SIJUNJUNG', '085279229269 ', 'JL. Tamparungo-Sisawah KM.2, Tamparungo, Kec. Sumpur Kudus', 'Dahlia', 'NEGERI'),
('10305622', 'SMP N 26 SIJUNJUNG', 'smpnduaenam_sijunjung@yahoo.com ', ' Jorong Parit Malintang, Tanjung Keling, Kec. Kamang Baru', 'Masril Saputra', 'NEGERI'),
('10305623', 'SMP N 27 SIJUNJUNG', '0852-7272-6511', 'Rimbo Tangah jorong Batu Manjulur Barat kenagarian Batu Manjulur Kec. Kupitan Kab. Sijunjung.', 'Partini', 'NEGERI'),
('10305624', 'SMP N 28 SIJUNJUNG', 'smpn28sijunjung@gmail.com.', 'Jl. Lintas Sumatera Sinyamu Tanjung Gadang, SINYAMU, Kec. Tanjung Gadang, Kab. Sijunjung, Sumatera Barat, dengan kode pos 27571', ' Imma Setiawati', 'NEGERI'),
('10305625', 'SMP N 29 SIJUNJUNG', 'smpn29sijunjung@gmail.com', 'Batu Balang, LIMO KOTO, Kec. Koto VII, Kab. Sijunjung', 'Desy Delarosa', 'NEGERI'),
('10305626', 'SMP N 30 SIJUNJUNG', 'smpn30sijunjung@gmail.com', 'Buluh Kasok, BULUH KASOK, Kec. Lubuk Tarok, Kab. Sijunjung', 'Evitrah', 'NEGERI'),
('10305628', 'SMP N 31 SIJUNJUNG', 'smpn_31@yahoo.com', 'Jorong Liambang,nagari langki, Kec. Tanjung Gadang, Kab. Sijunjung', 'Indra Ardi', 'NEGERI'),
('10305629', 'SMP N 32 SIJUNJUNG', '-', 'Solok Ambah, SOLOK AMBAH, Kec. Sijunjung, Kab. Sijunjung,', 'Efiardi', 'NEGERI'),
('10305630', 'SMP N 33 SIJUNJUNG', ' smpn33guguk@gmail.com', 'Guguk, Kec. Koto VII, Kab. Sijunjung', 'Eni Elfita', 'NEGERI'),
('10305631', 'SMP N 34 SIJUNJUNG', 'smpnegeri34sjj@yahoo.com', 'Tanjung Gadang, KENAGARIAN TANJUNG LOLO, Kec. Tanjung Gadang', 'Wahyu Hidayat', 'NEGERI'),
('10305632', 'SMP N 35 SIJUNJUNG', 'smpn35kunangan@gmail.com', 'Jorong Kunangan, KUNANGAN PARIT RANTANG, Kec. Kamang Baru', 'Tri Joko Priatmo', 'NEGERI'),
('10305634', 'SMP N 39 SIJUNJUNG', 'smpn39sijunjung@yahoo.com.', 'Kabun, SISAWAH, Kec. Sumpur Kudus, Kab. Sijunjung,', 'Ajral Mukhsinin,s.pd.i', 'NEGERI'),
('10305635', 'SMP N 40 SIJUNJUNG', 'smpnegeri40paru@gmail.com', 'Jorong Batu Ranjau, Nagari Paru, Paru, Kec. Sijunjung', 'Elna Fitrida', 'NEGERI'),
('10305636', 'SMP N 41 SIJUNJUNG', 'smpn41sibakur1120@gmail.com', ' Jorong Lubuk Tolang, Sibakur, Kec. Tanjung Gadang, Kab. Sijunjung', 'Zul Efendri', 'NEGERI'),
('10305637', 'SMP N 42 SIJUNJUNG', 'smpn42_sijunjung@gmail.com', 'Koto Baru, Nagari Lubuk Tarantang, Kec. Kamang Baru', 'Hendrius', 'NEGERI'),
('10305638', 'SMP N 44 SIJUNJUNG', 'smpn44sijunjung@gmail.com.', ' Jorong Air Amo I, Air Amo, Kec. Kamang Baru', 'Andrinal', 'NEGERI'),
('10308105', 'SMP N 37 SIJUNJUNG', 'sijunjung37@gmail.com', 'Kamang, Nagari Kamang, Kec. Kamang Baru, Kab. Sijunjung', 'Tety Rochajaty', 'NEGERI'),
('10308106', 'SMP N 38 SIJUNJUNG', 'smp38@yahoo.co.id', ' Batu Gandang, Nagari Batu Gandang, Kec. Koto Tujuh', 'Gustinda Hayati', 'NEGERI'),
('10308153', 'SMP N 43 SIJUNJUNG', 'sijunjung43@gmail.com', 'Kamang Baru, Banjar Tengah, Kec. Kamang Baru', 'Reflizer', 'NEGERI'),
('10308312', 'SMP N 45 SIJUNJUNG', 'smpnsijunjung45@gmail.com', 'Pasar Jumat Muaro, Nagari Muaro, Kec. Sijunjung', 'Asmi', 'NEGERI'),
('10308313', 'SMP N 46 SIJUNJUNG', 'smpn46.sijunjung@gmail.com', 'Sungai Tenang, Kunangan Parik Rantang, Kec. Kamang Baru', 'Nolyanis T', 'NEGERI'),
('10308314', 'SMP N 47 SIJUNJUNG', 'hamdani7429@yahoo.com.', 'Unggan, Sumpur Kudus, Kec. Sumpur Kudus', 'Hamdani', 'NEGERI'),
('10309795', 'SMP N 48 SIJUNJUNG', 'smpn48sijunjung2009@gmail.com', 'Jorong Dusun Tinggi, LUBUK TARANTANG, Kec. Kamang Baru', 'Norva Efiza', 'NEGERI');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(6) NOT NULL,
  `nama` varchar(144) NOT NULL,
  `username` varchar(144) NOT NULL,
  `password` varchar(144) NOT NULL,
  `level` enum('ADMIN','PENGAWAS','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama`, `username`, `password`, `level`) VALUES
(1, 'Koordinator Pengawas', 'admin', 'f7ff9e8b7bb2e09b70935a5d785e0cc5d9d0abf0 ', 'ADMIN'),
(7, 'Ayu Diah Putri', '19872002', '601f1889667efaebb33b8c12572835da3f027f78', 'PENGAWAS'),
(8, 'Admin Baru', 'admin2', '601f1889667efaebb33b8c12572835da3f027f78', 'ADMIN');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detail_binaan`
--
ALTER TABLE `detail_binaan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_pembinaan` (`id_pembinaan`),
  ADD KEY `nip_guru` (`nip_guru`);

--
-- Indexes for table `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`nip_guru`),
  ADD KEY `mengajar_sekolah` (`mengajar_sekolah`);

--
-- Indexes for table `mata_pelajaran`
--
ALTER TABLE `mata_pelajaran`
  ADD PRIMARY KEY (`id_pelajaran`);

--
-- Indexes for table `pembinaan`
--
ALTER TABLE `pembinaan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nip_pengawas` (`nip_pengawas`),
  ADD KEY `npsn_sekolah` (`npsn_sekolah`);

--
-- Indexes for table `pengawas`
--
ALTER TABLE `pengawas`
  ADD PRIMARY KEY (`nip_pengawas`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `penjadwalan_binaan`
--
ALTER TABLE `penjadwalan_binaan`
  ADD PRIMARY KEY (`id_penjadwalan`),
  ADD KEY `id_pembinaan` (`id_pembinaan`);

--
-- Indexes for table `sekolah`
--
ALTER TABLE `sekolah`
  ADD PRIMARY KEY (`npsn`),
  ADD KEY `status_sekolah` (`status_sekolah`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `username_2` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detail_binaan`
--
ALTER TABLE `detail_binaan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `mata_pelajaran`
--
ALTER TABLE `mata_pelajaran`
  MODIFY `id_pelajaran` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `pembinaan`
--
ALTER TABLE `pembinaan`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `penjadwalan_binaan`
--
ALTER TABLE `penjadwalan_binaan`
  MODIFY `id_penjadwalan` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_binaan`
--
ALTER TABLE `detail_binaan`
  ADD CONSTRAINT `detail_binaan_ibfk_1` FOREIGN KEY (`id_pembinaan`) REFERENCES `pembinaan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detail_binaan_ibfk_2` FOREIGN KEY (`nip_guru`) REFERENCES `guru` (`nip_guru`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pembinaan`
--
ALTER TABLE `pembinaan`
  ADD CONSTRAINT `pembinaan_ibfk_1` FOREIGN KEY (`nip_pengawas`) REFERENCES `pengawas` (`nip_pengawas`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pembinaan_ibfk_2` FOREIGN KEY (`npsn_sekolah`) REFERENCES `sekolah` (`npsn`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pengawas`
--
ALTER TABLE `pengawas`
  ADD CONSTRAINT `pengawas_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `penjadwalan_binaan`
--
ALTER TABLE `penjadwalan_binaan`
  ADD CONSTRAINT `penjadwalan_binaan_ibfk_1` FOREIGN KEY (`id_pembinaan`) REFERENCES `pembinaan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
