<?php

require_once __DIR__ . '/../vendor/autoload.php';

/**
 * Description of BaseTest
 *
 * @author Niko Peikrishvili
 */
class BaseTest extends PHPUnit_Framework_TestCase
{

    /**
     * @test
     */
    public function testBase()
    {
        $data = CBGeo\NBRate::getDataSource();


        
        $rate = $data->getRate(\CBGeo\Currencies::_USD);
        echo $rate . "\n";

        $crossRate = $data->getCrossRate(\CBGeo\Currencies::_RUB, \CBGeo\Currencies::_USD);
        echo $crossRate . "\n";

        $money = new \CBGeo\Money();
        $money->fromCurrency = \CBGeo\Currencies::_GEL;
        $money->toCurrency = \CBGeo\Currencies::_USD;
        $money->amount = 1;

        $amount = $data->calculateAmount($money);
    }

}
