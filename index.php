<?php

// First Labour : Heracles vs Nemean Lion
// use your Figher class here
require_once './src/Fighter.php';

$heracles = new Fighter("😀 Héraclès", 20, 6);
$nemee = new Fighter("🐕 Lion de Némée", 11, 13);
// $nemee->setLife(Fighter::MAX_LIFE);

/*  boucle en version for.
for ($i = 1; ($heracles->getLife() > 0) && ($nemee->getLife() > 0); $i++) {

    echo "round" . $i . PHP_EOL;
    echo $heracles->getName() . ' attaque le Lion de némée ' . PHP_EOL;
    $heracles->fight($nemee);
    echo "vie Lion : " . $nemee->getLife() . PHP_EOL . "vie Héraclès : " . $heracles->getLife() . PHP_EOL;
    echo $nemee->getName() . ' attaque Héraclès ' . PHP_EOL;
    $nemee->fight($heracles);
    echo 'vie Héraclès : ' . $heracles->getLife() . PHP_EOL . 'vie Nemée : ' . $nemee->getLife() . PHP_EOL;
}
en version while ci dessous
 */

$i = 1;
while (($heracles->isAlive()) && ($nemee->isAlive())) {
    $i++;

    echo "⏲️ round #" . $i . PHP_EOL;

    if ($heracles->isAlive()) {
        echo $heracles->getName() . ' ⚔️ attaque ' . $nemee->getName() . PHP_EOL;
        $heracles->baston($nemee);
        echo "💖 vie de  " . $nemee->getName() . ' ' . $nemee->getLife() . PHP_EOL . "💖 vie de  " . $heracles->getName() . ' ' . $heracles->getLife() . PHP_EOL;
    }
    if ($nemee->isAlive()) {
        echo $nemee->getName() . ' ⚔️ attaque ' . $heracles->getName() . PHP_EOL;
        $nemee->baston($heracles);
        echo "💖 vie de  " . $heracles->getName() . ' ' . $heracles->getLife() . PHP_EOL . "💖 vie de  " . $nemee->getName() . ' ' . $nemee->getLife() . PHP_EOL;
    }


    if ($nemee->isAlive() == false) {
        echo PHP_EOL . $nemee->getName() . ' 🏴‍☠️ is dead ' . PHP_EOL . $heracles->getName() . ' wins with ' . $heracles->getLife() . ' 💖 life';
    } elseif ($heracles->isAlive() == false) {
        echo PHP_EOL . $heracles->getName() . ' 🏴‍☠️ is dead ' . PHP_EOL . $nemee->getName() . ' wins with ' . $nemee->getLife() . ' 💖 life';
    }
}


//correction
/* $round = 1;
while ($heracles->isAlive() &&  $lion->isAlive()) {
    echo "Round #" . $round . PHP_EOL;

    echo $heracles->fight($lion) . PHP_EOL;
    if ($lion->isAlive()) {
echo $lion->fight($heracles);
    }
}
 */