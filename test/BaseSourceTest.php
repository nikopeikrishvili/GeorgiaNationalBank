<?php

/**
 * Description of BaseSourceTest
 *
 * @author Niko Peikrishvili
 */
class FakeSource extends \GeorgiaNationalBank\sources\BaseSource
{
    public function getRate($currency)
    {
        
       
        if ($this->isInlocal($currency))
        {
            return $this->getFromLocal($currency);
        } else
        {
            $rate = rand(1,1000);
            $this->addToLocal($currency, $rate);
           
            return $rate;
        }
    }
}
class BaseSourceTest extends PHPUnit_Framework_TestCase
{
    private $source;
    public function setUp()
    {
        parent::setUp();
        
        $this->source = new FakeSource();
        
    }
    
    /**
     * @test
     */
    public function testThatCurrencyIsntInlocalArrayAtFirstTime()
    {
        
        $rate = $this->source->getRate(GeorgiaNationalBank\Currencies::_USD);
        $this->assertTrue($this->source->isInlocal(GeorgiaNationalBank\Currencies::_USD));
    }
     /**
     * @test
     */
    public function testThatRemoteAndLocalRatesAreSame()
    {
        
        $rateRemote = $this->source->getRate(GeorgiaNationalBank\Currencies::_USD);
        $rateLocal = $this->source->getRate(GeorgiaNationalBank\Currencies::_USD);
        $this->assertEquals($rateLocal, $rateRemote);
    }
    public function testCrossRate()
    {

        $this->source->addToLocal(GeorgiaNationalBank\Currencies::_USD, 2.1473000);
        $this->source->addToLocal(GeorgiaNationalBank\Currencies::_RUB, 0.0325680);
        $gel_usd = $this->source->getRate(GeorgiaNationalBank\Currencies::_USD) / $this->source->currencyQuantity[GeorgiaNationalBank\Currencies::_USD];
        
        $gel_rub = $this->source->getRate(GeorgiaNationalBank\Currencies::_RUB) / $this->source->currencyQuantity[GeorgiaNationalBank\Currencies::_RUB];
        
      
        $money = new GeorgiaNationalBank\Money();
        $money->amount = 1;
        $money->fromCurrency = GeorgiaNationalBank\Currencies::_USD;
        $money->toCurrency = GeorgiaNationalBank\Currencies::_RUB;
        $mCrossRate = $this->source->getCrossRate($money->fromCurrency, $money->toCurrency);
        $crossRate = round($gel_usd/$gel_rub,7);
        $this->assertEquals($crossRate, $mCrossRate);
       
    }
    public function testCalclatedAmount()
    {
         $this->source->addToLocal(GeorgiaNationalBank\Currencies::_USD, 2.1473000);
        $this->source->addToLocal(GeorgiaNationalBank\Currencies::_RUB, 0.0325680);
        $gel_usd = $this->source->getRate(GeorgiaNationalBank\Currencies::_USD) / $this->source->currencyQuantity[GeorgiaNationalBank\Currencies::_USD];
        
        $gel_rub = $this->source->getRate(GeorgiaNationalBank\Currencies::_RUB) / $this->source->currencyQuantity[GeorgiaNationalBank\Currencies::_RUB];
        
      
        $money = new GeorgiaNationalBank\Money();
        $money->amount = 100;
        $money->fromCurrency = GeorgiaNationalBank\Currencies::_USD;
        $money->toCurrency = GeorgiaNationalBank\Currencies::_RUB;
        $result = $this->source->calculateAmount($money);
        $crossRate = round($gel_usd/$gel_rub,7);
        $this->assertInstanceOf('GeorgiaNationalBank\Money', $result);
        $this->assertEquals($money->generatedAmount, $money->amount*$crossRate);
       
    }
}
