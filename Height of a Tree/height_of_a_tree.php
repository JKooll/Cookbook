<?php
function treeHeight($root) 
{
  if ($root == null) return 0;
  return 1 + max(
    treeHeight($root->getLeft()), 
    $root->getRight()
  );
}