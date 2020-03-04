<?php
class ActorGraphNode
{
  private $name;
  private $linkedActors;
  private $baconNumber = -1;
  
  public function __constructor($name)
  {
    $this->name = $name;
    $linkedActors = [];
  }

  public function getBaconNumber()
  {
    return $this->baconNumber;
  }

  public function setBaconNumbers()
  {
    if ($this->name != "Kevin Bacon") {
      throw new InvalidArgumentException("Called on " . $this->name);
    }
    $this->baconNumber = 0;
    $queue = new SplQueue();
    $queue->push($this);
    while (($current = $queue->shift()) != null) {
      foreach($current->linkedActors as $n) {
        if (-1 == $n->baconNumber) {
          $n->baconNumber = $current->baconNumber + 1;
          $queue->push($n);
        }
      }
    }
  }

  public function linkCostar($costar)
  {
    $this->linkedActors->add($costar);
    $costar->linkedActors->add($this);
  }
}