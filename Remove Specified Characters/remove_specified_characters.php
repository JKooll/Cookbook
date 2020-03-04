<?php
function removeChars($str, $remove)
{
  $remove_arr = str_split($remove);
  $str_arr = str_split($str);
  $dst = 0;
  for ($src = 0; $src < count($str_arr); $src++) {
    $c = $str_arr[$src];
    if (!in_array($c, $remove_arr)) {
      $str_arr[$dst++] = $c;
    }
  }
  return implode(array_slice($str_arr, 0, $dst));
}

echo removeChars("Battle of the Vowels: Hawaii vs. Grozny", "aeiou");