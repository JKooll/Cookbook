<?php
define("RED", true);
define("BLACK", false);

class Node 
{
  public $key;
  public $val;
  public $left, $right;
  public $n;
  public $color;

  public function __construct($key, $val, $n, $color)
  {
    $this->key = $key;
    $this->val = $val;
    $this->n = $n;
    $this->color = $color;
  }
}

class ReadBlackBST
{
  /**
   * @type Node
   */
  private $root; 

  /**
   * @param x: Node
   */
  private function isRed($x)
  {
    if ($x == null) {
      return false;
    }
    return $x->color == RED;
  }

  private function size($x)
  {
    if ($x == null) {
      return 0;
    }

    return $x->n;
  }

  private function rotateLeft($h)
  {
    $x = $h->right;
    $h->right = $x->left;
    $x->left = $h;
    $x->color = $h->color;
    $h->color = RED;
    $x->n = $h->n;
    $h->n = 1 + $this->size($h->left) + $this->size($h->right);
    return $x;
  }

  private function rotateRight($h)
  {
    $x = $h->left;
    $h->left = $x->right;
    $x->right = $h;
    $x->color = $h->color;
    $h->color = RED;
    $x->n = $h->n;
    $h->n = 1 + $this->size($h->left) + $this->size($h->right);
    return $x;
  }

  private function flipColors($h)
  {
    $h->color = RED;
    $h->left->color = BLACK;
    $h->right->color = BLACK;
  }

  public function put($key, $val)
  {
    $root = $this->_put($this->root, $key, $val);
  }

  private function _put(Node $h, $key, $val)
  {
    if ($h == null) {
      return new Node($key, $val, 1, RED);
    }

    if ($key < $h->key) {
      $h->left = $this->_put($h->left, $key, $val);
    } else if ($key > $h->key) {
      $h->right = $this->_put($h->right, $key, $val);
    } else {
      $h->val = $val;
    }

    if ($this->isRed($h->right) && !$this->isRed($h->left)) {
      $h = $this->rotateLeft($h);
    }

    if ($this->isRed($h->left) && $this->isRed($h->left->left)) {
      $h = $this->rotateRight($h);
    }

    if ($this->isRed($h->left) && $this->isRed($h->right)) {
      $this->flipColors($h);
    }

    $h->n = $this->size($h->left) + $this->size($h->right) + 1;

    return $h;
  }
}