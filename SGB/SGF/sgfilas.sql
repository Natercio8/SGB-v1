-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 19-Jan-2023 às 10:05
-- Versão do servidor: 10.4.18-MariaDB
-- versão do PHP: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `sgfilas`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `balcao`
--

CREATE TABLE `balcao` (
  `id_balcao` int(11) NOT NULL,
  `num_balcao` int(11) DEFAULT NULL,
  `total_senhas` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `balcao`
--

INSERT INTO `balcao` (`id_balcao`, `num_balcao`, `total_senhas`) VALUES
(1, 1, 1),
(2, 2, 0),
(3, 3, 0),
(4, 4, 0),
(5, 5, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `funcionario`
--

CREATE TABLE `funcionario` (
  `id` int(11) NOT NULL,
  `num_balcao` int(11) DEFAULT NULL,
  `codigo` int(5) NOT NULL,
  `nome` varchar(20) NOT NULL,
  `senha` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `funcionario`
--

INSERT INTO `funcionario` (`id`, `num_balcao`, `codigo`, `nome`, `senha`) VALUES
(1, 5, 202306, 'Delcio Marshall', '81dc9bdb52d04dc20036dbd8313ed055'),
(2, 3, 202307, 'Natercio', '81dc9bdb52d04dc20036dbd8313ed055'),
(3, 1, 202319, 'Pedro', '81dc9bdb52d04dc20036dbd8313ed055'),
(4, 2, 202320, 'Andre da Costa', '81dc9bdb52d04dc20036dbd8313ed055'),
(5, 4, 202316, 'Paulo', '81dc9bdb52d04dc20036dbd8313ed055');

-- --------------------------------------------------------

--
-- Estrutura da tabela `servico`
--

CREATE TABLE `servico` (
  `id_servico` int(11) NOT NULL,
  `tipo_servico` varchar(2) NOT NULL,
  `nome_servico` varchar(30) CHARACTER SET utf8 NOT NULL,
  `senhas_emitidas` int(11) DEFAULT NULL,
  `senha_actual` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `servico`
--

INSERT INTO `servico` (`id_servico`, `tipo_servico`, `nome_servico`, `senhas_emitidas`, `senha_actual`) VALUES
(1, 'A', 'Pagamento de propinas', 0, 0),
(2, 'B', 'Matrícula', 0, 0),
(3, 'C', 'Confirmação', 0, 0),
(4, 'D', 'Declaração', 0, 0),
(5, 'E', 'Outros serviços', 0, 0);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `balcao`
--
ALTER TABLE `balcao`
  ADD PRIMARY KEY (`id_balcao`);

--
-- Índices para tabela `funcionario`
--
ALTER TABLE `funcionario`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `servico`
--
ALTER TABLE `servico`
  ADD PRIMARY KEY (`id_servico`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `balcao`
--
ALTER TABLE `balcao`
  MODIFY `id_balcao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `funcionario`
--
ALTER TABLE `funcionario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `servico`
--
ALTER TABLE `servico`
  MODIFY `id_servico` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
