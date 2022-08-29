-- MySQL dump 10.13  Distrib 5.7.30, for Linux (x86_64)
--
-- Host: localhost    Database: gold
-- ------------------------------------------------------
-- Server version	5.7.30

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `guias`
--

DROP TABLE IF EXISTS `guias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `guias` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `numero` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tracking` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha` date DEFAULT NULL,
  `cliente_retail_id` bigint(20) unsigned DEFAULT NULL,
  `cliente_corp_id` int(10) unsigned DEFAULT NULL,
  `cliente_int_id` bigint(20) unsigned DEFAULT NULL,
  `origen_id` bigint(20) unsigned NOT NULL,
  `destino_id` bigint(20) unsigned NOT NULL,
  `servicio_entrega` enum('REC','DOM') COLLATE utf8mb4_unicode_ci NOT NULL,
  `servicio_importacion` enum('AER','MAR') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `producto_id` bigint(20) unsigned NOT NULL,
  `forma_pago` enum('PPD','COD','CRD') COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombre_remitente` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `direccion_remitente` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefono_remitente` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefono_movil_remitente` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_remitente` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nombre_destinatario` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `direccion_destinatario` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefono_destinatario` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefono_movil_destinatario` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_destinatario` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sexo_destinatario` char(1) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contenido` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `piezas` int(11) NOT NULL DEFAULT '1',
  `valor_declarado` decimal(12,2) NOT NULL,
  `modo_valor` char(2) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tipo_export` enum('FORMAL','COURIER') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `asegurado` tinyint(1) NOT NULL DEFAULT '1',
  `total` decimal(18,5) DEFAULT NULL,
  `estado` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ciudad` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `codigo_postal` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tasa` decimal(12,2) DEFAULT '0.00',
  `ubicacion` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vendedor_id` int(10) unsigned DEFAULT NULL,
  `tarifa_id` int(10) unsigned DEFAULT NULL,
  `tarifa_agente_id` bigint(20) unsigned DEFAULT NULL,
  `receptoria_origen_id` int(10) unsigned DEFAULT NULL,
  `receptoria_destino_id` int(10) unsigned DEFAULT NULL,
  `kilos` decimal(10,2) DEFAULT '0.00',
  `libras` decimal(10,2) DEFAULT '0.00',
  `largo` decimal(10,2) DEFAULT '0.00',
  `ancho` decimal(10,2) DEFAULT '0.00',
  `alto` decimal(10,2) DEFAULT '0.00',
  `volumen` decimal(10,3) DEFAULT '0.000',
  `pies_cub` decimal(10,3) DEFAULT '0.000',
  `metros_cub` decimal(10,3) DEFAULT '0.000',
  `cedula_destinatario` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `factura_id` bigint(20) unsigned DEFAULT NULL,
  `guia_pod_id` bigint(20) unsigned DEFAULT NULL,
  `nota_entrega_id` bigint(20) unsigned DEFAULT NULL,
  `observacion` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `referencia_exp` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `razones_exp` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `created_by` bigint(20) unsigned DEFAULT NULL,
  `updated_by` bigint(20) unsigned DEFAULT NULL,
  `deleted_by` bigint(20) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `guias_numero_unique` (`numero`),
  UNIQUE KEY `guias_tracking_unique` (`tracking`),
  KEY `guias_cliente_retail_id_foreign` (`cliente_retail_id`),
  KEY `guias_cliente_corp_id_foreign` (`cliente_corp_id`),
  KEY `guias_cliente_int_id_foreign` (`cliente_int_id`),
  KEY `guias_origen_id_foreign` (`origen_id`),
  KEY `guias_destino_id_foreign` (`destino_id`),
  KEY `guias_producto_id_foreign` (`producto_id`),
  KEY `guias_vendedor_id_foreign` (`vendedor_id`),
  KEY `guias_tarifa_id_foreign` (`tarifa_id`),
  KEY `guias_receptoria_origen_foreign` (`receptoria_origen_id`),
  KEY `guias_receptoria_destino_foreign` (`receptoria_destino_id`),
  KEY `guias_FK` (`guia_pod_id`),
  KEY `guias_nota_entrega_id_foreign` (`nota_entrega_id`),
  KEY `guias_tarifa_agente_id_foreign` (`tarifa_agente_id`),
  KEY `guias_factura_id_index` (`factura_id`),
  CONSTRAINT `guias_FK` FOREIGN KEY (`guia_pod_id`) REFERENCES `guia_pod` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `guias_cliente_corp_id_foreign` FOREIGN KEY (`cliente_corp_id`) REFERENCES `master_cliente` (`codi_clie`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `guias_cliente_int_id_foreign` FOREIGN KEY (`cliente_int_id`) REFERENCES `clientes_internacional` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `guias_cliente_retail_id_foreign` FOREIGN KEY (`cliente_retail_id`) REFERENCES `clientes_retail` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `guias_destino_id_foreign` FOREIGN KEY (`destino_id`) REFERENCES `sucursales` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `guias_nota_entrega_id_foreign` FOREIGN KEY (`nota_entrega_id`) REFERENCES `nota_entrega` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `guias_origen_id_foreign` FOREIGN KEY (`origen_id`) REFERENCES `sucursales` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `guias_producto_id_foreign` FOREIGN KEY (`producto_id`) REFERENCES `productos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `guias_receptoria_destino_foreign` FOREIGN KEY (`receptoria_destino_id`) REFERENCES `counter` (`id`),
  CONSTRAINT `guias_receptoria_origen_foreign` FOREIGN KEY (`receptoria_origen_id`) REFERENCES `counter` (`id`),
  CONSTRAINT `guias_tarifa_agente_id_foreign` FOREIGN KEY (`tarifa_agente_id`) REFERENCES `tarifa_agentes` (`id`),
  CONSTRAINT `guias_tarifa_id_foreign` FOREIGN KEY (`tarifa_id`) REFERENCES `fac_tarifa` (`id`),
  CONSTRAINT `guias_vendedor_id_foreign` FOREIGN KEY (`vendedor_id`) REFERENCES `fac_vendedor` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=225306 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-08-26 11:32:29
