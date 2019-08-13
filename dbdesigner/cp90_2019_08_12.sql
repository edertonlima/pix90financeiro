CREATE TABLE cadastro (
  cd_id INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  cd_nome VARCHAR(200) NOT NULL,
  cd_resumo VARCHAR(500) NULL,
  cd_datanascimento DATE NOT NULL,
  cd_cpfcnpj VARCHAR(18) NOT NULL,
  cd_rua VARCHAR(200) NOT NULL,
  cd_numero INTEGER UNSIGNED NOT NULL,
  cd_bairro VARCHAR(100) NOT NULL,
  cd_cidade VARCHAR(100) NOT NULL,
  cd_estado VARCHAR(2) NOT NULL,
  cd_cep VARCHAR(9) NOT NULL,
  cd_email VARCHAR(200) NULL,
  cd_telefone VARCHAR(16) NULL,
);

CREATE TABLE categoria (
  ct_id INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  ct_nome VARCHAR(200) NULL,
  ct_rgb VARCHAR(7) NULL,
);

CREATE TABLE metodo_pagamento (
  mp_id INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  mp_nome VARCHAR(200) NULL,
  mp_info VARCHAR(500) NULL,
);

CREATE TABLE notas (
  nt_id INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  nt_data DATE NULL,
  nt_texto VARCHAR(1000) NULL,
);

CREATE TABLE pagamento (
  pg_id INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  pg_descricao VARCHAR(500) NOT NULL,
  pg_data DATE NOT NULL,
  pg_valor FLOAT(2) NOT NULL,
  pg_datapagamento DATE NULL,
  pg_observacao VARCHAR NULL,
);


