<?php

namespace Services;

use Models\Card;

class CardService {

    /**
     *
     * This method receives two Card objects and compares their rank
     * and returns which card wins
     * @param Card $card1
     * @param Card $card2
     * @return array
     */
    public function compareCards(Card $card1, Card $card2) {

        try {

            if ($card1->rank > $card2->rank) {
                return [
                    'winner' => 1,
                    'message' => $card1->__toString() . ' is greater than ' . $card2->__toString()
                ];
            } elseif ($card1->rank < $card2->rank) {
                return [
                    'winner' => 2,
                    'message' => $card1->__toString() . ' is smaller than ' . $card2->__toString()
                ];
            }

            return [
                'winner' => 0,
                'message' => $card1->__toString() . ' is the same as ' . $card2->__toString()
            ];

        } catch (\Exception $e) {
            return [
                'winner' => 404,
                'message' => $e->getMessage()
            ];
        }
    }

}