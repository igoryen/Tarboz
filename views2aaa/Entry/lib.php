<?php

//====== DEBUGGING TABLE====================================================
function table_to_see_entry_values($entry) {
  echo "<div style='background-color:white; width: 700px;'>";
  $d = '';
  $d .= "<table class=\'debug_table\'>";
  
  $d .= '<tr><td>isset($entry)</td><td>'
          . (isset($entry) ? '1 (set)' : '0 (not set)') . '</td></tr>';

  $d .= '<tr><td>!is_null($entry)</td><td>'
          . (!is_null($entry) ? '1 (not null)' : '0 (null)') . '</td></tr>';

  $entry_ary = (array) $entry;
  $d .= '<tr><td>!empty($entry_ary)</td><td>'
          . (!empty($entry_ary) ? '1 (not empty)' : '0 (empty)') . '</td></tr>';

  $properties_of_entry = array_filter(get_object_vars($entry));
  $d .= '<tr><td>!empty($properties_of_entry)</td><td>'
          . (!empty($properties_of_entry) ? '1 (not empty)' : '0 (empty)') . '</td></tr>';
 
  $d .= '<tr><td>!null == $entry->getEntryId()</td><td>'
          . (!null == $entry->getEntryId() ? '1 (not null)' : '0 (null)') . '</td></tr>';
  
  $d .= '<tr><td>$entryId</td><td>' . $entry->getEntryId() . '</td></tr>';
  $d .= '<tr><td>$entry->getEntryId()</td><td>'
          . substr($entry->getEntryId(), 0, 2) . '</td></tr>';
  $d .= '<tr><td>!null == $entry->getEntryText()</td><td>'
          . (!null == $entry->getEntryText() ? '1 (not null)' : '0 (null)') . '</td></tr>';

  

  $d .= '<tr><td>$entry->getEntryText()</td><td>'
          . substr($entry->getEntryText(), 0, 25) . '</td></tr>';

  $d .= '</table>';
  echo $d;
  echo "</div>";
}

// ======== END OF DEBUGGING TABLE ==========================================


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

function table_to_see_query_values($query){
  
  echo "<div style='background-color:white; width: 700px;'>";
  $e = $query;
  echo $e;
  echo "</div>";
}
