<?php

namespace Tests\Feature;

use App\Models\Quote;
use App\Services\QuoteService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Collection;
use Tests\TestCase;

class QuoteControllerTest extends TestCase
{
    /**
     * @var QuoteService
     */
    private $quoteService;
    /**
     * @var Quote
     */
    private $quote;

    public function setUp(): void
    {
        parent::setUp(); // TODO: Change the autogenerated stub
        $this->quote = new Quote();
        $this->quoteService = new QuoteService($this->quote);
    }

    public function testItShouldReturnForbidenIfTokenIsNotProvided()
    {
        $response = $this->json('GET', route('getQuotes'));

        $response->assertStatus(401);
    }

    public function testItShouldReturnQuotesIfTokenIsProvided()
    {
        $response = $this->json('GET', route('getQuotes'), [], [
            'token' => env('TOKEN')
        ]);

        $response->assertStatus(200);

        $data = json_decode($response->getContent(), true);

        $this->assertArrayHasKey('data', $data);

        $this->assertArrayHasKey('current_page', $data);

        $this->assertEquals(1, $data['current_page']);

        $this->assertCount(5, $data['data']);
    }

    public function testPaginationShouldChangeIfPageIsDifferent()
    {
        $response = $this->json('GET', route('getQuotes'), ['page'=>3], [
            'token' => env('TOKEN')
        ]);

        $response->assertStatus(200);

        $data = json_decode($response->getContent(), true);

        $this->assertArrayHasKey('data', $data);

        $this->assertArrayHasKey('current_page', $data);

        $this->assertEquals(3, $data['current_page']);

        $this->assertCount(1, $data['data']);
    }
}
