<?php

declare(strict_types=1);

namespace App\Http\Repositories;

use App\Http\Factories\BreweryCollectionFactory;
use App\Http\Factories\BreweryFactory;
use App\Http\Helpers\BreweryRequestSender;
use App\Models\Brewery;
use Illuminate\Support\Collection;

class BreweryRepository
{
    private $requestSender;

    private $breweryFactory;

    private $breweryCollectionFactory;

    public function __construct(
        BreweryRequestSender $requestSender
    ) {
        $this->requestSender = $requestSender;
        $this->breweryFactory = new BreweryFactory();
        $this->breweryCollectionFactory = new BreweryCollectionFactory($this->breweryFactory);
    }

    public function getAll($page = 1, $per_page = 50): Collection
    {
        $notFormattedBreweries = $this->requestSender->getAllBreweries($page, $per_page);

        return $this->breweryCollectionFactory->create($notFormattedBreweries);
    }

    public function getById(int $id): Brewery
    {
        $notFormattedBrewery = $this->requestSender->getSingleBrewery($id);

        return $this->breweryFactory->create($notFormattedBrewery);
    }
}
