<?php

/**
 * Description of GeorgianNationalBankClassTest
 *
 * @author Niko Peikrishvili
 */
class GeorgianNationalBankClassTest extends PHPUnit_Framework_TestCase
{
   
    /**
     * @testdox Check if all Data Sources is extending GeorgiaNationalBank\sources\BaseSource
     * @dataProvider getSourcesArray
     * @test
     */
    public function testDataSourcesExtend($source)
    {
        $this->assertContains('GeorgiaNationalBank\sources\BaseSource', class_parents($source));
    }
    /**
     * @testdox Checking if getDataSource return prefered Source instance
     * @dataProvider getSourcesArray
     * @test
     */
    public function testPreferedDataSource($source)
    {
        $sourceInstance = new $source;
        $this->assertInstanceOf($source,$sourceInstance);
    }
    
    /**
     * @testdox Excepting Exception with code -100 when class not exists
     * @test
     * @dataProvider classesNotExists
     * @expectedException Exception
     * @expectedExceptionCode -100
     */
    public function checkClassNoClassNotExists($dataSource)
    {
        GeorgiaNationalBank\GeorgiaNationalBank::getDataSource($dataSource);
    }
    /**
     *    * @testdox Excepting Exception with code -101 when class is not a proper instance
     * @test
     * @dataProvider classesIsNotInstance
     * @expectedException Exception
     * @expectedExceptionCode -101
     */
    public function checkClassIsNotProperInstance($dataSource)
    {
        GeorgiaNationalBank\GeorgiaNationalBank::getDataSource($dataSource);
    }
    public function classesIsNotInstance()
    {
         $dataProviderArray = array();
        
        array_push($dataProviderArray,array('\GeorgiaNationalBank\Currencies'));
        return $dataProviderArray;
    }
    public function classesNotExists()
    {
         $dataProviderArray = array();
        
        array_push($dataProviderArray,array('\GeorgiaNationalBank\sources\NotExistedClass'));
        return $dataProviderArray;
    }
    public function getSourcesArray()
    {
        $dataProviderArray = array();
        foreach(GeorgiaNationalBank\config\Sources::getAllSources() as $sources)
        {
            array_push($dataProviderArray, array($sources));
        }
        return $dataProviderArray;
    }
    
}
