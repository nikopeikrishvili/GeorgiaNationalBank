<?php
/**
 *
 * @author Niko Peikrishvili
 */
class Money
{

    /**
     *
     * @var String - რომელი ვალუტიდან ხდება კონვერტაცია 
     */
    public $fromCurrency = '';
    /**
     *
     * @var String - რომელ ვალუტაში ხდება კონვერტაცია
     */
    public $toCurrency = '';
    /**
     *
     * @var float - კონვერტირებადი თანხა 
     */
    public $amount = 0.0;
    /**
     *
     * @var float - რეზულტატი 
     */
    public $generatedAmount = 0.0;

}
