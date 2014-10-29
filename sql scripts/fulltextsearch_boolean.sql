-- 12.9.2 Boolean Full-Text Searches

-- MySQL can perform boolean full-text searches using the IN BOOLEAN MODE modifier. With this modifier, certain characters have special meaning at the beginning or end of words in the search string. In the following query, the + and - operators indicate that a word is required to be present or absent, respectively, for a match to occur. Thus, the query retrieves all the rows that contain the word “MySQL” but that do not contain the word “YourSQL”:

SELECT 
  * 
FROM 
  articles 
WHERE 
  MATCH (title,body)
  AGAINST ('+MySQL -YourSQL' IN BOOLEAN MODE);
+----+-----------------------+-------------------------------------+
| id | title                 | body                                |
+----+-----------------------+-------------------------------------+
|  1 | MySQL Tutorial        | DBMS stands for DataBase ...        |
|  2 | How To Use MySQL Well | After you went through a ...        |
|  3 | Optimizing MySQL      | In this tutorial we will show ...   |
|  4 | 1001 MySQL Tricks     | 1. Never run mysqld as root. 2. ... |
|  6 | MySQL Security        | When configured properly, MySQL ... |
+----+-----------------------+-------------------------------------+

-- Note
-- In implementing this feature, MySQL uses what is sometimes referred to as implied Boolean logic, in which
-- + stands for AND
-- - stands for NOT
-- [no operator] implies OR

-- Boolean full-text searches have these characteristics:
-- They do not use the 50% threshold.
-- They do not automatically sort rows in order of decreasing relevance. You can see this from the preceding query result: The row with the highest relevance is the one that contains “MySQL” twice, but it is listed last, not first.

-- They can work even without a FULLTEXT index, although a search executed in this fashion would be quite slow.
-- The minimum and maximum word length full-text parameters apply.
-- The stopword list applies.
-- The boolean full-text search capability supports the following operators:
-- +
-- A leading plus sign indicates that this word must be present in each row that is returned.

-- -
-- A leading minus sign indicates that this word must not be present in any of the rows that are returned.

-- Note: The - operator acts only to exclude rows that are otherwise matched by other search terms. Thus, a boolean-mode search that contains only terms preceded by - returns an empty result. It does not return “all rows except those containing any of the excluded terms.”

-- (no operator)

-- By default (when neither + nor - is specified) the word is optional, but the rows that contain it are rated higher. This mimics the behavior of MATCH() ... AGAINST() without the IN BOOLEAN MODE modifier.

-- > <

-- These two operators are used to change a word's contribution to the relevance value that is assigned to a row. The > operator increases the contribution and the < operator decreases it. See the example following this list.

-- ( )

-- Parentheses group words into subexpressions. Parenthesized groups can be nested.

~

A leading tilde acts as a negation operator, causing the word's contribution to the row's relevance to be negative. This is useful for marking “noise” words. A row containing such a word is rated lower than others, but is not excluded altogether, as it would be with the - operator.

*

The asterisk serves as the truncation (or wildcard) operator. Unlike the other operators, it should be appended to the word to be affected. Words match if they begin with the word preceding the * operator.

If a word is specified with the truncation operator, it is not stripped from a boolean query, even if it is too short (as determined from the ft_min_word_len setting) or a stopword. This occurs because the word is not seen as too short or a stopword, but as a prefix that must be present in the document in the form of a word that begins with the prefix. Suppose that ft_min_word_len=4. ft_min_word_len=4. Then a search for '+word +the*' will likely return fewer rows than a search for '+word +the':

The former query remains as is and requires both word and the* (a word starting with the) to be present in the document.

The latter query is transformed to +word (requiring only word to be present). the is both too short and a stopword, and either condition is enough to cause it to be ignored.

""

-- A phrase that is enclosed within double quote (“"”) characters matches only rows that contain the phrase literally, as it was typed. The full-text engine splits the phrase into words and performs a search in the FULLTEXT index for the words. Prior to MySQL 5.0.3, the engine then performed a substring search for the phrase in the records that were found, so the match must include nonword characters in the phrase. As of MySQL 5.0.3, nonword characters need not be matched exactly: Phrase searching requires only that matches contain exactly the same words as the phrase and in the same order. For example, "test phrase" matches "test, phrase" in MySQL 5.0.3, but not before.

-- If the phrase contains no words that are in the index, the result is empty. For example, if all words are either stopwords or shorter than the minimum length of indexed words, the result is empty.

-- The following examples demonstrate some search strings that use boolean full-text operators:

'apple banana' 
Find rows that contain at least one of the two words.

'+apple +juice' 
  Find rows that contain both words.

'+apple macintosh' 
    Find rows that contain the word “apple”, but rank rows higher if they also contain “macintosh”.

'+apple -macintosh' 
  Find rows that contain the word “apple” but not “macintosh”.

'+apple ~macintosh' 
  Find rows that contain the word “apple”, but if the row also contains the word “macintosh”, rate it lower than if row does not. This is “softer” than a search for '+apple -macintosh', for which the presence of “macintosh” causes the row not to be returned at all.

'+apple +(>turnover <strudel)'
  Find rows that contain the words “apple” and “turnover”, or “apple” and “strudel” (in any order), but rank “apple turnover” higher than “apple strudel”.

'apple*'
  Find rows that contain words such as “apple”, “apples”, “applesauce”, or “applet”.

'"some words"'
  Find rows that contain the exact phrase “some words” (for example, rows that contain “some words of wisdom” but not “some noise words”). Note that the “"” characters that enclose the phrase are operator characters that delimit the phrase. They are not the quotation marks that enclose the search string itself.
"
-- User Comments
-- Posted by Jeff Smith on May 27 2004 1:08pm  [Delete] [Edit]
-- Keep in mind that although MATCH() AGAINST() is case-insensitive, it also is basically **accent-insensitive**. In other words, if you do not want _mangé_ to match with _mange_ (this example is in French), you have no choice but to use the BOOLEAN MODE with the double quote operator. This is the only way that MATCH() AGAINST() will make accent-sensitive matches.

-- E.g.:

SELECT 
  * 
FROM 
  quotes_table 
WHERE 
  MATCH (quote) AGAINST ('"mangé"' IN BOOLEAN MODE)

-- For multiword searches:

SELECT 
  * 
FROM 
  quotes_table 

  MATCH (quote) AGAINST ('"mangé" "pensé"' IN BOOLEAN MODE)

SELECT 
  * 
FROM 
  quotes_table 

  MATCH (quote) AGAINST ('+"mangé" +"pensé"' IN BOOLEAN MODE)

-- Although the double quotes are intended to enable phrase searching, just like any web search engine for example, you can also use them to signify single words where accents and other diacritics matter.

-- The only drawback to this method seems to be that the asterisk operator is mutually exclusive with the double quote. Or I just haven't been able to combine both effectively.


-- Posted by Rainer Typke on September 8 2004 7:28pm [Delete] [Edit]
-- Be careful with the phrase search when short words are involved!
-- Words that are shorter than the minimum word length (by default, words with up to 3 characters) are sometimes taken into consideration when you search for phrases, but sometimes not!

-- Example 1:
-- A search for the phrase "the creation" will find all records that really contain this phrase, and only those. So, a record containing only "la creation du monde", even without the accent aigu on the e in creation, won't be found. This is just fine and what one would expect.

-- Example 2: A search for the phrase "let it be" won't find any record, not even records containing something like "The Beatles: Let It Be". According to the MySQL team, this is not a bug. 

-- I personally find it very counterintuitive to sometimes take short words into consideration for phrase searches, but only if there is at least one properly long word in the search phrase.

-- Posted by Markus Loponen on October 13 2004 7:56pm  [Delete] [Edit]
-- For those of you who interface MySQL with PHP and wonder what the problem is with getting "exact phrases" working properly, here's the way to go.

$query = "SELECT 
  code, category, header, date 
FROM 
  articles 
WHERE 
  MATCH (text,header,summary) 
  AGAINST ('" . stripslashes (str_replace ("&quot;", "\"", ($_POST['keywords']))) . "' IN BOOLEAN MODE)";
'
-- PHP, or some setups or with some browsers, convert double quotes from POST data to their HTML-equivalents even without being asked to do that. The above will fix the issue. Stripslashes() is optional, I prefer to keep it in to keep things looking clean, though the \" doesn't seem to break the boolean literal search.

-- Posted by Rob Thorpe on November 14 2004 6:39pm [Delete] [Edit]
-- It's also possible to create a prioritized boolean query with the following SQL:

SELECT 
  id, 
  text, 
  MATCH (text) AGAINST ('word1 word2 word3' in boolean mode) 
AS 
  score 
FROM 
  table1
WHERE 
  MATCH (text) AGAINST ('word1 word2 word3' in boolean mode) 
order by score desc;

SELECT `ent_entry_text`, `ent_entry_verbatim`, 
MATCH (`ent_entry_verbatim`) 
AGAINST ('back five minutes wait longer' in boolean mode) AS score FROM tbl_entry WHERE MATCH (`ent_entry_verbatim`) AGAINST ('back five minutes wait longer' in boolean mode) order by score desc


-- Posted by Adam George on December 13 2004 5:32pm  [Delete] [Edit]
-- According to the last comment by Rob Thorpe it's possible to prioritize the boolean query like so:

SELECT 
  id, 
  text, 
  MATCH (text) AGAINST ('word1 word2 word3' in boolean mode) 
AS 
  score 
FROM 
  table1
WHERE 
  MATCH (text) AGAINST ('word1 word2 word3' in boolean mode) 
  order by score desc;

-- I tried this and it failed to work, i.e. all the scores turned out to be '1' even though the number of matches differed from record to record.

-- Posted by Brad Satoris on December 13 2004 9:14pm [Delete] [Edit]
-- Boolean searching has two deficiencies: 
-- 1) results are not sorted by relevance and; 
-- 2) no method by which to weigh certain columns. 
-- There is a way around both of these problems. For example, if I have a table of articles and want to weigh the title more heavily than the text, I can do the following:

SELECT 
  *
  , 
  ( 
    (
      1.3 * (MATCH(title) AGAINST ('+term +term2' IN BOOLEAN MODE))
    ) 
    + 
    (
      0.6 * (MATCH(text) AGAINST ('+term +term2' IN BOOLEAN MODE))
    ) 
  ) AS relevance 

  FROM [table_name] 
  WHERE 
  ( 
    MATCH(title,text) AGAINST ('+term +term2' IN BOOLEAN MODE) 
  ) 
  HAVING relevance > 0 
  ORDER BY relevance DESC;


-- Here we artificially manipulate the relevancy score to give title more weight by multiplying by the constant 1.3. In the above query, it doesn't seem to matter whether I have 3 fulltext indexes or just one comprising the title and text columns. From my testing, the results appear to be the same.

-- Posted by Joe Laffey on January 5 2005 4:30pm [Delete] [Edit]
-- In response to the note above Posted by Adam George on December 13 2004 7:32pm:

-- In my tests it would seem that the score returned is an integer equal to the number of words matched. So if you match on 3 words the scores will range from 1 to 3. If you match only on one word, or only one word is matched in any document, then the scores would all be 1.

-- Posted by Richard on February 23 2005 7:11pm  [Delete] [Edit]
-- In response to Joe Laffey and Adam George:

-- To enhance sorting of the results in boolean mode you can do the following:

SELECT id, text, MATCH (text) AGAINST ('word1 word2 word3')
AS score FROM table1
WHERE MATCH (text) AGAINST ('+word1 +word2 +word3' in boolean mode) order by score desc;

Using the first MATCH() we get the score in non-boolean search mode (more distinctive). The second MATCH() ensures we really get back only the results we want (with all 3 words). If you want to do 'any of the words' search only, it's better to use non-boolean search instead (unless you are using boolean in order to get rid of 50% treshold limit).

Posted by kim markegard on June 24 2005 6:31pm  [Delete] [Edit]
I'm not sure why MATCH/AGAINST uses a different scoring method when in boolean mode and when it's not. As stated above, if searching 3 terms in boolean mode, the score will be between 1 and 3 (integer). However, if not in boolean mode, the score is a floating point value.

It seems that non-boolean mode returns a "real" relevancy (based on how often each term was found I presume). In boolean mode it only returns how many terms were found. To me, this is not really relevancy. For instance, if searching on 2 terms, one result may have 20 occurrences of each term and another may have only 1 occurrence of each word, yet they will both return "2" as their relevance.

Posted by Ben Allfree on September 1 2005 6:20am  [Delete] [Edit]
This seems to work well for ranking relevance in boolean queries:

select products_id,match(products_model) against ('printer' ) as Relevance

from products 

where match(products_model) against ('+"printer"' in boolean mode)

Posted by Ferenc Fogarasi on October 19 2005 12:24pm  [Delete] [Edit]
Hi,
if You want to combine the phrase search with the *, simply search for the words separately and apply a having clause.

For example:
If You wish to find `bird cathcing`, `bird cathcer`, `bird cathers`

try this

SELECT column, MATCH( column ) AGAINST ('bird catch' IN BOOLEAN MODE) AS rank
FROM mytable
WHERE MATCH( column ) AGAINST ('bird catch' IN BOOLEAN MODE) > 0
HAVING column LIKE '%bird catch%'
ORDER BY rank DESC

I know the HAVING clause is slow, but it is only allpied to the rows that match the search criteira.

Have'n tested on big tables, but I have a feeling it works just fine.

Posted by Robert Collins on November 8 2005 8:45pm  [Delete] [Edit]
This works for me so I get a score and the benefits of a boolean search. However, it's doing two different fulltext searches so it may slow things down a lot:

SELECT *, MATCH(post_content, post_title) AGAINST('string') AS `score` FROM posts MATCH(post_content, post_title) AGAINST('string' IN BOOLEAN MODE) ORDER BY score DESC LIMIT 10

The boolean mode after the from statement automatically pulls out the 0's and then the Match statement in the SELECT clause allows me to get the relevance score so I can sort by it.

Posted by Martin Halford on December 2 2005 12:09am [Delete] [Edit]
Following on from Robert's comment, I've been playing around using his technique trying to get 'exact' and 'any word' searches to work. I've been having trouble with plurals, e.g. searching for 'anchor bolts' when the fulltext index includes 'anchors' and 'bolt'. This can be solved with the boolean part of the Match statement by trimming and searching for +anchor* +bolt*, but the non-boolean part of the Match statement for relevance is still a problem returning zeros in some instances. My 'fix' for this is to search for 'anchor anchors bolt bolts' in the non-boolean part (fairly easy to program in php), which seems to solve the problem. Any easier solutions such as like '%anchor%'?

Posted by Justin Laing on October 4 2006 4:50pm [Delete] [Edit]
I needed to be able to take a user search that might have words in it that are less then the min word length and return only results that contained all words.

What I did was break the query up into two sets of words, one set contained all the words that were >= ft_min_word_len, the other set contained all the shorter words. I did a fulltext search on the words that met the fulltext search length requirement and augmented it with an AND clause that used LIKE '%<shortword1>%'. MySQL uses the fulltext index to narrow down the results and then applies the LIKE conditions, so it stays fast.

This way you don't need to change your ft_min_word_len to a smaller number, which will make your indexes bigger.

Here's the regex I used to break things up:
\b(\w{4,})\b
where ft_min_word_len = 4, that will match all words of 4 or more letters.

Example
Search for the string "axle hub nut" will result in:
WHERE MATCH (col) AGAINST ("+axle*" IN BOOLEAN MODE) AND col LIKE '%hub%' AND col LIKE '%nut%'


Posted by Joost on March 30 2007 10:37am  [Delete] [Edit]
Fulltext boolean mode search returning (relevance):
SELECT MATCH (x) AGAINST ('word1 word2' IN BOOLEAN MODE) AS relevance
The returned relevance is 0,1 or 2. 0 = no match, 1 = one of the words is matched (word1 or word2), 2 = both word are matched.
When using eg. '+word1 word2 word3' it returns a floating point number (double) which is the relevance (all returned rows contain word1, some are more relevant (they return word2 and word3, others less..they contain word1 and (word2 or word3).. others even less..containing only word1 (relevance = 1). 

Posted by Lee Clemmer on August 21 2008 12:40am [Delete] [Edit]
Markus Loponen, awesome tip about the PHP statement, I was wondering why the quotes didn't seem to do the trick. Thanks for sharing!

Posted by Sean Cannon on November 12 2008 7:24pm  [Delete] [Edit]
Here's a query I use to return relevance-based data while still using boolean mode searches, and using weights for different columns, and even weights for specific results:

SELECT id,
store,
name,
(((MATCH(name)
AGAINST(?) * 1.2) +
MATCH(description, keywords)
AGAINST (?) +
((MATCH(creators)
AGAINST (?) * 1.2)) / 3) +
(((store IN ('xfx','w3d')) * .12) * ((store IN ('iv', '3da', 'vp')) * .1))) *
MATCH(description,keywords,requirements,creators,name)
AGAINST(? IN BOOLEAN MODE)
AS sort_rel
FROM prod_text
WHERE MATCH(description,keywords,requirements,creators,name)
AGAINST(? IN BOOLEAN MODE)
AND store != 'pp'
HAVING sort_rel > 0.2
ORDER BY sort_rel DESC

All placeholders (?s) take the search terms entered by the user in this case.

Posted by Sean Cannon on November 12 2008 7:50pm  [Delete] [Edit]
For the record, I also like to use three letter (and smaller) words, but I also understand the need to not index all of them (it would simply be absurd).

Instead of enabling a smaller size, what I do is this:

I preprocess against a list of three letter words I want to be matchable. For any row I find, I insert a different string into the indexed text the same number of times (this column need not actually be the one holding returned text mind you, it can be a duplicate column used only for indexing and searching).

When a user searches, I preprocess his or her search query in the same way, replacing any of the words I want matchable with the longer string.

For instance, if I wanted the search to be able to match 'GUN' I would search (using LIKE) for all rows matching and get back the results into a perlscript:

my $check_for_tlw_q = <<"EOF";
SELECT id, fulltext_indexed
FROM some_table
WHERE fulltext_displayed RLIKE '(^|[[:blank:]])GUN([[:blank:]]|$)'
AND fulltext_indexed NOT RLIKE '(^|[[:blank:]])TLWGUNTLW([[:blank:]]|$)'
EOF
my $check_for_tlw = $dbh->prepare($check_for_tlw_q);

my $update_tlw_q = <<<"EOF";
UPDATE some_table
SET fulltext_indexed = ?
WHERE id = ?
EOF
my $update_tlw = $dbh->prepare($update_tlw_q);

$check_for_tlw->execute;
while (my $row = $check_for_tlw->fetchrow_hashref) {
$row->{fulltext_indexed} =~ s/\bgun\b/TLWGUNTLW/igsm;
$update_tlw->execute($row->{fulltext_indexed}, $row->{id}); 
}

Then when a user searches for 'machine gun' the search is substituted to be 'machine TLWGUNTLW' behind the scenes. This has the effect of making 'gun' matchable without enabling words like 'the' and 'and' and 'les' and 'how' and 'brb' and thus not bogging down the index except where necessary.


Posted by masi pay on February 20 2009 3:16am [Delete] [Edit]
Using > < can give some weight but if you have more than two words to match against like match(..) against('>frist second third') and you want to give weight, seems like there is no way. adding '>' will give you the higher weight to 'first' in this case but how to give second and third.. weight is not clear.

This is impportant specially if you have more than two fields to match against, field artist, field album, field producer, you want to list with artist then album then producer.


Posted by Roel Van de Paar on October 13 2009 2:41am  [Delete] [Edit]
Note that you can use myisam_ftdump utility to dump the fulltext index.

Posted by Andrew Upton on March 10 2010 11:10am [Delete] [Edit]
Another possibility for returning results based on relevance is to construct your search table with a score/value already built in. This is not a perfect solution by any means but will certainly return results much quicker with extremely large tables and help to sort the results a little better. 

1. Build your search table

CREATE TABLE my_search
(
id int(10),
category smallint(5),
score smallint(5),
text_data text
) 
ENGINE=MyISAM 
DEFAULT CHARSET=latin1 
ROW_FORMAT=COMPRESSED;

2. Fill the table with data

Fill the search table with data giving a greater score value, to more important data. 

For example with a product database:

Insert the product names, make and model into the "text_data" column and give it a score of 5 (or similarly higher score). Insert the product specification and give this a score of 3 (medium value) and then insert the product description and any other related text with a score of 1 (low value).

Therefore, in this example, we insert 3 rows for the three items of data with differing scores relating to the data's importance.

3. Create indexes

CREATE FULLTEXT INDEX idx_1 ON my_search (text_data);
CREATE INDEX idx_2 ON my_search (id);

You may wish to create indexes for the other columns, such as category, if they are included in your proposed SELECT statement.

4. Execute your SELECT

The following Select statement will return your search results sorted with matches against product name towards the top. If the match is against product name *and* specification then this has an even higher score (relevance) and appears higher in the list. 

SELECT id, sum(score)
FROM my_search
WHERE MATCH(text_data) AGAINST ('search for this text' IN BOOLEAN MODE)
GROUP BY id
ORDER BY sum(score) DESC;

-- 

As I said at the beginning, this is not a perfectly accurate list by *real* computed relevance. However, this may provide help in some circumstances with extremely large databases (mine has 2.2 million rows). 


Posted by Richard Shea on May 20 2010 11:28pm [Delete] [Edit]
I found the default settings of the server/database I was working within ...

SHOW VARIABLES LIKE 'collation%'

Variable_name Value
collation_connection utf8_unicode_ci
collation_database latin1_general_cs
collation_server latin1_swedish_ci

... meant the above example did not return both rows but instead only the row which contained the 'database' string. 

I was able to resolve this by explicilty setting the character set/collation to one that that is case in-sensitive

CREATE TABLE articles(
id INT UNSIGNED AUTO_INCREMENT NOT NULL PRIMARY KEY ,
title VARCHAR( 200 ) ,
body TEXT,
FULLTEXT (
title,
body
)
) DEFAULT CHARACTER SET latin1 COLLATE latin1_general_ci;


Posted by Roman Partyka on March 18 2011 12:41pm  [Delete] [Edit]
I have noticed strange behavior. I have a table 'mytable' with two columns: id (int), article (text). Column 'article' has FULLTEXT index on it. I want to find articles containing both 'word1' and 'word2'. 'word1' is very common (90% of the articles contain it). 

Straightforward query:
SELECT id, article FROM mytable WHERE MATCH(article) AGAINST ('+word1 +word2' IN BOOLEAN MODE)
does return result, but is very slow.

At the same time, another query
SELECT id, article FROM mytable WHERE MATCH(article) AGAINST ('+word1' IN BOOLEAN MODE) AND MATCH(article) AGAINST ('+word2' IN BOOLEAN MODE)
returns the same result, but could be 100 times faster...

This is true for version 4.1


Posted by Micah Stevenson on October 12 2012 8:30pm [Delete] [Edit]
Another option for using full text boolean searches w/php and getting "exact phrases" working is to use the native php function html_entity_decode() to reverse the html entities on the user input.

Or, you can use Markus' example. Don't forget to sanitize user input :-)