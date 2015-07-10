<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of crossRatesClient
 *
 * @author Niko Peikrishvili
 */
class Sources
{

    const SOAP = 'SOAP';
    const RSS = 'RSS';

}

class crossRatesClient
{

    const currencyId = 0;
    const CurrencyRate = 2;

    private $sourceType;
    private $source;
    private $data;

    const soapSource = 'http://nbg.gov.ge/currency.wsdl';
    const rssSource = 'http://www.nbg.ge/rss.php';

    public function __construct()
    {
        try
        {
            $timeout = ini_get('default_socket_timeout');
            ini_set('default_socket_timeout', 5);
            $this->source = new SoapClient(self::soapSource, array("trace" => 1, "connection_timeout" => 5, "exception" => 1, array('encoding' => 'UTF-8')));
            ini_set('default_socket_timeout', $timeout);
            $this->sourceType = Sources::SOAP;
        } catch (Exception $ex)
        {
            $this->sourceType = Sources::RSS;
            $this->readRss();
        }
    }

    public function readRss()
    {
        $content = file_get_contents(self::rssSource);
        $content = str_replace('<![CDATA[', '', $content);
        $content = str_replace(']]>', '', $content);
        $content = str_replace('<img  src="https://www.nbg.gov.ge/images/green.gif">', '', $content);
        $content = str_replace('<img  src="https://www.nbg.gov.ge/images/red.gif">', '', $content);
        $xml = simplexml_load_string(trim($content));
        $data = $xml->xpath('channel/item/description/table/tr');
        $rates = array();

        foreach ($data as $item)
        {
            $i = (array) $item->td;
            $rates[$i[self::currencyId]] = $i[self::CurrencyRate];
        }
        $this->data = $rates;
    }

    public function GetCurrency($currency)
    {
        if ($this->sourceType == Sources::RSS)
        {
            return $this->getRateFromRss($currency);
        } else if ($this->sourceType == Sources::SOAP)
        {
            try
            {
                return $this->source->GetCurrency($currency);
            } catch (Exception $ex)
            {
                $this->sourceType = Sources::RSS;
                $this->readRss();
                return $this->getRateFromRss($currency);
            }
        } else
        {
            throw new Exception("cannot get rates from any sources", '-2', null);
        }
    }

    private function getRateFromRss($currency)
    {
        if (is_array($this->data) && key_exists($currency, $this->data))
        {
            return $this->data[$currency];
        } else
        {
            throw new Exception("cannot get rates from Rss", '-1', null);
        }
    }

}
