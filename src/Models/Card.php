<?php

namespace Models;

use Services\DeckService;

class Card {

    public $suit;
    public $rank;

    /**
     * Card constructor.
     * It's a good check if the parameters are in between the desired values
     * @param $suit
     * @param $rank
     */
    public function __construct($suit, $rank) {
        if (in_array($suit, DeckService::SUITS)
            || (
                $rank >= 1 && $rank <= DeckService::SUIT_SIZE
            )) {
            $this->suit = $suit;
            $this->rank = $rank;
        }
    }

    public function __toString() {

        switch ($this->rank) {
            case 10:
                return 'Jack of ' . $this->suit;
            case 11:
                return 'Queen of ' . $this->suit;
            case 12:
                return 'King of ' . $this->suit;
            case 13:
                return 'Ace of ' . $this->suit;
            default:
                return ($this->rank + 1) . ' of ' . $this->suit;
        }
    }

    public function isFaceCard() {
        return $this->rank >= 10;
    }
}