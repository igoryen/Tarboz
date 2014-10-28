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
