-- 12.9.6 Fine-Tuning MySQL Full-Text Search

-- MySQL's full-text search capability has few user-tunable parameters. You can exert more control over full-text searching behavior if you have a MySQL source distribution because some changes require source code modifications. See Section 2.17, “Installing MySQL from Source”.

-- Note that full-text search is carefully tuned for the most effectiveness. Modifying the default behavior in most cases can actually decrease effectiveness. Do not alter the MySQL sources unless you know what you are doing.

-- Most full-text variables described in this section must be set at server startup time. A server restart is required to change them; they cannot be modified while the server is running.

-- Some variable changes require that you rebuild the FULLTEXT indexes in your tables. Instructions for doing so are given later in this section.

-- The minimum and maximum lengths of words to be indexed are defined by the ft_min_word_len and ft_max_word_len system variables. (See Section 5.1.4, “Server System Variables”.) 
-- The default minimum value is four characters; 
-- the default maximum is version dependent. 
-- If you change either value, you must rebuild your FULLTEXT indexes. For example, if you want three-character words to be searchable, you can set the ft_min_word_len variable by putting the following lines in an option file:

-- [mysqld]
-- ft_min_word_len=3
-- Then restart the server and rebuild your FULLTEXT indexes. Note particularly the remarks regarding myisamchk in the instructions following this list.

 -- To override the default stopword list, set the ft_stopword_file system variable. (See Section 5.1.4, “Server System Variables”.) The variable value should be the path name of the file containing the stopword list, or the empty string to disable stopword filtering. The server looks for the file in the data directory unless an absolute path name is given to specify a different directory. After changing the value of this variable or the contents of the stopword file, restart the server and rebuild your FULLTEXT indexes.

-- The stopword list is free-form. That is, you may use any nonalphanumeric character such as newline, space, or comma to separate stopwords. Exceptions are the underscore character (“_”) and a single apostrophe (“'”) which are treated as part of a word. The character set of the stopword list is the server's default character set; see Section 10.1.3.1, “Server Character Set and Collation”.

The 50% threshold for natural language searches is determined by the particular weighting scheme chosen. To disable it, look for the following line in myisam/ftdefs.h:

#define GWS_IN_USE GWS_PROB
Change that line to this:

#define GWS_IN_USE GWS_FREQ
Then recompile MySQL. There is no need to rebuild the indexes in this case.

Note
By making this change, you severely decrease MySQL's ability to provide adequate relevance values for the MATCH() function. If you really need to search for such common words, it would be better to search using IN BOOLEAN MODE instead, which does not observe the 50% threshold.

To change the operators used for boolean full-text searches, set the ft_boolean_syntax system variable. This variable can be changed while the server is running, but you must have the SUPER privilege to do so. No rebuilding of indexes is necessary in this case. See Section 5.1.4, “Server System Variables”, which describes the rules governing how to set this variable.

If you want to change the set of characters that are considered word characters, you can do so in several ways, as described in the following list. After making the modification, you must rebuild the indexes for each table that contains any FULLTEXT indexes. Suppose that you want to treat the hyphen character ('-') as a word character. Use one of these methods:

Modify the MySQL source: In myisam/ftdefs.h, see the true_word_char() and misc_word_char() macros. Add '-' to one of those macros and recompile MySQL.

Modify a character set file: This requires no recompilation. The true_word_char() macro uses a “character type” table to distinguish letters and numbers from other characters. . You can edit the contents of the <ctype><map> array in one of the character set XML files to specify that '-' is a “letter.” Then use the given character set for your FULLTEXT indexes. For information about the <ctype><map> array format, see Section 10.3.1, “Character Definition Arrays”.

Add a new collation for the character set used by the indexed columns, and alter the columns to use that collation. For general information about adding collations, see Section 10.4, “Adding a Collation to a Character Set”. For an example specific to full-text indexing, see Section 12.9.7, “Adding a Collation for Full-Text Indexing”.

If you modify full-text variables that affect indexing (ft_min_word_len, ft_max_word_len, or ft_stopword_file), or if you change the stopword file itself, you must rebuild your FULLTEXT indexes after making the changes and restarting the server. To rebuild the indexes in this case, it is sufficient to do a QUICK repair operation:

mysql> REPAIR TABLE tbl_name QUICK;
Alternatively, use ALTER TABLE with the DROP INDEX and ADD INDEX options to drop and re-create each FULLTEXT index. In some cases, this may be faster than a repair operation.

Each table that contains any FULLTEXT index must be repaired as just shown. Otherwise, queries for the table may yield incorrect results, and modifications to the table will cause the server to see the table as corrupt and in need of repair.

Note that if you use myisamchk to perform an operation that modifies table indexes (such as repair or analyze), the FULLTEXT indexes are rebuilt using the default full-text parameter values for minimum word length, maximum word length, and stopword file unless you specify otherwise. This can result in queries failing.

The problem occurs because these parameters are known only by the server. They are not stored in MyISAM index files. To avoid the problem if you have modified the minimum or maximum word length or stopword file values used by the server, specify the same ft_min_word_len, ft_max_word_len, and ft_stopword_file values for myisamchk that you use for mysqld. For example, if you have set the minimum word length to 3, you can repair a table with myisamchk like this:

shell> myisamchk --recover --ft_min_word_len=3 tbl_name.MYI
To ensure that myisamchk and the server use the same values for full-text parameters, place each one in both the [mysqld] and [myisamchk] sections of an option file:

[mysqld]
ft_min_word_len=3

[myisamchk]
ft_min_word_len=3
An alternative to using myisamchk for index modification is to use the REPAIR TABLE, ANALYZE TABLE, OPTIMIZE TABLE, or ALTER TABLE statements. These statements are performed by the server, which knows the proper full-text parameter values to use.

Previous / Next / Up / Table of Contents
User Comments
Posted by John Navratil on May 10 2007 2:58pm [Delete] [Edit]
How I added '-' to the list of word characters:

The documentation is weak in two regards: (1) it doesn't explain how to modify the map and (2) it doesn't touch on the implications of doing so. I'll try to solve (1), but cannot begin to speak to (2)

The charsets files exist at the location specified by the "character_sets_dir" system variable (use SHOW VARIABLES to see this) and is typically compiled in as "/usr/share/mysql/charsets". The name of the file is given by the "character_set_...' variables. Typically the default is "latin1". Thus the file I needed to change was /usr/share/mysql/charsets/latin1.xml

The <ctype><map> is the one we are after (other maps are "upper", "lower", "unicode" and the various collation maps).

The "ctype" map differs from the others in that is has a leading 0x00 before the character map, the meaning of which is unclear to me. Each entry of the map appears to classify the corresponding character according to the following bitmask:

0x01 Upper-case word character
0x02 Lower-case word character
0x04 Decimal digit
0x08 Printer control (Space/TAB/VT/FF/CR)
0x10 Not-white, not a word
0x20 Control-char (0x00 - 0x1F)
0x40 Space
0x80 Hex digit (0-9, a-f, A-F)

In my case, I needed the dash '-', but nothing else, so I altered the corresponding character position (0x2D - third row, third from the right) from 0x10 (Not-white, not a word) to 0x01 (Upper-case word).

There is little on the web to address this, but some commentary in the forums suggested that this was NOT the way to do this, but rather to write ones own full-text engine as the changing of the <ctype> map has implications for the SQL parser. This may be true, but I suspect SQL parsing would require a stricter classification of characters. The SQL statement "SELECT a-b FROM test" worked for me after this change.

Altering latin1.xml and restarting the server had the desired result.

Finally, there does not appear to be a way to create a new character set or collation without recompiling. If this is true, it might be desirable for the standard distribution to include a "custom" character set for just this sort of thing.

Posted by Sebastien Salou on July 4 2007 2:20pm [Delete] [Edit]
Based on your example with the dash `-`, I had a look to make the single quote `'` (which is a word character by default), a non word character.
Thus,
I had a look on a ascii table, the single quote is corresponding to the hexadecimal value 27.
I opened the file share/mysql/charsets/latin1.xml, I went to the upper map (0x27 is actually on the 3rd rows, 8th col from the left).
I went to this position in the ctype map, and surprised !!! This character is already set to 0x10 Not-white, not a word whereas it is a word character during tests !

From there, I'm pretty lost. Why the single quote is not detected as a non word as it should be ?

Modifying the mysql source in myisam/ftdefs.h works. 
I modified the line #define misc_word_char(X) ((X)=='\'') 
Is it the only way ?

Sebastien Salou

Posted by Scott Noyes on November 19 2009 2:31pm  [Delete] [Edit]
John Navratil very nearly has it, but to get fulltext to treat characters as words, you also have to add a new collation. I've written it up at http://www.thenoyes.com/littlenoise/?p=91