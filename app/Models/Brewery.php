<?php

namespace App\Models;

use Jenssegers\Model\Model;

class Brewery extends Model
{
    protected $attributes = [
        "id",
        "name",
        "brewery_type",
        "street",
        "address_2",
        "address_3",
        "city",
        "state",
        "county_province",
        "postal_code",
        "country",
        "longitude",
        "latitude",
        "phone",
        "website_url"
    ];

    protected $append = ["url"];

    private function getUrlAttribute()
    {
        return "https://api.openbrewerydb.org/breweries" . $this->id;
    }
}
