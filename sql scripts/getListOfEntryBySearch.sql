--- search case 16

SELECT 
  e.ent_entry_id, 
  l.lan_lang_name, 
  e.ent_entry_text  
FROM
  tbl_entry e, 
  tbl_language l
WHERE 
  e.ent_entry_language_id = l.lan_language_id 
AND  
  MATCH(e.ent_entry_verbatim)
  AGAINST('motorcycle' IN NATURAL LANGUAGE MODE )
AND
  e.ent_entry_authen_status_id = 1
AND
  e.ent_entry_language_id = 1
AND
  e.ent_entry_creation_date BETWEEN '2014-10-01' AND '2014-11-04'

--- search case 15
SELECT 
  e.ent_entry_id, 
  l.lan_lang_name, 
  e.ent_entry_text  
FROM
  tbl_entry e, 
  tbl_language l
WHERE 
  e.ent_entry_language_id = l.lan_language_id 
AND  
  MATCH(e.ent_entry_verbatim)
  AGAINST('motorcycle' IN NATURAL LANGUAGE MODE )
AND
  e.ent_entry_language_id = 1
AND
  e.ent_entry_creation_date BETWEEN '2014-10-01' AND '2014-11-04'

--- search case 14
SELECT 
  e.ent_entry_id, 
  l.lan_lang_name, 
  e.ent_entry_text  
FROM
  tbl_entry e, tbl_language l
WHERE 
  e.ent_entry_language_id = l.lan_language_id 
AND  
  MATCH(e.ent_entry_verbatim)
  AGAINST('katyusha river pear apple fog bank song eagle' IN NATURAL LANGUAGE MODE )
AND
  e.ent_entry_language_id = 2
AND
  e.ent_entry_authen_status_id = 1
--- search case 13
SELECT 
  e.ent_entry_id, 
  l.lan_lang_name, 
  e.ent_entry_text  
FROM
  tbl_entry e, 
  tbl_language l
WHERE 
  e.ent_entry_language_id = l.lan_language_id 
AND  
  MATCH(e.ent_entry_verbatim)
  AGAINST('birth day' IN NATURAL LANGUAGE MODE )
AND
  e.ent_entry_language_id = 2
--- search case 12
SELECT 
  e.ent_entry_id, 
  l.lan_lang_name, 
  e.ent_entry_text  
FROM
  tbl_entry e, 
  tbl_language l
WHERE 
  e.ent_entry_language_id = l.lan_language_id 
AND  
  MATCH(e.ent_entry_verbatim)
  AGAINST('motorcycle' IN NATURAL LANGUAGE MODE )
AND 
  e.ent_entry_creation_date BETWEEN '2014-10-30' AND '2014-11-04'
AND
  e.ent_entry_authen_status_id = 2
--- search case 11
SELECT 
  e.ent_entry_id, 
  l.lan_lang_name, 
  e.ent_entry_text  
FROM
  tbl_entry e, tbl_language l
WHERE 
 e.ent_entry_language_id = l.lan_language_id 
AND  
  MATCH(e.ent_entry_verbatim)
  AGAINST('motorcycle' IN NATURAL LANGUAGE MODE )
AND 
  e.ent_entry_creation_date BETWEEN '2014-10-30' AND '2014-11-04'
--- search case 10
SELECT 
  e.ent_entry_id, 
  l.lan_lang_name, 
  e.ent_entry_text  
FROM
  tbl_entry e, 
  tbl_language l
WHERE 
  e.ent_entry_language_id = l.lan_language_id 
AND  
  MATCH(e.ent_entry_verbatim)
  AGAINST('motorcycle' IN NATURAL LANGUAGE MODE )
AND 
  e.ent_entry_authen_status_id = 2
--- search case 9
SELECT 
  e.ent_entry_id, 
  l.lan_lang_name, 
  e.ent_entry_text  
FROM
  tbl_entry e, 
  tbl_language l
WHERE 
  e.ent_entry_language_id = l.lan_language_id 
AND  
  MATCH(e.ent_entry_verbatim)
  AGAINST('motorcycle' IN NATURAL LANGUAGE MODE )
--- search case 8
SELECT 
  e.ent_entry_id, 
  l.lan_lang_name, 
  e.ent_entry_text  
FROM
  tbl_entry e, 
  tbl_language l
WHERE 
  e.ent_entry_language_id = l.lan_language_id 
AND  
  e.ent_entry_language_id = 2
AND
  e.ent_entry_creation_date BETWEEN '2014-10-30' AND '2014-11-04'
AND
  e.ent_entry_authen_status_id = 2
--- search case 7
SELECT 
  e.ent_entry_id, 
  l.lan_lang_name, 
  e.ent_entry_text  
FROM
  tbl_entry e, tbl_language l
WHERE 
  e.ent_entry_language_id = l.lan_language_id 
AND  
  e.ent_entry_language_id = 2
AND
  e.ent_entry_creation_date BETWEEN '2014-10-30' AND '2014-11-02'
--- search case 6
SELECT 
  e.ent_entry_id, 
  l.lan_lang_name, 
  e.ent_entry_text  
FROM
  tbl_entry e, 
  tbl_language l
WHERE 
  e.ent_entry_language_id = l.lan_language_id 
AND  
  e.ent_entry_language_id = 2
AND
  e.ent_entry_authen_status_id = 1
--- search case 5
SELECT 
  e.ent_entry_id, 
  l.lan_lang_name, 
  e.ent_entry_text  
FROM
  tbl_entry e, tbl_language l
WHERE 
  e.ent_entry_language_id = l.lan_language_id 
AND  
  e.ent_entry_language_id = 2

--- search case 4
SELECT 
  e.ent_entry_id, 
  l.lan_lang_name, 
  e.ent_entry_text  
FROM
  tbl_entry e, tbl_language l
WHERE 
  e.ent_entry_language_id = l.lan_language_id 
AND
  e.ent_entry_creation_date BETWEEN '2014-10-30' AND '2014-11-02'
AND
  e.ent_entry_authen_status_id = 1
--- search case 3
SELECT 
  e.ent_entry_id, 
  l.lan_lang_name, 
  e.ent_entry_text  
FROM
  tbl_entry e, tbl_language l
WHERE 
  e.ent_entry_language_id = l.lan_language_id 
AND
  e.ent_entry_creation_date BETWEEN '2014-10-30' AND '2014-11-02'



--- search case 2
SELECT 
  e.ent_entry_id, 
  l.lan_lang_name, 
  e.ent_entry_text  
FROM
  tbl_entry e, tbl_language l
WHERE 
  e.ent_entry_language_id = l.lan_language_id 
AND  
  MATCH(e.ent_entry_verbatim)
  AGAINST('motorcycle' IN NATURAL LANGUAGE MODE )
AND
  e.ent_entry_authen_status_id = ""
AND
  e.ent_entry_language_id = ""
AND
  (e.ent_entry_creation_date BETWEEN '' AND '')

--- search case 1
SELECT 
  e.ent_entry_id, 
  l.lan_lang_name, 
  e.ent_entry_text  
FROM
  tbl_entry e, tbl_language l
WHERE 
  e.ent_entry_language_id = l.lan_language_id 
AND  
  MATCH(e.ent_entry_verbatim)
  AGAINST('' IN NATURAL LANGUAGE MODE )
AND
  e.ent_entry_authen_status_id = ""
AND
  e.ent_entry_language_id = ""
AND
  (e.ent_entry_creation_date BETWEEN '' AND '')
