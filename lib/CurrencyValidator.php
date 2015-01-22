<?php

/**
 * CurrencyValidator is used to check the validity of a currency amount
 * and then return the value as pence.
 */
class CurrencyValidator {

  /**
   * validate - Validates an input
   *
   * @param  {String} $input The attempted currency amount
   * @return {Boolean}
   */
  public function validate($input) {
    return $this->hasDigitTest($input) &&
           $this->emptyTest($input) &&
           $this->nonNumericTest($input);
  }


  /**
   * pence - Returns the pence amount (or false on failure) of a given input
   *
   * @param  {String} $value The attempted currency amount
   * @return {mixed}        False when the amount is invalid. Integer (in pence) of the amount when valid.
   */
  public function pence($value) {
    if (!$this->validate($value)) {
      return false;
    }
    $newValue = $value;

    // Get rid of the surrounding symbols
    $newValue = $this->stripSymbols($newValue);

    if (strpos($newValue, '.') !== FALSE) {

      // If there's a decimal point then we're working with pounds and pence
      $newValue = floatval($newValue)*100;

    } elseif (strpos($value, '£') !== FALSE ) {

      // If there's a pound symbol and no decimal point then it's just pounds
      $newValue = intval($newValue)*100;

    } else {

      // No decimal pound and no pounds means it's just pence
      $newValue = intval($newValue);

    }

    // Make sure that we're returning an integer (rather than 100.00)
    // It wouldn't break anything but it's just good form
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

    // The Non-Numeric test will check for the presence of any characters that aren't £p or digits
    $nonNumericTest = '/(?![£p\.0-9])./';
    return !preg_match($nonNumericTest, $value);
  }
}
