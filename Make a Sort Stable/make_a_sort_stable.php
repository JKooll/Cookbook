<?php
function sortEmployeesStable($employees)
{
  for ($i = 0; $i < count($employees); $i++) {
    $employees->sequence = $i;
  }

  usort($employees, function ($a, $b) {
    $ret = strcasecmp($a->surname, $b->surname);
    
    if (!$ret) {
      $ret = $a->sequence - $b->sequence;
    }

    return $ret;
  });
}