<?php

namespace GeorgiaNationalBank;

/**
 *
 * @author Niko Peikrishvili
 */
class GeorgiaNationalBank
{

    /**
     * 
     * @return \source 
     * @throws Exception
     */
    /**
     * 
     * @return \GeorgiaNationalBank\source - აბრუნებს მონაცემთა წყაროს
     * @throws \Exception  - თუ ვერცერთ წყაროსთან მიერთება ვერ მოხერხდა
     */
    public static function getDataSource($preferedSource = false)
    {
        if($preferedSource)
        {
            self::checkClass($preferedSource);
            return new $preferedSource();
        }
        foreach (\GeorgiaNationalBank\config\Sources::getAllSources() as $source)
        {
            try
            {
                self::checkClass($source);
                return new $source();
                
            } catch (\Exception $ex)
            {
                throw new \Exception($ex->getMessage(), $ex->getCode());
            }
        }
    }

    private static function checkClass($className)
    {
        if (!class_exists($className))
        {
            throw new \Exception("Class " . $className . " not Exists", '-100', null);
        }
        if(!in_array('\GeorgiaNationalBank\sources\BaseSource', class_parents($className)))
        {
            throw new \Exception("Class " . $className . " is not extends \GeorgiaNationalBank\sources\BaseSource s", '-101', null);
        }
    }

}
