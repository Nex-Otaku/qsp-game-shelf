-- MySQL Workbench Synchronization
-- Generated: 2017-01-26 07:13
-- Model: New Model
-- Version: 1.0
-- Project: Name of the project
-- Author: User

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

ALTER TABLE `feed` 
CHANGE COLUMN `created_by` `created_by` BINARY(16) NULL DEFAULT NULL ,
CHANGE COLUMN `updated_by` `updated_by` BINARY(16) NULL DEFAULT NULL ,
CHANGE COLUMN `deleted_by` `deleted_by` BINARY(16) NULL DEFAULT NULL ;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
