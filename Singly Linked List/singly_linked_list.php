<?php
// Linked List Nodes
class Element 
{
  // Element
  public $next;
  public $data;

  public function __constructor($data) 
  {
    $this->data = $data;
  }
}

class SinglyLinkedList
{
  private $head;

  public function __constructor($node)
  {
    if ($node)
      $this->head = $node;
  }

  public function insert($node) {

  }

  public function delete($data) {
    
  }
}

