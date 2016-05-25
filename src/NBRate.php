<?php

namespace CBGeo;

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
        foreach (\CBGeo\config\Sources::getAllSources() as $source)
        {

            try
            {

                if (class_exists($source))
                {
                    $dataSource = new $source();

                    if (!$dataSource instanceof sources\BaseSource)
                    {
                        throw new \Exception("cannot get data from any of sources", '-100', null);
                    }
                    return $dataSource;
                }
                else
                {
                    throw new \Exception("Class " . $source." not Exists", '-100', null);
                }
            } catch (\Exception $ex)
            {
                throw new \Exception($ex->getMessage(), $ex->getCode());
            }
        }
    }

}
