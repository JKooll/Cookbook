<?php
function preorderTraversal($root)
{
  if (!$root) return;
  $root->printValue();
  preorderTraversal($root->getLeft());
  preorderTraversal($root->getRight());
}

function inorderTraversal($root)
{
  if (!$root) return;
  inorderTraversal($root->getLeft());
  $root->printValue();
  inorderTraversal($root->getRight());
}

function postorderTraversal($root)
{
  if (!$root) return;
  postorderTraversal($root->getLeft());
  postorderTraversal($root->getRight());
  $root->printValue();
}

// preorder traversal no recursion
function preorderTraversalNoRecursion($root)
{
  $stack = [];
  array_push($stack, $root);
  while (!empty($stack)) {
    $curr = array_pop($stack);
    $curr->printValue();
    $n = $curr->getRight();
    if (!is_null($n)) array_push($stack, $n);
    $n = $curr->getLeft();
    if (!is_null($n)) array_push($stack, $n);
  }
}