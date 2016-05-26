<?php
namespace GeorgiaNationalBank\sources;
/**
 * Description of RssSource
 *
 * @author Niko Peikrishvili
 */
class RssSource extends BaseSource
{
    const source = 'http://www.nbg.ge/rss.php';

    private $content;
    private $cleaned;
    public function __construct()
    {
        $this->content = file_get_contents(self::source);
        $this->clean();
        $this->parse();
        
    }
    private function clean()
    {
        $garbage = array('<![CDATA[', ']]>', '<img  src="https://www.nbg.gov.ge/images/green.gif">', '<img  src="https://www.nbg.gov.ge/images/red.gif">');
        $correct = array_fill(0, count($garbage) - 1, '');
        $this->cleaned = str_replace($garbage, $correct,$this->content);
    }
    private function parse()
    {
        $xml = simplexml_load_string($this->cleaned);
        $data = $xml->xpath('channel/item/description/table/tr');       
        foreach ($data as $item)
        {            
            $i = (array) $item->td;
            $this->addToLocal($i['0'],  $i['2']);            
        }
        $this->addToLocal(\GeorgiaNationalBank\Currencies::_GEL, 1.0);        
    }
    

    public function getRate($currency)
    {
        if ($this->isInlocal($currency))
        {
            return $this->getFromLocal($currency);
        } else
        {
            throw new \Exception("cannot get rates from Rss", '-1', null);
        }
    }

}
