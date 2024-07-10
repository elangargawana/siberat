

-- ==================Table: barang================== 

INSERT INTO `barang` (`id`, `nama`, `deskripsi`, `harga`, `stok`, `foto`, `created_at`, `updated_at`) VALUES ('1', 'Crane Crawler Hitachi KH180-3', 'Crane crawler dengan kapasitas angkat 50 ton dan boom panjang maksimal 58 meter.', '99999999.99', '3', 'crane_hitachi_kh180-3.jpg', '', '');


-- ==================Table: detail_penawaran================== 

INSERT INTO `detail_penawaran` (`id`, `id_penawaran`, `id_barang`, `kuantitas`, `harga_per_barang`) VALUES ('1', '1', '1', '5', '20000000.00');


-- ==================Table: menus================== 

INSERT INTO `menus` (`id`, `nama_menu`, `url`, `icon`, `id_html`, `parent_id`, `urutan`) VALUES ('1', 'Menu Manajemen', '#', '', '', '0', '1');
INSERT INTO `menus` (`id`, `nama_menu`, `url`, `icon`, `id_html`, `parent_id`, `urutan`) VALUES ('2', 'Dashboard', 'home', 'fas fa-home', '', '1', '1');
INSERT INTO `menus` (`id`, `nama_menu`, `url`, `icon`, `id_html`, `parent_id`, `urutan`) VALUES ('3', 'Manajemen Pengguna', '#', 'fas fa-users-cog', '', '1', '2');
INSERT INTO `menus` (`id`, `nama_menu`, `url`, `icon`, `id_html`, `parent_id`, `urutan`) VALUES ('4', 'Kelola Pengguna', 'manage-user', '', '', '3', '1');
INSERT INTO `menus` (`id`, `nama_menu`, `url`, `icon`, `id_html`, `parent_id`, `urutan`) VALUES ('5', 'Kelola Role', 'manage-role', '', '', '3', '2');
INSERT INTO `menus` (`id`, `nama_menu`, `url`, `icon`, `id_html`, `parent_id`, `urutan`) VALUES ('6', 'Kelola Menu', 'manage-menu', '', '', '3', '3');
INSERT INTO `menus` (`id`, `nama_menu`, `url`, `icon`, `id_html`, `parent_id`, `urutan`) VALUES ('7', 'Backup Server', '#', '', '', '0', '2');
INSERT INTO `menus` (`id`, `nama_menu`, `url`, `icon`, `id_html`, `parent_id`, `urutan`) VALUES ('8', 'Backup Database', 'dbbackup', 'fas fa-database', '', '7', '1');
INSERT INTO `menus` (`id`, `nama_menu`, `url`, `icon`, `id_html`, `parent_id`, `urutan`) VALUES ('9', 'Referensi', '#', 'fas fa-user-tag', '', '1', '3');
INSERT INTO `menus` (`id`, `nama_menu`, `url`, `icon`, `id_html`, `parent_id`, `urutan`) VALUES ('10', 'Barang', 'manage-barang', '', '', '9', '2');
INSERT INTO `menus` (`id`, `nama_menu`, `url`, `icon`, `id_html`, `parent_id`, `urutan`) VALUES ('11', 'Penawaran', 'manage-penawaran', '', '', '20', '3');
INSERT INTO `menus` (`id`, `nama_menu`, `url`, `icon`, `id_html`, `parent_id`, `urutan`) VALUES ('12', 'Purchase Order', 'manage-purchaseorder', '', '', '20', '4');
INSERT INTO `menus` (`id`, `nama_menu`, `url`, `icon`, `id_html`, `parent_id`, `urutan`) VALUES ('14', 'Selesai', '#', '', '', '9', '6');
INSERT INTO `menus` (`id`, `nama_menu`, `url`, `icon`, `id_html`, `parent_id`, `urutan`) VALUES ('15', 'Menu Manajemen', '#', '', '', '0', '1');
INSERT INTO `menus` (`id`, `nama_menu`, `url`, `icon`, `id_html`, `parent_id`, `urutan`) VALUES ('16', 'Dashboard', 'home', 'fas fa-home', '', '15', '1');
INSERT INTO `menus` (`id`, `nama_menu`, `url`, `icon`, `id_html`, `parent_id`, `urutan`) VALUES ('17', 'Manajemen Pengguna', '#', 'fas fa-users-cog', '', '15', '2');
INSERT INTO `menus` (`id`, `nama_menu`, `url`, `icon`, `id_html`, `parent_id`, `urutan`) VALUES ('18', 'Kelola Pengguna', 'manage-user', '', '', '17', '1');
INSERT INTO `menus` (`id`, `nama_menu`, `url`, `icon`, `id_html`, `parent_id`, `urutan`) VALUES ('19', 'Konsumen', 'manage-konsumen', '', '', '9', '1');
INSERT INTO `menus` (`id`, `nama_menu`, `url`, `icon`, `id_html`, `parent_id`, `urutan`) VALUES ('20', 'Transaksi', '#', 'fas fa-money-bill-wave', '', '1', '1');
INSERT INTO `menus` (`id`, `nama_menu`, `url`, `icon`, `id_html`, `parent_id`, `urutan`) VALUES ('21', 'Menu Manajemen', '#', '', '', '0', '1');
INSERT INTO `menus` (`id`, `nama_menu`, `url`, `icon`, `id_html`, `parent_id`, `urutan`) VALUES ('22', 'Dashboard', 'home', 'fas fa-home', '', '21', '1');
INSERT INTO `menus` (`id`, `nama_menu`, `url`, `icon`, `id_html`, `parent_id`, `urutan`) VALUES ('23', 'Manajemen Pengguna', '#', 'fas fa-users-cog', '', '21', '2');
INSERT INTO `menus` (`id`, `nama_menu`, `url`, `icon`, `id_html`, `parent_id`, `urutan`) VALUES ('24', 'Kelola Pengguna', 'manage-user', '', '', '23', '1');
INSERT INTO `menus` (`id`, `nama_menu`, `url`, `icon`, `id_html`, `parent_id`, `urutan`) VALUES ('25', 'Menu Manajemen', '#', '', '', '0', '1');
INSERT INTO `menus` (`id`, `nama_menu`, `url`, `icon`, `id_html`, `parent_id`, `urutan`) VALUES ('26', 'Dashboard', 'home', 'fas fa-home', '', '25', '1');
INSERT INTO `menus` (`id`, `nama_menu`, `url`, `icon`, `id_html`, `parent_id`, `urutan`) VALUES ('27', 'Manajemen Pengguna', '#', 'fas fa-users-cog', '', '25', '2');
INSERT INTO `menus` (`id`, `nama_menu`, `url`, `icon`, `id_html`, `parent_id`, `urutan`) VALUES ('28', 'Kelola Pengguna', 'manage-user', '', '', '27', '1');


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
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES ('10', '2024_04_24_162837_bisa', '3');
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES ('11', '2024_04_25_074649_konsumen', '4');
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES ('12', '2024_05_15_234819_add_timestamps_to_barang_table', '5');
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES ('13', '2024_05_16_001339_add_updated_at_to_konsumen_table', '5');
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES ('14', '2024_05_16_080017_add_timestamps_to_penawaran_table', '5');
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES ('15', '2024_05_16_085143_add_timestamps_to_purchase_order_table', '5');


-- ==================Table: model_has_roles================== 

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES ('1', 'App\\Models\\User', '1');


-- ==================Table: penawaran================== 

INSERT INTO `penawaran` (`id`, `id_konsumen`, `tanggal`, `nomor`, `status`, `total_harga`, `created_at`, `updated_at`) VALUES ('1', '1', '2024-04-25', '25042024001', 'Menunggu', '15000000.00', '', '');


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


-- ==================Table: purchase_order================== 

INSERT INTO `purchase_order` (`id`, `id_penawaran`, `tanggal`, `nomor`, `total_harga`, `status_pembayaran`, `created_at`, `updated_at`) VALUES ('1', '1', '2024-04-25', '250420241111', '12000000.00', 'Berhasil', '', '');


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
INSERT INTO `role_has_menus` (`id`, `menu_id`, `role_id`) VALUES ('11', '11', '1');
INSERT INTO `role_has_menus` (`id`, `menu_id`, `role_id`) VALUES ('12', '12', '1');
INSERT INTO `role_has_menus` (`id`, `menu_id`, `role_id`) VALUES ('13', '13', '1');
INSERT INTO `role_has_menus` (`id`, `menu_id`, `role_id`) VALUES ('15', '19', '1');
INSERT INTO `role_has_menus` (`id`, `menu_id`, `role_id`) VALUES ('16', '10', '1');
INSERT INTO `role_has_menus` (`id`, `menu_id`, `role_id`) VALUES ('18', '20', '1');


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


-- ==================Table: users================== 

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES ('1', 'Super Admin', 'superadmin@gmail.com', '2024-04-17 10:27:29', '$2y$10$lsz9mQGtsprpqvMFlAABBO9HBCY0QRx2DFD/c1TSQwZp7sMkaNXCi', '3vpj0q6mI4prFOcmBg2d6mE711aSgfZFnYx2Vt2CoIBUMEdUyMUvDbFmTmlO', '2024-04-17 10:27:29', '2024-04-17 10:27:29');
