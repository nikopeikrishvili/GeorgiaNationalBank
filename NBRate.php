<?php

/**
 *
 * @author Niko Peikrishvili
 */
class NBRate
{

    /**
     * 
     * @return \source - აბრუნებს მონაცემთა წყაროს
     * @throws Exception - თუ ვერცერთ წყაროსთან მიერთება ვერ მოხერხდა
     */
    public static function getDataSource()
    {
        foreach (Sources::getAllSources() as $source)
        {
            try
            {

                if (class_exists($source) && in_array('SourceInterface', class_implements($source)))
                {
                    $dataSource = new $source();
                    return $dataSource;
                }               
            } catch (Exception $ex)
            {
                // nothing
            }
        }
        if (!$dataSource instanceof SourceInterface)
        {
            throw new Exception("cannot get data from any of sources", '-100', null);
        }
    }

}
