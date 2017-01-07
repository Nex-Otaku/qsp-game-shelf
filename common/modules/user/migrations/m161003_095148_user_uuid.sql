-- MySQL Workbench Synchronization
-- Generated: 2016-10-03 12:35
-- Model: New Model
-- Version: 1.0
-- Project: Name of the project
-- Author: Программер

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ALLOW_INVALID_DATES';

ALTER TABLE `menu` 
DROP FOREIGN KEY `menu_ibfk_1`;

ALTER TABLE `profile` 
DROP FOREIGN KEY `fk_user_profile`;

ALTER TABLE `social_account` 
DROP FOREIGN KEY `fk_user_account`;

ALTER TABLE `token` 
DROP FOREIGN KEY `fk_user_token`;

ALTER TABLE `auth_assignment` 
CHANGE COLUMN `user_id` `user_id` BINARY(16) NOT NULL ;

ALTER TABLE `menu` 
CHANGE COLUMN `id` `id` BINARY(16) NOT NULL ,
CHANGE COLUMN `parent` `parent` BINARY(16) NULL DEFAULT NULL ;

ALTER TABLE `profile` 
CHANGE COLUMN `user_id` `user_id` BINARY(16) NOT NULL ;

ALTER TABLE `social_account` 
CHANGE COLUMN `id` `id` BINARY(16) NOT NULL ,
CHANGE COLUMN `user_id` `user_id` BINARY(16) NULL DEFAULT NULL ;

ALTER TABLE `token` 
CHANGE COLUMN `user_id` `user_id` BINARY(16) NOT NULL ;

ALTER TABLE `user` 
CHANGE COLUMN `id` `id` BINARY(16) NOT NULL ;

ALTER TABLE `menu` 
ADD CONSTRAINT `menu_ibfk_1`
  FOREIGN KEY (`parent`)
  REFERENCES `menu` (`id`)
  ON DELETE SET NULL
  ON UPDATE CASCADE;

ALTER TABLE `profile` 
ADD CONSTRAINT `fk_user_profile`
  FOREIGN KEY (`user_id`)
  REFERENCES `user` (`id`)
  ON DELETE CASCADE;

ALTER TABLE `social_account` 
ADD CONSTRAINT `fk_user_account`
  FOREIGN KEY (`user_id`)
  REFERENCES `user` (`id`)
  ON DELETE CASCADE;

ALTER TABLE `token` 
ADD CONSTRAINT `fk_user_token`
  FOREIGN KEY (`user_id`)
  REFERENCES `user` (`id`)
  ON DELETE CASCADE;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
