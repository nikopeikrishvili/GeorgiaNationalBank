<?php

require 'Currencies.php';
require 'Money.php';
require 'CalculationTrait.php';
require 'SourceFields.php';
require 'SourceConfig.php';
require 'SourceInterface.php';
require 'Sources.php';
require 'SoapSource.php';
require 'RssSource.php';
require 'NBRate.php';

$data = NBRate::getDataSource();

//$rate = $data->getRate(Currencies::_USD);
//echo $rate."\n";
//$crossRate = $data->getCrossRate(Currencies::_RUB, Currencies::_USD);
//echo $crossRate."\n";
$money = new Money();
$money->fromCurrency = Currencies::_GEL;
$money->toCurrency = Currencies::_USD;
$money->amount = 1;

print_r($data->calculateAmount($money));
