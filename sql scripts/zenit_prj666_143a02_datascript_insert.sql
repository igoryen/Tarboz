#----tbl_authen_status table
INSERT INTO `prj666_143a02`.`tbl_authen_status` (`athn_stat_name`)
VALUES ('original');
INSERT INTO `prj666_143a02`.`tbl_authen_status` (`athn_stat_name`)
VALUES ('translate');

#----tbl_country table
INSERT INTO `prj666_143a02`.`tbl_country` (`con_country_name`,`con_country_code`)
VALUES ('Canada', '1');
INSERT INTO `prj666_143a02`.`tbl_country` (`con_country_name`,`con_country_code`)
VALUES ('Russia', '7');
INSERT INTO `prj666_143a02`.`tbl_country` (`con_country_name`,`con_country_code`)
VALUES ('China', '86');

#----tbl_province table
SET foreign_key_checks = 0;
INSERT INTO `prj666_143a02`.`tbl_province` (`pro_province_name`,`pro_country_id`)
VALUES ('Ontario', 1);
INSERT INTO `prj666_143a02`.`tbl_province` (`pro_province_name`,`pro_country_id`)
VALUES ('Chechnya', 2);
INSERT INTO `prj666_143a02`.`tbl_province` (`pro_province_name`,`pro_country_id`)
VALUES ('Henan', 3);

#----tbl_city table
INSERT INTO `prj666_143a02`.`tbl_city` (`cty_city_name`)
VALUES('Toronto');
INSERT INTO `prj666_143a02`.`tbl_city` (`cty_city_name`)
VALUES('Maykop');
INSERT INTO `prj666_143a02`.`tbl_city` (`cty_city_name`)
VALUES('Luoyang');

#----tbl_language  table
INSERT INTO `prj666_143a02`.`tbl_language` (`lan_lang_name`)
VALUES ('English');
INSERT INTO `prj666_143a02`.`tbl_language` (`lan_lang_name`)
VALUES ('Russian');
INSERT INTO `prj666_143a02`.`tbl_language` (`lan_lang_name`)
VALUES ('Chinese-Simplify');

#----tbl_mediatype  table
INSERT INTO `prj666_143a02`.`tbl_media_type` (`mtp_name`)
VALUES ('audio');
INSERT INTO `prj666_143a02`.`tbl_media_type` (`mtp_name`)
VALUES ('video');
INSERT INTO `prj666_143a02`.`tbl_media_type` (`mtp_name`)
VALUES ('picture');

#----tbl_comment table
SET foreign_key_checks = 0;
INSERT INTO `prj666_143a02`.`tbl_comment` (`com_text`, `com_rating_id`, `com_created_by`)
VALUES ('This is awesome. Thanks', '1', 1);
INSERT INTO `prj666_143a02`.`tbl_comment` (`com_text`, `com_rating_id`, `com_created_by`)
VALUES ('It\'s not accurate!!!', '2', 1);

#----tbl_media table
SET foreign_key_checks = 0;
INSERT INTO `prj666_143a02`.`tbl_media`
(`med_name`,`med_desc`,`med_link`,`med_author`,`med_mediatype_id`,`med_comment_id`,`med_rating_id`)
VALUES ('Forrest Gump','movie','','','2','1' , '1' );
INSERT INTO `prj666_143a02`.`tbl_media` 
(`med_name`,`med_desc`,`med_link`,`med_author`,`med_mediatype_id`,`med_comment_id`,`med_rating_id`)
VALUES ('John in the farm','picture','','John','3','2' , '2' );

#----tbl_location table
SET foreign_key_checks = 0;
INSERT INTO `prj666_143a02`.`tbl_location` (`loc_address`, `loc_postalcode`, `loc_city_id`, `loc_country`, `loc_continent`)
VALUES('70 The Pond Road', 'M3J 3M6', 1, 'Canada','North America');
INSERT INTO `prj666_143a02`.`tbl_location` (`loc_address`, `loc_postalcode`, `loc_city_id`, `loc_country`, `loc_continent`)
VALUES('36 Zhongzhou Road, Jianxi District', '471000', 3,'China', 'Asia');


#----tbl_user_type table
SET foreign_key_checks = 0;
INSERT INTO `prj666_143a02`.`tbl_user_type` (`utp_type_name`)
VALUES('admin');
INSERT INTO `prj666_143a02`.`tbl_user_type` (`utp_type_name`)
VALUES('user');
INSERT INTO `prj666_143a02`.`tbl_user_type` (`utp_type_name`)
VALUES('admin');
INSERT INTO `prj666_143a02`.`tbl_user_type` (`utp_type_name`)
VALUES('guest');

#----tbl_subscription table
SET foreign_key_checks = 0;
INSERT INTO `prj666_143a02`.`tbl_subscription` (`sub_email_address`, `sub_name`, `sub_location_name`)
VALUES('lfan9@mysenecac.ca', 'Linpei', 'China');
INSERT INTO `prj666_143a02`.`tbl_subscription` (`sub_email_address`, `sub_name`, `sub_location_name`)
VALUES('igor.yentaltsev@gmail.com', 'Igor', 'Russia');

#----tbl_sublangbridge table
SET foreign_key_checks = 0;
INSERT INTO `prj666_143a02`.`tbl_sublangbridge` (`slb_subscribe_id`, `slb_language_id`)
VALUES(1, 3);
INSERT INTO `prj666_143a02`.`tbl_sublangbridge` (`slb_subscribe_id`, `slb_language_id`)
VALUES(2, 2);

#----tbl_author table
INSERT INTO `prj666_143a02`.`tbl_author` (`aut_author_name`, `aut_author_time`, `aut_author_geo`)
VALUES('William Shakespeare','', 'Britain');
INSERT INTO `prj666_143a02`.`tbl_author` (`aut_author_name`, `aut_author_time`, `aut_author_geo`)
VALUES('Alexander Pushkin',  '1799-1837','Russia');
INSERT INTO `prj666_143a02`.`tbl_author` (`aut_author_name`, `aut_author_time`, `aut_author_geo`)
VALUES('unknown', 'unknown', 'China');
INSERT INTO `prj666_143a02`.`tbl_author` (`aut_author_name`, `aut_author_time`, `aut_author_geo`)
VALUES('Mikhail Lermontov','', 'Russia');
INSERT INTO `prj666_143a02`.`tbl_author` (`aut_author_name`, `aut_author_time`, `aut_author_geo`)
VALUES('Confucius/Kongzi', 'China', 'B.C. 500\'s');

#----tbl_source table
INSERT INTO `prj666_143a02`.`tbl_source` (`sou_source_name`, `sou_source_form`, `sou_source_time`)
VALUES('unknown','poem', '');
INSERT INTO `prj666_143a02`.`tbl_source` (`sou_source_name`, `sou_source_form`, `sou_source_time`)
VALUES('Bronze Rider','poem', '');
INSERT INTO `prj666_143a02`.`tbl_source` (`sou_source_name`, `sou_source_form`, `sou_source_time`)
VALUES('unknown','poem', '');
INSERT INTO `prj666_143a02`.`tbl_source` (`sou_source_name`, `sou_source_form`, `sou_source_time`)
VALUES('unknown','song', 'unknown');
INSERT INTO `prj666_143a02`.`tbl_source` (`sou_source_name`, `sou_source_form`, `sou_source_time`)
VALUES('Lunyu','book', '');

#----tbl_user table
SET foreign_key_checks = 0;
INSERT INTO `prj666_143a02`.`tbl_user` 
(`usr_first_name`, `usr_last_name`, `usr_login`, `usr_password`, `usr_email`, `usr_DOB`, `usr_registration_date`, `usr_user_type_id`, `usr_language`, `usr_email_subscribed`)
VALUES('John', 'Smith', 'JohnSmith', '3179e51d6377d31cdc62e89c953055d8', 'johnsmith8976@gmail.com', '1966-06-06', '2014-02-03', 2, 'English, Russian', 'Y');
INSERT INTO `prj666_143a02`.`tbl_user` (`usr_first_name`, `usr_last_name`, `usr_login`, `usr_password`, `usr_email`, `usr_DOB`, `usr_registration_date`, `usr_user_type_id`, `usr_language`, `usr_email_subscribed`)
VALUES('Mary', 'White', 'marylovewwm', '63d0e0bc9ecd4b2b259492ab97c5ec95', 'mary_white1234@gmail.com', '1988-08-08', '2014-05-30', 2, 'English, Russian, Mandarin', 'Y');

#----tbl_entry_english table
SET foreign_key_checks = 0;
INSERT INTO `prj666_143a02`.`tbl_entry_english` (`ent_entry_Id`,`ent_entry_text`,`ent_entry_verbatim`, `ent_entry_translit`, `ent_entry_authen_status_id`, `ent_entry_translation_of`, `ent_entry_creator_id`, `ent_entry_comment_id`, `ent_entry_rating_id`, `ent_entry_author_id`, `ent_entry_source_id`)
VALUES('eng1','It\'s boring and sad, and there\'s no one around.', '','',2,'ru1', 1, 1, 1, 1, 1);

#----tbl_entry_russian table
SET foreign_key_checks = 0;
INSERT INTO `prj666_143a02`.`tbl_entry_russian` (`ent_entry_id`,`ent_entry_text`, `ent_entry_verbatim`, `ent_entry_translit`,`ent_entry_authen_status_id`,  `ent_entry_creator_id`, `ent_entry_comment_id`, `ent_entry_rating_id`, `ent_entry_author_id`, `ent_entry_source_id`,  `ent_entry_http_link`)
VALUES('ru1','И скучно, и грустно, и некому руку подать','and, bored, and, sad, and, nobody, hand, give', 'i skuchno, i grustno, i nekomu ruku podat',1, 1, 1, 1,   4, 3, 'http://max.mmlc.northwestern.edu/~mdenner/Demo/texts/bored_sad.html');
INSERT INTO `prj666_143a02`.`tbl_entry_russian` (`ent_entry_id`,`ent_entry_text`, `ent_entry_verbatim`, `ent_entry_translit`,`ent_entry_authen_status_id`,  `ent_entry_creator_id`, `ent_entry_comment_id`, `ent_entry_rating_id`,  `ent_entry_author_id`, `ent_entry_source_id`, `ent_entry_use`)
VALUES('ru2','Окно в Европу','window, in, Europe', 'okno v evropu',1, 1, 1, 1, 2, 2, 'a reference to the city of St.Petersburg');

#----tbl_entry_mandarin table
SET foreign_key_checks = 0;
INSERT INTO `prj666_143a02`.`tbl_entry_mandarin` (`ent_entry_id`,`ent_entry_text`, `ent_entry_verbatim`, `ent_entry_translit`,`ent_entry_authen_status_id`,  `ent_entry_creator_id`, `ent_entry_comment_id`, `ent_entry_rating_id`,  `ent_entry_source_id`)
VALUES('cmn1','祝你生日快乐','wish, you, birth, day, happy', 'zhu, ni, sheng, ri, quai, le',2, 2, 2, 2, 4);
INSERT INTO `prj666_143a02`.`tbl_entry_mandarin` (`ent_entry_id`,`ent_entry_text`, `ent_entry_verbatim`, `ent_entry_translit`,`ent_entry_authen_status_id`,  `ent_entry_creator_id`, `ent_entry_comment_id`, `ent_entry_rating_id`,  `ent_entry_author_id`, `ent_entry_source_id`)
VALUES('cmn2','三人行必有我师','three, person, walk, must, have, my, teacher', 'san, ren, xing, bi, you, wo, shi',1, 2, 2, 2, 5,4);

#----tbl_report table
SET foreign_key_checks = 0;
INSERT INTO `prj666_143a02`.`tbl_report` (`rep_reason`, `rep_entity_for_report`, `rep_entity_id`)
VALUES('hatred', 'user', 1);
INSERT INTO `prj666_143a02`.`tbl_report` (`rep_reason`, `rep_entity_for_report`, `rep_entity_id`)
VALUES('spam', 'comment', 1);

#----tbl_rating  table
SET foreign_key_checks = 0;
INSERT INTO `prj666_143a02`.`tbl_rating` (`rat_entity_id`,`rat_like_user_id`,`rat_dislike_user_id`)
VALUES ('eng1',1,2);
INSERT INTO `prj666_143a02`.`tbl_rating` (`rat_entity_id`,`rat_like_user_id`,`rat_dislike_user_id`)
VALUES ('ru1',2,1);