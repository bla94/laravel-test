<?php

declare(strict_types=1);

namespace App\Http\Controllers;


use App\Models\Brewery;

class GetBreweryByIdController extends Controller
{

    public function __invoke(Brewery $brewery): Brewery
    {
        return $brewery;
    }
}
