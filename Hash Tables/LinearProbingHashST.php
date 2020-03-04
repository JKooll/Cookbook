<?php
class LinearProbingHashingST
{
  private $n; // number of key-value pairs in the table
  private $m = 16; // size of linear-probing table
  private $keys;
  private $vals;

  public function __construct()
  {
    $keys = [];
    $vals = [];
  }

  private function resize()
  {

  }

  private function hash($key)
  {
    return base_convert(md5($key), 16, 10) % $this->m;
  }

  public function put($key, $val)
  {
    if ($this->n >= $this->m / 2) {
      $this->resize(2 * $this->m);
    }

    $i = $this->hash($key);
    while ($this->keys[$i] != null) {
      if ($this->keys[$i]->equals($key)) {
        $this->vals[$i] = $val;
        return;
      }
      $i = ($i + 1) % $this->m;
    }
    $keys[$i] = $key;
    $vals[$i] = $val;
    $this->n++;
  }

  public function get($key)
  {
    for ($i = $this->hash($key); $this->keys[$i] != null; $i = ($i + 1) % $this->m) {
      if ($this->keys[$i] == $key) {
        return $this->vals[$i];
      }
    }
  }

  public function delete($key)
  {
    if (!in_array($key, $this->keys)) {
      return;
    }
    $i = $this->hash($key);
    while ($key != $this->keys[$i]) {
      $i = ($i + 1) % $this->m;
    }
    $keys[$i] = null;
    $val[$i] = null;
    $i = ($i + 1) % $this->m;
    while ($this->keys[$i] != null) {
      $keyToRedo = $this->keys[$i];
      $valToRedo = $this->vals[$i];
      $this->keys[$i] = null;
      $this->val[$i] = null;
      $this->n--;
      $this->put($key, $val);
      $i = ($i + 1) % $this->m;
    }
    $this->n--;
    if ($this->n > 0 && $this->n == $this->m / 8) {
      $this->resize($this->m / 2)
    }
  }
}