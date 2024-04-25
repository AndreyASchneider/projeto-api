-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           10.4.32-MariaDB - mariadb.org binary distribution
-- OS do Servidor:               Win64
-- HeidiSQL Versão:              12.6.0.6765
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Copiando estrutura para tabela projeto_aula_api.emails
CREATE TABLE IF NOT EXISTS `emails` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `destinatario` varchar(255) DEFAULT NULL,
  `assunto` varchar(255) DEFAULT NULL,
  `corpo` text DEFAULT NULL,
  `data_envio` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Copiando dados para a tabela projeto_aula_api.emails: ~0 rows (aproximadamente)

-- Copiando estrutura para tabela projeto_aula_api.eventos
CREATE TABLE IF NOT EXISTS `eventos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) DEFAULT NULL,
  `data` date DEFAULT NULL,
  `hora` time DEFAULT NULL,
  `local` varchar(255) DEFAULT NULL,
  `descricao` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Copiando dados para a tabela projeto_aula_api.eventos: ~3 rows (aproximadamente)
INSERT INTO `eventos` (`id`, `nome`, `data`, `hora`, `local`, `descricao`) VALUES
	(1, 'Apresentação trabalho', '2024-04-24', '19:30:00', 'Casa', 'Apresentar trabalho desenvolvido'),
	(2, 'Trabalhar', '2024-04-24', '08:00:00', 'Prédio 300', 'Trabalhar como desenvolvedor de software'),
	(3, 'Palestra sobre PHP', '2024-04-25', '20:45:00', 'Teatro Univates', 'Palestra sobre boas práticas em PHP');

-- Copiando estrutura para tabela projeto_aula_api.inscricoes
CREATE TABLE IF NOT EXISTS `inscricoes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario_id` int(11) DEFAULT NULL,
  `evento_id` int(11) DEFAULT NULL,
  `data_inscricao` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `usuario_id` (`usuario_id`),
  KEY `evento_id` (`evento_id`),
  CONSTRAINT `inscricoes_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`),
  CONSTRAINT `inscricoes_ibfk_2` FOREIGN KEY (`evento_id`) REFERENCES `eventos` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Copiando dados para a tabela projeto_aula_api.inscricoes: ~6 rows (aproximadamente)
INSERT INTO `inscricoes` (`id`, `usuario_id`, `evento_id`, `data_inscricao`) VALUES
	(1, 1, 1, '2024-04-24 14:45:13'),
	(2, 1, 2, '2024-04-24 14:45:25'),
	(3, 1, 3, '2024-04-24 14:45:32'),
	(4, 2, 2, '2024-04-24 14:45:40'),
	(5, 2, 3, '2024-04-24 14:45:49'),
	(6, 3, 3, '2024-04-24 14:46:04');

-- Copiando estrutura para tabela projeto_aula_api.presencas
CREATE TABLE IF NOT EXISTS `presencas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario_id` int(11) DEFAULT NULL,
  `evento_id` int(11) DEFAULT NULL,
  `data_presenca` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `usuario_id` (`usuario_id`),
  KEY `evento_id` (`evento_id`),
  CONSTRAINT `presencas_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`),
  CONSTRAINT `presencas_ibfk_2` FOREIGN KEY (`evento_id`) REFERENCES `eventos` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Copiando dados para a tabela projeto_aula_api.presencas: ~1 rows (aproximadamente)
INSERT INTO `presencas` (`id`, `usuario_id`, `evento_id`, `data_presenca`) VALUES
	(2, 1, 1, '2024-04-24 13:30:00');

-- Copiando estrutura para tabela projeto_aula_api.usuarios
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `senha` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Copiando dados para a tabela projeto_aula_api.usuarios: ~4 rows (aproximadamente)
INSERT INTO `usuarios` (`id`, `nome`, `email`, `senha`) VALUES
	(1, 'Andrey', 'andrey.schneider@universo.univates.br', '$2y$10$BXXre/dtOdbDnp.XiNFRne.n6MizTv2kIkYySjRbdcpa3eVermMR.'),
	(2, 'Fabrício', 'fabricio.pretto@univates.br', '$2y$10$BXXre/dtOdbDnp.XiNFRne.n6MizTv2kIkYySjRbdcpa3eVermMR.'),
	(3, 'Teste', 'aschneider8978@gmail.com', '$2y$10$BXXre/dtOdbDnp.XiNFRne.n6MizTv2kIkYySjRbdcpa3eVermMR.'),
	(6, 'Teste API', 'teste@gmail.com', '$2y$10$TjGZWnbHgN8Q8PVEVnHGjOKkRMiZpJ5Din7gbJK7D0Ul.hWmiprte');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
