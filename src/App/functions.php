<?php

declare(strict_types=1);

function dd(mixed $value, string $source = '')
{
  echo '<pre>';
  var_dump($value);
  echo '</pre>';
  echo '<br>';
  echo $source;
  die();
}

function e(mixed $value): string
{
  return htmlspecialchars((string) $value);
}
