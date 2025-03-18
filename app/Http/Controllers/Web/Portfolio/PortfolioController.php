<?php

namespace App\Http\Controllers\Web\Portfolio;

use App\Http\Controllers\Controller;

use Domain\Portfolio\Actions\UpsertPortfolioAction;
use Domain\Portfolio\DataTransferObjects\PortfolioData;

class PortfolioController extends Controller
{
    function store(PortfolioData $data)
    {
        $user = \Auth::user();

        try {
            // call action for inserting a new portfolio.
            throw_if(!UpsertPortfolioAction::execute($data, $user));
       
            return $this->backWithSuccess(status: 201);
        }
        catch(\Exception $e)
        {
            return $this->backWithFail();
        }
    }
}
