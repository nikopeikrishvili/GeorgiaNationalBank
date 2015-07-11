<?php
/**
 * This class is used for enum of sources
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
