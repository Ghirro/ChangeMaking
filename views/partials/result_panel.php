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
