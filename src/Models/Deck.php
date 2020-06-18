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
     * This method shuffles the order of the deck
     */
    public function shuffleCards() {
        shuffle($this->cards);
    }

    /**
     * This method draws the last N number of cards and returns them as an array
     * I have used splice as I want the last withdrawn card to be removed from the deck, so it is not available again
     * If in a given scenario a person wants to keep the cards for the game array_slice can be used
     * @param $numberOfCards
     * @return array
     */
    public function drawCards($numberOfCards) {
        return array_splice($this->cards, -$numberOfCards);
    }

}