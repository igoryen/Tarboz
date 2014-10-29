
# --------------------
SELECT 
                e.ent_entry_id, 
                l.lan_lang_name, 
                e.ent_entry_text,
                e.ent_entry_creator_id,
                MATCH(e.ent_entry_verbatim) 
                  AGAINST('if back five minutes wait longer' 
                    IN 
                    -- NATURAL LANGUAGE 
                    BOOLEAN
                    MODE)
                AS relevance


              FROM tbl_entry e, tbl_language l

              WHERE e.ent_entry_language_id = l.lan_language_id 
                AND 
                  MATCH(e.ent_entry_verbatim) 
                    AGAINST('if back five minutes wait longer' 
                      IN 
                      -- NATURAL LANGUAGE 
                      BOOLEAN
                      MODE)
                AND e.ent_entry_authen_status_id = 1
              
              HAVING relevance >= 0              

              ORDER BY l.lan_lang_name
#=======================
SELECT 
-- *
-- ,
    ent_entry_id
  , ent_entry_authen_status_id
  , ent_entry_text
  , ent_entry_creator_id
  , MATCH(ent_entry_verbatim) AGAINST("five minutes"  IN NATURAL LANGUAGE MODE)
    AS relevance
FROM tbl_entry 
WHERE 
   MATCH(ent_entry_verbatim) AGAINST("five minutes"  IN NATURAL LANGUAGE MODE)
    -- AS relevance

-- AND 
  -- ent_entry_authen_status_id = 1
HAVING relevance >= 0


#===========================
SELECT 
  `ent_entry_text`, 
  `ent_entry_verbatim`, 
  MATCH (`ent_entry_verbatim`) AGAINST ('back five minutes wait longer' in boolean mode) AS score 
FROM 
  tbl_entry 
WHERE 
  MATCH (`ent_entry_verbatim`) AGAINST ('back five minutes wait longer' in boolean mode) 
order by score desc
#-----------------

SELECT 
-- *
-- ,
    ent_entry_id
  , ent_entry_authen_status_id
  , ent_entry_text
  , ent_entry_creator_id
  
  , MATCH(ent_entry_verbatim) AGAINST("five minutes"  IN NATURAL LANGUAGE MODE)
    AS relevance
FROM tbl_entry
WHERE ent_entry_authen_status_id = 1
HAVING relevance >= 0

  
#-------------------
SELECT 
                e.ent_entry_id, 
                l.lan_lang_name, 
                e.ent_entry_text,
                e.ent_entry_creator_id,
                MATCH(e.ent_entry_verbatim) 
                AGAINST("five minutes" IN NATURAL LANGUAGE MODE)
                AS relevance
              FROM tbl_entry e, tbl_language l
              WHERE e.ent_entry_language_id = l.lan_language_id 
                AND MATCH(e.ent_entry_verbatim) 
                    AGAINST("five minutes"  IN NATURAL LANGUAGE MODE)
                AND e.ent_entry_authen_status_id = 1
              HAVING relevance >= 0

#-----

SELECT 
  e.ent_entry_id, 
  l.lan_lang_name, 
  e.ent_entry_text, 
  e.ent_entry_creator_id,

MATCH(e.ent_entry_verbatim) 
AGAINST("longer wait if not" IN BOOLEAN MODE)
AS relevance

FROM tbl_entry e, tbl_language l 
WHERE   
      e.ent_entry_language_id = l.lan_language_id 
  AND e.ent_entry_authen_status_id = 1

HAVING relevance > 0

#------------


SELECT  *,
  -- e.ent_entry_id, 
  -- l.lan_lang_name, 
  -- e.ent_entry_text, 
  -- e.ent_entry_creator_id,

MATCH(e.ent_entry_verbatim) 
AGAINST(
  #"longer wait if not" 
  #"longer"
  "long wait just if"
  IN BOOLEAN MODE
  )
AS relevance

FROM 
    tbl_entry e
  -- , tbl_language l 
-- WHERE   
      #e.ent_entry_language_id = l.lan_language_id 
  #AND 
      -- e.ent_entry_authen_status_id = 1

HAVING relevance > 0

#---------------------

SELECT 
  e.ent_entry_id, 
  l.lan_lang_name, 
  e.ent_entry_text,
  e.ent_entry_tags,
  e.ent_entry_creator_id
FROM tbl_entry e, tbl_language l
WHERE e.ent_entry_language_id = l.lan_language_id
AND MATCH(e.ent_entry_verbatim)
AGAINST('
back five minutes ace ventura
' 
  IN 
  -- BOOLEAN
  NATURAL LANGUAGE 
  MODE )
AND e.ent_entry_authen_status_id = 1
