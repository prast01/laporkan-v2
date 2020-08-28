/*
 Navicat Premium Data Transfer

 Source Server         : local
 Source Server Type    : MySQL
 Source Server Version : 100128
 Source Host           : localhost:3306
 Source Schema         : db_arsip

 Target Server Type    : MySQL
 Target Server Version : 100128
 File Encoding         : 65001

 Date: 18/01/2020 15:05:34
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for tb_detail_pegawai
-- ----------------------------
DROP TABLE IF EXISTS `tb_detail_pegawai`;
CREATE TABLE `tb_detail_pegawai`  (
  `id_detail_pegawai` int(11) NOT NULL AUTO_INCREMENT,
  `nomor_surat` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `id_pegawai` int(11) NULL DEFAULT NULL,
  `jml_berangkat` int(11) NULL DEFAULT NULL,
  `dalam_luar` int(2) NULL DEFAULT NULL,
  `bln_kegiatan` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_detail_pegawai`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 75 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of tb_detail_pegawai
-- ----------------------------
INSERT INTO `tb_detail_pegawai` VALUES (30, '3', 20, 1, 0, '2020-01');
INSERT INTO `tb_detail_pegawai` VALUES (31, '3', 107, 1, 0, '2020-01');
INSERT INTO `tb_detail_pegawai` VALUES (32, '4', 20, 2, 0, '2020-01');
INSERT INTO `tb_detail_pegawai` VALUES (33, '4', 107, 2, 0, '2020-01');
INSERT INTO `tb_detail_pegawai` VALUES (36, '5', 59, 1, 0, '2020-01');
INSERT INTO `tb_detail_pegawai` VALUES (37, '6', 86, 1, 0, '2020-01');
INSERT INTO `tb_detail_pegawai` VALUES (39, '7', 54, 1, 0, '2020-01');
INSERT INTO `tb_detail_pegawai` VALUES (40, '7', 110, 1, 0, '2020-01');
INSERT INTO `tb_detail_pegawai` VALUES (45, '10', 47, 2, 1, '2020-01');
INSERT INTO `tb_detail_pegawai` VALUES (46, '11', 32, 1, 0, '2020-01');
INSERT INTO `tb_detail_pegawai` VALUES (47, '11', 107, 3, 0, '2020-01');
INSERT INTO `tb_detail_pegawai` VALUES (48, '8', 47, 2, 1, '2020-01');
INSERT INTO `tb_detail_pegawai` VALUES (49, '8', 80, 1, 1, '2020-01');
INSERT INTO `tb_detail_pegawai` VALUES (50, '12', 32, 2, 0, '2020-01');
INSERT INTO `tb_detail_pegawai` VALUES (51, '12', 107, 4, 0, '2020-01');
INSERT INTO `tb_detail_pegawai` VALUES (53, '13', 21, 1, 0, '2020-01');
INSERT INTO `tb_detail_pegawai` VALUES (59, '14', 15, 1, 1, '2020-01');
INSERT INTO `tb_detail_pegawai` VALUES (60, '2', 27, 1, 1, '2020-01');
INSERT INTO `tb_detail_pegawai` VALUES (61, '2', 28, 1, 1, '2020-01');
INSERT INTO `tb_detail_pegawai` VALUES (62, '9', 35, 1, 1, '2020-01');
INSERT INTO `tb_detail_pegawai` VALUES (63, '15', 63, 1, 0, '2020-01');
INSERT INTO `tb_detail_pegawai` VALUES (64, '15', 65, 1, 0, '2020-01');
INSERT INTO `tb_detail_pegawai` VALUES (65, '16', 15, 1, 0, '2020-01');
INSERT INTO `tb_detail_pegawai` VALUES (66, '16', 23, 1, 0, '2020-01');
INSERT INTO `tb_detail_pegawai` VALUES (67, '16', 25, 1, 0, '2020-01');
INSERT INTO `tb_detail_pegawai` VALUES (68, '16', 59, 2, 0, '2020-01');
INSERT INTO `tb_detail_pegawai` VALUES (69, '16', 104, 1, 0, '2020-01');
INSERT INTO `tb_detail_pegawai` VALUES (70, '16', 124, 1, 0, '2020-01');
INSERT INTO `tb_detail_pegawai` VALUES (71, '17', 3, 1, 0, '2020-01');
INSERT INTO `tb_detail_pegawai` VALUES (72, '18', 63, 2, 0, '2020-01');
INSERT INTO `tb_detail_pegawai` VALUES (73, '18', 67, 1, 0, '2020-01');
INSERT INTO `tb_detail_pegawai` VALUES (74, '19', 53, 1, 1, '2020-01');

-- ----------------------------
-- Table structure for tb_dispo_bidang
-- ----------------------------
DROP TABLE IF EXISTS `tb_dispo_bidang`;
CREATE TABLE `tb_dispo_bidang`  (
  `id_dispo_bidang` int(11) NOT NULL AUTO_INCREMENT,
  `nomor_dinas` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `posisi_bidang` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_dispo_bidang`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 79 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of tb_dispo_bidang
-- ----------------------------
INSERT INTO `tb_dispo_bidang` VALUES (1, '1', '15');
INSERT INTO `tb_dispo_bidang` VALUES (7, '7', '11');
INSERT INTO `tb_dispo_bidang` VALUES (10, '10', '14');
INSERT INTO `tb_dispo_bidang` VALUES (16, '16', '14');
INSERT INTO `tb_dispo_bidang` VALUES (18, '18', '15');
INSERT INTO `tb_dispo_bidang` VALUES (20, '20', '7');
INSERT INTO `tb_dispo_bidang` VALUES (27, '27', '15');
INSERT INTO `tb_dispo_bidang` VALUES (28, '28', '15');
INSERT INTO `tb_dispo_bidang` VALUES (29, '29', '14');
INSERT INTO `tb_dispo_bidang` VALUES (30, '30', '15');
INSERT INTO `tb_dispo_bidang` VALUES (33, '33', '12');
INSERT INTO `tb_dispo_bidang` VALUES (34, '34', '7');
INSERT INTO `tb_dispo_bidang` VALUES (36, '36', '11');
INSERT INTO `tb_dispo_bidang` VALUES (43, '43', '11');
INSERT INTO `tb_dispo_bidang` VALUES (53, '53', '14');
INSERT INTO `tb_dispo_bidang` VALUES (57, '57', '11');
INSERT INTO `tb_dispo_bidang` VALUES (58, '58', '12');
INSERT INTO `tb_dispo_bidang` VALUES (64, '64', '13');
INSERT INTO `tb_dispo_bidang` VALUES (78, '73', '11');

-- ----------------------------
-- Table structure for tb_dispo_pegawai
-- ----------------------------
DROP TABLE IF EXISTS `tb_dispo_pegawai`;
CREATE TABLE `tb_dispo_pegawai`  (
  `id_dispo_pegawai` int(11) NOT NULL AUTO_INCREMENT,
  `nomor_dinas` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `id_pegawai` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_dispo_pegawai`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 86 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of tb_dispo_pegawai
-- ----------------------------
INSERT INTO `tb_dispo_pegawai` VALUES (4, '4', '51');
INSERT INTO `tb_dispo_pegawai` VALUES (5, '5', '103');
INSERT INTO `tb_dispo_pegawai` VALUES (7, '7', '5');
INSERT INTO `tb_dispo_pegawai` VALUES (14, '14', '50');
INSERT INTO `tb_dispo_pegawai` VALUES (31, '31', '92');
INSERT INTO `tb_dispo_pegawai` VALUES (35, '35', '24');
INSERT INTO `tb_dispo_pegawai` VALUES (36, '36', '12');
INSERT INTO `tb_dispo_pegawai` VALUES (41, '41', '50');
INSERT INTO `tb_dispo_pegawai` VALUES (43, '43', '5');
INSERT INTO `tb_dispo_pegawai` VALUES (54, '54', '30');
INSERT INTO `tb_dispo_pegawai` VALUES (57, '57', '5');
INSERT INTO `tb_dispo_pegawai` VALUES (59, '59', '92');
INSERT INTO `tb_dispo_pegawai` VALUES (61, '61', '23');
INSERT INTO `tb_dispo_pegawai` VALUES (63, '63', '95');
INSERT INTO `tb_dispo_pegawai` VALUES (78, '35', '77');
INSERT INTO `tb_dispo_pegawai` VALUES (79, '59', '95');
INSERT INTO `tb_dispo_pegawai` VALUES (81, '58', '28');
INSERT INTO `tb_dispo_pegawai` VALUES (82, '33', '28');
INSERT INTO `tb_dispo_pegawai` VALUES (83, '65', '78');
INSERT INTO `tb_dispo_pegawai` VALUES (84, '34', '85');
INSERT INTO `tb_dispo_pegawai` VALUES (85, '20', '85');

-- ----------------------------
-- Table structure for tb_dispo_sekdin
-- ----------------------------
DROP TABLE IF EXISTS `tb_dispo_sekdin`;
CREATE TABLE `tb_dispo_sekdin`  (
  `id_dispo_sekdin` int(11) NOT NULL AUTO_INCREMENT,
  `nomor_dinas` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `posisi_sekdin` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_dispo_sekdin`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 91 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of tb_dispo_sekdin
-- ----------------------------
INSERT INTO `tb_dispo_sekdin` VALUES (1, '1', '4');
INSERT INTO `tb_dispo_sekdin` VALUES (2, '2', '6');
INSERT INTO `tb_dispo_sekdin` VALUES (3, '3', '6');
INSERT INTO `tb_dispo_sekdin` VALUES (4, '4', '5');
INSERT INTO `tb_dispo_sekdin` VALUES (5, '5', '5');
INSERT INTO `tb_dispo_sekdin` VALUES (6, '6', '6');
INSERT INTO `tb_dispo_sekdin` VALUES (7, '7', '3');
INSERT INTO `tb_dispo_sekdin` VALUES (8, '8', '6');
INSERT INTO `tb_dispo_sekdin` VALUES (9, '9', '6');
INSERT INTO `tb_dispo_sekdin` VALUES (10, '10', '3');
INSERT INTO `tb_dispo_sekdin` VALUES (11, '11', '6');
INSERT INTO `tb_dispo_sekdin` VALUES (12, '12', '6');
INSERT INTO `tb_dispo_sekdin` VALUES (13, '13', '6');
INSERT INTO `tb_dispo_sekdin` VALUES (14, '14', '5');
INSERT INTO `tb_dispo_sekdin` VALUES (15, '15', '6');
INSERT INTO `tb_dispo_sekdin` VALUES (16, '16', '3');
INSERT INTO `tb_dispo_sekdin` VALUES (17, '17', '4');
INSERT INTO `tb_dispo_sekdin` VALUES (18, '18', '4');
INSERT INTO `tb_dispo_sekdin` VALUES (19, '19', '6');
INSERT INTO `tb_dispo_sekdin` VALUES (20, '20', '2');
INSERT INTO `tb_dispo_sekdin` VALUES (21, '21', '6');
INSERT INTO `tb_dispo_sekdin` VALUES (22, '22', '6');
INSERT INTO `tb_dispo_sekdin` VALUES (23, '23', '6');
INSERT INTO `tb_dispo_sekdin` VALUES (24, '24', '6');
INSERT INTO `tb_dispo_sekdin` VALUES (25, '25', '6');
INSERT INTO `tb_dispo_sekdin` VALUES (26, '26', '6');
INSERT INTO `tb_dispo_sekdin` VALUES (27, '27', '4');
INSERT INTO `tb_dispo_sekdin` VALUES (28, '28', '4');
INSERT INTO `tb_dispo_sekdin` VALUES (29, '29', '3');
INSERT INTO `tb_dispo_sekdin` VALUES (30, '30', '4');
INSERT INTO `tb_dispo_sekdin` VALUES (31, '31', '5');
INSERT INTO `tb_dispo_sekdin` VALUES (32, '32', '6');
INSERT INTO `tb_dispo_sekdin` VALUES (33, '33', '4');
INSERT INTO `tb_dispo_sekdin` VALUES (34, '34', '2');
INSERT INTO `tb_dispo_sekdin` VALUES (35, '35', '5');
INSERT INTO `tb_dispo_sekdin` VALUES (36, '36', '3');
INSERT INTO `tb_dispo_sekdin` VALUES (37, '37', '6');
INSERT INTO `tb_dispo_sekdin` VALUES (38, '38', '6');
INSERT INTO `tb_dispo_sekdin` VALUES (39, '39', '4');
INSERT INTO `tb_dispo_sekdin` VALUES (40, '40', '6');
INSERT INTO `tb_dispo_sekdin` VALUES (41, '41', '5');
INSERT INTO `tb_dispo_sekdin` VALUES (42, '42', '6');
INSERT INTO `tb_dispo_sekdin` VALUES (43, '43', '3');
INSERT INTO `tb_dispo_sekdin` VALUES (44, '44', '6');
INSERT INTO `tb_dispo_sekdin` VALUES (45, '45', '6');
INSERT INTO `tb_dispo_sekdin` VALUES (46, '46', '6');
INSERT INTO `tb_dispo_sekdin` VALUES (47, '47', '6');
INSERT INTO `tb_dispo_sekdin` VALUES (48, '48', '6');
INSERT INTO `tb_dispo_sekdin` VALUES (49, '49', '6');
INSERT INTO `tb_dispo_sekdin` VALUES (50, '50', '6');
INSERT INTO `tb_dispo_sekdin` VALUES (51, '51', '6');
INSERT INTO `tb_dispo_sekdin` VALUES (52, '52', '6');
INSERT INTO `tb_dispo_sekdin` VALUES (53, '53', '3');
INSERT INTO `tb_dispo_sekdin` VALUES (54, '54', '5');
INSERT INTO `tb_dispo_sekdin` VALUES (55, '55', '6');
INSERT INTO `tb_dispo_sekdin` VALUES (56, '56', '6');
INSERT INTO `tb_dispo_sekdin` VALUES (57, '57', '3');
INSERT INTO `tb_dispo_sekdin` VALUES (58, '58', '4');
INSERT INTO `tb_dispo_sekdin` VALUES (59, '59', '5');
INSERT INTO `tb_dispo_sekdin` VALUES (60, '60', '6');
INSERT INTO `tb_dispo_sekdin` VALUES (61, '61', '5');
INSERT INTO `tb_dispo_sekdin` VALUES (62, '62', '6');
INSERT INTO `tb_dispo_sekdin` VALUES (63, '63', '5');
INSERT INTO `tb_dispo_sekdin` VALUES (64, '64', '4');
INSERT INTO `tb_dispo_sekdin` VALUES (77, '77', '6');
INSERT INTO `tb_dispo_sekdin` VALUES (78, '65', '5');
INSERT INTO `tb_dispo_sekdin` VALUES (79, '76', '6');
INSERT INTO `tb_dispo_sekdin` VALUES (80, '75', '6');
INSERT INTO `tb_dispo_sekdin` VALUES (81, '74', '4');
INSERT INTO `tb_dispo_sekdin` VALUES (82, '73', '3');
INSERT INTO `tb_dispo_sekdin` VALUES (83, '73', '6');
INSERT INTO `tb_dispo_sekdin` VALUES (84, '72', '2');
INSERT INTO `tb_dispo_sekdin` VALUES (85, '71', '4');
INSERT INTO `tb_dispo_sekdin` VALUES (86, '70', '6');
INSERT INTO `tb_dispo_sekdin` VALUES (87, '69', '6');
INSERT INTO `tb_dispo_sekdin` VALUES (88, '68', '4');
INSERT INTO `tb_dispo_sekdin` VALUES (89, '67', '6');
INSERT INTO `tb_dispo_sekdin` VALUES (90, '66', '6');

-- ----------------------------
-- Table structure for tb_dpa
-- ----------------------------
DROP TABLE IF EXISTS `tb_dpa`;
CREATE TABLE `tb_dpa`  (
  `id_dpa` int(11) NOT NULL AUTO_INCREMENT,
  `nama_dpa` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `kode_dpa` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `st_dpa` int(2) NULL DEFAULT 0,
  PRIMARY KEY (`id_dpa`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 49 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of tb_dpa
-- ----------------------------
INSERT INTO `tb_dpa` VALUES (1, 'Pelayanan Teknis Kantor Dinas Kesehatan', '40523.060', 1);
INSERT INTO `tb_dpa` VALUES (2, 'Pengadaan Reagen, Bahan Habis Pakai, Alat Laboratorium, Penunjang dan Operasional Kantor UPT Labkesda', '10216.004', 0);
INSERT INTO `tb_dpa` VALUES (3, 'Pengeloaan Obat Instalasi Farmasi', '10216.006', 0);
INSERT INTO `tb_dpa` VALUES (4, 'BOK Pencegahan Stunting (DAK NON FISIK)', '10217.009', 0);
INSERT INTO `tb_dpa` VALUES (5, 'Dukungan Manajemen BOK Kabupaten dan Jampersal (DAK NON FISIK)', '10217.008', 0);
INSERT INTO `tb_dpa` VALUES (6, 'Fasilitasi Upaya Kesehatan Masyarakat Sekunder (DAK NON FISIK)', '10217.007', 0);
INSERT INTO `tb_dpa` VALUES (7, 'Jaminan Persalinan (DAK NON FISIK)', '10218.020', 0);
INSERT INTO `tb_dpa` VALUES (8, 'Pelayanan Distribusi Obat dan Penunjang e-Logistik (DAK NON FISIK)', '10216.010', 0);
INSERT INTO `tb_dpa` VALUES (9, 'Pengadaan Alat Laboratorium Kesehatan (DAK REGULER)', '10216.008', 0);
INSERT INTO `tb_dpa` VALUES (10, 'Pengadaan Bahan Habis Pakai HIV dan Sifilis (DAK PENUGASAN)', '10218.024', 0);
INSERT INTO `tb_dpa` VALUES (11, 'Pengadaan Bahan Habis Pakai Penanggulangan TBC (DAK REGULER)', '10218.021', 0);
INSERT INTO `tb_dpa` VALUES (12, 'Pengadaan Cartridge Tes Cepat Molekuler (TCM) (DAK PENUGASAN)', '10218.025', 0);
INSERT INTO `tb_dpa` VALUES (13, 'Pengadaan CO Analyzer (DAK PENUGASAN)', '10218.023', 0);
INSERT INTO `tb_dpa` VALUES (14, 'Pengadaan Instalasi Pengolah Limbah Laboratorium (DAK REGULER)', '10219.004', 0);
INSERT INTO `tb_dpa` VALUES (15, 'Pengadaan Medical Transport Box (DAK PENUGASAN) (DAK PENUGASAN)', '10218.022', 0);
INSERT INTO `tb_dpa` VALUES (16, 'Pengadaan Obat dan Perbekalan Kesehatan (DAK REGULER)', '10216.009', 0);
INSERT INTO `tb_dpa` VALUES (17, 'Pengadaan Sanitarian Kit (DAK PENUGASAN)', '10217.006', 0);
INSERT INTO `tb_dpa` VALUES (18, 'Pengadaan Sarana Prasarana Penunjang PSC (DAK REGULER)', '10219.003', 0);
INSERT INTO `tb_dpa` VALUES (19, 'Pengawasan Industri Rumah Tangga Pangan (DAK NON FISIK)', '10217.004', 0);
INSERT INTO `tb_dpa` VALUES (20, 'Pengawasan Sarana Pelayanan Kefarmasian (DAK NON FISIK)', '10216.007', 0);
INSERT INTO `tb_dpa` VALUES (21, 'Penugasan Stunting Therapeutic Feeding Center (TFC) dan Antromotri Kit (DAK PENUGASAN)', '10217.005', 0);
INSERT INTO `tb_dpa` VALUES (22, 'Penyediaan Sarana dan Prasarana IFK (DAK REGULER)', '40529.001', 0);
INSERT INTO `tb_dpa` VALUES (23, 'Standarisasi Pelayanan Kesehatan Dasar (DAK NON FISIK)', '10218.019', 0);
INSERT INTO `tb_dpa` VALUES (24, 'Deteksi Dini Penyakit Tidak Menular dan Penanganan Kasus Kedaruratan Jiwa, Indera dan NAPZA', NULL, 0);
INSERT INTO `tb_dpa` VALUES (25, 'Fasilitasi Komisi Penanggulangan HIV/AIDS Daerah Kabupaten Jepara', NULL, 0);
INSERT INTO `tb_dpa` VALUES (26, 'Hibah kepada Lembaga Sosial, Kesehatan dan Kesejahteraan Masyarakat', NULL, 0);
INSERT INTO `tb_dpa` VALUES (27, 'Pelayanan Kesehatan bagi Masyarakat Miskin yang Dibiayai oleh Pemerintah Daerah dan untuk Penduduk jepara yang belum mempunyai Jaminan kesehatan', NULL, 0);
INSERT INTO `tb_dpa` VALUES (28, 'Pelayanan Kesehatan Haji', NULL, 0);
INSERT INTO `tb_dpa` VALUES (30, 'Pembinaan dan Pengawasan Pelaksanaan Jaminan Kesehatan Nasional (JKN)', NULL, 0);
INSERT INTO `tb_dpa` VALUES (31, 'Pembinaan dan Perijinan Kefarmasian', NULL, 0);
INSERT INTO `tb_dpa` VALUES (32, 'Pembinaan dan Perijinan Sarana Kesehatan', NULL, 0);
INSERT INTO `tb_dpa` VALUES (33, 'Penanggulangan Krisis Kesehatan (Kegawatdaruratan dan Bencana)', NULL, 0);
INSERT INTO `tb_dpa` VALUES (34, 'Pencegahan dan Penanggulangan Penyakit Menular', NULL, 0);
INSERT INTO `tb_dpa` VALUES (35, 'Pengadaan Alat Kesehatan bagi Puskesmas', NULL, 0);
INSERT INTO `tb_dpa` VALUES (37, 'Pengadaan Sarana dan Prasarana Inventaris Kantor', NULL, 0);
INSERT INTO `tb_dpa` VALUES (38, 'Pengadaan, Peningkatan dan Perbaikan Sarana Prasarana Puskesmas, Puskesmas Pembantu dan Jaringannya', NULL, 0);
INSERT INTO `tb_dpa` VALUES (40, 'Pengembangan Kualitas Lingkungan Sehat', NULL, 0);
INSERT INTO `tb_dpa` VALUES (41, 'Pengembangan Sistem Informasi Kesehatan (SIK) dan Jaringannya', NULL, 0);
INSERT INTO `tb_dpa` VALUES (42, 'Pengembangan Tenaga Fungsional Kesehatan, Pendidikan dan Pelatihan Peningkatan Mutu dan Kompetensi SDM Kesehatan', NULL, 0);
INSERT INTO `tb_dpa` VALUES (43, 'Peningkatan Pelayanan Kesehatan Ibu dan Anak', NULL, 0);
INSERT INTO `tb_dpa` VALUES (44, 'Peningkatan Perbaikan Gizi Masyarakat', NULL, 0);
INSERT INTO `tb_dpa` VALUES (45, 'Penyusunan Perencanaan dan Evaluasi Dinas Kesehatan', NULL, 0);
INSERT INTO `tb_dpa` VALUES (46, 'Promosi Kesehatan dan Pemberdayaan Masyarakat di Bidang Kesehatan', NULL, 0);
INSERT INTO `tb_dpa` VALUES (47, 'Standarisasi Pelayanan Kesehatan', NULL, 0);
INSERT INTO `tb_dpa` VALUES (48, 'Surveilans, Imunisasi dan Pengendalian Kejadian Luar Biasa (KLB)', NULL, 0);

-- ----------------------------
-- Table structure for tb_jenis_surat
-- ----------------------------
DROP TABLE IF EXISTS `tb_jenis_surat`;
CREATE TABLE `tb_jenis_surat`  (
  `id_jenis_surat` int(11) NOT NULL AUTO_INCREMENT,
  `kode_surat` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `jenis_surat` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_jenis_surat`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 21 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of tb_jenis_surat
-- ----------------------------
INSERT INTO `tb_jenis_surat` VALUES (4, '005', 'Undangan');
INSERT INTO `tb_jenis_surat` VALUES (5, '811', 'Lamaran pekerjaan ');
INSERT INTO `tb_jenis_surat` VALUES (6, '470', 'Sensus penduduk');
INSERT INTO `tb_jenis_surat` VALUES (7, '050.1.3', 'Rencana Kerja Pembangunan Daerah ( RKPD)');
INSERT INTO `tb_jenis_surat` VALUES (8, '440', 'Kesehatan ');
INSERT INTO `tb_jenis_surat` VALUES (9, '441.9', 'Sistem Kesehatan Nasional');
INSERT INTO `tb_jenis_surat` VALUES (10, '045.2', 'Surat pengantar');
INSERT INTO `tb_jenis_surat` VALUES (11, '850', 'Cuti');
INSERT INTO `tb_jenis_surat` VALUES (12, '451.4', 'Pendididkan ');
INSERT INTO `tb_jenis_surat` VALUES (13, '800', 'Kepegawain');
INSERT INTO `tb_jenis_surat` VALUES (14, '050', 'Perencanaan dan Pengendalian');
INSERT INTO `tb_jenis_surat` VALUES (15, '027', 'Pengadaan Barang/Jasa');
INSERT INTO `tb_jenis_surat` VALUES (16, '020.1', 'Penawaran Iklan ');
INSERT INTO `tb_jenis_surat` VALUES (17, '445.9', 'Laboratorium Kesehatan ');
INSERT INTO `tb_jenis_surat` VALUES (18, '301', 'Koordinasi dan kerjasam keamanan dan ketertiban umum (Trantibum)');
INSERT INTO `tb_jenis_surat` VALUES (19, '900', 'Keuangan ');
INSERT INTO `tb_jenis_surat` VALUES (20, '890', 'Pendidikan pegawai');

-- ----------------------------
-- Table structure for tb_level_user
-- ----------------------------
DROP TABLE IF EXISTS `tb_level_user`;
CREATE TABLE `tb_level_user`  (
  `id_level_user` int(11) NOT NULL AUTO_INCREMENT,
  `user_level` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_level_user`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of tb_level_user
-- ----------------------------
INSERT INTO `tb_level_user` VALUES (1, 'admin');
INSERT INTO `tb_level_user` VALUES (2, 'Kepala');
INSERT INTO `tb_level_user` VALUES (3, 'Sekretaris');
INSERT INTO `tb_level_user` VALUES (4, 'Staf');

-- ----------------------------
-- Table structure for tb_nota_detail
-- ----------------------------
DROP TABLE IF EXISTS `tb_nota_detail`;
CREATE TABLE `tb_nota_detail`  (
  `id_nota_detail` int(11) NOT NULL AUTO_INCREMENT,
  `nomor_dinas` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `id_rekening` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `rok` bigint(15) NULL DEFAULT NULL,
  `nominal` bigint(15) NULL DEFAULT NULL,
  PRIMARY KEY (`id_nota_detail`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of tb_nota_detail
-- ----------------------------
INSERT INTO `tb_nota_detail` VALUES (2, '1', '85', 450000, 150000);
INSERT INTO `tb_nota_detail` VALUES (3, '1', '76', 150000, 200000);

-- ----------------------------
-- Table structure for tb_nota_dinas
-- ----------------------------
DROP TABLE IF EXISTS `tb_nota_dinas`;
CREATE TABLE `tb_nota_dinas`  (
  `id_nota_dinas` int(11) NOT NULL AUTO_INCREMENT,
  `tgl_nota_dinas` date NULL DEFAULT NULL,
  `nomor_nota_dinas` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tujuan_nota_dinas` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `sifat_nota_dinas` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `lampiran_nota_dinas` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `perihal_nota_dinas` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tgl_kegiatan` datetime(0) NULL DEFAULT NULL,
  `tempat_kegiatan` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `acara_kegiatan` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `created_at` date NULL DEFAULT NULL,
  `created_by` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `isi_nota_dinas` longtext CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `nomor_dinas` int(11) NULL DEFAULT NULL,
  `id_dpa` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `bulan` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_nota_dinas`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of tb_nota_dinas
-- ----------------------------
INSERT INTO `tb_nota_dinas` VALUES (1, '2020-01-17', NULL, 'Kepala Subag Perencanaan, Evaluasi dan Keuangan', '-', '-', 'Penambahan Anggaran Bulan Januari', NULL, NULL, NULL, '2020-01-17', '5', NULL, 1, '1', 'Januari');

-- ----------------------------
-- Table structure for tb_pangkat
-- ----------------------------
DROP TABLE IF EXISTS `tb_pangkat`;
CREATE TABLE `tb_pangkat`  (
  `id_pangkat` int(11) NOT NULL AUTO_INCREMENT,
  `pangkat` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_pangkat`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 19 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of tb_pangkat
-- ----------------------------
INSERT INTO `tb_pangkat` VALUES (1, 'Pembina Utama/IVe');
INSERT INTO `tb_pangkat` VALUES (2, 'Pembina Utama Madya/IVd');
INSERT INTO `tb_pangkat` VALUES (3, 'Pembina Utama Muda/IVc');
INSERT INTO `tb_pangkat` VALUES (4, 'Pembina Tingkat I/IVb');
INSERT INTO `tb_pangkat` VALUES (5, 'Pembina/IVa');
INSERT INTO `tb_pangkat` VALUES (6, 'Penata Tingkat I/IIId');
INSERT INTO `tb_pangkat` VALUES (7, 'Penata/IIIc');
INSERT INTO `tb_pangkat` VALUES (8, 'Penata Muda Tingkat I/IIIb');
INSERT INTO `tb_pangkat` VALUES (9, 'Penata Muda/IIIa');
INSERT INTO `tb_pangkat` VALUES (10, 'Pengatur Tingkat I/IId');
INSERT INTO `tb_pangkat` VALUES (11, 'Pengatur/IIc');
INSERT INTO `tb_pangkat` VALUES (12, 'Pengatur Muda Tingkat I/IIb');
INSERT INTO `tb_pangkat` VALUES (13, 'Pengatur Muda/IIa');
INSERT INTO `tb_pangkat` VALUES (14, 'Juru Tingkat I/Id');
INSERT INTO `tb_pangkat` VALUES (15, 'Juru/Ic');
INSERT INTO `tb_pangkat` VALUES (16, 'Juru Muda Tingkat I/Ib');
INSERT INTO `tb_pangkat` VALUES (17, 'Juru Muda/Ia');
INSERT INTO `tb_pangkat` VALUES (18, '-');

-- ----------------------------
-- Table structure for tb_pegawai
-- ----------------------------
DROP TABLE IF EXISTS `tb_pegawai`;
CREATE TABLE `tb_pegawai`  (
  `id_pegawai` int(11) NOT NULL AUTO_INCREMENT,
  `nama_pegawai` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `nip_pegawai` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `pangkat_pegawai` int(11) NULL DEFAULT 18,
  `level_user` int(11) NULL DEFAULT NULL,
  `posisi_user` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id_pegawai`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 126 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of tb_pegawai
-- ----------------------------
INSERT INTO `tb_pegawai` VALUES (1, 'Drs. WAHYU HANGGONO, SKM', '196707081997031002', 4, 4, 10);
INSERT INTO `tb_pegawai` VALUES (2, 'ARI SETYOWATI, SKM', '197605071999032002', 4, 4, 9);
INSERT INTO `tb_pegawai` VALUES (3, 'dr. M. FAHRUDDIN', '196411231990031010', 5, 2, 2);
INSERT INTO `tb_pegawai` VALUES (4, 'dr. VITA RATIH NUGRAHENI, M.Kes', '197007081999032005', 5, 2, 4);
INSERT INTO `tb_pegawai` VALUES (5, 'ENDANG RATRIASWORO, SKM, M.Kes', '196307161986032010', 5, 2, 11);
INSERT INTO `tb_pegawai` VALUES (6, 'WASITO, SKM, M.Kes', '196504091992031007', 5, 2, 8);
INSERT INTO `tb_pegawai` VALUES (7, 'dr. HESTI PRIHANDARI, M.Kes', '197110182004012001', 5, 2, 15);
INSERT INTO `tb_pegawai` VALUES (8, 'MASROH, SKM', '196711131988011003', 5, 4, 8);
INSERT INTO `tb_pegawai` VALUES (9, 'ARI MUGIARTI, S.KM', '197003011989032002', 5, 4, 10);
INSERT INTO `tb_pegawai` VALUES (10, 'ACHIRUDIN, SKM', '196809111993031003', 6, 2, 9);
INSERT INTO `tb_pegawai` VALUES (11, 'ZUBAIDAH, MS, S.S.T', '196205101987032009', 6, 4, 11);
INSERT INTO `tb_pegawai` VALUES (12, 'RIYATI, S.KM', '196804121989032013', 6, 4, 11);
INSERT INTO `tb_pegawai` VALUES (13, 'AKHMAT SANTOSO', '196906101989031006', 6, 4, 15);
INSERT INTO `tb_pegawai` VALUES (14, 'SURATMI, S.KEP', '196907021989022001', 6, 4, 15);
INSERT INTO `tb_pegawai` VALUES (15, 'AGUS CARDA, SKM, M.MKes', '197103031994031004', 6, 2, 13);
INSERT INTO `tb_pegawai` VALUES (16, 'ROZIKUN, SKM', '196409031987031016', 6, 4, 10);
INSERT INTO `tb_pegawai` VALUES (17, 'RETNO KUSBANDIYAH, SKM', '196905101994032016', 6, 4, 14);
INSERT INTO `tb_pegawai` VALUES (18, 'dr. INDAH BUDIYANTI', '197510302006042005', 5, 2, 12);
INSERT INTO `tb_pegawai` VALUES (19, 'SULIASTONO, A.Md.K', '196704051991031012', 6, 4, 10);
INSERT INTO `tb_pegawai` VALUES (20, 'AGUS NUR CAHYONO, SKM', '196806201990031012', 6, 4, 14);
INSERT INTO `tb_pegawai` VALUES (21, 'SARDI, SKM', '196805151989031008', 6, 4, 11);
INSERT INTO `tb_pegawai` VALUES (22, 'SARI TIRTHAWATI', '197101111994032002', 6, 4, 11);
INSERT INTO `tb_pegawai` VALUES (23, 'ABDUL QORIB, SKM, MMKes', '197204041994031005', 6, 2, 5);
INSERT INTO `tb_pegawai` VALUES (24, 'ELLIANY ASMINIARTY, SKM.,M.Kes.', '198002292005012011', 6, 4, 5);
INSERT INTO `tb_pegawai` VALUES (25, 'MUSLIMIN, SKM, M.MKes', '197111031991031002', 6, 2, 10);
INSERT INTO `tb_pegawai` VALUES (26, 'ELISNAWATI', '197107041992022001', 6, 4, 11);
INSERT INTO `tb_pegawai` VALUES (27, 'UMROTUL MAIMUNAH, S.Farm.Apt', '198010052009022008', 6, 4, 12);
INSERT INTO `tb_pegawai` VALUES (28, 'MOCH. YUSUF ZAIN, S.Si, Apt', '197808092006041015', 7, 4, 12);
INSERT INTO `tb_pegawai` VALUES (29, 'ENDANG RAHMAWATI, S.Si.T.,M.M.', '197401121993022002', 7, 4, 15);
INSERT INTO `tb_pegawai` VALUES (30, 'NASIRUDIN KURNIAWAN, SKM', '198007012007011004', 7, 4, 5);
INSERT INTO `tb_pegawai` VALUES (31, 'KUSNIN ARI NURBIYANTO, S.Kep.', '197404151994031005', 8, 4, 15);
INSERT INTO `tb_pegawai` VALUES (32, 'MUHAMAD AL FAROUQ', '197404181998031005', 7, 4, 14);
INSERT INTO `tb_pegawai` VALUES (33, 'SITI ZUMROH, SKM', '198107032009022006', 7, 4, 7);
INSERT INTO `tb_pegawai` VALUES (34, 'PANJI KUMARA ADI TARUNA, SKM', '198611042011011004', 7, 4, 9);
INSERT INTO `tb_pegawai` VALUES (35, 'SENIPAH', '196503221989032007', 8, 4, 13);
INSERT INTO `tb_pegawai` VALUES (36, 'WIDIYANTO', '196601131989031005', 8, 4, 7);
INSERT INTO `tb_pegawai` VALUES (37, 'EMY SRI LESTARI', '196305261991032005', 8, 4, 5);
INSERT INTO `tb_pegawai` VALUES (38, 'MOH ALI WIBOWO, SKM', '197004291995031002', 8, 4, 15);
INSERT INTO `tb_pegawai` VALUES (39, 'MUH KUSNADI, S.KM.', '197201051997031003', 7, 4, 6);
INSERT INTO `tb_pegawai` VALUES (40, 'DONY SUKENDAR, S.Kom', '198305292011011003', 7, 4, 6);
INSERT INTO `tb_pegawai` VALUES (41, 'NUR RAHMAD, SKM', '197009222002121001', 8, 4, 7);
INSERT INTO `tb_pegawai` VALUES (42, 'SARIMAH, S.S.T', '197410032005012006', 7, 4, 14);
INSERT INTO `tb_pegawai` VALUES (43, 'MAHARDIYAN ARDIYANTO, S.Kep.,M.Kes', '198008272005011008', 8, 4, 13);
INSERT INTO `tb_pegawai` VALUES (44, 'WIWID WIDIYATNI, S.GZ.,M.Gizi', '198202182006042006', 7, 4, 11);
INSERT INTO `tb_pegawai` VALUES (45, 'NOR AINI, S.Kep', '197905162008012016', 8, 4, 12);
INSERT INTO `tb_pegawai` VALUES (46, 'WACHITA, S.Kep.,Ns.', '197901172008012011', 8, 4, 6);
INSERT INTO `tb_pegawai` VALUES (47, 'HARINI, Am.Keb', '198310222006042009', 8, 4, 13);
INSERT INTO `tb_pegawai` VALUES (48, 'RINI INDRAWATI, A.Md.Keb', '197508232008012008', 18, 4, 8);
INSERT INTO `tb_pegawai` VALUES (49, 'SITI CHOTIMATUZ ZAROCH, S.E', '197006112007012006', 9, 4, 5);
INSERT INTO `tb_pegawai` VALUES (50, 'IDA LISDIANA, SE', '197004192007012009', 9, 4, 5);
INSERT INTO `tb_pegawai` VALUES (51, 'YUDHI DHARMANSYAH, A.Md', '198304152010011025', 9, 4, 5);
INSERT INTO `tb_pegawai` VALUES (52, 'LILIS ENDAH SETYANINGSIH', '198007192009012001', 9, 4, 6);
INSERT INTO `tb_pegawai` VALUES (53, 'JUNAIDI', '197603212007011013', 11, 4, 6);
INSERT INTO `tb_pegawai` VALUES (54, 'MUDRIKATUN, S.SiT,SKM,MMKes,MH', '196906101990032010', 5, 2, 1);
INSERT INTO `tb_pegawai` VALUES (55, 'EDY SUJATMIKO, S.Sos., M.M., M.H.', '196907171988031001', NULL, NULL, 0);
INSERT INTO `tb_pegawai` VALUES (56, 'NUR FUADIYATI, SKM., M.Epid', '197510082000032006', 7, 2, 17);
INSERT INTO `tb_pegawai` VALUES (57, 'EKO YUDY NOFIANTO, ST', '197711152004011001', 18, 4, 17);
INSERT INTO `tb_pegawai` VALUES (58, 'Drs. ADI BINTORO, MM', '196303261992031002', 5, 2, 3);
INSERT INTO `tb_pegawai` VALUES (59, 'HADI WIBOWO, S.Kep.,Ns.', '197204201998031008', 7, 2, 14);
INSERT INTO `tb_pegawai` VALUES (60, 'MADYO ERI MULYONO, SKM.,M.Kes', '196205021982121002', 5, 2, 7);
INSERT INTO `tb_pegawai` VALUES (61, 'IKHA RAHMAWATI, S.Farm.,Apt.', '198103032005012009', 7, 2, 16);
INSERT INTO `tb_pegawai` VALUES (62, 'ZUMROTUN NIKMAH', '196109041981112001', 18, 4, 16);
INSERT INTO `tb_pegawai` VALUES (63, 'IBNU SULAIMAN, Amd', '197903262002121009', 18, 4, 16);
INSERT INTO `tb_pegawai` VALUES (64, 'DIAN AMALIA LARASWULAN', '197412202004012001', 18, 4, 16);
INSERT INTO `tb_pegawai` VALUES (65, 'LENY ERNAWATI', '198005232006042007', 18, 4, 16);
INSERT INTO `tb_pegawai` VALUES (66, 'NUR EFENDI', '197104111990031001', 18, 4, 16);
INSERT INTO `tb_pegawai` VALUES (67, 'WIDYANINGSIH', '198308052009022006', 18, 4, 16);
INSERT INTO `tb_pegawai` VALUES (68, 'SAGIMIN', '196610051989011004', 18, 4, 16);
INSERT INTO `tb_pegawai` VALUES (69, 'LATIF HARIS TANOTO', '197803092010011001', 18, 4, 16);
INSERT INTO `tb_pegawai` VALUES (70, 'TEGUH SETYO RAHAYU, AM.AK', '197603232006042017', 18, 4, 17);
INSERT INTO `tb_pegawai` VALUES (71, 'MUSAFIK ABDUL ROHMAN, Amd', '197601212010011010', 18, 4, 17);
INSERT INTO `tb_pegawai` VALUES (72, 'WIWIK ARISWATI, Amd', '197603162010012005', 18, 4, 17);
INSERT INTO `tb_pegawai` VALUES (73, 'RINTO ADI WICAKSO, Amd.KL', '198004172010011020', 18, 4, 17);
INSERT INTO `tb_pegawai` VALUES (74, 'LENYTA NUR AINY, Amd', '198306142010012035', 18, 4, 17);
INSERT INTO `tb_pegawai` VALUES (75, 'ASRORI, SKM', '198207012010011021', 18, 4, 17);
INSERT INTO `tb_pegawai` VALUES (76, 'PANGKI ANGGARA', '-', 18, 4, 6);
INSERT INTO `tb_pegawai` VALUES (77, 'ARIEF BUDI PRASETYO, S.Kom', '-', 18, 4, 5);
INSERT INTO `tb_pegawai` VALUES (78, 'FIFIN HERMAWAN, S.Kom', '-', 18, 4, 5);
INSERT INTO `tb_pegawai` VALUES (79, 'GAWAT FARIZ KOMARDIANTO', '-', 18, 4, 15);
INSERT INTO `tb_pegawai` VALUES (80, 'PRIYO TRISNADI, S.Kep, Ns', '-', 18, 4, 13);
INSERT INTO `tb_pegawai` VALUES (81, 'ABDUR ROCHMAN CHUDAIFI, ST', '-', 18, 4, 6);
INSERT INTO `tb_pegawai` VALUES (82, 'DEDY TRIANTONO, AMD.RAD', '-', 18, 4, 10);
INSERT INTO `tb_pegawai` VALUES (83, 'ANISA PRASTIKA MASYITAH, S.Kep, Ns', '-', 18, 4, 15);
INSERT INTO `tb_pegawai` VALUES (84, 'ITSNA AULIA ROSYADI, S.Si', '-', 18, 4, 11);
INSERT INTO `tb_pegawai` VALUES (85, 'RETNO D. WAHYUNINGRUM, SKM', '-', 18, 4, 7);
INSERT INTO `tb_pegawai` VALUES (86, 'NUGROHO PUJI T, S.Kep, Ns', '-', 18, 4, 7);
INSERT INTO `tb_pegawai` VALUES (87, 'M. FAQIH KHAERONI, SE', '-', 18, 4, 5);
INSERT INTO `tb_pegawai` VALUES (88, 'NUR HAMIDAH', '-', 18, 4, 6);
INSERT INTO `tb_pegawai` VALUES (89, 'MELINDA YUSTITIA FAHMA', '-', 18, 4, 14);
INSERT INTO `tb_pegawai` VALUES (90, 'NOR FAIZAH', '-', 18, 4, 11);
INSERT INTO `tb_pegawai` VALUES (91, 'BASKORO ERIANTO, S.Kom', '-', 18, 4, 15);
INSERT INTO `tb_pegawai` VALUES (92, 'AZARIA YENNI AMIRA, SKM', '-', 18, 4, 5);
INSERT INTO `tb_pegawai` VALUES (93, 'NUR RIEZQIYAH A., SKM', '-', 18, 4, 14);
INSERT INTO `tb_pegawai` VALUES (94, 'OSY AISYAH SALEH', '-', 18, 4, 8);
INSERT INTO `tb_pegawai` VALUES (95, 'AUREL TRIFONIA CHRISTY', '-', 18, 4, 5);
INSERT INTO `tb_pegawai` VALUES (96, 'JAYANTI IKA HARDIYANTI', '-', 18, 4, 11);
INSERT INTO `tb_pegawai` VALUES (97, 'LAILIS SAADAH, SKM', '199311132019022003', 9, 4, 7);
INSERT INTO `tb_pegawai` VALUES (98, 'NUR SADIYATUZ Z., S.Tr. Keb', '-', 18, 4, 10);
INSERT INTO `tb_pegawai` VALUES (99, 'DHESY PURWANINGTIAS', '-', 18, 4, 16);
INSERT INTO `tb_pegawai` VALUES (100, 'SUPARADI', '-', 18, 4, 16);
INSERT INTO `tb_pegawai` VALUES (101, 'M. FAIZAL TANJUNG', '-', 18, 4, 16);
INSERT INTO `tb_pegawai` VALUES (102, 'SUHARIYANTO', '-', 18, 4, 16);
INSERT INTO `tb_pegawai` VALUES (103, 'IIS FAELA SOFA', '-', 18, 4, 5);
INSERT INTO `tb_pegawai` VALUES (104, 'NOOR KASAN', '-', 18, 4, 6);
INSERT INTO `tb_pegawai` VALUES (105, 'NABELLA MAHARANI', '-', 18, 4, 7);
INSERT INTO `tb_pegawai` VALUES (106, 'YUNITA SINTAWATI, SKM', '198506042011012007', 7, 4, 8);
INSERT INTO `tb_pegawai` VALUES (107, 'RUKMAWATI, A.Md.KL', '198009152010012020', 9, 4, 14);
INSERT INTO `tb_pegawai` VALUES (108, 'AFIV MUSTAAN', '-', 18, 4, 6);
INSERT INTO `tb_pegawai` VALUES (109, 'NOOR AFIKA ANGRAINI', '-', 18, 4, 7);
INSERT INTO `tb_pegawai` VALUES (110, 'APRILLINA NURNANINGSIH, S.E., M.M', '198004282010012010', 7, 2, 6);
INSERT INTO `tb_pegawai` VALUES (111, 'AHMAD SYAIFUDIN, Amd.Kep', '-', 18, 4, 15);
INSERT INTO `tb_pegawai` VALUES (112, 'ANDY PRATAMA, S.Kep.Ns', '-', 18, 4, 15);
INSERT INTO `tb_pegawai` VALUES (113, 'ARI PURNA NOVITASARI, Amd.Keb', '-', 18, 4, 15);
INSERT INTO `tb_pegawai` VALUES (114, 'DEDDY SETIAJI, S.Kep.Ns', '-', 18, 4, 15);
INSERT INTO `tb_pegawai` VALUES (115, 'DEDY A. KHOIRUDIN, S.Kep.Ns', '-', 18, 4, 15);
INSERT INTO `tb_pegawai` VALUES (116, 'DIDI ARWANDI, S.Kep.Ns', '-', 18, 4, 15);
INSERT INTO `tb_pegawai` VALUES (117, 'MOHAMAD I. UMAM, Amd.Kep', '-', 18, 4, 15);
INSERT INTO `tb_pegawai` VALUES (118, 'ZIGMA YUSA SETYO, Amd.Kep', '-', 18, 4, 15);
INSERT INTO `tb_pegawai` VALUES (119, 'NANINGSIH, S.E', '197808182009012006', 9, 4, 6);
INSERT INTO `tb_pegawai` VALUES (120, 'NULIYA SHINTA, Amd.Keb.', '-', 18, 4, 15);
INSERT INTO `tb_pegawai` VALUES (121, 'ISTI ARIFAH, Amd.Kep.', '-', 18, 4, 15);
INSERT INTO `tb_pegawai` VALUES (122, 'DRAJAT SURYO P.', '-', 18, 4, 0);
INSERT INTO `tb_pegawai` VALUES (123, 'FERA DYAH N.', '-', 18, 4, 0);
INSERT INTO `tb_pegawai` VALUES (124, 'TRY WAHYUNINGSIH, S.ST', '196802221989032005', 18, 4, 11);
INSERT INTO `tb_pegawai` VALUES (125, 'ANDY WAHYU KURNIAWAN, A.Md', '197907092011011005', 18, 4, 6);

-- ----------------------------
-- Table structure for tb_posisi
-- ----------------------------
DROP TABLE IF EXISTS `tb_posisi`;
CREATE TABLE `tb_posisi`  (
  `id_posisi` int(11) NOT NULL AUTO_INCREMENT,
  `posisi` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `level` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_posisi`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 20 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of tb_posisi
-- ----------------------------
INSERT INTO `tb_posisi` VALUES (1, 'Dinas', '-1');
INSERT INTO `tb_posisi` VALUES (2, 'Bidang Pemberantasan Penyakit', '1');
INSERT INTO `tb_posisi` VALUES (3, 'Bidang Kesehatan Masyarakat', '1');
INSERT INTO `tb_posisi` VALUES (4, 'Bidang Yankes dan SDK', '1');
INSERT INTO `tb_posisi` VALUES (5, 'Sub Bagian Renval dan Keuangan', '1');
INSERT INTO `tb_posisi` VALUES (6, 'Sub Bagian Umum dan Kepegawaian', '1');
INSERT INTO `tb_posisi` VALUES (7, 'Seksi P2PM', '2');
INSERT INTO `tb_posisi` VALUES (8, 'Seksi P2PTM', '2');
INSERT INTO `tb_posisi` VALUES (9, 'Seksi Surveilans dan Imunisasi', '2');
INSERT INTO `tb_posisi` VALUES (10, 'Seksi Promosi dan Pemberdayaan Masyarakat', '3');
INSERT INTO `tb_posisi` VALUES (11, 'Seksi Kesga Gizi', '3');
INSERT INTO `tb_posisi` VALUES (12, 'Seksi Farmalkes dan Perbelkes', '4');
INSERT INTO `tb_posisi` VALUES (13, 'Seksi SDMK', '4');
INSERT INTO `tb_posisi` VALUES (14, 'Seksi Kesehatan Lingkungan', '3');
INSERT INTO `tb_posisi` VALUES (15, 'Seksi Pelayanan Kesehatan', '4');
INSERT INTO `tb_posisi` VALUES (16, 'UPT Instalasi Farmasi Kabupaten', '1');
INSERT INTO `tb_posisi` VALUES (17, 'UPT Laboratorium Kesehatan', '1');
INSERT INTO `tb_posisi` VALUES (18, 'Kepala Dinas', '0');
INSERT INTO `tb_posisi` VALUES (19, 'Sekretaris Dinas', '0');

-- ----------------------------
-- Table structure for tb_rekening
-- ----------------------------
DROP TABLE IF EXISTS `tb_rekening`;
CREATE TABLE `tb_rekening`  (
  `id_rekening` int(11) NOT NULL AUTO_INCREMENT,
  `kode_rekening` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `uraian_rekening` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_rekening`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 327 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of tb_rekening
-- ----------------------------
INSERT INTO `tb_rekening` VALUES (1, '51201001', 'Belanja Bahan Bangunan dan Konstruksi');
INSERT INTO `tb_rekening` VALUES (2, '51201002', 'Belanja Bahan Kimia');
INSERT INTO `tb_rekening` VALUES (3, '51201003', 'Belanja Bahan Peledak');
INSERT INTO `tb_rekening` VALUES (4, '51201004', 'Belanja Bahan Bakar dan Pelumas');
INSERT INTO `tb_rekening` VALUES (5, '51201005', 'Belanja Bahan Baku');
INSERT INTO `tb_rekening` VALUES (6, '51201006', 'Belanja Bahan Kimia Nuklir');
INSERT INTO `tb_rekening` VALUES (7, '51201007', 'Belanja Barang Dalam Proses');
INSERT INTO `tb_rekening` VALUES (8, '51201008', 'Belanja Bahan/Bibit Tanaman');
INSERT INTO `tb_rekening` VALUES (9, '51201009', 'Belanja Isi Tabung Pemadam Kebakaran');
INSERT INTO `tb_rekening` VALUES (10, '51201010', 'Belanja Isi Tabung Gas');
INSERT INTO `tb_rekening` VALUES (11, '51201011', 'Belanja Bahan/Bibit Ternak/Bibit Ikan');
INSERT INTO `tb_rekening` VALUES (12, '51201012', 'Belanja Bahan Lainnya');
INSERT INTO `tb_rekening` VALUES (13, '51202001', 'Belanja Suku Cadang Alat Angkutan');
INSERT INTO `tb_rekening` VALUES (14, '51202002', 'Belanja Suku Cadang Alat Besar');
INSERT INTO `tb_rekening` VALUES (15, '51202003', 'Belanja Suku Cadang Alat Kedokteran');
INSERT INTO `tb_rekening` VALUES (16, '51202004', 'Belanja Suku Cadang Alat Laboratorium');
INSERT INTO `tb_rekening` VALUES (17, '51202005', 'Belanja Suku Cadang Alat Pemancar');
INSERT INTO `tb_rekening` VALUES (18, '51202006', 'Belanja Suku Cadang Alat Studio dan Komunikasi');
INSERT INTO `tb_rekening` VALUES (19, '51202007', 'Belanja Suku Cadang Alat Pertanian');
INSERT INTO `tb_rekening` VALUES (20, '51202008', 'Belanja Suku Cadang Alat Bengkel');
INSERT INTO `tb_rekening` VALUES (21, '51202009', 'Belanja Suku Cadang Alat Persenjataan');
INSERT INTO `tb_rekening` VALUES (22, '51202010', 'Belanja Suku Cadang Lainnya');
INSERT INTO `tb_rekening` VALUES (23, '51203001', 'Belanja Alat Tulis Kantor');
INSERT INTO `tb_rekening` VALUES (24, '51203002', 'Belanja Kertas dan Cover');
INSERT INTO `tb_rekening` VALUES (25, '51203003', 'Belanja Bahan Cetak');
INSERT INTO `tb_rekening` VALUES (26, '51203004', 'Belanja Benda Pos');
INSERT INTO `tb_rekening` VALUES (27, '51203005', 'Belanja Persediaan Dokumen/Administrasi Tender');
INSERT INTO `tb_rekening` VALUES (28, '51203006', 'Belanja Bahan Komputer');
INSERT INTO `tb_rekening` VALUES (29, '51203007', 'Belanja Perabot Kantor');
INSERT INTO `tb_rekening` VALUES (30, '51203008', 'Belanja Alat Listrik');
INSERT INTO `tb_rekening` VALUES (31, '51203009', 'Belanja Perlengkapan Dinas');
INSERT INTO `tb_rekening` VALUES (32, '51203010', 'Belanja Perlengkapan perorangan lapangan (KAPORLAP) dan Perlengkapan Satwa');
INSERT INTO `tb_rekening` VALUES (33, '51203011', 'Belanja Perlengkapan Pendukung Olahraga');
INSERT INTO `tb_rekening` VALUES (34, '51203012', 'Belanja Souvenir/Cinderamata');
INSERT INTO `tb_rekening` VALUES (35, '51203013', 'Belanja Alat/Bahan Untuk Kegiatan Kantor Lainnya');
INSERT INTO `tb_rekening` VALUES (36, '51204001', 'Belanja Obat');
INSERT INTO `tb_rekening` VALUES (37, '51204002', 'Belanja Obat-obatan Lainnya');
INSERT INTO `tb_rekening` VALUES (38, '51205001', 'Belanja Barang Yang Akan Diserahkan Kepada Masyarakat');
INSERT INTO `tb_rekening` VALUES (39, '51205002', 'Belanja Barang Yang Akan Diserahkan Kepada Pihak Ketiga');
INSERT INTO `tb_rekening` VALUES (40, '51206001', 'Belanja Barang Untuk Dijual kepada Masyarakat/Pihak Ketiga');
INSERT INTO `tb_rekening` VALUES (41, '51207001', 'Belanja barang cadangan energi');
INSERT INTO `tb_rekening` VALUES (42, '51207002', 'Belanja barang cadangan pangan');
INSERT INTO `tb_rekening` VALUES (43, '51208001', 'Belanja Natura (makanan/sembako, minuman dst)');
INSERT INTO `tb_rekening` VALUES (44, '51208002', 'Belanja Pakan (pakan hewan, pakan ikan dst)');
INSERT INTO `tb_rekening` VALUES (45, '51208003', 'Belanja Natura dan Pakan Lainnya');
INSERT INTO `tb_rekening` VALUES (46, '51209001', 'Belanja Barang Untuk Penelitian Biologi');
INSERT INTO `tb_rekening` VALUES (47, '51209002', 'Belanja Barang Untuk Penelitian Biologi Lainnya');
INSERT INTO `tb_rekening` VALUES (48, '51209003', 'Belanja Barang Untuk Penelitian Teknologi');
INSERT INTO `tb_rekening` VALUES (49, '51209004', 'Belanja Barang Untuk Penelitian Lainnya');
INSERT INTO `tb_rekening` VALUES (50, '51210001', 'Belanja Barang Untuk Proses Produksi');
INSERT INTO `tb_rekening` VALUES (51, '51210002', 'Belanja Barang Untuk Proses Produksi Lainnya');
INSERT INTO `tb_rekening` VALUES (52, '51211001', 'Belanja telepon');
INSERT INTO `tb_rekening` VALUES (53, '51211002', 'Belanja air');
INSERT INTO `tb_rekening` VALUES (54, '51211003', 'Belanja listrik');
INSERT INTO `tb_rekening` VALUES (55, '51211004', 'Belanja Jasa pengumuman lelang');
INSERT INTO `tb_rekening` VALUES (56, '51211005', 'Belanja surat kabar/majalah');
INSERT INTO `tb_rekening` VALUES (57, '51211006', 'Belanja jasa internet (sewa hosting dan broadband)');
INSERT INTO `tb_rekening` VALUES (58, '51211007', 'Belanja paket/pengiriman');
INSERT INTO `tb_rekening` VALUES (59, '51211008', 'Belanja Sertifikasi');
INSERT INTO `tb_rekening` VALUES (60, '51211009', 'Belanja Jasa Transaksi Keuangan');
INSERT INTO `tb_rekening` VALUES (61, '51211010', 'Belanja Jasa Penerangan Jalan Umum');
INSERT INTO `tb_rekening` VALUES (62, '51211011', 'Belanja Dokumentasi dan Publikasi');
INSERT INTO `tb_rekening` VALUES (63, '51211012', 'Belanja Jasa Pemeriksaan Kesehatan');
INSERT INTO `tb_rekening` VALUES (64, '51212001', 'Belanja Jasa Event Organizer');
INSERT INTO `tb_rekening` VALUES (65, '51212002', 'Belanja Jasa Pemusnahan');
INSERT INTO `tb_rekening` VALUES (66, '51212003', 'Belanja Jasa Pihak Ketiga Lainnya');
INSERT INTO `tb_rekening` VALUES (67, '51213001', 'Belanja Jasa Konsultansi Penelitian');
INSERT INTO `tb_rekening` VALUES (68, '51213002', 'Belanja Jasa Konsultansi Perencanaan');
INSERT INTO `tb_rekening` VALUES (69, '51213003', 'Belanja Jasa Konsultansi Pengawasan');
INSERT INTO `tb_rekening` VALUES (70, '51213004', 'Belanja Jasa Konsultansi Lainnya');
INSERT INTO `tb_rekening` VALUES (71, '51214001', 'Belanja Premi Asuransi Kesehatan');
INSERT INTO `tb_rekening` VALUES (72, '51214002', 'Belanja Premi Asuransi Ketenagakerjaan');
INSERT INTO `tb_rekening` VALUES (73, '51214003', 'Belanja Premi Asuransi Barang Milik Daerah');
INSERT INTO `tb_rekening` VALUES (74, '51215001', 'Belanja Jasa Servis');
INSERT INTO `tb_rekening` VALUES (75, '51215002', 'Belanja Penggantian Suku Cadang');
INSERT INTO `tb_rekening` VALUES (76, '51215003', 'Belanja Bahan Bakar Minyak/Gas dan Pelumas');
INSERT INTO `tb_rekening` VALUES (77, '51215004', 'Belanja Jasa KIR, PKB, BBNKB dan STNK');
INSERT INTO `tb_rekening` VALUES (78, '51216001', 'Belanja Cetak');
INSERT INTO `tb_rekening` VALUES (79, '51216002', 'Belanja Penggandaan/fotokopi');
INSERT INTO `tb_rekening` VALUES (80, '51217001', 'Belanja sewa rumah jabatan/rumah dinas/gedung/kantor/tempat/ruang pertemuan');
INSERT INTO `tb_rekening` VALUES (81, '51217002', 'Belanja sewa Sarana Mobilitas Darat/Air/Udara');
INSERT INTO `tb_rekening` VALUES (82, '51217003', 'Belanja Sewa Alat Berat');
INSERT INTO `tb_rekening` VALUES (83, '51217004', 'Belanja Sewa Perlengkapan dan Peralatan');
INSERT INTO `tb_rekening` VALUES (84, '51217005', 'Belanja Sewa Lainnya');
INSERT INTO `tb_rekening` VALUES (85, '51218001', 'Belanja perjalanan dinas dalam daerah');
INSERT INTO `tb_rekening` VALUES (86, '51218002', 'Belanja perjalanan dinas luar daerah');
INSERT INTO `tb_rekening` VALUES (87, '51218003', 'Belanja perjalanan dinas luar negeri');
INSERT INTO `tb_rekening` VALUES (88, '51219001', 'Belanja pemulangan pegawai yang wafat dalam tugas');
INSERT INTO `tb_rekening` VALUES (89, '51220001', 'Belanja Pemeliharan Tanah');
INSERT INTO `tb_rekening` VALUES (90, '51220002', 'Belanja Pemeliharan Peralatan dan Mesin');
INSERT INTO `tb_rekening` VALUES (91, '51220003', 'Belanja Pemeliharan Gedung dan Bangunan');
INSERT INTO `tb_rekening` VALUES (92, '51220004', 'Belanja Pemeliharan Jalan, Irigasi, dan Jaringan');
INSERT INTO `tb_rekening` VALUES (93, '51220005', 'Belanja Pemeliharan Aset Tetap Lainnya');
INSERT INTO `tb_rekening` VALUES (94, '51220006', 'Belanja Pemeliharan Aset Lainnya');
INSERT INTO `tb_rekening` VALUES (95, '51221001', 'Belanja Tugas Belajar D3');
INSERT INTO `tb_rekening` VALUES (96, '51221002', 'Belanja Tugas Belajar S1');
INSERT INTO `tb_rekening` VALUES (97, '51221003', 'Belanja Tugas Belajar S2');
INSERT INTO `tb_rekening` VALUES (98, '51221004', 'Belanja Tugas Belajar S3');
INSERT INTO `tb_rekening` VALUES (99, '51222001', 'Belanja kursus-kursus singkat/pelatihan');
INSERT INTO `tb_rekening` VALUES (100, '51222002', 'Belanja sosialisasi');
INSERT INTO `tb_rekening` VALUES (101, '51222003', 'Belanja bimbingan teknis');
INSERT INTO `tb_rekening` VALUES (102, '51223001', 'Belanja Tenaga Ahli PNS');
INSERT INTO `tb_rekening` VALUES (103, '51223002', 'Belanja Narasumber PNS');
INSERT INTO `tb_rekening` VALUES (104, '51223003', 'Belanja Instruktur PNS');
INSERT INTO `tb_rekening` VALUES (105, '51223004', 'Belanja Moderator PNS');
INSERT INTO `tb_rekening` VALUES (106, '51223005', 'Belanja Jasa Tenaga Medis/ Paramedis PNS');
INSERT INTO `tb_rekening` VALUES (107, '51223006', 'Belanja Jasa PNS Lainnya');
INSERT INTO `tb_rekening` VALUES (108, '51224001', 'Belanja Tenaga Ahli Non PNS');
INSERT INTO `tb_rekening` VALUES (109, '51224002', 'Belanja Narasumber Non PNS');
INSERT INTO `tb_rekening` VALUES (110, '51224003', 'Belanja Instruktur Non PNS');
INSERT INTO `tb_rekening` VALUES (111, '51224004', 'Belanja Moderator Non PNS');
INSERT INTO `tb_rekening` VALUES (112, '51224005', 'Belanja Jasa Tenaga Medis/ Paramedis Non PNS');
INSERT INTO `tb_rekening` VALUES (113, '51224006', 'Belanja Jasa Non PNS Lainnya');
INSERT INTO `tb_rekening` VALUES (114, '51225001', 'Uang untuk hadiah');
INSERT INTO `tb_rekening` VALUES (115, '51225002', 'Uang untuk penghargaan');
INSERT INTO `tb_rekening` VALUES (116, '51226001', 'Uang untuk penanganan dampak sosial kemasyarakatan kepada Pihak Ketiga');
INSERT INTO `tb_rekening` VALUES (117, '51226002', 'Uang untuk penanganan dampak sosial kemasyarakatan kepada Masyarakat');
INSERT INTO `tb_rekening` VALUES (118, '51227001', 'Belanja Penginapan Tamu Pemerintah Daerah');
INSERT INTO `tb_rekening` VALUES (119, '51228001', 'Belanja Jaminan Kesehatan Daerah (Jamkesda)');
INSERT INTO `tb_rekening` VALUES (120, '51229001', 'Belanja Barang dan Jasa BLUD');
INSERT INTO `tb_rekening` VALUES (121, '51230001', 'Belanja Barang dan Jasa BOS');
INSERT INTO `tb_rekening` VALUES (122, '51231001', 'Belanja Kontribusi APKASI');
INSERT INTO `tb_rekening` VALUES (123, '51301001', 'Belanja Bunga Utang Pinjaman kepada Pemerintah');
INSERT INTO `tb_rekening` VALUES (124, '51301002', 'Belanja Bunga Utang Pinjaman kepada Pemerintah Daerah Lainnya');
INSERT INTO `tb_rekening` VALUES (125, '51301003', 'Belanja Bunga Utang Pinjaman kepada Lembaga Keuangan Bank');
INSERT INTO `tb_rekening` VALUES (126, '51301004', 'Belanja Bunga Utang Pinjaman kepada Lembaga Keuangan Bukan Bank');
INSERT INTO `tb_rekening` VALUES (127, '51302001', 'Belanja Bunga Utang Obligasi');
INSERT INTO `tb_rekening` VALUES (128, '51303001', 'Belanja Bunga Utang BLUD');
INSERT INTO `tb_rekening` VALUES (129, '51401001', 'Belanja Subsidi kepada BUMN');
INSERT INTO `tb_rekening` VALUES (130, '51401002', 'Belanja Subsidi kepada BUMD');
INSERT INTO `tb_rekening` VALUES (131, '51401003', 'Belanja Subsidi kepada Badan Usaha Milik Swasta');
INSERT INTO `tb_rekening` VALUES (132, '51501001', 'Belanja Hibah Uang kepada Pemerintah Pusat');
INSERT INTO `tb_rekening` VALUES (133, '51501002', 'Belanja Hibah Uang kepada Pemerintah Pusat di Daerah (Instansi Vertikal)');
INSERT INTO `tb_rekening` VALUES (134, '51502001', 'Belanja Hibah Uang kepada Pemerintah Daerah lainnya');
INSERT INTO `tb_rekening` VALUES (135, '51503001', 'Belanja Hibah Uang kepada BUMN');
INSERT INTO `tb_rekening` VALUES (136, '51503002', 'Belanja Hibah Uang kepada BUMD');
INSERT INTO `tb_rekening` VALUES (137, '51504001', 'Belanja Hibah Uang kepada Badan/Lembaga');
INSERT INTO `tb_rekening` VALUES (138, '51504002', 'Belanja Hibah Uang kepada Organisasi Kemasyarakatan');
INSERT INTO `tb_rekening` VALUES (139, '51505001', 'Belanja Hibah Barang kepada Pemerintah Pusat');
INSERT INTO `tb_rekening` VALUES (140, '51505002', 'Belanja Hibah Barang kepada Pemerintah Pusat di Daerah (Instansi Vertikal)');
INSERT INTO `tb_rekening` VALUES (141, '51506001', 'Belanja Hibah Barang kepada Pemerintah Daerah');
INSERT INTO `tb_rekening` VALUES (142, '51507001', 'Belanja Hibah Barang kepada BUMN');
INSERT INTO `tb_rekening` VALUES (143, '51507002', 'Belanja Hibah Barang kepada BUMD');
INSERT INTO `tb_rekening` VALUES (144, '51508001', 'Belanja Hibah Barang kepada Badan/Lembaga');
INSERT INTO `tb_rekening` VALUES (145, '51508002', 'Belanja Hibah Barang kepada Organisasi Kemasyarakatan');
INSERT INTO `tb_rekening` VALUES (146, '51509001', 'Bantuan Keuangan kepada Partai Amanat Nasional (PAN)');
INSERT INTO `tb_rekening` VALUES (147, '51509002', 'Bantuan Keuangan kepada Partai Berkarya');
INSERT INTO `tb_rekening` VALUES (148, '51509003', 'Bantuan Keuangan kepada Partai Demokrasi Indonesia Perjuangan (PDI-Perjuangan)');
INSERT INTO `tb_rekening` VALUES (149, '51509004', 'Bantuan Keuangan kepada Partai Demokrat (PD)');
INSERT INTO `tb_rekening` VALUES (150, '51509005', 'Bantuan Keuangan kepada Partai Gerakan Indonesia Raya (GERINDRA)');
INSERT INTO `tb_rekening` VALUES (151, '51509006', 'Bantuan Keuangan kepada Partai Golongan Karya (GOLKAR)');
INSERT INTO `tb_rekening` VALUES (152, '51509007', 'Bantuan Keuangan kepada Partai Hati Nurani Rakyat (HANURA)');
INSERT INTO `tb_rekening` VALUES (153, '51509008', 'Bantuan Keuangan kepada Partai Keadilan Sejahtera (PKS)');
INSERT INTO `tb_rekening` VALUES (154, '51509009', 'Bantuan Keuangan kepada Partai Kebangkitan Bangsa (PKB)');
INSERT INTO `tb_rekening` VALUES (155, '51509010', 'Bantuan Keuangan kepada Partai Nasional Demokrat (NASDEM)');
INSERT INTO `tb_rekening` VALUES (156, '51509011', 'Bantuan Keuangan kepada Partai Persatuan Indonesia (PERINDO)');
INSERT INTO `tb_rekening` VALUES (157, '51509012', 'Bantuan Keuangan kepada Partai Persatuan Pembangunan (PPP)');
INSERT INTO `tb_rekening` VALUES (158, '51601001', 'Belanja Bantuan Sosial Uang kepada Individu');
INSERT INTO `tb_rekening` VALUES (159, '51601002', 'Belanja Bantuan Sosial Uang kepada Keluarga');
INSERT INTO `tb_rekening` VALUES (160, '51601003', 'Belanja Bantuan Sosial Uang kepada Kelompok');
INSERT INTO `tb_rekening` VALUES (161, '51601004', 'Belanja Bantuan Sosial Uang kepada Masyarakat');
INSERT INTO `tb_rekening` VALUES (162, '51602001', 'Belanja Bantuan Sosial Barang kepada Individu');
INSERT INTO `tb_rekening` VALUES (163, '51602002', 'Belanja Bantuan Sosial Barang kepada Keluarga');
INSERT INTO `tb_rekening` VALUES (164, '51602003', 'Belanja Bantuan Sosial Barang kepada Kelompok');
INSERT INTO `tb_rekening` VALUES (165, '51602004', 'Belanja Bantuan Sosial Barang kepada Masyarakat');
INSERT INTO `tb_rekening` VALUES (166, '52101001', 'Belanja Modal Tanah Bangunan Perumahan/G. Tempat Tinggal');
INSERT INTO `tb_rekening` VALUES (167, '52101002', 'Belanja Modal Tanah Untuk Bangunan Ged.Perdagangan/Perusahaan');
INSERT INTO `tb_rekening` VALUES (168, '52101003', 'Belanja Modal Tanah Untuk Bangunan Industri');
INSERT INTO `tb_rekening` VALUES (169, '52101004', 'Belanja Modal Tanah Untuk Bangunan Tempat Kerja');
INSERT INTO `tb_rekening` VALUES (170, '52101005', 'Belanja Modal Tanah Untuk Bangunan Gedung Sarana Olah Raga');
INSERT INTO `tb_rekening` VALUES (171, '52101006', 'Belanja Modal Tanah Untuk Bangunan Tempat Ibadah');
INSERT INTO `tb_rekening` VALUES (172, '52101007', 'Belanja Modal Tanah Persil Lainnya');
INSERT INTO `tb_rekening` VALUES (173, '52102001', 'Belanja Modal Tanah Basah');
INSERT INTO `tb_rekening` VALUES (174, '52102002', 'Belanja Modal Tanah Kering');
INSERT INTO `tb_rekening` VALUES (175, '52102003', 'Belanja Modal Tanah Perkebunan');
INSERT INTO `tb_rekening` VALUES (176, '52102004', 'Belanja Modal Tanah Hutan');
INSERT INTO `tb_rekening` VALUES (177, '52102005', 'Belanja Modal Tanah Tandus');
INSERT INTO `tb_rekening` VALUES (178, '52102006', 'Belanja Modal Tanah Padang Alang-alang/Rumput');
INSERT INTO `tb_rekening` VALUES (179, '52102007', 'Belanja Modal Tanah Pertanian');
INSERT INTO `tb_rekening` VALUES (180, '52102008', 'Belanja Modal Tanah Pertambangan');
INSERT INTO `tb_rekening` VALUES (181, '52102009', 'Belanja Modal Tanah Non Persil Lainnya');
INSERT INTO `tb_rekening` VALUES (182, '52103001', 'Belanja Modal Pengadaan Tanah Rawa');
INSERT INTO `tb_rekening` VALUES (183, '52103002', 'Belanja Modal Tanah Lapangan Olah Raga');
INSERT INTO `tb_rekening` VALUES (184, '52103003', 'Belanja Modal Tanah Lapangan Parkir');
INSERT INTO `tb_rekening` VALUES (185, '52103004', 'Belanja Modal Tanah Lapangan Penimbunan Barang');
INSERT INTO `tb_rekening` VALUES (186, '52103005', 'Belanja Modal Tanah Lapangan Pemancar dan Studio Alam');
INSERT INTO `tb_rekening` VALUES (187, '52103006', 'Belanja Modal Tanah Lapangan Pengujian/Pengolahan');
INSERT INTO `tb_rekening` VALUES (188, '52103007', 'Belanja Modal Tanah Lapangan Terbang');
INSERT INTO `tb_rekening` VALUES (189, '52103008', 'Belanja Modal Tanah Untuk Jalan');
INSERT INTO `tb_rekening` VALUES (190, '52103009', 'Belanja Modal Tanah Untuk Bangunan Air');
INSERT INTO `tb_rekening` VALUES (191, '52103010', 'Belanja Modal Tanah Untuk Bangunan Instalasi');
INSERT INTO `tb_rekening` VALUES (192, '52103011', 'Belanja Modal Tanah Untuk Bangunan Jaringan');
INSERT INTO `tb_rekening` VALUES (193, '52103012', 'Belanja Modal Tanah Untuk Bangunan Bersejarah');
INSERT INTO `tb_rekening` VALUES (194, '52103013', 'Belanja Modal Tanah Untuk Makam');
INSERT INTO `tb_rekening` VALUES (195, '52103014', 'Belanja Modal Tanah Untuk Taman');
INSERT INTO `tb_rekening` VALUES (196, '52103015', 'Belanja Modal Tanah Untuk Latihan');
INSERT INTO `tb_rekening` VALUES (197, '52103016', 'Belanja Modal Tanah Daerah Pertahanan');
INSERT INTO `tb_rekening` VALUES (198, '52103017', 'Belanja Modal Tanah Lapangan PBB');
INSERT INTO `tb_rekening` VALUES (199, '52103018', 'Belanja Modal Tanah Kampung');
INSERT INTO `tb_rekening` VALUES (200, '52103019', 'Belanja Modal Emplasment');
INSERT INTO `tb_rekening` VALUES (201, '52103020', 'Belanja Modal Lapangan Lainnya');
INSERT INTO `tb_rekening` VALUES (202, '52104001', 'Belanja Modal Tanah BLUD');
INSERT INTO `tb_rekening` VALUES (203, '52105001', 'Belanja Modal Tanah BOS');
INSERT INTO `tb_rekening` VALUES (204, '52201001', 'Belanja modal Peralatan dan Mesin Alat Besar Darat');
INSERT INTO `tb_rekening` VALUES (205, '52201002', 'Belanja modal Peralatan dan Mesin Alat Besar Apung');
INSERT INTO `tb_rekening` VALUES (206, '52201003', 'Belanja modal Peralatan dan Mesin Alat Bantu');
INSERT INTO `tb_rekening` VALUES (207, '52202001', 'Belanja modal Peralatan dan Mesin Alat Angkutan Darat Bermotor');
INSERT INTO `tb_rekening` VALUES (208, '52202002', 'Belanja modal Peralatan dan Mesin Alat Angkutan Darat Tak Bermotor');
INSERT INTO `tb_rekening` VALUES (209, '52202003', 'Belanja modal Peralatan dan Mesin Alat Angkutan Apung Bermotor');
INSERT INTO `tb_rekening` VALUES (210, '52202004', 'Belanja modal Peralatan dan Mesin Alat Angkutan Apung Tak Bermotor');
INSERT INTO `tb_rekening` VALUES (211, '52202005', 'Belanja modal Peralatan dan Mesin Alat Angkutan Udara Bermotor');
INSERT INTO `tb_rekening` VALUES (212, '52202006', 'Belanja modal Peralatan dan Mesin Alat Angkutan Udara Tak Bermotor');
INSERT INTO `tb_rekening` VALUES (213, '52203001', 'Belanja Modal Alat Bengkel Bermesin');
INSERT INTO `tb_rekening` VALUES (214, '52203002', 'Belanja Modal Alat Bengkel Tak Bermesin');
INSERT INTO `tb_rekening` VALUES (215, '52203003', 'Belanja Modal alat ukur');
INSERT INTO `tb_rekening` VALUES (216, '52204001', 'Belanja Modal alat pengolahan tanah dan tanaman');
INSERT INTO `tb_rekening` VALUES (217, '52204002', 'Belanja Modal alat pemeliharaan tanaman/ikan/ternak');
INSERT INTO `tb_rekening` VALUES (218, '52204003', 'Belanja Modal alat panen');
INSERT INTO `tb_rekening` VALUES (219, '52204004', 'Belanja Modal alat penyimpan hasil percobaan pertanian');
INSERT INTO `tb_rekening` VALUES (220, '52204005', 'Belanja Modal alat laboratorium pertanian');
INSERT INTO `tb_rekening` VALUES (221, '52204006', 'Belanja Modal alat prosesing');
INSERT INTO `tb_rekening` VALUES (222, '52204007', 'Belanja Modal alat pasca panen');
INSERT INTO `tb_rekening` VALUES (223, '52204008', 'Belanja Modal alat produksi perikanan');
INSERT INTO `tb_rekening` VALUES (224, '52204009', 'Belanja Modal alat-alat peternakan');
INSERT INTO `tb_rekening` VALUES (225, '52204010', 'Belanja Modal alat pengolahan lainnya');
INSERT INTO `tb_rekening` VALUES (226, '52205001', 'Belanja Modal Alat Kantor');
INSERT INTO `tb_rekening` VALUES (227, '52205002', 'Belanja Modal Alat Rumah Tangga');
INSERT INTO `tb_rekening` VALUES (228, '52206001', 'Belanja Modal Alat Studio');
INSERT INTO `tb_rekening` VALUES (229, '52206002', 'Belanja Modal Alat Komunikasi');
INSERT INTO `tb_rekening` VALUES (230, '52206003', 'Belanja Modal Alat Pemancar');
INSERT INTO `tb_rekening` VALUES (231, '52206004', 'Belanja Modal Peralatan Komunikasi Navigasi');
INSERT INTO `tb_rekening` VALUES (232, '52207001', 'Belanja Modal Alat Kedokteran');
INSERT INTO `tb_rekening` VALUES (233, '52207002', 'Belanja Modal Alat Kesehatan Umum');
INSERT INTO `tb_rekening` VALUES (234, '52208001', 'Belanja Modal Unit Alat Laboratorium');
INSERT INTO `tb_rekening` VALUES (235, '52208002', 'Belanja Modal Unit Alat Laboratorium Kimia Nuklir');
INSERT INTO `tb_rekening` VALUES (236, '52208003', 'Belanja Modal Alat Peraga Sekolah');
INSERT INTO `tb_rekening` VALUES (237, '52208004', 'Belanja Modal Alat Laboratorium Fisika Nuklir/Elektronika');
INSERT INTO `tb_rekening` VALUES (238, '52208005', 'Belanja Modal Alat Proteksi Radiasi/Proteksi Lingkungan');
INSERT INTO `tb_rekening` VALUES (239, '52208006', 'Belanja Modal Raditation Application and Non Destructif Testing Laboratory Lainnya');
INSERT INTO `tb_rekening` VALUES (240, '52208007', 'Belanja Modal Alat Laboratorium Lingkungan Hidup');
INSERT INTO `tb_rekening` VALUES (241, '52208008', 'Belanja Modal Peralatan Laboratorium Hydrodinamica');
INSERT INTO `tb_rekening` VALUES (242, '52208009', 'Belanja Modal Alat Laboratorium Standarisasi Kalibrasi dan Instrumentasi');
INSERT INTO `tb_rekening` VALUES (243, '52209001', 'Belanja Modal Senjata Api');
INSERT INTO `tb_rekening` VALUES (244, '52209002', 'Belanja Modal Persenjataan Non Senjata Api');
INSERT INTO `tb_rekening` VALUES (245, '52209003', 'Belanja Modal Senjata Sinar');
INSERT INTO `tb_rekening` VALUES (246, '52210001', 'Belanja Modal Komputer Unit');
INSERT INTO `tb_rekening` VALUES (247, '52210002', 'Belanja Modal Peralatan Komputer');
INSERT INTO `tb_rekening` VALUES (248, '52211001', 'Belanja Modal Alat Eksplorasi Topografi');
INSERT INTO `tb_rekening` VALUES (249, '52211002', 'Belanja Modal Alat Eksplorasi Geofisika');
INSERT INTO `tb_rekening` VALUES (250, '52212001', 'Belanja Modal Alat Pengeboran Mesin');
INSERT INTO `tb_rekening` VALUES (251, '52212002', 'Belanja Modal Alat Pengeboran Non Mesin');
INSERT INTO `tb_rekening` VALUES (252, '52213001', 'Belanja Modal Alat Sumur');
INSERT INTO `tb_rekening` VALUES (253, '52213002', 'Belanja Modal Alat Produksi');
INSERT INTO `tb_rekening` VALUES (254, '52213003', 'Belanja Modal Alat Pengolahan dan Pemurnian');
INSERT INTO `tb_rekening` VALUES (255, '52214001', 'Belanja Modal Alat Deteksi');
INSERT INTO `tb_rekening` VALUES (256, '52214002', 'Belanja Modal Alat Pelindung');
INSERT INTO `tb_rekening` VALUES (257, '52214003', 'Belanja Modal Alat SAR');
INSERT INTO `tb_rekening` VALUES (258, '52214004', 'Belanja Modal Alat Kerja Penerbangan');
INSERT INTO `tb_rekening` VALUES (259, '52215001', 'Belanja Modal Alat Peraga Pelatihan dan Percontohan');
INSERT INTO `tb_rekening` VALUES (260, '52216001', 'Belanja Modal Unit Peralatan Proses/Produksi');
INSERT INTO `tb_rekening` VALUES (261, '52217001', 'Belanja Modal Rambu-Rambu Lalu lintas Darat');
INSERT INTO `tb_rekening` VALUES (262, '52217002', 'Belanja Modal Rambu-Rambu Lalu lintas Udara');
INSERT INTO `tb_rekening` VALUES (263, '52217003', 'Belanja Modal Rambu-Rambu Lalu lintas Air');
INSERT INTO `tb_rekening` VALUES (264, '52218001', 'Belanja Modal Peralatan Olah Raga');
INSERT INTO `tb_rekening` VALUES (265, '52219001', 'Belanja Modal Peralatan dan Mesin BLUD');
INSERT INTO `tb_rekening` VALUES (266, '52220001', 'Belanja Modal Peralatan dan Mesin BOS');
INSERT INTO `tb_rekening` VALUES (267, '52301001', 'Belanja modal Bangunan Gedung Tempat Kerja');
INSERT INTO `tb_rekening` VALUES (268, '52301002', 'Belanja modal Bangunan Gedung Tempat Tinggal');
INSERT INTO `tb_rekening` VALUES (269, '52302001', 'Belanja modal Candi');
INSERT INTO `tb_rekening` VALUES (270, '52302002', 'Belanja modal Tugu Peringatan');
INSERT INTO `tb_rekening` VALUES (271, '52302003', 'Belanja modal Prasasti');
INSERT INTO `tb_rekening` VALUES (272, '52302004', 'Belanja modal Monumen Lainnya');
INSERT INTO `tb_rekening` VALUES (273, '52303001', 'Belanja modal Bangunan Menara');
INSERT INTO `tb_rekening` VALUES (274, '52304001', 'Belanja modal Tugu/Tanda Batas');
INSERT INTO `tb_rekening` VALUES (275, '52401001', 'Belanja modal Jalan');
INSERT INTO `tb_rekening` VALUES (276, '52401002', 'Belanja modal Jembatan');
INSERT INTO `tb_rekening` VALUES (277, '52402001', 'Belanja modal Bangunan Air Irigasi');
INSERT INTO `tb_rekening` VALUES (278, '52402002', 'Belanja modal Bangunan Air Pasang Surut');
INSERT INTO `tb_rekening` VALUES (279, '52402003', 'Belanja modal Bangunan Pengembangan Rawa dan Polder');
INSERT INTO `tb_rekening` VALUES (280, '52402004', 'Belanja modal Bangunan Pengaman Sungai/Pantai dan Penganggulangan Bencana Alam');
INSERT INTO `tb_rekening` VALUES (281, '52402005', 'Belanja modal Bangunan Pengembangan Sumber Air dan Air Tanah');
INSERT INTO `tb_rekening` VALUES (282, '52402006', 'Belanja modal Bangunan Air Bersih/Air Baku');
INSERT INTO `tb_rekening` VALUES (283, '52402007', 'Belanja modal Bangunan Air Kotor');
INSERT INTO `tb_rekening` VALUES (284, '52403001', 'Belanja modal Instalasi Air Bersih/Air Baku');
INSERT INTO `tb_rekening` VALUES (285, '52403002', 'Belanja modal Instalasi Air Kotor');
INSERT INTO `tb_rekening` VALUES (286, '52403003', 'Belanja modal Instalasi Pengolahan Sampah');
INSERT INTO `tb_rekening` VALUES (287, '52403004', 'Belanja modal Instalasi Pengolahan Bahan Bangunan');
INSERT INTO `tb_rekening` VALUES (288, '52403005', 'Belanja modal Instalasi Pembangkit Listrik');
INSERT INTO `tb_rekening` VALUES (289, '52403006', 'Belanja modal Instalasi Gardu Listrik');
INSERT INTO `tb_rekening` VALUES (290, '52403007', 'Belanja modal Instalasi Pertahanan');
INSERT INTO `tb_rekening` VALUES (291, '52403008', 'Belanja modal Instalasi Gas');
INSERT INTO `tb_rekening` VALUES (292, '52403009', 'Belanja modal Instalasi Pengaman');
INSERT INTO `tb_rekening` VALUES (293, '52403010', 'Belanja modal Instalasi Lainnya');
INSERT INTO `tb_rekening` VALUES (294, '52404001', 'Belanja modal Jaringan Air Minum');
INSERT INTO `tb_rekening` VALUES (295, '52404002', 'Belanja modal Jaringan Listrik');
INSERT INTO `tb_rekening` VALUES (296, '52404003', 'Belanja modal Jaringan Telepon');
INSERT INTO `tb_rekening` VALUES (297, '52404004', 'Belanja modal Jaringan Gas');
INSERT INTO `tb_rekening` VALUES (298, '52405001', 'Belanja Modal Jalan, Irigasi dan Jaringan BLUD');
INSERT INTO `tb_rekening` VALUES (299, '52406001', 'Belanja Modal Jalan, Irigasi dan Jaringan BOS');
INSERT INTO `tb_rekening` VALUES (300, '52501001', 'Belanja Modal Bahan Perpustakaan Tercetak');
INSERT INTO `tb_rekening` VALUES (301, '52501002', 'Belanja Modal Bahan Perpustakaan Terekam dan Bentuk Mikro');
INSERT INTO `tb_rekening` VALUES (302, '52501003', 'Belanja Modal Kartografi, Naskah dan Lukisan');
INSERT INTO `tb_rekening` VALUES (303, '52501004', 'Belanja Modal Musik');
INSERT INTO `tb_rekening` VALUES (304, '52501005', 'Belanja Modal Karya Grafika');
INSERT INTO `tb_rekening` VALUES (305, '52502001', 'Belanja Modal Barang Bercorak Kesenian');
INSERT INTO `tb_rekening` VALUES (306, '52502002', 'Belanja Modal Alat Bercorak Kebudayaan');
INSERT INTO `tb_rekening` VALUES (307, '52502003', 'Belanja Modal Tanda Penghargaan');
INSERT INTO `tb_rekening` VALUES (308, '52503001', 'Belanja Modal Hewan Peliharaan');
INSERT INTO `tb_rekening` VALUES (309, '52503002', 'Belanja Modal Hewan Ternak');
INSERT INTO `tb_rekening` VALUES (310, '52503003', 'Belanja Modal Hewan Lainnya');
INSERT INTO `tb_rekening` VALUES (311, '52503004', 'Belanja Modal Biota Perairan');
INSERT INTO `tb_rekening` VALUES (312, '52504001', 'Belanja Modal Tanaman');
INSERT INTO `tb_rekening` VALUES (313, '52505001', 'Belanja Modal Barang Koleksi Non Budaya');
INSERT INTO `tb_rekening` VALUES (314, '52506001', 'Belanja Modal Aset Tetap Lainnya BLUD');
INSERT INTO `tb_rekening` VALUES (315, '52507001', 'Belanja Modal Aset Tetap Lainnya BOS');
INSERT INTO `tb_rekening` VALUES (316, '52601001', 'Goodwill');
INSERT INTO `tb_rekening` VALUES (317, '52601002', 'Lisensi dan Franchise');
INSERT INTO `tb_rekening` VALUES (318, '52601003', 'Hak Cipta');
INSERT INTO `tb_rekening` VALUES (319, '52601004', 'Hak Paten');
INSERT INTO `tb_rekening` VALUES (320, '52601005', 'Software');
INSERT INTO `tb_rekening` VALUES (321, '52601006', 'Kajian');
INSERT INTO `tb_rekening` VALUES (322, '52601007', 'Aset Tidak Berwujud yang Mempunyai Nilai Sejarah/Budaya');
INSERT INTO `tb_rekening` VALUES (323, '52601008', 'Aset Tidak Berwujud Lainnya');
INSERT INTO `tb_rekening` VALUES (324, '52602001', 'Aset Lainnya BLUD');
INSERT INTO `tb_rekening` VALUES (325, '52603001', 'Aset Lainnya BOS');
INSERT INTO `tb_rekening` VALUES (326, '53101001', 'Belanja Tidak Terduga');

-- ----------------------------
-- Table structure for tb_surat_keluar
-- ----------------------------
DROP TABLE IF EXISTS `tb_surat_keluar`;
CREATE TABLE `tb_surat_keluar`  (
  `id_surat_keluar` int(11) NOT NULL AUTO_INCREMENT,
  `tgl_surat` date NULL DEFAULT NULL,
  `id_jenis_surat` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `nomor_surat` int(11) NULL DEFAULT NULL,
  `perihal_surat` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `sifat_surat` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `lampiran_surat` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `file_surat` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `created_at` date NULL DEFAULT NULL,
  `created_by` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `validasi` int(2) NULL DEFAULT 0,
  PRIMARY KEY (`id_surat_keluar`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of tb_surat_keluar
-- ----------------------------
INSERT INTO `tb_surat_keluar` VALUES (1, '2020-01-29', '4', NULL, 'Surat permohonan Narasumber pertemuan integrasi SDIDTK, PAUD, dan BKB yang ditujukan kepada RSUD RA Kartini Jepara', 'SEGERA', '1 Lembar', NULL, '2020-01-16', '11', 0);
INSERT INTO `tb_surat_keluar` VALUES (2, '2020-01-29', '4', NULL, 'Undangan peserta pertemuan integrasi SDIDTK, PAUD dan BKB ', 'SEGERA', '1 Lembar', NULL, '2020-01-16', '11', 0);
INSERT INTO `tb_surat_keluar` VALUES (3, '2020-01-28', '4', NULL, 'Undangan peserta pertemuan rencana dan evaluasi program kesehatan keluarga dan gizi', 'SEGERA', '-', NULL, '2020-01-16', '11', 0);
INSERT INTO `tb_surat_keluar` VALUES (4, '2020-01-19', '8', NULL, 'Pelayanan Kesehatan Anak PUNK', 'SEGERA', '2 Lembar', NULL, '2020-01-16', '11', 0);
INSERT INTO `tb_surat_keluar` VALUES (5, '2020-01-16', '8', NULL, 'Pelayanan Kesehatan dan  Pembinaan Anak PUNK', 'SEGERA', '2 Lembar', NULL, '2020-01-16', '11', 0);

-- ----------------------------
-- Table structure for tb_surat_masuk
-- ----------------------------
DROP TABLE IF EXISTS `tb_surat_masuk`;
CREATE TABLE `tb_surat_masuk`  (
  `id_surat_masuk` int(11) NOT NULL AUTO_INCREMENT,
  `tgl_surat` date NULL DEFAULT NULL,
  `id_jenis_surat` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `nomor_surat` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `sifat_surat` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `perihal_surat` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `lampiran_surat` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `pengirim_surat` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `dispo_surat` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `dispo_surat_sekdin` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `dispo_surat_bidang` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `catatan_surat` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `file_surat` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `dispo_pegawai` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `catatan_sekdin` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `catatan_bidang` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `catatan_seksi` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `created_at` date NULL DEFAULT NULL,
  `validasi` int(2) NULL DEFAULT 0,
  `nomor_dinas` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id_surat_masuk`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 117 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of tb_surat_masuk
-- ----------------------------
INSERT INTO `tb_surat_masuk` VALUES (3, '2019-12-31', '4', '1815', 'PENTING', 'undangan audiensi tentang pelayanan kesehatan ( pengaduan sdr. didit )', 'penting', 'DPRD', '4', '4', '15', 'Bidang yankes dan sdk menyiapkan bahan ', 'surat-masuk-20200106_083012.jpg', NULL, 'bidang yankes dan SDK tindak lanjuti', '', NULL, '2020-01-02', 1, 1);
INSERT INTO `tb_surat_masuk` VALUES (4, '2019-12-31', '4', '1822', 'SEGERA', 'undangan rapat kordinasi terkait dengan tupoksi mitra komisi c', '-', 'DPRD', '6', '6', NULL, 'subbag umum dan kepegawain untuk menghadiri undangan dari dewan', 'surat-masuk-20200106_084218.jpg', NULL, 'Subbag umpeg hadiri', NULL, NULL, '2020-01-02', 1, 2);
INSERT INTO `tb_surat_masuk` VALUES (7, '2019-12-07', '5', '-', '-', 'Lamaran pekerjaan', '-', 'Noor Zahhah O', '6', '6', NULL, 'UMP', 'surat-masuk-20200106_093409.jpg', NULL, 'UMP', NULL, NULL, '2020-01-02', 1, 3);
INSERT INTO `tb_surat_masuk` VALUES (9, '2019-12-30', '4', '005/3014/XII/2019', '-', 'undangan rAPAT PERSIAPAN PROYEKSI PENDAPATAN TA 2021', '-', 'BPKAD', '5', '5', NULL, 'Subbag renkeu hadiri', 'surat-masuk-20200107_122923.jpg', '51', 'Tindaklanjuti', NULL, 'Hadiri Rapat', '2020-01-02', 3, 4);
INSERT INTO `tb_surat_masuk` VALUES (10, '2019-12-27', '6', '470/11889', '-', 'Surat edaran dukungan kegiatan sensus penduduk 2020', '-', 'BPS ', '5', '5', NULL, 'UMP', 'surat-masuk-20200107_123713.jpg', '103', 'Tindaklanjuti', NULL, 'Copy dan Sebarkan ke seluruh Bidang, seksi, UPT dan Arsipkan', '2020-01-02', 3, 5);
INSERT INTO `tb_surat_masuk` VALUES (12, '2020-12-20', '4', '005/001', 'SEGERA', 'Undagan kunjungan kerja dalam rangka monitoring pelaksanaan pendidikan di sekolahan, bantuan hibah kepada masjid/musholla dan pelayanan kesehatan di puskesmas', '-', 'DPRD ', '6', '6', NULL, 'Subbag umpeg hadiri mendamping ibu kadinkes hari jumat ', 'surat-masuk-20200107_124726.jpg', NULL, 'subbag umpeg hadiri mendampingi ibu kadinkes', NULL, NULL, '2020-01-02', 1, 6);
INSERT INTO `tb_surat_masuk` VALUES (13, '2020-01-02', '4', '005/0004/2020', 'PENTING', 'Kordinasi penanganan anak punk di kabupaten jepara', '-', 'Setda', '3', '3', '11', 'Bidang kesmas untuk menghadiri ', 'surat-masuk-20200107_125216.jpg', '5', 'seksi kesga hadiri', 'seksi kesga hadiri', 'Dihadiri Kasie Kesga Gizi', '2020-01-04', 3, 7);
INSERT INTO `tb_surat_masuk` VALUES (14, '2019-12-17', '4', '005/DCG/XII/2019', '-', 'Undangan Workshop manajemen fasilitas dan keselamatan & bimtek penatalaksanaan layanan lansia & geriatri', '1 satu Berkas', 'Dynamic Consulting Group', '6', '6', NULL, 'UMP', 'surat-masuk-20200107_125908.jpg', NULL, 'Hadiri', NULL, NULL, '2020-01-04', 1, 8);
INSERT INTO `tb_surat_masuk` VALUES (15, '2019-12-30', '4', '005/0006', 'SEGERA', 'Undagan rapat kordinasi tentang sinkronisasi data bantuan kepada masyarakat ', '-', 'SETDA', '1', '6', NULL, 'Agenda kepala kadinkes ', 'surat-masuk-20200107_130339.jpg', NULL, 'agenda kepala dinas', NULL, NULL, '2020-01-04', 1, 9);
INSERT INTO `tb_surat_masuk` VALUES (16, '2020-01-02', '4', '005/0001', '-', 'Undagan rapat persiapan pelaksanaan sosialisasi pelayanan air minum ', '1 satu bendel', 'BAPPEDA ', '14', '3', '14', 'Seksi kesling hadiri ', 'surat-masuk-20200107_130756.jpg', NULL, 'Seksi kesling hadiri', 'seksi kesling hadiri', NULL, '2020-01-04', 2, 10);
INSERT INTO `tb_surat_masuk` VALUES (17, '0000-00-00', '7', '050.1.3/11915', 'SEGERA', 'Surat edaran (RKPD)', '-', 'Bupati Jepara', '6', '6', NULL, 'UMP', 'surat-masuk-20200108_073639.pdf', NULL, 'UMP', NULL, NULL, '2020-01-04', 1, 11);
INSERT INTO `tb_surat_masuk` VALUES (18, '2019-12-30', '8', '440/757', '-', 'Permohonan rehab pustu kawak pakis aji', '-', 'UPTD Pakis Aji', '6', '6', NULL, 'Kasubbag umpeg Kordinasikan', 'surat-masuk-20200108_074329.jpg', NULL, 'kasubbag umpeg koordinasikan', NULL, NULL, '2020-01-04', 1, 12);
INSERT INTO `tb_surat_masuk` VALUES (19, '2020-01-07', '4', '005/041', 'SEGERA', 'Undangan kunjungan kerja dalam rangka monitoring pelaksanaan pendidikan di sekolahan, bantuan hibah kepada masjid/musholla/yayasan dan pelayanan kesehatan di puskesmas ', '-', 'DPRD ', '6', '6', NULL, 'Kadinkes menghadiri undangan dari dewan ', 'surat-masuk-20200108_090641.jpg', NULL, 'kadinkes menghadiri undangan dari dewan', NULL, NULL, '2020-01-07', 1, 13);
INSERT INTO `tb_surat_masuk` VALUES (20, '2020-01-02', '4', '001/PSD-BD/1/2020', '-', 'Undangan penutupan bulan dana PMI tahun 2019', '-', 'PMI', '5', '5', NULL, 'Subbaga RENKEU Hadiri', 'surat-masuk-20200108_090931.jpg', '50', 'Hadiri', NULL, 'Hadiri', '2020-01-07', 1, 14);
INSERT INTO `tb_surat_masuk` VALUES (21, '2020-01-07', '8', '440/003/01/2020', '-', 'Usulan rehap bangunan pustu kriyan', '-', 'UPTD Kalinyamatan ', '6', '6', NULL, 'Kassubbag umpeg ', 'surat-masuk-20200108_091253.jpg', NULL, 'kasubag umpeg', NULL, NULL, '2020-01-07', 1, 15);
INSERT INTO `tb_surat_masuk` VALUES (22, '2020-01-03', '4', '005', '-', 'Undangan Rapat Kerja DWP ', '-', 'DWP', '14', '3', '14', 'Kasie kesling tugaskan staf untuk menghadiri', 'surat-masuk-20200108_091537.jpg', NULL, 'kasie kesling hadiri', 'seksi kesling hadiri', NULL, '2020-01-08', 2, 16);
INSERT INTO `tb_surat_masuk` VALUES (23, '2020-12-25', '8', '440-/8941/Bangda', 'SANGAT SEGERA ', 'Surat izin operasional fasilitas kesehatan', '1 satu berkas ', 'Kementrian dalam negeri RI', '4', '4', NULL, 'Kabid Yankes dan sdk tindak lanjuti', 'surat-masuk-20200109_133306.pdf', NULL, 'kabid yankes dan SDK tindak lanjuti', NULL, NULL, '2020-01-08', 1, 17);
INSERT INTO `tb_surat_masuk` VALUES (24, '2020-12-23', '9', '441.9/896', '-', 'Penetapan hasil verifikasi PNI APBD Kab. Jepara', '1 satu lembar', 'Dinsospermades', '4', '4', '15', 'Seksi Yankes tindak lanjuti', 'surat-masuk-20200109_133935.jpg', NULL, 'Seksi Yankes tindak lanjuti', '', NULL, '2020-01-08', 1, 18);
INSERT INTO `tb_surat_masuk` VALUES (25, '2019-12-27', '10', '045.2/560', '-', 'Kalender kerja tahun 2020', '-', 'Perumda ', '6', '6', NULL, 'UMP', 'surat-masuk-20200109_134950.jpg', NULL, 'UMP', NULL, NULL, '2020-01-08', 1, 19);
INSERT INTO `tb_surat_masuk` VALUES (26, '2019-12-13', '8', '440/664/XII/2019', '-', 'Himbuan Kewaspadaan dini Penyakit Dbd', '-', 'UPTD JEPARA ', '2', '2', '7', 'Bidang P2pm  Tindak lanjuti ', 'surat-masuk-20200109_135611.jpg', NULL, 'bidang P2pm tindak lanjuti', 'tindak lanjuti', 'arsipkan', '2020-01-08', 3, 20);
INSERT INTO `tb_surat_masuk` VALUES (27, '2019-12-23', '11', '850/11845', 'PENTING', 'Ralat Edaran Hari Libur Nasional & Cuti Bersama tahun 2020', '-', 'Setda', '6', '6', NULL, 'Kasubbag umpeg ', 'surat-masuk-20200109_142227.pdf', NULL, 'kasubbag umpeg ', NULL, NULL, '2020-01-08', 1, 21);
INSERT INTO `tb_surat_masuk` VALUES (28, '2019-12-31', '12', 'kh.03.01/5.9/3069/2019', '-', 'Izin studi pendahuluan proposal tesis', '-', 'Poltekes Semarang', '6', '6', NULL, 'Kasubbag umpeg fasilitasi ', 'surat-masuk-20200109_142827.jpg', NULL, 'kasubbag umpeg fasilitasi', NULL, NULL, '2020-01-08', 1, 22);
INSERT INTO `tb_surat_masuk` VALUES (29, '2020-01-06', '13', '800/0061/2020', '-', 'Laporan mekanisme kepegawain ', '-', 'UPTD Kembang', '6', '6', NULL, 'UMP', 'surat-masuk-20200109_144533.pdf', NULL, 'Tindak lanjuti', NULL, NULL, '2020-01-08', 1, 23);
INSERT INTO `tb_surat_masuk` VALUES (30, '2020-01-06', '8', '440/009/1/2020', 'SEGERA', 'Pemberitahuan alat insenerator ', '-', 'UTPD kEMBANG', '6', '6', NULL, 'Kasubbag Umpeg Tindak lanjuti', 'surat-masuk-20200113_114515.pdf', NULL, 'kasubbag umpeg tindak lanjuti', NULL, NULL, '2020-01-08', 1, 24);
INSERT INTO `tb_surat_masuk` VALUES (31, '2019-02-21', '12', '1885/KH.UL/PM/XII/2019', '-', 'Permohonan studi pendahuluan a.n Durrrotun M', '-', 'STIKES Semarang', '6', '6', NULL, 'subbag umpeg fasilitasi', 'surat-masuk-20200113_120327.pdf', NULL, 'subbag  umpeg fasilitasi', NULL, NULL, '2020-01-08', 1, 25);
INSERT INTO `tb_surat_masuk` VALUES (32, '2020-01-07', '4', '005/005/2020', '-', 'Permohonan alat', '-', 'Uptd Jepara', '6', '6', NULL, 'seksi P2PTM tindak lanjuti', 'surat-masuk-20200113_123629.pdf', NULL, 'seksi P2PTM tindak lanjuti', NULL, NULL, '2020-01-08', 1, 26);
INSERT INTO `tb_surat_masuk` VALUES (33, '2020-01-07', '8', '018/v/spm/pan-ms-bks/suara-utm/i/2020', '-', 'Permohonan bantuan tenaga kesehatan', '-', 'Swara Universitas Tunojoyo Madura', '4', '4', '15', 'seksi yankes fasilitasi', 'surat-masuk-20200113_133717.pdf', NULL, 'seksi yankes fasilitasi', '', NULL, '2020-01-08', 1, 27);
INSERT INTO `tb_surat_masuk` VALUES (34, '2020-01-07', '6', '441.9/071', '-', 'Permohonan Data PBI JKN ', '-', 'Dinsospermades', '4', '4', '15', 'seksi yankes tindak lanjuti', 'surat-masuk-20200113_133919.pdf', NULL, 'seksi yankes  tindak lanjuti', '', NULL, '2020-01-08', 1, 28);
INSERT INTO `tb_surat_masuk` VALUES (35, '0000-00-00', '8', 'KL. 01.04./5020/2019', '-', 'Pengusulan lokasi desa sasaran pktd', '-', 'Kemenkes RI ', '3', '3', '14', 'Bidang Kesmas Tindak lanjuti', 'surat-masuk-20200113_134211.pdf', NULL, 'bidang kesmas tindak lanjuti', 'seksi kesling tindak lanjuti', NULL, '2020-01-08', 2, 29);
INSERT INTO `tb_surat_masuk` VALUES (36, '2020-01-06', '4', '005/164', 'PENTING', 'Undangan Rakor Forum LLAJ', '-', 'DISHUB', '4', '4', '15', 'kasie yankes hadiri', 'surat-masuk-20200113_134518.pdf', NULL, 'Kasie yankes hadiri', '', NULL, '2020-01-08', 1, 30);
INSERT INTO `tb_surat_masuk` VALUES (37, '2020-01-06', '14', '050/0013', '-', 'Laporan akhir kegiatan DAK triwulan IV tahun 2019', '-', 'BAPPEDA ', '5', '5', NULL, 'Subbag renkeu tindak lanjuti', 'surat-masuk-20200113_135053.pdf', '92', 'Tindaklanjuyi', NULL, 'Cari Data dan Laporkan', '2020-01-08', 3, 31);
INSERT INTO `tb_surat_masuk` VALUES (38, '2020-01-06', '5', '811/', '-', 'Lamaran pekerjaan', '-', 'Khoirun Alfiriyah ', '6', '6', NULL, 'UMP', 'surat-masuk-20200113_135517.pdf', NULL, 'UMP', NULL, NULL, '2020-01-08', 1, 32);
INSERT INTO `tb_surat_masuk` VALUES (39, '2020-01-08', '8', '08/SGM-SMG/1/2020', '-', 'Surat penawaran GDS GE ', '-', 'PT. SEKARGUNA MEDIKA ', '4', '4', '12', 'Seksi farmalkes ', 'surat-masuk-20200113_135824.pdf', NULL, 'seksi  farmalkes tindak lanjuti', '', '', '2020-01-08', 3, 33);
INSERT INTO `tb_surat_masuk` VALUES (40, '2020-01-02', '8', '01/KPMN/XII/2019', '-', 'Laporan Bulanan data kesakitan', '-', 'Klinik pratama mardi nugroho', '7', '2', '7', 'tindak lanjuti seksi p2pm', 'surat-masuk-20200113_141715.pdf', NULL, 'tindak lanjuti seksi p2pm', 'laporan kesakitan masuk ke seksi yankes', 'arsipkan', '2020-01-02', 3, 34);
INSERT INTO `tb_surat_masuk` VALUES (41, '2020-01-06', '7', '050/0085', '-', 'INPUT RUP KE DALAM APLIKASI SIRUP LKPP', '-', 'Bupati JEPARA ', '5', '5', NULL, 'Subbag renkeu tindak lanjuti ', 'surat-masuk-20200113_142244.pdf', '24;77', 'Renkeu tindak lanjuti', NULL, 'tolong cari data di semua seksi untuk di masukkan ke SIRUP', '2020-01-08', 1, 35);
INSERT INTO `tb_surat_masuk` VALUES (42, '2020-01-06', '8', '127/DIR/MPAI/1/2020', '-', 'Formulir pemberitahuan kematian perinatal neonatal', '-', 'RS Mardi Rahayu', '11', '3', '11', 'Seksi kesga tindak lanjuti', 'surat-masuk-20200114_125921.pdf', '12', 'seksi kesga tindak lanjuti', 'seksi kesga tindak lanjuti', 'Tindak lanjuti', '2020-01-10', 3, 36);
INSERT INTO `tb_surat_masuk` VALUES (43, '2020-01-10', '15', '45/DSS/PBJ/XII/2019', '-', 'Penawaran bimtek sistem blended learning dan ujian sertifikasi pengadaan berbasis komputer (UBK)', 'Jadwal dan formulir kegiatan', 'Diponegoro smart', '6', '6', NULL, 'UMP', 'surat-masuk-20200114_131203.pdf', NULL, 'tindak lanjuti', NULL, NULL, '2020-01-10', 1, 37);
INSERT INTO `tb_surat_masuk` VALUES (44, '2020-01-09', '12', '072/010', '-', 'Surat keterangan penelitian ', '-', 'Bakesbangpol', '6', '6', NULL, 'umpeg fasilitasi', 'surat-masuk-20200114_131503.pdf', NULL, 'Umpeg Fasilitasi', NULL, NULL, '2020-01-10', 1, 38);
INSERT INTO `tb_surat_masuk` VALUES (45, '2020-01-07', '8', '27/vi-07/0120', '-', 'Pemberitahuan updating V claim Versi 1.16.0', '-', 'BPJS Kesehatan ', '4', '4', NULL, 'Seksi yankes tindalanjuti', 'surat-masuk-20200114_132025.pdf', NULL, 'seksi yankes tindak lanjuti', NULL, NULL, '2020-01-10', 1, 39);
INSERT INTO `tb_surat_masuk` VALUES (46, '2020-01-09', '13', '800/32/1/2020', '-', 'Usulan cuti sakit ', '-', 'UPTD Kedung II', '6', '6', NULL, 'Subbag umpeg fasilitasi ', 'surat-masuk-20200114_132248.pdf', NULL, 'Umpeg Fasilitasi', NULL, NULL, '2020-01-10', 1, 40);
INSERT INTO `tb_surat_masuk` VALUES (47, '2020-01-07', '16', '07/RK-IKL/I/20', '-', 'Penawaran iklan ucapan iklan hari pers nasional ke 74', '-', 'Radar kudus ', '5', '5', NULL, 'Subbag renkeu tindak lanjuti jika ada anggran', 'surat-masuk-20200114_132747.pdf', '50', 'Arsipkan', NULL, 'Arsipkan', '2020-01-10', 3, 41);
INSERT INTO `tb_surat_masuk` VALUES (48, '2020-01-09', '12', '54/PN/BAA/STIKES-CU/I/2020', '-', 'Permohonan ijin pengambilan data awal', '-', 'Cendekia utama kudus ', '6', '6', NULL, 'Subbag umpeg Fasilitasi', 'surat-masuk-20200114_133121.pdf', NULL, 'Subbag umpeg Fasilitasi', NULL, NULL, '2020-01-10', 1, 42);
INSERT INTO `tb_surat_masuk` VALUES (49, '2020-01-10', '4', '005/020/2020', '-', 'Data siga', '-', 'DP3AP2KB', '3', '3', '11', 'Seksi kesga tindaklanjuti', 'surat-masuk-20200114_133430.pdf', '5', 'seksi kesga tindak lanjuti', 'seksi kesga tindak lanjuti', 'mempersiapkan data', '2020-01-10', 3, 43);
INSERT INTO `tb_surat_masuk` VALUES (50, '2019-12-30', '4', '77/ARSADA /uMUM/xii/2019', '-', 'Undangan pelatihan implementasi PPK-BLUD', '-', 'ARSADA', '6', '6', NULL, 'UMP', 'surat-masuk-20200114_134414.pdf', NULL, 'Umpeg hadiri', NULL, NULL, '2020-01-10', 1, 44);
INSERT INTO `tb_surat_masuk` VALUES (51, '2019-12-13', '12', '7491/UN7.5.9/DL/2019', '-', 'Permohonan ijin magang akademik', '-', 'UNDIP', '6', '6', NULL, 'UMPEG Fasilitasi ', 'surat-masuk-20200114_134835.pdf', NULL, 'UMPEG Fasilitasi', NULL, NULL, '2020-01-10', 1, 45);
INSERT INTO `tb_surat_masuk` VALUES (52, '2020-01-07', '17', '445.9/01', '-', 'Laporan kejadian tanah longsor ', '-', 'UPTD Labkesda', '6', '6', NULL, 'umpeg tindak lanjuti', 'surat-masuk-20200114_140019.pdf', NULL, 'UMPEG tindak lanjuti', NULL, NULL, '2020-01-10', 1, 46);
INSERT INTO `tb_surat_masuk` VALUES (53, '2020-01-07', '17', '445.9/01', '-', 'Laporan kejadian tanah longsor ', '-', 'UPTD Labkesda', '6', '6', NULL, 'umpeg tindak lanjuti', 'surat-masuk-20200114_140036.pdf', NULL, 'Umpeg tindak lanjuti', NULL, NULL, '2020-01-10', 1, 47);
INSERT INTO `tb_surat_masuk` VALUES (54, '2020-01-02', '13', '861/32', 'PENTING', 'Panggilan M. Rian Ardi W', '-', 'BKD', '6', '6', NULL, 'UMPEG Tindak lanjuti', 'surat-masuk-20200114_144325.pdf', NULL, 'UMPEG Tindak lanjuti', NULL, NULL, '2020-01-10', 1, 48);
INSERT INTO `tb_surat_masuk` VALUES (55, '2019-12-23', '4', '835/DU.PPA&K-BPM/XII/2019', '-', 'Pemberitahuan jadwal diklat tahun 2020', '1 satu berkas', 'PPA&K', '6', '6', NULL, 'UMP', 'surat-masuk-20200114_145348.pdf', NULL, 'Umpeg tindak lanjuti', NULL, NULL, '2020-01-10', 1, 49);
INSERT INTO `tb_surat_masuk` VALUES (56, '2019-12-20', '4', '250/A.1/mITRA KONSULTAN & DIKLAT PEMDA/XII/2019', '-', 'Undangan peserta bimtek', '-', 'MITRA KONSULTAN & DIKLAT PEMDA ', '6', '6', NULL, 'UMP', 'surat-masuk-20200114_150322.pdf', NULL, 'Tindak lanjuti', NULL, NULL, '2020-01-10', 1, 50);
INSERT INTO `tb_surat_masuk` VALUES (57, '2019-12-20', '4', '34/IKKESINDO/XII/2019', '-', 'Mohon penugasan dinas kesehatan/puskemas mengikuti pelatihan persipan ppk blud', '-', 'IKKESINDO', '6', '6', NULL, 'UMP', 'surat-masuk-20200114_151715.pdf', NULL, 'Tindak lanjuti', NULL, NULL, '2020-01-10', 1, 51);
INSERT INTO `tb_surat_masuk` VALUES (58, '2019-12-30', '4', '77/ARSADA /uMUM/xii/2019', '-', 'Undangan Pelatihan Implementasi PPK-BLUD', '2 Berkas', 'ARSADA', '6', '6', NULL, 'UMP', 'surat-masuk-20200114_154026.pdf', NULL, 'Umpeg hadiri', NULL, NULL, '2020-01-14', 1, 52);
INSERT INTO `tb_surat_masuk` VALUES (59, '2020-01-09', '4', '005/023', 'SEGERA', 'Undangan pemeriksaan dokumen ukl upl cv. mega arsenio', '1 satu bendel', 'DLH', '3', '3', '14', 'Seksi kesling hadiri ', 'surat-masuk-20200114_154330.pdf', NULL, 'Seksi kesling hadiri', 'seksi kesling hadiri', NULL, '2020-01-10', 2, 53);
INSERT INTO `tb_surat_masuk` VALUES (60, '2020-01-09', '4', '005/0120', 'PENTING', 'undangan rapat evaluasi sinkronisasi dana bagi hasil cukai hasil tembakau ( DBHCHT) TA. 2020', '-', 'SETDA', '5', '5', NULL, 'Subbag renkeu hadiri', 'surat-masuk-20200114_154633.pdf', '30', 'Tindaklanjuti', NULL, 'Hadiri rapat', '2020-01-10', 3, 54);
INSERT INTO `tb_surat_masuk` VALUES (61, '2020-01-04', '4', '445/018/2020', 'PENTING', 'Pemberitahuan jadwal permohonan narasumber ', '-', 'RSUD RA KARTINI', '6', '6', NULL, 'Subbag umpeg buat nota dinas edarkan ke seksi dan subbag ', 'surat-masuk-20200114_155024.pdf', NULL, 'Umpeg tindak lanjuti', NULL, NULL, '2020-01-10', 1, 55);
INSERT INTO `tb_surat_masuk` VALUES (62, '2020-01-09', '13', '893.3/81/2020', 'PENTING', 'Ralat Surat permohonan peserta pelatihan teknis pengawasan kearsipan internal th 2020', '-', 'SETDA ', '6', '6', NULL, 'Umpeg tindaklanjuti ', 'surat-masuk-20200114_155458.pdf', NULL, 'Umpeg hadiri', NULL, NULL, '2020-01-10', 1, 56);
INSERT INTO `tb_surat_masuk` VALUES (63, '2020-01-08', '4', '005/0129/2020', '-', 'Undangan rapat lanjutan penanganan anak punk di kabupaten jepara', '-', 'Setda ', '3', '3', '11', 'Seksi kesga hadiri', 'surat-masuk-20200114_155836.pdf', '5', 'Seksi kesga hadiri', 'seksi kesga gizi hadiri', 'dihadiri kasie kesga gizi', '2020-01-10', 3, 57);
INSERT INTO `tb_surat_masuk` VALUES (64, '2020-01-07', '4', '005/145', 'SEGERA', 'Undangan kunjungan kerja dalam rangka monitoring pelaksanaan pendidikan di sekolahan, bantuan hibah kepada masjid/musholla dan pelayanan keehatan di puskesmas', '-', 'DPRD', '4', '4', '12', 'Seksi yankes mendampingi ibu kadinkes ke puskesmas donorojo', 'surat-masuk-20200115_075028.pdf', NULL, 'seksi yankes tindak lanjuti', '', '', '2020-01-10', 3, 58);
INSERT INTO `tb_surat_masuk` VALUES (66, '2020-01-07', '4', '005/148', '-', 'Undangan Rapat Kordinasi dengan tupoksi mitra komisi c', '-', 'DPRD', '5', '5', NULL, 'Subbag renkeu hadiri ', 'surat-masuk-20200115_092126.pdf', '92;95', 'Subbag Renkeu Hadiri', NULL, 'Siapkan bahan,  kasubag renval keu mendampingi kadin', '2020-01-13', 1, 59);
INSERT INTO `tb_surat_masuk` VALUES (67, '2020-01-05', '4', '005/055', '-', 'Partisipasi kegiatan workshop', '1 satu bendel', 'DPRD', '6', '6', NULL, 'agenda kadinkes ', 'surat-masuk-20200115_092314.pdf', NULL, 'Umpeg untuk mengingatkan', NULL, NULL, '2020-01-13', 1, 60);
INSERT INTO `tb_surat_masuk` VALUES (68, '2020-01-02', '4', '005/0002', '-', 'Undangan konsultasi publik rancangan awal RKPD tahun 2021 dan pembukaan masa musrenbang 2020', '-', 'DPRD', '5', '5', NULL, 'Subbag renkeu hadiri', 'surat-masuk-20200115_092628.pdf', '23', 'Subbag Renkeu hadiri', NULL, 'Dihadiri kasubag renval keu', '2020-01-13', 1, 61);
INSERT INTO `tb_surat_masuk` VALUES (69, '2020-01-09', '4', '-', '-', 'Berdiskusi isu2 terkini tentang kesehatan di kabupaten jepara ', '-', 'DPR RI', '6', '6', NULL, 'Buatkan nota dinas stuktural menyambut tamu dari DPR RI', 'surat-masuk-20200115_093243.pdf', NULL, 'Umpeg tindak lanjuti', NULL, NULL, '2020-01-13', 1, 62);
INSERT INTO `tb_surat_masuk` VALUES (70, '2020-01-06', '4', '050/0028', '-', 'Jadwal musrenbang RKPD Kecamatan tahun 2020', '1 satu bendel', 'SETDA', '5', '5', NULL, 'Subbag renkeu tindak lanjuti', 'surat-masuk-20200115_094917.pdf', '95', 'Subbag Renval  dan Keuangan Tindak lanjuti', NULL, 'Bikin nota dinas untuk jadwal petugas musrenbang', '2020-01-13', 1, 63);
INSERT INTO `tb_surat_masuk` VALUES (71, '2020-01-13', '4', '005/0157', 'SEGERA', 'Undangan rapat pembahasan rencana kerja penyusunan dan pembahasan ranperda tahun 2020', '-', 'SETDA', '4', '4', '13', 'Seksi SDMK hadiri', 'surat-masuk-20200115_095206.pdf', NULL, 'Seksi SDMK hadiri', 'hadiri', NULL, '2020-01-13', 1, 64);
INSERT INTO `tb_surat_masuk` VALUES (72, '2020-01-10', '8', '045.2/560', 'SEGERA', 'Pelaporan komunikasi data dan profil kesehatan tahun 2019', '-', 'Dinkes prov', '5', NULL, NULL, 'Renkeu tindak lanjuti', 'surat-masuk-20200116_122718.pdf', NULL, 'Renkeu tindak lanjuti', NULL, 'Feedback data baik, pertahankan dan arsipkan', '2020-01-10', 1, 65);
INSERT INTO `tb_surat_masuk` VALUES (73, '2020-01-07', '8', '02/1/skm/2020', '-', 'Surat keterangan medis ', '-', 'RSUD RA KARTINI', '6', NULL, NULL, 'UMPEG tindaklanjuti', 'surat-masuk-20200116_123034.pdf', NULL, 'UMPEG tindaklanjuti', NULL, NULL, '2020-01-14', 1, 66);
INSERT INTO `tb_surat_masuk` VALUES (74, '2020-01-08', '13', '824.3/0110', 'SEGERA', 'Permohonan pinda antar intansi a.n ririn n', '-', 'Setda ', '6', NULL, NULL, 'UMPEG Tindaklanjuti ', 'surat-masuk-20200116_123508.pdf', NULL, 'UMPEG Tindaklanjuti', NULL, NULL, '2020-01-08', 1, 67);
INSERT INTO `tb_surat_masuk` VALUES (75, '2019-12-12', '4', '008/4010/2019', '-', 'Pemberitahuan jenis layanan di RSUD RAA Soewondo Pati', '1', 'RSUD RAA SOEWONDO PATI', '4', NULL, NULL, 'Seksi yankes tindaklanjuti ', 'surat-masuk-20200116_124046.pdf', NULL, 'Seksi yankes tindaklanjuti ', NULL, NULL, '2020-01-15', 1, 68);
INSERT INTO `tb_surat_masuk` VALUES (76, '2020-01-06', '4', '956.28K/K3J/1/2020', '-', 'Permohonan dispensasi', '-', 'KPRI', '6', NULL, NULL, 'umpeg Fasilitasi ', 'surat-masuk-20200116_124415.pdf', NULL, 'umpeg Fasilitasi ', NULL, NULL, '2020-01-15', 1, 69);
INSERT INTO `tb_surat_masuk` VALUES (77, '2020-01-09', '10', '045.2/0116', '-', 'Surat penantar salianan peaturan bupati jepara ', '-', 'SETDA ', '6', NULL, NULL, 'Subba umpeg tindaklanjuti', 'surat-masuk-20200116_130408.pdf', NULL, 'Subba umpeg tindaklanjuti', NULL, NULL, '2020-01-13', 1, 70);
INSERT INTO `tb_surat_masuk` VALUES (78, '2020-01-06', '8', '446.5/109/2', 'SEGERA ', 'Usulan Wahana PIDI', '-', 'Dinkes PROV', '4', NULL, NULL, 'Seksi yankes tindak lanjuti', 'surat-masuk-20200116_131746.pdf', NULL, 'Seksi yankes tindak lanjuti', NULL, NULL, '2020-01-13', 1, 71);
INSERT INTO `tb_surat_masuk` VALUES (79, '2020-01-04', '8', '443.3/02/1/2020', '-', 'Permintaan ABATE ', '-', 'UPTD batealit ', '2', NULL, NULL, 'Seksi p2pm tindaklanjuti', 'surat-masuk-20200116_132432.pdf', NULL, 'Seksi p2pm tindaklanjuti', NULL, NULL, '2020-01-13', 1, 72);
INSERT INTO `tb_surat_masuk` VALUES (80, '2020-01-08', '4', '440/42/2020', '-', 'Permintaan susu ibu hamil ', '-', 'UPTD Bangsri I', '1', NULL, NULL, 'UMP Belum ada ttd kepala puskesmas ', 'surat-masuk-20200116_135702.pdf', NULL, 'Cek kelengkapan  ttd kepala puskesmas ', 'Cek kelengkapan  ttd kepala puskesmas ', NULL, '2020-01-13', 2, 73);
INSERT INTO `tb_surat_masuk` VALUES (81, '2019-12-30', '8', '440/20/XII/2019', '-', 'Usulan permohonan Obat ', '-', 'UPTD batealit', '4', NULL, NULL, 'seksi yankes tindak lanjuti ', 'surat-masuk-20200116_140015.pdf', NULL, 'seksi yankes tindak lanjuti  yankes tindak lanjuti  bersama dengan IFK', 'Tindak Lanjuti', 'Tindak Lanjuti', '2020-01-15', 1, 74);
INSERT INTO `tb_surat_masuk` VALUES (82, '2020-01-06', '4', '003/KIJPR-4/A/1/2020', '-', 'Permohonan menjadi relawan pengajar ', '1 bendel proposal', 'Kelas Inspirasi Jepara ', '6', NULL, NULL, 'UMP Belum ada disposisi ', 'surat-masuk-20200116_140451.pdf', NULL, 'UMP Belum ada disposisi ', NULL, NULL, '2020-01-15', 1, 75);
INSERT INTO `tb_surat_masuk` VALUES (83, '2020-01-02', '18', 'KT.301/01/KSMF/1-2020', '-', 'Prakiran Hujan Bulan Januari tahun 2020', '-', 'BMKG', '6', NULL, NULL, 'UMPEG Buku arsipkan Diperpustakaan ', 'surat-masuk-20200116_141143.pdf', NULL, 'UMPEG Buku arsipkan Diperpustakaan ', NULL, NULL, '2020-01-15', 1, 76);
INSERT INTO `tb_surat_masuk` VALUES (84, '2020-01-06', '8', '440/009/1/2020', 'SEGERA', 'Pemberitahuan alat insenerator rusak ', '-', 'UPTD KEMBANG ', '6', NULL, NULL, 'Subbag umpeg tindak lanjuti', 'surat-masuk-20200116_141712.pdf', NULL, 'Subbag umpeg tindak lanjuti', NULL, NULL, '2020-01-15', 1, 77);
INSERT INTO `tb_surat_masuk` VALUES (86, '2020-01-06', '13', '800/04/I/2020', '-', 'Laporan mekanisme kepegawaian', '-', 'UPTD Batealit', '19', NULL, NULL, 'Kasubag umpeg  tindaklanjuti', 'surat-masuk-20200117_113308.pdf', NULL, NULL, NULL, NULL, '2020-01-15', 0, 78);
INSERT INTO `tb_surat_masuk` VALUES (87, '2020-01-03', '19', '005/RS.PKU.MUH/1.5/B/2020', '-', 'Permohonan ijin pelaksanaan dana hibah ', '-', 'PKU Muhammadiyah Mayong', '19', NULL, NULL, 'Kasubbag umpeg tindaklanjuti', 'surat-masuk-20200117_114233.pdf', NULL, NULL, NULL, NULL, '2020-01-15', 0, 79);
INSERT INTO `tb_surat_masuk` VALUES (88, '2020-01-13', '12', '020/FST/UNISNU/I/2020', '-', 'Permohonan ijin penelitian a.n. Luqman hidayat', '-', 'UNISNU JEPARA', '19', NULL, NULL, 'Kasubbag umpeg fasilitasi', 'surat-masuk-20200117_114725.pdf', NULL, NULL, NULL, NULL, '2020-01-15', 0, 80);
INSERT INTO `tb_surat_masuk` VALUES (89, '2020-01-03', '19', '006/RS.PKU.MUH/1.5/B/2020', '-', 'Laporan progres dana hibah ', '1 satu lembar', 'RS PKU Muhammmadiyah Mayong Jepara ', '19', NULL, NULL, 'Kasubbag umpeg tindaklanjuti ', 'surat-masuk-20200118_100510.pdf', NULL, NULL, NULL, NULL, '2020-01-16', 0, 81);
INSERT INTO `tb_surat_masuk` VALUES (90, '2020-01-09', '13', '800/039/1/1/2020', 'SEGERA', 'Permohonan usulan pembuatan perjanjian kinerja dengan bupati jepara ', '-', 'UPTD Tahunan', '19', NULL, NULL, 'Subbag renkeu tindaklanjuti', 'surat-masuk-20200118_100833.pdf', NULL, NULL, NULL, NULL, '2020-01-16', 0, 82);
INSERT INTO `tb_surat_masuk` VALUES (91, '2020-01-06', '15', 'A-02/PS/I/2020', '-', 'Pemberitahuan memperkenalkan CV. Pertiwi Sakti', '1 satu berkas', 'CV. Pertiwi Sakti', '19', NULL, NULL, 'Kasubbag umpeg pertimbangkan ', 'surat-masuk-20200118_101215.pdf', NULL, NULL, NULL, NULL, '2020-01-16', 0, 83);
INSERT INTO `tb_surat_masuk` VALUES (92, '2020-01-10', '8', '055/RS.PKU.MUH/1.5/B/2020', '-', 'Permohonan pelayann hemodialisa sudah siap ', '-', 'RS PKU Muhammmadiyah Mayong Jepara', '4', NULL, NULL, 'Seksi farmalkes tindaklanjuti permohonan ', 'surat-masuk-20200118_101636.pdf', NULL, NULL, NULL, NULL, '2020-01-16', 0, 84);
INSERT INTO `tb_surat_masuk` VALUES (93, '2020-01-13', '4', '005/0165', 'SEGERA', 'Undangan rapat koordinasi terkait pelayanan kesehatan di RSI Sultan hadirin Kabupaten Jepara', '-', 'Setda', '4', NULL, NULL, 'Seksi yankes hadiri undangan ', 'surat-masuk-20200118_101929.pdf', NULL, NULL, NULL, NULL, '2020-01-15', 0, 85);
INSERT INTO `tb_surat_masuk` VALUES (94, '2020-01-12', '4', '001/TS/KPITV/UNISNU/1/2020', '-', 'Permohonan menjadi pemateri penanggulangan HIV/AIDS di Jepara ', '1 Lampiran ', 'UNISNU JEPARA ', '2', NULL, NULL, 'Kabid P2P Hadir  ', 'surat-masuk-20200118_102334.pdf', NULL, NULL, NULL, NULL, '2020-01-15', 0, 86);
INSERT INTO `tb_surat_masuk` VALUES (95, '2020-01-10', '4', '530/0022', 'PENTING', 'Permohonan narasumber Pelatihan IK makanan ', '-', 'DISPERINDAG ', '3', NULL, NULL, 'Seksi Kesling Tindaklanjuti', 'surat-masuk-20200118_103011.pdf', NULL, NULL, NULL, NULL, '2020-01-15', 0, 87);
INSERT INTO `tb_surat_masuk` VALUES (96, '2020-01-14', '4', '005/0075', '-', 'Undangan lanjutan rapat persiapan pelaksanaan sosilisasi pelayanan air minum', '1 satu bendel', 'BAPPEDA', '3', NULL, NULL, 'Seksi kesling hadiri ', 'surat-masuk-20200118_103311.pdf', NULL, NULL, NULL, NULL, '2020-01-15', 0, 88);
INSERT INTO `tb_surat_masuk` VALUES (97, '2020-01-13', '19', '893.3/0096', 'SEGERA ', 'Rapat persiapan pelatihan', '-', 'BKD', '4', NULL, NULL, 'Seksi SDMK hadiri', 'surat-masuk-20200118_103842.pdf', NULL, NULL, NULL, NULL, '2020-01-15', 0, 89);
INSERT INTO `tb_surat_masuk` VALUES (98, '2020-01-06', '4', '005/062/BANGDA', 'SANGAT SEGERA', 'Peningkatan pengawasan pangan makanan dan minuman ', '-', 'Kementrian dalam negeri RI', '3', NULL, NULL, 'Seksi kesling tindaklanjuti ', 'surat-masuk-20200118_120802.pdf', NULL, NULL, NULL, NULL, '2020-01-15', 0, 90);
INSERT INTO `tb_surat_masuk` VALUES (99, '2019-12-30', '4', '55/ARSADA/UMUM/XII/2019', '-', 'Undagan bimbingan teknis PPK-BLUD', '-', 'ARSADA', '19', NULL, NULL, 'Kasubbag Umpeg UMP', 'surat-masuk-20200118_121244.pdf', NULL, NULL, NULL, NULL, '2020-01-15', 0, 91);
INSERT INTO `tb_surat_masuk` VALUES (100, '2020-01-03', '8', '440/03/XI/2019', '-', 'Surat permohonan ijin operasional UPTD Puskesmas Bangsri II', '-', 'UPTD Bangsri II', '4', NULL, NULL, 'Seksi yankes tindaklanjuti', 'surat-masuk-20200118_121514.pdf', NULL, NULL, NULL, NULL, '2020-01-15', 0, 92);
INSERT INTO `tb_surat_masuk` VALUES (101, '2020-01-03', '8', '440/446/1/2020', '-', 'Permohonan ijin operasional UPTD Puskesmas bangsri II', '-', 'UPTD Bangsri II', '4', NULL, NULL, 'Seksi yankes tindaklanjuti', 'surat-masuk-20200118_121736.pdf', NULL, NULL, NULL, NULL, '2020-01-15', 0, 93);
INSERT INTO `tb_surat_masuk` VALUES (102, '2020-01-09', '8', '440/035/1/2020', 'SEGERA', 'Permohonan pembuatan zebra cross', '-', 'UPTD Tahunan', '19', NULL, NULL, 'Kasubbag umpeg tindaklanjuti ', 'surat-masuk-20200118_121953.pdf', NULL, NULL, NULL, NULL, '2020-01-15', 0, 94);
INSERT INTO `tb_surat_masuk` VALUES (103, '0000-00-00', '4', '005/08/1/2020', 'PENTING', 'Pemberitahuan maraknya penjualan obat herbal ', '-', 'UPTD Keling I', '4', NULL, NULL, 'Seksi yankes tindaklanjuti ', 'surat-masuk-20200118_122222.pdf', NULL, NULL, NULL, NULL, '2020-01-15', 0, 95);
INSERT INTO `tb_surat_masuk` VALUES (104, '2020-01-13', '10', '009/PAFI-JPR/S-Ext01/1/2020', '-', 'Permohonan ijin menggunakan aula ', '-', 'PAFI', '19', NULL, NULL, 'Kasubbag umpeg fasilitasi ', 'surat-masuk-20200118_123233.pdf', NULL, NULL, NULL, NULL, '2020-01-18', 0, 96);
INSERT INTO `tb_surat_masuk` VALUES (105, '2020-01-14', '4', '005/25/2020', '-', 'Undangan rapat teknis penanganan anak punk', '-', 'SATPOL PP', '3', NULL, NULL, 'Seksi kesga gizi hadiri', 'surat-masuk-20200118_123448.pdf', NULL, NULL, NULL, NULL, '2020-01-15', 0, 97);
INSERT INTO `tb_surat_masuk` VALUES (106, '2020-01-13', '20', '893/103', 'SEGERA', 'Sosialisasi idendifikasi kebutuhan pengembangan kompetensi tahun 2020', '-', 'BKD ', '19', NULL, NULL, 'Kasubbag Umpeg Hadiri', 'surat-masuk-20200118_123657.pdf', NULL, NULL, NULL, NULL, '2020-01-15', 0, 98);
INSERT INTO `tb_surat_masuk` VALUES (107, '2020-01-08', '12', 'KH.03.01/59/028/2020', '-', 'Ijin studi pendahuluan proposal tesis', '-', 'Poltekes Semarang', '19', NULL, NULL, 'Kasubbag umpeg fasilitasi ', 'surat-masuk-20200118_123941.pdf', NULL, NULL, NULL, NULL, '2020-01-15', 0, 99);
INSERT INTO `tb_surat_masuk` VALUES (108, '2020-01-14', '4', '005/0181', 'SEGERA', 'Undangan penyususnan laporan (LPPD)', '-', 'SETDA', '19', NULL, NULL, 'Kasubbag renkeu hadiri ', 'surat-masuk-20200118_124150.pdf', NULL, NULL, NULL, NULL, '2020-01-15', 0, 100);
INSERT INTO `tb_surat_masuk` VALUES (109, '2020-01-11', '10', '003/R-Y/KTI/AKFAR/I2020', '-', 'Pengantar Penelitian ', '-', 'AKADEMI FARMASI NUSAPUTERA ', '19', NULL, NULL, 'Kasubbag umpeg fasilitasi ', 'surat-masuk-20200118_124334.pdf', NULL, NULL, NULL, NULL, '2020-01-15', 0, 101);
INSERT INTO `tb_surat_masuk` VALUES (110, '2020-01-09', '19', '900/0024/2020', '-', 'Rekapitulasi penerimaan retribusi laboratorium kesehatan ', '-', 'UPTD Labkesda', '19', NULL, NULL, 'Kasubag renkeu tindaklanjuti', 'surat-masuk-20200118_124603.pdf', NULL, NULL, NULL, NULL, '2020-01-15', 0, 102);
INSERT INTO `tb_surat_masuk` VALUES (111, '2020-01-14', '5', '811', '-', 'Lamaran pekerjaan', '-', 'Sylvia Agustin Mawardani', '19', NULL, NULL, 'Kasubag umpeg UMP', 'surat-masuk-20200118_124732.pdf', NULL, NULL, NULL, NULL, '2020-01-15', 0, 103);
INSERT INTO `tb_surat_masuk` VALUES (112, '2019-01-23', '8', '441.9.1/590', '-', 'Surat keterangan tidak mampu a.n Mustoha', '-', 'Kecamtan bangsri', '4', NULL, NULL, 'Seksi yankes tindaklanjuti ', 'surat-masuk-20200118_125347.pdf', NULL, NULL, NULL, NULL, '2020-01-15', 0, 104);
INSERT INTO `tb_surat_masuk` VALUES (113, '2020-01-14', '4', '046/060', '-', 'Permohonan personil', '-', 'Diskominfo ', '19', NULL, NULL, 'Kasubag renkeu tindaklanjuti ', 'surat-masuk-20200118_130001.pdf', NULL, NULL, NULL, NULL, '2020-01-17', 0, 105);
INSERT INTO `tb_surat_masuk` VALUES (114, '2020-01-08', '10', '060/015', '-', 'Permohonan personil tim pengelola website ', '-', 'Diskominfo', '19', NULL, NULL, 'Kasubag renkeu tindaklanjuti', 'surat-masuk-20200118_130152.pdf', NULL, NULL, NULL, NULL, '2020-01-17', 0, 106);
INSERT INTO `tb_surat_masuk` VALUES (115, '2020-01-15', '4', '060/29', 'SEGERA', 'Permintaan data personil kegiatan peningkatan maturiti SPIP tahun 2020', '-', 'Inspektorat ', '19', NULL, NULL, 'Subaag renkeu TL', 'surat-masuk-20200118_130429.pdf', NULL, NULL, NULL, NULL, '2020-01-17', 0, 107);
INSERT INTO `tb_surat_masuk` VALUES (116, '2020-01-14', '8', '440/17/5/2020', 'PENTING', 'Permohonan Pelatihan pone ', '-', 'UPTD DONOROJO', '4', NULL, NULL, 'Seksi SDMK tindaklanjuti', 'surat-masuk-20200118_130745.pdf', NULL, NULL, NULL, NULL, '2020-01-17', 0, 108);

-- ----------------------------
-- Table structure for tb_surat_tugas
-- ----------------------------
DROP TABLE IF EXISTS `tb_surat_tugas`;
CREATE TABLE `tb_surat_tugas`  (
  `id_surat_tugas` int(11) NOT NULL AUTO_INCREMENT,
  `tgl_surat` date NULL DEFAULT NULL,
  `nomor_surat` int(11) NULL DEFAULT NULL,
  `dasar_surat` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `tgl_kegiatan` date NULL DEFAULT NULL,
  `tgl_kegiatan_2` date NULL DEFAULT NULL,
  `lokasi_kegiatan` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `nama_kegiatan` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tugas_surat` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `dalam_luar_tugas` int(2) NULL DEFAULT NULL,
  `ttd_surat` int(2) NULL DEFAULT NULL,
  `sppd_surat` int(2) NULL DEFAULT NULL,
  `nomor_sppd` int(11) NULL DEFAULT NULL,
  `kendaraan` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `nopol` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `mata_perdin` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `mata_bbm` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `validasi` int(2) NULL DEFAULT 0,
  `file_surat` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `created_at` date NULL DEFAULT NULL,
  `created_by` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_surat_tugas`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 22 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of tb_surat_tugas
-- ----------------------------
INSERT INTO `tb_surat_tugas` VALUES (3, '2020-01-17', 2, '', '2020-01-15', '2020-01-15', 'BBPOM  Semarang', 'Konsultasi kegiatan pembinaan dan perizinan kesehatan', NULL, 1, 0, 1, NULL, 'Pribadi', 'K7326HC', NULL, NULL, 1, NULL, '2020-01-14', '12');
INSERT INTO `tb_surat_tugas` VALUES (4, '2020-01-15', 3, '', '2020-01-15', '2020-01-15', 'desa kedung leper, Desa Bandengan, Desa Guyangan ', 'Visitasi Inspeksi kesling dan pengambilan sampel air DAM baru.', NULL, 0, 0, 1, NULL, 'Dinas', NULL, NULL, NULL, 1, NULL, '2020-01-14', '14');
INSERT INTO `tb_surat_tugas` VALUES (5, '2020-01-15', 4, '', '2020-01-16', '2020-01-16', 'Desa Tubanan dan Desa Cepogo', 'visitasi, inspeksi kesling dan pengambilan sampel air DAM baru ', NULL, 0, 0, 1, NULL, 'Dinas', NULL, NULL, NULL, 1, NULL, '2020-01-14', '14');
INSERT INTO `tb_surat_tugas` VALUES (6, '2020-01-13', 5, '', '2020-01-14', '2020-01-14', 'Desa Mayong Lor ', 'visitasi penerbitan sertifikat sarana TPM / IRTP', NULL, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, '2020-01-13', '14');
INSERT INTO `tb_surat_tugas` VALUES (7, '2020-01-15', 6, '', '2020-01-15', '2020-01-15', 'RSUD Kelet', 'Pengambilan data DBD', NULL, 0, 1, 1, NULL, 'Pribadi', 'B 1675 ETB', NULL, NULL, 1, NULL, '2020-01-15', '7');
INSERT INTO `tb_surat_tugas` VALUES (8, '2020-01-10', 7, '', '2020-01-13', '2020-01-13', 'UPTD Puskesmas Donorojo', 'monitoring pelaksanaan pelayanan kesehatan di Puskesmas', NULL, 0, 0, 1, NULL, 'Dinas', 'K 73 C', NULL, NULL, 1, NULL, '2020-01-12', '6');
INSERT INTO `tb_surat_tugas` VALUES (9, '2020-01-17', 8, '', '2020-01-14', '2020-01-14', 'Dinas Kesehatan Provinsi Jawa Tengah', 'mengambil hasil penilaian angka kredit dan sertifikat ukom', NULL, 1, 0, 1, NULL, 'Dinas', 'K 9501 RL', NULL, NULL, 1, NULL, '2020-01-13', '13');
INSERT INTO `tb_surat_tugas` VALUES (10, '2020-01-13', 9, '', '2020-01-14', '2020-01-14', 'P2KS Semarang', 'Konsultasi pelaksanaan Diklat Poned', NULL, 1, 1, 1, NULL, 'Dinas', 'K 9501 RL', NULL, NULL, 1, NULL, '2020-01-13', '13');
INSERT INTO `tb_surat_tugas` VALUES (11, '2020-01-10', 10, '', '2020-01-13', '2020-01-13', 'Dinas Kesehatan Kabupaten Pati', 'Konsultasi Penilaian Angka Kredit Fungsional Adminkes', NULL, 1, 1, 1, NULL, 'Pribadi', 'K 8989 OQ', NULL, NULL, 1, NULL, '2020-01-10', '13');
INSERT INTO `tb_surat_tugas` VALUES (12, '2020-01-07', 11, '', '2020-01-08', '2020-01-08', 'Mba Alif Snack and catering Ds. Sinanggul, Danish snack and Backery Ds. Karanggondang, Ds. Kedung Leper', 'perjalanan dinas dalam rangka pengawasan  sarana IRTP', NULL, 0, 0, 1, NULL, 'Pribadi', NULL, NULL, NULL, 1, NULL, '2020-01-15', '14');
INSERT INTO `tb_surat_tugas` VALUES (13, '2020-01-14', 12, '', '2020-01-13', '2020-01-13', 'Toko JEHA, Toko agung lestari, Toko Hikmah', 'perjalanan dinas dalam daerah dalam rangka pengawasan sarana IRTP', NULL, 0, 0, 1, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2020-01-15', '14');
INSERT INTO `tb_surat_tugas` VALUES (14, '2020-01-15', 13, 'ROK-DAK-Monev kegiatan gizi 1', '2020-01-15', '2020-01-15', 'Desa Rengging, rt.8/rw.2 Pecangaan  Jepara', 'Pelacakan gizi buruk', NULL, 0, 0, 1, NULL, 'Pribadi', 'K9134VC', NULL, NULL, 1, NULL, '2020-01-15', '11');
INSERT INTO `tb_surat_tugas` VALUES (16, '2020-01-15', 14, '', '2020-01-16', '2020-01-16', 'BPSDMD Provinsi Jawa tengah Semarang', 'Rapat persiapan Penyelenggaraan Pelatihan Teknis/Fungsional', NULL, 1, 1, 1, NULL, 'Pribadi', NULL, NULL, NULL, 1, NULL, '2020-01-15', '13');
INSERT INTO `tb_surat_tugas` VALUES (17, '2020-01-16', 15, 'ROK-DAK-Perjalanan dinas dalam daerah dalam rangka droping obat & perbekes ke Puskesmas Kalinyamatan', '2020-01-16', '2020-01-16', 'Puskesmas Kalinyamatan', 'Pengiriman / droping obat - obatan & perbekes', NULL, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, '2020-01-16', '16');
INSERT INTO `tb_surat_tugas` VALUES (18, '2020-01-10', 16, 'SM-Undagan kunjungan kerja dalam rangka monitoring pelaksanaan pendidikan di sekolahan, bantuan hibah kepada masjid/musholla dan pelayanan kesehatan di puskesmas', '2020-01-13', '2020-01-13', 'UPTD Puskesmas Donorojo', 'monitoring pelaksanaan pelayanan kesehatan di Puskesmas', NULL, 0, 1, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, '2020-01-10', '6');
INSERT INTO `tb_surat_tugas` VALUES (19, '2020-01-17', 17, '', '2020-01-17', '2020-01-17', 'RSI Sultan Hadlirin', 'Visitasi ke RSI Sultan Hadlirin tentang kewaspadaan DBD dan penyakit menular', NULL, 0, 1, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, '2020-01-17', '7');
INSERT INTO `tb_surat_tugas` VALUES (20, '2020-01-17', 18, 'ROK-DAK-Perjalanan dinas dalam daerah dalam rangka droping obat & perbekes ke Puskesmas Batealit', '2020-01-17', '2020-01-17', 'Puskesmas Batealit', 'Pengiriman / droping obat - obatan / cairan infus & perbekes', NULL, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, '2020-01-17', '16');
INSERT INTO `tb_surat_tugas` VALUES (21, NULL, 19, '', '2020-01-14', '2020-01-14', 'Dinas Kesehatan Provinsi Jawa Tengah', 'Mengantar Perjalanan Dinas Luar Daerah (Pengambilan Hasil Penilaian DUPAK dan Sertifikat Ukom serta Konsultasi Diklat Poned ke P2KS)', NULL, 1, NULL, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, '2020-01-13', '13');

-- ----------------------------
-- Table structure for tb_user
-- ----------------------------
DROP TABLE IF EXISTS `tb_user`;
CREATE TABLE `tb_user`  (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `username_user` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `pass_user` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `level_user` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `posisi_user` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `id_pegawai` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `ket` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_user`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 26 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of tb_user
-- ----------------------------
INSERT INTO `tb_user` VALUES (3, 'Kadin', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', '2', '1', '54', NULL);
INSERT INTO `tb_user` VALUES (8, 'Sekdin', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', '3', '1', '5', 'sekdin');
INSERT INTO `tb_user` VALUES (10, 'Pemberantasan Penyakit', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', '2', '2', '6', NULL);
INSERT INTO `tb_user` VALUES (11, 'Kesehatan Masyarakat', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', '2', '3', '7', NULL);
INSERT INTO `tb_user` VALUES (12, 'Yankes dan SDK', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', '2', '4', '8', NULL);
INSERT INTO `tb_user` VALUES (13, 'Renval Keuangan', '8e2970b99bd8e42d1843b2701941b617f0a05b076e8f908015b65906e6666e40', '2', '5', '23', NULL);
INSERT INTO `tb_user` VALUES (14, 'Umum Kepegawaian', '84d89877f0d4041efb6bf91a16f0248f2fd573e6af05c19f96bedb9f882f7882', '2', '6', '110', NULL);
INSERT INTO `tb_user` VALUES (15, 'Surveilans dan Imunisasi', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', '2', '9', '10', NULL);
INSERT INTO `tb_user` VALUES (16, 'P2PM', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', '2', '7', '60', NULL);
INSERT INTO `tb_user` VALUES (17, 'P2PTM', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', '2', '8', '6', NULL);
INSERT INTO `tb_user` VALUES (18, 'Promkes dan Pemberdayaan Masyarakat', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', '2', '10', '25', NULL);
INSERT INTO `tb_user` VALUES (19, 'Kesling', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', '2', '14', '59', NULL);
INSERT INTO `tb_user` VALUES (20, 'Kesga Gizi', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', '2', '11', '5', NULL);
INSERT INTO `tb_user` VALUES (21, 'Yankes', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', '2', '15', '7', NULL);
INSERT INTO `tb_user` VALUES (22, 'Farmalkes dan Perbelkes', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', '2', '12', '18', NULL);
INSERT INTO `tb_user` VALUES (23, 'SDMK', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', '2', '13', '15', NULL);
INSERT INTO `tb_user` VALUES (24, 'Instalasi Farmasi Kabupaten', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', '2', '16', '61', NULL);
INSERT INTO `tb_user` VALUES (25, 'Laboratorium Kesehatan', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', '2', '17', '56', NULL);

SET FOREIGN_KEY_CHECKS = 1;
