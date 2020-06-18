<?php

namespace Models;

class Player {

    public $name;
    public $score;
    public $deck;

    public function __construct($name, $score, Deck $deck) {
        $this->name = $name;
        $this->score = $score;
        $this->deck = $deck;
    }

}