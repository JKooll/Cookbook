<?php
function findMToLastElement($head, $m)
{
  if (!$head) {
    return null;
  }

  $current = $head;
  for ($i = 0; $i < $m; $i++) {
    if ($current->next) {
      $current = $current->next;
    } else {
      return null;
    }
  }

  $behind = $head;
  while ($current->next) {
    $current = $current->next;
    $behind = $behind->next;
  }

  return $behind;
}