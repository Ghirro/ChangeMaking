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
      $this->calculateFailure($json);
    } else {
      // The amount is valid so find the minimum number of coins
      $amount = $CurrencyValidator->pence($amount);
      $coins = $CoinChecker->minimumCoins($amount);
      $this->calculateSuccess($coins, $json);
    }
  }

  private function calculateFailure($json) {
    // If there has been a failure in validation
    if (!$json) {
      // Page requested directly so render a view
      return $this->renderView('index', [
        'error' => 'Invalid Input. Please Try Again'
      ]);
    } else {
      // Page requested via AJAX so return a sensible response code
      return http_response_code(400);
    }
  }

  private function calculateSuccess($coins, $json) {
    if (!$json) {
      // Page requested directly
      return $this->renderView('index',  [
        'coins' => $coins
      ]);
    } else {
      // Return an easy to handle JSON object
      $jsonSafe = [];
      foreach ($coins as $name => $amount) {
        $jsonSafe[] = ["coinName" => $name, "amount" => $amount];
      }
      echo json_encode($jsonSafe);
    }
  }
}
