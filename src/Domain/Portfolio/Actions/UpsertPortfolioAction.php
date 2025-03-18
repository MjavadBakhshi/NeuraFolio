<?php

namespace Domain\Portfolio\Actions;

use Domain\Account\Models\User;
use Domain\Portfolio\DataTransferObjects\PortfolioData;
use Domain\Portfolio\Models\Portfolio;

/**
 * This action is responsible for insert/update porfolio records.
 */
class UpsertPortfolioAction
{
    static function execute(
        PortfolioData $data,
        User $user
    ):bool
    {
        try{
            $result = Portfolio::updateOrCreate([
                'id' => $data->id,
            ], [
                ...$data->only('name', 'is_active')->toArray(),
                'user_id' => $user->id,
            ]);

            return (bool) $result;
        }
        catch(\Exception $e)
        {
            logger()->error($e);
            return false;
        }    
    }
}