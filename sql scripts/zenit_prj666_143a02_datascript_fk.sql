ALTER TABLE `prj666`.`tbl_entry`
ADD INDEX `tblEntry_tblLanguage_language_id_FK_idx` (`ent_entry_language_id` ASC);
ALTER TABLE `prj666`.`tbl_entry`
ADD CONSTRAINT `tblEntry_tblLanguage_language_id_FK`
 FOREIGN KEY (`ent_entry_language_id`)
 REFERENCES `prj666`.`tbl_language` (`lan_language_id`)
 ON DELETE NO ACTION
 ON UPDATE NO ACTION;

ALTER TABLE `prj666`.`tbl_entry`
ADD INDEX `tblEntry_tblAuthenStatus_authen_status_id_FK_idx` (`ent_entry_authen_status_id` ASC);
ALTER TABLE `prj666`.`tbl_entry`
ADD CONSTRAINT `tblEntry_tblAuthenStatus_ent_entry_authen_status_id_FK`
 FOREIGN KEY (`ent_entry_authen_status_id`)
 REFERENCES `prj666`.`tbl_authen_status` (`athn_authen_status_id`)
 ON DELETE NO ACTION
 ON UPDATE NO ACTION;

ALTER TABLE `prj666`.`tbl_entry`
ADD INDEX `tblEntry_tblUser_creator_id_FK_idx` (`ent_entry_creator_id` ASC);
ALTER TABLE `prj666`.`tbl_entry`
ADD CONSTRAINT `tblEntry_tblUser_ent_entry_creator_id_FK`
 FOREIGN KEY (`ent_entry_creator_id`)
 REFERENCES `prj666`.`tbl_user` (`usr_user_id`)
 ON DELETE NO ACTION
 ON UPDATE NO ACTION;

ALTER TABLE `prj666`.`tbl_entry`
ADD INDEX `tblEntry_tblMedia_media_id_FK_idx` (`ent_entry_media_id` ASC);
ALTER TABLE `prj666`.`tbl_entry`
ADD CONSTRAINT `tblEntry_tblMedia_ent_entry_media_id_FK`
 FOREIGN KEY (`ent_entry_media_id`)
 REFERENCES `prj666`.`tbl_media` (`med_media_id`)
 ON DELETE NO ACTION
 ON UPDATE NO ACTION;

ALTER TABLE `prj666`.`tbl_entry`
ADD INDEX `tblEntry_tblComment_commentid_FK_idx` (`ent_entry_comment_id` ASC);
ALTER TABLE `prj666`.`tbl_entry`
ADD CONSTRAINT `tblEntry_tblComment_ent_entry_comment_id_FK`
 FOREIGN KEY (`ent_entry_comment_id`)
 REFERENCES `prj666`.`tbl_comment` (`com_comment_id`)
 ON DELETE NO ACTION
 ON UPDATE NO ACTION;

ALTER TABLE `prj666`.`tbl_entry`
ADD INDEX `tblEntry_tblRating_rating_id_FK_idx` (`ent_entry_rating_id` ASC);
ALTER TABLE `prj666`.`tbl_entry`
ADD CONSTRAINT `tblEntry_tblRating_ent_entry_rating_id_FK`
 FOREIGN KEY (`ent_entry_rating_id`)
 REFERENCES `prj666`.`tbl_rating` (`rat_rating_id`)
 ON DELETE NO ACTION
 ON UPDATE NO ACTION;

ALTER TABLE `prj666`.`tbl_entry` 
ADD INDEX `tblEntry_tblAuthor_author_id_FK_idx` (`ent_entry_author_id` ASC);
ALTER TABLE `prj666`.`tbl_entry` 
ADD CONSTRAINT `tblEntry_tblAuthor_ent_entry_author_id_FK`
 FOREIGN KEY (`ent_entry_author_id`)
 REFERENCES `prj666`.`tbl_author` (`aut_author_id`)
 ON DELETE NO ACTION
 ON UPDATE NO ACTION;

ALTER TABLE `prj666`.`tbl_entry` 
ADD INDEX `tblEntry_tblSource_source_id_FK_idx` (`ent_entry_source_Id` ASC);
ALTER TABLE `prj666`.`tbl_entry` 
ADD CONSTRAINT `tblEntry_tblSource_ent_entry_source_id_FK`
 FOREIGN KEY (`ent_entry_source_id`)
 REFERENCES `prj666`.`tbl_source` (`sou_source_id`)
 ON DELETE NO ACTION
 ON UPDATE NO ACTION;


# table entry english
ALTER TABLE `prj666`.`tbl_entry_english`
ADD INDEX `tblEntryEng_tblAuthenStatus_authen_status_id_FK_idx` (`ent_entry_authen_status_id` ASC);
ALTER TABLE `prj666`.`tbl_entry_english`
ADD CONSTRAINT `tblEntryEnglish_tblAuthenStatus_ent_entry_authen_status_id_FK`
 FOREIGN KEY (`ent_entry_authen_status_id`)
 REFERENCES `prj666`.`tbl_authen_status` (`athn_authen_status_id`)
 ON DELETE NO ACTION
 ON UPDATE NO ACTION;

ALTER TABLE `prj666`.`tbl_entry_english`
ADD INDEX `tblEntryEng_tblUser_creator_id_FK_idx` (`ent_entry_creator_id` ASC);
ALTER TABLE `prj666`.`tbl_entry_english`
ADD CONSTRAINT `tblEntryEnglish_tblUser_ent_entry_creator_id_FK`
 FOREIGN KEY (`ent_entry_creator_id`)
 REFERENCES `prj666`.`tbl_user` (`usr_user_id`)
 ON DELETE NO ACTION
 ON UPDATE NO ACTION;

ALTER TABLE `prj666`.`tbl_entry_english`
ADD INDEX `tblEntryEng_tblMedia_media_id_FK_idx` (`ent_entry_media_id` ASC);
ALTER TABLE `prj666`.`tbl_entry_english`
ADD CONSTRAINT `tblEntryEnglish_tblMedia_ent_entry_media_id_FK`
 FOREIGN KEY (`ent_entry_media_id`)
 REFERENCES `prj666`.`tbl_media` (`med_media_id`)
 ON DELETE NO ACTION
 ON UPDATE NO ACTION;

ALTER TABLE `prj666`.`tbl_entry_english`
ADD INDEX `tblEntryEng_tblComment_commentid_FK_idx` (`ent_entry_comment_id` ASC);
ALTER TABLE `prj666`.`tbl_entry_english`
ADD CONSTRAINT `tblEntryEnglish_tblComment_ent_entry_comment_id_FK`
 FOREIGN KEY (`ent_entry_comment_id`)
 REFERENCES `prj666`.`tbl_comment` (`com_comment_id`)
 ON DELETE NO ACTION
 ON UPDATE NO ACTION;

ALTER TABLE `prj666`.`tbl_entry_english`
ADD INDEX `tblEntryEng_tblRating_rating_id_FK_idx` (`ent_entry_rating_id` ASC);
ALTER TABLE `prj666`.`tbl_entry_english`
ADD CONSTRAINT `tblEntryEnglish_tblRating_ent_entry_rating_id_FK`
 FOREIGN KEY (`ent_entry_rating_id`)
 REFERENCES `prj666`.`tbl_rating` (`rat_rating_id`)
 ON DELETE NO ACTION
 ON UPDATE NO ACTION;

ALTER TABLE `prj666`.`tbl_entry_english` 
ADD INDEX `tblEntryEng_tblAuthor_author_id_FK_idx` (`ent_entry_author_id` ASC);
ALTER TABLE `prj666`.`tbl_entry_english` 
ADD CONSTRAINT `tblEntryEnglish_tblAuthor_ent_entry_author_id_FK`
 FOREIGN KEY (`ent_entry_author_id`)
 REFERENCES `prj666`.`tbl_author` (`aut_author_id`)
 ON DELETE NO ACTION
 ON UPDATE NO ACTION;

ALTER TABLE `prj666`.`tbl_entry_english` 
ADD INDEX `tblEntryEng_tblSource_source_id_FK_idx` (`ent_entry_source_Id` ASC);
ALTER TABLE `prj666`.`tbl_entry_english` 
ADD CONSTRAINT `tblEntryEnglish_tblSource_ent_entry_source_id_FK`
 FOREIGN KEY (`ent_entry_source_id`)
 REFERENCES `prj666`.`tbl_source` (`sou_source_id`)
 ON DELETE NO ACTION
 ON UPDATE NO ACTION;

########table entry_russian
ALTER TABLE `prj666`.`tbl_entry_russian`
ADD INDEX `tblEntryRussian_tblAuthenStatus_authen_status_id_FK_idx` (`ent_entry_authen_status_id` ASC);
ALTER TABLE `prj666`.`tbl_entry_russian`
ADD CONSTRAINT `tblEntryRussian_tblAuthenStatus_ent_entryAuthenStatus_ID_FK`
 FOREIGN KEY (`ent_entry_authen_status_id`)
 REFERENCES `prj666`.`tbl_authen_status` (`athn_authen_status_id`)
 ON DELETE NO ACTION
 ON UPDATE NO ACTION;
 
ALTER TABLE `prj666`.`tbl_entry_russian`
ADD INDEX `tblEntryRussian_tblUser_creator_id_FK_idx` (`ent_entry_Creator_Id` ASC);
ALTER TABLE `prj666`.`tbl_entry_russian`
ADD CONSTRAINT `tblEntryRussian_tblUser_russiantbl_entry_russiantry_CreatorID_FK`
 FOREIGN KEY (`ent_entry_creator_id`)
 REFERENCES `prj666`.`tbl_user` (`usr_user_id`)
 ON DELETE NO ACTION
 ON UPDATE NO ACTION;
 
ALTER TABLE `prj666`.`tbl_entry_russian`
ADD INDEX `tblEntryRussian_tblMedia_media_id_FK_idx` (`ent_entry_Media_Id` ASC);
ALTER TABLE `prj666`.`tbl_entry_russian`
ADD CONSTRAINT `tblEntryRussian_tblMedia_ent_entry_MediaId_FK`
 FOREIGN KEY (`ent_entry_media_id`)
 REFERENCES `prj666`.`tbl_media` (`med_media_id`)
 ON DELETE NO ACTION
 ON UPDATE NO ACTION;
 
ALTER TABLE `prj666`.`tbl_entry_russian`
ADD INDEX `tblEntryRussian_tblComment_comment_id_FK_idx` (`ent_entry_comment_Id` ASC);
ALTER TABLE `prj666`.`tbl_entry_russian`
ADD CONSTRAINT `tblEntryRussian_tblComment_ent_entry_commentId_FK`
 FOREIGN KEY (`ent_entry_comment_Id`)
 REFERENCES `prj666`.`tbl_comment` (`com_comment_id`)
 ON DELETE NO ACTION
 ON UPDATE NO ACTION;
 
ALTER TABLE `prj666`.`tbl_entry_russian`
ADD INDEX `tblEntryRussian_tblRating_rating_id_FK_idx` (`ent_entry_rating_id` ASC);
ALTER TABLE `prj666`.`tbl_entry_russian`
ADD CONSTRAINT `tblEntryRussian_tblRating_ent_entry_rating_id_FK`
 FOREIGN KEY (`ent_entry_rating_id`)
 REFERENCES `prj666`.`tbl_rating` (`rat_rating_id`)
 ON DELETE NO ACTION
 ON UPDATE NO ACTION;

ALTER TABLE `prj666`.`tbl_entry_russian` 
ADD INDEX `tblEntryRussian_tblAuthor_author_id_FK_idx` (`ent_entry_author_id` ASC);
ALTER TABLE `prj666`.`tbl_entry_russian` 
ADD CONSTRAINT `tblEntryRussian_tblAuthor_ent_entry_author_id_FK`
 FOREIGN KEY (`ent_entry_author_id`)
 REFERENCES `prj666`.`tbl_author` (`aut_author_id`)
 ON DELETE NO ACTION
 ON UPDATE NO ACTION;

ALTER TABLE `prj666`.`tbl_entry_russian` 
ADD INDEX `tblEntryRussian_tblSource_source_id_FK_idx` (`ent_entry_source_id` ASC);
ALTER TABLE `prj666`.`tbl_entry_russian` 
ADD CONSTRAINT `tblEntryRussian_tblSource_ent_entry_source_id_FK`
 FOREIGN KEY (`ent_entry_source_id`)
 REFERENCES `prj666`.`tbl_source` (`sou_source_id`)
 ON DELETE NO ACTION
 ON UPDATE NO ACTION;

##############table entry_mandarin
ALTER TABLE `prj666`.`tbl_entry_mandarin`
ADD INDEX `tblEntryMandarin_tblAuthenStatus_authen_status_id_FK_idx` (`ent_entry_authen_status_id` ASC);
ALTER TABLE `prj666`.`tbl_entry_mandarin`
ADD CONSTRAINT `tblEntryMandarin_tblAuthenStatus_authen_status_id_FK`
 FOREIGN KEY (`ent_entry_authen_status_id`)
 REFERENCES `prj666`.`tbl_authen_status` (`athn_authen_status_id`)
 ON DELETE NO ACTION
 ON UPDATE NO ACTION;
 
ALTER TABLE `prj666`.`tbl_entry_mandarin`
ADD INDEX `tblEntryMandarin_tblUsercreator_id_FK_idx` (`ent_entry_creator_id` ASC);
ALTER TABLE `prj666`.`tbl_entry_mandarin`
ADD CONSTRAINT `tblEntryMandarin_tblUser_CreatorID_FK`
 FOREIGN KEY (`ent_entry_creator_id`)
 REFERENCES `prj666`.`tbl_user` (`usr_user_id`)
 ON DELETE NO ACTION
 ON UPDATE NO ACTION;
 
ALTER TABLE `prj666`.`tbl_entry_mandarin`
ADD INDEX `tblEntryMandarin_tblMedia_media_id_FK_idx` (`ent_entry_media_id` ASC);
ALTER TABLE `prj666`.`tbl_entry_mandarin`
ADD CONSTRAINT `tblEntryMandarin_tblMedia_media_id_FK`
 FOREIGN KEY (`ent_entry_media_id`)
 REFERENCES `prj666`.`tbl_media` (`med_media_id`)
 ON DELETE NO ACTION
 ON UPDATE NO ACTION;
 
ALTER TABLE `prj666`.`tbl_entry_mandarin`
ADD INDEX `tblEntryMandarin_tblComment_comment_id_FK_idx` (`ent_entry_comment_Id` ASC);
ALTER TABLE `prj666`.`tbl_entry_mandarin`
ADD CONSTRAINT `tblEntryMandarin_tblComment_commentId_FK`
 FOREIGN KEY (`ent_entry_comment_Id`)
 REFERENCES `prj666`.`tbl_comment` (`com_comment_id`)
 ON DELETE NO ACTION
 ON UPDATE NO ACTION;
 
ALTER TABLE `prj666`.`tbl_entry_mandarin`
ADD INDEX `tblEntryMandarin_tblRating_rating_id_FK_idx` (`ent_entry_rating_id` ASC);
ALTER TABLE `prj666`.`tbl_entry_mandarin`
ADD CONSTRAINT `tblEntryMandarin_tblRating_rating_id_FK`
 FOREIGN KEY (`ent_entry_rating_id`)
 REFERENCES `prj666`.`tbl_rating` (`rat_rating_id`)
 ON DELETE NO ACTION
 ON UPDATE NO ACTION;

ALTER TABLE `prj666`.`tbl_entry_mandarin` 
ADD INDEX `tblEntryMandarin_tblAuthor_author_id_FK_idx` (`ent_entry_author_id` ASC);
ALTER TABLE `prj666`.`tbl_entry_mandarin` 
ADD CONSTRAINT `tblEntryMandarin_tblAuthor_author_id_FK`
 FOREIGN KEY (`ent_entry_author_id`)
 REFERENCES `prj666`.`tbl_author` (`aut_author_id`)
 ON DELETE NO ACTION
 ON UPDATE NO ACTION;

ALTER TABLE `prj666`.`tbl_entry_mandarin` 
ADD INDEX `tblEntryMandarin_tblSource_eource_id_FK_idx` (`ent_entry_source_id` ASC);
ALTER TABLE `prj666`.`tbl_entry_mandarin` 
ADD CONSTRAINT `tblEntryMandarin_tblSource_source_id_FK`
 FOREIGN KEY (`ent_entry_source_id`)
 REFERENCES `prj666`.`tbl_source` (`sou_source_id`)
 ON DELETE NO ACTION
 ON UPDATE NO ACTION;

##------------table user-----------------
ALTER TABLE `prj666`.`tbl_user`
ADD INDEX `tblUser_tblMedia_usr_user_media_id_FK_idx` (`usr_media_id` ASC);
ALTER TABLE `prj666`.`tbl_user`
ADD CONSTRAINT `tblUser_tblMedia_usr_user_media_id_FK`
 FOREIGN KEY (`usr_media_id`)
 REFERENCES `prj666`.`tbl_media` (`med_media_id`)
 ON DELETE NO ACTION
 ON UPDATE NO ACTION;
 
ALTER TABLE `prj666`.`tbl_user`
ADD INDEX `tblUser_tblRating_usr_user_uating_id_FK_idx` (`usr_rating_id` ASC);
ALTER TABLE `prj666`.`tbl_user`
ADD CONSTRAINT `tblUser_tblRating_usr_user_uating_id_FK`
 FOREIGN KEY (`usr_rating_id`)
 REFERENCES `prj666`.`tbl_rating` (`rat_rating_id`)
 ON DELETE NO ACTION
 ON UPDATE NO ACTION;
 
ALTER TABLE `prj666`.`tbl_user`
ADD INDEX `tblUser_tblLocation_usr_user_location_id_FK_idx` (`usr_location_id` ASC);
ALTER TABLE `prj666`.`tbl_user`
ADD CONSTRAINT `tblUser_tblLocation_usr_user_location_id_FK`
 FOREIGN KEY (`usr_location_id`)
 REFERENCES `prj666`.`tbl_location` (`loc_location_id`)
 ON DELETE NO ACTION
 ON UPDATE NO ACTION;

ALTER TABLE `prj666`.`tbl_user`
ADD INDEX `tblUser_tblUserType_usr_user_user_type_id_FK_idx` (`usr_user_type_id` ASC);
ALTER TABLE `prj666`.`tbl_user`
ADD CONSTRAINT `tblUser_tblUserType_usr_user_user_type_id_FK`
 FOREIGN KEY (`usr_user_type_id`)
 REFERENCES `prj666`.`tbl_user_type` (`utp_usertype_id`)
 ON DELETE NO ACTION
 ON UPDATE NO ACTION;

#---------table rating--------------
ALTER TABLE `prj666`.`tbl_rating` 
ADD INDEX `tblRating_tblUser_rat_rating_like_user_id_FK_idx` (`rat_like_user_id` ASC);
ALTER TABLE `prj666`.`tbl_rating` 
ADD CONSTRAINT `tblRating_tblUser_rat_rating_like_user_id_FK`
 FOREIGN KEY (`rat_like_user_id`)
 REFERENCES `prj666`.`tbl_user` (`usr_user_id`)
 ON DELETE NO ACTION
 ON UPDATE NO ACTION;

ALTER TABLE `prj666`.`tbl_rating` 
ADD INDEX `tblRating_tblUser_rat_rating_dislike_user_id_FK_idx` (`rat_dislike_user_id` ASC);
ALTER TABLE `prj666`.`tbl_rating` 
ADD CONSTRAINT `tblRating_tblUser_rat_rating_dislike_user_id_FK`
 FOREIGN KEY (`rat_dislike_user_id`)
 REFERENCES `prj666`.`tbl_user` (`usr_user_id`)
 ON DELETE NO ACTION
 ON UPDATE NO ACTION;

#---------table sublangbridge-----------
ALTER TABLE `prj666`.`tbl_sublangbridge`
ADD INDEX `tblSublangbridge_tblSubscription_subscriber_id_FK_idx` (`slb_subscribe_id` ASC);
ALTER TABLE `prj666`.`tbl_sublangbridge`
ADD CONSTRAINT `tblSublangbridge_tblSubscription_subscriber_id_FK`
 FOREIGN KEY (`slb_subscribe_id`)
 REFERENCES `prj666`.`tbl_subscription` (`sub_subscribe_id`)
 ON DELETE NO ACTION
 ON UPDATE NO ACTION;
 
ALTER TABLE `prj666`.`tbl_sublangbridge`
ADD INDEX `tblSublangbridge_tblLanguage_lang_id_FK_idx` (`slb_language_id` ASC);
ALTER TABLE `prj666`.`tbl_sublangbridge`
ADD CONSTRAINT `tblSublangbridge_tblLanguage_lang_id_FK`
 FOREIGN KEY (`slb_language_id`)
 REFERENCES `prj666`.`tbl_language` (`lan_language_id`)
 ON DELETE NO ACTION
 ON UPDATE NO ACTION;
 
#---------table location-----------
ALTER TABLE `prj666`.`tbl_location`
ADD INDEX `tblLocation_tblCity_loc_location_city_id_FK_idx` (`loc_city_id` ASC);
ALTER TABLE `prj666`.`tbl_location`
ADD CONSTRAINT `tblLocation_tblCity_loc_location_city_id_FK`
 FOREIGN KEY (`loc_city_id`)
 REFERENCES `prj666`.`tbl_city` (`cty_city_id`)
 ON DELETE NO ACTION
 ON UPDATE NO ACTION;
 
#---------table city-----------
ALTER TABLE `prj666`.`tbl_city`
ADD INDEX `tblCity_tblLocation_cty_city_location_id_FK_idx` (`cty_province_id` ASC);
ALTER TABLE `prj666`.`tbl_city`
ADD CONSTRAINT `tblCity_tblLocation_cty_city_location_id_FK`
 FOREIGN KEY (`cty_province_id`)
 REFERENCES `prj666`.`tbl_location` (`loc_location_id`)
 ON DELETE NO ACTION
 ON UPDATE NO ACTION;

#---------table province-----------
ALTER TABLE `prj666`.`tbl_province` 
ADD INDEX `tblProvince_tblCountry_pro_province_country_id_FK_idx` (`pro_country_id` ASC);
ALTER TABLE `prj666`.`tbl_province` 
ADD CONSTRAINT `tblProvince_tblCountry_pro_province_country_id_FK`
 FOREIGN KEY (`pro_country_id`)
 REFERENCES `prj666`.`tbl_country` (`con_country_id`)
 ON DELETE NO ACTION
 ON UPDATE NO ACTION;
 
#---------table comment-----------
ALTER TABLE `prj666`.`tbl_comment`
ADD INDEX `tblComment_tblRating_com_comment_rating_id_FK_idx` (`com_rating_id` ASC);
ALTER TABLE `prj666`.`tbl_comment`
ADD CONSTRAINT `tblComment_tblRating_com_comment_rating_id_FK`
 FOREIGN KEY (`com_rating_id`)
 REFERENCES `prj666`.`tbl_rating` (`rat_rating_id`)
 ON DELETE NO ACTION
 ON UPDATE NO ACTION;
 
ALTER TABLE `prj666`.`tbl_comment`
ADD INDEX `tblComment_tblRating_com_comment_created_by_FK_idx` (`com_created_by` ASC);
ALTER TABLE `prj666`.`tbl_comment` 
ADD CONSTRAINT `tblComment_tblRating_com_comment_created_by_FK`
 FOREIGN KEY (`com_created_by`)
 REFERENCES `prj666`.`tbl_user` (`usr_user_id`)
 ON DELETE NO ACTION
 ON UPDATE NO ACTION;
 
#---------table media-----------
ALTER TABLE `prj666`.`tbl_media`
ADD INDEX `tblMedia_tblMediaType_med_media_media_type_id_FK_idx` (`med_media_type_id` ASC);
ALTER TABLE `prj666`.`tbl_media`
ADD CONSTRAINT `tblMedia_tblMediaType_med_media_media_type_id_FK`
 FOREIGN KEY (`med_media_type_id`)
 REFERENCES `prj666`.`tbl_media_type` (`mtp_media_type_id`)
 ON DELETE NO ACTION
 ON UPDATE NO ACTION;
 
ALTER TABLE `prj666`.`tbl_media`
ADD INDEX `tblMedia_tblMediaType_med_media_comment_id_FK_idx` (`med_comment_id` ASC);
ALTER TABLE `prj666`.`tbl_media`
ADD CONSTRAINT `tblMedia_tblMediaType_med_media_comment_id_FK`
 FOREIGN KEY (`med_comment_id`)
 REFERENCES `prj666`.`tbl_comment` (`com_comment_id`)
 ON DELETE NO ACTION
 ON UPDATE NO ACTION;
 
ALTER TABLE `prj666`.`tbl_media`
ADD INDEX `tblMedia_tblMediaType_med_media_rating_id_FK_idx` (`med_rating_id` ASC);
ALTER TABLE `prj666`.`tbl_media`
ADD CONSTRAINT `tblMedia_tblMediaType_med_media_rating_id_FK`
 FOREIGN KEY (`med_rating_id`)
 REFERENCES `prj666`.`tbl_rating` (`rat_rating_id`)
 ON DELETE NO ACTION
 ON UPDATE NO ACTION;

