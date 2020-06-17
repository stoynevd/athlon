<?php

require_once('src/Models/Card.php');
require_once('src/Services/Card/CardService.php');

use PHPUnit\Framework\TestCase;

use Services\CardService;

class CardTest extends TestCase {

    public function testToString() {
        $card = new \Models\Card('spades', 10);

        $this->assertEquals('Jack of spades', $card->__toString());
    }

    public function testIsFaceCard() {
        $card = new \Models\Card('spades', 10);
        $this->assertEquals(true, $card->isFaceCard());
    }

    public function testCompareCards() {
        $card1 = new \Models\Card('spades', 10);
        $card2 = new \Models\Card('spades', 3);

        $cs = new CardService();

        $this->assertEquals('Jack of spades is greater than 4 of spades', $cs->compareCards($card1, $card2));
    }

    public function testCompareCardsDraw() {
        $card2 = new \Models\Card('hearts', 3);
        $card1 = new \Models\Card('hearts', 3);

        $cs = new CardService();

        $this->assertEquals('4 of hearts is the same as 4 of hearts', $cs->compareCards($card1, $card2));
    }

}