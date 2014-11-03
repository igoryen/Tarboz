---
SELECT
  r.treq_entry_id,
  l.lan_lang_name
FROM 
  tbl_transl_request r
    STRAIGHT_JOIN
  tbl_language l
WHERE
  r.treq_target_lang_id = l.lan_language_id
AND  
  r.treq_entry_id = 5

--- v5 get 

SELECT 
  e.ent_entry_id, 
  e.ent_entry_text, 
  r.treq_id,
  r.treq_target_lang_id,
  l.lan_lang_name
FROM 
  tbl_entry AS e 
    STRAIGHT_JOIN 
  tbl_transl_request AS r 
    STRAIGHT_JOIN
  tbl_language AS l
WHERE
  e.ent_entry_id = r.treq_entry_id
AND
  r.treq_target_lang_id = l.lan_language_id
AND
  SUBSTR(LOWER(l.lan_lang_name), 1,2) = 'ru'

--- v4 get transl req by 2 chars of lang name 
SELECT 
  e.ent_entry_id, 
  e.ent_entry_text, 
  r.treq_id,
  r.treq_target_lang_id,
  l.lan_lang_name
FROM 
  tbl_entry AS e 
    STRAIGHT_JOIN 
  tbl_transl_request AS r 
    STRAIGHT_JOIN
  tbl_language AS l
WHERE
  e.ent_entry_id = r.treq_entry_id
AND
  r.treq_target_lang_id = l.lan_language_id
AND
  SUBSTR(LOWER(l.lan_lang_name), 1,2) = 'ru'

-- v3 works: gets transl req by language name 
SELECT 
  e.ent_entry_id, 
  e.ent_entry_text, 
  r.treq_id,
  r.treq_target_lang_id,
  l.lan_lang_name
FROM 
  tbl_entry AS e 
    STRAIGHT_JOIN 
  tbl_transl_request AS r 
    STRAIGHT_JOIN
  tbl_language AS l
WHERE
  e.ent_entry_id = r.treq_entry_id
AND
  r.treq_target_lang_id = l.lan_language_id
AND
  l.lan_lang_name = 'Russian'

-- v2 works: get request by entry id ---------
SELECT 
  e.ent_entry_id, 
  e.ent_entry_text, 
  r.treq_id,
  r.treq_target_lang_id,
  l.lan_lang_name
FROM 
  tbl_entry AS e 
  STRAIGHT_JOIN 
  tbl_transl_request AS r 
  STRAIGHT_JOIN
  tbl_language AS l
WHERE
  e.ent_entry_id = r.treq_entry_id
AND
  r.treq_target_lang_id = l.lan_language_id
AND
  e.ent_entry_id = 53

----------v1 works -----------------
SELECT 
  e.ent_entry_id, 
  e.ent_entry_text, 
  r.treq_id, 
  r.treq_target_lang_id 
FROM 
  tbl_entry e, 
  tbl_transl_request r 
WHERE 
  e.ent_entry_id = r.treq_entry_id 
AND 
  e.ent_entry_id = 53

--- Treqs into English (1) --------------------------

INSERT INTO tbl_transl_request (treq_entry_id, treq_target_lang_id, treq_date)
VALUES (5,1,'2014-11-03');

INSERT INTO tbl_transl_request (treq_entry_id, treq_target_lang_id, treq_date)
VALUES (6,1,'2014-11-03');

INSERT INTO tbl_transl_request (treq_entry_id, treq_target_lang_id, treq_date)
VALUES (7,1,'2014-11-03');

INSERT INTO tbl_transl_request (treq_entry_id, treq_target_lang_id, treq_date)
VALUES (9,1,'2014-11-03');
INSERT INTO tbl_transl_request (treq_entry_id, treq_target_lang_id, treq_date)
VALUES (74,1,'2014-11-03');

---Treqs into Russian (2)------------------------------

INSERT INTO tbl_transl_request (treq_entry_id, treq_target_lang_id, treq_date)
VALUES (53,2,'2014-11-03');

INSERT INTO tbl_transl_request (treq_entry_id, treq_target_lang_id, treq_date)
VALUES (81,2,'2014-11-03');

INSERT INTO tbl_transl_request (treq_entry_id, treq_target_lang_id, treq_date)
VALUES (77,2,'2014-11-03');

INSERT INTO tbl_transl_request (treq_entry_id, treq_target_lang_id, treq_date)
VALUES (75,2,'2014-11-03');
INSERT INTO tbl_transl_request (treq_entry_id, treq_target_lang_id, treq_date)
VALUES (52,2,'2014-11-03');

INSERT INTO tbl_transl_request (treq_entry_id, treq_target_lang_id, treq_date)
VALUES (2,2,'2014-11-03');