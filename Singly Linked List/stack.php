<?php
// Linked List Nodes
class Node 
{
  // Element
  public $next;
  public $data;
}

class Stack 
{
  private $head;

  public function __constructor($node)
  {
    if ($node) {
      $this->head = $node;
    }
  }

  public function push($node) 
  {
    if (is_null($this->head)) {
      $this->head = $node;
    } else {
      $node->next = $this->head;
      $this->head = $node;
    }
  }

  public function pop()
  {
    if (is_null($this->head)) {
      return null;
    } 
    $node = $this->head;
    $this->head = $this->head->next;
    return $node;
  }
}
