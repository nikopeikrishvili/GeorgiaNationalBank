<?php
namespace GeorgiaNationalBank\sources;

/**
 * Description of BaseSource
 *
 * @author Niko Peikrishvili
 */
abstract class BaseSource extends \GeorgiaNationalBank\config\SourceConfig
{
   
    /**
     * ვალუტის კოდი
     * @param String $currency
     */
    public abstract function getRate($currency);
   
    public final function getCrossRate($fromCurrency, $toCurrency)
    {

        $gel = self::items * ($this->getRate($fromCurrency) / $this->currencyQuantity[$fromCurrency]);
        $foreign = $gel / ($this->getRate($toCurrency) / $this->currencyQuantity[$toCurrency]);
        return round($foreign / self::items, self::round);
    }

    public final function calculateAmount(\GeorgiaNationalBank\Money $amount)
    {
        echo $this->getCrossRate($amount->fromCurrency, $amount->toCurrency)."\n";
        $amount->generatedAmount = $amount->amount * $this->getCrossRate($amount->fromCurrency, $amount->toCurrency);
        return $amount;
    }
    
}
