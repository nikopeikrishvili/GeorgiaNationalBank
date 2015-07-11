<?php

/**
 * Description of NBRate
 *
 * @author Niko Peikrishvili
 */
class NBRate
{

    public static function getDataSource()
    {
        foreach (Sources::getAllSources() as $source)
        {
            try {

                $dataSource = new $source();
                return $dataSource;
            } catch (Exception $ex) {
                // nothing
            }
        }
        if (!$dataSource instanceof SourceInterface)
        {
            throw new Exception("cannot get data from any of sources", '-100', null);
        }
    }


    

}
