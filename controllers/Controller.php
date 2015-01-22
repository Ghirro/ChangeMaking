<?php

abstract class Controller {
  public function renderView($view, $data) {
    extract($data);
    include(ROOT. '/views/' .$view.'.php');
  }
}
