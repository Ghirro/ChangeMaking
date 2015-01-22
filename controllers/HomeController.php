<?php

class HomeController extends Controller {
  public function index() {
    $this->renderView('index', []);
  }
  public function calculate() {
    $CurrencyValidator = new CurrencyValidator();
    $CoinChecker = new CoinChecker();
    $amount = $_POST['amount'];
    $json = $_POST['ajax'];

    if (!$CurrencyValidator->validate($amount)) {
      if (!$json) {
        return $this->renderView('index', [
          'error' => 'Invalid Input. Please Try Again'
        ]);
      } else {
        return http_response_code(400);
      }
    } else {
      $amount = $CurrencyValidator->pence($amount);
      $coins = $CoinChecker->minimumCoins($amount);

      if (!$json) {
        return $this->renderView('index',  [
          'coins' => $coins
        ]);
      } else {
        $jsonSafe = [];
        foreach ($coins as $name => $amount) {
          $jsonSafe[] = ["coinName" => $name, "amount" => $amount];
        }
        echo json_encode($jsonSafe);
      }
    }
  }
}
