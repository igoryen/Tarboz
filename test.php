<?php
$random_text="abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789@.()";
$substr = substr(str_shuffle($random_text),0,10);

echo   $substr."<br>";


echo getUserIP();

$tags = get_meta_tags('http://www.geobytes.com/IpLocator.htm?GetLocation&template=php3.txt&IpAddress='.getUserIP());

echo var_dump($tags);
print $tags['city'];  // city name
print $tags['country'];
print $tags['region'];


?>