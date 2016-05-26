<?php
namespace GeorgiaNationalBank\config;

/**
 * წყაროების სია უნდა შეესაბამებოდეს
 * იგივე დირექტორიაში მასივის სახელს და უნდა იყოს SourceInterface
 * ის იმპლემენტაცია
 *
 * @author Niko Peikrishvili
 */
abstract class Sources
{

    const SOAP = '\GeorgiaNationalBank\sources\SoapSource';
    const RSS = '\GeorgiaNationalBank\sources\RssSource';
    
    static function getAllSources()
    {
        $oClass = new \ReflectionClass(__CLASS__);
        return $oClass->getConstants();
    }

}
