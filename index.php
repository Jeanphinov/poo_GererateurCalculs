<?php
/**
 * Created by PhpStorm.
 * User: Jeanphi
 * Date: 16-02-16
 * Time: 10:39
 */

require_once("autoload.php"); // fichier autoload inclus les deux classes, une troisième au cas où

CONST N = 5;

/** Je test si j'ai une variable $_POST et donc un formulaire
 * si OUI je traite le formulaire*/
if (isset($_POST['envoi'])) {

    if (isset($_POST['calculs'])) {
        $calculs = unserialize(base64_decode($_POST['calculs']));
        $operations = $calculs->getOperations();
        $reponses = $_POST['reponses'];

        $calculs->updateOperations(OperationSolver::solve($operations));
        // je met a jours les opération avec le couple opération => résultat

        // $calculs->setDecoration(OperationSolver::initialize($operations));

        // Je compare les bonnes reponses avec les reponses venant du formulaire
        // si elles correpondent je met la classe au vert et j'ajoute un point
        // sinon je met la classe à rouge et je met 0 points.

        $calculs->setDecoration(OperationSolver::compare($calculs->getOperations(), $reponses));

        /** Je prépare les variables avant de les envoyer à l'affichage */
        $score = $calculs->getScore();
        $operations = $calculs->getOperations();
        $decorations = $calculs->getDecoration();
        // $reponses a été défini à via  $reponses = $_POST['reponses'];

        require_once("view/vue-resultat.php");


    } else require_once("view/erreur.php");
} else {
    /** Je n'ai aucune trace de formulaire soumis ($_POST) j'instancie un objet $Calculs qui génère les opérations
     * La variable $operation recupere la liste des operations et je renvoie vers le formulaire qui pose les questions */

    $calculs = new GenerateurCalculs(N);
    $operations = $calculs->getOperations();

    require_once("view/vue-form.php");
}
