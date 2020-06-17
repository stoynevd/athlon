<?php

require_once('src/Models/Card.php');
require_once('src/Models/Deck.php');
require_once('src/Services/Deck/DeckService.php');

use PHPUnit\Framework\TestCase;

use Models\Deck;
use Models\Card;

class DeckTest extends TestCase {

    public function testCountCards() {
        $deck = new Deck();
        $this->assertEquals(52, $deck->countCards());
    }

    public function testDrawCardsCount() {
        $deck = new Deck();
        $this->assertEquals(3, count($deck->drawCards(3)));
    }

    public function testDrawCards() {
        $deck = new Deck();
        $test = $deck->drawCards(3);

        foreach ($test as $card) {
            $this->assertInstanceOf(Card::class, $card);
        }

    }

}