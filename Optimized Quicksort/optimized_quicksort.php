<?php
function quicksortSwapping($data, $start, $len)
{
  if ($len < 2) return;

  $pivotIndex = $start + intval($len / 2);

  $pivotValue = $data[$pivotIndex];
  $end = $start + $len;
  $curr = $start;

  swap($data, $pivotIndex, --$end);

  while ($curr <= $end) {
    while ($data[$curr] < $pivotValue) $curr++;

    while ($data[$end] > $pivotValue) $end--;

    if ($curr <= $end){
      swap($data, $curr, --$end);
    }
  }

  swap ($data, $end, $start + $len - 1);

  $llen = $end - $start;
  $rlen = $len - $llen - 1;

  if ($llen > 1) {
    quicksortSwapping($data, $start, $llen);
  }

  if ($rlen > 1) {
    quicksortSwapping($data, $end + 1, $rlen);
  }
}