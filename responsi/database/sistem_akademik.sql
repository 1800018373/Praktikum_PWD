-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 13 Jan 2022 pada 18.33
-- Versi server: 10.4.21-MariaDB
-- Versi PHP: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sistem_akademik`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `ambil`
--

CREATE TABLE `ambil` (
  `nik` varchar(128) NOT NULL,
  `kd_pelajaran` int(11) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `ambil`
--

INSERT INTO `ambil` (`nik`, `kd_pelajaran`, `id`) VALUES
('1800018380', 1, 39),
('1800018380', 2, 40),
('1800018380', 3, 41),
('1800018380', 4, 42),
('1800018373', 1, 50),
('1800018373', 2, 51),
('1800018373', 3, 52),
('1800018373', 4, 53),
('1800018373', 1, 62),
('1800018373', 2, 63),
('1800018373', 4, 65),
('1800018373', 3, 66),
('1800018380', 1, 67),
('1800018380', 2, 68),
('1800018380', 3, 69),
('1800018380', 4, 70),
('1800018355', 1, 71);

-- --------------------------------------------------------

--
-- Struktur dari tabel `guru`
--

CREATE TABLE `guru` (
  `niy` varchar(128) NOT NULL,
  `nama` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `guru`
--

INSERT INTO `guru` (`niy`, `nama`) VALUES
('24051999', 'Toto Sutardi'),
('65112000', 'Novi Nurmilla');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelas`
--

CREATE TABLE `kelas` (
  `kd_kelas` int(11) NOT NULL,
  `kelas` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kelas`
--

INSERT INTO `kelas` (`kd_kelas`, `kelas`) VALUES
(1, 'I.A'),
(2, 'I.B'),
(3, 'II.A'),
(4, 'II.B');

-- --------------------------------------------------------

--
-- Struktur dari tabel `nilai`
--

CREATE TABLE `nilai` (
  `nik` varchar(128) NOT NULL,
  `kd_pelajaran` int(11) NOT NULL,
  `nilai` varchar(128) NOT NULL,
  `kd_semester` int(11) NOT NULL,
  `id_nilai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `nilai`
--

INSERT INTO `nilai` (`nik`, `kd_pelajaran`, `nilai`, `kd_semester`, `id_nilai`) VALUES
('1800018373', 1, '50', 1, 62),
('1800018373', 2, '0', 1, 63),
('1800018373', 4, '89', 1, 65),
('1800018373', 3, '100', 1, 66),
('1800018380', 1, '100', 1, 67),
('1800018380', 2, '0', 1, 68),
('1800018380', 3, '0', 1, 69),
('1800018380', 4, '0', 1, 70),
('1800018355', 1, '0', 1, 71);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelajaran`
--

CREATE TABLE `pelajaran` (
  `kd_pelajaran` int(11) NOT NULL,
  `pelajaran` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pelajaran`
--

INSERT INTO `pelajaran` (`kd_pelajaran`, `pelajaran`) VALUES
(1, 'Matematika'),
(2, 'Biologi'),
(3, 'Sejarah'),
(4, 'Fisika');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengampu`
--

CREATE TABLE `pengampu` (
  `niy` varchar(128) NOT NULL,
  `kd_pelajaran` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pengampu`
--

INSERT INTO `pengampu` (`niy`, `kd_pelajaran`) VALUES
('24051999', 2),
('65112000', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `semester`
--

CREATE TABLE `semester` (
  `kd_semester` int(11) NOT NULL,
  `semester` enum('Ganjil','Genap') NOT NULL,
  `tahun_ajaran` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `semester`
--

INSERT INTO `semester` (`kd_semester`, `semester`, `tahun_ajaran`) VALUES
(1, 'Ganjil', '2021/2022'),
(2, 'Genap', '2021/2022'),
(3, 'Ganjil', '2022/2023'),
(4, 'Genap', '2022/2023');

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswa`
--

CREATE TABLE `siswa` (
  `nik` varchar(128) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `gender` enum('Laki-Laki','Perempuan') NOT NULL,
  `kd_kelas` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `email` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `siswa`
--

INSERT INTO `siswa` (`nik`, `nama`, `gender`, `kd_kelas`, `id`, `email`) VALUES
('1800018355', 'Silfia Febila Ayu', '', 3, 31, 'muhammadtaufiqinsani@gmail.com'),
('1800018373', 'Muhammad Taufiq Insani', 'Laki-Laki', 4, 21, 'taufiqinsani88@gmail.com'),
('1800018374', 'Silfia Febila Ayu', '', 1, 29, 'mantapjiwo24@gmail.com'),
('1800018376', 'Depi septiani', '', 2, 30, 'depiseptiyani08@gmail.com'),
('1800018380', 'Feby Fuji Akbar', 'Laki-Laki', 4, 22, 'febyakbar2@gmail.com');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `gambar` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `nama`, `email`, `gambar`, `password`, `role_id`, `is_active`, `date_created`) VALUES
(1, 'Admin', 'admin@gmail.com', 'default.jpg', '$2y$10$g3c1DFCPOy5FTRlRLkhq/eoE4cK8B5/A6niytlEfckGeOo1bZtSje', 1, 1, 1639408161),
(2, 'Tata Usaha', 'tatausaha@gmail.com', 'default.jpg', '$2y$10$hllyB4FRqrVVpsOAeOblvekdNqL54heWr2cIsZxi8iBTHnYaLB7MW', 3, 1, 1639410169),
(21, 'muhammad taufiq insani', 'taufiqinsani88@gmail.com', 'default.jpg', '$2y$10$5WpysOFTqAV16D/H2Olgx.nYWB8DJ26cIwmX/cEf7S/SgjSA/zNtG', 2, 1, 1641878115),
(22, 'Feby Fuji Akbar', 'febyakbar2@gmail.com', 'default.jpg', '$2y$10$jHf2LKir/j19o9A0oNQpX.25zKUFoSVqrM.AOt7904.GG3zbBGuIC', 2, 1, 1641921115),
(29, 'Silfia Febila Ayu', 'mantapjiwo24@gmail.com', 'kk.png', '$2y$10$TFAHwr7bwSqviycdj3lRvu.0Ov/w0wCpg1IVu9zN6FMc6QR4KAr0C', 2, 1, 1642004441),
(30, 'Depi septiani', 'depiseptiyani08@gmail.com', 'default.jpg', '$2y$10$BMaDn5y3sxrnM8SDRoICD.TnLhH83tmogbHbnPWNYco3ogjdeBAYa', 2, 1, 1642004734),
(31, 'Silfia Febila Ayu', 'muhammadtaufiqinsani@gmail.com', 'default.jpg', '$2y$10$VT65RmWRwJWbqEuxi5vfC.wWTB7ndr/rlJRq1YDdedW0KMqIg43h6', 2, 1, 1642076310);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_access_menu`
--

INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES
(31, 1, 1),
(32, 1, 2),
(33, 1, 3),
(34, 1, 4),
(35, 2, 2),
(36, 3, 3),
(37, 3, 2),
(39, 2, 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`) VALUES
(1, 'Admin'),
(2, 'Akun'),
(3, 'Guru'),
(4, 'Menu\r\n'),
(5, 'Siswa');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'Administrator'),
(2, 'Siswa'),
(3, 'Guru\r\n');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_sub_menu`
--

CREATE TABLE `user_sub_menu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `judul` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id`, `menu_id`, `judul`, `url`, `icon`, `is_active`) VALUES
(1, 1, 'Dashboard', 'Admin/Dashboard', 'fas fa-fw fa-tachometer-alt', 1),
(2, 2, 'My Profile', 'User/Dashboard', 'fas fa-fw fa-user', 1),
(3, 4, 'Menu Management', 'Admin/Menu', 'fas fa-fw fa-folder-open', 1),
(4, 4, 'Sub Menu Management', 'Admin/Menu/subMenu', 'far fa-folder-open', 1),
(5, 3, 'Daftar Siswa', 'Guru/Dashboard', 'fas fa-fw fa-database', 1),
(8, 1, 'Role', 'Admin/Role', 'fas fa-fw fa-user-tie', 1),
(9, 2, 'Edit Profile', 'User/Dashboard/edit', 'fas fa-fw fa-user-edit', 1),
(10, 2, 'Ubah Password', 'User/Dashboard/ubahPassword', 'fas fa-fw fa-key', 1),
(11, 3, 'Kelas', 'Guru/Dashboard/tampilKelas', 'fas fa-fw fa-object-group', 1),
(12, 5, 'Pelajaran', 'User/Siswa', 'fas fa-fw fa-address-book', 1),
(13, 5, 'Nilai', 'User/Siswa/tampilNilai', 'fas fa-fw fa-marker', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_token`
--

CREATE TABLE `user_token` (
  `id` int(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `token` varchar(128) NOT NULL,
  `date_create` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_token`
--

INSERT INTO `user_token` (`id`, `email`, `token`, `date_create`) VALUES
(52, 'muhammadtaufiqinsani@gmail.com', 'UALK4q4lm2dIY3yGfARe+SyKkvh42nGc', 1642076447);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `ambil`
--
ALTER TABLE `ambil`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nik` (`nik`),
  ADD KEY `kd_pelajaran` (`kd_pelajaran`);

--
-- Indeks untuk tabel `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`niy`);

--
-- Indeks untuk tabel `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`kd_kelas`);

--
-- Indeks untuk tabel `nilai`
--
ALTER TABLE `nilai`
  ADD PRIMARY KEY (`id_nilai`),
  ADD KEY `kd_semester` (`kd_semester`),
  ADD KEY `kd_pelajaran` (`kd_pelajaran`),
  ADD KEY `nik` (`nik`);

--
-- Indeks untuk tabel `pelajaran`
--
ALTER TABLE `pelajaran`
  ADD PRIMARY KEY (`kd_pelajaran`);

--
-- Indeks untuk tabel `pengampu`
--
ALTER TABLE `pengampu`
  ADD KEY `niy` (`niy`),
  ADD KEY `kd_pelajaran` (`kd_pelajaran`);

--
-- Indeks untuk tabel `semester`
--
ALTER TABLE `semester`
  ADD PRIMARY KEY (`kd_semester`);

--
-- Indeks untuk tabel `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`nik`),
  ADD KEY `kd_kelas` (`kd_kelas`),
  ADD KEY `id` (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_token`
--
ALTER TABLE `user_token`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `ambil`
--
ALTER TABLE `ambil`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT untuk tabel `kelas`
--
ALTER TABLE `kelas`
  MODIFY `kd_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `nilai`
--
ALTER TABLE `nilai`
  MODIFY `id_nilai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT untuk tabel `pelajaran`
--
ALTER TABLE `pelajaran`
  MODIFY `kd_pelajaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `semester`
--
ALTER TABLE `semester`
  MODIFY `kd_semester` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT untuk tabel `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT untuk tabel `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT untuk tabel `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `user_token`
--
ALTER TABLE `user_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `ambil`
--
ALTER TABLE `ambil`
  ADD CONSTRAINT `ambil_ibfk_1` FOREIGN KEY (`kd_pelajaran`) REFERENCES `pelajaran` (`kd_pelajaran`),
  ADD CONSTRAINT `ambil_ibfk_2` FOREIGN KEY (`nik`) REFERENCES `siswa` (`nik`);

--
-- Ketidakleluasaan untuk tabel `nilai`
--
ALTER TABLE `nilai`
  ADD CONSTRAINT `nilai_ibfk_1` FOREIGN KEY (`kd_semester`) REFERENCES `semester` (`kd_semester`),
  ADD CONSTRAINT `nilai_ibfk_2` FOREIGN KEY (`kd_pelajaran`) REFERENCES `pelajaran` (`kd_pelajaran`),
  ADD CONSTRAINT `nilai_ibfk_3` FOREIGN KEY (`nik`) REFERENCES `siswa` (`nik`);

--
-- Ketidakleluasaan untuk tabel `pengampu`
--
ALTER TABLE `pengampu`
  ADD CONSTRAINT `pengampu_ibfk_1` FOREIGN KEY (`niy`) REFERENCES `guru` (`niy`),
  ADD CONSTRAINT `pengampu_ibfk_2` FOREIGN KEY (`kd_pelajaran`) REFERENCES `pelajaran` (`kd_pelajaran`);

--
-- Ketidakleluasaan untuk tabel `siswa`
--
ALTER TABLE `siswa`
  ADD CONSTRAINT `siswa_ibfk_1` FOREIGN KEY (`kd_kelas`) REFERENCES `kelas` (`kd_kelas`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
