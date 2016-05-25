<?php
namespace CBGeo;
/**
 * შესაძლო ვალუტების სია
 *
 * @author Niko Peikrishvili
 */
class Currencies
{

    CONST _GEL = 'GEL';
    CONST _AED = 'AED';
    CONST _AMD = 'AMD';
    CONST _AUD = 'AUD';
    CONST _AZN = 'AZN';
    CONST _BGN = 'BGN';
    CONST _BRL = 'BRL';
    CONST _BYR = 'BYR';
    CONST _CAD = 'CAD';
    CONST _CHF = 'CHF';
    CONST _CNY = 'CNY';
    CONST _CZK = 'CZK';
    CONST _DKK = 'DKK';
    CONST _EGP = 'EGP';
    CONST _EUR = 'EUR';
    CONST _GBP = 'GBP';
    CONST _HKD = 'HKD';
    CONST _HUF = 'HUF';
    CONST _ILS = 'ILS';
    CONST _INR = 'INR';
    CONST _IRR = 'IRR';
    CONST _ISK = 'ISK';
    CONST _JPY = 'JPY';
    CONST _KGS = 'KGS';
    CONST _KRW = 'KRW';
    CONST _KWD = 'KWD';
    CONST _KZT = 'KZT';
    CONST _MDL = 'MDL';
    CONST _NOK = 'NOK';
    CONST _NZD = 'NZD';
    CONST _PLN = 'PLN';
    CONST _QAR = 'QAR';
    CONST _RON = 'RON';
    CONST _RSD = 'RSD';
    CONST _RUB = 'RUB';
    CONST _SEK = 'SEK';
    CONST _SGD = 'SGD';
    CONST _TJS = 'TJS';
    CONST _TMT = 'TMT';
    CONST _TRY = 'TRY';
    CONST _UAH = 'UAH';
    CONST _USD = 'USD';
    CONST _UZS = 'UZS';
    CONST _ZAR = 'ZAR';

    static function getAllCurrencies()
    {
        $oClass = new ReflectionClass(__CLASS__);
        return $oClass->getConstants();
    }

}
