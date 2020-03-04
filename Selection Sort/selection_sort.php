<?php
/**
 * 选择排序
 */

// ----- 递归版本 -----
function selectionSortRecursive($data, $start = 0)
{
  if ($start < count($data) - 1) {
    swap($data, $start, findMinimumIndex($data, $start));
    selectionSortRecursive($data, $start + 1);
  }
}

function findMinimumIndex($data, $start)
{
  $minPos = $start;

  for ($i = $start + 1; $i < count($data); $i++) {
    if ($data[$i] < $data[$minPos]) {
      $minPos = $i;
    }
  }
  return $minPos;
}

function swap(&$data, $index1, $index2)
{
  if ($index1 != $index2) {
    $tmp = $data[$index1];
    $data[$index1] = $data[$index2];
    $data[$index2] = $tmp;
  }
}


// ----- 迭代版本 ----

function selectionSort($data) 
{
  for ($i = 0; $i < count($data); $i++) {
    $min = $i;
    for ($j = $i + 1; $j < count($data); $j++) {
      if ($data[$j] < $data[$min]) {
        $min = $j;
      }
    }
    swap($data, $i, $j);
  }
}