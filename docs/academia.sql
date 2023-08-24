CREATE TABLE IF NOT EXISTS `tbl_ALUNO`(
    `id_Aluno`        int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
    `login_Aluno`     VARCHAR(155),
    `senha_Aluno`     VARCHAR(15),
    `nm_Aluno`        VARCHAR(255),
    `sbnm_Aluno`      VARCHAR(155),
    `foto_Aluno`      VARCHAR(255),
    `data_nasc_Aluno` DATE,
    `sexo_Aluno`      CHAR(1),
    `rg_Aluno`        VARCHAR(15),
    `tel_Aluno`       VARCHAR(15),
    `email_Aluno`     VARCHAR(255),
    `data_cad_Aluno`  DATE,
  
PRIMARY KEY (`id_Aluno`));

CREATE TABLE IF NOT EXISTS `PRODUTO` (
  `id_Produto`            int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nm_Produto`            VARCHAR(255) DEFAULT NULL,
  `desc_Produto`          VARCHAR(255) DEFAULT NULL,
  `vlr_unit_Produto`      decimal(14,2) DEFAULT NULL,
  `qtde_Produto`          integer,
  `vlr_total_Produto`     decimal(14,2) DEFAULT NULL,
  `fk_ALUNO_id_Aluno`     integer,

 PRIMARY KEY (`id_Produto`));

CREATE TABLE IF NOT EXISTS `tbl_INSTRUTOR` (
    `id_Instrutor`        int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
    `nm_Instrutor`        VARCHAR(255),
    `sbnm_Instrutor`      VARCHAR(155),
    `foto_Instrutor`      VARCHAR(25),
    `data_nacs_Instrutor` DATE,
    `sexo_Instrutor`      CHAR(1),
    `rg_Instrutor`        VARCHAR(25),
    `cpf_Instrutor`       VARCHAR(25),
    `login_Instrutor`     VARCHAR(25),
    `senha_Instrutor`     VARCHAR(15),
    `logra_Instrutor`     VARCHAR(255),
    `num_Instrutor`       INTEGER,
    `compl_Instrutor`     VARCHAR(155),
    `bairro_Instrutor`    VARCHAR(155),
    `cep_Instrutor`       VARCHAR(25),
    `cidade_Instrutor`    VARCHAR(155),
    `email_Instrutor`     VARCHAR(255),
    `tel_Instrutor`       VARCHAR(25),
 PRIMARY KEY (`id_Instrutor`));


CREATE TABLE IF NOT EXISTS `tbl_RECEPCIONISTA` (
    `id_Recepcionista`        int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
    `nm_Recepcionista`        VARCHAR(255),
    `sbnm_Recepcionista`      VARCHAR(155),
    `foto_Recepcionista`      VARCHAR(25),
    `data_nasc_Recepcionista` DATE,
    `sexo_Recepcionista`      CHAR(1),
    `rg_Recepcionista`        VARCHAR(25),
    `cpf_Recepcionista`       VARCHAR(25),
    `login_Recepcionista`     VARCHAR(25),
    `senha_Recepcionista`     VARCHAR(15),
    `logra_Recepcionista`     VARCHAR(255),
    `num_Recepcionista`       INTEGER,
    `compl_Recepcionista`     VARCHAR(155),
    `bairro_Recepcionista`    VARCHAR(155),
    `cep_Recepcionista`       VARCHAR(25),
    `cidade_Recepcionista`    VARCHAR(155),
    `email_Recepcionista`     VARCHAR(255),
    `tel_Recepcionista`       VARCHAR(25),
 PRIMARY KEY (`id_Recepcionista`));

CREATE TABLE IF NOT EXISTS `ATIVIDADE` (
   `id_Atividade`                  int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
   `nm_Atividade`                  VARCHAR(155),
   `vlr_mensal_Atividade`          decimal(14,2) DEFAULT NULL,
   `desco_mensal_Atividade`        INTEGER,  
   `vlr_total_Atividade`           decimal(14,2) DEFAULT NULL, 
   `desc_Atividade`                VARCHAR(255),
   `data_cad_Treino`               date,
 PRIMARY KEY (`id_Atividade`));

CREATE TABLE IF NOT EXISTS `Treino_ATIVIDADE` (
   `id_Atividade_faz_Atividade`        int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
   `desc_faz_Atividade`                VARCHAR(255),
   `data_inicio_semana_faz_Atividade`  date,  
   `hora_inicio_semana_faz_Atividade`  time,  
   `data_fim_semana_faz_Atividade`     date,  
   `hora_fim_semana_faz_Atividade`     time,  
   `data_cad_faz_Atividade`            date,
   `FK_ATIVIDADE_id_Atividade`         integer DEFAULT NULL,
   `FK_RECEPCIONISTA_id_Recepcionista` integer DEFAULT NULL,
   `FK_INSTRUTOR_id_Instrutor`         integer DEFAULT NULL,
   `FK_ALUNO_id_Aluno`                 integer DEFAULT NULL,
 PRIMARY KEY (`id_Atividade_faz_Atividade`));

 
