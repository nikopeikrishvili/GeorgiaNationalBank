[![Build Status](https://travis-ci.org/nikopeikrishvili/GeorgiaNationalBank.svg?branch=master)](https://travis-ci.org/nikopeikrishvili/GeorgiaNationalBank)
<br />
![alt tag](https://media.licdn.com/media/p/1/000/211/335/1f72ee7.png)
# NBG Rates
ეროვნული ბანკიდან კურსების ბიბლიოთეკა, ამჟამად აქვს 2 წყარო <br />
1. SOAP ვებ სერივის გამოყენებით <br />
2. RSS ის გამოყენებით <br />

## Install
```
composer require georgianationalbank/georgianationalbank
```
***
## გამოყენება
```PHP
// მონაცემთა წყაროს მიღება ან იქნება SourceInterface ინსტანსი ან Exception
$data = \GeorgiaNationalBank\NBRate::getDataSource();

// დოლარის კურსის მიღება ლართან მიმართებაში
$rate = $data->getRate(\GeorgiaNationalBank\Currencies::_USD);
echo $rate."\n";

// დოლარის კურსის მიღება რუბლთან მიმართებაში
$crossRate = $data->getCrossRate(\GeorgiaNationalBank\Currencies::_RUB, \GeorgiaNationalBank\Currencies::_USD);
echo $crossRate."\n";

// თანხის დათვლა რამდენი დოლარი იქნება 1 ლარი
$money = new \GeorgiaNationalBank\Money();
$money->fromCurrency = Currencies::_GEL;
$money->toCurrency = \GeorgiaNationalBank\Currencies::_USD;
$money->amount = 1;

// დაბრუნდება ისევ Money ობიექტი ოღონდ generatedAmount ში იქნება მნიშვნელობა
$amount = $data->calculateAmount($money);
```