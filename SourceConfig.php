<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of SourceConfig
 *
 * @author nika
 */
class SourceConfig extends SourceFields
{
    const currencyId = 0;
    const CurrencyRate = 2;
    const soapSource = 'http://nbg.gov.ge/currency.wsdl';
    const rssSource = 'http://www.nbg.ge/rss.php';
    const items = 1000;
    const round = 6;
}
