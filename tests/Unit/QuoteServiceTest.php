<?php

namespace Tests\Unit;

use App\Models\Quote;
use App\Services\QuoteService;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use PHPUnit\Framework\TestCase;

class QuoteServiceTest extends TestCase
{
    public function testItShouldReturnLaravelPaginationInstance()
    {
        $mock = $this->createMock(Quote::class);

        $mock->method('getQuotes')->willReturn(new Collection());

        $quoteService = new QuoteService($mock);

        $this->assertInstanceOf(LengthAwarePaginator::class, $quoteService->getRandomQuotes());
    }
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testItShouldNoQuotesIfThereIsNoQuotes()
    {
        $mock = $this->createMock(Quote::class);

        $mock->method('getQuotes')->willReturn(new Collection());

        $quoteService = new QuoteService($mock);

        $this->assertEquals(0,  $quoteService->getRandomQuotes()->count());
    }
}
