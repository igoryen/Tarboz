<?php

//====== DEBUGGING TABLE====================================================
function table_to_see_entry_values($dad, $array_of_kids, $verbatim) {
 echo "<div style='background-color:white; width: 700px;'>";
$d = '';

$d .= "<table class=\'debug_table\'>";
$d .= '<tr><td>$verbatim</td><td>' . $verbatim . '</td></tr>';
$d .= '<tr><td>isset($dad)</td><td>'
        . (isset($dad) ? '1 (set)' : '0 (not set)') . '</td></tr>';

$d .= '<tr><td>!is_null($dad)</td><td>'
        . (!is_null($dad) ? '1 (not null)' : '0 (null)') . '</td></tr>';

$dad_ary = (array) $dad;
$d .= '<tr><td>!empty($dad_ary)</td><td>'
        . (!empty($dad_ary) ? '1 (not empty)' : '0 (empty)') . '</td></tr>';

$properties_of_dad = array_filter(get_object_vars($dad));
$d .= '<tr><td>!empty($properties_of_dad)</td><td>'
        . (!empty($properties_of_dad) ? '1 (not empty)' : '0 (empty)') . '</td></tr>';

$d .= '<tr><td>!null == $dad->getEntryLanguage()</td><td>'
        . (!null == $dad->getEntryLanguage() ? '1 (not null)' : '0 (null)') . '</td></tr>';

$d .= '<tr><td>!null == $dad->getEntryText()</td><td>'
        . (!null == $dad->getEntryText() ? '1 (not null)' : '0 (null)') . '</td></tr>';
$d .= '<tr><td>$dad->getEntryText()</td><td>'
        . substr($dad->getEntryText(), 0, 25) . '</td></tr>';

$d .= '<tr><td>sizeof($kids_array)</td><td>'
        . sizeof($array_of_kids) . '</td></tr>';

$d .= '<tr><td>count($kids_array)</td><td>'
        . count($array_of_kids) . '</td></tr>';

$d .= '<tr><td>!null == reset($array_of_kids)->getEntryLanguage()</td><td>'
        . (!null == reset($array_of_kids)->getEntryLanguage() ? '1 (not null)' : '0 (null)') . '</td></tr>';
$d .= '<tr><td>reset($array_of_kids)->getEntryLanguage()</td><td>'
        . reset($array_of_kids)->getEntryLanguage() . '</td></tr>';
$d .= '<tr><td>reset($array_of_kids)->getEntryText()</td><td>'
        . reset($array_of_kids)->getEntryText() . '</td></tr>';
$d .= '<tr><td>!null == end($array_of_kids)->getEntryLanguage()</td><td>'
        . (!null == end($array_of_kids)->getEntryLanguage() ? '1 (not null)' : '0 (null, empty, corpse)') . '</td></tr>';
$d .= '<tr><td>end($array_of_kids)->getEntryLanguage()</td><td>'
        . end($array_of_kids)->getEntryLanguage() . '</td></tr>';
$d .= '<tr><td>end($array_of_kids)->getEntryText()</td><td>'
        . end($array_of_kids)->getEntryText() . '</td></tr>';
//.................................................................
// remove a null object from the array
// loop through the whole array
foreach ($array_of_kids as $kid) {
  // if an element is null
  if (null == $kid) {
    echo 'null element';
    // remove it
    unset($kid);
  }
}
//.................................................................

//$array_of_kids = array_filter($array_of_kids);

$d .= '<tr><td>removed null object from array</td><td></td></tr>';
$d .= '<tr><td>sizeof($kids_array)</td><td>'
        . sizeof($array_of_kids) . '</td></tr>';

$d .= '<tr><td>count($kids_array)</td><td>'
        . count($array_of_kids) . '</td></tr>';
$d .= '<tr><td>end($array_of_kids)->getEntryLanguage()</td><td>'
        . end($array_of_kids)->getEntryLanguage() . '</td></tr>';
$d .= '<tr><td>end($array_of_kids)->getEntryText()</td><td>'
        . end($array_of_kids)->getEntryText() . '</td></tr>';

$d .= '</table>';
echo $d;
echo "</div>";
}

