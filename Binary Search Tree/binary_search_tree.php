<?php
/**
 * 二叉搜索树：左节点的值小于等于父节点，右节点的值大于父节点
 */

class Node
{
  private $key;
  private $val;
  private $left;
  private $right;
  private $n;

  public function __construct($key, $val, $n)
  {
    $this->key = $key;
    $this->val = $val;
    $this->n = $n;
  }
}

class BST
{
  private $root;

  public function size($x)
  {
    if ($x == null) {
      return 0;
    } else {
      return $x->n;
    }
  }

  public function get($x, $key)
  {
    if ($x == null) {
      return null;
    }

    if ($key < $x->key) {
      return $this->get($x->left, $key);
    } else if ($key > $x->key) {
      return $this->get($x->right, $key);
    } else {
      return $x->val;
    }
  }

  public function put($x, $key, $val)
  {
    if ($x == null) {
      return new Node($key, $val, 1);
    }

    if ($key < $x->key) {
      $x->left = $this->put($x->left, $key, $val);
    } else if ($key > $x->key) {
      $x->right = $this->put($x->right, $key, $val);
    } else {
      $x->val = $val;
    }

    $x->n = $this->size($x->left) + $this->size($x->right) + 1;

    return $x;
  }

  /**
   * minimum node in tree x
   */
  public function min($x) 
  {
    if ($x == null || $x->left == null) {
      return $x;
    }
    return $this->min($x->left);
  }

  /**
   * maximum node in tree x
   */
  public function max($x)
  {
    if ($x == null || $x->right == null) {
      return $x;
    }
    return $this->max($x->right);
  }

  // 小于等于key的最大整数
  public function floor($x, $key)
  {
    if ($x == null) {
      return null;
    }
    if ($key == $x->key) {
      return $x;
    }
    if ($key < $x->key) {
      return $this->floor($x->left, $key);
    }
    $t = $this->floor($x->right, $key);
    if ($t != null) {
      return $t;
    } else {
      return $x;
    }
  }

  // 在根节点x下，rank k的元素，0下标开始
  // 参考：https://www.youtube.com/watch?v=CfNRc82ighw
  public function select($x, $k)
  {
    if ($x == null) {
      return null;
    }
    $t = $this->size($x->left);
    if ($t > $k) {
      return $this->select($x->left, $k);
    } else if ($t < $k) {
      return $this->select($x->right, $k - $t - 1);
    } else {
      return $x;
    }
  }

  // 根节点x，key是第几小的元素
  public function rank($key, $x)
  {
    if ($x == null) {
      return 0;
    }
    if ($key < $x->key) {
      return $this->rank($key, $x->left);
    } else if ($key > $x->key) {
      return 1 + $this->size($x->left) + $this->rank($key, $x->right);
    } else {
      return $this->size($x->left);
    }
  }

  private function deleteMin($x)
  {
    if ($x->left == null) {
      return $x->right;
    }
    $x->left = $this->deleteMin($x->left);
    $x->n = $this->size($x->left) + $this->size($x->right) + 1;
    return $x;
  }

  public function delete($key)
  {
    $this->root = $this->doDelete($this->root, $key);
  }

  private function doDelete($x, $key)
  {
    if ($x == null) {
      return null;
    }
    if ($key < $x->key) {
      $x->left = $this->doDelete($x->left, $key);
    } else if ($key > $x->key) {
      $x->right = $this->doDelete($x->right, $key);
    } else {
      if ($x->right == null) {
        return $x->left;
      }
      if ($x->left == null) {
        return $x->right;
      }
      $t = $x;
      $x = $this->min($t->right);
      $x->right = $this->deleteMin($t->right);
      $x->left = $t->left;
    }
    $x->n = $this->size($x->left) + $this->size($x->right) + 1;
  }

  // range searching in BSTs
  /**
   * get all keys in the tree
   */
  public function allKeys()
  {
    return $this->Keys($this->min($this->root), $this->max($this->root));
  }

  /**
   * get keys in range $lo...$hi
   * @param $lo: 最小值
   * @param $hi: 最大值
   */
  public function keys($lo, $hi)
  {
    $queue = [];
    $this->searchKeys($this->root, $queue, $lo, $hi);
    return $queue;
  }

  private function searchKeys($x, &$queue, $lo, $hi)
  {
    if ($x == null) {
      return;
    }
    if ($lo < $x->key) {
      $this->searchKeys($x->left, $queue, $lo, $hi);
    }
    if ($lo <= $x->key && $hi >= $x->key) {
      array_push($queue, $x);
    }
    if ($hi > $x->key) {
      $this->searchKeys($x->right ,$queue, $lo, $hi);
    }
  }
}