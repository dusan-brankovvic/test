<?php

namespace App\Http\Controllers;

use App\Models\Quote;
use App\Services\QuoteService;
use Illuminate\Routing\Controller as BaseController;

class QuotesController extends BaseController
{
    /**
     * @var QuoteService
     */
    private $quoteService;

    public function __construct(QuoteService $quoteService)
    {
        $this->quoteService = $quoteService;
    }

    public function getQuotes()
    {
        //set default page to 1
        $page = \request()->has('page') ? \request()->get('page') : 1;

        $perPage = \request()->has('perPage') ? \request()->get('perPage') : Quote::$DEFAULT_NUM_OF_QUOTES;

        return response()->json($this->quoteService->getRandomQuotes($perPage,$page));
    }

    public function getQuoteView()
    {
        //set default page to 1
        $page = \request()->has('page') ? \request()->get('page') : 1;

        $perPage = \request()->has('perPage') ? \request()->get('perPage') : Quote::$DEFAULT_NUM_OF_QUOTES;



        return view('quotes', ['quotes' => $this->quoteService->getRandomQuotes($perPage,$page)]);
    }
}
