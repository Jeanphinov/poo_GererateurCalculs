<?php

/**
 * Created by PhpStorm.
 * User: Jeanphi
 * Date: 16-02-16
 * Time: 10:43
 */
class OperationSolver
{

    static function calcule($tab)
    {
        return eval('return array("$tab"=>' . $tab . ',);');
    }

    /** Methode solve() résoud l'operation  et fait calcul=>solution */

    static function solve($tab)
    {
        $c = array();
        $b = array_map("self::calcule", array_keys($tab), $tab);

        foreach ($b as $indice_num => $suite) { // boucle pour enlever l'indice [numerique]
            foreach ($suite as $ques => $rep) // une fonction php doit exister, pas trouvé
                $c[$ques] = $rep;
        }
        return $c;
    }

    /** compare () fait la comparaison entre les solution et les les réponses
     *  en cas de bonne ou mauvaise réponse -> mets 0 ou un point + un colde couleur différent */

    static function compare($tab, $tab2)
    {
        foreach ($tab as $cle => $valeur) {
            if ($valeur == $tab2[$cle]) {
                $nouveau[$cle]["classe"] = "alert-success";
                $nouveau[$cle]["point"] = 1;
            } else {
                $nouveau[$cle]["classe"] = "alert-danger";
                $nouveau[$cle]["point"] = 0;
            }
        }
        return $nouveau;


    }
}

