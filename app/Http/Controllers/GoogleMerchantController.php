<?php

namespace App\Http\Controllers;

use App\Http\Service\GoogleMerchant;

class GoogleMerchantController extends Controller
{
    public function index()
    {
        $xml = $this->fetchTestXml();
        $googleMerchant = GoogleMerchant::fromXml($xml);
        $googleMerchant->getTitle();
        $googleMerchant->setTitle('Hello Title');
        $googleMerchant->getDescription();
        $googleMerchant->setDescription('Hello Description');
        $googleMerchant->getPrice();
        $googleMerchant->setPrice('100 TWD');
        $googleMerchant->toXml();
    }

    public function fetchTestXml()
    {
        $url = 'https://gist.githubusercontent.com/chivincent-rosetta/0ff2bc5101d391a47a3741fdffa17c3f/raw/658c627b037ed60322e3123af329042a01dff319/product_feed.xml';
        $xml = simplexml_load_file($url);

        return $xml;
    }
}
