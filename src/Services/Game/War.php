<?php

namespace Services\Game;

require_once('src/Services/Game/Game.php');
require_once('src/Models/Player.php');

use Models\Deck;
use Models\Player;
use Services\CardService;

class War extends Game
{

    private $player1;
    private $player2;

    public function startGame($name1, $name2)
    {

        try {

            $this->initializeGame($name1, $name2);

            $cs = new CardService();

            echo $this->listInstructions();
            echo 'The war game starts' . "\n\n";
            echo $this->player1->name . ' plays first card' . "\n\n";

            $over = false;
            $round = 1;

            while ($over == false) {

                echo 'Round: ' . $round . "\n\n";

                $cardOfPlayer1 = $this->player1->deck->drawCards(1)[0];
                $cardOfPlayer2 = $this->player2->deck->drawCards(1)[0];

                $comparison = $cs->compareCards($cardOfPlayer1, $cardOfPlayer2);

                if ($comparison['winner'] == 1) {
                    $this->player1->score += 1;
                } else if ($comparison['winner'] == 2) {
                    $this->player2->score += 1;
                }

                echo $comparison['message'] . "\n\n";

                $over = $this->checkIfWon();

                $round++;

            }

        } catch (\Exception $e) {
            print_r($e->getMessage());
            exit();
        }

    }

    /**
     * This method initializes the two decks and assigns them to the players
     *
     * N.B.
     * This can be further optimised by instead of passing two names for the players,
     * an N number of players is passed through and than N number of players and decks are created.
     * @param $name1
     * @param $name2
     */
    protected function initializeGame($name1, $name2)
    {
        try {

            $deck1 = new Deck();
            $deck2 = new Deck();

            $deck1->shuffleCards();
            $deck2->shuffleCards();

            $this->player1 = new Player($name1, 0, $deck1);
            $this->player2 = new Player($name2, 0, $deck2);
        } catch (\Exception $e) {
            print_r($e->getMessage());
            exit();
        }
    }

    protected function listInstructions()
    {
        return 'The War game is played by 2 people. 
        Each player gets a deck of 52 cards, which is shuffled at the beginning of the game.
        Each round both players place a card from top of their deck and the card with the higher rank wins.
        Each card, taken from the opponent is worth 1 point. In order to win a player needs to obtain 10 points.' . "\n\n";
    }

    /**
     * This method check the results of the two players and determines which one won the game
     * @return bool
     */
    public function checkIfWon()
    {

        try {

            if ($this->player1->score >= 10 && $this->player2->score >= 10) {
                echo 'Draw between ' . $this->player1->name . ' and ' . $this->player2->name;
                return true;
            } elseif ($this->player1->score >= 10) {
                echo $this->player1->name . ' wins the game!' . "\n" . 'Points: ' . "\n" . $this->player1->name . ': ' . $this->player1->score . "\n" . $this->player2->name . ': ' . $this->player2->score;
                return true;
            } elseif ($this->player2->score >= 10) {
                echo $this->player2->name . ' wins the game!' . "\n" . 'Points: ' . "\n" . $this->player2->name . ': ' . $this->player2->score . "\n" . $this->player1->name . ': ' . $this->player1->score;
                return true;
            }

            return false;

        } catch (\Exception $e) {
            print_r($e->getMessage());
            exit();
        }
    }


}