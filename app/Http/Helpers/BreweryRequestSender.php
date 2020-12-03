<?php

declare(strict_types=1);

namespace App\Http\Helpers;

use App\Models\Brewery;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class BreweryRequestSender
{
    public function getAllBreweries($page = null, $per_page = null)
    {
        $client = new Client();
        $url = 'https://api.openbrewerydb.org/breweries';
        if ($page && $per_page){
            $url = $url . '?page=' . $page . '&per_page=' . $per_page;
        }

        try {
            $response = $client->request('GET', $url);
            $result = json_decode($response->getBody()->getContents());
        } catch (GuzzleException $e) {
            return $e->getMessage();
        }

        return $result;
    }

    public function getSingleBrewery(Int $breweryId)
    {
        $client = new Client();
        $url = 'https://api.openbrewerydb.org/breweries/' . $breweryId;
        try {
            $response = $client->request('GET', $url);
            $result = json_decode($response->getBody()->getContents());
        } catch (GuzzleException $e) {
            return $e->getMessage();
        }
        return $result;
    }
}