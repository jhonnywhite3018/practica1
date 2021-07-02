DROP DATABASE IF EXISTS h1;

CREATE DATABASE IF NOT EXISTS h1
CHARACTER SET latin1
COLLATE latin1_swedish_ci;

--
-- Set default database
--
USE h1;

--
-- Create table `coches`
--
CREATE TABLE IF NOT EXISTS entradas (
  id int(11) NOT NULL AUTO_INCREMENT,
  texto varchar(255) DEFAULT NULL,
  PRIMARY KEY (id)
)
ENGINE = INNODB,
CHARACTER SET latin1,
COLLATE latin1_swedish_ci;