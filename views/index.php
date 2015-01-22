<!DOCTYPE html>
<html>
  <head>
    <title>Coin Calculator</title>
    <meta charset="UTF-8" />
    <link href="public/css/default.css" rel="stylesheet" type="text/css" />
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <link href="bower_components/bootstrap/dist/css/bootstrap.css" rel="stylesheet" type="text/css" />
    <link href="bower_components/bootstrap/dist/css/bootstrap-theme.css" rel="stylesheet" type="text/css" />
  </head>
  <body>
    <div class="mainContainer row">
      <h1>Coin Calculator</h1>

      <div class="col-sm-4 col-sm-offset-2 col-md-3 col-md-offset-3 col-xs-12">
        <form action="index.php?action=calculate" method="POST">
          <div class="form-group">
            <label for="amount">Currency Amount</label>
            <p>Please input the GBP currency you'd like to work out the fewest number of coins required to make.</p>
            <input id="amount" name="amount" value="" placeholder="ex. £5.41" class="form-control"/>
          </div>
          <button class="btn btn-primary">Calculate</button>
        </form>
      </div>

      <div class="col-sm-4 col-md-3 col-xs-12">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title">Result</h3>
          </div>
          <div class="panel-body">
            <? if (isset($coins) ): ?>
              <strong>You will need:</strong>
              <ul>
                <? foreach ($coins as $coin => $number): ?>
                  <li><?=$number?> x <?=$coin?></li>
                <? endforeach; ?>
              </ul>
            <? elseif (isset($error)): ?>
              <p class="error"><?=$error?>
            <? else: ?>
              Please input an amount
            <? endif; ?>
          </div>
        </div>
      </div>


    </div>
  </body>
</html>

