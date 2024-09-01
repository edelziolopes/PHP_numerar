-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 01/09/2024 às 13:46
-- Versão do servidor: 10.11.8-MariaDB-cll-lve
-- Versão do PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `u375395381_numerar`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_anos`
--

CREATE TABLE `tb_anos` (
  `id` int(11) NOT NULL,
  `id_nivel` int(11) DEFAULT NULL,
  `ano` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_descritores`
--

CREATE TABLE `tb_descritores` (
  `id` int(11) NOT NULL,
  `id_sistema` int(11) DEFAULT NULL,
  `id_habilidade` int(11) DEFAULT NULL,
  `descritor` varchar(10) DEFAULT NULL,
  `descricao` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_habilidades`
--

CREATE TABLE `tb_habilidades` (
  `id` int(11) NOT NULL,
  `id_objeto` int(11) DEFAULT NULL,
  `habilidade` varchar(10) DEFAULT NULL,
  `descricao` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_niveis`
--

CREATE TABLE `tb_niveis` (
  `id` int(11) NOT NULL,
  `nivel` varchar(45) DEFAULT NULL,
  `descricao` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_objetos`
--

CREATE TABLE `tb_objetos` (
  `id` int(11) NOT NULL,
  `id_unidade` int(11) DEFAULT NULL,
  `id_ano` int(11) DEFAULT NULL,
  `objeto` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_sistemas`
--

CREATE TABLE `tb_sistemas` (
  `id` int(11) NOT NULL,
  `sistema` varchar(45) DEFAULT NULL,
  `uf` varchar(40) DEFAULT NULL,
  `descricao` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_unidades`
--

CREATE TABLE `tb_unidades` (
  `id` int(11) NOT NULL,
  `unidade` varchar(45) DEFAULT NULL,
  `descricao` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `tb_anos`
--
ALTER TABLE `tb_anos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_nivel_idx` (`id_nivel`);

--
-- Índices de tabela `tb_descritores`
--
ALTER TABLE `tb_descritores`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_sistema_idx` (`id_sistema`),
  ADD KEY `fk_habilidade_idx` (`id_habilidade`);

--
-- Índices de tabela `tb_habilidades`
--
ALTER TABLE `tb_habilidades`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_objeto_idx` (`id_objeto`);

--
-- Índices de tabela `tb_niveis`
--
ALTER TABLE `tb_niveis`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `tb_objetos`
--
ALTER TABLE `tb_objetos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_unidade_idx` (`id_unidade`),
  ADD KEY `fk_ano_idx` (`id_ano`);

--
-- Índices de tabela `tb_sistemas`
--
ALTER TABLE `tb_sistemas`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `tb_unidades`
--
ALTER TABLE `tb_unidades`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tb_anos`
--
ALTER TABLE `tb_anos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tb_descritores`
--
ALTER TABLE `tb_descritores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tb_habilidades`
--
ALTER TABLE `tb_habilidades`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tb_niveis`
--
ALTER TABLE `tb_niveis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tb_objetos`
--
ALTER TABLE `tb_objetos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tb_sistemas`
--
ALTER TABLE `tb_sistemas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tb_unidades`
--
ALTER TABLE `tb_unidades`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `tb_anos`
--
ALTER TABLE `tb_anos`
  ADD CONSTRAINT `fk_nivel` FOREIGN KEY (`id_nivel`) REFERENCES `tb_niveis` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para tabelas `tb_descritores`
--
ALTER TABLE `tb_descritores`
  ADD CONSTRAINT `fk_habilidade` FOREIGN KEY (`id_habilidade`) REFERENCES `tb_habilidades` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_sistema` FOREIGN KEY (`id_sistema`) REFERENCES `tb_sistemas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para tabelas `tb_habilidades`
--
ALTER TABLE `tb_habilidades`
  ADD CONSTRAINT `fk_objeto` FOREIGN KEY (`id_objeto`) REFERENCES `tb_objetos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para tabelas `tb_objetos`
--
ALTER TABLE `tb_objetos`
  ADD CONSTRAINT `fk_ano` FOREIGN KEY (`id_ano`) REFERENCES `tb_anos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_unidade` FOREIGN KEY (`id_unidade`) REFERENCES `tb_unidades` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
