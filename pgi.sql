/*
Navicat MySQL Data Transfer

Source Server         : Laragon - Server
Source Server Version : 50724
Source Host           : localhost:3306
Source Database       : pgi

Target Server Type    : MYSQL
Target Server Version : 50724
File Encoding         : 65001

Date: 2020-06-30 14:53:42
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for documentos
-- ----------------------------
DROP TABLE IF EXISTS `documentos`;
CREATE TABLE `documentos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nro_doc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `destinatario` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipo_id` int(10) unsigned NOT NULL,
  `asunto` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `referencia` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `nombre_documento` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contenido_documento` longtext COLLATE utf8mb4_unicode_ci,
  `state` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `documentos_tipo_id_foreign` (`tipo_id`),
  KEY `documentos_user_id_foreign` (`user_id`),
  CONSTRAINT `documentos_tipo_id_foreign` FOREIGN KEY (`tipo_id`) REFERENCES `tipos_documento` (`id`),
  CONSTRAINT `documentos_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of documentos
-- ----------------------------

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES ('1', '2014_10_12_000000_create_users_table', '1');
INSERT INTO `migrations` VALUES ('2', '2014_10_12_100000_create_password_resets_table', '1');
INSERT INTO `migrations` VALUES ('3', '2018_01_23_225820_create_seccion_table', '1');
INSERT INTO `migrations` VALUES ('4', '2018_01_24_070819_create_rol_table', '1');
INSERT INTO `migrations` VALUES ('5', '2018_01_24_070841_create_rol_seccion_table', '1');
INSERT INTO `migrations` VALUES ('6', '2018_02_02_013621_create_users_rol_table', '2');
INSERT INTO `migrations` VALUES ('7', '2018_02_12_125909_create_doc_type_table', '3');
INSERT INTO `migrations` VALUES ('19', '2018_02_12_233734_create_document_table', '4');
INSERT INTO `migrations` VALUES ('22', '2020_06_26_065133_create_model_people_table', '5');
INSERT INTO `migrations` VALUES ('25', '2020_06_26_105735_create_model_quotes_table', '6');

-- ----------------------------
-- Table structure for password_resets
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of password_resets
-- ----------------------------
INSERT INTO `password_resets` VALUES ('edi.villamar@gmail.com', '$2y$10$O1gMewEpOpcovwxTiOppl.4QgqCczBuyDkKo5ibl6Kik/a6CCAG42', '2020-06-29 16:29:30');

-- ----------------------------
-- Table structure for persons
-- ----------------------------
DROP TABLE IF EXISTS `persons`;
CREATE TABLE `persons` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `fullnames` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of persons
-- ----------------------------
INSERT INTO `persons` VALUES ('5', 'Ruth Guatumillo', 'ruthguatumillo@pgi.com', '+5930987654', '2020-06-26 16:59:08', '2020-06-26 16:59:08');
INSERT INTO `persons` VALUES ('7', 'Edison Villamar Segura', 'edi.villamar@gmail.com', '0967520836', '2020-06-29 15:25:19', '2020-06-29 15:25:19');

-- ----------------------------
-- Table structure for quotes
-- ----------------------------
DROP TABLE IF EXISTS `quotes`;
CREATE TABLE `quotes` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `persons_id` bigint(20) unsigned NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` datetime NOT NULL,
  `observation` text COLLATE utf8mb4_unicode_ci,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `quotes_persons_id_index` (`persons_id`),
  CONSTRAINT `quotes_persons_id_foreign` FOREIGN KEY (`persons_id`) REFERENCES `persons` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of quotes
-- ----------------------------
INSERT INTO `quotes` VALUES ('2', '5', 'CONSEJERIA DE MATRIMONIO', 'CONSEJO PARA MATRIMONIO', '', '2020-06-30 05:09:00', 'SALA DE ZOOM 854-5555-7845', '0', '2020-06-29 14:31:11', '2020-06-30 10:32:20');

-- ----------------------------
-- Table structure for roles
-- ----------------------------
DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre_rol` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of roles
-- ----------------------------
INSERT INTO `roles` VALUES ('1', 'Administrador', '2018-02-02 17:10:16', '2018-02-02 17:10:16');
INSERT INTO `roles` VALUES ('2', 'Sistemas', '2018-02-02 17:10:28', '2018-02-02 17:10:28');
INSERT INTO `roles` VALUES ('3', 'Personal', '2018-02-08 12:08:07', '2018-02-08 12:13:42');
INSERT INTO `roles` VALUES ('4', 'Recepcionista', '2020-06-29 12:45:47', '2020-06-29 12:45:47');

-- ----------------------------
-- Table structure for secciones
-- ----------------------------
DROP TABLE IF EXISTS `secciones`;
CREATE TABLE `secciones` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre_seccion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ruta` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of secciones
-- ----------------------------
INSERT INTO `secciones` VALUES ('1', 'Panel de Administración', 'Sección', '/dash', '2018-02-02 17:08:54', '2018-02-02 17:08:54');
INSERT INTO `secciones` VALUES ('2', 'Crear Usuario', 'Sub-Sección', '/dash/user/new', '2018-02-02 17:09:12', '2018-02-04 16:48:38');
INSERT INTO `secciones` VALUES ('3', 'Lista de Usuarios Registrados', 'Sub-Sección', '/dash/user/list', '2018-02-02 17:09:31', '2018-02-02 17:09:31');
INSERT INTO `secciones` VALUES ('4', 'Crear Sección de Acceso', 'Sub-Sección', '/dash/seccion/new', '2018-02-08 14:02:23', '2018-02-08 14:02:23');
INSERT INTO `secciones` VALUES ('5', 'Lista de Roles Registrados', 'Sub-Sección', '/dash/rol/list', '2018-02-08 14:03:30', '2018-02-08 14:03:30');
INSERT INTO `secciones` VALUES ('6', 'Crear Citas', 'Sub-Sección', '/dash/quote/new', '2020-06-29 12:51:19', '2020-06-29 12:51:41');
INSERT INTO `secciones` VALUES ('7', 'Listado de Citas', 'Sub-Sección', '/dash/quote/list', '2020-06-29 12:58:33', '2020-06-29 12:58:33');

-- ----------------------------
-- Table structure for secciones_rol
-- ----------------------------
DROP TABLE IF EXISTS `secciones_rol`;
CREATE TABLE `secciones_rol` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `rol_id` int(10) unsigned NOT NULL,
  `seccion_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `secciones_rol_rol_id_foreign` (`rol_id`),
  KEY `secciones_rol_seccion_id_foreign` (`seccion_id`),
  CONSTRAINT `secciones_rol_rol_id_foreign` FOREIGN KEY (`rol_id`) REFERENCES `roles` (`id`),
  CONSTRAINT `secciones_rol_seccion_id_foreign` FOREIGN KEY (`seccion_id`) REFERENCES `secciones` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of secciones_rol
-- ----------------------------
INSERT INTO `secciones_rol` VALUES ('16', '3', '2', '2018-02-08 12:13:42', '2018-02-08 12:13:42');
INSERT INTO `secciones_rol` VALUES ('17', '3', '3', '2018-02-08 12:13:43', '2018-02-08 12:13:43');
INSERT INTO `secciones_rol` VALUES ('18', '2', '3', '2018-02-08 12:13:53', '2018-02-08 12:13:53');
INSERT INTO `secciones_rol` VALUES ('19', '1', '1', '2020-06-29 12:42:19', '2020-06-29 12:42:19');
INSERT INTO `secciones_rol` VALUES ('20', '1', '2', '2020-06-29 12:42:19', '2020-06-29 12:42:19');
INSERT INTO `secciones_rol` VALUES ('21', '1', '4', '2020-06-29 12:42:20', '2020-06-29 12:42:20');
INSERT INTO `secciones_rol` VALUES ('22', '1', '5', '2020-06-29 12:42:20', '2020-06-29 12:42:20');
INSERT INTO `secciones_rol` VALUES ('25', '4', '7', '2020-06-29 12:59:00', '2020-06-29 12:59:00');
INSERT INTO `secciones_rol` VALUES ('26', '4', '6', '2020-06-29 12:59:00', '2020-06-29 12:59:00');

-- ----------------------------
-- Table structure for tipos_documento
-- ----------------------------
DROP TABLE IF EXISTS `tipos_documento`;
CREATE TABLE `tipos_documento` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of tipos_documento
-- ----------------------------
INSERT INTO `tipos_documento` VALUES ('1', 'Memorandum', '2018-02-12 14:08:27', '2018-02-12 14:08:27');
INSERT INTO `tipos_documento` VALUES ('2', 'Oficio', '2018-02-12 14:11:52', '2018-02-12 14:11:52');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', 'pgi', 'pgi', 'pgi@pgi.com', '$2y$10$UQpTaPRpMfvG8F/3Iue5N.n6XCDx1WmMbtHzVI0.GGhdGE/qN.o.i', 'BhxwJ95KBHLKhS9SfaodrLW9Qgoj8QtVBmaw1YYmbCtOrEkEqpIzqKS8dwR4', '2018-02-02 17:08:18', '2020-06-28 16:46:17');
INSERT INTO `users` VALUES ('2', 'Edison Villamar Segura', 'edison.villamar', 'edi.villamar@gmail.com', '$2y$10$bWpzM5aBmSkCJCkdQQDBBekSJOcj0D9xnnCB.DHseWKNgRLW..j/e', '8UHFb3rJtRuhBkv7NmfgQDtZBr6ucIV5zSjxlIUIVdVrWdQInfeIW8LHHiS9', '2020-06-29 12:40:06', '2020-06-29 12:40:06');
INSERT INTO `users` VALUES ('3', 'Jose Lozada', 'xeferino', 'josegregoriolozadae@gmail.com', '$2y$10$85iS6oeBXbzWd5lzpvMELOhUkLj6jhXQAk4G9gjWzrZs4vXRx80lC', 'PkUMkUfAybptagvBIAwIetNnblptPPyLUxEqDeFjY5Iur9EuG2ifrgavaw5R', '2020-06-29 12:53:03', '2020-06-29 12:53:03');

-- ----------------------------
-- Table structure for users_rol
-- ----------------------------
DROP TABLE IF EXISTS `users_rol`;
CREATE TABLE `users_rol` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `rol_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `users_rol_user_id_foreign` (`user_id`),
  KEY `users_rol_rol_id_foreign` (`rol_id`),
  CONSTRAINT `users_rol_rol_id_foreign` FOREIGN KEY (`rol_id`) REFERENCES `roles` (`id`),
  CONSTRAINT `users_rol_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of users_rol
-- ----------------------------
INSERT INTO `users_rol` VALUES ('1', '2', '2', '2020-06-29 12:40:25', '2020-06-29 16:28:18');
INSERT INTO `users_rol` VALUES ('2', '3', '4', '2020-06-29 12:53:15', '2020-06-29 12:53:15');
