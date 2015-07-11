<?php

require 'Currencies.php';
require 'CalculationTrait.php';
require 'SourceFields.php';
require 'SourceConfig.php';
require 'SourceInterface.php';
require 'Sources.php';
require 'SoapSource.php';
require 'RssSource.php';
require 'NBRate.php';

$data = NBRate::getDataSource();
print_r($data->getCrossRate(Currencies::_RUB, Currencies::_USD));

