<?php
/**
 * 递归方法
 */
function binarySearch($array, $target)
{
  return search($array, $target, 0, count($array) - 1);
}

function search($array, $target, $lower, $upper)
{
  $range = $upper - $lower;
  if ($range < 0) {
    return -1;
  }
  $center = intval($range / 2) + $lower;
  if ($target == $array[$center]) {
    return $center;
  } else if ($target < $array[$center]) {
    return search($array, $target, $lower, $center - 1);
  } else {
    return search($array, $target, $center + 1, $upper);
  }
}

/**
 * 迭代方法
 */
function iterBinarySearch($array, $target)
{
  $lower = 0;
  $upper = count($array) - 1;
  while (true) {
    $range = $upper - $lower;
    if ($range < 0) {
      return -1;
    }
    $center = intval($range / 2) + $lower;
    if ($target == $array[$center]) {
      return $center;
    } else if ($target < $array[$center]) {
      $upper = $center - 1;
    } else {
      $lower = $center + 1; 
    }
  }
}