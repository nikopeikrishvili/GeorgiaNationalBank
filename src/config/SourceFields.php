<?php
namespace CBGeo\config;
/**
 *
 * @author Niko Peikrishvili
 */
class SourceFields
{

    /**
     *
     * @var String - მონაცემთა წყარო 
     */
    protected $sourceType;
    /**
     *
     * @var type 
     */
    protected $source;
    /**
     *
     * @var array - მონაცემები 
     */
    protected $data;
    /**
     *
     * @var int -  ერთეულები ეროვნულ ბანკში
     */
    protected $currencyQuantity = array(
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

}
