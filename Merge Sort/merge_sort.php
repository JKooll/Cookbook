<?php
function mergeSortSimple($data)
{
  if (count($data) < 2) {
    return;
  }

  $mid = intval(count($data) / 2);
  arraycopy($data, 0, $left, 0, $mid);
  arraycopy($data, $mid, $right, 0, count($data) - $mid);

  mergeSortSimple($left);
  mergeSortSimple($right);

  merge($data, $left, $right);
}

function merge($dest, $left, $right)
{
  $dind = 0;
  $lind = 0;
  $rind = 0;

  while ($lind < count($left) && $rind < count($right)) {
    if ($left[$lind] <= $right[$rind]) {
      $dest[$dind++] = $left[$lind++];
    } else {
      $dest[$dind++] = $right[$rind++];
    }
  }

  while ($lind < count($left)) {
    $dest[$dind++] = $left[$lind++];
  }

  while ($rind < count($right)) {
    $dest[$dind++] = $right[$rind++];
  }
}

function arraycopy($src, $startSrc, &$target, $startTarget, $length)
{

}

/** 
 * Bottom-Top Up
 */
function merge_sort_bu($data)
{
   $n = count($data);
   for ($size = 1; $size < $n; $size *= 2) {
     for ($lo = 0; $lo < $n - $size; $lo += $size * 2) {
       merge($data, $lo, min($lo + $size * 2 - 1, $n - 1));
     }
   }
}