-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 14/11/2024 às 22:43
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `dtb_rjrefeicoes`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `admin_sistema`
--

CREATE TABLE `admin_sistema` (
  `id_admin` int(11) NOT NULL,
  `nome_admin` varchar(150) NOT NULL,
  `sobrenome_admin` varchar(150) NOT NULL,
  `login_admin` varchar(50) NOT NULL,
  `senha_admin` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `admin_sistema`
--

INSERT INTO `admin_sistema` (`id_admin`, `nome_admin`, `sobrenome_admin`, `login_admin`, `senha_admin`) VALUES
(1, 'Eugenio', 'Socha', 'eugeniosf', 'socha1234'),
(2, 'Victor', 'Breno', 'victorb', 'b8cf3166eb18c070bc14be513f6e0a4478bf8243'),
(3, 'Elias ', 'Félix', 'eliasf', '3cc88d9e4ff60b2d596637440b435d5e');

-- --------------------------------------------------------

--
-- Estrutura para tabela `produto`
--

CREATE TABLE `produto` (
  `id_produto` int(11) NOT NULL,
  `nome_produto` varchar(150) NOT NULL,
  `preco_produto` decimal(10,2) NOT NULL,
  `descricao_produto` varchar(150) NOT NULL,
  `imagem_produto` varchar(150) NOT NULL,
  `tipo_produto` varchar(150) DEFAULT NULL,
  `qtd_pessoas` int(2) DEFAULT NULL,
  `status_produto` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `produto`
--

INSERT INTO `produto` (`id_produto`, `nome_produto`, `preco_produto`, `descricao_produto`, `imagem_produto`, `tipo_produto`, `qtd_pessoas`, `status_produto`) VALUES
(32, 'teste', 15.00, 'dfdfdfdf', 'uploads/AOI.png', 'Suco', 1, 'Disponível'),
(33, 'teste', 15.00, 'wsadsad', 'uploads/AOI.png', 'Sucos', 1, 'Disponível');

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `nome_usuario` varchar(150) NOT NULL,
  `sobrenome_usuario` varchar(150) NOT NULL,
  `cpf_usuario` varchar(11) NOT NULL,
  `endereco_usuario` varchar(150) NOT NULL,
  `telefone_usuario` varchar(15) NOT NULL,
  `email_usuario` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `admin_sistema`
--
ALTER TABLE `admin_sistema`
  ADD PRIMARY KEY (`id_admin`);

--
-- Índices de tabela `produto`
--
ALTER TABLE `produto`
  ADD PRIMARY KEY (`id_produto`);

--
-- Índices de tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `admin_sistema`
--
ALTER TABLE `admin_sistema`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `produto`
--
ALTER TABLE `produto`
  MODIFY `id_produto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
