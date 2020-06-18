<?php

namespace Services\Game;

abstract  class Game {

    abstract protected function startGame($player1, $player2);

    abstract protected function listInstructions();

    abstract protected function initializeGame($name1, $name2);
}