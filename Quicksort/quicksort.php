<?php
function quicksortSimple(&$data)
{
  if (count($data) < 2) {
    return;
  }

  $pivotIndex = intval(count($data) / 2);
  $pivotValue = $data[$pivotIndex];

  $left = [];
  $right = [];

  $l = 0;
  $r = 0;

  for ($i = 0; $i < count($data); $i++) {
    if ($i == $pivotIndex) {
      continue;
    }
    $val = $data[$i];
    if ($val < $pivotValue) {
      $left[$l++] = $val;
    } else {
      $right[$r++] = $val;
    }
  }

  quicksortSimple($left);
  quicksortSimple($right);

  arraycopy($left, 0, $data, 0, count($left));
  $data[count($left)] = $pivotValue;
  arraycopy($right, 0, $data,count($left) - 1, count($right));
}
 
function arraycopy($src, $startSrc, &$target, $startTarget, $length)
{

}

// quick sort with 3-way partitioningd
function quicksort3way($data, $lo, $hi) 
{
  $v = $data[$lo];
  $lt = $lo;
  $gt = $hi;
  $i = $lo + 1;
  while ($i <= $gt) {
    if ($data[$i] < $v) {
      swap($data, $i++, $lt++);
    } else if ($data[$i] < $v) {
      swap($data, $i, $gt--);
    } else {
      $i++;
    }
  }
  sort($data, $lo, $lt - 1);
  sort($data, $gt + 1, $hi);
}

function swap(&$data, $i, $j)
{
  $temp = $data[$i];
  $data[$i] = $data[$j];
  $data[$j] = $temp;
} 