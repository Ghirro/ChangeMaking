<?php

include 'lib/CoinChecker.php';

class CoinCheckerTest extends PHPUnit_Framework_TestCase {

  private $expected = [
    24 => [
      "20p" => 1,
      "2p" => 2
    ],
    129 => [
      "£1" => 1,
      "20p" => 1,
      "2p" => 4,
      "1p" => 1
    ],
    462 => [
      "£2" => 2,
      "50p" => 1,
      "2p" => 6
    ]
  ];

  public function testCoinsAreCorrect() {
    $CC = new CoinChecker();
    foreach ($this->expected as $amount => $expectedReturn) {
      $this->assertEquals(
        $CC->minimumCoins($amount),
        $expectedReturn
      );
    }
  }
}
