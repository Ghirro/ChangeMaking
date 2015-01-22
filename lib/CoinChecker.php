<?php


/**
 * CoinChecker is used to return the minimum number of coins required to make up
 * a currency amount. Currently only supports some GBP coins.
 */
class CoinChecker {

  // The allowed coins
  private static $availableCoins = [
    "1p" => 1,
    "2p" => 2,
    "20p" => 20,
    "50p" => 50,
    "£1" => 100,
    "£2" => 200
  ];


  /**
   * getCoins - Get the minimum number of CoinChecker::$availableCoins that can make up $amount
   *
   * @param  {Integer} $amount Amount in pence
   * @return {Array}         An array of coins in the form [20, 20, 1, 2, 100...]
   */
  private function getCoins( $amount ) {
    $coins = [];
    $stillToCalc = $amount;

    while ($stillToCalc>0) {

      // Get only the coins we can use (greedy algorithm)
      $viableCoins = array_filter(self::$availableCoins, function ($coin) use ($stillToCalc) {
        return $coin <= $stillToCalc;
      });

      // Get the highest of the coins and add it to the ones we're using
      asort($viableCoins);
      $selectedCoin = array_pop($viableCoins);
      array_push($coins, $selectedCoin);

      $stillToCalc -= $selectedCoin;
    }

    return $coins;
  }


  /**
   * minimumCoins - Returns a friendly array of the minimum number of CoinChecker::$availableCoins used to make $amount
   *
   * @param  {Integer} $amount Amount in pence
   * @return {Array}         Array in the form ["20p" => 2, "2p" => 8...]
   */
  public function minimumCoins($amount) {
    $coins = $this->getCoins($amount);
    $friendlyAmounts = [];

    // Combine the coin list into an easy to parse array
    foreach ($coins as $coin) {
      $coinName = array_flip(self::$availableCoins)[$coin];
      if ( isset($friendlyAmounts[$coinName]) ) {
        $friendlyAmounts[$coinName]++;
      } else {
        $friendlyAmounts[$coinName] = 1;
      }
    }

    // We want the highest value coins to be listed first
    uksort($friendlyAmounts, function ($a, $b) {
      return (self::$availableCoins[$a] < self::$availableCoins[$b]) ? 1 : -1;
    });

    return $friendlyAmounts;
  }
}
