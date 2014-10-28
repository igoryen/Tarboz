<?php

function table_to_see_POST_values(){  

      echo "<div style='background-color:white; width: 700px;'>";
      $d = '';
      $d .= "<table class=\'debug_table\'>";
      $d .= '<tr><td>$id</td><td>' . $_POST['id'] . '</td></tr>';
      $d .= '<tr><td>$language</td><td>' . $_POST['language'] . '</td></tr>';
      $d .= '<tr><td>$text</td><td>' . $_POST['text'] . '</td></tr>';
      $d .= '<tr><td>$translit</td><td>' . $_POST['translit'] . '</td></tr>';
      $d .= '<tr><td>$authen</td><td>' . $_POST['authen'] . '</td></tr>';
      $d .= '<tr><td>$tags</td><td>' . $_POST['tags'] . '</td></tr>';
      $d .= '<tr><td>$author</td><td>' . $_POST['author'] . '</td></tr>';
      $d .= '<tr><td>$source</td><td>' . $_POST['source'] . '</td></tr>';
      $d .= '<tr><td>$use</td><td>' . $_POST['use'] . '</td></tr>';
      $d .= '<tr><td>$link</td><td>' . $_POST['link'] . '</td></tr>';
      $d .= '</table>';
      echo $d;
      echo "</div>";
}