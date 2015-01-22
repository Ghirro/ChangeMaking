<?php

include 'lib/CurrencyValidator.php';

class CurrencyValidatorTest extends PHPUnit_Framework_TestCase {

  private $validAmounts = [
    '4' => 4,
    '85' => 85,
    '197p'=> 197,
    '2p' => 2,
    '1.87' => 187,
    '£1.23' => 123,
    '£2' => 200,
    '£10' => 1000,
    '£1.87p' => 187,
    '£1p' => 100,
    '£1.p' => 100,
    '001.41p' => 141,
    '4.235p' => 423,
    '£1.348484848484p' => 134,
    ];

  private $invalidAmounts = [
    '1x',
    '£1x.0p',
    '£p'
    ];

  public function testHasCorrectPositiveValidations() {
    $CV = new CurrencyValidator();
    foreach ($this->validAmounts as $amount => $expectedPenceValue) {
      $this->assertEquals(
        $CV->validate($amount),
        true
      );
    }
  }

  public function testHasCorrectNegativeValidations() {
    $CV = new CurrencyValidator();
    foreach ($this->invalidAmounts as $amount) {
      $this->assertEquals(
        $CV->validate($amount),
        false
      );
    }
  }

  public function testHasCorrectPenceConversions() {
    $CV = new CurrencyValidator();
    foreach ($this->validAmounts as $amount => $expectedPenceValue) {
      $this->assertEquals(
        $CV->pence($amount),
        $expectedPenceValue
      );
    }
  }
}
