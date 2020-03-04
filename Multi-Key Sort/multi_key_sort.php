<?php
function sortEmployees($employees)
{
  usort($employees, function ($a, $b) {
    $ret = strcasecmp($a->surename, $b->surename);
    if (!$ret) {
      $ret = strcasecmp($a->givenname, $b->givenname);
    }
    return $ret;
  });
}