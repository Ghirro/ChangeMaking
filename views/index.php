<!DOCTYPE html>
<html>
  <head>
    <title>Coin Calculator</title>
    <meta charset="UTF-8" />
    <link href="public/css/default.css" rel="stylesheet" type="text/css" />
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <link href="bower_components/bootstrap/dist/css/bootstrap.css" rel="stylesheet" type="text/css" />
    <link href="bower_components/bootstrap/dist/css/bootstrap-theme.css" rel="stylesheet" type="text/css" />
    <script src="bower_components/jquery/dist/jquery.min.js"></script>
    <script src="bower_components/bootstrap/js/modal.js"></script>

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

      <div id="result-area" class="col-sm-4 col-md-3 col-xs-12">
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

      <div class="modal fade" id="result-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title">Result</h4>
            </div>
            <div class="modal-body" id="body-area">
              <img src="public/img/loading.gif" />
              <div id="result-list">
                <strong>You will need:</strong>
                <ul>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>


    </div>
  </body>
</html>

