<?php
class Node
{
  private $left;
  private $right;
  private $value;

  public function __constructor($left, $right, $value)
  {
    $this->left = $left;
    $this->right = $right;
    $this->value = $value;
  }

  public function getLeft() 
  {
    return $this->left;
  }

  public function getRight() 
  {
    return $this->right;
  }
}