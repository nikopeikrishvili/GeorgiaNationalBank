<?php
namespace GeorgiaNationalBank\sources;

/**
 * Description of BaseSource
 *
 * @author Niko Peikrishvili
 */
abstract class BaseSource 
{
   
    
    /**
     *
     * @var array - მონაცემები 
     */
    protected $data = array();
    /**
     *
     * @var int -  ერთეულები ეროვნულ ბანკში
     */
    public $currencyQuantity = array(
        "GEL" => 1,
        "AED" => 10,
        "AMD" => 1000,
        "AUD" => 1,
        "AZN" => 1,
        "BGN" => 1,
        "BRL" => 1,
        "BYR" => 10000,
        "CAD" => 1,
        "CHF" => 1,
        "CNY" => 10,
        "CZK" => 10,
        "DKK" => 10,
        "EGP" => 10,
        "EUR" => 1,
        "GBP" => 1,
        "HKD" => 10,
        "HUF" => 100,
        "ILS" => 10,
        "INR" => 100,
        "IRR" => 10000,
        "ISK" => 100,
        "JPY" => 100,
        "KGS" => 100,
        "KRW" => 1000,
        "KWD" => 1,
        "KZT" => 100,
        "MDL" => 10,
        "NOK" => 10,
        "NZD" => 1,
        "PLN" => 10,
        "QAR" => 10,
        "RON" => 10,
        "RSD" => 100,
        "RUB" => 100,
        "SEK" => 10,
        "SGD" => 1,
        "TJS" => 10,
        "TMT" => 10,
        "TRY" => 1,
        "UAH" => 10,
        "USD" => 1,
        "UZS" => 1000,
        "ZAR" => 10,
    );
    /**
     * 
     */
    const items=1000;
    
    /**
     * 
     */
    const round=7;
    /**
     * ვალუტის კოდი
     * @param String $currency
     */
    public abstract function getRate($currency);
   
    /**
     * 
     * @param type $fromCurrency
     * @param type $toCurrency
     * @return type
     */
    public final function getCrossRate($fromCurrency, $toCurrency)
    {

        $gel = self::items * ($this->getRate($fromCurrency) / $this->currencyQuantity[$fromCurrency]);
        $foreign = $gel / ($this->getRate($toCurrency) / $this->currencyQuantity[$toCurrency]);
        return round($foreign / self::items, self::round);
    }

    /**
     * 
     * @param \GeorgiaNationalBank\Money $amount
     * @return \GeorgiaNationalBank\Money
     */
    public final function calculateAmount(\GeorgiaNationalBank\Money $amount)
    {
        $amount->generatedAmount = $amount->amount * $this->getCrossRate($amount->fromCurrency, $amount->toCurrency);
        return $amount;
    }
    /**
     * 
     * @param type $currency
     * @return type
     */
    public final function isInlocal($currency)
    {
        
        return key_exists($currency, $this->data);
    }
    /**
     * 
     * @param type $currency
     * @return type
     */
    public final function getFromLocal($currency)
    {
        return $this->data[$currency];
    }
    /**
     * 
     * @param type $currency
     * @param type $rate
     */
    public function addToLocal($currency,$rate)
    {
        $this->data[$currency] = floatval($rate);
        
    }
    
}
