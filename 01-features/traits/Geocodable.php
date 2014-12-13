<?php
trait Geocodable {
    /** @var string */
    protected $address;

    /** @var \Geocoder\Geocoder */
    protected $geocoder;

    /** @var \Geocoder\Result\Geocoded */
    protected $geocoderResult;

    public function setGeocoder(\Geocoder\GeocoderInterface $geocoder)
    {
        $this->geocoder = $geocoder;
    }

    public function setAddress($address)
    {
        $this->address = $address;
    }

    public function getLatitude()
    {
        if (isset($this->geocoderResult) === false) {
            $this->geocodeAddress();
        }

        return $this->geocoderResult->getLatitude();
    }

    public function getLongitude()
    {
        if (isset($this->geocoderResult) === false) {
            $this->geocodeAddress();
        }

        return $this->geocoderResult->getLongitude();
    }

    protected function geocodeAddress()
    {
        $this->geocoderResult = $this->geocoder->geocode($this->address);

        return true;
    }
}
