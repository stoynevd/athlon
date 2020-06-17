<?php

namespace Services;

use Models\Card;

/**
 * Class DeckService
 * @package Services
 */
class DeckService {

    const SUIT_SIZE = 13;
    const SUITS = [
        'clubs',
        'diamonds',
        'hearts',
        'spades',
    ];

    /**
     * This method is used for the initialization of the deck
     * It creates an array of Card objects and returns it
     *  1. Every card has a suit and a rank
     * @return array
     */
    public static function initializeDeck() {

        $cards = [];

        foreach (self::SUITS as $suit) {

            for ($i = 1; $i <= self::SUIT_SIZE; $i++) {

                $cards[] = new Card($suit, $i);

            }

        }

        return $cards;

    }


}