-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 05/10/2024 às 04:24
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
-- Banco de dados: `projeto_imoveis`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `imoveis`
--

CREATE TABLE `imoveis` (
  `inscricao_municipal` int(11) NOT NULL,
  `logradouro` varchar(200) NOT NULL,
  `numero` varchar(15) NOT NULL,
  `bairro` varchar(100) NOT NULL,
  `complemento` varchar(200) DEFAULT NULL,
  `contribuinte` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `imoveis`
--

INSERT INTO `imoveis` (`inscricao_municipal`, `logradouro`, `numero`, `bairro`, `complemento`, `contribuinte`) VALUES
(5, 'Adão Gernhardt', '544', 'Jardim América', '', 17),
(8, 'Avenida Feitoria ', '2300', 'Pinheiros', 'Apartamento 1102', 1),
(9, 'São Gabriel', '89', 'Morro do Espelho', '', 19),
(10, 'Avenida João XXIII', '410', 'Parque Primavera', 'Apartamento 5B', 21),
(11, 'Rua dos Olhos D’água', '45', 'Centro', 'Apartamento 203', 22),
(12, 'Travessa da Paz', '76', 'Santos Dumont', 'Casa 10', 23);

-- --------------------------------------------------------

--
-- Estrutura para tabela `pessoas`
--

CREATE TABLE `pessoas` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `data_nascimento` date NOT NULL,
  `cpf` varchar(11) NOT NULL,
  `genero` enum('Masculino','Feminino','Outro') NOT NULL,
  `telefone` varchar(15) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `pessoas`
--

INSERT INTO `pessoas` (`id`, `nome`, `data_nascimento`, `cpf`, `genero`, `telefone`, `email`) VALUES
(1, 'Luann Muryell Ribeiro', '2002-12-18', '04020040000', 'Masculino', '5551992033133', 'luannmuryellr@gmail.com'),
(17, 'Alberto Flach', '1998-09-07', '65018099001', 'Masculino', '', ''),
(19, 'Aurora Silva', '1990-07-16', '090180360-0', 'Masculino', '5551993218582', 'aurorasilva@gmail.com'),
(21, 'Emma Fonseca', '2000-08-16', '12332122202', 'Masculino', '5551983065675', 'emma_fonseca@gmail.com'),
(22, 'Gael Ribeiro', '1988-01-19', '08778034501', 'Masculino', '', 'gaelribeiro@gmail.com'),
(23, 'Valentina Costa', '1991-11-09', '82745904201', 'Masculino', '5551997864586', '');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `imoveis`
--
ALTER TABLE `imoveis`
  ADD PRIMARY KEY (`inscricao_municipal`),
  ADD KEY `contribuinte` (`contribuinte`);

--
-- Índices de tabela `pessoas`
--
ALTER TABLE `pessoas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cpf` (`cpf`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `imoveis`
--
ALTER TABLE `imoveis`
  MODIFY `inscricao_municipal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de tabela `pessoas`
--
ALTER TABLE `pessoas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `imoveis`
--
ALTER TABLE `imoveis`
  ADD CONSTRAINT `imoveis_ibfk_1` FOREIGN KEY (`contribuinte`) REFERENCES `pessoas` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
