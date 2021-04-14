<?php

namespace App\Services;

use App\Models\Quote;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;

class QuoteService
{
    /**
     * @var Quote
     */
    private $quote;

    public function __construct(Quote $quote)
    {

        $this->quote = $quote;
    }

    public function getRandomQuotes(int $number = 5, $currentPage = 1): LengthAwarePaginator
    {
        return new LengthAwarePaginator(
            $this->quote->getQuotes()->forPage($currentPage, $number)->values(),
            $this->quote->getQuotes()->count(),
            $number,
            $currentPage,
            [
                'path' => LengthAwarePaginator::resolveCurrentPath(),
            ]
        );
    }
}
