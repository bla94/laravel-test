<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Repositories\BreweryRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class GetBreweriesController extends Controller
{
    private $repository;

    public function __construct(
        BreweryRepository $breweryRepository
    ) {
        $this->repository = $breweryRepository;
    }

    public function __invoke(Request $request): Collection
    {
        $page = $request->input('page', 1);
        $per_page = $request->input('per_page', 50); //page and per page values t be moved to .env config

        return $this->repository->getAll($page, $per_page);
    }
}
