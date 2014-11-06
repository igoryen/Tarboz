SELECT 
  e.ent_entry_id, 
  l.lan_lang_name, 
  e.ent_entry_text,
  e.ent_entry_creator_id
FROM tbl_entry e, tbl_language l
WHERE e.ent_entry_language_id = l.lan_language_id
AND MATCH(e.ent_entry_verbatim)
AGAINST('motorcycle' IN NATURAL LANGUAGE MODE )
AND e.ent_entry_authen_status_id = 1