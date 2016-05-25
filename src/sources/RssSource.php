<?php
namespace CBGeo\sources;
/**
 * Description of RssSource
 *
 * @author Niko Peikrishvili
 */
class RssSource extends BaseSource
{

    public function __construct()
    {
        $garbage = array('<![CDATA[', ']]>', '<img  src="https://www.nbg.gov.ge/images/green.gif">', '<img  src="https://www.nbg.gov.ge/images/red.gif">');
        $correct = array_fill(0, count($garbage) - 1, '');
        $content = str_replace($garbage, $correct, file_get_contents(self::rssSource));
        $xml = simplexml_load_string($content);
        $data = $xml->xpath('channel/item/description/table/tr');
        $rates = array();
        foreach ($data as $item)
        {
            $i = (array) $item->td;
            $rates[$i[self::currencyId]] = $i[self::CurrencyRate];
        }
        $rates[\CBGeo\Currencies::_GEL]=1;
        $this->data = $rates;
    }

    

    public function getRate($currency)
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
