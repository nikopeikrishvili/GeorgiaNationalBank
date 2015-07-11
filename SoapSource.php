<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of SoapSource
 *
 * @author nika
 */
class SoapSource extends SourceConfig implements SourceInterface
{
    use Calculation;
    public function __construct()
    {

        $timeout = ini_get('default_socket_timeout');
        ini_set('default_socket_timeout', 5);
        $this->source = new SoapClient(self::soapSource, array("trace" => 1, "connection_timeout" => 5, "exception" => 1, array('encoding' => 'UTF-8')));
        ini_set('default_socket_timeout', $timeout);
        $this->source->getCurrency(Currencies::_USD);
    }

    public function getCrossRate($fromCurrency, $toCurrency)
    {
        
    }

    public function getRate($currency)
    {
        return $this->source->getCurrency($currency);
    }

//put your code here
}
