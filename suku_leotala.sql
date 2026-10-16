-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 15, 2026 at 09:51 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.5.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `suku_leotala`
--

-- --------------------------------------------------------

--
-- Table structure for table `aldeias`
--

CREATE TABLE `aldeias` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `chefe` varchar(100) DEFAULT NULL,
  `telefone` varchar(20) DEFAULT NULL,
  `observacao` text DEFAULT NULL,
  `status` enum('ativo','inativo') NOT NULL DEFAULT 'ativo',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `aldeias`
--

INSERT INTO `aldeias` (`id`, `nome`, `chefe`, `telefone`, `observacao`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Aldeia Ainaro', 'Jo??o da Silva', '77000101', 'Aldeia principal', 'ativo', '2026-07-10 13:57:54', '2026-07-10 13:57:54'),
(2, 'Aldeia Fatubessi', 'Maria dos Santos', '77000102', 'Aldeia montanhosa', 'ativo', '2026-07-10 13:57:54', '2026-07-10 13:57:54'),
(3, 'Aldeia Hatoleta', 'Antonio Soares', '77000103', 'Aldeia agr??cola', 'ativo', '2026-07-10 13:57:54', '2026-07-10 13:57:54'),
(4, 'Aldeia Leotala', 'Jos?? Maria', '77000104', 'Aldeia central', 'ativo', '2026-07-10 13:57:54', '2026-07-10 13:57:54'),
(5, 'Aldeia Suco', 'Carlos Pereira', '77000105', 'Aldeia comercial', 'ativo', '2026-07-10 13:57:54', '2026-07-10 13:57:54');

-- --------------------------------------------------------

--
-- Table structure for table `cartas`
--

CREATE TABLE `cartas` (
  `id` int(11) NOT NULL,
  `no_carta` varchar(30) NOT NULL,
  `tipo_carta` varchar(50) NOT NULL,
  `morador_id` int(11) DEFAULT NULL,
  `data_emissao` date NOT NULL,
  `conteudo` text DEFAULT NULL,
  `qr_code` text DEFAULT NULL,
  `assinatura` varchar(255) DEFAULT NULL,
  `status` enum('ativo','cancelado') NOT NULL DEFAULT 'ativo',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cartas`
--

INSERT INTO `cartas` (`id`, `no_carta`, `tipo_carta`, `morador_id`, `data_emissao`, `conteudo`, `qr_code`, `assinatura`, `status`, `created_at`, `updated_at`) VALUES
(1, 'CR/001/2024', 'Carta de Resid??ncia', 1, '2026-07-10', 'Carta de resid??ncia para o Sr. Jo??o da Silva, residente em Aldeia Ainaro, Suku Leotala.', NULL, NULL, 'ativo', '2026-07-10 13:57:54', '2026-07-10 13:57:54'),
(2, 'CBC/001/2024', 'Carta de Boa Conduta', 2, '2026-07-10', 'Carta de boa conduta para a Sra. Maria dos Santos.', NULL, NULL, 'ativo', '2026-07-10 13:57:54', '2026-07-10 13:57:54');

-- --------------------------------------------------------

--
-- Table structure for table `configuracoes`
--

CREATE TABLE `configuracoes` (
  `id` int(11) NOT NULL,
  `nome_suku` varchar(100) NOT NULL DEFAULT 'Suku Leotala',
  `nome_chefe_suku` varchar(100) DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `endereco` text DEFAULT NULL,
  `telefone` varchar(20) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `website` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `configuracoes`
--

INSERT INTO `configuracoes` (`id`, `nome_suku`, `nome_chefe_suku`, `logo`, `endereco`, `telefone`, `email`, `website`, `created_at`, `updated_at`) VALUES
(1, 'Suku Leotala', 'Chefe do Suku Leotala', NULL, 'Rua Principal, Suku Leotala, Timor-Leste', '77000001', 'info@sukuleotala.tl', NULL, '2026-07-10 13:57:54', '2026-07-10 13:57:54');

-- --------------------------------------------------------

--
-- Table structure for table `familias`
--

CREATE TABLE `familias` (
  `id` int(11) NOT NULL,
  `no_kk` varchar(30) NOT NULL,
  `nome_chefe` varchar(100) NOT NULL,
  `endereco` text DEFAULT NULL,
  `aldeia_id` int(11) DEFAULT NULL,
  `status` enum('ativo','inativo') NOT NULL DEFAULT 'ativo',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `familias`
--

INSERT INTO `familias` (`id`, `no_kk`, `nome_chefe`, `endereco`, `aldeia_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'KK0010001', 'Jo??o da Silva', 'Rua Principal, Aldeia Ainaro', 1, 'ativo', '2026-07-10 13:57:54', '2026-07-10 13:57:54'),
(2, 'KK0010002', 'Maria dos Santos', 'Rua Fatubessi, no. 10', 2, 'ativo', '2026-07-10 13:57:54', '2026-07-10 13:57:54'),
(3, 'KK0010003', 'Antonio Soares', 'Rua Hatoleta, no. 5', 3, 'ativo', '2026-07-10 13:57:54', '2026-07-10 13:57:54'),
(4, 'KK0010004', 'Jos?? Maria', 'Rua Leotala, no. 1', 4, 'ativo', '2026-07-10 13:57:54', '2026-07-10 13:57:54'),
(5, 'KK0010005', 'Carlos Pereira', 'Rua Comercial, no. 20', 5, 'ativo', '2026-07-10 13:57:54', '2026-07-10 13:57:54');

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `acao` varchar(100) NOT NULL,
  `descricao` text DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `logs`
--

INSERT INTO `logs` (`id`, `user_id`, `acao`, `descricao`, `ip_address`, `user_agent`, `created_at`) VALUES
(1, 1, 'Login', 'User login susessu', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36 OPR/133.0.0.0 (Edition std-2)', '2026-07-10 13:58:31'),
(2, 1, 'Login', 'User login susessu', '::1', 'curl/8.20.0', '2026-07-10 14:01:36'),
(3, 1, 'Login', 'User login susessu', '::1', 'curl/8.20.0', '2026-07-10 14:23:16'),
(4, 1, 'Login', 'User login susessu', '::1', 'curl/8.20.0', '2026-07-10 14:23:57'),
(5, 1, 'Login', 'User login susessu', '::1', 'curl/8.20.0', '2026-07-10 14:29:05'),
(6, 1, 'Login', 'User login susessu', '::1', 'curl/8.20.0', '2026-07-10 14:35:07'),
(7, 1, 'Login', 'User login susessu', '::1', 'curl/8.20.0', '2026-07-10 14:39:15'),
(8, 1, 'Login', 'User login susessu', '::1', 'curl/8.20.0', '2026-07-10 14:39:29'),
(9, 1, 'Login', 'User login successfully', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36 OPR/133.0.0.0 (Edition std-2)', '2026-07-15 02:53:48'),
(10, 1, 'Login', 'User login successfully', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36 OPR/133.0.0.0 (Edition std-2)', '2026-07-16 12:35:15'),
(11, 1, 'Logout', 'User logout successfully', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36 OPR/133.0.0.0 (Edition std-2)', '2026-07-16 12:35:26'),
(12, 1, 'Login', 'User login successfully', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36 OPR/133.0.0.0 (Edition std-2)', '2026-07-18 01:45:39'),
(13, 1, 'Login', 'User login successfully', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36 OPR/133.0.0.0 (Edition std-2)', '2026-07-18 01:55:08');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(1, '2025-01-01-000001', 'CreateInitialTables', 'default', 'App\\Database\\Migrations', 1784084614, 1),
(2, '2025-01-01-000001', 'CreateInitialTables', 'default', 'App\\Database\\Migrations', 1784084664, 1),
(3, '2025-07-15-000002', 'CreateReligiaunTable', 'default', 'App\\Database\\Migrations', 1784084664, 1),
(4, '2025-01-01-000001', 'App\\Database\\Migrations\\CreateInitialTables', 'default', 'App', 1784084704, 2),
(5, '2025-07-15-000002', 'App\\Database\\Migrations\\CreateReligiaunTable', 'default', 'App', 1784084721, 3);

-- --------------------------------------------------------

--
-- Table structure for table `moradores`
--

CREATE TABLE `moradores` (
  `id` int(11) NOT NULL,
  `nik` varchar(20) NOT NULL,
  `nome_completo` varchar(150) NOT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `sexo` enum('Masculino','Feminino') NOT NULL,
  `local_nascimento` varchar(100) DEFAULT NULL,
  `data_nascimento` date DEFAULT NULL,
  `idade` int(11) DEFAULT NULL,
  `estado_civil` varchar(30) DEFAULT NULL,
  `religiao` varchar(50) DEFAULT NULL,
  `escolaridade` varchar(50) DEFAULT NULL,
  `ocupacao` varchar(100) DEFAULT NULL,
  `nacionalidade` varchar(50) DEFAULT 'Timorense',
  `nome_pai` varchar(100) DEFAULT NULL,
  `nome_mae` varchar(100) DEFAULT NULL,
  `familia_id` int(11) DEFAULT NULL,
  `endereco` text DEFAULT NULL,
  `aldeia_id` int(11) DEFAULT NULL,
  `telefone` varchar(20) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `status_morador` enum('Hiduni','Mate','Muda') NOT NULL DEFAULT 'Hiduni',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `moradores`
--

INSERT INTO `moradores` (`id`, `nik`, `nome_completo`, `foto`, `sexo`, `local_nascimento`, `data_nascimento`, `idade`, `estado_civil`, `religiao`, `escolaridade`, `ocupacao`, `nacionalidade`, `nome_pai`, `nome_mae`, `familia_id`, `endereco`, `aldeia_id`, `telefone`, `email`, `status_morador`, `created_at`, `updated_at`) VALUES
(1, '1000010101000001', 'Jo??o da Silva', NULL, 'Masculino', 'Dili', '1980-01-15', 46, 'Casado', 'Cat??lico', 'Ensino M??dio', 'Agricultor', 'Timorense', 'Manuel da Silva', 'Ana da Silva', 1, 'Rua Principal, Aldeia Ainaro', 1, '77000101', 'joao@email.com', 'Hiduni', '2026-07-10 13:57:54', '2026-07-10 13:57:54'),
(2, '1000010101000002', 'Maria dos Santos', NULL, 'Feminino', 'Ainaro', '1985-03-20', 41, 'Casada', 'Cat??lico', 'Ensino Superior', 'Professora', 'Timorense', 'Pedro dos Santos', 'Julia dos Santos', 2, 'Rua Fatubessi, no. 10', 2, '77000102', 'maria@email.com', 'Hiduni', '2026-07-10 13:57:54', '2026-07-10 13:57:54'),
(3, '1000010101000003', 'Antonio Soares', NULL, 'Masculino', 'Leotala', '1975-07-10', 51, 'Casado', 'Cat??lico', 'Ensino M??dio', 'Motorista', 'Timorense', 'Luis Soares', 'Teresa Soares', 3, 'Rua Hatoleta, no. 5', 3, '77000103', 'antonio@email.com', 'Hiduni', '2026-07-10 13:57:54', '2026-07-10 13:57:54'),
(4, '1000010101000004', 'Jos?? Maria', NULL, 'Masculino', 'Dili', '1990-11-05', 36, 'Solteiro', 'Cat??lico', 'Ensino Superior', 'Funcion??rio P??blico', 'Timorense', 'Carlos Maria', 'Lucia Maria', 4, 'Rua Leotala, no. 1', 4, '77000104', 'jose@email.com', 'Hiduni', '2026-07-10 13:57:54', '2026-07-10 13:57:54'),
(5, '1000010101000005', 'Carlos Pereira', NULL, 'Masculino', 'Baucau', '1988-09-25', 38, 'Casado', 'Protestante', 'Ensino M??dio', 'Comerciante', 'Timorense', 'Henrique Pereira', 'Beatriz Pereira', 5, 'Rua Comercial, no. 20', 5, '77000105', 'carlos@email.com', 'Hiduni', '2026-07-10 13:57:54', '2026-07-10 13:57:54'),
(6, '1000010102000001', 'Ana da Silva', NULL, 'Feminino', 'Ainaro', '2010-05-12', 16, 'Solteiro', 'Cat??lico', 'Ensino Fundamental', 'Estudante', 'Timorense', 'Jo??o da Silva', 'Maria da Silva', 1, 'Rua Principal, Aldeia Ainaro', 1, '77000106', 'ana@email.com', 'Hiduni', '2026-07-10 13:57:54', '2026-07-10 13:57:54'),
(7, '1000010102000002', 'Pedro Soares', NULL, 'Masculino', 'Leotala', '1940-02-08', 86, 'Vi??vo', 'Cat??lico', 'Ensino Fundamental', 'Aposentado', 'Timorense', 'Mateus Soares', 'Isabel Soares', 3, 'Rua Hatoleta, no. 5', 3, '77000107', 'pedro@email.com', 'Hiduni', '2026-07-10 13:57:54', '2026-07-10 13:57:54');

-- --------------------------------------------------------

--
-- Table structure for table `religiaun`
--

CREATE TABLE `religiaun` (
  `id` int(11) UNSIGNED NOT NULL,
  `naran` varchar(100) NOT NULL,
  `status` enum('ativo','inativo') NOT NULL DEFAULT 'ativo',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `religiaun`
--

INSERT INTO `religiaun` (`id`, `naran`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Catoliku', 'ativo', '2026-07-15 03:04:15', '2026-07-15 03:04:15'),
(2, 'Protestante', 'ativo', '2026-07-15 03:04:15', '2026-07-15 03:04:15'),
(3, 'Islame', 'ativo', '2026-07-15 03:04:15', '2026-07-15 03:04:15'),
(4, 'Hindu', 'ativo', '2026-07-15 03:04:15', '2026-07-15 03:04:15'),
(5, 'Budista', 'ativo', '2026-07-15 03:04:15', '2026-07-15 03:04:15'),
(6, 'Animista', 'ativo', '2026-07-15 03:04:15', '2026-07-15 03:04:15');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nome_completo` varchar(100) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `telefone` varchar(20) DEFAULT NULL,
  `tipo` enum('admin','funcionario') NOT NULL DEFAULT 'funcionario',
  `foto` varchar(255) DEFAULT NULL,
  `status` enum('ativo','inativo') NOT NULL DEFAULT 'ativo',
  `last_login` datetime DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `nome_completo`, `email`, `telefone`, `tipo`, `foto`, `status`, `last_login`, `created_at`, `updated_at`) VALUES
(1, 'admin', '$2y$12$K.cy1IhyPHM2aQAYr.jYIOVl6u9axml.zFjVa0dVJUv/0iXoc5Zba', 'Administrador Suku Leotala', 'admin@sukuleotala.tl', '77000001', 'admin', NULL, 'ativo', '2026-07-18 01:55:08', '2026-07-10 13:57:54', '2026-07-17 16:55:08'),
(2, 'funcionario', '$2y$12$c8.Gx9rDdMHNFvFELRtuNulcb8Bvuf64./1GIVcUiqMWHvp2AZYfa', 'Funcionario Suku Leotala', 'funcionario@sukuleotala.tl', '77000002', 'funcionario', NULL, 'ativo', NULL, '2026-07-10 13:57:54', '2026-07-15 02:53:34');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aldeias`
--
ALTER TABLE `aldeias`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cartas`
--
ALTER TABLE `cartas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `no_carta` (`no_carta`),
  ADD KEY `morador_id` (`morador_id`);

--
-- Indexes for table `configuracoes`
--
ALTER TABLE `configuracoes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `familias`
--
ALTER TABLE `familias`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `no_kk` (`no_kk`),
  ADD KEY `aldeia_id` (`aldeia_id`);

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `moradores`
--
ALTER TABLE `moradores`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nik` (`nik`),
  ADD KEY `familia_id` (`familia_id`),
  ADD KEY `aldeia_id` (`aldeia_id`);

--
-- Indexes for table `religiaun`
--
ALTER TABLE `religiaun`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `naran` (`naran`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aldeias`
--
ALTER TABLE `aldeias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `cartas`
--
ALTER TABLE `cartas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `configuracoes`
--
ALTER TABLE `configuracoes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `familias`
--
ALTER TABLE `familias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `moradores`
--
ALTER TABLE `moradores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `religiaun`
--
ALTER TABLE `religiaun`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cartas`
--
ALTER TABLE `cartas`
  ADD CONSTRAINT `cartas_ibfk_1` FOREIGN KEY (`morador_id`) REFERENCES `moradores` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `familias`
--
ALTER TABLE `familias`
  ADD CONSTRAINT `familias_ibfk_1` FOREIGN KEY (`aldeia_id`) REFERENCES `aldeias` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `logs`
--
ALTER TABLE `logs`
  ADD CONSTRAINT `logs_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `moradores`
--
ALTER TABLE `moradores`
  ADD CONSTRAINT `moradores_ibfk_1` FOREIGN KEY (`familia_id`) REFERENCES `familias` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `moradores_ibfk_2` FOREIGN KEY (`aldeia_id`) REFERENCES `aldeias` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
