<?php

namespace App\Models;

use Illuminate\Support\Collection;

class Quote
{
    static $DEFAULT_NUM_OF_QUOTES = 5;

    private $quotes = [
        "If you have the opportunity to play this game of life you need to appreciate every moment. a lot of people don't appreciate the moment until it's passed.",
        "Nothing in life is promised except death.",
        "I feel like I'm too busy writing history to read it.",
        "Would you believe in what you believe in if you were the only one who believed it?",
        "I am Warhol. I am the No. 1 most impactful artist of our generation. I am Shakespeare in the flesh.",
        "We came into a broken world. And we're the cleanup crew.",
        "I am God's vessel. But my greatest pain in life is that I will never be able to see myself perform live.",
        "I would never want a book's autograph. I am a proud non-reader of books.",
        "I don't use blue. I don't like it. It bugs me out. I hate it.",
        "I love sleep; it's my favorite.",
        "Our work is never over."
    ];

    public function getQuotes(): Collection
    {
        return new Collection($this->quotes);
    }
}
