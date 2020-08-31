-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 31-Ago-2020 às 23:33
-- Versão do servidor: 10.3.16-MariaDB
-- versão do PHP: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `banco17-04`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedido`
--

CREATE TABLE `pedido` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `cep` int(11) NOT NULL,
  `estado` varchar(10) NOT NULL,
  `cidade` varchar(50) NOT NULL,
  `bairro` varchar(50) NOT NULL,
  `logradouro` varchar(50) NOT NULL,
  `complemento` varchar(20) DEFAULT NULL,
  `numero` int(11) NOT NULL,
  `telefone` varchar(20) NOT NULL,
  `solicitacao` varchar(500) NOT NULL,
  `ip` varchar(15) NOT NULL,
  `situacao` varchar(30) NOT NULL DEFAULT 'pendente'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `pedido`
--

INSERT INTO `pedido` (`id`, `nome`, `cep`, `estado`, `cidade`, `bairro`, `logradouro`, `complemento`, `numero`, `telefone`, `solicitacao`, `ip`, `situacao`) VALUES
(78, 'maria', 97095540, 'RS', 'Santa Maria', 'São José', 'Rua Pedro Figueira', 'casa', 343, '(55) 78908-1234', 'batata, leite, pão, arroz, feijão.', '143.137.129.65', 'pendente'),
(79, 'joao', 24020290, 'RJ', 'Niterói', 'Centro', 'Rua Acadêmico Walter Gonçalves', '', 500, '(99) 12345-6660', 'batata, leite.', '', 'concluído'),
(80, 'teste', 97095540, 'RS', 'Santa Maria', 'São José', 'Rua Pedro Figueira', '', 343, '(55) 55555-5555', 'teste', '177.86.164.184', 'concluído'),
(81, 'Mateus', 97095540, 'RS', 'Santa Maria', 'São José', 'Rua Pedro Figueira', '', 343, '(55) 99179-0175', 'pizza', '177.86.165.174', 'pendente');

-- --------------------------------------------------------

--
-- Estrutura da tabela `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `usuario` varchar(100) NOT NULL,
  `senha` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `user`
--

INSERT INTO `user` (`id`, `usuario`, `senha`) VALUES
(1, 'mthsilva123456@gmail.com', '1234');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `pedido`
--
ALTER TABLE `pedido`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT de tabela `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
