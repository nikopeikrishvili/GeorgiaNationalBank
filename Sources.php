<?php
/**
 * წყაროების სია უნდა შეესაბამებოდეს
 * იგივე დირექტორიაში მასივის სახელს და უნდა იყოს SourceInterface
 * ის იმპლემენტაცია
 *
 * @author Niko Peikrishvili
 */
abstract class Sources
{

    const SOAP = 'SoapSource';
    const RSS = 'RssSource';
    
    static function getAllSources()
    {
        $oClass = new ReflectionClass(__CLASS__);
        return $oClass->getConstants();
    }

}
