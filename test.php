<?php
$random_text="abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789@.()";
$substr = substr(str_shuffle($random_text),0,10);

echo   $substr;


?>