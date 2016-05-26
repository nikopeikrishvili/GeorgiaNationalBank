<?php

namespace GeorgiaNationalBank\sources;

/**
 * Description of SoapSource
 *
 * @author Niko Peikrishvili
 */
class SoapSource extends BaseSource
{

    const source = 'http://nbg.gov.ge/currency.wsdl';
    private $source;
    public function __construct()
    {

        $timeout = ini_get('default_socket_timeout');
        ini_set('default_socket_timeout', 5);
        $this->source = new \SoapClient(self::source, array("trace" => 1, "connection_timeout" => 5, "exception" => 1, array('encoding' => 'UTF-8')));
        ini_set('default_socket_timeout', $timeout);
    }

    public function getRate($currency)
    {
        
        if ($this->isInlocal($currency))
        {
            return $this->getFromLocal($currency);
        } else
        {
            $rate = floatval($this->source->getCurrency($currency));
            $this->addToLocal($currency, $rate);
            return $rate;
        }
    }

}
