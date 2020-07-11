-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 11, 2020 at 09:21 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tokoline`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_barang`
--

CREATE TABLE `tb_barang` (
  `kd_barang` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `id_kategori` varchar(10) NOT NULL,
  `deskripsi` text NOT NULL,
  `jumlah_brg` int(11) NOT NULL,
  `headline` enum('Y','T') NOT NULL,
  `tgl_masuk` date NOT NULL,
  `hrg_jual` double NOT NULL,
  `terjual` int(11) NOT NULL,
  `foto` text NOT NULL,
  `stok_barang` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_barang`
--

INSERT INTO `tb_barang` (`kd_barang`, `nama`, `id_kategori`, `deskripsi`, `jumlah_brg`, `headline`, `tgl_masuk`, `hrg_jual`, `terjual`, `foto`, `stok_barang`) VALUES
(10, 'Pisau Lipat', '13', 'qwe', 10, 'T', '2020-06-23', 50000, 10, '5ef498131efd0.jpg', 5),
(12, 'OEM Stainless Steel Panci 18 cm', '13', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Distinctio ipsam aut dolore nihil explicabo magnam in excepturi alias, adipisci voluptates dolorum obcaecati nesciunt. Praesentium unde ea dolore, adipisci eaque soluta!', 7, 'Y', '2020-06-27', 89000, 120, '5ef4988b3ce44.jpg', 5),
(13, 'Gamis Coklat', '4', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Enim aperiam alias distinctio, eos nesciunt non nemo dolore, quo hic itaque possimus quasi odit corporis, ipsa doloremque numquam repellendus. Officiis, nemo earum adipisci quibusdam facilis dolore voluptatem molestias laudantium. Ad tempore sint quam odit rerum ratione ut rem ipsa quas accusantium!', 1, 'Y', '2020-06-30', 150000, 30, '5ef4982908ce6.jpg', 5),
(14, 'Kursi Gaming', '12', 'asd', 10, 'T', '2020-06-23', 200000, 40, '5ef49898a3d22.jpg', 5),
(15, 'Sepeda', '14', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tempora quaerat deleniti explicabo fuga corrupti reiciendis non ex itaque voluptates delectus natus voluptatibus eum, unde, fugiat optio numquam omnis voluptas. Molestiae laudantium possimus veritatis corporis maxime.', 20, 'Y', '2020-06-03', 300000, 32, '5ef498a6b81ac.jpg', 5),
(16, 'Samsung Core 2', '12', 'er', 100, 'T', '2020-06-27', 1800000, 75, '5ef4983675324.jpg', 5),
(19, 'Piring Ayam Jago', '13', 'dfg', 120, 'T', '2020-06-23', 70000, 200, '5ef4a7da9a8bb.jpg', 5),
(20, 'Kemeja Lengan Panjang Pria putih Polos Slimfit', '4', 'Deskripsi Baju Kemeja Lengan Panjang Pria putih Polos Slimfit\r\n\r\nkemeja pria polos simple yunzo baju kemeja lengan panjang cowok fashion pria perlengkapan kerja perlengkapan kantor\r\n\r\nbila mau dipesan jgan lupa tulis keterangan warna dan ukuran d.catatan pembelian ya ...\r\n\r\npilihan warna :\r\nmaroon\r\ngrey\r\nhitam\r\nputih\r\nBIRU\r\nCOKSU\r\nARMY\r\nnavy blue\r\nTOSCA\r\n-Kemeja pria lengan panjang \r\n-terdapat kantong depan\r\n-Slim fit( pas body )\r\n-Bahan katun streach,adem,melar\r\n-katun streatch adalah bahan kain yang terbuat dari gabungan dua buah serat,yaitu serat kapas/cotton dan serat spandek yg mempunyai daya elastis tinggi.\r\n-5 ukuran M-L-XL-XXL-3XL\r\n-M=Lingkar dada 98cm -Panjang baju 68cm\r\n-L=lngkar dada 102cm -panjang 70cm\r\n-XL=lingkar dada 104cm -panjang 73cm\r\n-XXL=lingkar dada 112cm -panjang 75cm\r\n-3XL=lingkar dada 118cm -panjang 80cm\r\n-Good quality\r\n-1pcs 200gram\r\n-6 pcs dihitung 1kg\r\n-Barang ready stok\r\n-Silahkan langsung diorder saja\r\n-Selamat berbelanja \r\n-Terima kasih', 97, 'T', '2020-06-26', 100000, 268, '5ef5f6e56a880.jpg', 5),
(21, 'Kipas Angin Sekai HDO 615-S', '11', 'Deskripsi Kipas Angin Sekai HDO 615-S (NEW)\r\n\r\nType HDO 615-S\r\n-Kipas angin high velocity 15 cm (6”)\r\n-Baling baling dari Plastik\r\n-2 pengatur kecepatan\r\n-Hembusan angin kencang\r\n-Hemat listrik\r\n-Tidak berisik\r\n-Dilengkapi sekring pengaman\r\n-Garansi 3 tahun\r\n-Daya 20 W, 220 VAC, 50 Hz', 410, 'T', '2020-06-28', 90000, 1485, '5ef5f7e63833a.jpg', 5),
(22, 'Nakamichi NBS 701 Speaker', '11', 'Berdiri sejak tahun 1948 dan selama lebih dari 70 Tahun, Nakamichi telah berhasil menunjukan image nya sebagai merek audio berkualitas tinggi yang memberikan suara audio premium, design yang menarik serta mewah\r\nSesuai dengan tagline kami : &quot; Your Luxury Audio World&quot;, Nakamichi di design atas kecintaan pada suara melodi terbaik oleh founder kami Etsuro Nakamichi terhadap musik dan komitmen untuk memberikan kualitas dan performa terbaik musik\r\nNakamichi mempunyai beragam produk seperti Earphone, Speaker, TWS, Headphone, speaker hingga Soundbar.', 18, 'T', '2020-06-16', 127000, 66, '5ef5f8d415ed5.jpg', 5),
(28, 'as', '12', 'a', 2, 'T', '2020-07-08', 2, 2, '13233084_1721459411430483_8266543403885607708_n.jpg', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tb_kategori`
--

CREATE TABLE `tb_kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_kategori`
--

INSERT INTO `tb_kategori` (`id_kategori`, `nama_kategori`) VALUES
(4, 'Pakaian'),
(11, 'Elektronik'),
(12, 'Gadget'),
(13, 'Peralatan Dapur'),
(14, 'Aksesoris');

-- --------------------------------------------------------

--
-- Table structure for table `tb_keranjang`
--

CREATE TABLE `tb_keranjang` (
  `id_krj` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `price` float NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_keranjang`
--

INSERT INTO `tb_keranjang` (`id_krj`, `name`, `price`, `quantity`) VALUES
(1, 'Samsung', 2000000, 2),
(2, 'Samsung2', 3000000, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_ongkir`
--

CREATE TABLE `tb_ongkir` (
  `id_ongkir` int(11) NOT NULL,
  `nama_kota` varchar(100) NOT NULL,
  `tarif` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_ongkir`
--

INSERT INTO `tb_ongkir` (`id_ongkir`, `nama_kota`, `tarif`) VALUES
(1, 'Mangelang', 50000),
(2, 'Lampung', 38000);

-- --------------------------------------------------------

--
-- Table structure for table `tb_pembayaran`
--

CREATE TABLE `tb_pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `id_pembelian` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `bank` varchar(50) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `bukti` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_pembayaran`
--

INSERT INTO `tb_pembayaran` (`id_pembayaran`, `id_pembelian`, `nama`, `bank`, `jumlah`, `tanggal`, `bukti`) VALUES
(1, 8, 'Harun', 'Mandiri Syariah', 1000000, '2020-07-05', '5f01d09d6d736.png'),
(2, 9, 'ss', 'BRI', 1000000, '2020-07-07', '5f03eebea7d11.png');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pembelian`
--

CREATE TABLE `tb_pembelian` (
  `id_pembelian` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_ongkir` int(11) NOT NULL,
  `tgl_pembelian` date NOT NULL,
  `total_pembelian` int(11) NOT NULL,
  `nama_kota` varchar(100) NOT NULL,
  `tarif` int(11) NOT NULL,
  `alamat_pengiriman` text NOT NULL,
  `status_pembelian` varchar(50) NOT NULL DEFAULT 'pending',
  `resi_pengiriman` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_pembelian`
--

INSERT INTO `tb_pembelian` (`id_pembelian`, `id_user`, `id_ongkir`, `tgl_pembelian`, `total_pembelian`, `nama_kota`, `tarif`, `alamat_pengiriman`, `status_pembelian`, `resi_pengiriman`) VALUES
(8, 5, 1, '2020-07-03', 128000, '', 0, '', 'Barang Dikirim', 'ABCS'),
(9, 5, 1, '2020-07-03', 339000, '', 0, '', 'Barang Dikirim', ''),
(10, 5, 2, '2020-07-03', 217000, 'Lampung', 38000, '', 'pending', ''),
(11, 5, 1, '2020-07-03', 139000, 'Mangelang', 50000, 'Jl. kakak tua no.34', 'pending', ''),
(12, 5, 2, '2020-07-04', 366000, 'Lampung', 38000, 'asdasd', 'pending', ''),
(13, 5, 2, '2020-07-05', 305000, 'Lampung', 38000, 'erer', 'pending', '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pembelian_barang`
--

CREATE TABLE `tb_pembelian_barang` (
  `id_pembelian_barang` int(11) NOT NULL,
  `id_pembelian` int(11) NOT NULL,
  `kd_barang` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `harga` int(11) NOT NULL,
  `subharga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_pembelian_barang`
--

INSERT INTO `tb_pembelian_barang` (`id_pembelian_barang`, `id_pembelian`, `kd_barang`, `jumlah`, `nama`, `harga`, `subharga`) VALUES
(1, 1, 10, 10000, '', 0, 0),
(2, 1, 12, 30000, '', 0, 0),
(3, 5, 12, 1, '', 0, 0),
(4, 5, 13, 1, '', 0, 0),
(5, 6, 12, 1, '', 0, 0),
(6, 6, 13, 1, '', 0, 0),
(7, 7, 12, 1, '', 0, 0),
(8, 8, 20, 1, '', 0, 0),
(9, 9, 12, 1, 'OEM Stainless Steel Panci 18 cm', 89000, 89000),
(10, 9, 13, 1, 'Gamis Coklat', 200000, 200000),
(11, 10, 12, 1, 'OEM Stainless Steel Panci 18 cm', 89000, 89000),
(12, 10, 21, 1, 'Kipas Angin Sekai HDO 615-S', 90000, 90000),
(13, 11, 12, 1, 'OEM Stainless Steel Panci 18 cm', 89000, 89000),
(14, 12, 12, 2, 'OEM Stainless Steel Panci 18 cm', 89000, 178000),
(15, 12, 13, 1, 'Gamis Coklat', 150000, 150000),
(16, 13, 12, 3, 'OEM Stainless Steel Panci 18 cm', 89000, 267000);

-- --------------------------------------------------------

--
-- Table structure for table `tb_produk_foto`
--

CREATE TABLE `tb_produk_foto` (
  `id_produk_foto` int(11) NOT NULL,
  `kd_barang` int(11) NOT NULL,
  `nama_produk_foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_produk_foto`
--

INSERT INTO `tb_produk_foto` (`id_produk_foto`, `kd_barang`, `nama_produk_foto`) VALUES
(19, 28, '13233084_1721459411430483_8266543403885607708_n.jpg'),
(20, 28, '3365637c499f0983332b36667725ebbe.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `no_telp` int(20) NOT NULL,
  `level` varchar(20) NOT NULL,
  `blokir` enum('Y','N') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `username`, `password`, `nama_lengkap`, `email`, `no_telp`, `level`, `blokir`) VALUES
(5, 'ridho008', '$2y$10$XGnQn2Zoa92M69Amt6PpOOakc2.NybME226kEJhQTLHXntJxxWpnq', 'ridho surya', 'ridho@gmail.com', 8765654, 'admin', 'N'),
(9, 'admin', '$2y$10$EiEdFgv/QZyLcin0O10Kte.Ouc00MLCG9JyjlvOsGEChc4VADqhPC', 'admin', 'admin@gmail.com', 986776565, 'admin', 'N');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_barang`
--
ALTER TABLE `tb_barang`
  ADD PRIMARY KEY (`kd_barang`);

--
-- Indexes for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `tb_keranjang`
--
ALTER TABLE `tb_keranjang`
  ADD PRIMARY KEY (`id_krj`);

--
-- Indexes for table `tb_ongkir`
--
ALTER TABLE `tb_ongkir`
  ADD PRIMARY KEY (`id_ongkir`);

--
-- Indexes for table `tb_pembayaran`
--
ALTER TABLE `tb_pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`);

--
-- Indexes for table `tb_pembelian`
--
ALTER TABLE `tb_pembelian`
  ADD PRIMARY KEY (`id_pembelian`);

--
-- Indexes for table `tb_pembelian_barang`
--
ALTER TABLE `tb_pembelian_barang`
  ADD PRIMARY KEY (`id_pembelian_barang`);

--
-- Indexes for table `tb_produk_foto`
--
ALTER TABLE `tb_produk_foto`
  ADD PRIMARY KEY (`id_produk_foto`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_barang`
--
ALTER TABLE `tb_barang`
  MODIFY `kd_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tb_keranjang`
--
ALTER TABLE `tb_keranjang`
  MODIFY `id_krj` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_ongkir`
--
ALTER TABLE `tb_ongkir`
  MODIFY `id_ongkir` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_pembayaran`
--
ALTER TABLE `tb_pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_pembelian`
--
ALTER TABLE `tb_pembelian`
  MODIFY `id_pembelian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tb_pembelian_barang`
--
ALTER TABLE `tb_pembelian_barang`
  MODIFY `id_pembelian_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tb_produk_foto`
--
ALTER TABLE `tb_produk_foto`
  MODIFY `id_produk_foto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
