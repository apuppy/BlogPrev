<?php
$date = new Datetime('2016-01-24 23:59:59');
$date1 = new Datetime('2017-01-24 23:59:58');
//compare
$bool = $date > $date1;
var_dump($bool);
//modify
$date->modify('+ 2 day');
var_dump($date);
//diff
$diff = $date->diff($date1);
var_dump($diff);
