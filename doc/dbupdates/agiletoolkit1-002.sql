ALTER TABLE `atk_user` CHANGE `is_admin` `is_admin` CHAR(1)  CHARACTER SET utf8  COLLATE utf8_general_ci  NULL  DEFAULT NULL;
ALTER TABLE `atk_user` CHANGE `email_global` `email_global` CHAR(1)  CHARACTER SET utf8  COLLATE utf8_general_ci  NULL  DEFAULT 'Y';
ALTER TABLE `atk_user` CHANGE `email_major_releases` `email_major_releases` CHAR(1)  CHARACTER SET utf8  COLLATE utf8_general_ci  NULL  DEFAULT 'Y';
ALTER TABLE `atk_user` CHANGE `email_blog` `email_blog` CHAR(1)  CHARACTER SET utf8  COLLATE utf8_general_ci  NULL  DEFAULT 'Y';
ALTER TABLE `atk_user` CHANGE `email_minor_releases` `email_minor_releases` CHAR(1)  CHARACTER SET utf8  COLLATE utf8_general_ci  NULL  DEFAULT 'Y';
ALTER TABLE `atk_user` CHANGE `email_survey` `email_survey` CHAR(1)  CHARACTER SET utf8  COLLATE utf8_general_ci  NULL  DEFAULT 'Y';

update atk_user set 
    is_email_confirmed=if(is_email_confirmed='Y',1,0),
    is_admin=if(is_admin='Y',1,0),
    email_global=if(email_global='Y',1,0),
    email_major_releases=if(email_global='Y',1,0),
    email_major_releases=if(email_major_releases='Y',1,0),
    email_blog=if(email_blog='Y',1,0),
    email_minor_releases=if(email_major_releases='Y',1,0),
    email_survey=if(email_survey='Y',1,0)
    ;


ALTER TABLE `atk_user` CHANGE COLUMN `is_email_confirmed` `is_email_confirmed` VARCHAR(45) NOT NULL DEFAULT 0  , CHANGE COLUMN `is_admin` `is_admin` TINYINT(1) NOT NULL DEFAULT 0  , CHANGE COLUMN `email_global` `email_global` TINYINT(1) NOT NULL DEFAULT 1  , CHANGE COLUMN `email_major_releases` `email_major_releases` TINYINT(1) NOT NULL DEFAULT 1  , CHANGE COLUMN `email_blog` `email_blog` TINYINT(1) NOT NULL DEFAULT 1  , CHANGE COLUMN `email_minor_releases` `email_minor_releases` TINYINT(1) NOT NULL DEFAULT 1  , CHANGE COLUMN `email_survey` `email_survey` TINYINT(1) NOT NULL DEFAULT 1  ;

    

