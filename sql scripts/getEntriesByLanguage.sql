# return language as string
SELECt e.ent_entry_id, SUBSTR(l.lan_lang_name, 1, 2), e.ent_entry_text
FROM tbl_entry 
WHERE ent_entry_language_id 


# return language as integer
SELECt ent_entry_id, ent_entry_language_id, ent_entry_text
FROM tbl_entry 
WHERE ent_entry_language_id = 1