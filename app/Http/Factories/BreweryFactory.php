<?php

declare(strict_types=1);

namespace App\Http\Factories;

use App\Models\Address;
use App\Models\Brewery;

class BreweryFactory
{
    public function create(object $breweryDTO): Brewery
    {

        $brewery = new Brewery();
        $brewery->id = $breweryDTO->id;
        $brewery->name = $breweryDTO->name;
        $brewery->brewery_type = $breweryDTO->brewery_type;
        $brewery->phone = $breweryDTO->phone;
        $brewery->website_url = $breweryDTO->website_url;
        $brewery->url = 'https://api.openbrewerydb.org/breweries/' . $breweryDTO->id;
        $brewery->updated_at = $breweryDTO->updated_at;
        $brewery->created_at = $breweryDTO->created_at;

        $address = new Address();
        $address->street = $breweryDTO->street;
        $address->address_2 = $breweryDTO->address_2;
        $address->address_3 = $breweryDTO->address_3;
        $address->city = $breweryDTO->city;
        $address->state = $breweryDTO->state;
        $address->county_province = $breweryDTO->county_province;
        $address->postal_code = $breweryDTO->postal_code;
        $address->country = $breweryDTO->country;
        $address->longitude = $breweryDTO->longitude;
        $address->latitude = $breweryDTO->latitude;

        $brewery->address = $address;

        return $brewery;
    }
}