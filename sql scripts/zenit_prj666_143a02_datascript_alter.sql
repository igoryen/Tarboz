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