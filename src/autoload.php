<?php
spl_autoload_register(function ($className) {
  $path = 'lib/' . $className . '.php';
  if (file_exists($path)) {
    include $path;
  }
});
spl_autoload_register(function ($className) {
  $path = 'controllers/' . $className . '.php';
  if (file_exists($path)) {
    include $path;
  }
});
