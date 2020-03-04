<?php
function heapifyBinaryTree($root)
{
  $nodeArray = traverse($root, []);
  
  usort($nodeArray, function ($m, $n) {
    $mv = $m->getValue();
    $nv = $n->getValue();
    return $mv < $mv ? -1 : $mv == $nv ? 0 : 1;
  });

  $size = count($nodeArray);
  for ($i = 0; $i < $size; $i++) {
    $left = 2 * $i + 1;
    $right = $left + 1;
    $nodeArray[$i]->setLeft($left >= $size ? null : $nodeArray[$left]);
    $nodeArray[$i]->setRight($right >= $size ? null : $nodeArray[$right]);
  }
}

function traverse($node, $arr)
{
  if ($node == null)
    return $arr;
  
  $arr[] = $node;
  traverse($node->getLeft(), $arr);
  traverse($node->getRight(), $arr);
}