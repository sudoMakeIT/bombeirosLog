--
-- Database: bombeiros
--
USE bombeiros;
DELIMITER //
CREATE PROCEDURE initTables ()
-- --------------------------------------------------------

--
-- Estrutura da tabela cadastro
--
BEGIN
  CREATE TABLE IF NOT EXISTS cadastro (
    username varchar(30) DEFAULT NULL,
    mail varchar(100) NOT NULL,
    password varchar(220) NOT NULL
  ) ;

  --
  -- Extraindo dados da tabela cadastro
  --

  INSERT INTO cadastro (username, mail, password) VALUES
  ('teste123', '', '123');

  -- --------------------------------------------------------

  --
  -- Estrutura da tabela desporto
  --

  CREATE TABLE IF NOT EXISTS desporto (
    dia date DEFAULT NULL,
    tipo varchar(50) DEFAULT NULL,
    elementos int(11) DEFAULT NULL,
    localizacao varchar(30) DEFAULT NULL,
    id int(11) NOT NULL,
    obs text,
    note int(4) NOT NULL,
    arquivo tinyint(1) NOT NULL DEFAULT '0'
  ) ;

  -- --------------------------------------------------------

  --
  -- Estrutura da tabela fanfarra
  --

  CREATE TABLE IF NOT EXISTS fanfarra (
    dia date DEFAULT NULL,
    tipo varchar(50) DEFAULT NULL,
    localizacao varchar(30) DEFAULT NULL,
    elementos int(11) DEFAULT NULL,
    id int(11) NOT NULL,
    obs text,
    note int(4) NOT NULL,
    arquivo tinyint(1) NOT NULL DEFAULT '0'
  ) ;

  -- --------------------------------------------------------

  --
  -- Estrutura da tabela formacao
  --

  CREATE TABLE IF NOT EXISTS formacao (
    dia date DEFAULT NULL,
    tipo varchar(50) DEFAULT NULL,
    duracao varchar(40) DEFAULT NULL,
    localizacao varchar(50) DEFAULT NULL,
    destinatario varchar(50) DEFAULT NULL,
    elementos int(11) DEFAULT NULL,
    id int(11) NOT NULL,
    obs text,
    note int(4) NOT NULL,
    arquivo tinyint(1) NOT NULL DEFAULT '0'
  ) ;

  -- --------------------------------------------------------

  --
  -- Estrutura da tabela formacao_ex
  --

  CREATE TABLE IF NOT EXISTS formacao_ex (
    dia date DEFAULT NULL,
    tipo varchar(50) DEFAULT NULL,
    duracao varchar(40) DEFAULT NULL,
    localizacao varchar(50) DEFAULT NULL,
    destinatario varchar(50) DEFAULT NULL,
    elementos int(11) DEFAULT NULL,
    id int(11) NOT NULL,
    obs text,
    note int(4) NOT NULL,
    arquivo tinyint(1) NOT NULL DEFAULT '0'
  ) ;

  -- --------------------------------------------------------

  --
  -- Estrutura da tabela honor
  --

  CREATE TABLE IF NOT EXISTS honor (
    dia date DEFAULT NULL,
    tipo varchar(100) DEFAULT NULL,
    elem int(11) DEFAULT NULL,
    local varchar(100) DEFAULT NULL,
    id int(11) NOT NULL,
    obs text,
    note int(4) NOT NULL,
    arquivo tinyint(1) NOT NULL DEFAULT '0'
  ) ;

  -- --------------------------------------------------------

  --
  -- Estrutura da tabela protocolos
  --

  CREATE TABLE IF NOT EXISTS protocolos (
    dia date DEFAULT NULL,
    entidade varchar(100) DEFAULT NULL,
    condicoes text,
    id int(11) NOT NULL,
    obs text,
    note int(4) NOT NULL,
    arquivo tinyint(1) NOT NULL DEFAULT '0'
  ) ;

  -- --------------------------------------------------------

  --
  -- Estrutura da tabela reserva
  --

  CREATE TABLE IF NOT EXISTS reserva (
    dia date DEFAULT NULL,
    numero int(20) DEFAULT NULL,
    nome varchar(200) DEFAULT NULL,
    categoria varchar(50) DEFAULT NULL,
    id int(11) NOT NULL,
    obs text,
    note int(4) NOT NULL,
    arquivo tinyint(1) NOT NULL DEFAULT '0'
  ) ;

  -- --------------------------------------------------------

  --
  -- Estrutura da tabela socios_empresas
  --

  CREATE TABLE IF NOT EXISTS socios_empresas (
    dia date DEFAULT NULL,
    nome varchar(50) DEFAULT NULL,
    quantia int(11) DEFAULT NULL,
    id int(11) NOT NULL,
    obs text,
    note int(4) NOT NULL,
    arquivo tinyint(1) NOT NULL DEFAULT '0'
  ) ;

  -- --------------------------------------------------------

  --
  -- Estrutura da tabela socios_particulares
  --

  CREATE TABLE IF NOT EXISTS socios_particulares (
    dia date DEFAULT NULL,
    evento varchar(100) DEFAULT NULL,
    new_members int(11) DEFAULT NULL,
    id int(11) NOT NULL,
    obs text,
    note int(4) NOT NULL,
    arquivo tinyint(1) NOT NULL DEFAULT '0'
  ) ;

  -- --------------------------------------------------------

  --
  -- Estrutura da tabela viaturas_antigas
  --

  CREATE TABLE IF NOT EXISTS viaturas_antigas (
    dia date DEFAULT NULL,
    tempo varchar(40) DEFAULT NULL,
    localizacao varchar(30) DEFAULT NULL,
    manutencao text,
    id int(11) NOT NULL,
    obs text,
    note int(4) NOT NULL,
    arquivo tinyint(1) NOT NULL DEFAULT '0'
  ) ;

  -- --------------------------------------------------------

  --
  -- Estrutura da tabela visita_estudo
  --

  CREATE TABLE IF NOT EXISTS visita_estudo (
    dia date DEFAULT NULL,
    entidade varchar(50) DEFAULT NULL,
    guia varchar(100) DEFAULT NULL,
    elementos int(11) DEFAULT NULL,
    contacto varchar(12) NOT NULL,
    resp varchar(50) NOT NULL,
    id int(11) NOT NULL,
    obs text,
    note int(4) NOT NULL,
    arquivo tinyint(1) NOT NULL DEFAULT '0'
  ) ;
	END //
DELIMITER ;


CALL initTables ()
