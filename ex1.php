<?php

$a = 1;

for ($i = 1; $i <= 10; $i++) {

  echo "<br> | ";

  for ($a = 1; $a <= 10; $a++) {
    echo "$i x $a  =" . $a * $i . " | ";
  }
}
