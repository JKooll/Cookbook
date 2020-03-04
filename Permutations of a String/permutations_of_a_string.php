<?php
class Permutations 
{
  private $used;
  private $out;
  private $in;

  public function __constructor($str)
  {
    $this->in = $str;
    $used = [];
  }

  public function permute() 
  {
    if (count($this->out) == strlen($this->in)) {
      echo implode($this->out);
      return;
    }
    for ($i = 0; $i < strlen($this->in); ++$i) {
      if ($this->used[$i]) continue;
      $this->out[] = $this->in[$i];
      $used[$i] = true;
      $this->permute;
      $this->used[$i] = false;
      $this->out = array_splice($this->out, 0, count($this->out) - 1);
    }
  }
}