

-- ==================Table: buatform================== 

INSERT INTO `buatform` (`kode_barang`, `nama_barang`, `harga_barang`, `jumlah_barang`, `nama_klien`, `alamat_klien`) VALUES ('123', 'Truk', '0', '0', '', '0');
INSERT INTO `buatform` (`kode_barang`, `nama_barang`, `harga_barang`, `jumlah_barang`, `nama_klien`, `alamat_klien`) VALUES ('123', 'Truk', '100', '0', '', '0');
INSERT INTO `buatform` (`kode_barang`, `nama_barang`, `harga_barang`, `jumlah_barang`, `nama_klien`, `alamat_klien`) VALUES ('123', 'Truk', '100', '0', '', '0');
INSERT INTO `buatform` (`kode_barang`, `nama_barang`, `harga_barang`, `jumlah_barang`, `nama_klien`, `alamat_klien`) VALUES ('123', 'Truk', '100', '0', '', '0');
INSERT INTO `buatform` (`kode_barang`, `nama_barang`, `harga_barang`, `jumlah_barang`, `nama_klien`, `alamat_klien`) VALUES ('123', 'Truk', '100', '0', '', '0');
INSERT INTO `buatform` (`kode_barang`, `nama_barang`, `harga_barang`, `jumlah_barang`, `nama_klien`, `alamat_klien`) VALUES ('123', 'Truk', '100', '0', '', '0');
INSERT INTO `buatform` (`kode_barang`, `nama_barang`, `harga_barang`, `jumlah_barang`, `nama_klien`, `alamat_klien`) VALUES ('123', 'Truk', '100', '0', '', '0');
INSERT INTO `buatform` (`kode_barang`, `nama_barang`, `harga_barang`, `jumlah_barang`, `nama_klien`, `alamat_klien`) VALUES ('123', 'Truk', '100', '0', '', '0');
INSERT INTO `buatform` (`kode_barang`, `nama_barang`, `harga_barang`, `jumlah_barang`, `nama_klien`, `alamat_klien`) VALUES ('123', 'Truk', '100', '1', 'aca', '0');
INSERT INTO `buatform` (`kode_barang`, `nama_barang`, `harga_barang`, `jumlah_barang`, `nama_klien`, `alamat_klien`) VALUES ('123', 'Truk', '100', '1', 'aca', '0');


-- ==================Table: buatpenawaran================== 

INSERT INTO `buatpenawaran` (`alamat_klien`, `nama_klien`) VALUES ('jlaan salak', 'aca');
INSERT INTO `buatpenawaran` (`alamat_klien`, `nama_klien`) VALUES ('jlaan salak', 'aca');
INSERT INTO `buatpenawaran` (`alamat_klien`, `nama_klien`) VALUES ('jlaan salak', 'aca');
INSERT INTO `buatpenawaran` (`alamat_klien`, `nama_klien`) VALUES ('jlaan salak', 'aca');
INSERT INTO `buatpenawaran` (`alamat_klien`, `nama_klien`) VALUES ('jlaan salak', 'aca');
INSERT INTO `buatpenawaran` (`alamat_klien`, `nama_klien`) VALUES ('jlaan salak', 'aca');
INSERT INTO `buatpenawaran` (`alamat_klien`, `nama_klien`) VALUES ('jlaan salak', 'aca');


-- ==================Table: menus================== 

INSERT INTO `menus` (`id`, `nama_menu`, `url`, `icon`, `id_html`, `parent_id`, `urutan`) VALUES ('1', 'Menu Manajemen', '#', '', '', '0', '1');
INSERT INTO `menus` (`id`, `nama_menu`, `url`, `icon`, `id_html`, `parent_id`, `urutan`) VALUES ('2', 'Dashboard', 'home', 'fas fa-home', '', '1', '1');
INSERT INTO `menus` (`id`, `nama_menu`, `url`, `icon`, `id_html`, `parent_id`, `urutan`) VALUES ('3', 'Manajemen Pengguna', '#', 'fas fa-users-cog', '', '1', '2');
INSERT INTO `menus` (`id`, `nama_menu`, `url`, `icon`, `id_html`, `parent_id`, `urutan`) VALUES ('4', 'Kelola Pengguna', 'manage-user', '', '', '3', '1');
INSERT INTO `menus` (`id`, `nama_menu`, `url`, `icon`, `id_html`, `parent_id`, `urutan`) VALUES ('5', 'Kelola Role', 'manage-role', '', '', '3', '2');
INSERT INTO `menus` (`id`, `nama_menu`, `url`, `icon`, `id_html`, `parent_id`, `urutan`) VALUES ('6', 'Kelola Menu', 'manage-menu', '', '', '3', '3');
INSERT INTO `menus` (`id`, `nama_menu`, `url`, `icon`, `id_html`, `parent_id`, `urutan`) VALUES ('7', 'Backup Server', '#', '', '', '0', '2');
INSERT INTO `menus` (`id`, `nama_menu`, `url`, `icon`, `id_html`, `parent_id`, `urutan`) VALUES ('8', 'Backup Database', 'dbbackup', 'fas fa-database', '', '7', '1');
INSERT INTO `menus` (`id`, `nama_menu`, `url`, `icon`, `id_html`, `parent_id`, `urutan`) VALUES ('9', 'Siberat', '#', 'fas fa-truck', '', '1', '3');
INSERT INTO `menus` (`id`, `nama_menu`, `url`, `icon`, `id_html`, `parent_id`, `urutan`) VALUES ('10', 'Barang', '#', '', '', '9', '1');
INSERT INTO `menus` (`id`, `nama_menu`, `url`, `icon`, `id_html`, `parent_id`, `urutan`) VALUES ('11', 'Penawaran', 'manage-penawaran', '', '', '9', '2');
INSERT INTO `menus` (`id`, `nama_menu`, `url`, `icon`, `id_html`, `parent_id`, `urutan`) VALUES ('12', 'Pembayaran', 'manage-purchaseorder', '', '', '9', '3');
INSERT INTO `menus` (`id`, `nama_menu`, `url`, `icon`, `id_html`, `parent_id`, `urutan`) VALUES ('13', 'Pengiriman', 'manage-suratjalan', '', '', '9', '4');
INSERT INTO `menus` (`id`, `nama_menu`, `url`, `icon`, `id_html`, `parent_id`, `urutan`) VALUES ('14', 'Selesai', '#', '', '', '9', '5');
INSERT INTO `menus` (`id`, `nama_menu`, `url`, `icon`, `id_html`, `parent_id`, `urutan`) VALUES ('15', 'Menu Manajemen', '#', '', '', '0', '1');
INSERT INTO `menus` (`id`, `nama_menu`, `url`, `icon`, `id_html`, `parent_id`, `urutan`) VALUES ('16', 'Dashboard', 'home', 'fas fa-home', '', '15', '1');
INSERT INTO `menus` (`id`, `nama_menu`, `url`, `icon`, `id_html`, `parent_id`, `urutan`) VALUES ('17', 'Manajemen Pengguna', '#', 'fas fa-users-cog', '', '15', '2');
INSERT INTO `menus` (`id`, `nama_menu`, `url`, `icon`, `id_html`, `parent_id`, `urutan`) VALUES ('18', 'Kelola Pengguna', 'manage-user', '', '', '17', '1');


-- ==================Table: migrations================== 

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES ('1', '2014_10_12_000000_create_users_table', '1');
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES ('2', '2014_10_12_100000_create_password_resets_table', '1');
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES ('3', '2019_08_19_000000_create_failed_jobs_table', '1');
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES ('4', '2019_12_14_000001_create_personal_access_tokens_table', '1');
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES ('5', '2024_01_01_234158_create_menus_table', '1');
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES ('6', '2024_02_02_053619_create_permission_tables', '1');
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES ('7', '2024_02_03_232722_create_role_has_menus_tables', '1');
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES ('8', '2024_02_03_235312_add_menu_id_on_permission', '1');
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES ('9', '2024_04_17_104341_menu', '2');


-- ==================Table: model_has_roles================== 

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES ('1', 'App\\Models\\User', '1');


-- ==================Table: permissions================== 

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`, `menu_id`) VALUES ('1', 'create_user', 'web', '2024-04-17 10:27:28', '2024-04-17 10:27:28', '4');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`, `menu_id`) VALUES ('2', 'read_user', 'web', '2024-04-17 10:27:28', '2024-04-17 10:27:28', '4');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`, `menu_id`) VALUES ('3', 'update_user', 'web', '2024-04-17 10:27:28', '2024-04-17 10:27:28', '4');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`, `menu_id`) VALUES ('4', 'delete_user', 'web', '2024-04-17 10:27:28', '2024-04-17 10:27:28', '4');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`, `menu_id`) VALUES ('5', 'create_role', 'web', '2024-04-17 10:27:28', '2024-04-17 10:27:28', '5');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`, `menu_id`) VALUES ('6', 'read_role', 'web', '2024-04-17 10:27:28', '2024-04-17 10:27:28', '5');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`, `menu_id`) VALUES ('7', 'update_role', 'web', '2024-04-17 10:27:28', '2024-04-17 10:27:28', '5');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`, `menu_id`) VALUES ('8', 'delete_role', 'web', '2024-04-17 10:27:28', '2024-04-17 10:27:28', '5');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`, `menu_id`) VALUES ('9', 'create_menu', 'web', '2024-04-17 10:27:28', '2024-04-17 10:27:28', '6');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`, `menu_id`) VALUES ('10', 'read_menu', 'web', '2024-04-17 10:27:28', '2024-04-17 10:27:28', '6');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`, `menu_id`) VALUES ('11', 'update_menu', 'web', '2024-04-17 10:27:28', '2024-04-17 10:27:28', '6');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`, `menu_id`) VALUES ('12', 'delete_menu', 'web', '2024-04-17 10:27:28', '2024-04-17 10:27:28', '6');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`, `menu_id`) VALUES ('13', 'backup_database', 'web', '2024-04-17 10:27:28', '2024-04-17 10:27:28', '8');


-- ==================Table: pesananpembelian================== 

INSERT INTO `pesananpembelian` (`id`, `Nama_Vendor`, `Alamat_Vendor`, `Kontak_Vendor`, `Nomor_PO`, `Tanggal_PO`, `Tanggal_Pengiriman`, `Deskripsi_Item`, `Jumlah`, `Harga_Satuan`) VALUES ('1', 'jjjj', 'indonesia', '000088', '12122', '2024-04-17', '2024-04-18', 'bagus', '1', '2000.00');
INSERT INTO `pesananpembelian` (`id`, `Nama_Vendor`, `Alamat_Vendor`, `Kontak_Vendor`, `Nomor_PO`, `Tanggal_PO`, `Tanggal_Pengiriman`, `Deskripsi_Item`, `Jumlah`, `Harga_Satuan`) VALUES ('2', 'jjjj', 'indonesia', '000088', '12122', '2024-04-17', '2024-04-18', 'bagus', '1', '2000.00');
INSERT INTO `pesananpembelian` (`id`, `Nama_Vendor`, `Alamat_Vendor`, `Kontak_Vendor`, `Nomor_PO`, `Tanggal_PO`, `Tanggal_Pengiriman`, `Deskripsi_Item`, `Jumlah`, `Harga_Satuan`) VALUES ('3', 'jjjj', 'jjj', '000088', '12122', '0000-00-00', '0000-00-00', 'bagus', '1', '2000.00');


-- ==================Table: roles================== 

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES ('1', 'superadmin', 'web', '2024-04-17 10:27:29', '2024-04-17 10:27:29');


-- ==================Table: role_has_menus================== 

INSERT INTO `role_has_menus` (`id`, `menu_id`, `role_id`) VALUES ('1', '1', '1');
INSERT INTO `role_has_menus` (`id`, `menu_id`, `role_id`) VALUES ('2', '2', '1');
INSERT INTO `role_has_menus` (`id`, `menu_id`, `role_id`) VALUES ('3', '3', '1');
INSERT INTO `role_has_menus` (`id`, `menu_id`, `role_id`) VALUES ('4', '4', '1');
INSERT INTO `role_has_menus` (`id`, `menu_id`, `role_id`) VALUES ('5', '5', '1');
INSERT INTO `role_has_menus` (`id`, `menu_id`, `role_id`) VALUES ('6', '6', '1');
INSERT INTO `role_has_menus` (`id`, `menu_id`, `role_id`) VALUES ('7', '7', '1');
INSERT INTO `role_has_menus` (`id`, `menu_id`, `role_id`) VALUES ('8', '8', '1');
INSERT INTO `role_has_menus` (`id`, `menu_id`, `role_id`) VALUES ('9', '9', '1');
INSERT INTO `role_has_menus` (`id`, `menu_id`, `role_id`) VALUES ('10', '10', '1');
INSERT INTO `role_has_menus` (`id`, `menu_id`, `role_id`) VALUES ('11', '11', '1');
INSERT INTO `role_has_menus` (`id`, `menu_id`, `role_id`) VALUES ('12', '12', '1');
INSERT INTO `role_has_menus` (`id`, `menu_id`, `role_id`) VALUES ('13', '13', '1');


-- ==================Table: role_has_permissions================== 

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES ('1', '1');
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES ('2', '1');
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES ('3', '1');
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES ('4', '1');
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES ('5', '1');
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES ('6', '1');
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES ('7', '1');
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES ('8', '1');
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES ('9', '1');
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES ('10', '1');
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES ('11', '1');
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES ('12', '1');
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES ('13', '1');


-- ==================Table: surat_jalan================== 

INSERT INTO `surat_jalan` (`id`, `nomor_surat`, `tanggal`, `pengirim`, `alamat_pengirim`, `penerima`, `alamat_penerima`, `deskripsi_barang`, `jumlah`, `harga_satuan`, `total_harga`) VALUES ('1', '12345', '2024-04-17', 'lisa', 'thailan', 'jeni', 'korea', 'barang kece', '1', '10000.00', '10000.00');


-- ==================Table: users================== 

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES ('1', 'Super Admin', 'superadmin@gmail.com', '2024-04-17 10:27:29', '$2y$10$lsz9mQGtsprpqvMFlAABBO9HBCY0QRx2DFD/c1TSQwZp7sMkaNXCi', 'Ur2bsS2dbX', '2024-04-17 10:27:29', '2024-04-17 10:27:29');
