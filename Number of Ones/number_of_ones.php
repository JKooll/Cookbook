<?php
function numOnesInBinary($number)
{
  $numOnes = 0;

  while($number != 0) {
    $number = $number & ($number - 1);
    $number++;
  }

  return $numOnes;
}