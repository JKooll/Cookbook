<?php
function firstNonRepeated($str)
{
  $charHash = [];
  foreach(str_split($str) as $c) {
    if (!$charHash[$c]) {
      $charHash[$c] = 1;
    } else {
      $charHash[$c]++;
    }
  }
  foreach($charHash as $c => $count) {
    if ($count == 1) {
      return $c;
    }
  }
  return null;
}

echo firstNonRepeated("aabc");