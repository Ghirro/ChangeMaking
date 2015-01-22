<?php

class CoinChecker {
  private static $availableCoins = [
    "1p" => 1,
    "2p" => 2,
    "20p" => 20,
    "50p" => 50,
    "£1" => 100,
    "£2" => 200
  ];

  private function getCoins( $amount ) {
    $coins = [];
    $stillToCalc = $amount;

    while ($stillToCalc>0) {
      $viableCoins = array_filter(self::$availableCoins, function ($coin) use ($stillToCalc) {
        return $coin <= $stillToCalc;
      });

      asort($viableCoins);
      $selectedCoin = array_pop($viableCoins);
      array_push($coins, $selectedCoin);

      $stillToCalc -= $selectedCoin;
    }
    return $coins;
  }

  public function minimumCoins($amount) {
    $coins = $this->getCoins($amount);
    $friendlyAmounts = [];
    foreach ($coins as $coin) {
      $coinName = array_flip(self::$availableCoins)[$coin];
      if ( isset($friendlyAmounts[$coinName]) ) {
        $friendlyAmounts[$coinName]++;
      } else {
        $friendlyAmounts[$coinName] = 1;
      }
    }

    uksort($friendlyAmounts, function ($a, $b) {
      return (self::$availableCoins[$a] < self::$availableCoins[$b]) ? 1 : -1;
    });

    return $friendlyAmounts;
  }
}

