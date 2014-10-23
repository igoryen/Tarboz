CREATE TABLE `prj666`.`tbl_entry` (
  `ent_entry_id` INT NOT NULL AUTO_INCREMENT,
  `ent_entry_language_id` INT NOT NULL,
  `ent_entry_text` TEXT NOT NULL,
  `ent_entry_verbatim` TEXT NOT NULL,
  `ent_entry_translit` TEXT NOT NULL,
  `ent_entry_authen_status_id` INT NULL,
  `ent_entry_translation_of` VARCHAR(25) NULL,
  `ent_entry_creator_id` INT NULL,
  `ent_entry_media_id` INT NULL,
  `ent_entry_comment_id` INT NULL,
  `ent_entry_rating_id` INT NULL,
  `ent_entry_tags` VARCHAR(255) NULL,
  `ent_entry_author_id` INT NULL,
  `ent_entry_source_id` INT NULL,
  `ent_entry_use` VARCHAR(255) NULL,
  `ent_entry_http_link` VARCHAR(255) NULL,
  `ent_entry_creation_date` DATE NOT NULL,
  PRIMARY KEY (`ent_entry_id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


CREATE TABLE `prj666`.`tbl_entry_english` (
  `ent_entry_id` VARCHAR(25) NOT NULL,
  `ent_entry_text` TEXT NOT NULL,
  `ent_entry_verbatim` TEXT NOT NULL,
  `ent_entry_translit` TEXT NOT NULL,
  `ent_entry_authen_status_id` INT NULL,
  `ent_entry_translation_of` VARCHAR(25) NULL,
  `ent_entry_creator_id` INT NULL,
  `ent_entry_media_id` INT NULL,
  `ent_entry_comment_id` INT NULL,
  `ent_entry_rating_id` INT NULL,
  `ent_entry_tags` VARCHAR(255) NULL,
  `ent_entry_author_id` INT NULL,
  `ent_entry_source_id` INT NULL,
  `ent_entry_use` VARCHAR(255) NULL,
  `ent_entry_http_link` VARCHAR(255) NULL,
  PRIMARY KEY (`ent_entry_id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

ALTER TABLE `tbl_entry_english`
ADD `ent_entry_language` VARCHAR(25) NOT NULL
DEFAULT 'English'
AFTER `ent_entry_id`;

CREATE TABLE `prj666`.`tbl_entry_russian` (
  `ent_entry_id` VARCHAR(25) NOT NULL,
  `ent_entry_text` TEXT NOT NULL,
  `ent_entry_verbatim` TEXT NOT NULL,
  `ent_entry_translit` TEXT NOT NULL,
  `ent_entry_authen_status_id` INT NULL,
  `ent_entry_translation_of` VARCHAR(25) NULL,
  `ent_entry_creator_id` INT NULL,
  `ent_entry_media_id` INT NULL,
  `ent_entry_comment_id` INT NULL,
  `ent_entry_rating_id` INT NULL,
  `ent_entry_tags` VARCHAR(255) NULL,
  `ent_entry_author_id` INT NULL,
  `ent_entry_source_id` INT NULL,
  `ent_entry_use` VARCHAR(255) NULL,
  `ent_entry_http_link` VARCHAR(255) NULL,
  PRIMARY KEY (`ent_entry_id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE `prj666`.`tbl_entry_mandarin` (
  `ent_entry_id` VARCHAR(25) NOT NULL,
  `ent_entry_text` TEXT NOT NULL,
  `ent_entry_verbatim` TEXT NOT NULL,
  `ent_entry_translit` TEXT NOT NULL,
  `ent_entry_authen_status_id` INT NULL,
  `ent_entry_translation_of` VARCHAR(25) NULL,
  `ent_entry_creator_id` INT NULL,
  `ent_entry_media_id` INT NULL,
  `ent_entry_comment_id` INT NULL,
  `ent_entry_rating_id` INT NULL,
  `ent_entry_tags` VARCHAR(255) NULL,
  `ent_entry_author_id` INT NULL,
  `ent_entry_source_id` INT NULL,
  `ent_entry_use` VARCHAR(255) NULL,
  `ent_entry_http_link` VARCHAR(255) NULL,
  PRIMARY KEY (`ent_entry_id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

ALTER TABLE `tbl_entry_mandarin`
ADD `ent_entry_language` VARCHAR(25) NOT NULL
DEFAULT 'Chinese'
AFTER `ent_entry_id`;

CREATE TABLE `prj666`.`tbl_user` (
  `usr_user_id`  INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `usr_first_name`  VARCHAR(255) not null,
  `usr_last_name`  VARCHAR(255) not null,
  `usr_login`  VARCHAR(255) not null,
  `usr_password`  VARCHAR(255) not null,
  `usr_rating_id`  INT,
  `usr_media_id`  INT,
  `usr_email`  VARCHAR(255) not null,
  `usr_DOB`  DATE,
  `usr_location_id`  INT,
  `usr_registration_date`  DATE,
  `usr_user_type_id`  INT,
  `usr_language`  VARCHAR(255),
  `usr_email_subscribed` VARCHAR(1)
) ENGINE = InnoDB DEFAULT CHARACTER SET = utf8;

CREATE TABLE `prj666`.`tbl_authen_status` (
  `athn_authen_status_id`  INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `athn_stat_name`  VARCHAR(255)
) ENGINE = InnoDB DEFAULT CHARACTER SET = utf8;


CREATE TABLE  `prj666`.`tbl_city` (
  `cty_city_id`  INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `cty_city_name`  VARCHAR(255),
  `cty_province_id`  INT
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE  `prj666`.`tbl_comment`(
  `com_comment_id`  INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `com_text`  VARCHAR(500),
  `com_rating_id` INT,
  `com_created_by` INT
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE  `prj666`.`tbl_country`(
  `con_country_id`  INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `con_country_name`  VARCHAR(255),
  `con_country_code`  VARCHAR(255)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE  `prj666`.`tbl_language`(
  `lan_language_id`  INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `lan_lang_name`  VARCHAR(255)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE  `prj666`.`tbl_location`(
  `loc_location_id`  INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `loc_address`  VARCHAR(50),
  `loc_postalcode`  VARCHAR(10),
  `loc_city_id`  INT,
  `loc_country` VARCHAR(50),
  `loc_continent` VARCHAR(45)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE  `prj666`.`tbl_media`(
  `med_media_id`  INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `med_name`  VARCHAR(255),
  `med_desc`  VARCHAR(255),
  `med_link`  VARCHAR(255),
  `med_author`  VARCHAR(255),
  `med_media_type_id`  INT,
  `med_comment_id`  INT,
  `med_rating_id`  INT
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE  `prj666`.`tbl_media_type`(
  `mtp_media_type_id`  INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `mtp_name`  VARCHAR(255)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE  `prj666`.`tbl_province`(
  `pro_province_id`  INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `pro_province_name`  VARCHAR(30),
  `pro_country_id`  INT
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE  `prj666`.`tbl_rating`(
  `rat_rating_id`  INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `rat_entity_id` VARCHAR(25) NOT NULL,
  `rat_like_user_id` INT,
  `rat_dislike_user_id` INT,
  `rat_created_on` DATETIME
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE  `prj666`.`tbl_sublangbridge`(
  `slb_sublangbridge_id`  INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `slb_subscribe_id`  INT,
  `slb_language_id`  INT
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE  `prj666`.`tbl_subscription`(
  `sub_subscribe_id`  INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `sub_email_address`  VARCHAR(255),
  `sub_name`  VARCHAR(255),
  `sub_location_name`  VARCHAR(255)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE  `prj666`.`tbl_user_type`   (
  `utp_usertype_id`  INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `utp_type_name`  VARCHAR(255)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `prj666`.`tbl_report` (
 `rep_report_id` INT NOT NULL AUTO_INCREMENT,
 `rep_reason` VARCHAR(100) NULL,
 `rep_entity_for_report` VARCHAR(45) NULL,
 `rep_entity_id` INT(11) NULL,
 PRIMARY KEY (`rep_report_id`)
) ENGINE = InnoDB DEFAULT CHARACTER SET = utf8;

CREATE TABLE `prj666`.`tbl_author` (
 `aut_author_id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
 `aut_author_name` VARCHAR(100) NULL,
 `aut_author_time` VARCHAR(45) NULL,
 `aut_author_geo` VARCHAR(45) NULL
) ENGINE = InnoDB DEFAULT CHARACTER SET = utf8;

CREATE TABLE `prj666`.`tbl_source` (
 `sou_source_id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
 `sou_source_name` VARCHAR(255) NULL,
 `sou_source_form` VARCHAR(255) NULL,
 `sou_source_time` VARCHAR(255) NULL
) ENGINE = InnoDB DEFAULT CHARACTER SET = utf8;
