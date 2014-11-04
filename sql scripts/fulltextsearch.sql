-- the MATCH() function
-- text collection

-- By default, the MATCH() function performs a natural language search for a string against a text collection. 

MATCH(A[,B,C])

-- A collection is a set of one or more columns included in a FULLTEXT index. 

-- The search string is given as the argument to AGAINST(). 

-- For each row in the table, MATCH() returns a relevance value; that is, a similarity measure between the search string and the text in that row in the columns named in the MATCH() list.

SELECT 
    * 
FROM 
    articles
WHERE 
    MATCH (title,body) 
    AGAINST ('database');

+----+-------------------+------------------------------------------+
| id | title             | body                                     |
+----+-------------------+------------------------------------------+
|  5 | MySQL vs. YourSQL | In the following database comparison ... |
|  1 | MySQL Tutorial    | DBMS stands for DataBase ...             |
+----+-------------------+------------------------------------------+
2 rows in set (0.00 sec)

-- By default, the search is performed in case-insensitive fashion. However, you can perform a case-sensitive full-text search by using a binary collation for the indexed columns. For example, a column that uses the latin1 character set of can be assigned a collation of latin1_bin to make it case sensitive for full-text searches.

-- Q: How do I sort the rows returned with the highest relevance first
-- A: Put MATCH() in a WHERE clause


-- Relevance values are nonnegative floating-point numbers. Zero relevance means no similarity. Relevance is computed based on the number of words in the row, the number of unique words in that row, the total number of words in the collection, and the number of documents (rows) that contain a particular word.

-- To simply count matches, you could use a query like this:

SELECT COUNT(*) 
FROM articles
WHERE 
    MATCH (title,body)
    AGAINST ('database');
+----------+
| COUNT(*) |
+----------+
|        2 |
+----------+
1 row in set (0.00 sec)

-- However, you might find it quicker to rewrite the query as follows:

SELECT COUNT(
    IF(
        MATCH (title,body) AGAINST ('database'), 1, NULL
    )
)
AS count
FROM articles;

+-------+
| count |
+-------+
|     2 |
+-------+
1 row in set (0.00 sec)

-- The first query sorts the results by relevance whereas the second does not. 
-- However, the second query performs a full table scan and the first does not. 
-- The first may be faster if the search matches few rows; otherwise, the second may be faster because it would read many rows anyway.

-- For natural-language full-text searches, it is a requirement that the columns named in the MATCH() function be the same columns included in some FULLTEXT index in your table. 
-- For the preceding query, note that the columns named in the MATCH() function (title and body) are the same as those named in the definition of the article table's FULLTEXT index. If you wanted to search the title or body separately, you would need to create separate FULLTEXT indexes for each column.

-- BOOLEAN MODE
-- It is also possible to perform a boolean search or a search with query expansion. These search types are described in Section 12.9.2, “Boolean Full-Text Searches”, and Section 12.9.3, “Full-Text Searches with Query Expansion”.

-- A full-text search that uses an index can name columns only from a single table in the MATCH() clause because an index cannot span multiple tables. A boolean search can be done in the absence of an index (albeit more slowly), in which case it is possible to name columns from multiple tables.

-- The preceding example is a basic illustration that shows how to use the MATCH() function where rows are returned in order of decreasing relevance. 
-- The next example shows how to retrieve the relevance values explicitly. 
-- Returned rows are not ordered because the SELECT statement includes neither WHERE nor ORDER BY clauses:

SELECT id, 
    MATCH (title,body) 
    AGAINST ('Tutorial')
FROM articles;

+----+-----------------------------------------+
| id | MATCH (title,body) AGAINST ('Tutorial') |
+----+-----------------------------------------+
|  1 |                        0.65545833110809 |
|  2 |                                       0 |
|  3 |                        0.66266459226608 |
|  4 |                                       0 |
|  5 |                                       0 |
|  6 |                                       0 |
+----+-----------------------------------------+
6 rows in set (0.00 sec)


SELECT 
        ent_entry_text
    ,   (MATCH (ent_entry_verbatim) AGAINST('five minutes' in BOOLEAN mode)) as rel 
    FROM tbl_entry
    HAVING rel >=0

-- The following example is more complex. The query returns the relevance values and it also sorts the rows in order of decreasing relevance. 
-- To achieve this result, specify MATCH() twice: once in the SELECT list and once in the WHERE clause. This causes no additional overhead, because the MySQL optimizer notices that the two MATCH() calls are identical and invokes the full-text search code only once.

SELECT id, body, 
MATCH (title,body) 
AGAINST('Security implications of running MySQL as root') AS score
FROM articles WHERE MATCH (title,body) 
AGAINST('Security implications of running MySQL as root');
+----+-------------------------------------+-----------------+
| id | body                                | score           |
+----+-------------------------------------+-----------------+
|  4 | 1. Never run mysqld as root. 2. ... | 1.5219271183014 |
|  6 | When configured properly, MySQL ... | 1.3114095926285 |
+----+-------------------------------------+-----------------+
2 rows in set (0.00 sec)

-- The MySQL FULLTEXT implementation regards any sequence of true word characters (letters, digits, and underscores) as a word. 
-- That sequence may also contain apostrophes (“'”), but not more than one in a row. This means that aaa'bbb is regarded as one word, but aaa''bbb is regarded as two words. 
-- Apostrophes at the beginning or the end of a word are stripped by the FULLTEXT parser; 'aaa'bbb' would be parsed as aaa'bbb.

-- The FULLTEXT parser determines where words start and end by looking for certain delimiter characters; for example, “ ” (space), “,” (comma), and “.” (period). If words are not separated by delimiters (as in, for example, Chinese), the FULLTEXT parser cannot determine where a word begins or ends. To be able to add words or other indexed terms in such languages to a FULLTEXT index, you must preprocess them so that they are separated by some arbitrary delimiter such as “"”.

-- Some words are ignored in full-text searches:

-- WORD LENGTH
-- Any word that is too short is ignored. The default minimum length of words that are found by full-text searches is four characters.

-- Words in the stopword list are ignored. 

    -- A stopword is a word such as “the” or “some” that is so common that it is considered to have zero semantic value. There is a built-in stopword list, but it can be overwritten by a user-defined list.

-- The default stopword list is given in Section 12.9.4, “Full-Text Stopwords”. The default minimum word length and stopword list can be changed as described in Section 12.9.6, “Fine-Tuning MySQL Full-Text Search”.

-- Every correct word in the collection and in the query is weighted according to its significance in the collection or query. Consequently, a word that is present in many documents has a lower weight (and may even have a zero weight), because it has lower semantic value in this particular collection. Conversely, if the word is rare, it receives a higher weight. The weights of the words are combined to compute the relevance of the row.

-- Such a technique works best with large collections (in fact, it was carefully tuned this way). For very small tables, word distribution does not adequately reflect their semantic value, and this model may sometimes produce bizarre results. For example, although the word “MySQL” is present in every row of the articles table shown earlier, a search for the word produces no results:

SELECT 
    * 
FROM 
    articles
WHERE 
    MATCH (title,body) AGAINST ('MySQL');

Empty set (0.00 sec)

-- The search result is empty because the word “MySQL” is present in at least 50% of the rows. As such, it is effectively treated as a stopword. 
-- For large data sets, this is the most desirable behavior: A natural language query should not return every second row from a 1GB table. For small data sets, it may be less desirable.

-- A word that matches half of the rows in a table is less likely to locate relevant documents. In fact, it most likely finds plenty of irrelevant documents. We all know this happens far too often when we are trying to find something on the Internet with a search engine. It is with this reasoning that rows containing the word are assigned a low semantic value for the particular data set in which they occur. A given word may reach the 50% threshold in one data set but not another.

-- The 50% threshold has a significant implication when you first try full-text searching to see how it works: If you create a table and insert only one or two rows of text into it, every word in the text occurs in at least 50% of the rows. As a result, no search returns any results. Be sure to insert at least three rows, and preferably many more. Users who need to bypass the 50% limitation can use the boolean search mode; see Section 12.9.2, “Boolean Full-Text Searches”.

-- Previous / Next / Up / Table of Contents
-- User Comments
-- Posted by Casey Fulton on February 7 2009 2:00pm    [Delete] [Edit]

-- Wow, the whole deal about FULLTEXT searches only returning anything if the number of results is less than 50% of the total table size should really be in BIG CAPITAL LETTERS at the top of the page.

-- I really think the single sentence that explains it is a little buried and not properly explained. I just wasted about 40 minutes wondering why the hell my query returned no results on my test data - perhaps the actual response could be a little more meaningful that "no rows"? If mySQL had responded with, say, "your query returns too many rows" or something, then I would have known what to do immediately. Damn poor response message...

-- Casey

-- Posted by Roland van der Heijden on May 14 2009 8:35am  [Delete] [Edit]
-- I totally agree. It took me even longer to find this (although i discovered some interesting commands, like myisam_ftdump, along the way).

-- Make this VERY CLEAR at the top of the FTS pages.

-- Posted by Wagner Bianchi on August 15 2011 6:02pm   [Delete] [Edit]
-- See how works the FULLTEXT SEARCH when the search term is at least 50% on the rows of a table:

mysql> CREATE TABLE sgbds (
-> sgbd char(60) not null,
-> FULLTEXT(sgbd)
-> ) ENGINE=MyISAM;
Query OK, 0 rows affected (0.05 sec)

mysql> INSERT INTO sgbds SET sgbd ='MySQL';
Query OK, 1 row affected (0.00 sec)

mysql> SELECT sgbd FROM sgbds WHERE MATCH(sgbd) AGAINST('MySQL');
Empty set (0.03 sec)

mysql> INSERT INTO sgbds SET sgbd ='ORACLE';
Query OK, 1 row affected (0.00 sec)

mysql> INSERT INTO sgbds SET sgbd ='SQL Server';
Query OK, 1 row affected (0.00 sec)

mysql> SELECT sgbd FROM sgbds WHERE MATCH(sgbd) AGAINST('MySQL');

+-------+
| sgbd  |
+-------+
| MySQL |
+-------+
1 row in set (0.00 sec)

When you INSERT the first value, it is a hundred percent of a table. After INSERT more two values ... "tachan nan nan", that value "MySQL" now is the 33% of table rows and it is returned.

Happy MySQL'ing 4 all!
Posted by Arek Jaworski on December 11 2009 11:49am [Delete] [Edit]
I completely agree with Casey and Roland.
Today, I was checking why search is not working with one of the components in Joomla. Turned on debugging mode. Checked SQL queries. Everything looked fine. Search the Internet for 'MATCH AGAINST returns zero rows'. No explicit solution found. Did a lot of testing. Finally, read through this doc till the end and... voila! Found what was wrong. I had only two rows inserted. This kind of information ("Be sure to insert at least three rows") should be highlighted, bolded, put in attention box and moved to the very top. It could save a lot of people's time!


Posted by John Craig on December 16 2009 7:01pm [Delete] [Edit]
I too have run into the no-results problem. In my case, we have plenty rows as a data-set, but the search term ("bankruptcy") simply occurred too many times and was considered a stop-word. While this IS the expected default behavior of MySQL FULLTEXT search, it is not acceptable when the website is all about bankruptcy. (Can you imagine a visitor receiving the message, "no results for 'bankruptcy' at a bankruptcy website?)

The documentation suggests using the BOOLEAN mode which DOES ignore the threshold, but returns NO relevance with the results; A very undesirable behavior.

My current solution, is to use QUERY EXPANSION mode in the SELECT statement, and BOOLEAN MODE in the WHERE clause when no results are returned in the initial search. This is still a poor solution as the results can be quite "noisy" and the relevance only semi-accurate for some search terms.

Any better ideas?

Posted by Jaimie Sirovich on December 20 2009 5:56am    [Delete] [Edit]
@John,

You may be able to use FT boolean for inclusion/selection and then FT natural for ORDER. This has the effect that noise words will not affect rank, but otherwise the ranking is natural. This is mostly correct and desirable.

Regards,
Jaimie.

