<?php
function strToInt($str)
{
  $isNeg = false;
  $chars = str_split($str);
  $i = 0;
  if ($chars[0] == '-') {
    $isNeg = true;
    $i = 1;
  }
  $len = count($chars);
  $num = 0;
  while ($i < $len) {
    $num *= 10;
    $num += $str[$i++] - '0';
  }
  if ($isNeg) {
    $num = -$num;
  }
  return $num;
}

function intToStr($num)
{
  $isNeg = false;
  if ($num < 0) {
    if ($num == PHP_INT_MIN) {
      return strval(PHP_INT_MIN);
    }
    $isNeg = true;
    $num = -$num;
  }
  $temp = [];
  do {
    $temp[] = $num % 10;
    $num = intval($num / 10);
  } while ($num != 0);
  if ($isNeg) {
    $temp[] = "-"; 
  }
  return implode(array_reverse($temp));
}

echo var_dump(strToInt("-10"));
echo var_dump(intToStr(-23));