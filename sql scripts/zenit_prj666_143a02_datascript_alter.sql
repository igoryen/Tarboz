ALTER TABLE `prj666`.`tbl_comment` 
ADD COLUMN `com_entry_id` VARCHAR(25) NULL AFTER `com_created_by`;

ALTER TABLE `prj666`.`tbl_comment` 
ADD COLUMN `com_is_visible` VARCHAR(1) NULL DEFAULT 'Y' AFTER `com_entry_id`;

ALTER TABLE `prj666`.`tbl_comment` 
ADD COLUMN `com_created_on` DATETIME NULL AFTER `com_is_visible`;



ALTER TABLE `prj666`.`tbl_entry_english` 
DROP FOREIGN KEY `tblEntryEnglish_tblComment_ent_entry_comment_id_FK`;
ALTER TABLE `prj666`.`tbl_entry_english` 
DROP INDEX `tblEntryEng_tblComment_commentid_FK_idx` ;

ALTER TABLE `prj666`.`tbl_entry_mandarin` 
DROP FOREIGN KEY `tblEntryMandarin_tblComment_commentId_FK`;
ALTER TABLE `prj666`.`tbl_entry_mandarin` 
DROP INDEX `tblEntryMandarin_tblComment_comment_id_FK_idx` ;

ALTER TABLE `prj666`.`tbl_entry_russian` 
DROP FOREIGN KEY `tblEntryRussian_tblComment_ent_entry_commentId_FK`;
ALTER TABLE `prj666`.`tbl_entry_russian` 
DROP INDEX `tblEntryRussian_tblComment_comment_id_FK_idx` ;

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
<<<<<<< HEAD
=======

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






>>>>>>> 584f80e3a83ce39a0360d2878544c296c42c402e
