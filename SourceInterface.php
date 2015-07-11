<?php
/**
 *
 * @author Niko Peikrishvili
 */
interface SourceInterface
{
    public function __construct();
    public function getRate($currency);
    public function getCrossRate($fromCurrency,$toCurrency);
    public function calculateAmount(Money $amount);
}
