ALTER TABLE `prj666`.`tbl_comment` 
ADD COLUMN `com_entry_id` VARCHAR(25) NULL AFTER `com_created_by`;

ALTER TABLE `prj666`.`tbl_comment` 
ADD COLUMN `com_is_visible` VARCHAR(1) NULL DEFAULT 'Y' AFTER `com_entry_id`;

ALTER TABLE `prj666`.`tbl_comment` 
ADD COLUMN `com_created_on` DATETIME NULL AFTER `com_is_visible`;


UPDATE prj666.tbl_comment
SET com_entry_id = 'eng1' ;

INSERT INTO `prj666`.`tbl_comment` (`com_text`, `com_rating_id`, `com_created_by`, `com_entry_id`)
VALUES ('I like it', '2', 2, 'eng1');

INSERT INTO `prj666`.`tbl_comment` (`com_text`, `com_rating_id`, `com_created_by`, `com_entry_id`)
VALUES ('It\'s helpful', '2', 2, 'ru1');

INSERT INTO `prj666`.`tbl_comment` (`com_text`, `com_rating_id`, `com_created_by`, `com_entry_id`)
VALUES ('Non sense, very bad interpretation', '1', 1, 'ru2');

INSERT INTO `prj666`.`tbl_comment` (`com_text`, `com_rating_id`, `com_created_by`, `com_entry_id`)
VALUES ('Not catch the main idea', '1', 2, 'cmn1');

INSERT INTO `prj666`.`tbl_comment` (`com_text`, `com_rating_id`, `com_created_by`, `com_entry_id`)
VALUES ('Very interesting translation', '1', 1, 'cmn1');


ALTER TABLE `prj666`.`tbl_rating` 
DROP FOREIGN KEY `tblRating_tblUser_rat_rating_like_user_id_FK`,
DROP FOREIGN KEY `tblRating_tblUser_rat_rating_dislike_user_id_FK`;
ALTER TABLE `prj666`.`tbl_rating` 
DROP INDEX `tblRating_tblUser_rat_rating_like_user_id_FK_idx` ;


ALTER TABLE `prj666`.`tbl_report` 
ADD COLUMN `rep_reported_by` INT(11) NULL AFTER `rep_entity_id`,
ADD COLUMN `rep_reported_on` DATETIME NULL AFTER `rep_reported_by`;


#-------Insert more data on rating table on Nov 3
INSERT INTO `prj666`.`tbl_rating` (`rat_rating_id`, `rat_entity_id`, `rat_like_user_id`, `rat_dislike_user_id`, `rat_created_on`) 
VALUES ('28', 'ent13', '1', '0', '2014-11-03 07:47:55');

INSERT INTO `prj666`.`tbl_rating` (`rat_rating_id`, `rat_entity_id`, `rat_like_user_id`, `rat_dislike_user_id`, `rat_created_on`) 
VALUES ('29', 'ent13', '2', '0', '2014-11-03 08:03:22');

INSERT INTO `prj666`.`tbl_rating` (`rat_rating_id`, `rat_entity_id`, `rat_like_user_id`, `rat_dislike_user_id`, `rat_created_on`) 
VALUES ('30', 'ent13', '3', '0', '2014-11-03 08:04:44');

INSERT INTO `prj666`.`tbl_rating` (`rat_rating_id`, `rat_entity_id`, `rat_like_user_id`, `rat_dislike_user_id`, `rat_created_on`) 
VALUES ('31', 'ent13', '4', '0', '2014-11-03 08:05:33');

INSERT INTO `prj666`.`tbl_rating` (`rat_rating_id`, `rat_entity_id`, `rat_like_user_id`, `rat_dislike_user_id`, `rat_created_on`) 
VALUES ('32', 'ent11', '1', '0', '2014-11-03 08:06:07');

INSERT INTO `prj666`.`tbl_rating` (`rat_rating_id`, `rat_entity_id`, `rat_like_user_id`, `rat_dislike_user_id`, `rat_created_on`) 
VALUES ('33', 'ent11', '3', '0', '2014-11-03 08:08:08');

INSERT INTO `prj666`.`tbl_rating` (`rat_rating_id`, `rat_entity_id`, `rat_like_user_id`, `rat_dislike_user_id`, `rat_created_on`) 
VALUES ('34', 'ent38', '1', '0', '2014-11-03 08:09:08');

INSERT INTO `prj666`.`tbl_rating` (`rat_rating_id`, `rat_entity_id`, `rat_like_user_id`, `rat_dislike_user_id`, `rat_created_on`) 
VALUES ('35', 'ent38', '2', '0', '2014-11-03 08:09:22');

INSERT INTO `prj666`.`tbl_rating` (`rat_rating_id`, `rat_entity_id`, `rat_like_user_id`, `rat_dislike_user_id`, `rat_created_on`) 
VALUES ('36', 'ent38', '3', '0', '2014-11-03 08:10:10');

ALTER TABLE `prj666`.`tbl_comment` 
DROP FOREIGN KEY `tblComment_tblRating_com_comment_rating_id_FK`;
ALTER TABLE `prj666`.`tbl_comment` 
DROP INDEX `tblComment_tblRating_com_comment_rating_id_FK_idx` ;

UPDATE `prj666`.`tbl_entry` SET `ent_entry_creation_date`='2014-10-01' WHERE `ent_entry_id`='2';
UPDATE `prj666`.`tbl_entry` SET `ent_entry_creation_date`='2014-10-02' WHERE `ent_entry_id`='3';
UPDATE `prj666`.`tbl_entry` SET `ent_entry_creation_date`='2014-10-03' WHERE `ent_entry_id`='4';
UPDATE `prj666`.`tbl_entry` SET `ent_entry_creation_date`='2014-10-04' WHERE `ent_entry_id`='5';
UPDATE `prj666`.`tbl_entry` SET `ent_entry_creation_date`='2014-10-05' WHERE `ent_entry_id`='6';
UPDATE `prj666`.`tbl_entry` SET `ent_entry_creation_date`='2014-10-06' WHERE `ent_entry_id`='7';
UPDATE `prj666`.`tbl_entry` SET `ent_entry_creation_date`='2014-10-07' WHERE `ent_entry_id`='8';
UPDATE `prj666`.`tbl_entry` SET `ent_entry_creation_date`='2014-10-08' WHERE `ent_entry_id`='9';
UPDATE `prj666`.`tbl_entry` SET `ent_entry_creation_date`='2014-10-09' WHERE `ent_entry_id`='11';
UPDATE `prj666`.`tbl_entry` SET `ent_entry_creation_date`='2014-10-10' WHERE `ent_entry_id`='12';
UPDATE `prj666`.`tbl_entry` SET `ent_entry_creation_date`='2014-10-11' WHERE `ent_entry_id`='13';
UPDATE `prj666`.`tbl_entry` SET `ent_entry_creation_date`='2014-10-12' WHERE `ent_entry_id`='14';
UPDATE `prj666`.`tbl_entry` SET `ent_entry_creation_date`='2014-10-13' WHERE `ent_entry_id`='24';
UPDATE `prj666`.`tbl_entry` SET `ent_entry_creation_date`='2014-10-14' WHERE `ent_entry_id`='26';
UPDATE `prj666`.`tbl_entry` SET `ent_entry_creation_date`='2014-10-15' WHERE `ent_entry_id`='27';
UPDATE `prj666`.`tbl_entry` SET `ent_entry_creation_date`='2014-10-16' WHERE `ent_entry_id`='28';
UPDATE `prj666`.`tbl_entry` SET `ent_entry_creation_date`='2014-10-17' WHERE `ent_entry_id`='29';
UPDATE `prj666`.`tbl_entry` SET `ent_entry_creation_date`='2014-10-18' WHERE `ent_entry_id`='32';
UPDATE `prj666`.`tbl_entry` SET `ent_entry_creation_date`='2014-10-19' WHERE `ent_entry_id`='33';
UPDATE `prj666`.`tbl_entry` SET `ent_entry_creation_date`='2014-10-20' WHERE `ent_entry_id`='34';
UPDATE `prj666`.`tbl_entry` SET `ent_entry_creation_date`='2014-10-21' WHERE `ent_entry_id`='36';
UPDATE `prj666`.`tbl_entry` SET `ent_entry_creation_date`='2014-10-22' WHERE `ent_entry_id`='37';
UPDATE `prj666`.`tbl_entry` SET `ent_entry_creation_date`='2014-10-23' WHERE `ent_entry_id`='38';
UPDATE `prj666`.`tbl_entry` SET `ent_entry_creation_date`='2014-10-24' WHERE `ent_entry_id`='39';
UPDATE `prj666`.`tbl_entry` SET `ent_entry_creation_date`='2014-10-25' WHERE `ent_entry_id`='40';
UPDATE `prj666`.`tbl_entry` SET `ent_entry_creation_date`='2014-10-26' WHERE `ent_entry_id`='41';
UPDATE `prj666`.`tbl_entry` SET `ent_entry_creation_date`='2014-10-27' WHERE `ent_entry_id`='42';
UPDATE `prj666`.`tbl_entry` SET `ent_entry_creation_date`='2014-10-28' WHERE `ent_entry_id`='52';
UPDATE `prj666`.`tbl_entry` SET `ent_entry_creation_date`='2014-10-29' WHERE `ent_entry_id`='53';


INSERT INTO `prj666`.`tbl_media_type` (`mtp_media_type_id`, `mtp_name`) VALUES ('4', 'text');

UPDATE `prj666`.`tbl_entry` SET `ent_entry_media_id`='3' WHERE `ent_entry_id`='5';

UPDATE `prj666`.`tbl_city` SET `cty_province_id` = '1' WHERE `tbl_city`.`cty_city_id` = 1;

INSERT INTO `tbl_city`(`cty_city_id`, `cty_city_name`, `cty_province_id`) VALUES (1,'Toronto',1);
INSERT INTO `tbl_city`(`cty_city_id`, `cty_city_name`, `cty_province_id`) VALUES (2,'Maykop',2); INSERT INTO `tbl_city`(`cty_city_id`, `cty_city_name`, `cty_province_id`) VALUES (3,'Luoyang',3);

UPDATE `prj666`.`tbl_user` SET `usr_location_id` = '1' WHERE `tbl_user`.`usr_user_id` = 1;

ALTER TABLE `prj666`.`tbl_entry` 
ADD COLUMN `ent_entry_deleted` INT NULL DEFAULT 0 AFTER `ent_entry_creation_date`;

UPDATE `prj666`.`tbl_user_type` SET `utp_usertype_id`='5', `utp_type_name`='banned' WHERE `utp_usertype_id`='4';
UPDATE `prj666`.`tbl_user_type` SET `utp_usertype_id`='4', `utp_type_name`='inactive' WHERE `utp_usertype_id`='3';
INSERT INTO `prj666`.`tbl_user_type` (`utp_usertype_id`, `utp_type_name`) VALUES ('6', 'noconfirmed');

