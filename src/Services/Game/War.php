<?php

namespace Services\Game;

require_once('src/Services/Game/Game.php');
require_once('src/Models/Player.php');

use Models\Deck;
use Models\Player;
use Services\CardService;

class War extends Game {

    private $deck1;
    private $deck2;
    private $player1;
    private $player2;

    public function startGame($name1, $name2) {

        $this->initializeGame($name1, $name2);

        $cs = new CardService();

        echo $this->listInstructions();
        echo 'The war game starts' . "\n";

        $over = false;

        while ($over == false) {

            $cardOfPlayer1 = $this->deck1->drawCards(1)[0];
            $cardOfPlayer2 = $this->deck2->drawCards(1)[0];

            $comparison = $cs->compareCards($cardOfPlayer1, $cardOfPlayer2);

            if ($comparison['winner'] == 1) {
                $this->player1->score += 1;
            } else if ($comparison['winner'] == 2) {
                $this->player2->score += 1;
            }

            echo $comparison['message'] . "\n";

            $over = $this->checkIfWon();
            
        }

    }

    protected function initializeGame($name1, $name2) {
        $this->deck1  = new Deck();
        $this->deck2 = new Deck();

        $this->deck1->shuffleCards();
        $this->deck2->shuffleCards();

        $this->player1 = new Player($name1, 0, $this->deck1);
        $this->player2 = new Player($name1, 0, $this->deck2);
    }

    protected function listInstructions() {
        return 'The War game is player by 2 people. 
        Each player gets a deck of 52 cards, which is shuffled at the beginning of the game.
        Each round both players place a card from their deck and the card with the higher rank wins.
        Each taken card is worth 1 point. In order to win a player needs to obtain 10 points.' . "\n";
    }

    public function checkIfWon() {

        if ($this->player1->score >= 10) {
            echo $this->player1->name . ' wins the game!';
            return true;
        } elseif ($this->player2->score >= 10) {
            echo $this->player2->name . ' wins the game!';
            return true;
        }

        return false;
    }


}