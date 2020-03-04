<?php
class TelephoneNumber 
{
  const PHONE_NUMBER_LENGTH = 7;
  private $phoneNum;
  private $result;

  public function __constructor($n)
  {
    $this->phoneNum = $n;
  }

  public function printWords($curDigit = 0)
  {
    if ($curDigit == self::PHONE_NUMBER_LENGTH) {
      echo implode($this->result);
      return;
    }
    for ($i = 1; $i <= 3; $i++) {
      $this->result[$curDigit] = $this->getCharKey($this->phoneNum[$curDigit], $i);
      $this->printWords($curDigit + 1);
      if ($this->phoneNum[$curDigit] == 0 || $this->phoneNum[$curDigit] == 1) {
        return;
      }
    }
  }

  public function getCharKey($telephoneKey, $place)
  {

  }
}

// 非迭代版本
class TelephoneNumberInter 
{
  const PHONE_NUMBER_LENGTH = 7;
  private $phoneNum;
  private $result;

  public function __construct($n)
  {
    $this->phoneNum = $n;
  }

  public function printWords()
  {
    for ($i = 0; $i < self::PHONE_NUMBER_LENGTH; $i++) {
      $result[$i] = getCharKey($this->phoneNum[$i], 1);
    }

    while (true) {
      echo implode($this->result);

      for ($i = self::PHONE_NUMBER_LENGTH - 1; $i >= -1; --$i) {
        if ($i == -1) {
          return;
        }
        if (getCharKey($this->phoneNum[$i], 3) == $result[$i] || 
          $this->phoneNum[$i] == 0 || 
          $this->phoneNum[$i] == 1) {
            $this->result[$i] = getCharKey($this->phoneNum[$i], 1);
          } else if (getCharKey($this->phoneNum[$i], 1) == $result[$i]) {
            $result[$i] = getCharKey($this->phoneNum[$i], 2);
            break;
          } else if (getCharKey($this->phoneNum[$i], 2) == $result[$i]) {
            $result[$i] = getCharKey($this->phoneNum[$i], 3);
            break;
          }
      }
    }
  }
}