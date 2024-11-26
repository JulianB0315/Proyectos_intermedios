-- MySQL dump 10.13  Distrib 8.0.40, for Win64 (x86_64)
--
-- Host: junction.proxy.rlwy.net    Database: Tareas
-- ------------------------------------------------------
-- Server version	9.1.0

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `tareas`
--

DROP TABLE IF EXISTS `tareas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tareas` (
  `id_tarea` varchar(36) NOT NULL,
  `id_usuario` varchar(36) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `descripcion` text,
  `estado` enum('pendiente','en_progreso','completada') DEFAULT 'pendiente',
  `fecha_limite` date DEFAULT NULL,
  `fecha_creacion` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `fecha_actualizacion` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_tarea`),
  KEY `id_usuario` (`id_usuario`),
  CONSTRAINT `tareas_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tareas`
--

LOCK TABLES `tareas` WRITE;
/*!40000 ALTER TABLE `tareas` DISABLE KEYS */;
INSERT INTO `tareas` VALUES ('674350b97245b','Usuario20869635505072121215933052506','Redactar el informe mensual','Preparar el informe anual de actividades y resultados de la empresa para presentarlo en la junta directiva. El informe debe incluir: un resumen ejecutivo, detalles de ingresos y egresos, logros alcanzados, desafíos enfrentados y una proyección financiera para el próximo año. Además, se requiere adjuntar gráficas y tablas que respalden los datos presentados. Se recomienda seguir el formato estándar utilizado en años anteriores.','pendiente','2024-12-01','2024-11-24 16:13:43','2024-11-24 18:07:14'),('6743510dd3c66','Usuario20869635505072121215933052506','Organizar la conferencia de liderazgo','Planificar y coordinar la conferencia anual de liderazgo, incluyendo la selección del lugar, la organización de los panelistas invitados, la gestión de inscripciones, el diseño del programa del evento y la preparación de materiales de presentación. También se debe contactar con los proveedores para catering y equipo audiovisual. Es importante revisar los requerimientos técnicos con anticipación para evitar problemas durante el evento.\r\nEstado: En progreso','pendiente','2025-01-02','2024-11-24 16:15:08','2024-11-24 16:15:08'),('67435139b3d10','Usuario20869635505072121215933052506',' Crear la campaña de marketing para redes sociales','Diseñar y ejecutar una campaña publicitaria para aumentar la presencia de la marca en redes sociales. La campaña debe incluir publicaciones regulares en Instagram, Facebook y Twitter, además de contenido multimedia atractivo como videos promocionales y gráficos animados. También se deben analizar métricas de interacción y ajustar la estrategia en función de los resultados obtenidos en tiempo real.\r\nEstado: Completada','completada','2024-12-18','2024-11-24 16:15:52','2024-11-24 16:16:55'),('6743516c6651d','Usuario20869635505072121215933052506',' Actualización del sistema de gestión de inventarios','Coordinar con el equipo de TI para implementar la nueva versión del sistema de gestión de inventarios. Esto incluye migrar datos del sistema antiguo al nuevo, realizar pruebas de funcionalidad, capacitar al personal en el uso de las nuevas herramientas y supervisar el proceso inicial para identificar y solucionar posibles problemas. También se debe redactar un informe de evaluación del sistema después del primer mes de uso.\r\nEstado: Pendiente','completada','2024-11-22','2024-11-24 16:16:42','2024-11-24 18:08:49'),('674351b758c8b','Usuario20869635505072121215933052506','Revisión y publicación del manual de usuario del producto','Realizar una revisión exhaustiva del manual de usuario del nuevo producto, asegurándose de que toda la información técnica sea correcta y esté actualizada. Verificar que las imágenes, diagramas y pasos detallados sean claros y fáciles de entender para el público objetivo. Coordinar con el equipo de diseño para garantizar una presentación profesional y con la imprenta para la distribución física. El manual también debe publicarse en formato digital en el sitio web oficial.\r\nEstado: En progreso','pendiente','2024-04-11','2024-11-24 16:17:57','2024-11-24 16:21:42');
/*!40000 ALTER TABLE `tareas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `usuarios` (
  `id_usuario` varchar(36) NOT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `correo` varchar(255) DEFAULT NULL,
  `contrasena` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_usuario`),
  UNIQUE KEY `correo` (`correo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES ('Usuario08738183491742919167449913266','Julian','JulianBB@gmail.com','$2y$10$3BTkE3OoEpmQmCzLsM6NxuDb7fRVq1BkSgdSBLGJNtHDna0OO0cKG'),('Usuario13582371492897645550939807775','Julian','JulianBurga@gmail.com','$2y$10$vEdhcAECzyjSC2Ovy7D.o.BCIjOoVO97qthB3yRSr9Bh21asmfRtS'),('Usuario20869635505072121215933052506','Julian','Julian@gmail.com','$2y$10$iGh2U4LC4g9FMCK3/p4gA.20BtjRkzFnorTOEgH/Bx4ZtQjYx5KXu');
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-11-24 13:55:23
