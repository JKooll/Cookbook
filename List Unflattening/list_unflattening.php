<?php
function unflattenList($start, $tail)
{
  exploreAndSeparate($start);

  for ($curNode = $start; $curNode->next; $curNode = $curNode->next)
    ;
  
  $tail = $curNode;
}

function exploreAndSeparate($childListStart)
{
  $curNode = $childListStart;

  while ($curNode) {
    if ($curNode->child) {
      $curNode->child->prev->next = null;
      $curNode->child->prev = null;
      exploreAndSeparate($curNode->child);
    }
  }
}