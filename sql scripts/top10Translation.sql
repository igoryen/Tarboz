select *, count(rating.rat_like_user_id) as num_like
from 
(select orig.ent_entry_id as orig_entry_id, orig.ent_entry_text as orig_entry, 
	   trans.ent_entry_id as trans_entry_id, trans.ent_entry_text as trans_entry,
	   trans.ent_entry_creation_date as trans_date
from 
	(select ent_entry_id, ent_entry_text, ent_entry_verbatim, ent_entry_translit, ent_entry_authen_status_id, 
		   ent_entry_translation_of, ent_entry_creation_date
	from tbl_entry where ent_entry_authen_status_id = 1) as orig
inner join 
	(select ent_entry_id, ent_entry_text, ent_entry_verbatim, ent_entry_translit, ent_entry_authen_status_id, 
		   ent_entry_translation_of, ent_entry_creation_date
	from tbl_entry where ent_entry_authen_status_id = 2) as trans
	on orig.ent_entry_id = trans.ent_entry_translation_of
	
) as sub_entry
left join tbl_rating as rating
on rating.rat_entity_id = concat("ent", sub_entry.trans_entry_id) 
   and rating.rat_like_user_id is not null and rating.rat_like_user_id >0
group by sub_entry.trans_entry_id
order by num_like desc, sub_entry.trans_date desc, sub_entry.trans_entry_id asc
  