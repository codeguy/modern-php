<?php
trait Geocodable
{
    /** @var string */
    protected $address;

    /** @var \Geocoder\Geocoder */
    protected $geocoder;

    /** @var \Geocoder\Model\AddressCollection */
    protected $geocoderResult;

    public function setGeocoder(\Geocoder\Geocoder $geocoder)
    {
        $this->geocoder = $geocoder;
    }

    public function setAddress($address)
    {
        $this->address = $address;
    }

    public function getLatitude()
    {
        if (!isset($this->geocoderResult)) {
            $this->geocodeAddress();
        }

        return $this->geocoderResult->first()->getLatitude();
    }

    public function getLongitude()
    {
        if (!isset($this->geocoderResult)) {
            $this->geocodeAddress();
        }

        return $this->geocoderResult->first()->getLongitude();
    }

    protected function geocodeAddress()
    {
        $this->geocoderResult = $this->geocoder->geocode($this->address);

        return true;
    }
}
