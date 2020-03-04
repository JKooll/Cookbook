<?php
function insertionSort($data)
{
  for($which = 1; $which < count($data); $which++) {
    for ($i = $which; $i > 0; $i--) {
      if ($data[$i] < $data[$i - 1]) {
        $temp = $data[$i];
        $data[$i] = $data[$i - 1];
        $data[$i - 1] = $temp;
      } else {
        break;
      }
    }
  }
}