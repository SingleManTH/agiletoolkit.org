
SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

ALTER TABLE `atk_addon` DROP FOREIGN KEY `fk_atk_addon_atk_user1` ;

ALTER TABLE `atk_download` DROP FOREIGN KEY `fk_atk_download_atk_user` ;

ALTER TABLE `atk_purchase` DROP FOREIGN KEY `fk_atk_purchase_atk_user1` ;

ALTER TABLE `atk_survey_1` DROP FOREIGN KEY `fk_atk_survey_atk_user1` ;

ALTER TABLE `atk_user_survey` DROP FOREIGN KEY `fk_atk_user_survey_atk_user1` ;

ALTER TABLE `atk_addon` 
  ADD CONSTRAINT `fk_atk_addon_atk_user1`
  FOREIGN KEY (`atk_user_id` )
  REFERENCES `user` (`id` )
  ON DELETE CASCADE
  ON UPDATE NO ACTION;

ALTER TABLE `atk_download` 
  ADD CONSTRAINT `fk_atk_download_atk_user`
  FOREIGN KEY (`atk_user_id` )
  REFERENCES `user` (`id` )
  ON DELETE NO ACTION
  ON UPDATE NO ACTION;

ALTER TABLE `atk_purchase` 
  ADD CONSTRAINT `fk_atk_purchase_atk_user1`
  FOREIGN KEY (`atk_user_id` )
  REFERENCES `user` (`id` )
  ON DELETE NO ACTION
  ON UPDATE NO ACTION;

ALTER TABLE `atk_survey_1` 
  ADD CONSTRAINT `fk_atk_survey_atk_user1`
  FOREIGN KEY (`user_id` )
  REFERENCES `user` (`id` )
  ON DELETE NO ACTION
  ON UPDATE NO ACTION;

update atk_user set logged_dts=null where logged_dts='0000-00-00 00:00:00';
update atk_user set created_dts=null where created_dts='0000-00-00 00:00:00';
ALTER TABLE `atk_user` ADD COLUMN `rep` INT(11) NULL DEFAULT NULL  AFTER `password` , ADD COLUMN `username` VARCHAR(255) NULL DEFAULT NULL  AFTER `rep` , RENAME TO  `user` ;

ALTER TABLE `atk_user_survey` 
  ADD CONSTRAINT `fk_atk_user_survey_atk_user1`
  FOREIGN KEY (`user_id` )
  REFERENCES `user` (`id` )
  ON DELETE NO ACTION
  ON UPDATE NO ACTION;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
