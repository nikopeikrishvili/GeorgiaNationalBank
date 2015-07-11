<?php
/**
 * traint ის დანიშნულებაა საერთო ფუნქციონალის
 * ერთ ადგილას მოთავსება
 */
trait Calculation
{

    public function getCrossRate($fromCurrency, $toCurrency)
    {

        $gel = self::items * ($this->getRate($fromCurrency) / $this->currencyQuantity[$fromCurrency]);
        $foreign = $gel / ($this->getRate($toCurrency) / $this->currencyQuantity[$toCurrency]);
        return round($foreign / self::items, self::round);
    }

    public function calculateAmount(Money $amount)
    {
        echo $this->getCrossRate($amount->fromCurrency, $amount->toCurrency)."\n";
        $amount->generatedAmount = $amount->amount * $this->getCrossRate($amount->fromCurrency, $amount->toCurrency);
        return $amount;
    }

}
