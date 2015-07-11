<?php

trait Calculation
{
    public function getCrossRate($fromCurrency, $toCurrency)
    {
       
            $gel = self::items * ($this->getRate($fromCurrency)/$this->currencyQuantity[$fromCurrency]);
            $foreign = $gel / ($this->getRate($toCurrency)/$this->currencyQuantity[$toCurrency]);
            return round($foreign/self::items,self::round);
         
    }
}

