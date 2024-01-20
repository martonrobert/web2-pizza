<?php

namespace App\Models;

use SoapClient;

class MnbModel {


    public function getCurrencies() {

        $client = new SoapClient('http://www.mnb.hu/arfolyamok.asmx?wsdl');
        $response = $client->__soapCall('GetCurrencies', array());
        
        $xml = simplexml_load_string($response->GetCurrenciesResult);
        return $xml->Currencies->Curr;

    }


    public function getCurrencyRates() {

        $client = new SoapClient('http://www.mnb.hu/arfolyamok.asmx?wsdl');
        $response = $client->__soapCall('GetCurrentExchangeRates', array());
        
        $xml = simplexml_load_string($response->GetCurrentExchangeRatesResult);

        $data = [
            'date' => (string) $xml->Day->Attributes()['date'],
            'rates' => []
        ];

        foreach($xml->Day->Rate as $item) {
            $data['rates'][] = [
                'currency' => (string) $item->Attributes()['curr'],
                'rate' => (float) $item
            ];
        }

        return $data;
        
    }


}