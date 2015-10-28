<?php
require 'vendor/autoload.php';
require 'Geocodable.php';
require 'RetailStore.php';

$geocoderAdapter = new \Ivory\HttpAdapter\CurlHttpAdapter();
$geocoder = new \Geocoder\ProviderAggregator();
$geocoder->registerProvider(new \Geocoder\Provider\GoogleMaps($geocoderAdapter));

$store = new RetailStore();
$store->setAddress('420 9th Avenue, New York, NY 10001 USA');
$store->setGeocoder($geocoder);

$latitude = $store->getLatitude();
$longitude = $store->getLongitude();

echo $latitude, ':', $longitude;
