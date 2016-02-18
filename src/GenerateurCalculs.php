<?php

/**
 * Created by PhpStorm.
 * User: Jeanphi
 * Date: 16-02-16
 * Time: 10:42
 */
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

    private function getOperateurs()
    {
        return $this->operateurs[array_rand($this->operateurs)];

    }

    // je tire une opération au sort j'exécute la methode qui crée
    public function genererOperations($n)
    {
        for ($i = 0; $i < $n; $i++) {
            $methode = 'add' . ucfirst($this->getOperateurs());
            $this->$methode();
        }
    }

    private function addAddition()
    {
        $a = rand(0, self::MAX);
        $b = rand(0, self::MAX);
        $a_b = $a . "+" . $b;

        $this->setOperations($a_b);
    }

    private function addSoustraction()
    {
        $a = rand(0, self::MAX);
        $b = rand(0, $a);  // le deuxième nombre ne dois pas être plus grand que le premier - pas de résultat négatif.
        $a_b = $a . "-" . $b;
        $this->setOperations($a_b);
    }

    private function addDivision()
    {
        $a = rand(0, self::MAX);
        $test = false;
        while ($test == false) {

            $b = rand(1, $a);
            if ($a % $b == 0) $test = true;
        }

        $a_b = $a . "/" . $b;
        $this->setOperations($a_b);
    }

    private function addMultiplication()
    {
        $a = rand(0, self::MAX);
        $b = rand(0, self::MAX / 4);
        $a_b = $a . "*" . $b;
        $this->setOperations($a_b);
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