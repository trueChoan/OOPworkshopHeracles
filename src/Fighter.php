<?php

/* Fighter class definition */
class Fighter
{
    public const MAX_LIFE = 100;
    private string $name;
    private int $strength;
    private int $dexterity;
    private int $life;

    // methode php 8
    // public function __construct(string $name, int $strength, int $dexterity, private int $life = self::MAX_LIFE)

    public function __construct(string $name, int $strength, int $dexterity, int $life = self::MAX_LIFE)

    {
        $this->name = $name;
        $this->strength = $strength;
        $this->dexterity = $dexterity;
        $this->life = $life;
    }


    public function getName()
    {
        return $this->name;
    }
    public function getStrength()
    {
        return $this->strength;
    }

    public function getDexterity()
    {
        return $this->dexterity;
    }

    public function getLife()
    {
        return $this->life;
    }


    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    public function setStrength($strength)
    {
        $this->strength = $strength;

        return $this;
    }

    public function setDexterity($dexterity)
    {
        $this->dexterity = $dexterity;

        return $this;
    }

    public function setLife($life)
    {
        $this->life = $life;

        return $this;
    }



    // premier jet de function fight avec des if imbriquer. bouh pas beau.
    public function fight(Fighter $target)
    {
        // je store dans une variable pour pouvoir appliquer une condition de comparaison
        $degat = (rand(1, $this->strength) - $target->dexterity);

        if ($degat > 0) {
            $resultCombat = $target->life - $degat;

            if (($resultCombat) <= 0) {
                $target->life = 0;
            } else {
                $target->life -= $degat;
            }
        }
    }

    //deuxieme version de la fonction, plus propre les 10 lignes tiennent en 2 lignes grâce à max() et a l'operateur ternaire :
    public function baston(Fighter $target)
    {

        if ($this->life > 0) {
            //max(a,b) returns the higher number from a and b 
            $degat = max(0, rand(1, $this->strength) - $target->getDexterity());
            $target->setLife((($target->getLife() - $degat) > 0 ?  ($target->getLife() - $degat) : 0));
        } else {
            return $this->getName() . ' is dead' . PHP_EOL;
        }
    }


    public function isAlive()
    {
        return $this->life > 0;
    }

    //correction JF : 
    public function bagarre(Fighter $target)
    {
        $strengthOfFight = rand(1, $this->strength);
        $damages = $strengthOfFight - $target->getDexterity();
        if ($damages < 0) {
            $damages = 0;
        }
        $currentTargetLife = $target->getLife();
        $newTargetLife = $currentTargetLife - $damages;
        $target->setLife($newTargetLife);

        $target->setLife($target->getLife() - $damages);

        return $this->getName() . " attaque" . $target->getName() . ": " . $target->getLife();
    }
}
