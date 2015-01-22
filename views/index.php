<!DOCTYPE html>
<html>
  <head>
    <title>Coin Calculator</title>
    <meta charset="UTF-8" />
    <link href="public/css/default.css" rel="stylesheet" type="text/css" />
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <link href="bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="bower_components/bootstrap/dist/css/bootstrap-theme.min.css" rel="stylesheet" type="text/css" />
    <script src="bower_components/jquery/dist/jquery.min.js"></script>
    <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <script src="public/js/index.js"></script>
  </head>
  <body>
    <div class="main-container row">
      <h1>Coin Calculator</h1>

      <div id="input-area" class="col-sm-4 col-sm-offset-2 col-md-3 col-md-offset-3 col-xs-12">
        <form action="index.php?action=calculate" method="POST">
          <div class="form-group">
            <label for="amount">Currency Amount</label>
            <p>Please input the GBP currency you'd like to work out the fewest number of coins required to make.</p>
            <input id="amount" name="amount" value="" placeholder="ex. £5.41" class="form-control"/>
          </div>
          <button class="btn btn-primary">Calculate</button>
        </form>
      </div>

      <? $this->renderView('partials/result_panel', ["coins" => $coins, "error" => $error]); ?>

      <? $this->renderView('partials/result_modal', []); ?>


    </div>
  </body>
</html>
