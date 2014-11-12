CREATE TABLE `prj666`.`tbl_entry` (
  `ent_entry_id` int(11) NOT NULL AUTO_INCREMENT,
  `ent_entry_language_id` int(11) NOT NULL,
  `ent_entry_text` text NOT NULL,
  `ent_entry_verbatim` text NOT NULL,
  `ent_entry_translit` text NOT NULL,
  `ent_entry_authen_status_id` int(11) DEFAULT NULL,
  `ent_entry_translation_of` varchar(25) DEFAULT NULL,
  `ent_entry_creator_id` int(11) DEFAULT NULL,
  `ent_entry_media_id` int(11) DEFAULT NULL,
  `ent_entry_comment_id` int(11) DEFAULT NULL,
  `ent_entry_rating_id` int(11) DEFAULT NULL,
  `ent_entry_tags` varchar(255) DEFAULT NULL,
  `ent_entry_author_id` int(11) DEFAULT NULL,
  `ent_entry_source_id` int(11) DEFAULT NULL,
  `ent_entry_use` varchar(255) DEFAULT NULL,
  `ent_entry_http_link` varchar(255) DEFAULT NULL,
  `ent_entry_transl_request_id` int(11) DEFAULT NULL,
  `ent_entry_deleted` tinyint(1) NOT NULL DEFAULT '0',
  `ent_entry_creation_date` date NOT NULL,
  PRIMARY KEY (`ent_entry_id`),
  FULLTEXT KEY `tblEntry_verbatim_idx` (`ent_entry_verbatim`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=92 ;

INSERT INTO `prj666`.`tbl_entry` (`ent_entry_id`, `ent_entry_language_id`, `ent_entry_text`, `ent_entry_verbatim`, `ent_entry_translit`, `ent_entry_authen_status_id`, `ent_entry_translation_of`, `ent_entry_creator_id`, `ent_entry_media_id`, `ent_entry_comment_id`, `ent_entry_rating_id`, `ent_entry_tags`, `ent_entry_author_id`, `ent_entry_source_id`, `ent_entry_use`, `ent_entry_http_link`, `ent_entry_transl_request_id`, `ent_entry_deleted`, `ent_entry_creation_date`) VALUES
(2, 1, 'To be, or not to be, that is the question	', 'To, be,, or, not, to, be,, that, is, the, question', 'To be, or not to be, that is the question	', 1, NULL, 3, 1, 1, 1, 'hamlet	', 1, 1, 'The first line of the speech, in which a despondent or feigning Prince Hamlet contemplates death and suicide. He bemoans the pains and unfairness of life but acknowledges the alternative might be still worse.	', 'https://www.youtube.com/v/Vf2TpWsPvgI', NULL, 0, '2014-10-01'),
(3, 1, 'Happy birthday to you! \r\nHappy birthday to you! \r\nHappy birthday, dear Person! \r\nHappy birthday to you!	', '	Happy birthday to you! Happy birthday to you! Happy birthday, dear Person! Happy birthday to you!	', 'Hepi b30dei tu ju!\r\nHepi b30dei tu ju! \r\nHepi b30dei dir p3san! \r\nHepi b30dei tu ju!	', 1, NULL, 3, 1, 1, 1, 'happy birthday	', 1, 1, 'a song to sing on a birth day	', '		', NULL, 0, '2014-10-01'),
(4, 1, 'Just smile and wave, boys! Smile and wave!', 'Just, smile, and, wave,, boys!, Smile, and, wave!', 'Just smile and wave, boys! Smile and wave!', 1, NULL, 3, 1, 1, 1, 'penguins, madagascar, smile', 1, 1, 'Meaning: Pretend everything is fine ', 'https://www.youtube.com/v/DvYBZRwwGB4	', NULL, 1, '2014-10-01'),
(5, 3, '三人行必有我师	', '	three, person, walk, must, have, my, teacher	', 'san ren xing bi you wo shi	', 1, NULL, 1, 1, 1, 1, '		', 1, 1, '		', '		', NULL, 0, '2014-10-01'),
(6, 3, '	破釜沉舟	', '	break wok sink boat	', '	pò fǔ chén zhōu	', 1, NULL, 3, 1, 1, 1, '		', 1, 1, '	based on a historical account where the general Xiang Yu ordered his troops to destroy all cooking utensils and boats after crossing a river into the enemy''s territory. He won the battle because of this "no-retreat" strategy	', '		', NULL, 0, '2014-10-01'),
(7, 3, '	瓜田李下	', '	melon field plums under	', '	guātián lǐxià	', 1, NULL, 3, 1, 1, 1, '		', 1, 1, '	admonishing the reader to avoid situations where however innocent he might be suspected of doing wrong	', '		', NULL, 0, '2014-10-01'),
(8, 2, 'И скучно, и грустно, и некому руку подать	', '	and, bored, and, sad, and, nobody, hand, give	', 'i skuchno, i grustno, i nekomu ruku podat	', 1, NULL, 3, 1, 1, 1, '		', 1, 1, '', 'http://max.mmlc.northwestern.edu/~mdenner/Demo/texts/bored_sad.html	', NULL, 0, '2014-10-01'),
(9, 2, '	Окно в Европу	', '	window, in, Europe	', '	okno v evropu	', 1, NULL, 3, 1, 1, 1, '		', 1, 1, '	a reference to the city of St.Petersburg	', '	 	', NULL, 0, '2014-10-01'),
(11, 1, '	It`s boring and sad, and there`s no one around.	', '	It`s boring and sad, and there`s no one around.	', '	It`s boring and sad, and there`s no one around.	', 2, '8', 3, 1, 1, 1, '		', 1, 1, '	when you are sad 	', '	 	', NULL, 0, '2014-10-01'),
(12, 2, 'Расцветали яблони и груши, \r\nПоплыли туманы над рекой. \r\nВыходила на берег Катюша, \r\nНа высокий берег на крутой. \r\n\r\nВыходила, песню заводила \r\nПро степного, сизого орла, \r\nПро того, которого любила, \r\nПро того, чьи письма берегла. \r\n\r\nОн ты, песня, песенка девичья, \r\nТы лети за ясным солнцем вслед. \r\nИ бойцу на дальнем пограничье \r\nОт Катюши передай привет. \r\n\r\nПусть он вспомнит девушку простую, \r\nПусть услышит, как она поет, \r\nПусть он землю бережет родную, \r\nА любовь Катюша сбережет. \r\n\r\nРасцветали яблони и груши, \r\nПоплыли туманы над рекой. \r\nВыходила на берег Катюша, \r\nНа высокий берег на крутой. 	', 'Blossoming, Apple, and, pear,, Sailed, the, mists, above, the, river., Vyihodila, na, Bereg, Katyusha,, high, on, a, steep, bank., The, song, was, ringleader, Of, a, steppe, Eagle,, rock,, About, the, loved,, About, whose, letters, had, been, saving., It, you,, song,, song, of, the, maiden,, you, fly, over, the, clear, sunshine, after., And, the, soldier, on, the, far, frontier, Of, Katyusha, say, hello., Let, him, remember, her, simple,, let, them, hear,, as, she, sings,, let, him, watch, over, his, native, land,, and, love, the, Katyusha, will, save., Blossoming, Apple, and, pear,, Sailed, the, mists, above, the, river., Vyihodila, na, Bereg, Katyusha,, high, on, a, steep, bank., ', 'Rastsvetali yabloni i grushi, \r\nPoplyli tumany nad rekoy. \r\nVykhodila na bereg Katyusha, \r\nNa vysokiy bereg na krutoy. \r\n\r\nVykhodila, pesnyu zavodila \r\nPro stepnogo, sizogo orla, \r\nPro togo, kotorogo lyubila, \r\nPro togo, ch''i pis''ma beregla. \r\n\r\nOn ty, pesnya, pesenka devich''ya, \r\nTy leti za yasnym solntsem vsled. \r\nI boytsu na dal''nem pogranich''ye \r\nOt Katyushi pereday privet. \r\n\r\nPust'' on vspomnit devushku prostuyu, \r\nPust'' uslyshit, kak ona poyet, \r\nPust'' on zemlyu berezhet rodnuyu, \r\nA lyubov'' Katyusha sberezhet. \r\n\r\nRastsvetali yabloni i grushi, \r\nPoplyli tumany nad rekoy. \r\nVykhodila na bereg Katyusha, \r\nNa vysokiy bereg na krutoy.', 1, NULL, 3, 1, 1, 1, 'A Soviet war song', 1, 1, 'a Russian war song 	', 'https://www.youtube.com/v/gOyPwNKQS4c', NULL, 1, '2014-10-01'),
(13, 1, 'Happy Birthday to You! \r\nYou live in a zoo! \r\nYou look like a monkey \r\nAnd you smell like one too!		', '	Happy Birthday to You! You live in a zoo! You look like a monkey And you smell like one too!	', 'Hepi b30dei tu ju, \r\nju liv in a zu, \r\nju luk laik a manki \r\nend ju smel laik wan tu	', 2, '3', 3, 1, 1, 1, '		', 1, 1, 'funny remake of the happy birthday song	', '	 	', NULL, 0, '2014-10-01'),
(14, 1, 'Happy Birthday to You! \r\nSquashed tomatoes and stew, \r\nbread and butter in the gutter! \r\nHappy Birthday to You.	', '	Happy Birthday to You! Squashed tomatoes and stew, bread and butter in the gutter! Happy Birthday to You.	', 'Happy Birthday to You! \r\nSquashed tomatoes and stew, \r\nbread and butter in the gutter! \r\nHappy Birthday to You.	', 2, '3', 3, 1, 1, 1, '		', 1, 1, 'funny remake of the happy birthday song	', '	 	', NULL, 0, '2014-10-01'),
(24, 1, ' The apple- and the pear-tree bloom, fog lay above the river, there went Katyuscha out onto the shore, onto the tall, steep shore. ', ' The apple- and the pear-tree bloom, fog lay above the river, there went Katyuscha out onto the shore, onto the tall, steep shore. ', ' The apple- and the pear-tree bloom, fog lay above the river, there went Katyuscha out onto the shore, onto the tall, steep shore. ', 2, '12', 3, 1, 1, 1, ' ', 1, 1, ' A Soviet wartime song ', ' ', NULL, 0, '2014-10-01'),
(26, 1, 'As the buds of pears and apples blossomed \r\nO''er the river swiftly whirled the fogs \r\nCame out strolling a woman named Katyusha \r\nDown the steep and rocky river''s slope    ', ' As the buds of pears and apples blossomedO`er the river swiftly whirled the fogsCame out strolling a woman named KatyushaDown the steep and rocky river`s slope  ', 'As the buds of pears and apples blossomed \r\nO''er the river swiftly whirled the fogs \r\nCame out strolling a woman named Katyusha \r\nDown the steep and rocky river''s slope  ', 2, '12', 3, 1, 1, 1, '   ', 1, 1, 'Russian war song', 'https://www.youtube.com/v/WNIlyUmSlDs', NULL, 0, '2014-10-01'),
(27, 1, 'For God so loved the world that he gave his one and only Son, that whoever believes in him shall not perish but have eternal life.    ', 'For God so loved the world that he gave his one and only Son, that whoever believes in him shall not perish but have eternal life.  ', 'For God so loved the world that he gave his one and only Son, that whoever believes in him shall not perish but have eternal life.  ', 2, NULL, 3, 1, 1, 1, '   ', 1, 1, ' John 3:16 (Bible, New International Version)  ', ' https://www.youtube.com/v/T68dqew2VBw ', NULL, 0, '2014-10-01'),
(28, 1, 'For God so loved the world, that he gave his only begotten Son, that whosoever believeth in him should not perish, but have everlasting life. ', 'For God so loved the world, that he gave his only begotten Son, that whosoever believeth in him should not perish, but have everlasting life. ', 'For God so loved the world, that he gave his only begotten Son, that whosoever believeth in him should not perish, but have everlasting life. ', 2, NULL, 3, 1, 1, 1, '   ', 1, 1, ' John 3:16 (Bible, King James Version) ', ' https://www.youtube.com/v/AGVZnp0uPqk ', NULL, 0, '2014-10-01'),
(29, 3, '祝你生日快乐	', 'Happy, birthday, to, you', 'zhu, ni, sheng, ri, quai, le	', 2, '3', 1, 1, 1, 1, '		', 1, 1, '		', 'https://www.youtube.com/v/Lr0kt9vVb9E	', NULL, 0, '2014-10-01'),
(32, 3, '蘋果樹和梨樹花朵綻放， \r\n茫茫霧靄在河面飄揚。 \r\n出門走到河岸邊，喀秋莎， \r\n到那又高又陡的河岸。  ', ' Apple and pear flowers bloom, Sea mist on the River Breeze. Walked out into the River, Katyusha, To the high and steep river banks.  ', 'Píngguǒ shù hé lí shù huāduǒ zhànfàng, mángmáng wùǎi zài hémiàn piāoyáng. Chūmén zǒu dào héàn biān, kā qiū shā, dào nà yòu gāo yòu dǒu de héàn.  ', 2, '12', 3, 1, 1, 1, '   ', 1, 1, '   ', ' https://www.youtube.com/watch?v=Lr0kt9vVb9E ', NULL, 1, '2014-10-01'),
(33, 3, '喀秋莎-关贵敏 \r\n正当梨花开遍了天涯 \r\n河上飘着柔漫的轻纱 \r\n喀秋莎站在竣峭的岸上 \r\n歌声好像明媚的春光 \r\n喀秋莎站在竣峭的岸上 \r\n歌声好像明媚的春光 \r\n姑娘唱着美妙的歌曲 \r\n她在歌唱草原的雄鹰 \r\n她在歌唱心爱的人儿 \r\n她还藏着爱人的书信 \r\n她在歌唱心爱的人儿 \r\n她还藏着爱人的书信 \r\n啊这歌声姑娘的歌声 \r\n跟着光明的太阳飞去吧 \r\n去向远方边疆的战士 \r\n把喀秋莎的问候传达 \r\n啊 \r\n驻守边疆年轻的战士 \r\n心中怀念遥远的姑娘 \r\n勇敢战斗保卫祖国 \r\n喀秋莎爱情永远属于他 \r\n嗯 \r\n正当梨花开遍了天涯 \r\n河上飘着柔曼的轻纱 \r\n喀秋莎站在峻峭的岸上 \r\n歌声好像明媚的春光 \r\n喀秋莎站在峻峭的岸上 \r\n歌声好像明媚的春光 \r\n喀秋莎站在峻峭的岸上 \r\n歌声好像明媚的春光 \r\n', 'Katyusha-Guan, Guimin, due, PEAR, debuted, has, end, River, Shang, floating, with, soft, diffuse, of, veil, Katyusha, station, in, ended, steep, of, shore, song, seems, bright, of, spring, Katyusha, station, in, ended, steep, of, shore, song, seems, bright, of, spring, girl, sing, with, wonderful, of, songs, she, in, singing, Prairie, of, Eagle, she, in, singing, beloved, of, people, son, she, also, hid, with, lover, of, letters, she, in, singing, beloved, of, people, son, she, also, hid, with, lover, of, letters, Ah, this, song, girl, of, song, followed, light, of, Sun, fly, to''''s, went, distance, frontier, of, warrior, put, Katyusha, of, greeting, conveys, Ah, stationed, frontier, young, of, warrior, Hearts, remembered, distant, girl, bravely, defending, the, motherland, Katyusha, love, will, always, belong, to, him, well, as, PEAR, bloom, on, tianya, rouman, veil, floating, over, the, river, song, Katyusha, stood, on, the, steep, shore, seemed, a, bright, spring, song, Katyusha, stood, on, the, steep, shore, seemed, a, bright, spring, song, Katyusha, stood, on, the, steep, shore, seemed, a, bright, spring', 'Kā qiū shā-guānguìmǐn \r\nzhèngdàng líhuā kāi biànle tiānyá \r\nhéshàng piāozhe róu màn de qīng shā \r\nkā qiū shā zhàn zài jùnqiào de ànshàng \r\ngēshēng hǎoxiàng míngmèi de chūnguāng \r\nkā qiū shā zhàn zài jùnqiào de ànshàng \r\ngēshēng hǎoxiàng míngmèi de chūnguāng \r\ngūniáng chàngzhe měimiào de gēqǔ \r\ntā zài gēchàng cǎoyuán de xióng yīng \r\ntā zài gēchàng xīn''ài de rén er \r\ntā hái cángzhe àirén de shūxìn \r\ntā zài gēchàng xīn''ài de rén er \r\ntā hái cángzhe àirén de shūxìn \r\na zhè gēshēng gūniáng de gēshēng \r\ngēnzhe guāngmíng de tàiyáng fēi qù ba \r\nqùxiàng yuǎnfāng biānjiāng de zhànshì \r\nbǎ kā qiū shā de wènhòu chuándá \r\na \r\nzhùshǒu biānjiāng niánqīng de zhànshì \r\nxīnzhōng huáiniàn yáoyuǎn de gūniáng \r\nyǒnggǎn zhàndòu bǎowèi zǔguó \r\nkā qiū shā àiqíng yǒngyuǎn shǔyú tā \r\nń \r\nzhèngdàng líhuā kāi biànle tiānyá \r\nhéshàng piāozhe róu màn de qīng shā \r\nkā qiū shā zhàn zài jùnqiào de ànshàng \r\ngēshēng hǎoxiàng míngmèi de chūnguāng \r\nkā qiū shā zhàn zài jùn qiào de ànshàng \r\ngēshēng hǎoxiàng míngmèi de chūnguāng \r\nkā qiū shā zhàn zài jùn qiào de ànshàng \r\ngēshēng hǎoxiàng míngmèi de chūnguāng', 2, '12', 3, 1, 1, 1, '   ', 1, 1, '   ', 'https://www.youtube.com/v/n0kgtHRGkjk', NULL, 0, '2014-10-01'),
(34, 3, ' 我们祝你生日快乐  ', ' We wish you a happy birthday  ', ' Wǒmen zhù nǐ shēngrì kuàilè ', 2, '3', 3, 1, 1, 1, '   ', 1, 1, ' 一首生日歌 ', '   ', NULL, 0, '2014-10-01'),
(36, 3, '神愛世人，甚至將他的獨生子賜給他們，叫一切信他的不致滅亡，反得永生。  ', 'God so loved the world, that he gave his only begotten son that they, whoever believes in him should not perish but have eternal life.  ', ' shén ài shì rén， shén zhì jiāng tā de dú shēng zi cì gěi tā men， jiào yī qiè xìn tā de bù zhì miè wáng， fǎn dé yǒng shēng ', 2, NULL, 3, 1, 1, 1, '   ', 1, 1, ' John 3:16 (Bible, 現代標點和合本 (CUVMP))  ', ' https://www.youtube.com/v/nVpgz9mvajc ', NULL, 0, '2014-10-01'),
(37, 3, ' 神愛世人 ，甚至將他的獨生子賜給他們 ，叫一切信他的 ，不至滅亡 ，反得永生  ', ' God so loved the world, that he gave his only begotten son that they, and believeth in him should not perish, but have everlasting life ', ' shén ài shì rén ， shén zhì jiāng tā de dú shēng zi cì gěi tā men ， jiào yī qiè xìn tā de ， bù zhì miè wáng ， fǎn dé yǒng shēng  ', 2, NULL, 3, 1, 1, 1, '   ', 1, 1, ' John 3:16 (Bible, 聖經) ', ' https://www.youtube.com/v/CthhSAoUXTg ', NULL, 0, '2014-10-01'),
(38, 2, 'С днём рождения тебя! \r\nС днём рождения тебя! \r\nС днём рождения Кто-то! \r\nС днём рождения тебя! ', 'with day birth you, with day birth you, with day birth someone, with day birth you  ', 's dnjom rozhdenja tebja, \r\ns dnjom rozhdenja tebja, \r\ns dnjom rozhdenija kto-to, \r\ns dnjom rozhdenja tebja  ', 2, '3', 3, 1, 1, 1, '   ', 1, 1, ' деньрожденная песня!  ', ' https://www.youtube.com/v/CjD0KdRYyDo ', NULL, 0, '2014-10-01'),
(39, 2, ' Пусть бегут неуклюже пешеходы по лужам, а вода по асфальту рекой. И не ясно прохожим в этот день непогожий, почему я весёлый такой  ', ' May run clumsily pedestrians on puddles and water on asphalt river and not clear passers-by in this day dreary why I marry so ', ' pust begut neukljuzhe pe$ehody po luzham a voda po asfaltu rekoj i ne jasno prohozhim v etot den nepogozhy pochemu ja vesjolyj takoj  ', 2, '3', 3, 1, 1, 1, '   ', 1, 1, ' песня на день рождения  ', ' https://www.youtube.com/watch?v=ILRe9dHyby8 ', NULL, 0, '2014-10-01'),
(40, 2, '	Бей котлы, топи челны	', '	break cauldrons sink boats	', '	bej kotly topi chelny	', 2, '6', 3, 1, 1, 1, '		', 1, 1, '		', '		', NULL, 0, '2014-10-01'),
(41, 2, 'Ибо так возлюбил Бог мир, что отдал Сына Своего Единородного, дабы всякий верующий в Него, не погиб, но имел жизнь вечную ', ' For God so loved the world that he gave his only begotten son, that whosoever believeth in him should not perish, but have everlasting life ', 'Ibo tak vozlyubil Bog mir, chto otdal Syna Svoyego Yedinorodnogo, daby vsyakiy veruyushchiy v Nego, ne pogib, no imel zhizn vechnuyu  ', 2, NULL, 3, 1, 1, 1, '   ', 1, 1, ' John 3:16 (Bible, Russian Synodal Translation)  ', ' https://www.youtube.com/v/70I1qEOOu40 ', NULL, 0, '2014-10-01'),
(42, 2, 'Ибо Бог так возлюбил этот мир, что пожертвовал Своим единственным Сыном ради того, чтобы каждый, кто уверует в Него, не погиб, а обрёл вечную жизнь.  ', ' For God so loved the world, that donated His only son so that whoever believes in him shall not perish, and gained eternal life.  ', 'Ibo Bog tak vozlyubil etot mir, chto pozhertvoval Svoim yedinstvennym Synom radi togo, chtoby kazhdyy, kto uveruyet v Nego, ne pogib, a obrol vechnuyu zhizn. ', 2, NULL, 3, 1, 1, 1, '   ', 1, 1, ' John 3:16 (Bible, A Modern Translation) ', '   ', NULL, 0, '2014-10-01'),
(52, 1, 'If I''m not back in five minutes, just wait longer!', 'If I''m not back in five minutes, just wait longer!', 'If I''m not back in five minutes, just wait longer!', 1, '', 3, 1, 2, 1, 'ace ventura', 3, 1, 'Said when leaving', 'https://www.youtube.com/v/bQAcBSO5jC8', NULL, 0, '2014-10-23'),
(53, 1, 'There''s someone on the wing, some thing.', 'There''s someone on the wing, some thing.', 'There''s someone on the wing, some thing.', 1, '', 3, 1, 2, 1, 'ace ventura', 3, 1, 'when scared', '', NULL, 0, '2014-10-23'),
(58, 2, 'Калинка, калинка, калинка моя!\r\nВ саду ягода малинка, малинка моя!\r\nАх! Под сосною под зеленою\r\nСпать положите вы меня;\r\nАй, люли, люли, ай, люли, люли,\r\nСпать положите вы меня.\r\n\r\nКалинка, калинка, калинка моя!\r\nВ саду ягода малинка, малинка моя!\r\nАх! Сосенушка ты зеленая,\r\nНе шуми же надо мной!\r\nАй, люли, люли, ай, люли, люли,\r\nНе шуми же надо мной!\r\n\r\nКалинка, калинка, калинка моя!\r\nВ саду ягода малинка, малинка моя!\r\nАх! Красавица, душа-девица,\r\nПолюби же ты меня!\r\nАй, люли, люли, ай, люли, люли,\r\nПолюби же ты меня!\r\n\r\nКалинка, калинка, калинка моя!\r\nВ саду ягода малинка, малинка моя!\r\n', 'Kalinka, Kalinka, Kalinka, my! \r\nIn the garden, berry raspberry, raspberry, my! \r\nAh! Under the pines under a green \r\nPut me to sleep you; \r\nAw, Luli, Luli, ah, Luli, Luli, \r\nPut you to sleep for me. \r\n\r\nKalinka, Kalinka, Kalinka, my! \r\nIn the garden, berry raspberry, raspberry, my! \r\nAh! Sosenushka you''re green, \r\nDo not make a noise as me! \r\nAw, Luli, Luli, ah, Luli, Luli, \r\nDo not make a noise as me! \r\n\r\nKalinka, Kalinka, Kalinka, my! \r\nIn the garden, berry raspberry, raspberry, my! \r\nAh! Beautiful, soul-maid \r\nFalling in love thou me! \r\nAw, Luli, Luli, ah, Luli, Luli, \r\nFalling in love thou me! \r\n\r\nKalinka, Kalinka, Kalinka, my! \r\nIn the garden, berry raspberry, raspberry, my!\r\n', 'Kalinka, Kalinka, Kalinka, my! \r\nIn the garden, berry raspberry, raspberry, my! \r\nAh! Under the pines under a green \r\nPut me to sleep you; \r\nAw, Luli, Luli, ah, Luli, Luli, \r\nPut you to sleep for me. \r\n\r\nKalinka, Kalinka, Kalinka, my! \r\nIn the garden, berry raspberry, raspberry, my! \r\nAh! Sosenushka you''re green, \r\nDo not make a noise as me! \r\nAw, Luli, Luli, ah, Luli, Luli, \r\nDo not make a noise as me! \r\n\r\nKalinka, Kalinka, Kalinka, my! \r\nIn the garden, berry raspberry, raspberry, my! \r\nAh! Beautiful, soul-maid \r\nFalling in love thou me! \r\nAw, Luli, Luli, ah, Luli, Luli, \r\nFalling in love thou me! \r\n\r\nKalinka, Kalinka, Kalinka, my! \r\nIn the garden, berry raspberry, raspberry, my!\r\n', 1, '', 3, 1, 2, 1, '', 1, 1, 'written in 1860 by the composer and folklorist Ivan Larionov', 'https://www.youtube.com/v/lrdGQPtlteM', NULL, 0, '2014-10-30'),
(64, 2, 'Солдатушки, бравы ребятушки,\r\nА кто ваши о`тцы?\r\nНаши отцы — славны полководцы,\r\nВот кто наши отцы.\r\n\r\nСолдатушки, бравы ребятушки,\r\nА кто ваши деды?\r\nНаши деды — славные победы,\r\nВот кто наши деды.\r\n\r\nСолдатушки, бравы ребятушки,\r\nА кто ваши жёны?\r\nНаши жёны — ружья заряжёны,\r\nВот кто наши жёны.\r\n\r\nСолдатушки, бравы ребятушки,\r\nА кто ваши сёстры?\r\nНаши сестры — пики, сабли востры,\r\nВот кто наши сёстры.\r\n', 'Soldiers, Bravo lads, \r\nAnd who is your fathers? \r\nOur fathers - nice generals, \r\nThat''s who our fathers. \r\n\r\nSoldiers, Bravo lads, \r\nWho are your grandparents? \r\nOur grandfathers - the glorious victory, \r\nThat''s who our grandfathers. \r\n\r\nSoldiers, Bravo lads, \r\nAnd who is your wife? \r\nOur wives - guns of charged, \r\nThat''s who our wives. \r\n\r\nSoldiers, Bravo lads, \r\nAnd who are your sisters? \r\nOur sisters - spades, swords eyes open, \r\nThat''s who our sisters.	\r\n', 'Soldatushki, bravy rebyatushki,\r\nA kto vashi o`ttsy?\r\nNashi ottsy — slavny polkovodtsy,\r\nVot kto nashi ottsy.\r\n\r\nSoldatushki, bravy rebyatushki,\r\nA kto vashi dedy?\r\nNashi dedy — slavnyye pobedy,\r\nVot kto nashi dedy.\r\n\r\nSoldatushki, bravy rebyatushki,\r\nA kto vashi zhony?\r\nNashi zhony — ruzh''ya zaryazhony,\r\nVot kto nashi zhony.\r\n\r\nSoldatushki, bravy rebyatushki,\r\nA kto vashi sostry?\r\nNashi sestry — piki, sabli vostry,\r\nVot kto nashi sostry.', 1, '', 3, 1, 2, 1, 'A Russian military marching song, it was most popular in 19th century', 1, 1, '', 'https://www.youtube.com/v/4A_33XxyZt4', NULL, 0, '2014-10-30'),
(71, 2, 'На поле танки грохотали,\r\nСолдаты шли в последний бой,\r\nА молодого командира\r\nНесли с пробитой головой.\r\n\r\nПо танку вдарила болванка,\r\nПрощай, родимый экипаж,\r\nЧетыре трупа возле танка\r\nДополнят утренний пейзаж.\r\n\r\nМашина пламенем объята,\r\nВот-вот рванет боекомплект.\r\nА жить так хочется ребята.\r\nИ вылезать уж мочи нет.\r\n\r\nНас извлекут из-под обломков,\r\nПоднимут на руки каркас,\r\nИ залпы башенных орудий\r\nВ последний путь проводят нас.\r\n\r\nИ полетят тут телеграммы\r\nРодных и близких известить,\r\nЧто сын ваш больше не вернется.\r\nИ не приедет погостить.\r\n\r\nВ углу заплачет мать-старушка,\r\nСмахнёт слезу старик-отец.\r\nИ молодая не узнает,\r\nКакой танкиста был конец.\r\n\r\nИ будет карточка пылиться\r\nНа полке пожелтевших книг.\r\nВ военной форме, при погонах,\r\nИ ей он больше не жених.\r\n', 'The, tanks, rumbled,, the, soldiers, went, in, the, last, battle,, a, young, komandiraNesli, with, the, punched, head, on, tank, vdarila, pig,, farewell,, rightly, into, the, crew,, four, bodies, near, the, tankaDopoln&acirc;t, morning, landscape., Machine, flame''''s, smoking, too,, is, about, to, fire, a, live, blows, so, much, guys, and, come, out, much, urine, not., We, will, draw, from, the, wreckage,, will, lift, up, the, frame,, and, volleys, of, Tower, orudijV, last, way, hold, us, and, go, here, telegrammyRodnyh, and, close, notifyThat, your, son, no, longer, will, return, and, will, not, come, to, stay, in, the, corner, cries, mother,, old, woman,, Smahn&euml;t, tear, the, old, father, and, young, did, not, know, What, was, the, end, of, a, tank, driver, and, card, pylit&prime;s&acirc;Na, shelf, yellowed, books.,, in, uniform,, with, epaulets,, and, he, no, longer, groom.', 'Na pole tanki grokhotali,\r\nSoldaty shli v posledniy boy,\r\nA molodogo komandira\r\nNesli s probitoy golovoy.\r\n\r\nPo tanku vdarila bolvanka,\r\nProshchay, rodimyy ekipazh,\r\nChetyre trupa vozle tanka\r\nDopolnyat utrenniy peyzazh.\r\n\r\nMashina plamenem ob"yata,\r\nVot-vot rvanet boyekomplekt.\r\nA zhit'' tak khochetsya rebyata.\r\nI vylezat'' uzh mochi net.\r\n\r\nNas izvlekut iz-pod oblomkov,\r\nPodnimut na ruki karkas,\r\nI zalpy bashennykh orudiy\r\nV posledniy put'' provodyat nas.\r\n\r\nI poletyat tut telegrammy\r\nRodnykh i blizkikh izvestit'',\r\nChto syn vash bol''she ne vernetsya.\r\nI ne priyedet pogostit''.\r\n\r\nV uglu zaplachet mat''-starushka,\r\nSmakhnot slezu starik-otets.\r\nI molodaya ne uznayet,\r\nKakoy tankista byl konets.\r\n\r\nI budet kartochka pylit''sya\r\nNa polke pozheltevshikh knig.\r\nV voyennoy forme, pri pogonakh,\r\nI yey on bol''she ne zhenikh.', 1, '', 3, 1, 2, 1, '', 1, 1, '', 'https://www.youtube.com/v/lYqV8srdOPU', NULL, 0, '2014-10-30'),
(74, 2, 'Зарубите себе на носу, что вы должны молчать и слушать! Молчать и слушать что вам говорят! Учиться и стараться стать хоть сколько-нибудь приемлемым членом социального общества!', 'Slaughter, yourself, on, your, nose, that, you, should, keep, quiet, and, listen!, Keep, quiet, and, listen, to, what, you, say!, Learn, and, try, to, become, at, least, somewhat, acceptable, member, of, the, social, community!', 'Zarubite sebe na nosu, chto vy dolzhny molchat'' i slushat''! Molchat'' i slushat'' chto vam govoryat! Uchit''sya i starat''sya stat'' khot'' skol''ko-nibud'' priyemlemym chlenom sotsial''nogo obshchestva!', 1, '', 3, 1, 2, 1, '', 1, 1, 'To bring down a foolish person who talks too much.', 'https://www.youtube.com/v/m-Z3GyAshaE', NULL, 1, '2014-10-30'),
(75, 1, 'My Mom always said life was like a box of chocolates. You never know what you''re gonna get.', 'Mama, always, said, life, was, like, a, box, of, chocolates., You, never, know, what, youre, going, to, get.', 'Mama always said life was like a box of chocolates. You never know what you''re gonna get.', 1, '', 3, 1, 2, 1, 'Forrest Gump from Forrest Gump (1994)', 1, 1, 'A funny way to say that life is full of surprises ', 'https://www.youtube.com/v/uWzrIX5l0vc#t=0m20s', NULL, 0, '2014-10-30'),
(76, 1, 'What we''ve got here is failure to communicate', 'What, we, have, got, here, is, failure, to, communicate', 'What we''ve got here is failure to communicate', 1, '', 3, 1, 2, 1, '', 1, 1, 'to say that we don''t understand each other', 'https://www.youtube.com/v/Oik6dXm-0l0', NULL, 0, '2014-10-30'),
(77, 1, 'Toto, I''ve a feeling we''re not in Kansas anymore.', 'Toto,, I''''ve, a, feeling, we, are, not, in, Kansas, anymore.', 'Toto, I''ve a feeling we''re not in Kansas anymore.', 1, '', 3, 1, 2, 1, '', 1, 1, 'This is a strange place, I have never been here before! How did we get here?', 'https://www.youtube.com/v/nIaN9Koa9oM', NULL, 0, '2014-10-30'),
(79, 1, 'Somewhere over the rainbow way up high\r\nThere''s a land that I heard of once in a lullaby\r\nSomewhere over the rainbow skies are blue\r\nAnd the dreams that you dare to dream really do come true\r\n\r\nSomeday I''ll wish upon a star\r\nAnd wake up where the clouds are far\r\nBehind me\r\nWhere troubles melt like lemon drops\r\nAway above the chimney tops\r\nThat''s where you''ll find me\r\n\r\nSomewhere over the rainbow bluebirds fly\r\nBirds fly over the rainbow. Why then, oh, why can''t I?\r\n\r\nIf happy little bluebirds fly\r\nBeyond the rainbow why, oh, why can''t I?', 'Somewhere, over, the, rainbow, way, up, highThere''''s, a, land, that, I, heard, of, once, in, a, lullabySomewhere, over, the, rainbow, skies, are, blueAnd, the, dreams, that, you, dare, to, dream, really, do, come, trueSomeday, I''''ll, wish, upon, a, starAnd, wake, up, where, the, clouds, are, farBehind, meWhere, troubles, melt, like, lemon, dropsAway, above, the, chimney, topsThat''''s, where, youll, find, meSomewhere, over, the, rainbow, bluebirds, flyBirds, fly, over, the, rainbow., Why, then,, oh,, why, can''''t, I?If, happy, little, bluebirds, flyBeyond, the, rainbow, why,, oh,, why, can''''t, I?', 'Somewhere over the rainbow way up high\r\nThere''s a land that I heard of once in a lullaby\r\nSomewhere over the rainbow skies are blue\r\nAnd the dreams that you dare to dream really do come true\r\n\r\nSomeday I''ll wish upon a star\r\nAnd wake up where the clouds are far\r\nBehind me\r\nWhere troubles melt like lemon drops\r\nAway above the chimney tops\r\nThat''s where you''ll find me\r\n\r\nSomewhere over the rainbow bluebirds fly\r\nBirds fly over the rainbow. Why then, oh, why can''t I?\r\n\r\nIf happy little bluebirds fly\r\nBeyond the rainbow why, oh, why can''t I?', 1, '', 3, 1, 2, 1, '', 1, 1, 'A beautiful song from 1939', 'https://www.youtube.com/v/PSZxmZmBfnU', NULL, 0, '2014-10-30'),
(81, 1, 'Why is the rum always gone?', 'Why, is, the, rum, always, gone?', 'Why is the rum always gone?', 1, '', 3, 1, 2, 1, '', 1, 1, 'Why do good things never last????', 'https://www.youtube.com/v/_xR0h6FGCBY', NULL, 0, '2014-10-31'),
(82, 2, 'Надо, чтобы за дверью каждого довольного, счастливого человека стоял кто-нибудь с молоточком и постоянно напоминал бы стуком, что есть несчастные, что как бы он ни был счастлив, жизнь рано или поздно покажет ему свои когти, стрясется беда &mdash; болезнь, бедность, потери, и его никто не увидит и не услышит, как теперь он не видит и не слышит других. ', 'We, need, to, be, at, the, door, of, each, content,, happy, person, was, somebody, with, a, hammer, and, constantly, reminded, the, thud, that, there, are, unhappy, that, no, matter, how, he, was, happy, life, sooner, or, later, will, show, him, with, his, claws,, trouble, comes, up,, disease,, poverty,, loss,, and, no, one, can, see, or, hear,, as, he, now, does, not, see, and, not, hear, others., ', 'Nado, chtoby za dver''yu kazhdogo dovol''nogo, schastlivogo cheloveka stoyal kto-nibud'' s molotochkom i postoyanno napominal by stukom, chto yest'' neschastnyye, chto kak by on ni byl schastliv, zhizn'' rano ili pozdno pokazhet yemu svoi kogti, stryasetsya beda &mdash; bolezn'', bednost'', poteri, i yego nikto ne uvidit i ne uslyshit, kak teper'' on ne vidit i ne slyshit drugikh.', 1, '', 3, 1, 2, 1, '', 1, 1, 'To sober up someone who is too complacent', '', NULL, 0, '2014-11-02'),
(83, 2, 'Улыбаемся и машем, парни! Улыбаемся и машем!', 'Smile, and, wave,, boys!, Smile, and, wave!', 'Ulybayemsya i mashem, parni! Ulybayemsya i mashem!', 2, '4', 3, 1, 2, 1, '', 1, 1, '', 'https://www.youtube.com/v/H8s-oH36k18', NULL, 0, '2014-11-02'),
(84, 1, 'Every happy man should have some one with a little hammer at his door to knock and remind him that there are unhappy people, and that, however happy he may be, life will sooner or later show its claws, and some misfortune will befall him&mdash;illness, poverty, loss, and then no one will see or hear him, just as he now neither sees nor hears others.', 'Every, happy, man, should, have, some, one, with, a, little, hammer, at, his, door, to, knock, and, remind, him, that, there, are, unhappy, people,, and, that,, however, happy, he, may, be,, life, will, sooner, or, later, show, its, claws,, and, some, misfortune, will, befall, him&mdash;illness,, poverty,, loss,, and, then, no, one, will, see, or, hear, him,, just, as, he, now, neither, sees, nor, hears, others.', 'Every happy man should have some one with a little hammer at his door to knock and remind him that there are unhappy people, and that, however happy he may be, life will sooner or later show its claws, and some misfortune will befall him&mdash;illness, poverty, loss, and then no one will see or hear him, just as he now neither sees nor hears others.', 2, '82', 3, 1, 2, 1, '', 1, 1, '', '', NULL, 0, '2014-11-02'),
(85, 1, 'Blossoms graced the apple trees and pear trees. \r\nMist upon the river floated by. \r\nDown Katusha came to gather berries \r\nOn the cliff top rising steepe and high. \r\n\r\nThere she walked and there she started singing \r\nOf the dove-grey eagle of the stepp \r\nOf the one that she had her heart winging \r\nOf the one whoose letters she had kept. \r\n\r\nSong of love her maiden love declaring, \r\nChase the sun and speed without delay. \r\nWarmest greeting from Katusha bearing \r\nTo the border guardman far away. \r\n\r\nMay the boy his village girl remember, \r\nMay he hear her love of tenderness, \r\nMay he guard his native land forever, \r\nAnd Katusha guard her love no less. \r\n\r\nBlossoms filled the apple trees and pear trees, \r\nMist upon the river floated by, \r\nDown Katusha came to gather berries \r\nOn the cliff top rising steepe ang high.', 'Blossoms, graced, the, apple, trees, and, pear, trees., Mist, upon, the, river, floated, by., Down, Katusha, came, to, gather, berries, On, the, cliff, top, rising, steppe, and, high., There, she, walked, and, there, she, started, singing, Of, the, dove-grey, eagle, of, the, step, Of, the, one, that, she, had, her, heart, winging, Of, the, one, whose, letters, she, had, kept., Song, of, love, her, maiden, love, declaring,, Chase, the, sun, and, speed, without, delay., Warmest, greeting, from, Katusha, bearing, To, the, border, guardman, far, away., May, the, boy, his, village, girl, remember,, May, he, hear, her, love, of, tenderness,, May, he, guard, his, native, land, forever,, And, Katusha, guard, her, love, no, less., Blossoms, filled, the, apple, trees, and, pear, trees,, Mist, upon, the, river, floated, by,, Down, Katusha, came, to, gather, berries, On, the, cliff, top, rising, steppe, ang, high.', 'Blossoms graced the apple trees and pear trees. \r\nMist upon the river floated by. \r\nDown Katusha came to gather berries \r\nOn the cliff top rising steepe and high. \r\n\r\nThere she walked and there she started singing \r\nOf the dove-grey eagle of the stepp \r\nOf the one that she had her heart winging \r\nOf the one whoose letters she had kept. \r\n\r\nSong of love her maiden love declaring, \r\nChase the sun and speed without delay. \r\nWarmest greeting from Katusha bearing \r\nTo the border guardman far away. \r\n\r\nMay the boy his village girl remember, \r\nMay he hear her love of tenderness, \r\nMay he guard his native land forever, \r\nAnd Katusha guard her love no less. \r\n\r\nBlossoms filled the apple trees and pear trees, \r\nMist upon the river floated by, \r\nDown Katusha came to gather berries \r\nOn the cliff top rising steepe ang high.', 2, '12', 3, 1, 2, 1, '', 1, 1, '', '', NULL, 0, '2014-11-02'),
(86, 1, 'I''m going to make him an offer he can''t refuse.', 'I''''m, going, to, make, him, an, offer, he, can''''t, refuse.', 'I''m going to make him an offer he can''t refuse.\r\n', 1, '', 3, 1, 2, 1, '', 1, 1, 'A joking threat', 'https://www.youtube.com/v/SeldwfOwuL8', NULL, 0, '2014-11-04'),
(87, 2, 'предложение, от которого невозможно отказаться', 'an, offer, you, can''''t, refuse', 'predlozhenie ot kotorogo nevozmozhno otkazat''sa', 2, '86', 3, 1, 2, 1, '', 1, 1, 'шутливая угроза', 'https://www.youtube.com/v/8qEqfa9W4LA', NULL, 0, '2014-11-04'),
(88, 1, 'The world''s still the same, there''s just less in it', 'The, worlds, still, the, same,, others, just, less, in, it', 'The world''s still the same, there''s just less in it', 1, '', 3, 1, 2, 1, '', 1, 1, 'as Man develops, the world becomes emptier', 'https://www.youtube.com/v/cqanNlzgwz4', NULL, 0, '2014-11-04'),
(89, 2, 'мир остался прежним, стало меньше содержимого', 'the, world, is, the, same,, the, less, content', 'mir ostalsya prezhnim, stalo men''she soderzhimogo', 2, '88', 3, 1, 2, 1, '', 1, 1, 'Человечество развивается, мир становится пустее', 'https://www.youtube.com/v/RXybz5BBt4Y', NULL, 0, '2014-11-04'),
(90, 1, 'I need you clothes, your boots and your motorcycle', 'I, need, you, clothes,, your, boots, and, your, motorcycle', 'I need you clothes, your boots and your motorcycle', 1, '', 3, 1, 2, 1, '', 1, 1, 'when you want to scare someone', 'https://www.youtube.com/v/e3t3zC7M4cw', NULL, 0, '2014-11-04'),
(91, 2, 'Мне нужна твоя одежда, сапоги и мотоцикл', 'I, need, your, clothes,, boots, and, motorcycle', 'mne nuzhna tvoya odezhda', 2, '90', 3, 1, 2, 1, '', 1, 1, 'Напугай кого-нибудь', 'https://www.youtube.com/v/U-qJngssRuI', NULL, 0, '2014-11-04');


CREATE TABLE `prj666`.`tbl_user` (
  `usr_user_id` int(11) NOT NULL AUTO_INCREMENT,
  `usr_first_name` varchar(255) NOT NULL,
  `usr_last_name` varchar(255) NOT NULL,
  `usr_login` varchar(255) NOT NULL,
  `usr_password` varchar(255) NOT NULL,
  `usr_rating_id` int(11) DEFAULT NULL,
  `usr_media_id` int(11) DEFAULT NULL,
  `usr_email` varchar(255) NOT NULL,
  `usr_DOB` date DEFAULT NULL,
  `usr_location_id` int(11) DEFAULT NULL,
  `usr_registration_date` date DEFAULT NULL,
  `usr_user_type_id` int(11) DEFAULT NULL,
  `usr_language` varchar(255) DEFAULT NULL,
  `usr_email_subscribed` varchar(1) DEFAULT NULL,
  PRIMARY KEY (`usr_user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=44 ;

INSERT INTO `prj666`.`tbl_user` (`usr_user_id`, `usr_first_name`, `usr_last_name`, `usr_login`, `usr_password`, `usr_rating_id`, `usr_media_id`, `usr_email`, `usr_DOB`, `usr_location_id`, `usr_registration_date`, `usr_user_type_id`, `usr_language`, `usr_email_subscribed`) VALUES
(1, 'John', 'Smith', 'JohnSmith', 'b237f6eb34df3b13b9563b4abf2cb29903c9b7a6', NULL, NULL, 'johnsmith8976@gmail.com', '1966-06-06', 1, '2014-02-03', 1, 'English, Russian', 'Y'),
(2, 'Mary', 'White', 'marylovewwm', '63d0e0bc9ecd4b2b259492ab97c5ec95', NULL, NULL, 'mary_white1234@gmail.com', '1988-08-08', NULL, '2014-05-30', 2, 'English, Russian, Mandarin', 'Y'),
(3, 'Igor', 'Entaltsev', 'igoryen', '63d0e0bc9ecd4b2b259492ab97c5ec95', NULL, NULL, 'thegoodoldbook@gmail.com', '1975-05-11', NULL, '2014-10-09', 2, 'English, Russian, Mandarin', 'Y'),
(43, 'lily', 'lilly', 'lfan', 'e0cc4653e4889785758bca09dec5daff04c8d74d', 0, 0, 'lfan9@myseneca.ca', '1994-02-03', 1, '2014-11-12', 2, '', '');

CREATE TABLE `prj666`.`tbl_authen_status` (
  `athn_authen_status_id`  INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `athn_stat_name`  VARCHAR(255)
) ENGINE = MyISAM DEFAULT CHARACTER SET = utf8;

INSERT INTO `prj666`.`tbl_authen_status` (`athn_authen_status_id`, `athn_stat_name`) VALUES
(1, 'original'),
(2, 'translate');

CREATE TABLE `prj666`.`tbl_author` (
 `aut_author_id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
 `aut_author_name` VARCHAR(100) NULL,
 `aut_author_time` VARCHAR(45) NULL,
 `aut_author_geo` VARCHAR(45) NULL
) ENGINE = MyISAM DEFAULT CHARACTER SET = utf8;

INSERT INTO `prj666`.`tbl_author` (`aut_author_id`, `aut_author_name`, `aut_author_time`, `aut_author_geo`) VALUES
(1, 'William Shakespeare', '', 'Britain'),
(2, 'Alexander Pushkin', '1799-1837', 'Russia'),
(3, 'unknown', 'unknown', 'China'),
(4, 'Mikhail Lermontov', '', 'Russia'),
(5, 'Confucius/Kongzi', 'China', 'B.C. 500''s');

CREATE TABLE `prj666`.`tbl_bad_words` (
  `bw_word` varchar(100) DEFAULT NULL,
  `bw_id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`bw_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;

INSERT INTO `prj666`.`tbl_bad_words` (`bw_word`, `bw_id`) VALUES
('2g1c', 1),
('2 girls 1 cup', 2),
('acrotomophilia', 3),
('anal', 4),
('anilingus', 5),
('anus', 6),
('arsehole', 7),
('ass', 8),
('asshole', 9),
('assmunch', 10),
('auto erotic', 11),
('autoerotic', 12),
('babeland', 13),
('baby batter', 14),
('ball gag', 15),
('ball gravy', 16),
('ball kicking', 17),
('ball licking', 18),
('ball sack', 19),
('ball sucking', 20),
('bangbros', 21),
('bareback', 22),
('barely legal', 23),
('barenaked', 24),
('bastardo', 25),
('bastinado', 26),
('bbw', 27),
('bdsm', 28),
('beaver cleaver', 29),
('beaver lips', 30),
('bestiality', 31),
('bi curious', 32),
('big black', 33),
('big breasts', 34),
('big knockers', 35),
('big tits', 36),
('bimbos', 37),
('birdlock', 38),
('bitch', 39),
('black cock', 40),
('blonde action', 41),
('blonde on blonde action', 42),
('blow j', 43),
('blow your l', 44),
('blue waffle', 45),
('blumpkin', 46),
('bollocks', 47),
('bondage', 48),
('boner', 49),
('boob', 50),
('boobs', 51),
('booty call', 52),
('brown showers', 53),
('brunette action', 54),
('bukkake', 55),
('bulldyke', 56),
('bullet vibe', 57),
('bung hole', 58),
('bunghole', 59),
('busty', 60),
('butt', 61),
('buttcheeks', 62),
('butthole', 63),
('camel toe', 64),
('camgirl', 65),
('camslut', 66),
('camwhore', 67),
('carpet muncher', 68),
('carpetmuncher', 69),
('chocolate rosebuds', 70),
('circlejerk', 71),
('cleveland steamer', 72),
('clit', 73),
('clitoris', 74),
('clover clamps', 75),
('clusterfuck', 76),
('cock', 77),
('cocks', 78),
('coprolagnia', 79),
('coprophilia', 80),
('cornhole', 81),
('cum', 82),
('cumming', 83),
('cunnilingus', 84),
('cunt', 85),
('darkie', 86),
('date rape', 87),
('daterape', 88),
('deep throat', 89),
('deepthroat', 90),
('dick', 91),
('dildo', 92),
('dirty pillows', 93),
('dirty sanchez', 94),
('doggie style', 95),
('doggiestyle', 96),
('doggy style', 97),
('doggystyle', 98),
('dog style', 99),
('dolcett', 100),
('domination', 101),
('dominatrix', 102),
('dommes', 103),
('donkey punch', 104),
('double dong', 105),
('double penetration', 106),
('dp action', 107),
('eat my ass', 108),
('ecchi', 109),
('ejaculation', 110),
('erotic', 111),
('erotism', 112),
('escort', 113),
('ethical slut', 114),
('eunuch', 115),
('faggot', 116),
('fecal', 117),
('felch', 118),
('fellatio', 119),
('feltch', 120),
('female squirting', 121),
('femdom', 122),
('figging', 123),
('fingering', 124),
('fisting', 125),
('foot fetish', 126),
('footjob', 127),
('frotting', 128),
('fuck', 129),
('fuck buttons', 130),
('fudge packer', 131),
('fudgepacker', 132),
('futanari', 133),
('gang bang', 134),
('gay sex', 135),
('genitals', 136),
('giant cock', 137),
('girl on', 138),
('girl on top', 139),
('girls gone wild', 140),
('goatcx', 141),
('goatse', 142),
('gokkun', 143),
('golden shower', 144),
('goodpoop', 145),
('goo girl', 146),
('goregasm', 147),
('grope', 148),
('group sex', 149),
('g-spot', 150),
('guro', 151),
('hand job', 152),
('handjob', 153),
('hard core', 154),
('hardcore', 155),
('hentai', 156),
('homoerotic', 157),
('honkey', 158),
('hooker', 159),
('hot chick', 160),
('how to kill', 161),
('how to murder', 162),
('huge fat', 163),
('humping', 164),
('incest', 165),
('intercourse', 166),
('jack off', 167),
('jail bait', 168),
('jailbait', 169),
('jerk off', 170),
('jigaboo', 171),
('jiggaboo', 172),
('jiggerboo', 173),
('jizz', 174),
('juggs', 175),
('kike', 176),
('kinbaku', 177),
('kinkster', 178),
('kinky', 179),
('knobbing', 180),
('leather restraint', 181),
('leather straight jacket', 182),
('lemon party', 183),
('lolita', 184),
('lovemaking', 185),
('make me come', 186),
('male squirting', 187),
('masturbate', 188),
('menage a trois', 189),
('milf', 190),
('missionary position', 191),
('motherfucker', 192),
('mound of venus', 193),
('mr hands', 194),
('muff diver', 195),
('muffdiving', 196),
('nambla', 197),
('nawashi', 198),
('negro', 199),
('neonazi', 200),
('nigga', 201),
('nigger', 202),
('nig nog', 203),
('nimphomania', 204),
('nipple', 205),
('nipples', 206),
('nsfw images', 207),
('nude', 208),
('nudity', 209),
('nympho', 210),
('nymphomania', 211),
('octopussy', 212),
('omorashi', 213),
('one cup two girls', 214),
('one guy one jar', 215),
('orgasm', 216),
('orgy', 217),
('paedophile', 218),
('panties', 219),
('panty', 220),
('pedobear', 221),
('pedophile', 222),
('pegging', 223),
('penis', 224),
('phone sex', 225),
('piece of shit', 226),
('pissing', 227),
('piss pig', 228),
('pisspig', 229),
('playboy', 230),
('pleasure chest', 231),
('pole smoker', 232),
('ponyplay', 233),
('poof', 234),
('poop chute', 235),
('poopchute', 236),
('porn', 237),
('porno', 238),
('pornography', 239),
('prince albert piercing', 240),
('pthc', 241),
('pubes', 242),
('pussy', 243),
('queaf', 244),
('raghead', 245),
('raging boner', 246),
('rape', 247),
('raping', 248),
('rapist', 249),
('rectum', 250),
('reverse cowgirl', 251),
('rimjob', 252),
('rimming', 253),
('rosy palm', 254),
('rosy palm and her 5 sisters', 255),
('rusty trombone', 256),
('sadism', 257),
('scat', 258),
('schlong', 259),
('scissoring', 260),
('semen', 261),
('sex', 262),
('sexo', 263),
('sexy', 264),
('shaved beaver', 265),
('shaved pussy', 266),
('shemale', 267),
('shibari', 268),
('shit', 269),
('shota', 270),
('shrimping', 271),
('slanteye', 272),
('slut', 273),
('s&m', 274),
('smut', 275),
('snatch', 276),
('snowballing', 277),
('sodomize', 278),
('sodomy', 279),
('spic', 280),
('spooge', 281),
('spread legs', 282),
('strap on', 283),
('strapon', 284),
('strappado', 285),
('strip club', 286),
('style doggy', 287),
('suck', 288),
('sucks', 289),
('suicide girls', 290),
('sultry women', 291),
('swastika', 292),
('swinger', 293),
('tainted love', 294),
('taste my', 295),
('tea bagging', 296),
('threesome', 297),
('throating', 298),
('tied up', 299),
('tight white', 300),
('tit', 301),
('tits', 302),
('titties', 303),
('titty', 304),
('tongue in a', 305),
('topless', 306),
('tosser', 307),
('towelhead', 308),
('tranny', 309),
('tribadism', 310),
('tub girl', 311),
('tubgirl', 312),
('tushy', 313),
('twat', 314),
('twink', 315),
('twinkie', 316),
('two girls one cup', 317),
('undressing', 318),
('upskirt', 319),
('urethra play', 320),
('urophilia', 321),
('vagina', 322),
('venus mound', 323),
('vibrator', 324),
('violet blue', 325),
('violet wand', 326),
('vorarephilia', 327),
('voyeur', 328),
('vulva', 329),
('wank', 330),
('wetback', 331),
('wet dream', 332),
('white power', 333),
('women rapping', 334),
('wrapping men', 335),
('wrinkled starfish', 336),
('xx', 337),
('xxx', 338),
('yaoi', 339),
('yellow showers', 340),
('yiffy', 341),
('zoophilia', 342);

CREATE TABLE  `prj666`.`tbl_city` (
  `cty_city_id`  INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `cty_city_name`  VARCHAR(255),
  `cty_province_id`  INT
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO `prj666`.`tbl_city` (`cty_city_id`, `cty_city_name`, `cty_province_id`) VALUES
(1, 'Toronto', 1),
(2, 'Maykop', 2),
(3, 'Luoyang', 3);

CREATE TABLE `prj666`.`tbl_comment` (
  `com_comment_id` int(11) NOT NULL AUTO_INCREMENT,
  `com_text` varchar(500) DEFAULT NULL,
  `com_rating_id` int(11) DEFAULT NULL,
  `com_created_by` int(11) DEFAULT NULL,
  `com_entry_id` varchar(25) DEFAULT NULL,
  `com_is_visible` varchar(1) DEFAULT 'Y',
  `com_created_on` datetime DEFAULT NULL,
  PRIMARY KEY (`com_comment_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 ;

INSERT INTO `prj666`.`tbl_comment` (`com_comment_id`, `com_text`, `com_rating_id`, `com_created_by`, `com_entry_id`, `com_is_visible`, `com_created_on`) VALUES
(1, 'This is awesome. Thanks', 1, 1, '1', 'Y', '2014-10-01 00:00:00'),
(2, 'It''s not accurate!!!', 2, 1, '2', 'Y', '2014-10-02 00:00:00'),
(3, 'I like it', 2, 2, '3', 'Y', '2014-10-03 00:00:00'),
(4, 'It''s helpful', 2, 2, '4', 'Y', '2014-10-05 00:00:00'),
(5, 'Non sense, very bad interpretation', 1, 1, '5', 'Y', '2014-10-06 00:00:00'),
(6, 'Not catch the main idea', 1, 2, '5', 'Y', '2014-10-07 00:00:00'),
(45, 'test', NULL, 1, '5', 'Y', '2014-10-25 10:01:26'),
(46, 'test1', NULL, 1, '5', 'N', '2014-10-25 09:21:25'),
(47, 'test5!!', NULL, 1, '5', 'Y', '2014-10-29 03:43:07'),
(60, 'I !! you', NULL, 1, '5', 'Y', '2014-10-27 23:55:18'),
(61, 'test6', NULL, 1, '5', 'Y', '2014-10-28 18:58:43'),
(63, 'test9', NULL, 1, '5', 'Y', '2014-11-03 06:55:03');

CREATE TABLE `prj666`.`tbl_country` (
  `con_country_id` int(11) NOT NULL AUTO_INCREMENT,
  `con_country_name` varchar(255) DEFAULT NULL,
  `con_country_code` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`con_country_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 ;

INSERT INTO `prj666`.`tbl_country` (`con_country_id`, `con_country_name`, `con_country_code`) VALUES
(1, 'Canada', '1'),
(2, 'Russia', '7'),
(3, 'China', '86');

CREATE TABLE  `prj666`.`tbl_language`(
  `lan_language_id`  INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `lan_lang_name`  VARCHAR(255)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO `prj666`.`tbl_language` (`lan_language_id`, `lan_lang_name`) VALUES
(1, 'English'),
(2, 'Russian'),
(3, 'Chinese-Simplify');

CREATE TABLE `prj666`.`tbl_language_proficiency` (
  `prof_id` int(10) NOT NULL AUTO_INCREMENT,
  `userid` int(15) NOT NULL,
  `language_id` int(15) NOT NULL,
  `prof` varchar(15) NOT NULL,
  PRIMARY KEY (`prof_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

INSERT INTO `prj666`.`tbl_language_proficiency` (`prof_id`, `userid`, `language_id`, `prof`) VALUES
(1, 0, 3, 'Native'),
(2, 0, 3, 'Native'),
(3, 0, 3, 'Native'),
(4, 0, 3, 'Native'),
(5, 33, 3, 'Native'),
(6, 34, 3, 'Native'),
(7, 35, 3, 'Native'),
(8, 36, 3, 'Native'),
(9, 37, 3, 'Native'),
(10, 38, 3, 'Native'),
(11, 39, 3, 'Native'),
(12, 40, 3, 'Native'),
(13, 41, 3, 'Native'),
(14, 42, 3, 'Native'),
(15, 43, 3, 'Native'),
(16, 43, 1, 'Native'),
(17, 43, 2, 'Intermediate');

CREATE TABLE `prj666`.`tbl_location` (
  `loc_location_id` int(11) NOT NULL AUTO_INCREMENT,
  `loc_address` varchar(50) DEFAULT NULL,
  `loc_postalcode` varchar(10) DEFAULT NULL,
  `loc_city_id` int(11) DEFAULT NULL,
  `loc_country` varchar(50) DEFAULT NULL,
  `loc_continent` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`loc_location_id`)  
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 ;

INSERT INTO `prj666`.`tbl_location` (`loc_location_id`, `loc_address`, `loc_postalcode`, `loc_city_id`, `loc_country`, `loc_continent`) VALUES
(1, '70 The Pond Road', 'M3J 3M6', 1, 'Canada', 'North America'),
(2, '36 Zhongzhou Road, Jianxi District', '471000', 3, 'China', 'Asia');

CREATE TABLE `prj666`.`tbl_media` (
  `med_media_id` int(11) NOT NULL AUTO_INCREMENT,
  `med_name` varchar(255) DEFAULT NULL,
  `med_desc` varchar(255) DEFAULT NULL,
  `med_link` varchar(255) DEFAULT NULL,
  `med_author` varchar(255) DEFAULT NULL,
  `med_media_type_id` int(11) DEFAULT NULL,
  `med_comment_id` int(11) DEFAULT NULL,
  `med_rating_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`med_media_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 ;

INSERT INTO `prj666`.`tbl_media` (`med_media_id`, `med_name`, `med_desc`, `med_link`, `med_author`, `med_media_type_id`, `med_comment_id`, `med_rating_id`) VALUES
(1, 'Forrest Gump', 'movie', '', '', 2, 1, 1),
(2, 'John in the farm', 'picture', '', 'John', 3, 2, 2),
(3, 'Lunyu', 'text', NULL, 'Kongzi', 4, NULL, NULL);

CREATE TABLE `prj666`.`tbl_media_type` (
  `mtp_media_type_id` int(11) NOT NULL AUTO_INCREMENT,
  `mtp_name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`mtp_media_type_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;

INSERT INTO `prj666`.`tbl_media_type` (`mtp_media_type_id`, `mtp_name`) VALUES
(1, 'audio'),
(2, 'video'),
(3, 'picture'),
(4, 'text');

CREATE TABLE `prj666`.`tbl_password_reset` (
  `ps_pwreset_id` int(11) NOT NULL,
  `ps_pwreset_user_id` varchar(20) NOT NULL,
  `ps_pwreset_date` date NOT NULL,
  PRIMARY KEY (`ps_pwreset_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE `prj666`.`tbl_province` (
  `pro_province_id` int(11) NOT NULL AUTO_INCREMENT,
  `pro_province_name` varchar(30) DEFAULT NULL,
  `pro_country_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`pro_province_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 ;

INSERT INTO `prj666`.`tbl_province` (`pro_province_id`, `pro_province_name`, `pro_country_id`) VALUES
(1, 'Ontario', 1),
(2, 'Chechnya', 2),
(3, 'Henan', 3);

CREATE TABLE `prj666`.`tbl_rating` (
  `rat_rating_id` int(11) NOT NULL AUTO_INCREMENT,
  `rat_entity_id` varchar(25) NOT NULL,
  `rat_like_user_id` int(11) DEFAULT NULL,
  `rat_dislike_user_id` int(11) DEFAULT NULL,
  `rat_created_on` datetime DEFAULT NULL,
  PRIMARY KEY (`rat_rating_id`) 
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;

INSERT INTO `prj666`.`tbl_rating` (`rat_rating_id`, `rat_entity_id`, `rat_like_user_id`, `rat_dislike_user_id`, `rat_created_on`) VALUES
(1, 'ent5', 2, 0, NULL),
(2, 'ent4', 2, 1, NULL),
(7, 'com45', NULL, 1, '2014-10-29 04:06:52'),
(9, 'com4', NULL, 1, '2014-10-28 23:00:12'),
(10, 'com61', 2, 0, '2014-10-29 04:06:49'),
(24, 'com61', NULL, 1, '2014-10-29 04:15:59'),
(25, 'com63', NULL, 1, '2014-11-03 06:41:52'),
(27, 'ent5', NULL, 1, '2014-11-04 23:14:54'),
(28, 'ent13', NULL, 1, '2014-11-09 00:38:26'),
(29, 'ent13', 2, 0, '2014-11-03 08:03:22'),
(30, 'ent13', 3, 0, '2014-11-03 08:04:44'),
(31, 'ent13', 4, 0, '2014-11-03 08:05:33'),
(32, 'ent11', 1, 0, '2014-11-03 08:06:07'),
(33, 'ent11', 3, 0, '2014-11-03 08:08:08'),
(34, 'ent38', 1, NULL, '2014-11-09 17:25:14'),
(35, 'ent38', 2, 0, '2014-11-03 08:09:22'),
(36, 'ent38', 3, 0, '2014-11-03 08:10:10'),
(37, 'com6', NULL, 1, '2014-11-04 22:28:56'),
(38, 'com76', 1, 0, '2014-11-08 00:32:32'),
(39, 'com80', 1, 0, '2014-11-09 11:26:28');

CREATE TABLE `prj666`.`tbl_report` (
  `rep_report_id` int(11) NOT NULL AUTO_INCREMENT,
  `rep_reason` varchar(100) DEFAULT NULL,
  `rep_entity_for_report` varchar(45) DEFAULT NULL,
  `rep_entity_id` int(11) DEFAULT NULL,
  `rep_reported_by` int(11) DEFAULT NULL,
  `rep_reported_on` datetime DEFAULT NULL,
  PRIMARY KEY (`rep_report_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 ;

INSERT INTO `prj666`.`tbl_report` (`rep_report_id`, `rep_reason`, `rep_entity_for_report`, `rep_entity_id`, `rep_reported_by`, `rep_reported_on`) VALUES
(1, 'hatred', 'user', 1, 1, '2014-10-27 00:00:00'),
(2, 'spam', 'comment', 1, 1, '2014-10-28 00:00:00'),
(3, 'bad', 'comment', 3, 0, '2014-10-28 15:55:48'),
(4, 'bad', 'comment', 3, 0, '2014-10-28 15:56:25'),
(5, 'bad1', 'comment', 3, 0, '2014-10-28 16:00:26'),
(6, 'bad3', 'comment', 4, 1, '2014-10-28 16:00:39'),
(7, 'bad4', 'comment', 4, 0, '2014-10-28 16:04:12'),
(8, 'bad5', 'comment', 4, 1, '2014-10-28 16:08:10'),
(13, 'bad6', 'comment', 6, 1, '2014-10-28 17:21:55'),
(14, 'report7', 'comment', 6, 1, '2014-10-28 17:25:20');

CREATE TABLE `prj666`.`tbl_source` (
  `sou_source_id` int(11) NOT NULL AUTO_INCREMENT,
  `sou_source_name` varchar(255) DEFAULT NULL,
  `sou_source_form` varchar(255) DEFAULT NULL,
  `sou_source_time` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`sou_source_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;

INSERT INTO `prj666`.`tbl_source` (`sou_source_id`, `sou_source_name`, `sou_source_form`, `sou_source_time`) VALUES
(1, 'unknown', 'poem', ''),
(2, 'Bronze Rider', 'poem', ''),
(3, 'unknown', 'poem', ''),
(4, 'unknown', 'song', 'unknown'),
(5, 'Lunyu', 'book', '');


CREATE TABLE `prj666`. `tbl_sublangbridge` (
  `slb_sublangbridge_id` int(11) NOT NULL AUTO_INCREMENT,
  `slb_subscribe_id` int(11) DEFAULT NULL,
  `slb_language_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`slb_sublangbridge_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 ;

INSERT INTO `prj666`.`tbl_sublangbridge` (`slb_sublangbridge_id`, `slb_subscribe_id`, `slb_language_id`) VALUES
(1, 1, 3),
(2, 2, 2);

CREATE TABLE `prj666`.`tbl_subscription` (
  `sub_subscribe_id` int(11) NOT NULL AUTO_INCREMENT,
  `sub_email_address` varchar(255) DEFAULT NULL,
  `sub_name` varchar(255) DEFAULT NULL,
  `sub_location_name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`sub_subscribe_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;

INSERT INTO `prj666`.`tbl_subscription` (`sub_subscribe_id`, `sub_email_address`, `sub_name`, `sub_location_name`) VALUES
(1, 'lfan9@mysenecac.ca', 'Linpei', 'China'),
(2, 'igor.yentaltsev@gmail.com', 'Igor', 'Russia');

CREATE TABLE `prj666`.`tbl_transl_request` (
  `treq_id` int(11) NOT NULL AUTO_INCREMENT,
  `treq_entry_id` int(11) NOT NULL,
  `treq_target_lang_id` int(11) NOT NULL,
  `treq_date` date NOT NULL,
  PRIMARY KEY (`treq_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 ;

INSERT INTO `prj666`.`tbl_transl_request` (`treq_id`, `treq_entry_id`, `treq_target_lang_id`, `treq_date`) VALUES
(27, 5, 1, '2014-11-03'),
(28, 6, 1, '2014-11-03'),
(29, 7, 1, '2014-11-03'),
(30, 9, 1, '2014-11-03'),
(31, 74, 1, '2014-11-03'),
(32, 53, 2, '2014-11-03'),
(33, 81, 2, '2014-11-03'),
(34, 77, 2, '2014-11-03'),
(35, 75, 2, '2014-11-03'),
(36, 52, 2, '2014-11-03'),
(37, 2, 2, '2014-11-03');

CREATE TABLE `prj666`.`tbl_user_type` (
  `utp_usertype_id` int(11) NOT NULL AUTO_INCREMENT,
  `utp_type_name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`utp_usertype_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 ;


INSERT INTO `prj666`.`tbl_user_type` (`utp_usertype_id`, `utp_type_name`) VALUES
(1, 'admin'),
(2, 'user'),
(4, 'inactive'),
(5, 'banned'),
(6, 'noconfirmed');


