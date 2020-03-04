<?php
// leetcode: 141. 环形链表 https://leetcode-cn.com/problems/linked-list-cycle/solution/huan-xing-lian-biao-by-leetcode/
function isCyclicList($head)
{
  if (!$head) {
    return false;
  }
  $slow = $head;
  $fast = $head->next;
  while (true) {
    if (!$fast || !$fast->next) {
      return false;
    } else if ($fast == $slow || $fast->next == $slow) {
      return true;
    } else {
      $slow = $slow->next;
      $fast = $fast->next->next;
    }
  }
}