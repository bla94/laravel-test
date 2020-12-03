<?php

declare(strict_types=1);

namespace App\Http\Factories;


use Illuminate\Support\Collection;

class BreweryCollectionFactory
{
    private $singleFactory;

    public function __construct(BreweryFactory $breweryFactory)
    {
        $this->singleFactory = $breweryFactory;
    }

    public function create(Array $array): Collection
    {
        $resultArray = [];
        foreach ($array as $entity) {
         $resultEntity = $this->singleFactory->create($entity);
         array_push($resultArray, $resultEntity);
        }

        return collect($resultArray);
    }
}