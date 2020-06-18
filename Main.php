<?php

require_once('src/Models/Deck.php');
require_once('src/Models/Card.php');
require_once('src/Services/Deck/DeckService.php');
require_once('src/Services/Card/CardService.php');
require_once('src/Services/Game/War.php');
require_once('src/Services/Game/Game.php');


/**
 * This is the simple card game that i have created as functionality
 * The two players withdraw cards and the cards are compared
 */
$war = new \Services\Game\War();

$war->startGame('Dimitar', 'Mladen');


/**
 * The method calls below are done in order to show how the separate functions work
 */
//$deck = new \Models\Deck();
//$cs = new \Services\CardService();
//$card1 = new \Models\Card('spades', 9);
//$card2 = new \Models\Card('spades', 8);
//print_r($deck);
//print_r("\n");
//print_r('Shuffled Deck');
//$deck->shuffleCards();
//print_r($deck);
//print_r("\n");
//print_r('Number of cards in the deck');
//print_r($deck->countCards());
//print_r("\n");
//print_r('Draw 3 cards');
//print_r($deck->drawCards(3));
//print_r("\n");
//print_r('Card printing out');
//print_r($card1->__toString());
//print_r("\n");
//print_r('Check if the card is a face card');
//var_dump($card1->isFaceCard());
//print_r("\n");
//print_r('Comparing card1 and card2');
//print_r($cs->compareCards($card1, $card2)['message']);
//print_r($cs->compareCards($card1, $card2));

