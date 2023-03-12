<?php
require 'mokomasis.php';

$physicalBook = new Book('Drugelis','Jo Nesbo',25);
$digitalBook = new Book('Moriartis','Elon Musk', 43);

echo $physicalBook->getAuthor();