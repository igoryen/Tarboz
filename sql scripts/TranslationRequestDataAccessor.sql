SELECT 
  e.ent_entry_id, 
  e.ent_entry_text, 
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
  SUBSTR(LOWER(l.lan_lang_name), 1,2) = 'en'