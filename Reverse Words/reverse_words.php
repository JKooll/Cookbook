<?php
function reverseWords($str)
{
  $words = explode(" ", $str);
  return implode(" ", array_reverse($words));
}

echo reverseWords("Do or do not, there is no try.");