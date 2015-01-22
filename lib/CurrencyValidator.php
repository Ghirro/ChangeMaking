<?php

class CurrencyValidator {
  public function validate($input) {
    return $this->hasDigitTest($input) && $this->emptyTest($input) && $this->nonNumericTest($input);
  }

  public function pence($value) {
    if (!$this->validate($value)) {
      return false;
    }
    $newValue = $value;
    $newValue = $this->stripSymbols($newValue);
    if (strpos($newValue, '.') !== FALSE) {
      $newValue = floatval($newValue)*100;
    } elseif (strpos($value, '£') !== FALSE ) {
      $newValue = intval($newValue)*100;
    } else {
      $newValue = intval($newValue);
    }
    return intval($newValue);
  }

  private function stripSymbols($value) {
    return preg_replace('[£|p]', '', $value);
  }

  private function hasDigitTest($value) {
    $hasDigitTest = '/\d/';
    return preg_match($hasDigitTest, $value);
  }

  private function emptyTest($value) {
    $emptyTest = '/^\s*$/';
    return !preg_match($emptyTest, $value);
  }

  private function nonNumericTest($value) {
    $nonNumericTest = '/(?![£p])[a-zA-Z]/';
    return !preg_match($nonNumericTest, $value);
  }
}
