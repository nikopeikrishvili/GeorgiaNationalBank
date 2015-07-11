<?php
/**
 * ძირითადი საკონფიგურაციო პარამეტრები
 *
 * @author Niko Peikrishvili
 */
class SourceConfig extends SourceFields
{
    /**
     * ვალუტის კოდის აღმნიშვნელი ინდექსი
     * RSS მონაცემებთან მუშაობის შემთხვევაში
     */
    const currencyId = 0;
    /**
     * ვალუტის კურსის აღმნიშვნელი ინდექსი
     * RSS მონაცემებთან მუშაობის შემთხვევაში
     */
    const CurrencyRate = 2;
    /**
     * WSDL ფაილის მისამართი
     */
    const soapSource = 'http://nbg.gov.ge/currency.wsdl';
    /**
     * RSS ფაილის მისამართი
     */
    const rssSource = 'http://www.nbg.ge/rss.php';
    /**
     * რამდენზე უნდა გამრავლდეს კურსი
     */
    const items = 1000;
    /**
     * დამრგვალება
     */
    const round = 6;
}
