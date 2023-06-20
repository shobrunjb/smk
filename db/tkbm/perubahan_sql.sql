ALTER TABLE `hrm_pegawai` ADD `no_bpjs` VARCHAR(250) NOT NULL AFTER `scan_tandatangan`;


CREATE TABLE `mst_tingkat_pendidikan` (
  `id_mst_tingkat_pendidikan` int(11) NOT NULL,
  `tingkat_pendidikan` varchar(250) NOT NULL,
  `keterangan` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mst_tingkat_pendidikan`
--

INSERT INTO `mst_tingkat_pendidikan` (`id_mst_tingkat_pendidikan`, `tingkat_pendidikan`, `keterangan`) VALUES
(11, 'SD atau Sederajat', NULL),
(12, 'SMP/SLTP atau sederajat', NULL),
(13, 'SMA/SLTA/SMK atau sederejat', NULL),
(20, 'D1', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mst_tingkat_pendidikan`
--
ALTER TABLE `mst_tingkat_pendidikan`
  ADD PRIMARY KEY (`id_mst_tingkat_pendidikan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mst_tingkat_pendidikan`
--
ALTER TABLE `mst_tingkat_pendidikan`
  MODIFY `id_mst_tingkat_pendidikan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;