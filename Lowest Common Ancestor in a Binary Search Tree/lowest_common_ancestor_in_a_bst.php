<?php
function findLowestCommonAncestor($root, $value1, $value2) 
{
  while (!is_null($root)) {
    $value = $root->getValue();

    if ($value > $value1 && $value > $value2) {
      $root = $root->getLeft();
    } else if ($value < $value1 && $value < $value2) {
      $root = $root->getRight();
    } else {
      return $root;
    }
  }

  return null;
} 