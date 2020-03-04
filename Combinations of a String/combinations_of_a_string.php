<?php
class Combinations 
{
  private $out;
  private $in;

  public function __constructor($str)
  {
    $this->in = $str;
  }

  public function combine($start = 0)
  {
    for($i = $start; $i < strlen($this->in); ++$i) {
      $this->out[] = $this->in[$i];
      echo $this->out;
      if ($i < strlen($this->in)) {
        $this->combine($i + 1);
      }
      $this->out = array_splice($this->out, 0, count($this->out) - 1);
    }
  }
}