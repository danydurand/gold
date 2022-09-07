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
-- Temporary table structure for view `v_recibidas_y_no_despachadas`
--

DROP TABLE IF EXISTS `v_recibidas_y_no_despachadas`;
/*!50001 DROP VIEW IF EXISTS `v_recibidas_y_no_despachadas`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `v_recibidas_y_no_despachadas` AS SELECT 
 1 AS `id`,
 1 AS `guia_id`,
 1 AS `id_pieza`,
 1 AS `kilos`,
 1 AS `libras`,
 1 AS `largo`,
 1 AS `alto`,
 1 AS `ancho`,
 1 AS `volumen`,
 1 AS `descripcion`,
 1 AS `pies_cub`,
 1 AS `metros_cub`,
 1 AS `hoja_entrega`,
 1 AS `ubicacion`,
 1 AS `created_at`,
 1 AS `updated_at`*/;
SET character_set_client = @saved_cs_client;

--
-- Final view structure for view `v_recibidas_y_no_despachadas`
--

/*!50001 DROP VIEW IF EXISTS `v_recibidas_y_no_despachadas`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `v_recibidas_y_no_despachadas` AS select `gp`.`id` AS `id`,`gp`.`guia_id` AS `guia_id`,`gp`.`id_pieza` AS `id_pieza`,`gp`.`kilos` AS `kilos`,`gp`.`libras` AS `libras`,`gp`.`largo` AS `largo`,`gp`.`alto` AS `alto`,`gp`.`ancho` AS `ancho`,`gp`.`volumen` AS `volumen`,`gp`.`descripcion` AS `descripcion`,`gp`.`pies_cub` AS `pies_cub`,`gp`.`metros_cub` AS `metros_cub`,`gp`.`hoja_entrega` AS `hoja_entrega`,`gp`.`ubicacion` AS `ubicacion`,`gp`.`created_at` AS `created_at`,`gp`.`updated_at` AS `updated_at` from (`guia_piezas` `gp` join `guias` `g` on((`g`.`id` = `gp`.`guia_id`))) where (exists(select NULL from (`pieza_checkpoints` `pc` join `checkpoints` `c` on((`pc`.`checkpoint_id` = `c`.`id`))) where ((`c`.`codigo` = 'RA') and (`pc`.`pieza_id` = `gp`.`id`))) and (not(exists(select NULL from (`pieza_checkpoints` `pc` join `checkpoints` `c2` on((`pc`.`checkpoint_id` = `c2`.`id`))) where ((`c2`.`codigo` in ('TR','ER')) and (`pc`.`pieza_id` = `gp`.`id`))))) and (not(exists(select NULL from (`pieza_checkpoints` `pc` join `checkpoints` `c3` on((`pc`.`checkpoint_id` = `c3`.`id`))) where ((`c3`.`codigo` = 'OK') and (`pc`.`pieza_id` = `gp`.`id`)))))) order by `gp`.`id_pieza` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-08-19 12:09:31
