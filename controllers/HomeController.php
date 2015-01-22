<?php

class HomeController extends Controller {
  public function index() {
    $this->renderView('index', []);
  }
  public function calculate() {
    $CurrencyValidator = new CurrencyValidator();
    $CoinChecker = new CoinChecker();
    $amount = $_POST['amount'];

    if (!$CurrencyValidator->validate($amount)) {
      return $this->renderView('index', [
        'error' => 'Invalid Input. Please Try Again'
      ]);
    } else {
      $amount = $CurrencyValidator->pence($amount);
      return $this->renderView('index',  [
        'coins' => $CoinChecker->minimumCoins($amount)
      ]);
    }
  }
}
