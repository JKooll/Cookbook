<?php
use SequentialSearchST;

class SeparateCahiningHashST
{
  private $n; // number of key-value pairs
  private $m; // hash table size
  private $st; // array of sequential search objects

  public function __construct($m = 997)
  {
    $this->m = $m;
    $st = [];
    for ($i = 0; $i < $m; $i++) {
      $this->st[$i] = new SequentialSearchST();
    }
  }

  private function hash($key)
  {
    return base_convert(md5($key),16, 10) % $this->m;
  }

  public function get($key)
  {
    return $this->st[$this->hash($key)]->get($key);
  }

  public function put($key, $val)
  {
    $this->st[$this->hash($key)]->put($key, $val);
  }

  public function keys()
  {
    
  }
}