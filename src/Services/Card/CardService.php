<?php

namespace Services;

use Models\Card;

class CardService {

    public function compareCards(Card $card1, Card $card2) {

        try {

            if ($card1->rank > $card2->rank) {
                return $card1->__toString() . ' is greater than ' . $card2->__toString();
            } elseif ($card1->rank < $card2->rank) {
                return $card2->__toString() . ' is greater than ' . $card1->__toString();
            }

            return $card1->__toString() . ' is the same as ' . $card2->__toString();

        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

}