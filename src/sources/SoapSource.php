<?php
namespace CBGeo\sources;

/**
 * Description of SoapSource
 *
 * @author Niko Peikrishvili
 */
class SoapSource extends BaseSource
{



    public function __construct()
    {

        $timeout = ini_get('default_socket_timeout');
        ini_set('default_socket_timeout', 5);
        $this->source = new \SoapClient(self::soapSource, array("trace" => 1, "connection_timeout" => 5, "exception" => 1, array('encoding' => 'UTF-8')));
        ini_set('default_socket_timeout', $timeout);
        // შემოწმება, WSDL შეიძლება მოდიოდეს სწორედ მარა თვითონ სერვისი არ მუშაობდეს
        $rate = $this->source->GetCurrencyRate(\CBGeo\Currencies::_USD);
        $this->data[\CBGeo\Currencies::_USD] = $rate;
    }

    public function getRate($currency)
    {
        if (is_array($this->data) && key_exists($currency, $this->data))
        {
            return $this->data[$currency];
        } else
        {
            $rate = floatval($this->source->getCurrency($currency));
            $this->data[$currency] = $rate;
            return $rate;
        }
    }


}
