<?php

namespace Domain\Portfolio\DataTransferObjects;

use Carbon\Carbon;
use Spatie\LaravelData\{Data, Optional};

class PortfolioData extends Data 
{
    function __construct(
        public readonly ?int $id,
        public readonly string $name,
        public readonly Optional|bool $is_active,
        public readonly Optional|Carbon $created_at,
    ){}
}