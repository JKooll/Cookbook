<?php
function flattenList($head, $tail)
{
  $curNode = $head;
  while ($curNode) {
    if ($curNode->child) {
      append($curNode->child, $tail);
    }
    $curNode = $curNode->next;
  } 
}

function append($child, $tail) 
{
  $tail->next = $child;
  $child->prev = $tail;
  for ($curNode = $child; $curNode->next; $curNode = $curNode->next)
    ;
  $tail = $curNode;
}