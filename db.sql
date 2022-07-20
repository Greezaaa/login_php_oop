CREATE DATABASE IF NOT EXISTS `login`;

CREATE TABLE
    IF NOT EXISTS `login`.`loginUsers` (
        `id` INT NOT NULL AUTO_INCREMENT,
        `username` VARCHAR(250) NOT NULL,
        `email` VARCHAR(250) NOT NULL,
        `password` VARCHAR(250) NOT NULL,
        `data_create` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
        PRIMARY KEY (`id`)
    ) ENGINE = InnoDB;