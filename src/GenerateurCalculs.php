<?php

/**
 * Created by PhpStorm.
 * User: Jeanphi
 * Date: 16-02-16
 * Time: 10:42
 */


namespace Generateur ;

class GenerateurCalculs
{

    private $operateurs = array("addition", "soustraction", "division", "multiplication");
    private $operations = array();
    private $decoration = array();


    CONST MAX = 100; // les nombres iront jusqu'à 100 maximum

    public function __construct($n)
    {
        $this->genererOperations($n);
    }

    public function getNumber(){
        return rand(0, self::MAX);
    }

    public function getOperateur()
    {
        return $this->operateurs[array_rand($this->operateurs)];
    }

    // je tire une opération au sort j'exécute la methode qui crée
    public function genererOperations($n)
    {
        for ($i = 0; $i < $n; $i++) {
            $methode = 'add' . ucfirst($this->getOperateur());
            $number_1 = $this->getNumber();
            $number_2 = $this->getNumber();
            if($this->$methode($number_1, $number_2));

        }
    }

    public function addAddition($a = 0, $b = 0)
    {
        return $a . " + " . $b;
    }

    public function addSoustraction($a = 0, $b = 0)
    {
        return $a . " - " . $b;
    }

    public function addDivision($a = 0, $b = 0)
    {
        if ($b > $a){
            return false;
        } else {
            return $a . " / " . $b;
        }
    }

    public function addMultiplication($a = 0, $b = 1)
    {
        return $a . " * " . $b;
    }

    /**
     * @return array
     */
    public function getOperations()
    {
        return $this->operations;
    }

    /**
     * @return array
     */
    public function getDecoration()
    {
        return $this->decoration;
    }


    public function getScore()
    {
        $score = 0;
        foreach ($this->decoration as $deco) {
            $score += $deco['point'];

        }
        return $score;
    }

    /**
     * @param array $operations
     */
    public function setOperations($operations)
    {
        $this->operations[$operations] = null;
    }

    public function updateOperations($operations)
    {
        $this->operations = $operations;
    }

    /**
     * @param array $decoration
     */
    public function setDecoration($decoration)
    {
        $this->decoration = $decoration;
    }

}