<?php

namespace Models;

use Services\DeckService;

class Deck {

    public $cards;

    public function __construct() {
        if (!isset($this->cards)) {
            $this->cards = DeckService::initializeDeck();
        }
    }

    /**
     * This method returns the number of cards in the deck
     * @return int
     */
    public function countCards() {
        return count($this->cards);
    }

    /**
     * This method shuffles the order of the deck and returns it
     * @return array
     */
    public function shuffleCards() {
        shuffle($this->cards);
        return $this->cards;
    }

    /**
     * This method draws the last N number of cards and returns them as an array
     * @param $numberOfCards
     * @return array
     */
    public function drawCards($numberOfCards) {
        return array_splice($this->cards, -$numberOfCards);
    }

}