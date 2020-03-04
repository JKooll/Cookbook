<?php
function rotateRight($oldRoot)
{
  $newRoot = $oldRoot->getLeft();
  $oldRoot->setLeft($newRoot->getRight());
  $newRoot->setRight($oldRoot);
  return $newRoot;
}